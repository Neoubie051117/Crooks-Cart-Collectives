<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];
$action = $_POST['action'] ?? '';

if ($action !== 'place_order') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

try {
    $connection->beginTransaction();
    
    // Check if this is a direct order (single product without cart) or cart checkout
    $product_id = $_POST['product_id'] ?? 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    if ($product_id > 0) {
        // Single product checkout (Buy Now)
        // Verify product is active
        $stmt = $connection->prepare("
            SELECT p.*, s.seller_id 
            FROM products p 
            JOIN sellers s ON p.seller_id = s.seller_id 
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();
        
        if (!$product) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Product not available']);
            exit;
        }
        
        if ($product['stock_quantity'] < $quantity) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            exit;
        }
        
        // Get user shipping address
        $stmt = $connection->prepare("SELECT address FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
        
        $shipping_address = $user['address'] ?? '';
        $subtotal = $product['price'] * $quantity;
        
        // Create order
        $stmt = $connection->prepare("
            INSERT INTO orders (
                customer_id, seller_id, product_id, quantity, 
                price, subtotal, shipping_address, status, order_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
        ");
        $stmt->execute([
            $customer_id, 
            $product['seller_id'], 
            $product_id, 
            $quantity, 
            $product['price'], 
            $subtotal, 
            $shipping_address
        ]);
        
        // Update stock
        $new_stock = $product['stock_quantity'] - $quantity;
        $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
        $stmt->execute([$new_stock, $product_id]);
        
    } else {
        // Cart checkout - only include active products
        // Get cart items with product active status check
        $stmt = $connection->prepare("
            SELECT c.*, p.stock_quantity, p.is_active, p.price as current_price, p.name
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        $cartItems = $stmt->fetchAll();
        
        if (empty($cartItems)) {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
            exit;
        }
        
        // Check for inactive products
        $inactiveProducts = [];
        foreach ($cartItems as $item) {
            if (!$item['is_active']) {
                $inactiveProducts[] = $item['name'];
            }
        }
        
        if (!empty($inactiveProducts)) {
            $connection->rollBack();
            $productList = implode(', ', $inactiveProducts);
            echo json_encode(['status' => 'error', 'message' => 'The following products are no longer available: ' . $productList]);
            exit;
        }
        
        // Check stock for all items
        foreach ($cartItems as $item) {
            if ($item['quantity'] > $item['stock_quantity']) {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Insufficient stock for ' . $item['name']]);
                exit;
            }
        }
        
        // Get user shipping address
        $stmt = $connection->prepare("SELECT address FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
        $shipping_address = $user['address'] ?? '';
        
        // Create orders and update stock
        foreach ($cartItems as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            
            $stmt = $connection->prepare("
                INSERT INTO orders (
                    customer_id, seller_id, product_id, quantity, 
                    price, subtotal, shipping_address, status, order_date
                ) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
            ");
            $stmt->execute([
                $customer_id, 
                $item['seller_id'], 
                $item['product_id'], 
                $item['quantity'], 
                $item['price'], 
                $subtotal, 
                $shipping_address
            ]);
            
            // Update stock
            $new_stock = $item['stock_quantity'] - $item['quantity'];
            $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
            $stmt->execute([$new_stock, $item['product_id']]);
        }
        
        // Clear cart
        $stmt = $connection->prepare("DELETE FROM carts WHERE customer_id = ?");
        $stmt->execute([$customer_id]);
    }
    
    $connection->commit();
    echo json_encode(['status' => 'success', 'message' => 'Order placed successfully', 'redirect' => 'orders.php']);
    
} catch (PDOException $e) {
    $connection->rollBack();
    error_log("Checkout error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
}