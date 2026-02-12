<?php
session_start(); // Important for session-based checks

// Add at the top of index.php
require_once('database/database-connect.php');

// Fetch featured products (5 random active products)
$featured_products = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 
        ORDER BY RAND() 
        LIMIT 5
    ");
    $stmt->execute();
    $featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Debug: Check what we're getting
    error_log("Fetched " . count($featured_products) . " featured products");
} catch (PDOException $e) {
    error_log("Error fetching featured products: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crook's Cart Collectives - Community Marketplace">
    <title>Crook's Cart Collectives - Community Marketplace</title>

    <!-- Preload assets for faster loading -->
    <link rel="preload" href="assets/Logo.png" as="image">
    <link rel="preload" href="assets/Showcase1.png" as="image">
    <link rel="preload" href="assets/Showcase2.png" as="image">

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/footer.css">

    <script defer src="scripts/header.js"></script>
    <script defer src="scripts/showcase-slider.js"></script>
    <script defer src="scripts/image-fallback.js"></script>
</head>

<body>
    <?php include_once('pages/header.php'); ?>

    <div class="content">
        <!-- Showcase Section (formerly Hero Section) -->
        <section class="showcase-section">
            <div class="showcase-slider" id="showcaseSlider">
                <div class="showcase-slide active" style="background-image: url('assets/Showcase1.png');">
                    <div class="showcase-content">
                        <h1>Community Marketplace</h1>
                        <p>Buy and sell within your community</p>
                        <a href="pages/products.php" class="showcase-button">Shop Now</a>
                    </div>
                </div>
                <div class="showcase-slide" style="background-image: url('assets/Showcase2.png');">
                    <div class="showcase-content">
                        <h1>Become a Seller</h1>
                        <p>Start your own business today</p>
                        <a href="pages/seller-registration.php" class="showcase-button">Join as Seller</a>
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
                        <div class="feature-icon">🛒</div>
                        <h3>Local Community</h3>
                        <p>Buy and sell within your trusted community members</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🛡️</div>
                        <h3>Verified Sellers</h3>
                        <p>All sellers are verified with valid government IDs</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🚚</div>
                        <h3>Easy Delivery</h3>
                        <p>Local deliveries for faster shipping</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">💬</div>
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
                    // Simple image handling - no fallback logic
                    $display_image = !empty($product['image_path']) 
                        ? htmlspecialchars($product['image_path']) 
                        : 'https://via.placeholder.com/250x200/FF8246/ffffff?text=' . urlencode(substr($product['name'], 0, 20));
                    ?>
                            <img src="<?php echo $display_image; ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                                loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                            <p class="product-seller">
                                Seller: <?php echo htmlspecialchars($product['business_name']); ?>
                            </p>
                            <!-- REMOVED View Details buttons -->
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="no-products-message">
                        <p>No featured products available at the moment.</p>
                        <p>
                            <a href="pages/seller-registration.php" class="become-seller-link">Become a seller</a> to
                            add products!
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
                <a href="pages/products.php" class="view-all-products-btn">View All Products</a>
            </div>
        </section>
    </div>

    <?php include_once('pages/footer.php'); ?>
</body>

</html>