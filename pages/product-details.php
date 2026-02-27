<?php
session_start();
require_once('../database/database-connect.php');

$product_id = $_GET['id'] ?? 0;

$product = [];
$reviews = [];
try {
    // Fetch product details
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name, s.is_verified 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.product_id = ? AND p.is_active = 1
    ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        // Fetch reviews for this product with user profile and username
        $reviewStmt = $connection->prepare("
            SELECT pr.*, u.first_name, u.last_name, u.username, u.profile_picture
            FROM product_reviews pr
            JOIN users u ON pr.user_id = u.user_id
            WHERE pr.product_id = ?
            ORDER BY pr.date_posted DESC
        ");
        $reviewStmt->execute([$product_id]);
        $reviews = $reviewStmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log("Error fetching product: " . $e->getMessage());
}

if (!$product) {
    header('Location: products.php');
    exit;
}

function getProductImagePath($image_path) {
    if (empty($image_path)) {
        return '../assets/image/icons/PlaceholderAssetProduct.png';
    }
    
    if (filter_var($image_path, FILTER_VALIDATE_URL)) {
        return $image_path;
    }
    
    if (strpos($image_path, 'assets/') === 0) {
        return '../' . $image_path;
    }
    
    if (strpos($image_path, '/') === false) {
        return '../assets/image/icons/' . $image_path;
    }
    
    return '../' . $image_path;
}

$imagePath = getProductImagePath($product['image_path'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/product-details.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="product-details-wrapper">
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo htmlspecialchars($product['name']); ?></li>
                </ol>
            </nav>

            <div class="product-details-grid">
                <div class="product-image-column">
                    <div class="product-image-container">
                        <div class="main-image-wrapper">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="main-product-image"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='../assets/image/icons/PlaceholderAssetProduct.png';">
                        </div>
                    </div>
                </div>

                <div class="product-info-column">
                    <div class="product-info-header">
                        <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>

                        <div class="product-meta">
                            <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                            <span class="product-seller">
                                Sold by: <strong><?php echo htmlspecialchars($product['business_name']); ?></strong>
                                <?php if ($product['is_verified']): ?>
                                <span class="verified-badge">Verified</span>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>

                    <div class="product-info-panel">
                        <div class="info-panel-row">
                            <div class="info-panel-item price-item">
                                <span class="info-label">Price</span>
                                <span class="product-price">₱<?php echo number_format($product['price'], 2); ?></span>
                            </div>

                            <div class="info-panel-item stock-item">
                                <span class="info-label">Availability</span>
                                <div
                                    class="stock-status <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                                    <span class="status-indicator"></span>
                                    <span class="status-text">
                                        <?php if ($product['stock_quantity'] > 0): ?>
                                        <?php echo $product['stock_quantity']; ?> in stock
                                        <?php else: ?>
                                        Out of Stock
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-description">
                        <h2>Description</h2>
                        <div class="description-content">
                            <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                        </div>
                    </div>

                    <div class="product-actions">
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <button class="btn btn-primary add-to-cart-btn"
                            data-product-id="<?php echo $product['product_id']; ?>"
                            <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                            <span class="btn-text">Add to Cart</span>
                        </button>
                        <button class="btn btn-secondary buy-now-btn"
                            data-product-id="<?php echo $product['product_id']; ?>"
                            <?php echo $product['stock_quantity'] <= 0 ? 'disabled' : ''; ?>>
                            <span class="btn-text">Buy Now</span>
                        </button>
                        <?php else: ?>
                        <a href="sign-in.php?redirect=<?php echo urlencode('product-details.php?id=' . $product['product_id']); ?>"
                            class="btn btn-primary login-to-purchase-btn">
                            <span class="btn-text">Login to Purchase</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="reviews-section">
                <h2 class="reviews-title">Customer Reviews (<?php echo count($reviews); ?>)</h2>

                <?php if (empty($reviews)): ?>
                <div class="no-reviews-message">
                    This product has no reviews yet.
                </div>
                <?php else: ?>
                <div class="reviews-list">
                    <?php foreach ($reviews as $review): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <div class="reviewer-profile">
                                <?php if (!empty($review['profile_picture'])): ?>
                                <img src="<?php echo htmlspecialchars($review['profile_picture']); ?>"
                                    alt="<?php echo htmlspecialchars($review['first_name']); ?>"
                                    onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                                <?php else: ?>
                                <img src="../assets/image/icons/user-profile-circle.svg" alt="Profile">
                                <?php endif; ?>
                            </div>
                            <div class="reviewer-info">
                                <div class="reviewer-name">
                                    <?php echo htmlspecialchars($review['first_name'] . ' ' . $review['last_name']); ?>
                                </div>
                                <div class="reviewer-username">
                                    @<?php echo htmlspecialchars($review['username']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <img src="../assets/image/icons/<?php echo $i <= $review['rating'] ? 'star-filled.svg' : 'star-empty.svg'; ?>"
                                alt="Star" class="star">
                            <?php endfor; ?>
                        </div>
                        <?php if (!empty($review['comment'])): ?>
                        <div class="review-comment">
                            <?php echo nl2br(htmlspecialchars($review['comment'])); ?>
                        </div>
                        <?php endif; ?>
                        <div class="review-date">
                            <?php echo date('M j, Y', strtotime($review['date_posted'])); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/product-details.js"></script>
</body>

</html>