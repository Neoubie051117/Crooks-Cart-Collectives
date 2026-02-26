<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['customer_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
$user_id = $_SESSION['user_id'];

$cartItems = [];
$total = 0;
try {
    $stmt = $connection->prepare("
        SELECT c.*, p.name, p.price, p.image_path, s.business_name
        FROM carts c
        JOIN products p ON c.product_id = p.product_id
        JOIN sellers s ON p.seller_id = s.seller_id
        WHERE c.customer_id = ?
    ");
    $stmt->execute([$customer_id]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cartItems as $item) {
        $total += $item['price_at_time'] * $item['quantity'];
    }
} catch (PDOException $e) {
    error_log("Checkout cart fetch error: " . $e->getMessage());
}

$user = [];
try {
    $stmt = $connection->prepare("SELECT address, first_name, last_name, email, contact_number FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Checkout user fetch error: " . $e->getMessage());
}

if (empty($cartItems)) {
    header('Location: cart.php');
    exit;
}
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
            <div class="checkout-summary">
                <h2>Order Summary</h2>
                <div class="checkout-items">
                    <?php foreach ($cartItems as $item): 
                        $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                        if (!empty($item['image_path'])) {
                            $imagePath = (strpos($item['image_path'], 'assets/') === 0) ? '../' . $item['image_path'] : '../' . $item['image_path'];
                        }
                    ?>
                    <div class="checkout-item">
                        <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            class="checkout-item-image"
                            onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        <div class="checkout-item-details">
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <p>Seller: <?= htmlspecialchars($item['business_name']) ?></p>
                            <p>Qty: <?= $item['quantity'] ?></p>
                            <p class="checkout-item-price">₱<?= number_format($item['price'] * $item['quantity'], 2) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="checkout-total">
                    <span>Total:</span>
                    <span class="total-amount">₱<?= number_format($total, 2) ?></span>
                </div>
            </div>

            <div class="checkout-info">
                <h2>Shipping Address</h2>
                <div class="shipping-details">
                    <p><strong><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></strong></p>
                    <p><?= htmlspecialchars($user['address']) ?></p>
                    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                    <p>Phone: <?= htmlspecialchars($user['contact_number']) ?></p>
                </div>

                <h2>Payment Method</h2>
                <div class="payment-method">
                    <p>Cash on Delivery (COD)</p>
                </div>

                <div class="checkout-actions">
                    <a href="cart.php" class="btn btn-secondary">Back to Cart</a>
                    <button id="placeOrderBtn" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <div id="checkoutNotifier" class="notifier hidden">
        <div class="notifier-content">
            <img src="../assets/image/icons/mail.svg" alt="Notification"
                style="width: 40px; height: 40px; margin-bottom: 15px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            <p id="checkoutMessage"></p>
            <button id="checkoutCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <script src="../scripts/checkout.js"></script>
</body>

</html>