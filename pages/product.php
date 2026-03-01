<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php'); // Add this for getFileUrl()

// Fetch all active products
$products = [];
$categories = [];

try {
    // Get all categories for filter
    $catStmt = $connection->prepare("SELECT DISTINCT category FROM products WHERE is_active = 1 ORDER BY category");
    $catStmt->execute();
    $categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Get all active products
    $prodStmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 
        ORDER BY p.date_added DESC
    ");
    $prodStmt->execute();
    $products = $prodStmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    error_log("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/product.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="pageTitleHeader">Shop Products</div>
        
        <!-- Filter Tabs - CSS copied from orders filter tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Products</span>
            <?php foreach ($categories as $category): ?>
            <span class="filter-tab" data-filter="<?php echo htmlspecialchars(strtolower($category)); ?>">
                <?php echo htmlspecialchars($category); ?>
            </span>
            <?php endforeach; ?>
        </div>

        <!-- Products Grid - Styled like seller-manage-product but with single button -->
        <div class="products-grid" id="productsGrid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                <div class="product-card" data-category="<?php echo htmlspecialchars(strtolower($product['category'])); ?>">
                    <?php 
                    // FIXED: Use getFileUrl() to properly serve the image - copied from seller-manage-product.php
                    $imageUrl = '../assets/image/icons/PlaceholderAssetProduct.png';
                    
                    if (!empty($product['media_path'])) {
                        // Ensure media_path has trailing slash
                        $mediaDir = rtrim($product['media_path'], '/') . '/';
                        // Use the data-storage-handler to get the proper URL
                        $imageUrl = getFileUrl($mediaDir, 'thumbnail_1.png');
                        if (empty($imageUrl) || strpos($imageUrl, 'placeholder') !== false) {
                            // Fallback to placeholder if no image found
                            $imageUrl = '../assets/image/icons/PlaceholderAssetProduct.png';
                        }
                    } elseif (!empty($product['image_path'])) {
                        // Legacy image path handling
                        if (strpos($product['image_path'], 'assets/') === 0) {
                            $imageUrl = '../' . $product['image_path'];
                        } else {
                            $imageUrl = '../' . $product['image_path'];
                        }
                    }
                    ?>
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="product-image"
                         onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                    <div class="product-info">
                        <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                        <p class="product-seller">Seller: <?php echo htmlspecialchars($product['business_name']); ?></p>
                        <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                        <!-- Single button only - View Details -->
                        <div class="product-actions">
                            <a href="product-details.php?id=<?php echo $product['product_id']; ?>" class="view-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">
                    <p>No products available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product.js"></script>
</body>

</html>