<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];

// Check for single product checkout (Buy Now)
$singleProductMode = false;
$singleProduct = null;
$cartItems = [];
$total = 0;

if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $singleProductMode = true;
    $productId = (int)$_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;

    // Fetch product details
    try {
        $stmt = $connection->prepare("
            SELECT p.*, s.business_name, s.seller_id
            FROM products p
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE p.product_id = ? AND p.is_active = 1
        ");
        $stmt->execute([$productId]);
        $singleProduct = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$singleProduct) {
            // Invalid product, redirect to products
            header('Location: product.php');
            exit;
        }

        // Check stock
        if ($quantity > $singleProduct['stock_quantity']) {
            $_SESSION['checkout_error'] = 'Insufficient stock for selected quantity.';
            header('Location: product-detail.php?id=' . $productId);
            exit;
        }

        // Build a single-item cart array for display
        $cartItems = [
            [
                'cart_id' => null,
                'product_id' => $singleProduct['product_id'],
                'name' => $singleProduct['name'],
                'media_path' => $singleProduct['media_path'],
                'business_name' => $singleProduct['business_name'],
                'seller_id' => $singleProduct['seller_id'],
                'quantity' => $quantity,
                'price' => $singleProduct['price'],
                'stock_quantity' => $singleProduct['stock_quantity']
            ]
        ];
        $total = $singleProduct['price'] * $quantity;
    } catch (PDOException $e) {
        error_log("Checkout single product fetch error: " . $e->getMessage());
        header('Location: product.php');
        exit;
    }
} else {
    // Normal cart checkout
    try {
        $stmt = $connection->prepare("
            SELECT c.*, p.name, p.media_path, s.business_name
            FROM carts c
            JOIN products p ON c.product_id = p.product_id
            JOIN sellers s ON p.seller_id = s.seller_id
            WHERE c.customer_id = ?
        ");
        $stmt->execute([$customer_id]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    } catch (PDOException $e) {
        error_log("Checkout cart fetch error: " . $e->getMessage());
    }

    if (empty($cartItems)) {
        header('Location: cart.php');
        exit;
    }
}

// Fetch user details
$user = [];
try {
    $stmt = $connection->prepare("SELECT address, first_name, last_name, email, contact_number FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Checkout user fetch error: " . $e->getMessage());
}

// Helper function to get product image URL with proper thumbnail discovery
function getCheckoutImageUrl($mediaPath) {
    // Default fallback - using an existing icon from your project
    $fallbackImage = '../assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackImage;
    }
    
    // Check if it's a media directory path (from products table)
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            // Found a thumbnail file – get its basename and build URL via data-storage-handler
            $thumbFile = basename($thumbFiles[0]);
            return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($mediaDir . $thumbFile);
        } else {
            // No thumbnail found – use fallback
            return $fallbackImage;
        }
    }
    
    // Check if it's already a full URL
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    // Check if it's a relative path starting with assets/
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    // Check if it's just a filename
    if (strpos($mediaPath, '/') === false) {
        return '../assets/image/icons/' . $mediaPath;
    }
    
    // Any other relative path
    return $mediaPath;
}

// Get safe values for display with null checks
$fullName = '';
if (!empty($user['first_name']) && !empty($user['last_name'])) {
    $fullName = htmlspecialchars($user['first_name'] . ' ' . $user['last_name'], ENT_QUOTES, 'UTF-8');
} elseif (!empty($user['first_name'])) {
    $fullName = htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8');
} elseif (!empty($user['last_name'])) {
    $fullName = htmlspecialchars($user['last_name'], ENT_QUOTES, 'UTF-8');
}

