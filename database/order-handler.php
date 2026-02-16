<?php
session_start();
header('Content-Type: application/json');

require_once(__DIR__ . '/database-connect.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$is_customer = isset($_SESSION['is_customer']) && $_SESSION['is_customer'];
$is_seller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'];

switch ($action) {
    case 'get_customer_orders':
        if (!$is_customer) {
            echo json_encode(['status' => 'error', 'message' => 'Not a customer']);
            exit;
        }
        getCustomerOrders($connection, $_SESSION['customer_id']);
        break;

    case 'get_seller_orders':
        if (!$is_seller) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        getSellerOrders($connection, $_SESSION['seller_id']);
        break;

    case 'update_item_status':
        if (!$is_seller) {
            echo json_encode(['status' => 'error', 'message' => 'Not a seller']);
            exit;
        }
        updateItemStatus($connection, $_SESSION['seller_id']);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function getCustomerOrders($connection, $customer_id) {
    try {
        $stmt = $connection->prepare("
            SELECT o.*, u.first_name, u.last_name
            FROM customer_orders o
            JOIN users u ON o.customer_id = (SELECT customer_id FROM customers WHERE user_id = ?)
            WHERE o.customer_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$_SESSION['user_id'], $customer_id]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // For each order, fetch its items
        foreach ($orders as &$order) {
            $stmtItems = $connection->prepare("
                SELECT pi.*, p.name, p.image_path, s.business_name, s.seller_id,
                       (SELECT COUNT(*) FROM product_reviews WHERE order_id = pi.order_id AND product_id = pi.product_id) as reviewed
                FROM purchase_items pi
                JOIN products p ON pi.product_id = p.product_id
                JOIN sellers s ON p.seller_id = s.seller_id
                WHERE pi.order_id = ?
            ");
            $stmtItems->execute([$order['order_id']]);
            $order['items'] = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(['status' => 'success', 'data' => $orders]);
    } catch (Exception $e) {
        error_log("getCustomerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function getSellerOrders($connection, $seller_id) {
    try {
        $stmt = $connection->prepare("
            SELECT DISTINCT o.order_id, o.order_date, o.customer_id, o.total_amount, o.status, o.shipping_address,
                   u.first_name, u.last_name, u.email, u.contact_number
            FROM customer_orders o
            JOIN purchase_items pi ON o.order_id = pi.order_id
            JOIN products p ON pi.product_id = p.product_id
            JOIN users u ON o.customer_id = (SELECT customer_id FROM customers WHERE user_id = u.user_id)
            WHERE p.seller_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$seller_id]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($orders as &$order) {
            $stmtItems = $connection->prepare("
                SELECT pi.*, p.name, p.image_path, p.price
                FROM purchase_items pi
                JOIN products p ON pi.product_id = p.product_id
                WHERE pi.order_id = ? AND p.seller_id = ?
            ");
            $stmtItems->execute([$order['order_id'], $seller_id]);
            $order['items'] = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(['status' => 'success', 'data' => $orders]);
    } catch (Exception $e) {
        error_log("getSellerOrders error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch orders']);
    }
}

function updateItemStatus($connection, $seller_id) {
    $item_id = $_POST['item_id'] ?? 0;
    $new_status = $_POST['status'] ?? '';

    if (!$item_id || !in_array($new_status, ['shipped', 'delivered'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit;
    }

    try {
        // Verify item belongs to seller
        $stmt = $connection->prepare("
            SELECT pi.order_item_id
            FROM purchase_items pi
            JOIN products p ON pi.product_id = p.product_id
            WHERE pi.order_item_id = ? AND p.seller_id = ?
        ");
        $stmt->execute([$item_id, $seller_id]);
        if (!$stmt->fetch()) {
            echo json_encode(['status' => 'error', 'message' => 'Item not found or unauthorized']);
            exit;
        }

        $update = $connection->prepare("
            UPDATE purchase_items
            SET seller_status = ?,
                shipped_at = IF(? = 'shipped', NOW(), shipped_at),
                delivered_at = IF(? = 'delivered', NOW(), delivered_at)
            WHERE order_item_id = ?
        ");
        $update->execute([$new_status, $new_status, $new_status, $item_id]);

        echo json_encode(['status' => 'success', 'message' => 'Status updated']);
    } catch (Exception $e) {
        error_log("updateItemStatus error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>