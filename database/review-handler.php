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

$order_item_id = $_POST['order_item_id'] ?? 0;
$product_id = $_POST['product_id'] ?? 0;
$rating = $_POST['rating'] ?? 0;
$comment = trim($_POST['comment'] ?? '');

if (!$order_item_id || !$product_id || !$rating || $rating < 1 || $rating > 5) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

try {
    // Verify item belongs to customer and is delivered
    $stmt = $connection->prepare("
        SELECT pi.order_item_id
        FROM purchase_items pi
        JOIN seller_orders so ON pi.seller_order_id = so.seller_order_id
        JOIN customer_orders co ON so.order_id = co.order_id
        WHERE pi.order_item_id = ? 
          AND co.customer_id = ?
          AND pi.product_id = ?
          AND pi.status = 'delivered'
    ");
    $stmt->execute([$order_item_id, $customer_id, $product_id]);
    
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Item not delivered or not found']);
        exit;
    }

    // Check if already reviewed
    $stmt = $connection->prepare("
        SELECT review_id FROM product_reviews
        WHERE order_item_id = ?
    ");
    $stmt->execute([$order_item_id]);
    
    if ($stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'You have already reviewed this product']);
        exit;
    }

    // Insert review
    $stmt = $connection->prepare("
        INSERT INTO product_reviews (product_id, user_id, order_item_id, rating, comment, date_posted)
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([$product_id, $user_id, $order_item_id, $rating, $comment]);

    echo json_encode(['status' => 'success', 'message' => 'Review submitted']);

} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) { // Duplicate entry
        echo json_encode(['status' => 'error', 'message' => 'You have already reviewed this product']);
    } else {
        error_log("Review insert error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>