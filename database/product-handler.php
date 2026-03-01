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

    try {
        $connection->beginTransaction();
        
        // Insert product first to get product_id
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
        
        // Handle image uploads
        $mediaPath = null;
        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            require_once(__DIR__ . '/data-storage-handler.php');
            $uploadResult = processProductMediaUpload($productId, $_FILES['images']);
            
            if ($uploadResult['status'] === 'success' && isset($uploadResult['media_path'])) {
                $mediaPath = $uploadResult['media_path'];
                
                // Update product with media path
                $stmt = $connection->prepare("UPDATE products SET media_path = ? WHERE product_id = ?");
                $stmt->execute([$mediaPath, $productId]);
            } else {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => $uploadResult['message']]);
                exit;
            }
        }
        
        $connection->commit();
        echo json_encode(['status' => 'success', 'message' => 'Product added successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Add product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to add product']);
    }
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

    try {
        $connection->beginTransaction();
        
        // Update product details
        $stmt = $connection->prepare("
            UPDATE products 
            SET name=?, category=?, price=?, stock_quantity=?, description=?
            WHERE product_id=? AND seller_id=?
        ");
        $stmt->execute([
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['stock_quantity'],
            $_POST['description'],
            $_POST['product_id'],
            $sellerId
        ]);

        // Handle image uploads if new files are provided
        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            require_once(__DIR__ . '/data-storage-handler.php');
            
            // Delete old media
            deleteProductMedia($_POST['product_id']);
            
            // Upload new media
            $uploadResult = processProductMediaUpload($_POST['product_id'], $_FILES['images']);
            
            if ($uploadResult['status'] === 'success' && isset($uploadResult['media_path'])) {
                // Update media path
                $stmt = $connection->prepare("UPDATE products SET media_path = ? WHERE product_id = ?");
                $stmt->execute([$uploadResult['media_path'], $_POST['product_id']]);
            } else {
                $connection->rollBack();
                echo json_encode(['status' => 'error', 'message' => $uploadResult['message']]);
                exit;
            }
        }
        
        $connection->commit();
        echo json_encode(['status' => 'success', 'message' => 'Product updated successfully']);
        
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Update product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update product']);
    }
}

function deleteProduct($sellerId) {
    global $connection;

    if (empty($_POST['product_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        exit;
    }

    try {
        $connection->beginTransaction();
        
        // Verify ownership and delete
        $stmt = $connection->prepare("DELETE FROM products WHERE product_id = ? AND seller_id = ?");
        $stmt->execute([$_POST['product_id'], $sellerId]);

        if ($stmt->rowCount() > 0) {
            // Delete media files
            require_once(__DIR__ . '/data-storage-handler.php');
            deleteProductMedia($_POST['product_id']);
            
            $connection->commit();
            echo json_encode(['status' => 'success', 'message' => 'Product deleted']);
        } else {
            $connection->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Product not found or unauthorized']);
        }
    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Delete product error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete product']);
    }
}
?>