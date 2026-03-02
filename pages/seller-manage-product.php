<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch seller's products - include all products, active and inactive
$products = [];
try {
    $stmt = $connection->prepare("
        SELECT product_id, name, price, stock_quantity, is_active, media_path 
        FROM products 
        WHERE seller_id = ? 
        ORDER BY is_active DESC, date_added DESC
    ");
    $stmt->execute([$sellerId]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching seller products: " . $e->getMessage());
}

// Add filter tabs separation
$activeCount = 0;
$inactiveCount = 0;
foreach ($products as $product) {
    if ($product['is_active']) {
        $activeCount++;
    } else {
        $inactiveCount++;
    }
}

// Helper function to get product image URL for seller manage page
function getSellerManageImageUrl($mediaPath) {
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
    <title>My Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-manage-product.css">
    <style>
    /* Filter tabs for available/unavailable separation */
    .filter-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
        width: 100%;
    }

    .filter-tab {
        padding: 8px 20px;
        background: #ffffff;
        border-radius: 25px;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: 500;
        color: #666666;
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
        text-decoration: none;
        display: inline-block;
    }

    .filter-tab:hover {
        background: #FF8246;
        color: #ffffff;
        border-color: #FF8246;
        box-shadow: 0 4px 8px rgba(255, 130, 70, 0.2);
    }

    .filter-tab.active {
        background: #FF8246;
        color: #ffffff;
        border-color: #FF8246;
    }

    /* Inactive product styling */
    .product-card.inactive {
        opacity: 0.7;
        background-color: #f9f9f9;
        border-color: #cccccc;
    }

    .product-card.inactive .product-title {
        color: #666666;
    }

    .product-card.inactive .product-price {
        color: #999999;
    }

    .inactive-badge {
        display: inline-block;
        background: #000000;
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 5px;
        vertical-align: middle;
    }

    .product-status.status-inactive {
        color: #999999;
    }

    /* Hide delete button for inactive products */
    .product-card.inactive .delete-btn {
        display: none;
    }

    /* Show a different message for inactive products edit button */
    .product-card.inactive .edit-btn {
        opacity: 0.7;
    }

    .product-card.inactive .edit-btn:hover {
        opacity: 1;
    }

    .product-count {
        margin-bottom: 15px;
        color: #666666;
        font-size: 0.9rem;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>My Products</h1>
        </div>

        <?php if (!empty($products)): ?>
        <!-- Filter Tabs for Available and Unavailable products -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All (<?= count($products) ?>)</span>
            <span class="filter-tab" data-filter="active">Available (<?= $activeCount ?>)</span>
            <span class="filter-tab" data-filter="inactive">Removed (<?= $inactiveCount ?>)</span>
        </div>

        <div class="product-count" id="productCount">
            Showing all products
        </div>

        <div class="products-grid" id="productsGrid">
            <?php foreach ($products as $product): 
                    $isActive = $product['is_active'] ? true : false;
                    $inactiveClass = $isActive ? '' : 'inactive';
                ?>
            <div class="product-card <?= $inactiveClass ?>" data-active="<?= $isActive ? '1' : '0' ?>">
                <?php 
                    // FIXED: Use the helper function to get image URL
                    $imageUrl = getSellerManageImageUrl($product['media_path'] ?? '');
                    ?>
                <div class="product-image-container">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                        onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                </div>
                <div class="product-info">
                    <h3 class="product-title">
                        <?php echo htmlspecialchars($product['name']); ?>
                        <?php if (!$isActive): ?>
                        <span class="inactive-badge">Removed</span>
                        <?php endif; ?>
                    </h3>
                    <?php if ($isActive): ?>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-stock">Stock: <?php echo (int)$product['stock_quantity']; ?></p>
                    <?php else: ?>
                    <p class="product-price" style="display: none;">₱<?php echo number_format($product['price'], 2); ?>
                    </p>
                    <p class="product-stock" style="display: none;">Stock:
                        <?php echo (int)$product['stock_quantity']; ?></p>
                    <?php endif; ?>
                    <p class="product-status status-<?php echo $isActive ? 'active' : 'inactive'; ?>">
                        <?php echo $isActive ? 'Available' : 'Removed'; ?>
                    </p>
                    <div class="product-actions">
                        <a href="seller-new-product.php?id=<?php echo $product['product_id']; ?>"
                            class="btn btn-primary edit-btn">Edit</a>
                        <?php if ($isActive): ?>
                        <button class="btn btn-secondary delete-btn"
                            data-id="<?php echo $product['product_id']; ?>">Remove</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-content">
                <img src="../assets/image/icons/package.svg" alt="No products" class="empty-state-icon">
                <h2>No Products Yet</h2>
                <p>You haven't added any products to your store.</p>
                <a href="seller-new-product.php" class="btn btn-primary">Add Your First Product</a>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/trash.svg" alt="Remove">
            </div>
            <h3 class="modal-title">Confirm Removal</h3>
            <p class="modal-message">Are you sure you want to remove this product? It will no longer be available for
                purchase, but order history will remain.</p>
            <div class="modal-actions">
                <button id="cancelDelete" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmDelete" class="modal-btn modal-btn-confirm">Remove</button>
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

    <script>
    // Filter tabs functionality for seller-manage-product
    document.addEventListener('DOMContentLoaded', function() {
        const filterTabs = document.querySelectorAll('.filter-tab');
        const productCards = document.querySelectorAll('.product-card');
        const productCount = document.getElementById('productCount');

        function updateProductCount(filter) {
            if (!productCount) return;

            let count = 0;
            if (filter === 'all') {
                count = productCards.length;
            } else if (filter === 'active') {
                count = document.querySelectorAll('.product-card[data-active="1"]').length;
            } else if (filter === 'inactive') {
                count = document.querySelectorAll('.product-card[data-active="0"]').length;
            }

            if (filter === 'all') {
                productCount.textContent = `Showing all products (${count})`;
            } else if (filter === 'active') {
                productCount.textContent = `Showing available products (${count})`;
            } else if (filter === 'inactive') {
                productCount.textContent = `Showing removed products (${count})`;
            }
        }

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Update active tab
                filterTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;

                // Filter products
                productCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'flex';
                    } else if (filter === 'active') {
                        card.style.display = card.dataset.active === '1' ? 'flex' :
                            'none';
                    } else if (filter === 'inactive') {
                        card.style.display = card.dataset.active === '0' ? 'flex' :
                            'none';
                    }
                });

                updateProductCount(filter);
            });
        });

        // Initial count
        updateProductCount('all');
    });
    </script>

    <script src="../scripts/seller-manage-product.js"></script>
</body>

</html>