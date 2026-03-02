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
$hasInactiveItems = false;
try {
    // Modified query to include product active status
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
        ORDER BY c.added_at DESC
    ");
    $stmt->execute([$customerId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check for inactive items and calculate total only from active ones
    foreach ($cartItems as $item) {
        if ($item['is_active']) {
            $total += $item['price'] * $item['quantity'];
        } else {
            $hasInactiveItems = true;
        }
    }
} catch (PDOException $e) {
    error_log("Error fetching cart: " . $e->getMessage());
}

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
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <style>
    /* Inactive product styling */
    .cart-item.inactive {
        opacity: 0.6;
        filter: grayscale(50%);
        background-color: #f5f5f5;
        border-color: #cccccc;
        position: relative;
    }

    .cart-item.inactive::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.3);
        pointer-events: none;
    }

    .inactive-badge {
        display: inline-block;
        background: #000000;
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 5px;
    }

    .inactive-message {
        margin-top: 10px;
        padding: 10px;
        background: #f0f0f0;
        border-left: 3px solid #FF8246;
        font-size: 0.9rem;
    }

    .cart-item.inactive .cart-item-price,
    .cart-item.inactive .cart-item-seller,
    .cart-item.inactive .cart-item-title,
    .cart-item.inactive .item-subtotal {
        opacity: 0.7;
    }

    .cart-item.inactive .quantity-input,
    .cart-item.inactive .remove-btn {
        pointer-events: none;
        opacity: 0.5;
    }

    .inactive-warning {
        background: #f0f0f0;
        padding: 15px;
        margin: 20px 0;
        border-radius: 6px;
        text-align: center;
        border-left: 4px solid #FF8246;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Shopping Cart</h1>
        </div>

        <?php if ($hasInactiveItems): ?>
        <div class="inactive-warning">
            <p>Some items in your cart are no longer available. These items have been greyed out and cannot be checked
                out.</p>
        </div>
        <?php endif; ?>

        <?php if (!empty($cartItems)): ?>
        <!-- Cart Items -->
        <div class="cart-container">
            <div class="cart-items" id="cartItems">
                <?php foreach ($cartItems as $item): 
                        $imageUrl = getProductImageUrl($item['media_path'] ?? '');
                        $subtotal = $item['price'] * $item['quantity'];
                        $isActive = $item['is_active'] ? true : false;
                        $inactiveClass = $isActive ? '' : 'inactive';
                    ?>
                <div class="cart-item <?= $inactiveClass ?>" data-id="<?= $item['cart_id'] ?>"
                    data-active="<?= $isActive ? '1' : '0' ?>">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>

                        <?php if ($isActive): ?>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price'], 2) ?></p>
                        <p class="stock-status">In Stock: <?= (int)$item['stock_quantity'] ?></p>
                        <?php else: ?>
                        <span class="inactive-badge">Product Unavailable</span>
                        <p class="cart-item-seller" style="display: none;">
                            <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price" style="display: none;">₱<?= number_format($item['price'], 2) ?></p>
                        <?php endif; ?>

                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <?php if ($isActive): ?>
                                <label for="quantity-<?= $item['cart_id'] ?>" class="sr-only">Quantity</label>
                                <input type="number" id="quantity-<?= $item['cart_id'] ?>" class="quantity-input"
                                    value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stock_quantity'] ?>"
                                    data-id="<?= $item['cart_id'] ?>">
                                <button class="btn btn-secondary remove-btn" data-id="<?= $item['cart_id'] ?>">
                                    Remove
                                </button>
                                <?php else: ?>
                                <span class="inactive-message">This product is no longer available. Please remove it
                                    from your cart.</span>
                                <button class="btn btn-secondary remove-btn" data-id="<?= $item['cart_id'] ?>"
                                    style="margin-top: 10px;">
                                    Remove Item
                                </button>
                                <?php endif; ?>
                            </div>
                            <?php if ($isActive): ?>
                            <p class="item-subtotal">
                                Subtotal: <span class="subtotal-amount">₱<?= number_format($subtotal, 2) ?></span>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total (active items):</span>
                    <span class="total-amount" id="cartTotal">₱<?= number_format($total, 2) ?></span>
                </div>
                <div class="cart-actions">
                    <a href="product.php" class="btn btn-secondary">Continue Shopping</a>
                    <?php if ($total > 0): ?>
                    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
                    <?php else: ?>
                    <button class="btn btn-primary" disabled style="opacity: 0.5; cursor: not-allowed;">No Active
                        Items</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/cart-shopping.svg" alt="Empty cart" class="empty-state-icon">
                <h2>Your Cart is Empty</h2>
                <p>Looks like you haven't added any items to your cart yet.</p>
                <a href="product.php" class="btn btn-primary">Start Shopping</a>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/cart.js"></script>
</body>

</html>