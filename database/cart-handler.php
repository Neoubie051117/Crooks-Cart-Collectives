<?php
session_start();
require_once 'database-connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$customer_id = $_SESSION['customer_id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

// ===== FUNCTION: Validate cart items WITHOUT deleting them =====
// Products that become inactive should remain in cart but be marked unavailable
function validateCartItems($connection, $customer_id) {
    try {
        // Get all cart items with current product info - DO NOT filter by is_active
        // This ensures inactive products are still returned
        $stmt = $connection->prepare("
            SELECT 
                c.cart_id,
                c.product_id,
                c.quantity as cart_quantity,
                p.stock_quantity,
                p.is_active,
                p.name,
                p.price as current_price
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $validationResults = [
            'inactive_found' => [],      // Products that are inactive
            'stock_adjusted' => [],       // Products that need quantity adjustment
            'valid_items' => []           // Items that are perfectly valid
        ];
        
        foreach ($cartItems as $item) {
            // Product is inactive - keep in cart but mark as unavailable
            if (!$item['is_active']) {
                $validationResults['inactive_found'][] = [
                    'product_name' => $item['name'],
                    'cart_id' => $item['cart_id'],
                    'quantity' => $item['cart_quantity']
                ];
                continue;
            }
            
            // Stock has changed (product was ordered by someone else)
            if ($item['cart_quantity'] > $item['stock_quantity']) {
                if ($item['stock_quantity'] > 0) {
                    // Stock reduced but still available - suggest adjustment
                    $validationResults['stock_adjusted'][] = [
                        'product_name' => $item['name'],
                        'cart_id' => $item['cart_id'],
                        'old_quantity' => $item['cart_quantity'],
                        'new_quantity' => $item['stock_quantity'],
                        'action' => 'adjust'
                    ];
                } else {
                    // Out of stock - mark as unavailable but don't delete
                    $validationResults['stock_adjusted'][] = [
                        'product_name' => $item['name'],
                        'cart_id' => $item['cart_id'],
                        'old_quantity' => $item['cart_quantity'],
                        'new_quantity' => 0,
                        'action' => 'out_of_stock'
                    ];
                }
            } else {
                // Item is valid
                $validationResults['valid_items'][] = $item;
            }
        }
        
        return $validationResults;
        
    } catch (PDOException $e) {
        error_log("Cart validation error: " . $e->getMessage());
        return ['error' => $e->getMessage()];
    }
}

switch ($action) {
    case 'add_to_cart':
        $product_id = $_POST['product_id'] ?? 0;
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        
        if (!$product_id) {
            echo json_encode(['status' => 'error', 'message' => 'Product ID required']);
            exit;
        }
        
        try {
            // Check if product exists and is active (only active products can be added)
            $stmt = $connection->prepare("
                SELECT p.*, s.seller_id 
                FROM products p 
                JOIN sellers s ON p.seller_id = s.seller_id 
                WHERE p.product_id = ? AND p.is_active = 1
            ");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch();
            
            if (!$product) {
                echo json_encode(['status' => 'error', 'message' => 'Product not available']);
                exit;
            }
            
            if ($product['stock_quantity'] < $quantity) {
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Insufficient stock. Available: ' . $product['stock_quantity']
                ]);
                exit;
            }
            
            // Check if already in cart
            $stmt = $connection->prepare("
                SELECT cart_id, quantity FROM carts 
                WHERE customer_id = ? AND product_id = ?
            ");
            $stmt->execute([$customer_id, $product_id]);
            $existing = $stmt->fetch();
            
            if ($existing) {
                // Update existing - check if new total exceeds stock
                $newQuantity = $existing['quantity'] + $quantity;
                if ($newQuantity > $product['stock_quantity']) {
                    $newQuantity = $product['stock_quantity'];
                }
                
                $stmt = $connection->prepare("
                    UPDATE carts 
                    SET quantity = ?, price = ? 
                    WHERE cart_id = ?
                ");
                $stmt->execute([$newQuantity, $product['price'], $existing['cart_id']]);
                
                $message = $newQuantity < $existing['quantity'] + $quantity 
                    ? 'Added to cart (quantity adjusted to available stock)' 
                    : 'Added to cart';
                    
            } else {
                // Insert new
                $stmt = $connection->prepare("
                    INSERT INTO carts (customer_id, product_id, seller_id, quantity, price) 
                    VALUES (?, ?, ?, ?, ?)
                ");
                $stmt->execute([$customer_id, $product_id, $product['seller_id'], $quantity, $product['price']]);
                $message = 'Added to cart';
            }
            
            echo json_encode([
                'status' => 'success', 
                'message' => $message
            ]);
            
        } catch (PDOException $e) {
            error_log("Add to cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'update':
        $cart_item_id = $_POST['cart_item_id'] ?? 0;
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        
        try {
            // Get product stock and check if product is active
            $stmt = $connection->prepare("
                SELECT c.cart_id, p.stock_quantity, p.is_active, p.name
                FROM carts c
                JOIN products p ON c.product_id = p.product_id
                WHERE c.cart_id = ? AND c.customer_id = ?
            ");
            $stmt->execute([$cart_item_id, $customer_id]);
            $cartItem = $stmt->fetch();
            
            if (!$cartItem) {
                echo json_encode(['status' => 'error', 'message' => 'Cart item not found']);
                exit;
            }
            
            // If product is inactive, prevent update but keep in cart
            if (!$cartItem['is_active']) {
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Product "' . $cartItem['name'] . '" is no longer available and cannot be modified',
                    'inactive' => true
                ]);
                exit;
            }
            
            if ($quantity > $cartItem['stock_quantity']) {
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Quantity exceeds available stock. Available: ' . $cartItem['stock_quantity'],
                    'max_stock' => $cartItem['stock_quantity']
                ]);
                exit;
            }
            
            $stmt = $connection->prepare("UPDATE carts SET quantity = ? WHERE cart_id = ?");
            $stmt->execute([$quantity, $cart_item_id]);
            
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            error_log("Update cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'remove':
        $cart_item_id = $_POST['cart_item_id'] ?? 0;
        
        try {
            // User initiated removal - ONLY then delete
            $stmt = $connection->prepare("DELETE FROM carts WHERE cart_id = ? AND customer_id = ?");
            $stmt->execute([$cart_item_id, $customer_id]);
            
            echo json_encode(['status' => 'success']);
            
        } catch (PDOException $e) {
            error_log("Remove cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'get_count':
        try {
            // Count all cart items (including inactive - they still count toward cart count)
            $stmt = $connection->prepare("
                SELECT COUNT(*) as count 
                FROM carts c
                WHERE c.customer_id = ?
            ");
            $stmt->execute([$customer_id]);
            $count = $stmt->fetch()['count'];
            
            echo json_encode(['status' => 'success', 'count' => $count]);
            
        } catch (PDOException $e) {
            error_log("Get cart count error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'count' => 0]);
        }
        break;
        
    case 'validate':
        try {
            $validationResults = validateCartItems($connection, $customer_id);
            
            if (isset($validationResults['error'])) {
                echo json_encode(['status' => 'error', 'message' => 'Validation failed']);
                exit;
            }
            
            $hasIssues = !empty($validationResults['inactive_found']) || 
                         !empty($validationResults['stock_adjusted']);
            
            echo json_encode([
                'status' => 'success',
                'has_issues' => $hasIssues,
                'inactive_found' => $validationResults['inactive_found'],
                'stock_adjusted' => $validationResults['stock_adjusted'],
                'valid_count' => count($validationResults['valid_items'])
            ]);
            
        } catch (PDOException $e) {
            error_log("Validate cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    case 'get_cart':
        try {
            // Get ALL cart items - DO NOT filter by is_active
            // This ensures inactive products are still returned to the frontend
            $stmt = $connection->prepare("
                SELECT 
                    c.cart_id,
                    c.quantity,
                    c.price,
                    p.product_id,
                    p.name,
                    p.price AS current_price,
                    p.media_path,
                    p.stock_quantity,
                    p.is_active,
                    s.business_name,
                    s.seller_id
                FROM carts c
                JOIN products p ON c.product_id = p.product_id
                JOIN sellers s ON c.seller_id = s.seller_id
                WHERE c.customer_id = ?
                ORDER BY 
                    p.is_active DESC,  -- Active products first
                    p.stock_quantity > 0 DESC, -- In stock first
                    c.added_at DESC    -- Then by date added
            ");
            $stmt->execute([$customer_id]);
            $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $total = 0;
            foreach ($cartItems as $item) {
                // Only count active items in total
                if ($item['is_active']) {
                    $total += $item['price'] * $item['quantity'];
                }
            }
            
            echo json_encode([
                'status' => 'success',
                'data' => $cartItems,
                'total' => $total
            ]);
            
        } catch (PDOException $e) {
            error_log("Get cart error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
        break;
        
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
}
?>