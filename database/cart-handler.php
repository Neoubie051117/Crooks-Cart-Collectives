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

$customer_id = $_SESSION['customer_id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add_to_cart':
        addToCart($customer_id);
        break;
    case 'update':
        updateCartItem($customer_id);
        break;
    case 'remove':
        removeCartItem($customer_id);
        break;
    case 'get_count':
        getCartCount($customer_id);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}

function addToCart($customerId) {
    global $connection;
    
    $productId = $_POST['product_id'] ?? 0;
    $quantity = (int)($_POST['quantity'] ?? 1);

    if (!$productId || $quantity < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid product or quantity']);
        exit;
    }

    try {
        // Get product and seller info
        $stmt = $connection->prepare("
            SELECT p.*, s.seller_id, s.business_name 
            FROM products p
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found']);
            exit;
        }

        // Check stock
        if ($quantity > $product['stock_quantity']) {
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            exit;
        }

        // Check if item already in cart
        $stmt = $connection->prepare("
            SELECT cart_id, quantity 
            FROM carts 
            WHERE customer_id = ? AND product_id = ?
        ");
        $stmt->execute([$customerId, $productId]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            // Update quantity in cart
            $newQuantity = $existing['quantity'] + $quantity;
            
            // Check stock again for new quantity
            if ($newQuantity > $product['stock_quantity']) {
                echo json_encode(['status' => 'error', 'message' => 'Cannot add more than available stock']);
                exit;
            }
            
            $stmt = $connection->prepare("
                UPDATE carts 
                SET quantity = ?
                WHERE cart_id = ?
            ");
            $stmt->execute([$newQuantity, $existing['cart_id']]);
            
            echo json_encode(['status' => 'success', 'message' => 'Cart updated successfully']);
        } else {
            // Insert new cart item
            $stmt = $connection->prepare("
                INSERT INTO carts (customer_id, seller_id, product_id, quantity, price)
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                $customerId,
                $product['seller_id'],
                $productId,
                $quantity,
                $product['price']
            ]);
            
            echo json_encode(['status' => 'success', 'message' => 'Added to cart']);
        }
        
    } catch (PDOException $e) {
        error_log("Add to cart error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}

function updateCartItem($customerId) {
    global $connection;
    
    $cartId = $_POST['cart_item_id'] ?? 0;
    $quantity = (int)($_POST['quantity'] ?? 1);

    if (!$cartId || $quantity < 1) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        exit;
    }

    try {
        // Verify cart item belongs to customer and get product stock
        $stmt = $connection->prepare("
            SELECT p.stock_quantity, c.quantity as current_quantity
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.cart_id = ? AND c.customer_id = ?
        ");
        $stmt->execute([$cartId, $customerId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            echo json_encode(['status' => 'error', 'message' => 'Cart item not found']);
            exit;
        }
        
        if ($quantity > $result['stock_quantity']) {
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            exit;
        }

        $stmt = $connection->prepare("
            UPDATE carts 
            SET quantity = ?
            WHERE cart_id = ? AND customer_id = ?
        ");
        $stmt->execute([$quantity, $cartId, $customerId]);

        echo json_encode(['status' => 'success', 'message' => 'Quantity updated']);
        
    } catch (PDOException $e) {
        error_log("Update cart error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Update failed']);
    }
}

function removeCartItem($customerId) {
    global $connection;
    
    $cartId = $_POST['cart_item_id'] ?? 0;

    if (!$cartId) {
        echo json_encode(['status' => 'error', 'message' => 'Item ID missing']);
        exit;
    }

    try {
        // Verify item belongs to customer before deleting
        $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ? AND customer_id = ?");
        $stmt->execute([$cartId, $customerId]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Item removed']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Item not found']);
        }
        
    } catch (PDOException $e) {
        error_log("Remove cart error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Remove failed']);
    }
}

function getCartCount($customerId) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            SELECT COALESCE(SUM(quantity), 0) as count 
            FROM carts 
            WHERE customer_id = ?
        ");
        $stmt->execute([$customerId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'] ?? 0;
        
        echo json_encode(['status' => 'success', 'count' => (int)$count]);
    } catch (PDOException $e) {
        error_log("Get cart count error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'count' => 0]);
    }
}
?>