<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'get_customer_orders':
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        
        $customer_id = $_SESSION['customer_id'];
        
        try {
            // Get orders with product info, handling inactive products
            $stmt = $connection->prepare("
                SELECT 
                    o.order_id,
                    o.quantity,
                    o.price,
                    o.subtotal,
                    o.status,
                    o.order_date,
                    o.delivered_at,
                    o.cancelled_at,
                    o.cancelled_by,
                    o.shipping_address,
                    p.product_id,
                    p.name as product_name,
                    p.media_path as image_path,
                    p.is_active,
                    s.business_name as seller_name,
                    (SELECT COUNT(*) FROM product_reviews WHERE order_id = o.order_id) as has_review
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                JOIN sellers s ON o.seller_id = s.seller_id
                WHERE o.customer_id = ?
                ORDER BY o.order_date DESC
            ");
            $stmt->execute([$customer_id]);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(['status' => 'success', 'data' => $orders]);
            
        } catch (PDOException $e) {
            error_log("Get customer orders error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'get_seller_orders':
        if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller'] || !isset($_SESSION['seller_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        
        $seller_id = $_SESSION['seller_id'];
        
        try {
            // Get orders with customer info, including inactive product flag
            $stmt = $connection->prepare("
                SELECT 
                    o.order_id,
                    o.quantity,
                    o.price,
                    o.subtotal,
                    o.status,
                    o.order_date,
                    o.delivered_at,
                    o.cancelled_at,
                    o.cancelled_by,
                    o.shipping_address,
                    p.product_id,
                    p.name as product_name,
                    p.media_path as image_path,
                    p.is_active,
                    u.first_name,
                    u.last_name,
                    u.email,
                    u.contact_number
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                JOIN customers c ON o.customer_id = c.customer_id
                JOIN users u ON c.user_id = u.user_id
                WHERE o.seller_id = ?
                ORDER BY o.order_date DESC
            ");
            $stmt->execute([$seller_id]);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(['status' => 'success', 'data' => $orders]);
            
        } catch (PDOException $e) {
            error_log("Get seller orders error: " . $e->message);
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update_item_status':
        if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller'] || !isset($_SESSION['seller_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $new_status = $_POST['status'] ?? '';
        
        if (!in_array($new_status, ['delivered', 'cancelled'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid status']);
            exit;
        }
        
        $seller_id = $_SESSION['seller_id'];
        
        try {
            $connection->beginTransaction();
            
            // Verify order belongs to this seller and is pending
            $stmt = $connection->prepare("
                SELECT o.*, p.product_id, p.stock_quantity 
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                WHERE o.order_id = ? AND o.seller_id = ? AND o.status = 'pending'
            ");
            $stmt->execute([$order_id, $seller_id]);
            $order = $stmt->fetch();
            
            if (!$order) {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Order not found or cannot be updated']);
                exit;
            }
            
            if ($new_status === 'cancelled') {
                // Restore stock when cancelling
                $new_stock = $order['stock_quantity'] + $order['quantity'];
                $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
                $stmt->execute([$new_stock, $order['product_id']]);
                
                $cancelled_by = 'seller';
                $stmt = $connection->prepare("
                    UPDATE orders 
                    SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = ? 
                    WHERE order_id = ?
                ");
                $stmt->execute([$cancelled_by, $order_id]);
                
            } else if ($new_status === 'delivered') {
                $stmt = $connection->prepare("
                    UPDATE orders 
                    SET status = 'delivered', delivered_at = NOW() 
                    WHERE order_id = ?
                ");
                $stmt->execute([$order_id]);
            }
            
            $connection->commit();
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            $connection->rollBack();
            error_log("Update order status error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'cancel_item':
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $customer_id = $_SESSION['customer_id'];
        
        try {
            $connection->beginTransaction();
            
            // Verify order belongs to this customer and is pending
            $stmt = $connection->prepare("
                SELECT o.*, p.product_id, p.stock_quantity 
                FROM orders o
                JOIN products p ON o.product_id = p.product_id
                WHERE o.order_id = ? AND o.customer_id = ? AND o.status = 'pending'
            ");
            $stmt->execute([$order_id, $customer_id]);
            $order = $stmt->fetch();
            
            if (!$order) {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Order not found or cannot be cancelled']);
                exit;
            }
            
            // Restore stock
            $new_stock = $order['stock_quantity'] + $order['quantity'];
            $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
            $stmt->execute([$new_stock, $order['product_id']]);
            
            // Update order status
            $stmt = $connection->prepare("
                UPDATE orders 
                SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = 'customer' 
                WHERE order_id = ?
            ");
            $stmt->execute([$order_id]);
            
            $connection->commit();
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            $connection->rollBack();
            error_log("Cancel order error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update_shipping':
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $shipping_address = $_POST['shipping_address'] ?? '';
        $customer_id = $_SESSION['customer_id'];
        
        if (empty($shipping_address)) {
            echo json_encode(['status' => 'error', 'message' => 'Shipping address cannot be empty']);
            exit;
        }
        
        try {
            $stmt = $connection->prepare("
                UPDATE orders 
                SET shipping_address = ? 
                WHERE order_id = ? AND customer_id = ? AND status = 'pending'
            ");
            $stmt->execute([$shipping_address, $order_id, $customer_id]);
            
            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Order not found or cannot be updated']);
            }
            
        } catch (PDOException $e) {
            error_log("Update shipping error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}