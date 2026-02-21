<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_customer_orders':
        getCustomerOrders($connection);
        break;
    case 'cancel_item':
        cancelOrderItem($connection);
        break;
    case 'get_seller_orders':
        getSellerOrders($connection);
        break;
    case 'update_item_status':
        updateItemStatus($connection);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function getCustomerOrders($connection) {
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT 
                co.order_id,
                co.order_date,
                co.total_amount,
                co.shipping_address,
                co.payment_method,
                so.seller_order_id,
                so.seller_id,
                so.seller_status,
                pi.order_item_id,
                pi.product_id,
                pi.quantity,
                pi.price_at_time,
                pi.subtotal,
                pi.status as item_status,
                p.name as product_name,
                p.image_path,
                s.business_name,
                (SELECT COUNT(*) FROM product_reviews pr WHERE pr.order_item_id = pi.order_item_id) as has_review
            FROM customer_orders co
            LEFT JOIN seller_orders so ON co.order_id = so.order_id
            LEFT JOIN purchase_items pi ON so.seller_order_id = pi.seller_order_id
            LEFT JOIN products p ON pi.product_id = p.product_id
            LEFT JOIN sellers s ON so.seller_id = s.seller_id
            WHERE co.customer_id = ?
            ORDER BY co.order_date DESC, so.seller_order_id
        ");
        $stmt->execute([$customer_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Group by order
        $orders = [];
        foreach ($rows as $row) {
            $order_id = $row['order_id'];
            
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'order_id' => $row['order_id'],
                    'order_date' => $row['order_date'],
                    'total_amount' => $row['total_amount'],
                    'shipping_address' => $row['shipping_address'],
                    'payment_method' => $row['payment_method'],
                    'items' => []
                ];
            }
            
            if ($row['order_item_id']) {
                $orders[$order_id]['items'][] = [
                    'order_item_id' => $row['order_item_id'],
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'business_name' => $row['business_name'] ?? 'Unknown Seller',
                    'quantity' => $row['quantity'],
                    'price_at_time' => $row['price_at_time'],
                    'subtotal' => $row['subtotal'],
                    'status' => $row['item_status'],
                    'image_path' => $row['image_path'],
                    'reviewed' => $row['has_review'] > 0
                ];
            }
        }
        
        // Calculate order status for each order
        foreach ($orders as &$order) {
            $statuses = array_column($order['items'], 'status');
            $total_items = count($statuses);
            $cancelled = count(array_filter($statuses, function($s) { return $s === 'cancelled'; }));
            $delivered = count(array_filter($statuses, function($s) { return $s === 'delivered'; }));
            
            if ($cancelled === $total_items) {
                $order['order_status'] = 'cancelled';
            } elseif ($delivered === $total_items) {
                $order['order_status'] = 'delivered';
            } else {
                $order['order_status'] = 'pending';
            }
        }
        
        echo json_encode(['status' => 'success', 'data' => array_values($orders)]);
        
    } catch (Exception $e) {
        error_log("getCustomerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function cancelOrderItem($connection) {
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    $item_id = $_POST['item_id'] ?? 0;
    
    if (!$item_id) {
        echo json_encode(['status' => 'error', 'message' => 'Item ID required']);
        exit;
    }
    
    try {
        // Check if item belongs to customer and is pending
        $stmt = $connection->prepare("
            SELECT pi.order_item_id, pi.status, pi.quantity, pi.product_id, so.seller_order_id
            FROM purchase_items pi
            JOIN seller_orders so ON pi.seller_order_id = so.seller_order_id
            JOIN customer_orders co ON so.order_id = co.order_id
            WHERE pi.order_item_id = ? AND co.customer_id = ?
        ");
        $stmt->execute([$item_id, $customer_id]);
        $item = $stmt->fetch();
        
        if (!$item) {
            echo json_encode(['status' => 'error', 'message' => 'Item not found']);
            exit;
        }
        
        if ($item['status'] !== 'pending') {
            echo json_encode(['status' => 'error', 'message' => 'Item can only be cancelled when pending']);
            exit;
        }
        
        $connection->beginTransaction();
        
        // Cancel the item
        $update = $connection->prepare("
            UPDATE purchase_items
            SET status = 'cancelled'
            WHERE order_item_id = ?
        ");
        $update->execute([$item_id]);
        
        // Restore stock
        $restoreStock = $connection->prepare("
            UPDATE products 
            SET stock_quantity = stock_quantity + ? 
            WHERE product_id = ?
        ");
        $restoreStock->execute([$item['quantity'], $item['product_id']]);
        
        // Update seller_order status
        updateSellerOrderStatus($connection, $item['seller_order_id']);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Item cancelled successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("cancelOrderItem error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to cancel item']);
    }
}

function getSellerOrders($connection) {
    if (!isset($_SESSION['seller_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
        exit;
    }
    
    $seller_id = $_SESSION['seller_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT 
                co.order_id,
                co.order_date,
                co.shipping_address,
                u.first_name,
                u.last_name,
                u.email,
                u.contact_number,
                so.seller_order_id,
                so.seller_status,
                pi.order_item_id,
                pi.product_id,
                pi.quantity,
                pi.price_at_time,
                pi.subtotal,
                pi.status as item_status,
                p.name as product_name,
                p.image_path
            FROM customer_orders co
            JOIN seller_orders so ON co.order_id = so.order_id
            JOIN purchase_items pi ON so.seller_order_id = pi.seller_order_id
            JOIN products p ON pi.product_id = p.product_id
            JOIN users u ON co.customer_id = (SELECT customer_id FROM customers WHERE user_id = u.user_id)
            WHERE so.seller_id = ?
            ORDER BY co.order_date DESC
        ");
        $stmt->execute([$seller_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $orders = [];
        foreach ($rows as $row) {
            $order_id = $row['order_id'];
            
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'order_id' => $row['order_id'],
                    'order_date' => $row['order_date'],
                    'shipping_address' => $row['shipping_address'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'email' => $row['email'],
                    'contact_number' => $row['contact_number'],
                    'seller_status' => $row['seller_status'],
                    'items' => []
                ];
            }
            
            $orders[$order_id]['items'][] = [
                'order_item_id' => $row['order_item_id'],
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'price_at_time' => $row['price_at_time'],
                'subtotal' => $row['subtotal'],
                'status' => $row['item_status'],
                'image_path' => $row['image_path']
            ];
        }
        
        echo json_encode(['status' => 'success', 'data' => array_values($orders)]);
        
    } catch (Exception $e) {
        error_log("getSellerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function updateItemStatus($connection) {
    if (!isset($_SESSION['seller_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
        exit;
    }
    
    $seller_id = $_SESSION['seller_id'];
    $item_id = $_POST['item_id'] ?? 0;
    $status = $_POST['status'] ?? '';
    
    // Simplified allowed statuses
    $allowed_statuses = ['delivered', 'cancelled'];
    if (!$item_id || !in_array($status, $allowed_statuses)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid parameters']);
        exit;
    }
    
    try {
        // Verify item belongs to seller
        $stmt = $connection->prepare("
            SELECT pi.order_item_id, so.seller_order_id, pi.quantity, pi.product_id
            FROM purchase_items pi
            JOIN seller_orders so ON pi.seller_order_id = so.seller_order_id
            WHERE pi.order_item_id = ? AND so.seller_id = ?
        ");
        $stmt->execute([$item_id, $seller_id]);
        $item = $stmt->fetch();
        
        if (!$item) {
            echo json_encode(['status' => 'error', 'message' => 'Item not found']);
            exit;
        }
        
        $connection->beginTransaction();
        
        // Update status
        $update = $connection->prepare("
            UPDATE purchase_items
            SET status = ?
            WHERE order_item_id = ?
        ");
        $update->execute([$status, $item_id]);
        
        // If cancelled, restore stock
        if ($status === 'cancelled') {
            $restoreStock = $connection->prepare("
                UPDATE products 
                SET stock_quantity = stock_quantity + ? 
                WHERE product_id = ?
            ");
            $restoreStock->execute([$item['quantity'], $item['product_id']]);
        }
        
        // Update seller_order status
        updateSellerOrderStatus($connection, $item['seller_order_id']);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Item status updated']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("updateItemStatus error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
    }
}

function updateSellerOrderStatus($connection, $seller_order_id) {
    $stmt = $connection->prepare("
        SELECT 
            COUNT(*) as total,
            SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) as cancelled,
            SUM(CASE WHEN status = 'delivered' THEN 1 ELSE 0 END) as delivered
        FROM purchase_items
        WHERE seller_order_id = ?
    ");
    $stmt->execute([$seller_order_id]);
    $counts = $stmt->fetch();
    
    $new_status = 'pending';
    if ($counts['cancelled'] == $counts['total']) {
        $new_status = 'cancelled';
    } elseif ($counts['delivered'] == $counts['total']) {
        $new_status = 'delivered';
    }
    
    $update = $connection->prepare("
        UPDATE seller_orders
        SET seller_status = ?, updated_at = NOW()
        WHERE seller_order_id = ?
    ");
    $update->execute([$new_status, $seller_order_id]);
}
?>