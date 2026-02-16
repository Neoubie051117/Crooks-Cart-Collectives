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

    // Get cart items
    $stmt = $connection->prepare("
        SELECT ci.*, p.price, p.seller_id
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

    // Calculate total
    $total_amount = 0;
    foreach ($cartItems as $item) {
        $total_amount += $item['price'] * $item['quantity'];
    }

    // Insert into customer_orders
    $stmt = $connection->prepare("
        INSERT INTO customer_orders (customer_id, total_amount, shipping_address, payment_method, order_date, status)
        VALUES (?, ?, ?, 'Cash on Delivery', NOW(), 'pending')
    ");
    $stmt->execute([$customer_id, $total_amount, $shipping_address]);
    $order_id = $connection->lastInsertId();

    // Insert each item into purchase_items
    $insertItem = $connection->prepare("
        INSERT INTO purchase_items (order_id, product_id, quantity, price_at_time, seller_status)
        VALUES (?, ?, ?, ?, 'pending')
    ");
    foreach ($cartItems as $item) {
        $insertItem->execute([$order_id, $item['product_id'], $item['quantity'], $item['price']]);
    }

    // Clear the cart
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
    echo json_encode(['status' => 'error', 'message' => 'Failed to place order. Please try again.']);
}
?>