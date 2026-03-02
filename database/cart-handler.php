<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add_to_cart':
        $product_id = $_POST['product_id'] ?? 0;
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            exit;
        }
        
        try {
            // Check if product exists and is active
            $stmt = $connection->prepare("
                SELECT p.*, s.seller_id 
                FROM products p 
                JOIN sellers s ON p.seller_id = s.seller_id 
                WHERE p.product_id = ? AND p.is_active = 1
            ");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch();
            
            if (!$product) {
                echo json_encode(['status' => 'error', 'message' => 'Product not available']);
                exit;
            }
            
            if ($product['stock_quantity'] < $quantity) {
                echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
                exit;
            }
            
            // Check if already in cart
            $stmt = $connection->prepare("
                SELECT cart_id, quantity FROM carts 
                WHERE customer_id = ? AND product_id = ?
            ");
            $stmt->execute([$customer_id, $product_id]);
            $existing = $stmt->fetch();
            
            if ($existing) {
                // Update existing
                $newQuantity = $existing['quantity'] + $quantity;
                if ($newQuantity > $product['stock_quantity']) {
                    $newQuantity = $product['stock_quantity'];
                }
                
                $stmt = $connection->prepare("
                    UPDATE carts 
                    SET quantity = ?, price = ? 
                    WHERE cart_id = ?
                ");
                $stmt->execute([$newQuantity, $product['price'], $existing['cart_id']]);
            } else {
                // Insert new
                $stmt = $connection->prepare("
                    INSERT INTO carts (customer_id, product_id, seller_id, quantity, price) 
                    VALUES (?, ?, ?, ?, ?)
                ");
                $stmt->execute([$customer_id, $product_id, $product['seller_id'], $quantity, $product['price']]);
            }
            
            echo json_encode(['status' => 'success', 'message' => 'Added to cart']);
            
        } catch (PDOException $e) {
            error_log("Add to cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update':
        $cart_item_id = $_POST['cart_item_id'] ?? 0;
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        
        try {
            // Get product stock and check if product is active
            $stmt = $connection->prepare("
                SELECT c.cart_id, p.stock_quantity, p.is_active 
                FROM carts c
                JOIN products p ON c.product_id = p.product_id
                WHERE c.cart_id = ? AND c.customer_id = ?
            ");
            $stmt->execute([$cart_item_id, $customer_id]);
            $cartItem = $stmt->fetch();
            
            if (!$cartItem) {
                echo json_encode(['status' => 'error', 'message' => 'Cart item not found']);
                exit;
            }
            
            // Check if product is still active
            if (!$cartItem['is_active']) {
                // Remove inactive product from cart
                $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ?");
                $stmt->execute([$cart_item_id]);
                echo json_encode(['status' => 'error', 'message' => 'Product is no longer available and has been removed from cart']);
                exit;
            }
            
            if ($quantity > $cartItem['stock_quantity']) {
                echo json_encode(['status' => 'error', 'message' => 'Quantity exceeds available stock']);
                exit;
            }
            
            $stmt = $connection->prepare("UPDATE carts SET quantity = ? WHERE cart_id = ?");
            $stmt->execute([$quantity, $cart_item_id]);
            
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            error_log("Update cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'remove':
        $cart_item_id = $_POST['cart_item_id'] ?? 0;
        
        try {
            $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ? AND customer_id = ?");
            $stmt->execute([$cart_item_id, $customer_id]);
            
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            error_log("Remove cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'get_count':
        try {
            // Only count active products in cart
            $stmt = $connection->prepare("
                SELECT COUNT(*) as count 
                FROM carts c
                JOIN products p ON c.product_id = p.product_id
                WHERE c.customer_id = ? AND p.is_active = 1
            ");
            $stmt->execute([$customer_id]);
            $count = $stmt->fetch()['count'];
            
            echo json_encode(['status' => 'success', 'count' => $count]);
            
        } catch (PDOException $e) {
            error_log("Get cart count error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'count' => 0]);
        }
        break;
        
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}