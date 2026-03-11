<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customerId = $_SESSION['customer_id'];

$activeItems = [];
$unavailableItems = [];
$total = 0;

try {
    // Get all cart items with current product status
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
            p.is_active DESC,
            p.stock_quantity > 0 DESC,
            c.added_at DESC
    ");
    $stmt->execute([$customerId]);
    $allItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Separate items into active and unavailable
    foreach ($allItems as $item) {
        // Check if product is active AND has stock
        $isAvailable = $item['is_active'] && $item['stock_quantity'] > 0;
        
        if ($isAvailable) {
            $activeItems[] = $item;
            $total += $item['price'] * $item['quantity'];
        } else {
            $unavailableItems[] = $item;
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
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Shopping Cart</h1>
        </div>

        <?php if (empty($allItems)): ?>
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/cart-shopping.svg" alt="Empty cart" class="empty-state-icon">
                <h2>Your Cart is Empty</h2>
                <p>Looks like you haven't added any items to your cart yet.</p>
                <a href="product.php" class="btn btn-primary">Start Shopping</a>
            </div>
        </div>
        <?php else: ?>

        <!-- Single Cart Container -->
        <div class="cart-container">
            <div class="cart-items" id="cartItems">
                <!-- Available Items Section -->
                <?php if (!empty($activeItems)): ?>
                <div class="available-label">Available Items</div>

                <?php foreach ($activeItems as $item): 
                        $imageUrl = getProductImageUrl($item['media_path'] ?? '');
                        $subtotal = $item['price'] * $item['quantity'];
                    ?>
                <div class="cart-item" data-id="<?= $item['cart_id'] ?>" data-active="1">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price'], 2) ?></p>
                        <p class="stock-status">In Stock: <?= (int)$item['stock_quantity'] ?></p>

                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <label for="quantity-<?= $item['cart_id'] ?>" class="sr-only">Quantity</label>
                                <input type="number" id="quantity-<?= $item['cart_id'] ?>" class="quantity-input"
                                    value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stock_quantity'] ?>"
                                    data-id="<?= $item['cart_id'] ?>">
                                <button class="btn btn-secondary remove-btn" data-id="<?= $item['cart_id'] ?>">
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
                <?php endif; ?>

                <!-- Unavailable Items Section -->
                <?php if (!empty($unavailableItems)): ?>
                <div class="unavailable-divider">Unavailable Items</div>

                <?php foreach ($unavailableItems as $item): 
                        $imageUrl = getProductImageUrl($item['media_path'] ?? '');
                        $reason = $item['is_active'] ? 'Out of Stock' : 'Product Unavailable';
                    ?>
                <div class="cart-item unavailable" data-id="<?= $item['cart_id'] ?>" data-active="0">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <span class="unavailable-badge"><?= $reason ?></span>
                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <button class="btn btn-secondary remove-btn" data-id="<?= $item['cart_id'] ?>">
                                    Remove Item
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($activeItems)): ?>
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
            <?php elseif (!empty($unavailableItems)): ?>
            <!-- No active items, but have unavailable items - show message but no checkout -->
            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total:</span>
                    <span class="total-amount">₱0.00</span>
                </div>
                <div class="cart-actions">
                    <a href="product.php" class="btn btn-secondary">Continue Shopping</a>
                    <button class="btn btn-primary" disabled>Cannot Checkout</button>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </main>

    <?php include_once('footer.php'); ?>

    <div class="cart-notifier-modal" id="confirmModal">
        <div class="cart-notifier-content">
            <div class="cart-notifier-icon">
                <img src="../assets/image/icons/trash.svg" alt="Remove">
            </div>
            <h3>Confirm Removal</h3>
            <p>Are you sure you want to remove this item from your cart?</p>
            <div class="cart-notifier-actions">
                <button class="cart-notifier-btn continue-btn" id="cancelAction">Cancel</button>
                <button class="cart-notifier-btn view-cart-btn" id="confirmAction">Confirm</button>
            </div>
        </div>
    </div>

    <script src="../scripts/cart.js"></script>
</body>

</html>