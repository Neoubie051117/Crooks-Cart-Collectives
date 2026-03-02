<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

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
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/product.css">
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
                $imageUrl = '../assets/image/icons/PlaceholderAssetProduct.png';
                
                if (!empty($product['media_path'])) {
                    $mediaDir = rtrim($product['media_path'], '/') . '/';
                    $imageUrl = getFileUrl($mediaDir, 'thumbnail_1.png');
                    if (empty($imageUrl) || strpos($imageUrl, 'placeholder') !== false) {
                        $imageUrl = '../assets/image/icons/PlaceholderAssetProduct.png';
                    }
                }
                ?>
                <div class="product-image-container">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                        onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
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