<?php
session_start();
require_once('../database/database-connect.php');

$product_id = $_GET['id'] ?? 0;

// Fetch product details
$product = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name, s.is_verified 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.product_id = ? AND p.is_active = 1
    ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching product: " . $e->getMessage());
}

if (!$product) {
    header('Location: products.php');
    exit;
}

// Fix image path
$imagePath = $product['image_path'] ?? '';
if (!empty($imagePath) && !filter_var($imagePath, FILTER_VALIDATE_URL) && strpos($imagePath, 'assets/') === 0) {
    $imagePath = '../' . $imagePath;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/product-details.css"> <!-- MOVE STYLES TO EXTERNAL CSS -->
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="product-details-container">
            <!-- Breadcrumb navigation -->
            <div class="breadcrumb">
                <a href="../index.php">Home</a> &gt;
                <a href="products.php">Products</a> &gt;
                <span><?php echo htmlspecialchars($product['name']); ?></span>
            </div>

            <div class="product-details-grid">
                <!-- Product Image Column -->
                <div class="product-image-column">
                    <div class="main-image-container">
                        <img src="<?php echo htmlspecialchars($imagePath ?: 'https://via.placeholder.com/500x400/FF8246/ffffff?text=No+Image'); ?>"
                            alt="<?php echo htmlspecialchars($product['name']); ?>" class="main-product-image"
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/500x400/FF8246/ffffff?text=<?php echo urlencode(substr($product['name'], 0, 20)); ?>';">
                    </div>
                </div>

                <!-- Product Info Column -->
                <div class="product-info-column">
                    <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>

                    <div class="product-meta">
                        <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                        <span class="product-seller">
                            Sold by: <strong><?php echo htmlspecialchars($product['business_name']); ?></strong>
                            <?php if ($product['is_verified']): ?>
                            <span class="verified-badge">✓ Verified</span>
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="product-price-container">
                        <span class="product-price-label">Price:</span>
                        <span class="product-price">₱<?php echo number_format($product['price'], 2); ?></span>
                    </div>

                    <div
                        class="product-stock <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                        <?php if ($product['stock_quantity'] > 0): ?>
                        <span class="stock-indicator">✓ In Stock</span>
                        <span class="stock-count">(<?php echo $product['stock_quantity']; ?> available)</span>
                        <?php else: ?>
                        <span class="stock-indicator">✗ Out of Stock</span>
                        <?php endif; ?>
                    </div>

                    <div class="product-description">
                        <h3>Product Description</h3>
                        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                    </div>

                    <div class="product-actions">
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <button class="add-to-cart-btn" data-product-id="<?php echo $product['product_id']; ?>"
                            <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                            Add to Cart
                        </button>
                        <button class="buy-now-btn" data-product-id="<?php echo $product['product_id']; ?>"
                            <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                            Buy Now
                        </button>
                        <?php else: ?>
                        <a href="sign-in.php?redirect=product-details.php?id=<?php echo $product['product_id']; ?>"
                            class="login-to-purchase-btn">
                            Login to Purchase
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    <!-- MOVED TO CORRECT LOCATION -->

    <script src="../scripts/product-details.js"></script>
</body>

</html>