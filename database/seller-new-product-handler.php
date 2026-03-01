<?php
session_start();
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

require_once(__DIR__ . '/database-connect.php');
require_once(__DIR__ . '/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$sellerId = $_SESSION['seller_id'];
$action = $_POST['action'] ?? '';

if ($action !== 'add' && $action !== 'update') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

if ($action === 'add') {
    addProduct($sellerId);
} else {
    updateProduct($sellerId);
}

function addProduct($sellerId) {
    global $connection;

    // Validate required fields
    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Validate images (at least 2, max 5)
    if (!isset($_FILES['images'])) {
        echo json_encode(['status' => 'error', 'message' => 'Please upload product images']);
        exit;
    }

    $imageCount = count(array_filter($_FILES['images']['name']));
    if ($imageCount < 2) {
        echo json_encode(['status' => 'error', 'message' => 'At least 2 images are required']);
        exit;
    }
    if ($imageCount > 5) {
        echo json_encode(['status' => 'error', 'message' => 'Maximum 5 images allowed']);
        exit;
    }

    // Start transaction
    $connection->beginTransaction();

    try {
        // Insert product record with temporary media_path (will update after upload)
        $stmt = $connection->prepare("
            INSERT INTO products (seller_id, name, category, price, stock_quantity, description, date_added)
            VALUES (?, ?, ?, ?, ?, ?, NOW())
        ");
        $stmt->execute([
            $sellerId,
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['stock_quantity'],
            $_POST['description']
        ]);
        $productId = $connection->lastInsertId();

        // Upload media using data-storage-handler (images only)
        $uploadResult = processProductMediaUpload($productId, $_FILES['images'], null); // no video

        if ($uploadResult['status'] !== 'success') {
            throw new Exception($uploadResult['message']);
        }

        // Update product with media_path (directory path)
        $mediaPath = 'Crooks-Data-Storage/products/' . $productId . '/media/';
        $stmt = $connection->prepare("UPDATE products SET media_path = ? WHERE product_id = ?");
        $stmt->execute([$mediaPath, $productId]);

        $connection->commit();

        echo json_encode([
            'status' => 'success',
            'message' => 'Product added successfully',
            'product_id' => $productId
        ]);

    } catch (Exception $e) {
        $connection->rollBack();
        // Delete any partially uploaded media
        deleteProductMedia($productId);
        error_log("Add product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

function updateProduct($sellerId) {
    global $connection;

    $productId = $_POST['product_id'] ?? 0;
    if (!$productId) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    // Verify ownership
    $stmt = $connection->prepare("SELECT product_id, media_path FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$productId, $sellerId]);
    $existing = $stmt->fetch();
    if (!$existing) {
        echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
        exit;
    }

    // Validate required fields
    $required = ['name', 'category', 'price', 'stock_quantity', 'description'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // If new images are uploaded, validate them
    $newImagesUploaded = isset($_FILES['images']) && count(array_filter($_FILES['images']['name'])) > 0;
    if ($newImagesUploaded) {
        $imageCount = count(array_filter($_FILES['images']['name']));
        if ($imageCount < 2) {
            echo json_encode(['status' => 'error', 'message' => 'At least 2 images are required']);
            exit;
        }
        if ($imageCount > 5) {
            echo json_encode(['status' => 'error', 'message' => 'Maximum 5 images allowed']);
            exit;
        }
    }

    $connection->beginTransaction();

    try {
        // Update product details
        $stmt = $connection->prepare("
            UPDATE products
            SET name = ?, category = ?, price = ?, stock_quantity = ?, description = ?
            WHERE product_id = ? AND seller_id = ?
        ");
        $stmt->execute([
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['stock_quantity'],
            $_POST['description'],
            $productId,
            $sellerId
        ]);

        // If new media uploaded, delete old and upload new
        if ($newImagesUploaded) {
            // Delete existing media
            deleteProductMedia($productId);

            // Upload new media (images only)
            $uploadResult = processProductMediaUpload($productId, $_FILES['images'], null);
            if ($uploadResult['status'] !== 'success') {
                throw new Exception($uploadResult['message']);
            }

            // Update media_path (it might be the same, but ensure it's set)
            $mediaPath = 'Crooks-Data-Storage/products/' . $productId . '/media/';
            $stmt = $connection->prepare("UPDATE products SET media_path = ? WHERE product_id = ?");
            $stmt->execute([$mediaPath, $productId]);
        }

        $connection->commit();

        echo json_encode([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'product_id' => $productId
        ]);

    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Update product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>