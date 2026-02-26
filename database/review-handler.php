<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in as customer']);
    exit;
}

$user_id = $_SESSION['user_id'];
$customer_id = $_SESSION['customer_id'];

$order_id = $_POST['order_id'] ?? 0;
$product_id = $_POST['product_id'] ?? 0;
$rating = (int)($_POST['rating'] ?? 0);
$comment = trim($_POST['comment'] ?? '');

if (!$order_id || !$product_id || !$rating || $rating < 1 || $rating > 5) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

try {
    // Verify order belongs to customer, is delivered, and matches product
    $stmt = $connection->prepare("
        SELECT order_id
        FROM orders
        WHERE order_id = ? 
          AND customer_id = ?
          AND product_id = ?
          AND status = 'delivered'
    ");
    $stmt->execute([$order_id, $customer_id, $product_id]);
    
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Item not delivered or not found']);
        exit;
    }

    // Check if already reviewed (unique order_id in product_reviews)
    $stmt = $connection->prepare("
        SELECT review_id FROM product_reviews
        WHERE order_id = ?
    ");
    $stmt->execute([$order_id]);
    
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'You have already reviewed this product']);
        exit;
    }

    // Insert review
    $stmt = $connection->prepare("
        INSERT INTO product_reviews (product_id, user_id, order_id, rating, comment, date_posted)
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([$product_id, $user_id, $order_id, $rating, $comment]);

    echo json_encode(['status' => 'success', 'message' => 'Review submitted']);

} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo json_encode(['status' => 'error', 'message' => 'You have already reviewed this product']);
    } else {
        error_log("Review insert error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>