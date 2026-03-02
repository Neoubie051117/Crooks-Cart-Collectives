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
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-manage-product.css">
    <script defer src="../scripts/seller-manage-product.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>My Products</h1>
        </div>

        <?php if (empty($products)): ?>
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/package.svg" alt="No products" class="empty-state-icon">
                <h2>No Products Yet</h2>
                <p>You haven't added any products to your store.</p>
                <a href="seller-new-product.php" class="btn btn-primary">Add Your First Product</a>
            </div>
        </div>
        <?php else: ?>

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <?php 
                $imageUrl = '../assets/image/icons/PlaceholderAssetProduct.png';
                
                if (!empty($product['media_path'])) {
                    $mediaDir = rtrim($product['media_path'], '/') . '/';
                    $imageUrl = getFileUrl($mediaDir, 'thumbnail_1.png');
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
                    <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                    <p class="product-status status-<?php echo $product['is_active'] ? 'active' : 'inactive'; ?>">
                        <?php echo $product['is_active'] ? 'Active' : 'Inactive'; ?>
                    </p>
                    <div class="product-actions">
                        <a href="seller-new-product.php?id=<?php echo $product['product_id']; ?>"
                            class="btn btn-primary edit-btn">Edit</a>
                        <button class="btn btn-secondary delete-btn"
                            data-id="<?php echo $product['product_id']; ?>">Delete</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </main>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/trash.svg" alt="Delete">
            </div>
            <h3 class="modal-title">Confirm Delete</h3>
            <p class="modal-message">Are you sure you want to delete this product? This action cannot be undone.</p>
            <div class="modal-actions">
                <button id="cancelDelete" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmDelete" class="modal-btn modal-btn-confirm">Delete</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>