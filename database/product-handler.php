<?php
// Crooks-Cart-Collectives/database/product-handler.php
session_start();
require_once 'database-connect.php';
require_once 'data-storage-handler.php';

header('Content-Type: application/json');

// Enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Check if user is logged in and is a seller
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
    exit;
}

$seller_id = $_SESSION['seller_id'];
$action = $_POST['action'] ?? '';

error_log("Product handler action: " . $action . " for seller: " . $seller_id);

switch ($action) {
    case 'delete':
        handleDelete($connection, $seller_id);
        break;
        
    case 'toggle_status':
        handleToggleStatus($connection, $seller_id);
        break;
        
    default:
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

/**
 * Handle soft delete (set is_active = 0) and cancel pending orders
 */
function handleDelete($connection, $seller_id) {
    try {
        $product_id = $_POST['product_id'] ?? 0;
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            return;
        }
        
        // Verify product belongs to this seller
        $stmt = $connection->prepare("SELECT product_id, name FROM products WHERE product_id = ? AND seller_id = ?");
        $stmt->execute([$product_id, $seller_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
            return;
        }
        
        // Start transaction
        $connection->beginTransaction();
        
        // Soft delete the product (set is_active = 0)
        $stmt = $connection->prepare("UPDATE products SET is_active = 0 WHERE product_id = ?");
        $stmt->execute([$product_id]);
        
        // ===== CRITICAL: Cancel any pending orders for this product =====
        // Get all pending orders for this product
        $stmt = $connection->prepare("
            SELECT order_id, quantity 
            FROM orders 
            WHERE product_id = ? AND status = 'pending'
        ");
        $stmt->execute([$product_id]);
        $pendingOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $cancelledCount = 0;
        
        if (!empty($pendingOrders)) {
            // Update all pending orders to cancelled (removed notes column)
            $stmt = $connection->prepare("
                UPDATE orders 
                SET status = 'cancelled', 
                    cancelled_at = NOW(), 
                    cancelled_by = 'seller'
                WHERE product_id = ? AND status = 'pending'
            ");
            $stmt->execute([$product_id]);
            $cancelledCount = $stmt->rowCount();
            
            // Restore stock for cancelled orders
            foreach ($pendingOrders as $order) {
                $stmt = $connection->prepare("
                    UPDATE products 
                    SET stock_quantity = stock_quantity + ? 
                    WHERE product_id = ?
                ");
                $stmt->execute([$order['quantity'], $product_id]);
            }
            
            error_log("Product removal: Cancelled {$cancelledCount} pending orders for product ID {$product_id}");
        }
        
        // Check if there are any carts containing this product and remove them
        $stmt = $connection->prepare("DELETE FROM carts WHERE product_id = ?");
        $stmt->execute([$product_id]);
        $cartsRemoved = $stmt->rowCount();
        
        if ($cartsRemoved > 0) {
            error_log("Product removal: Removed {$cartsRemoved} cart entries for product ID {$product_id}");
        }
        
        $connection->commit();
        
        $message = 'Product removed successfully';
        if ($cancelledCount > 0) {
            $message .= ". {$cancelledCount} pending order(s) have been automatically cancelled.";
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => $message,
            'data' => [
                'cancelled_orders' => $cancelledCount,
                'carts_removed' => $cartsRemoved,
                'product_name' => $product['name']
            ]
        ]);
        
    } catch (PDOException $e) {
        if ($connection->inTransaction()) {
            $connection->rollBack();
        }
        error_log("Product delete error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}

/**
 * Handle toggle product active status (for future use if needed)
 */
function handleToggleStatus($connection, $seller_id) {
    try {
        $product_id = $_POST['product_id'] ?? 0;
        $status = $_POST['status'] ?? 0; // 1 for active, 0 for inactive
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            return;
        }
        
        // Verify product belongs to this seller
        $stmt = $connection->prepare("SELECT product_id FROM products WHERE product_id = ? AND seller_id = ?");
        $stmt->execute([$product_id, $seller_id]);
        
        if (!$stmt->fetch()) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
            return;
        }
        
        // Toggle status
        $stmt = $connection->prepare("UPDATE products SET is_active = ? WHERE product_id = ?");
        $stmt->execute([$status, $product_id]);
        
        // If setting to inactive, also handle pending orders
        if ($status == 0) {
            // Get all pending orders for this product
            $stmt = $connection->prepare("
                SELECT order_id, quantity 
                FROM orders 
                WHERE product_id = ? AND status = 'pending'
            ");
            $stmt->execute([$product_id]);
            $pendingOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (!empty($pendingOrders)) {
                // Update all pending orders to cancelled (removed notes column)
                $stmt = $connection->prepare("
                    UPDATE orders 
                    SET status = 'cancelled', 
                        cancelled_at = NOW(), 
                        cancelled_by = 'seller'
                    WHERE product_id = ? AND status = 'pending'
                ");
                $stmt->execute([$product_id]);
                
                // Restore stock for cancelled orders
                foreach ($pendingOrders as $order) {
                    $stmt = $connection->prepare("
                        UPDATE products 
                        SET stock_quantity = stock_quantity + ? 
                        WHERE product_id = ?
                    ");
                    $stmt->execute([$order['quantity'], $product_id]);
                }
            }
            
            // Remove from carts
            $stmt = $connection->prepare("DELETE FROM carts WHERE product_id = ?");
            $stmt->execute([$product_id]);
        }
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Product status updated successfully'
        ]);
        
    } catch (PDOException $e) {
        error_log("Product toggle error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
}
?>