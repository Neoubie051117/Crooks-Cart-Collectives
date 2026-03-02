<?php
// Crooks-Cart-Collectives/index.php
// FIXED VERSION - Fixed image fetching with proper path handling for root location
?>
<?php
session_start();
require_once('database/database-connect.php');
require_once('database/data-storage-handler.php');

// Fetch featured products
$featured_products = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 AND p.stock_quantity > 0
        ORDER BY RAND() 
        LIMIT 5
    ");
    $stmt->execute();
    $featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching featured products: " . $e->getMessage());
}

// Helper function to get product image URL for index page (root folder)
function getIndexProductImageUrl($mediaPath) {
    // Default fallback icon
    $fallbackIcon = 'assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackIcon;
    }
    
    // Check if it's a media directory path (from products table)
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            // Found a thumbnail file – get its basename and build URL via data-storage-handler
            $thumbFile = basename($thumbFiles[0]);
            // Root folder path to database handler
            return 'database/data-storage-handler.php?action=serve&path=' . urlencode($mediaDir . $thumbFile);
        }
        
        // No thumbnail found – use fallback icon
        return $fallbackIcon;
    }
    
    // Check if it's already a full URL
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    // Check if it's a relative path starting with assets/ (root folder can access directly)
    if (strpos($mediaPath, 'assets/') === 0) {
        return $mediaPath;
    }
    
    // Check if it's just a filename
    if (strpos($mediaPath, '/') === false) {
        return 'assets/image/icons/' . $mediaPath;
    }
    
    // Any other relative path - try to use it as is, but ensure it starts from root
    if (strpos($mediaPath, '../') === 0) {
        // Remove ../ from paths that try to go up from pages
        $mediaPath = str_replace('../', '', $mediaPath);
    }
    
    return $mediaPath;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crook's Cart Collectives - Community Marketplace">
    <title>Crook's Cart Collectives - Community Marketplace</title>

    <!-- Preload assets with updated paths -->
    <link rel="preload" href="assets/image/brand/Logo.png" as="image">
    <link rel="preload" href="assets/image/icons/Showcase1.png" as="image">
    <link rel="preload" href="assets/image/icons/Showcase2.png" as="image">

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/footer.css">
    <script defer src="scripts/header.js"></script>
    <script defer src="scripts/showcase-slider.js"></script>
    <script defer src="scripts/index.js"></script>
</head>

<body>
    <?php include_once('pages/header.php'); ?>

    <div class="content">
        <!-- Showcase Section -->
        <section class="showcase-section">
            <div class="showcase-slider" id="showcaseSlider">
                <div class="showcase-slide active" style="background-image: url('assets/image/icons/Showcase1.png');">
                    <div class="showcase-content">
                        <h1>Community Marketplace</h1>
                        <p>Buy and sell within your community</p>
                        <a href="pages/product.php" class="showcase-button">Shop Now</a>
                    </div>
                </div>
                <div class="showcase-slide" style="background-image: url('assets/image/icons/Showcase2.png');">
                    <div class="showcase-content">
                        <h1>Become a Seller</h1>
                        <p>Start your own business today</p>
                        <a href="pages/seller-fill-form.php" class="showcase-button">Join as Seller</a>
                    </div>
                </div>
            </div>
            <div class="slider-controls">
                <button class="prev-slide" aria-label="Previous slide">‹</button>
                <button class="next-slide" aria-label="Next slide">›</button>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="features-container">
                <h2>Why Choose Our Platform?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/people-team.svg" alt="People team icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Local Community</h3>
                        <p>Buy and sell within your trusted community members</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/verified-empty.svg" alt="Verified icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Verified Sellers</h3>
                        <p>All sellers are verified with valid government IDs</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/cart-shopping-fast.svg" alt="Delivery truck icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Easy Delivery</h3>
                        <p>Local deliveries for faster shipping</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="assets/image/icons/mail.svg" alt="Community support icon"
                                onerror="this.onerror=null; this.src='assets/image/brand/Logo.png';">
                        </div>
                        <h3>Community Support</h3>
                        <p>Get help from your community members</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="featured-products-section">
            <div class="products-container">
                <h2>Featured Products</h2>
                <div class="products-grid" id="productsGrid">
                    <?php if (!empty($featured_products)): ?>
                    <?php foreach ($featured_products as $product): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <?php 
                            // Get image URL with proper fallback
                            $imageUrl = getIndexProductImageUrl($product['media_path'] ?? '');
                            ?>
                            <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                                loading="lazy" onerror="this.onerror=null; this.src='assets/image/icons/package.svg';">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                            <p class="product-seller">
                                Seller: <?php echo htmlspecialchars($product['business_name']); ?>
                            </p>
                            <a href="pages/product-detail.php?id=<?php echo $product['product_id']; ?>"
                                class="view-product-btn">
                                View Details
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="no-products-message">
                        <p>No featured products available at the moment.</p>
                        <p>
                            <a href="pages/seller-fill-form.php" class="become-seller-link">Become a seller</a> to
                            add products!
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
                <a href="pages/product.php" class="view-all-products-btn">View All Products</a>
            </div>
        </section>
    </div>

    <?php include_once('pages/footer.php'); ?>
</body>

</html>