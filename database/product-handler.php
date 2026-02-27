<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$sellerId = $_SESSION['seller_id'];
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'add':
        addProduct($sellerId);
        break;
    case 'update':
        updateProduct($sellerId);
        break;
    case 'delete':
        deleteProduct($sellerId);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function addProduct($sellerId) {
    global $connection;

    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Handle image upload
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/products/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . $sellerId . '.' . $extension;
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = 'database/uploads/products/' . $fileName;
        }
    }

    $stmt = $connection->prepare("
        INSERT INTO products (seller_id, name, category, price, stock_quantity, description, image_path, date_added)
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([
        $sellerId,
        $_POST['name'],
        $_POST['category'],
        $_POST['price'],
        $_POST['stock_quantity'],
        $_POST['description'],
        $imagePath
    ]);

    // Removed total_products update – column no longer exists

    echo json_encode(['status' => 'success', 'message' => 'Product added successfully']);
}

function updateProduct($sellerId) {
    global $connection;

    if (empty($_POST['product_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Verify ownership
    $stmt = $connection->prepare("SELECT product_id FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_POST['product_id'], $sellerId]);
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
        exit;
    }

    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Handle image upload (optional)
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/products/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . $sellerId . '.' . $extension;
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = 'database/uploads/products/' . $fileName;
        }
    }

    $query = "UPDATE products SET name=?, category=?, price=?, stock_quantity=?, description=?";
    $params = [$_POST['name'], $_POST['category'], $_POST['price'], $_POST['stock_quantity'], $_POST['description']];

    if ($imagePath) {
        $query .= ", image_path=?";
        $params[] = $imagePath;
    }

    $query .= " WHERE product_id=? AND seller_id=?";
    $params[] = $_POST['product_id'];
    $params[] = $sellerId;

    $stmt = $connection->prepare($query);
    $stmt->execute($params);

    echo json_encode(['status' => 'success', 'message' => 'Product updated successfully']);
}

function deleteProduct($sellerId) {
    global $connection;

    if (empty($_POST['product_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Verify ownership and delete
    $stmt = $connection->prepare("DELETE FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_POST['product_id'], $sellerId]);

    if ($stmt->rowCount() > 0) {
        // Removed total_products update – column no longer exists
        
        echo json_encode(['status' => 'success', 'message' => 'Product deleted']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
    }
}
?>