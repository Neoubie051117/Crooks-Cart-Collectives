<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

// Fetch all active products that are in stock
$products = [];
$categories = [];

try {
    // Get all categories for filter (only from active and in-stock products)
    $catStmt = $connection->prepare("
        SELECT DISTINCT category 
        FROM products 
        WHERE is_active = 1 AND stock_quantity > 0 
        ORDER BY category
    ");
    $catStmt->execute();
    $categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Get all active products that are in stock
    $prodStmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 AND p.stock_quantity > 0
        ORDER BY p.date_added DESC
    ");
    $prodStmt->execute();
    $products = $prodStmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    error_log("Error fetching products: " . $e->getMessage());
}

// Helper function to get product image URL for product page
function getProductPageImageUrl($mediaPath) {
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/product.css">
    <style>
    /* Optional: Style for out of stock message if you want to show them separately */
    .out-of-stock-badge {
        display: inline-block;
        background: #000000;
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 5px;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Shop Products</h1>
        </div>

        <?php if (!empty($products)): ?>
        <!-- Filter Tabs - Only shown when products exist -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Products</span>
            <?php foreach ($categories as $category): ?>
            <span class="filter-tab" data-filter="<?php echo htmlspecialchars(strtolower($category)); ?>">
                <?php echo htmlspecialchars($category); ?>
            </span>
            <?php endforeach; ?>
        </div>

        <!-- Products Grid -->
        <div class="products-grid" id="productsGrid">
            <?php foreach ($products as $product): ?>
            <div class="product-card" data-category="<?php echo htmlspecialchars(strtolower($product['category'])); ?>">
                <?php 
                // FIXED: Use the helper function to get image URL
                $imageUrl = getProductPageImageUrl($product['media_path'] ?? '');
                ?>
                <div class="product-image-container">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                        onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                </div>
                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-seller">Seller: <?php echo htmlspecialchars($product['business_name']); ?></p>
                    <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                    <div class="product-actions">
                        <a href="product-detail.php?id=<?php echo $product['product_id']; ?>"
                            class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Empty State - Full width container -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/package.svg" alt="No products" class="empty-state-icon">
                <h2>No Products Available</h2>
                <p>There are no products available at the moment.</p>
                <a href="../index.php" class="btn btn-primary">Return to Home</a>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product.js"></script>
</body>

</html>