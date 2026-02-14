<?php
session_start();
require_once('../database/database-connect.php');

// Pagination setup
$items_per_page = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Get total number of products
$total_stmt = $connection->prepare("SELECT COUNT(*) as total FROM products WHERE is_active = 1");
$total_stmt->execute();
$total_products = $total_stmt->fetch()['total'];
$total_pages = ceil($total_products / $items_per_page);

// Ensure page is within valid range
if ($page < 1) $page = 1;
if ($page > $total_pages && $total_pages > 0) $page = $total_pages;

// Fetch products for current page
$products = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.is_active = 1 
        ORDER BY p.date_added DESC 
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // FIX: Process image paths for all products based on your schema
    foreach ($products as &$product) {
        if (!empty($product['image_path'])) {
            // Schema stores as 'assets/PlaceholderAssetProduct.png'
            if (strpos($product['image_path'], 'assets/') === 0) {
                // It's already a path from root, just add '../' since we're in pages folder
                $product['display_image'] = '../' . $product['image_path'];
            } elseif (filter_var($product['image_path'], FILTER_VALIDATE_URL)) {
                // It's a full URL
                $product['display_image'] = $product['image_path'];
            } elseif (strpos($product['image_path'], '/') === false) {
                // It's just a filename, assume it's in assets/image/icons/
                $product['display_image'] = '../assets/image/icons/' . $product['image_path'];
            } else {
                // Some other relative path
                $product['display_image'] = '../' . $product['image_path'];
            }
        } else {
            // No image, use placeholder
            $product['display_image'] = '../assets/image/icons/PlaceholderAssetProduct.png';
        }
    }
    
} catch (PDOException $e) {
    error_log("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/products.css">
    <link rel="stylesheet" href="../styles/footer.css">

    <!-- FIX: Remove inline styles and use external CSS properly -->
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">All Products</div>

        <?php if (empty($products)): ?>
        <div class="no-products">
            <p>No products available at the moment.</p>
            <p>Check back soon or <a href="seller-registration.php">become a seller</a> to add products!</p>
        </div>
        <?php else: ?>

        <!-- FIX: Add filter/sort controls (optional enhancement)
        <div class="products-controls">
            <div class="products-count">
                Showing <?php echo ($offset + 1); ?> - <?php echo min($offset + $items_per_page, $total_products); ?> of
                <?php echo $total_products; ?> products
            </div>
            <div class="products-sort">
                <label for="sort">Sort by:</label>
                <select id="sort" name="sort">
                    <option value="newest">Newest</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="name">Name</option>
                </select>
            </div>
        </div> -->

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['display_image']); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image" loading="lazy"
                    onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">

                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-seller">
                        Seller: <?php echo htmlspecialchars($product['business_name']); ?>
                    </p>
                    <a href="product-details.php?id=<?php echo $product['product_id']; ?>" class="view-product-btn">
                        View Details
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if ($total_pages > 1): ?>
        <!-- FIX: Improved pagination with better styling -->

        <div class="pagination-container">
            <div class="pagination">
                <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="pagination-item prev">&laquo; Previous</a>
                <?php else: ?>
                <span class="pagination-item disabled">&laquo; Previous</span>
                <?php endif; ?>

                <?php
                // Show page numbers with intelligent range
                $start_page = max(1, $page - 2);
                $end_page = min($total_pages, $page + 2);
                
                if ($start_page > 1) {
                    echo '<a href="?page=1" class="pagination-item">1</a>';
                    if ($start_page > 2) echo '<span class="pagination-ellipsis">...</span>';
                }
                
                for ($i = $start_page; $i <= $end_page; $i++): 
                    if ($i == $page): ?>
                <span class="pagination-item active"><?php echo $i; ?></span>
                <?php else: ?>
                <a href="?page=<?php echo $i; ?>" class="pagination-item"><?php echo $i; ?></a>
                <?php endif; 
                endfor;

                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) echo '<span class="pagination-ellipsis">...</span>';
                    echo '<a href="?page=' . $total_pages . '" class="pagination-item">' . $total_pages . '</a>';
                }
                ?>

                <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="pagination-item next">Next &raquo;</a>
                <?php else: ?>
                <span class="pagination-item disabled">Next &raquo;</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>

    <!-- FIX: Add JavaScript for sorting functionality -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sortSelect = document.getElementById('sort');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                const url = new URL(window.location.href);
                url.searchParams.set('sort', this.value);
                url.searchParams.set('page', '1'); // Reset to first page
                window.location.href = url.toString();
            });

            // Preserve selected sort option
            const urlParams = new URLSearchParams(window.location.search);
            const sortParam = urlParams.get('sort');
            if (sortParam) {
                sortSelect.value = sortParam;
            }
        }
    });
    </script>
</body>

</html>