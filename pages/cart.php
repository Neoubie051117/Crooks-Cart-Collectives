<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customerId = $_SESSION['customer_id'];

$cartItems = [];
$total = 0;
try {
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
            s.business_name,
            s.seller_id
        FROM carts c
        JOIN products p ON c.product_id = p.product_id
        JOIN sellers s ON c.seller_id = s.seller_id
        WHERE c.customer_id = ?
        ORDER BY c.added_at DESC
    ");
    $stmt->execute([$customerId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cartItems as $item) {
        $total += $item['price'] * $item['quantity'];
    }
} catch (PDOException $e) {
    error_log("Error fetching cart: " . $e->getMessage());
}

// Helper function to get product image
function getProductImageUrl($mediaPath) {
    if (empty($mediaPath)) {
        return '../assets/image/icons/package.svg';
    }
    
    $fullPath = dirname(__DIR__, 2) . '/' . $mediaPath;
    if (is_dir($fullPath)) {
        $thumbFiles = glob($fullPath . 'thumbnail_1.*');
        if (!empty($thumbFiles)) {
            $thumbFile = basename($thumbFiles[0]);
            return getFileUrl($mediaPath . $thumbFile);
        }
    }
    
    return '../assets/image/icons/package.svg';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <h1 class="pageTitleHeader">Shopping Cart</h1>

        <div class="cart-container">
            <?php if (empty($cartItems)): ?>
            <div class="empty-cart">
                <p class="empty-cart-message">Your cart is empty.</p>
                <a href="product.php" class="btn-primary">Continue Shopping</a>
            </div>
            <?php else: ?>

            <div class="cart-items" id="cartItems">
                <?php foreach ($cartItems as $item): 
                        $imageUrl = getProductImageUrl($item['media_path'] ?? '');
                        $subtotal = $item['price'] * $item['quantity'];
                    ?>
                <div class="cart-item" data-id="<?= $item['cart_id'] ?>">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imageUrl) ?>" 
                             alt="<?= htmlspecialchars($item['name']) ?>"
                             onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price'], 2) ?></p>

                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <label for="quantity-<?= $item['cart_id'] ?>" class="sr-only">Quantity</label>
                                <input type="number" id="quantity-<?= $item['cart_id'] ?>" class="quantity-input"
                                    value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stock_quantity'] ?>"
                                    data-id="<?= $item['cart_id'] ?>">
                                <button class="remove-btn" data-id="<?= $item['cart_id'] ?>">
                                    Remove
                                </button>
                            </div>
                            <p class="item-subtotal">
                                Subtotal: <span class="subtotal-amount">₱<?= number_format($subtotal, 2) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total:</span>
                    <span class="total-amount" id="cartTotal">₱<?= number_format($total, 2) ?></span>
                </div>
                <div class="cart-actions">
                    <a href="product.php" class="btn btn-secondary">Continue Shopping</a>
                    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/cart.js"></script>
</body>

</html>