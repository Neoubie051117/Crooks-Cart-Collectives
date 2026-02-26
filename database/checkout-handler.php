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
        SELECT c.*, p.price, p.name, p.stock_quantity, p.seller_id
        FROM carts c
        JOIN products p ON c.product_id = p.product_id
        WHERE c.customer_id = ?
    ");
    $stmt->execute([$customer_id]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($cartItems)) {
        echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
        exit;
    }

    // Validate stock and insert orders
    foreach ($cartItems as $item) {
        // Final stock check
        if ($item['quantity'] > $item['stock_quantity']) {
            throw new Exception("Insufficient stock for {$item['name']}");
        }
        
        // Insert into orders table
        $orderStmt = $connection->prepare("
            INSERT INTO orders (customer_id, seller_id, product_id, quantity, price_at_time, shipping_address, payment_method)
            VALUES (?, ?, ?, ?, ?, ?, 'Cash on Delivery')
        ");
        $orderStmt->execute([
            $customer_id,
            $item['seller_id'],
            $item['product_id'],
            $item['quantity'],
            $item['price_at_time'],
            $shipping_address
        ]);
        
        // Note: Stock is automatically reduced by the BEFORE INSERT trigger on orders table
    }

    // Clear the cart
    $clearStmt = $connection->prepare("DELETE FROM carts WHERE customer_id = ?");
    $clearStmt->execute([$customer_id]);

    $connection->commit();

    echo json_encode([
        'status' => 'success',
        'message' => 'Order placed successfully',
        'redirect' => 'orders.php'
    ]);

} catch (Exception $e) {
    $connection->rollBack();
    error_log("Checkout error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Failed to place order: ' . $e->getMessage()]);
}
?>