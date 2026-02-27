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
        getCustomerOrders();
        break;
    case 'cancel_item':
        cancelOrderItem();
        break;
    case 'get_seller_orders':
        getSellerOrders();
        break;
    case 'update_item_status':
        updateItemStatus();
        break;
    case 'update_shipping':
        updateShippingAddress();
        break;
    case 'get_default_address':
        getDefaultAddress();
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function getCustomerOrders() {
    global $connection;
    
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT 
                o.order_id,
                o.product_id,
                o.quantity,
                o.price_at_time,
                o.subtotal,
                o.status,
                o.shipping_address,
                o.order_date,
                o.delivered_at,
                o.cancelled_at,
                o.cancelled_by,
                p.name AS product_name,
                p.image_path,
                s.business_name AS seller_name,
                (SELECT COUNT(*) FROM product_reviews pr WHERE pr.order_id = o.order_id) AS has_review
            FROM orders o
            JOIN products p ON o.product_id = p.product_id
            JOIN sellers s ON o.seller_id = s.seller_id
            WHERE o.customer_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$customer_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['status' => 'success', 'data' => $rows]);
        
    } catch (Exception $e) {
        error_log("getCustomerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function cancelOrderItem() {
    global $connection;
    
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    $order_id = $_POST['order_id'] ?? 0;
    
    if (!$order_id) {
        echo json_encode(['status' => 'error', 'message' => 'Order ID required']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            SELECT order_id, status, quantity, product_id
            FROM orders
            WHERE order_id = ? AND customer_id = ?
            FOR UPDATE
        ");
        $stmt->execute([$order_id, $customer_id]);
        $order = $stmt->fetch();
        
        if (!$order) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order not found']);
            exit;
        }
        
        if ($order['status'] !== 'pending') {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order can only be cancelled when status is pending']);
            exit;
        }
        
        $update = $connection->prepare("
            UPDATE orders
            SET status = 'cancelled', 
                cancelled_by = 'customer',
                cancelled_at = NOW()
            WHERE order_id = ? AND customer_id = ?
        ");
        $update->execute([$order_id, $customer_id]);
        
        $restore = $connection->prepare("
            UPDATE products 
            SET stock_quantity = stock_quantity + ? 
            WHERE product_id = ?
        ");
        $restore->execute([$order['quantity'], $order['product_id']]);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Order cancelled successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("cancelOrderItem error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to cancel order']);
    }
}

function getSellerOrders() {
    global $connection;
    
    if (!isset($_SESSION['seller_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
        exit;
    }
    
    $seller_id = $_SESSION['seller_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT 
                o.order_id,
                o.customer_id,
                o.product_id,
                o.quantity,
                o.price_at_time,
                o.subtotal,
                o.status,
                o.shipping_address,
                o.payment_method,
                o.order_date,
                o.delivered_at,
                o.cancelled_at,
                o.cancelled_by,
                p.name AS product_name,
                p.image_path,
                u.first_name,
                u.last_name,
                u.email,
                u.contact_number,
                s.business_name
            FROM orders o
            JOIN products p ON o.product_id = p.product_id
            JOIN customers c ON o.customer_id = c.customer_id
            JOIN users u ON c.user_id = u.user_id
            JOIN sellers s ON o.seller_id = s.seller_id
            WHERE o.seller_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$seller_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['status' => 'success', 'data' => $rows]);
        
    } catch (Exception $e) {
        error_log("getSellerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function updateItemStatus() {
    global $connection;
    
    if (!isset($_SESSION['seller_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
        exit;
    }
    
    $seller_id = $_SESSION['seller_id'];
    $order_id = $_POST['order_id'] ?? 0;
    $status = $_POST['status'] ?? '';
    
    $allowed_statuses = ['delivered', 'cancelled'];
    if (!$order_id || !in_array($status, $allowed_statuses)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid parameters']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            SELECT order_id, status, quantity, product_id
            FROM orders
            WHERE order_id = ? AND seller_id = ?
            FOR UPDATE
        ");
        $stmt->execute([$order_id, $seller_id]);
        $order = $stmt->fetch();
        
        if (!$order) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order not found']);
            exit;
        }
        
        if ($order['status'] !== 'pending') {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order cannot be updated from current status']);
            exit;
        }
        
        if ($status === 'delivered') {
            $update = $connection->prepare("
                UPDATE orders
                SET status = 'delivered',
                    delivered_at = NOW()
                WHERE order_id = ? AND seller_id = ?
            ");
            $update->execute([$order_id, $seller_id]);
            
            $updateSales = $connection->prepare("
                UPDATE sellers 
                SET total_sales = total_sales + (
                    SELECT subtotal FROM orders WHERE order_id = ?
                )
                WHERE seller_id = ?
            ");
            $updateSales->execute([$order_id, $seller_id]);
            
        } else if ($status === 'cancelled') {
            $update = $connection->prepare("
                UPDATE orders
                SET status = 'cancelled',
                    cancelled_by = 'seller',
                    cancelled_at = NOW()
                WHERE order_id = ? AND seller_id = ?
            ");
            $update->execute([$order_id, $seller_id]);
            
            $restore = $connection->prepare("
                UPDATE products 
                SET stock_quantity = stock_quantity + ? 
                WHERE product_id = ?
            ");
            $restore->execute([$order['quantity'], $order['product_id']]);
        }
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Order status updated to ' . $status]);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("updateItemStatus error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
    }
}

function updateShippingAddress() {
    global $connection;
    
    if (!isset($_SESSION['customer_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
        exit;
    }
    
    $customer_id = $_SESSION['customer_id'];
    $order_id = $_POST['order_id'] ?? 0;
    $shipping_address = trim($_POST['shipping_address'] ?? '');
    
    if (!$order_id || empty($shipping_address)) {
        echo json_encode(['status' => 'error', 'message' => 'Order ID and shipping address required']);
        exit;
    }
    
    if (strlen($shipping_address) < 5) {
        echo json_encode(['status' => 'error', 'message' => 'Shipping address must be at least 5 characters']);
        exit;
    }
    
    try {
        $connection->beginTransaction();
        
        $stmt = $connection->prepare("
            SELECT order_id, status
            FROM orders
            WHERE order_id = ? AND customer_id = ?
            FOR UPDATE
        ");
        $stmt->execute([$order_id, $customer_id]);
        $order = $stmt->fetch();
        
        if (!$order) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Order not found']);
            exit;
        }
        
        if ($order['status'] !== 'pending') {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Shipping address can only be updated for pending orders']);
            exit;
        }
        
        $update = $connection->prepare("
            UPDATE orders
            SET shipping_address = ?
            WHERE order_id = ? AND customer_id = ?
        ");
        $update->execute([$shipping_address, $order_id, $customer_id]);
        
        $connection->commit();
        
        echo json_encode(['status' => 'success', 'message' => 'Shipping address updated successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("updateShippingAddress error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update shipping address']);
    }
}

function getDefaultAddress() {
    global $connection;
    
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    
    try {
        $stmt = $connection->prepare("
            SELECT address 
            FROM users 
            WHERE user_id = ?
        ");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && !empty($user['address'])) {
            echo json_encode(['status' => 'success', 'address' => $user['address']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No default address found']);
        }
        
    } catch (Exception $e) {
        error_log("getDefaultAddress error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch default address']);
    }
}
?>