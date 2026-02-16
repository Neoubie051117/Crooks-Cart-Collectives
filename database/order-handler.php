<?php // PHP File Content ?>
<?php
session_start();
header('Content-Type: application/json');

require_once(__DIR__ . '/database-connect.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$is_customer = isset($_SESSION['is_customer']) && $_SESSION['is_customer'];
$is_seller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'];

switch ($action) {
    case 'get_customer_orders':
        if (!$is_customer) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        getCustomerOrders($connection, $_SESSION['customer_id']);
        break;

    case 'get_seller_orders':
        if (!$is_seller) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        getSellerOrders($connection, $_SESSION['seller_id']);
        break;

    case 'update_item_status':
        if (!$is_seller) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        updateItemStatus($connection, $_SESSION['seller_id']);
        break;
        
    case 'cancel_item':
        if (!$is_customer) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        cancelOrderItem($connection, $_SESSION['customer_id']);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function getCustomerOrders($connection, $customer_id) {
    try {
        // Get all orders for this customer
        $stmt = $connection->prepare("
            SELECT 
                co.*,
                COUNT(DISTINCT so.seller_id) as seller_count,
                COUNT(pi.order_item_id) as total_items
            FROM customer_orders co
            LEFT JOIN seller_orders so ON co.order_id = so.order_id
            LEFT JOIN purchase_items pi ON so.seller_order_id = pi.seller_order_id
            WHERE co.customer_id = ?
            GROUP BY co.order_id
            ORDER BY co.order_date DESC
        ");
        $stmt->execute([$customer_id]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // For each order, fetch its items with detailed info
        foreach ($orders as &$order) {
            $stmtItems = $connection->prepare("
                SELECT 
                    pi.*, 
                    p.name, 
                    p.image_path, 
                    s.business_name, 
                    s.seller_id,
                    so.seller_order_id,
                    so.seller_status,
                    (SELECT COUNT(*) FROM product_reviews pr WHERE pr.order_item_id = pi.order_item_id) as reviewed,
                    CASE 
                        WHEN pi.status IN ('pending', 'confirmed') THEN 1 
                        ELSE 0 
                    END as can_cancel
                FROM purchase_items pi
                JOIN seller_orders so ON pi.seller_order_id = so.seller_order_id
                JOIN products p ON pi.product_id = p.product_id
                JOIN sellers s ON so.seller_id = s.seller_id
                WHERE so.order_id = ?
                ORDER BY pi.status, p.name
            ");
            $stmtItems->execute([$order['order_id']]);
            $order['items'] = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
            
            // Calculate order status based on items
            $statuses = array_column($order['items'], 'status');
            $cancelled_count = count(array_filter($statuses, function($s) { return $s === 'cancelled'; }));
            $delivered_count = count(array_filter($statuses, function($s) { return $s === 'delivered'; }));
            $refunded_count = count(array_filter($statuses, function($s) { return $s === 'refunded'; }));
            $pending_count = count(array_filter($statuses, function($s) { return $s === 'pending'; }));
            
            $total_items = count($statuses);
            
            if ($cancelled_count === $total_items) {
                $order['order_status'] = 'cancelled';
            } elseif ($delivered_count + $refunded_count === $total_items) {
                $order['order_status'] = 'completed';
            } elseif ($pending_count > 0) {
                $order['order_status'] = 'pending';
            } else {
                $order['order_status'] = 'processing';
            }
        }

        echo json_encode(['status' => 'success', 'data' => $orders]);
    } catch (Exception $e) {
        error_log("getCustomerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function getSellerOrders($connection, $seller_id) {
    try {
        $stmt = $connection->prepare("
            SELECT 
                so.*,
                co.order_date,
                co.shipping_address,
                u.first_name,
                u.last_name,
                u.email,
                u.contact_number
            FROM seller_orders so
            JOIN customer_orders co ON so.order_id = co.order_id
            JOIN customers c ON co.customer_id = c.customer_id
            JOIN users u ON c.user_id = u.user_id
            WHERE so.seller_id = ?
            ORDER BY co.order_date DESC
        ");
        $stmt->execute([$seller_id]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($orders as &$order) {
            $stmtItems = $connection->prepare("
                SELECT pi.*, p.name, p.image_path
                FROM purchase_items pi
                JOIN products p ON pi.product_id = p.product_id
                WHERE pi.seller_order_id = ?
                ORDER BY pi.status
            ");
            $stmtItems->execute([$order['seller_order_id']]);
            $order['items'] = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(['status' => 'success', 'data' => $orders]);
    } catch (Exception $e) {
        error_log("getSellerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function updateItemStatus($connection, $seller_id) {
    $item_id = $_POST['item_id'] ?? 0;
    $new_status = $_POST['status'] ?? '';

    $validStatuses = ['confirmed', 'processing', 'shipped', 'delivered', 'cancelled'];
    if (!$item_id || !in_array($new_status, $validStatuses)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit;
    }

    try {
        // Verify item belongs to seller
        $stmt = $connection->prepare("
            SELECT pi.order_item_id, pi.status
            FROM purchase_items pi
            JOIN seller_orders so ON pi.seller_order_id = so.seller_order_id
            WHERE pi.order_item_id = ? AND so.seller_id = ?
        ");
        $stmt->execute([$item_id, $seller_id]);
        $item = $stmt->fetch();
        
        if (!$item) {
            echo json_encode(['status' => 'error', 'message' => 'Item not found or unauthorized']);
            exit;
        }
        
        // Validate status transition
        if ($item['status'] === 'delivered' || $item['status'] === 'cancelled') {
            echo json_encode(['status' => 'error', 'message' => 'Cannot update delivered or cancelled items']);
            exit;
        }

        // Update status and corresponding timestamp
        $timestampField = $new_status . '_at';
        $update = $connection->prepare("
            UPDATE purchase_items
            SET status = ?,
                $timestampField = NOW()
            WHERE order_item_id = ?
        ");
        $update->execute([$new_status, $item_id]);

        // If cancelling, restore stock
        if ($new_status === 'cancelled') {
            $restoreStock = $connection->prepare("
                UPDATE products p
                JOIN purchase_items pi ON p.product_id = pi.product_id
                SET p.stock_quantity = p.stock_quantity + pi.quantity
                WHERE pi.order_item_id = ?
            ");
            $restoreStock->execute([$item_id]);
        }

        echo json_encode(['status' => 'success', 'message' => 'Status updated']);
    } catch (Exception $e) {
        error_log("updateItemStatus error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

// FIXED: cancelOrderItem function with proper status handling
function cancelOrderItem($connection, $customer_id) {
    $item_id = $_POST['item_id'] ?? 0;
    
    if (!$item_id) {
        echo json_encode(['status' => 'error', 'message' => 'Item ID required']);
        exit;
    }
    
    try {
        // Verify item belongs to customer and can be cancelled
        $stmt = $connection->prepare("
            SELECT pi.order_item_id, pi.status, pi.quantity, pi.product_id
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
        
        // Check if item can be cancelled (only pending or confirmed)
        if (!in_array($item['status'], ['pending', 'confirmed'])) {
            echo json_encode(['status' => 'error', 'message' => 'Item cannot be cancelled at this stage']);
            exit;
        }
        
        $connection->beginTransaction();
        
        // Update item status to cancelled
        $update = $connection->prepare("
            UPDATE purchase_items
            SET status = 'cancelled', cancelled_at = NOW()
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
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Item cancelled successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("cancelOrderItem error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to cancel item']);
    }
}
?>