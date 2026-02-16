<?php // PHP File Content ?>
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

// Improved image path handling
function getProductImagePath($image_path) {
    if (empty($image_path)) {
        return '../assets/image/icons/PlaceholderAssetProduct.png';
    }
    
    // If it's already a full URL
    if (filter_var($image_path, FILTER_VALIDATE_URL)) {
        return $image_path;
    }
    
    // If it's stored as 'assets/...' from root
    if (strpos($image_path, 'assets/') === 0) {
        return '../' . $image_path;
    }
    
    // If it's just a filename
    if (strpos($image_path, '/') === false) {
        return '../assets/image/icons/' . $image_path;
    }
    
    // Some other relative path
    return '../' . $image_path;
}

$imagePath = getProductImagePath($product['image_path'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/product-details.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="product-details-wrapper">
            <!-- Breadcrumb navigation -->
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo htmlspecialchars($product['name']); ?></li>
                </ol>
            </nav>

            <div class="product-details-grid">
                <!-- Product Image Column -->
                <div class="product-image-column">
                    <div class="product-image-container">
                        <div class="main-image-wrapper">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="main-product-image"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        </div>
                    </div>

                    <!-- Thumbnail gallery (can be extended for multiple images) -->
                    <div class="product-thumbnails">
                        <button class="thumbnail active" aria-label="Main image">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Thumbnail"
                                onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        </button>
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
                            <span class="verified-badge">✓ Verified Seller</span>
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="product-price-wrapper">
                        <span class="price-label">Price:</span>
                        <span class="product-price">₱<?php echo number_format($product['price'], 2); ?></span>
                    </div>

                    <div class="product-availability">
                        <div
                            class="stock-status <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                            <span class="status-indicator"></span>
                            <span class="status-text">
                                <?php if ($product['stock_quantity'] > 0): ?>
                                In Stock (<?php echo $product['stock_quantity']; ?> available)
                                <?php else: ?>
                                Out of Stock
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>

                    <div class="product-description">
                        <h2>Product Description</h2>
                        <div class="description-content">
                            <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                        </div>
                    </div>

                    <div class="product-actions">
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <button class="btn btn-primary add-to-cart-btn"
                            data-product-id="<?php echo $product['product_id']; ?>"
                            <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                            <span class="btn-text">Add to Cart</span>
                        </button>
                        <button class="btn btn-secondary buy-now-btn"
                            data-product-id="<?php echo $product['product_id']; ?>"
                            <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                            <span class="btn-text">Buy Now</span>
                        </button>
                        <?php else: ?>
                        <a href="sign-in.php?redirect=<?php echo urlencode('product-details.php?id=' . $product['product_id']); ?>"
                            class="btn btn-primary login-to-purchase-btn">
                            <span class="btn-icon">🔐</span>
                            <span class="btn-text">Login to Purchase</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product-details.js"></script>
</body>

</html>