$shippingAddress = !empty($user['address']) ? htmlspecialchars($user['address'], ENT_QUOTES, 'UTF-8') : '';
$userEmail = !empty($user['email']) ? htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') : '';
$userPhone = !empty($user['contact_number']) ? htmlspecialchars($user['contact_number'], ENT_QUOTES, 'UTF-8') : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/checkout.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <h1 class="checkout-title">Checkout</h1>

        <div class="checkout-grid">
            <!-- LEFT COLUMN: Order Summary (Top Left) + Personal Details (Bottom Left) -->
            <div class="checkout-left">
                <!-- TOP LEFT: Order Summary Card -->
                <div class="checkout-card order-summary-card">
                    <h2>Order Summary</h2>
                    <div class="card-content">
                        <div class="order-items">
                            <?php foreach ($cartItems as $item): 
                                $imageUrl = getCheckoutImageUrl($item['media_path'] ?? '');
                                $itemName = !empty($item['name']) ? htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') : 'Product';
                                $sellerName = !empty($item['business_name']) ? htmlspecialchars($item['business_name'], ENT_QUOTES, 'UTF-8') : 'Seller';
                            ?>
                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="<?= htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= $itemName ?>"
                                        onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                                </div>
                                <div class="order-item-details">
                                    <h3><?= $itemName ?></h3>
                                    <p>Seller: <?= $sellerName ?></p>
                                    <p>Qty: <?= (int)$item['quantity'] ?></p>
                                    <p class="order-item-price">
                                        ₱<?= number_format((float)($item['price'] * $item['quantity']), 2) ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="order-total">
                            <span>Total:</span>
                            <span class="total-amount">₱<?= number_format((float)$total, 2) ?></span>
                        </div>
                    </div>
                </div>

                <!-- BOTTOM LEFT: Personal Details Card -->
                <div class="checkout-card personal-details-card">
                    <h2>Personal Details</h2>
                    <div class="card-content">
                        <div class="personal-details-grid">
                            <div class="detail-row">
                                <span class="detail-label">Name:</span>
                                <span class="detail-value"><?= $fullName ?: 'Customer' ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Email:</span>
                                <span class="detail-value"><?= $userEmail ?: 'Not provided' ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Phone:</span>
                                <span class="detail-value"><?= $userPhone ?: 'Not provided' ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Shipping Address (Top Right) + Payment Methods (Bottom Right) -->
            <div class="checkout-right">
                <!-- TOP RIGHT: Shipping Address Card -->
                <div class="checkout-card shipping-address-card">
                    <h2>Shipping Address</h2>
                    <div class="card-content">
                        <div class="shipping-details">
                            <p><strong>Name: <?= $fullName ?: 'Customer' ?></strong></p>
                            <div class="address-display" id="addressDisplay">
                                <p id="shippingAddressText"><?= $shippingAddress ?: 'No address on file' ?></p>
                            </div>

                            <div class="address-actions" id="addressActions">
                                <button type="button" class="btn btn-secondary btn-small" id="editAddressBtn">Edit
                                    Address</button>
                            </div>

                            <div id="addressEditForm" style="display: none;">
                                <textarea id="newAddress" class="address-edit-textarea"
                                    rows="3"><?= htmlspecialchars($shippingAddress, ENT_QUOTES, 'UTF-8') ?></textarea>
                                <div class="address-actions">
                                    <button type="button" class="btn btn-secondary btn-small"
                                        id="cancelEditAddress">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-small"
                                        id="saveAddressBtn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BOTTOM RIGHT: Payment Methods Card -->
                <div class="checkout-card payment-methods-card">
                    <h2>Payment Method</h2>
                    <div class="card-content">
                        <div class="payment-methods">
                            <!-- Cash on Delivery Option -->
                            <div class="payment-option selected" data-method="COD">
                                <input type="radio" name="payment_method" value="COD" id="payment_cod" checked>
                                <div class="payment-option-content">
                                    <div class="payment-icon">
                                        <img src="../assets/image/icons/cart-shopping.svg" alt="COD">
                                    </div>
                                    <div class="payment-details">
                                        <div class="payment-name">Cash on Delivery</div>
                                        <div class="payment-description">Pay when you receive your order</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Online Payment Option -->
                            <div class="payment-option" data-method="Online">
                                <input type="radio" name="payment_method" value="Online" id="payment_online">
                                <div class="payment-option-content">
                                    <div class="payment-icon">
                                        <img src="../assets/image/icons/mail.svg" alt="Online">
                                    </div>
                                    <div class="payment-details">
                                        <div class="payment-name">Online Payment</div>
                                        <div class="payment-description">Pay via GCash or Maya</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-actions">
                            <a href="product.php" class="btn btn-secondary">Back to Shop</a>
                            <button id="placeOrderBtn" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <!-- Notifier Modal -->
    <div id="checkoutNotifier" class="notifier hidden">
        <div class="notifier-content">
            <div class="notifier-icon">
                <img src="../assets/image/icons/cart-shopping.svg" alt="Order">
            </div>
            <p id="checkoutMessage"></p>
            <button id="checkoutCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <!-- Hidden inputs for single product mode -->
    <input type="hidden" id="singleProductMode" value="<?= $singleProductMode ? '1' : '0' ?>">
    <?php if ($singleProductMode && $singleProduct): ?>
    <input type="hidden" id="singleProductId" value="<?= (int)$singleProduct['product_id'] ?>">
    <input type="hidden" id="singleQuantity" value="<?= (int)$quantity ?>">
    <input type="hidden" id="singlePrice" value="<?= (float)$singleProduct['price'] ?>">
    <?php endif; ?>

    <script src="../scripts/checkout.js"></script>
</body>

</html>