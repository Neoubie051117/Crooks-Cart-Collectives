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

// Get payment method from POST
$payment_method = $_POST['payment_method'] ?? 'COD';
if (!in_array($payment_method, ['COD', 'Online'])) {
    $payment_method = 'COD'; // Default to COD if invalid
}

// Get shipping address from POST (this is the current displayed address)
$shipping_address = $_POST['shipping_address'] ?? '';

// Validate shipping address
if (empty(trim($shipping_address))) {
    echo json_encode(['status' => 'error', 'message' => 'Shipping address is required']);
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
        
        // Double-check that customer exists
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $customer_check = $stmt->fetch();
        
        if (!$customer_check) {
            // Create customer record if missing
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$user_id]);
            $customer_id = $connection->lastInsertId();
            $_SESSION['customer_id'] = $customer_id; // Update session
        }
        
        $subtotal = $product['price'] * $quantity;
        
        // Create order with payment method
        $stmt = $connection->prepare("
            INSERT INTO orders (
                customer_id, seller_id, product_id, quantity, 
                price, subtotal, shipping_address, payment_method, status, order_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
        ");
        $stmt->execute([
            $customer_id, 
            $product['seller_id'], 
            $product_id, 
            $quantity, 
            $product['price'], 
            $subtotal, 
            $shipping_address,
            $payment_method
        ]);
        
        // Update stock
        $new_stock = $product['stock_quantity'] - $quantity;
        $stmt = $connection->prepare("UPDATE products SET stock_quantity = ? WHERE product_id = ?");
        $stmt->execute([$new_stock, $product_id]);
        
    } else {
        // Cart checkout - only include active products
        // Get cart items with product active status check
        $stmt = $connection->prepare("
            SELECT c.*, p.stock_quantity, p.is_active, p.price as current_price, p.name, p.seller_id
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
        
        // Double-check that customer exists
        $stmt = $connection->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $customer_check = $stmt->fetch();
        
        if (!$customer_check) {
            // Create customer record if missing
            $stmt = $connection->prepare("INSERT INTO customers (user_id) VALUES (?)");
            $stmt->execute([$user_id]);
            $customer_id = $connection->lastInsertId();
            $_SESSION['customer_id'] = $customer_id; // Update session
        }
        
        // Create orders with payment method and update stock
        foreach ($cartItems as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            
            $stmt = $connection->prepare("
                INSERT INTO orders (
                    customer_id, seller_id, product_id, quantity, 
                    price, subtotal, shipping_address, payment_method, status, order_date
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
            ");
            $stmt->execute([
                $customer_id, 
                $item['seller_id'], 
                $item['product_id'], 
                $item['quantity'], 
                $item['price'], 
                $subtotal, 
                $shipping_address,
                $payment_method
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
    
    // Determine payment method display message
    $payment_message = ($payment_method === 'Online') ? 'Online payment selected (Gcash/Maya)' : 'Cash on Delivery selected';
    
    echo json_encode([
        'status' => 'success', 
        'message' => 'Order placed successfully. ' . $payment_message, 
        'redirect' => 'orders.php'
    ]);
    
} catch (PDOException $e) {
    $connection->rollBack();
    error_log("Checkout error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error occurred: ' . $e->getMessage()]);
}