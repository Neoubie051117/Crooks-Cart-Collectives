<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch seller's products
$products = [];
try {
    $stmt = $connection->prepare("
        SELECT product_id, name, price, stock_quantity, is_active, media_path 
        FROM products 
        WHERE seller_id = ? 
        ORDER BY date_added DESC
    ");
    $stmt->execute([$sellerId]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching seller products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-manage-product.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/seller-manage-product.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">My Products</div>

        <?php if (empty($products)): ?>
        <div class="no-products">
            <p>You haven't added any products yet.</p>
            <p><a href="seller-new-product.php">Add Your First Product</a></p>
        </div>
        <?php else: ?>

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <?php 
                // FIXED: Use getFileUrl() to properly serve the image
                $imageUrl = '../assets/image/icons/PlaceholderAssetProduct.png';
                
                if (!empty($product['media_path'])) {
                    // Ensure media_path has trailing slash
                    $mediaDir = rtrim($product['media_path'], '/') . '/';
                    // Use the data-storage-handler to get the proper URL
                    $imageUrl = getFileUrl($mediaDir, 'thumbnail_1.png');
                }
                ?>
                <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     class="product-image"
                     onerror="console.log('Image failed to load: ' + this.src); this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                    <p class="product-status"><?php echo $product['is_active'] ? 'Active' : 'Inactive'; ?></p>
                    <div class="product-actions">
                        <a href="seller-new-product.php?id=<?php echo $product['product_id']; ?>" class="edit-btn">Edit</a>
                        <button class="delete-btn" data-id="<?php echo $product['product_id']; ?>">Delete</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>