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
    <style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
        gap: 5px;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        display: inline-block;
        padding: 8px 12px;
        background: #f0f0f0;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        transition: background 0.3s, color 0.3s;
        font-size: 14px;
        min-width: 40px;
        text-align: center;
    }

    .pagination a:hover {
        background: #FF8246;
        color: white;
    }

    .pagination .current {
        background: #FF8246;
        color: white;
        font-weight: bold;
    }

    .pagination .disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .pagination .ellipsis {
        padding: 8px 5px;
        background: transparent;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
        padding: 20px 0;
    }

    .product-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        background: white;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .product-info {
        padding: 15px;
    }

    .product-title {
        font-size: 16px;
        margin: 0 0 10px 0;
        color: #333;
        line-height: 1.3;
        height: 2.6em;
        overflow: hidden;
    }

    .product-price {
        font-size: 18px;
        font-weight: bold;
        color: #FF8246;
        margin: 0 0 5px 0;
    }

    .product-seller {
        font-size: 14px;
        color: #666;
        margin: 0 0 10px 0;
    }

    .view-product-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #FF8246;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: background 0.3s;
        border: none;
        cursor: pointer;
    }

    .view-product-btn:hover {
        background: #e66a2e;
    }

    .no-products {
        text-align: center;
        padding: 50px 20px;
        color: #666;
    }

    .no-products a {
        color: #FF8246;
        text-decoration: none;
    }

    .no-products a:hover {
        text-decoration: underline;
    }
    </style>
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
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['image_path'] ?: 'https://via.placeholder.com/250x200/FF8246/ffffff?text=' . urlencode(substr($product['name'], 0, 20))); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image"
                    onerror="this.onerror=null; this.src='https://via.placeholder.com/250x200/FF8246/ffffff?text=<?php echo urlencode(substr($product['name'], 0, 20)); ?>';">
                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">₱<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-seller">Seller: <?php echo htmlspecialchars($product['business_name']); ?></p>
                    <a href="product-details.php?id=<?php echo $product['product_id']; ?>" class="view-product-btn">View
                        Details</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">&laquo; Previous</a>
            <?php else: ?>
            <span class="disabled">&laquo; Previous</span>
            <?php endif; ?>

            <?php
                // Show page numbers
                $start_page = max(1, $page - 2);
                $end_page = min($total_pages, $page + 2);
                
                if ($start_page > 1) {
                    echo '<a href="?page=1">1</a>';
                    if ($start_page > 2) echo '<span class="ellipsis">...</span>';
                }
                
                for ($i = $start_page; $i <= $end_page; $i++): 
                    if ($i == $page): ?>
            <span class="current"><?php echo $i; ?></span>
            <?php else: ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; 
                endfor;

                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) echo '<span class="ellipsis">...</span>';
                    echo '<a href="?page=' . $total_pages . '">' . $total_pages . '</a>';
                }
            ?>

            <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Next &raquo;</a>
            <?php else: ?>
            <span class="disabled">Next &raquo;</span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>