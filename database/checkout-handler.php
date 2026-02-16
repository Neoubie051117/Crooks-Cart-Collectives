<?php
session_start();
header('Content-Type: application/json');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];

// Fetch shipping address from user profile
$stmt = $connection->prepare("SELECT address FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
if (!$user || empty($user['address'])) {
    echo json_encode(['status' => 'error', 'message' => 'Please complete your profile with a shipping address first.']);
    exit;
}
$shipping_address = $user['address'];

// Begin transaction
try {
    $connection->beginTransaction();

    // Get cart items with seller info
    $stmt = $connection->prepare("
        SELECT ci.*, p.price, p.seller_id, p.name, p.stock_quantity
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.product_id
        WHERE ci.cart_id = (SELECT cart_id FROM shopping_carts WHERE customer_id = ?)
    ");
    $stmt->execute([$customer_id]);
    $cartItems = $stmt->fetchAll();

    if (empty($cartItems)) {
        echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
        exit;
    }

    // Calculate total and validate stock
    $total_amount = 0;
    foreach ($cartItems as $item) {
        $total_amount += $item['price'] * $item['quantity'];
        
        // Check stock
        if ($item['quantity'] > $item['stock_quantity']) {
            throw new Exception("Insufficient stock for {$item['name']}");
        }
    }

    // 1. Insert into customer_orders (NO status column - removed from INSERT)
    $stmt = $connection->prepare("
        INSERT INTO customer_orders (customer_id, total_amount, shipping_address, payment_method, order_date)
        VALUES (?, ?, ?, 'Cash on Delivery', NOW())
    ");
    $stmt->execute([$customer_id, $total_amount, $shipping_address]);
    $order_id = $connection->lastInsertId();

    // 2. Group items by seller
    $sellerGroups = [];
    foreach ($cartItems as $item) {
        $sellerGroups[$item['seller_id']][] = $item;
    }

    // 3. Create seller_orders for each seller
    $sellerOrderMap = []; // Maps seller_id to seller_order_id
    foreach ($sellerGroups as $seller_id => $items) {
        $seller_total = 0;
        foreach ($items as $item) {
            $seller_total += $item['price'] * $item['quantity'];
        }
        
        $stmt = $connection->prepare("
            INSERT INTO seller_orders (order_id, seller_id, seller_total, seller_status)
            VALUES (?, ?, ?, 'pending')
        ");
        $stmt->execute([$order_id, $seller_id, $seller_total]);
        $sellerOrderMap[$seller_id] = $connection->lastInsertId();
    }

    // 4. Insert into purchase_items (this is where status belongs)
    $insertItem = $connection->prepare("
        INSERT INTO purchase_items (seller_order_id, product_id, quantity, price_at_time, status)
        VALUES (?, ?, ?, ?, 'pending')
    ");
    
    foreach ($cartItems as $item) {
        $seller_order_id = $sellerOrderMap[$item['seller_id']];
        $insertItem->execute([
            $seller_order_id,
            $item['product_id'],
            $item['quantity'],
            $item['price']
        ]);
        
        // Update product stock
        $updateStock = $connection->prepare("
            UPDATE products 
            SET stock_quantity = stock_quantity - ? 
            WHERE product_id = ?
        ");
        $updateStock->execute([$item['quantity'], $item['product_id']]);
    }

    // 5. Clear the cart
    $stmt = $connection->prepare("
        DELETE FROM cart_items
        WHERE cart_id = (SELECT cart_id FROM shopping_carts WHERE customer_id = ?)
    ");
    $stmt->execute([$customer_id]);

    $connection->commit();

    echo json_encode([
        'status' => 'success',
        'message' => 'Order placed successfully',
        'order_id' => $order_id,
        'redirect' => 'orders.php'
    ]);

} catch (Exception $e) {
    $connection->rollBack();
    error_log("Checkout error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Failed to place order: ' . $e->getMessage()]);
}
?>