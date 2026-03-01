<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

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

// Determine media files
$mediaDir = $product['media_path'] ?? '';
$videoUrl = '';
$thumbnailUrls = [];

if (!empty($mediaDir)) {
    $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
    if (is_dir($fullDir)) {
        // Video first (video_1.*)
        $videoFiles = glob($fullDir . 'video_1.*');
        if (!empty($videoFiles)) {
            $videoFile = basename($videoFiles[0]);
            $videoUrl = getFileUrl($mediaDir . $videoFile);
        }
        // Thumbnails (thumbnail_1.* to thumbnail_5.*)
        for ($i = 1; $i <= 5; $i++) {
            $thumbFiles = glob($fullDir . 'thumbnail_' . $i . '.*');
            if (!empty($thumbFiles)) {
                $thumbFile = basename($thumbFiles[0]);
                $thumbnailUrls[] = getFileUrl($mediaDir . $thumbFile);
            }
        }
    }
}

// Fallback if no thumbnails
if (empty($thumbnailUrls)) {
    $thumbnailUrls[] = '../assets/image/icons/PlaceholderAssetProduct.png';
}
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
            <!-- REVISED LAYOUT: [IMAGE COLUMN] [PRODUCT INFO COLUMN] - Like seller-new-product -->
            <div class="product-details-grid">
                <!-- IMAGE COLUMN - Right side now (hoverable, thumbnail gallery) -->
                <div class="product-image-column right-column">
                    <!-- Main Preview Box (hoverable) -->
                    <div class="preview-box" id="mainPreviewBox">
                        <div class="preview-placeholder" id="previewPlaceholder" style="<?php echo !empty($thumbnailUrls[0]) ? 'display: none;' : ''; ?>">
                            <img src="../assets/image/icons/package.svg" alt="Product image">
                            <span>Product image</span>
                        </div>
                        <div class="preview-image" id="previewImage" style="<?php echo !empty($thumbnailUrls[0]) ? 'background-image: url(' . $thumbnailUrls[0] . '); display: block;' : 'display: none;'; ?>"></div>
                    </div>

                    <!-- Thumbnail Navigation (like seller-new-product) -->
                    <?php if (count($thumbnailUrls) > 0): ?>
                    <div class="thumbnail-navigation" id="thumbnailNavigation">
                        <?php foreach ($thumbnailUrls as $index => $url): ?>
                        <button type="button" class="thumbnail-image-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>" style="background-image: url('<?php echo $url; ?>');">
                        </button>
                        <?php endforeach; ?>
                        <!-- Fill remaining slots with empty placeholders if less than 5 -->
                        <?php for ($i = count($thumbnailUrls); $i < 5; $i++): ?>
                        <button type="button" class="thumbnail-image-btn empty-slot" data-index="<?php echo $i; ?>">
                            <img src="../assets/image/icons/package.svg" alt="Empty slot" class="thumbnail-image">
                        </button>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- PRODUCT INFO COLUMN - Left side now -->
                <div class="product-info-column left-column">
                    <div class="info-section">
                        <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>

                        <div class="product-meta">
                            <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                            <span class="product-seller">
                                by <strong><?php echo htmlspecialchars($product['business_name']); ?></strong>
                                <?php if ($product['is_verified']): ?>
                                <span class="verified-badge">Verified</span>
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="product-price-container">
                            <span class="price-label">Price</span>
                            <span class="product-price">₱<?php echo number_format($product['price'], 2); ?></span>
                        </div>

                        <div class="stock-status <?php echo $product['stock_quantity'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                            <span class="status-indicator"></span>
                            <span class="status-text">
                                <?php if ($product['stock_quantity'] > 0): ?>
                                <?php echo $product['stock_quantity']; ?> in stock
                                <?php else: ?>
                                Out of Stock
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="product-description">
                            <h2>Description</h2>
                            <div class="description-content">
                                <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                            </div>
                        </div>

                        <!-- Action buttons inside info column -->
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
            </div>

            <!-- Reviews Section (full width below) -->
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