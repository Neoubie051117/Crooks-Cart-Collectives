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

try {
    $connection->beginTransaction();

    // Check if this is a single product checkout (Buy Now)
    $singleProductId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $singleQuantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

    if ($singleProductId > 0 && $singleQuantity > 0) {
        // Single product checkout
        // Fetch product details
        $stmt = $connection->prepare("
            SELECT p.*, s.seller_id
            FROM products p
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$singleProductId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            throw new Exception('Product not found');
        }

        if ($singleQuantity > $product['stock_quantity']) {
            throw new Exception("Insufficient stock for {$product['name']}");
        }

        // Insert order
        $orderStmt = $connection->prepare("
            INSERT INTO orders (
                customer_id, seller_id, product_id, quantity, price,
                shipping_address, payment_method, status, order_date
            )
            VALUES (?, ?, ?, ?, ?, ?, 'Cash on Delivery', 'pending', NOW())
        ");
        $orderStmt->execute([
            $customer_id,
            $product['seller_id'],
            $product['product_id'],
            $singleQuantity,
            $product['price'],
            $shipping_address
        ]);

        // Reduce stock
        $updateStock = $connection->prepare("UPDATE products SET stock_quantity = stock_quantity - ? WHERE product_id = ?");
        $updateStock->execute([$singleQuantity, $product['product_id']]);
    } else {
        // Normal cart checkout
        // Get cart items
        $stmt = $connection->prepare("
            SELECT c.*, p.name, p.stock_quantity, p.seller_id
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

        // Insert orders and update stock
        foreach ($cartItems as $item) {
            // Final stock check
            if ($item['quantity'] > $item['stock_quantity']) {
                throw new Exception("Insufficient stock for {$item['name']}");
            }

            $orderStmt = $connection->prepare("
                INSERT INTO orders (
                    customer_id, seller_id, product_id, quantity, price,
                    shipping_address, payment_method, status, order_date
                )
                VALUES (?, ?, ?, ?, ?, ?, 'Cash on Delivery', 'pending', NOW())
            ");
            $orderStmt->execute([
                $customer_id,
                $item['seller_id'],
                $item['product_id'],
                $item['quantity'],
                $item['price'],
                $shipping_address
            ]);

            // Reduce stock
            $updateStock = $connection->prepare("UPDATE products SET stock_quantity = stock_quantity - ? WHERE product_id = ?");
            $updateStock->execute([$item['quantity'], $item['product_id']]);
        }

        // Clear the cart
        $clearStmt = $connection->prepare("DELETE FROM carts WHERE customer_id = ?");
        $clearStmt->execute([$customer_id]);
    }

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