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

$customerId = $_SESSION['customer_id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add_to_cart':
        addToCart($customerId);
        break;
    case 'update':
        updateCartItem();
        break;
    case 'remove':
        removeCartItem();
        break;
    case 'get_count':
        getCartCount($customerId);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function addToCart($customerId) {
    global $connection;
    $productId = $_POST['product_id'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;

    if (!$productId) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Get cart_id
    $stmt = $connection->prepare("SELECT cart_id FROM shopping_carts WHERE customer_id = ?");
    $stmt->execute([$customerId]);
    $cart = $stmt->fetch();
    if (!$cart) {
        // Create cart if missing
        $stmt = $connection->prepare("INSERT INTO shopping_carts (customer_id) VALUES (?)");
        $stmt->execute([$customerId]);
        $cartId = $connection->lastInsertId();
    } else {
        $cartId = $cart['cart_id'];
    }

    // Check if product already in cart
    $stmt = $connection->prepare("SELECT cart_item_id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?");
    $stmt->execute([$cartId, $productId]);
    $existing = $stmt->fetch();

    if ($existing) {
        // Update quantity
        $newQty = $existing['quantity'] + $quantity;
        $stmt = $connection->prepare("UPDATE cart_items SET quantity = ? WHERE cart_item_id = ?");
        $stmt->execute([$newQty, $existing['cart_item_id']]);
    } else {
        // Insert new
        $stmt = $connection->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$cartId, $productId, $quantity]);
    }

    echo json_encode(['status' => 'success', 'message' => 'Added to cart']);
}

function updateCartItem() {
    global $connection;
    $itemId = $_POST['cart_item_id'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;

    if (!$itemId || $quantity < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit;
    }

    $stmt = $connection->prepare("UPDATE cart_items SET quantity = ? WHERE cart_item_id = ?");
    $stmt->execute([$quantity, $itemId]);

    echo json_encode(['status' => 'success']);
}

function removeCartItem() {
    global $connection;
    $itemId = $_POST['cart_item_id'] ?? 0;

    if (!$itemId) {
        echo json_encode(['status' => 'error', 'message' => 'Item ID missing']);
        exit;
    }

    $stmt = $connection->prepare("DELETE FROM cart_items WHERE cart_item_id = ?");
    $stmt->execute([$itemId]);

    echo json_encode(['status' => 'success']);
}

function getCartCount($customerId) {
    global $connection;
    $stmt = $connection->prepare("
        SELECT SUM(quantity) as count 
        FROM cart_items ci
        JOIN shopping_carts sc ON ci.cart_id = sc.cart_id
        WHERE sc.customer_id = ?
    ");
    $stmt->execute([$customerId]);
    $result = $stmt->fetch();
    $count = $result['count'] ?? 0;
    echo json_encode(['status' => 'success', 'count' => (int)$count]);
}
?>