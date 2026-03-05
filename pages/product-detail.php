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
        // Fetch reviews for this product with user profile
        $reviewStmt = $connection->prepare("
            SELECT pr.*, u.first_name, u.last_name, u.username, u.user_id, u.profile_picture
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
    header('Location: product.php');
    exit;
}

// Helper function to format username with user ID (like @username #00001)
function formatUsername($username, $userId) {
    // Format: @username #00001 (padded to 5 digits)
    return '@' . htmlspecialchars($username) . ' #' . str_pad($userId, 5, '0', STR_PAD_LEFT);
}

// Helper function to get profile picture URL
function getProfilePictureUrl($picture) {
    if (empty($picture)) {
        return '../assets/image/icons/user-profile-circle.svg';
    }
    
    // If it's already a full URL
    if (filter_var($picture, FILTER_VALIDATE_URL)) {
        return $picture;
    }
    
    // Check if it's a path from data storage
    if (strpos($picture, 'Crooks-Data-Storage/users/') === 0) {
        return '../database/data-storage-handler.php?action=serve&path=' . urlencode($picture);
    }
    
    // If it's a relative path
    if (strpos($picture, '../') === 0) {
        return $picture;
    }
    
    if (strpos($picture, 'assets/') === 0) {
        return '../' . $picture;
    }
    
    return $picture;
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

// If no thumbnails found, use placeholder
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
    <link rel="stylesheet" href="../styles/product-detail.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    /* Review section fixes */
    .review-card {
        display: flex;
        flex-direction: column;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 20px;
        background: #ffffff;
    }

    .review-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .reviewer-profile {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #FF8246;
    }

    .reviewer-profile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .reviewer-info {
        display: flex;
        flex-direction: column;
    }

    .reviewer-username {
        font-size: 1rem;
        color: #000000;
    }

    .review-rating {
        display: flex;
        gap: 5px;
        margin-bottom: 10px;
    }

    .star {
        width: 18px;
        height: 18px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .review-comment {
        color: #333333;
        line-height: 1.6;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .review-date {
        font-size: 0.8rem;
        color: #999999;
    }

    .no-reviews-message {
        text-align: center;
        padding: 40px;
        background: #f5f5f5;
        border-radius: 8px;
        color: #666666;
        font-size: 1rem;
    }
    </style>
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
                        <div class="preview-placeholder" id="previewPlaceholder"
                            style="<?php echo !empty($thumbnailUrls[0]) && $thumbnailUrls[0] !== '../assets/image/icons/PlaceholderAssetProduct.png' ? 'display: none;' : ''; ?>">
                            <img src="../assets/image/icons/package.svg" alt="Product image">
                            <span>No image available</span>
                        </div>
                        <div class="preview-image" id="previewImage"
                            style="<?php echo !empty($thumbnailUrls[0]) && $thumbnailUrls[0] !== '../assets/image/icons/PlaceholderAssetProduct.png' ? 'background-image: url(' . $thumbnailUrls[0] . '); display: block;' : 'display: none;'; ?>">
                        </div>
                    </div>

                    <!-- Thumbnail Navigation - Only shows actual images, no empty slots -->
                    <?php 
                    // Filter out placeholder images
                    $actualImages = array_filter($thumbnailUrls, function($url) {
                        return $url !== '../assets/image/icons/PlaceholderAssetProduct.png';
                    });
                    
                    if (!empty($actualImages)): 
                    ?>
                    <div class="thumbnail-navigation" id="thumbnailNavigation">
                        <?php 
                        $counter = 0;
                        foreach ($thumbnailUrls as $index => $url): 
                            $isPlaceholder = ($url === '../assets/image/icons/PlaceholderAssetProduct.png');
                            // Skip placeholder images entirely - only show real images
                            if (!$isPlaceholder):
                        ?>
                        <button type="button" class="thumbnail-image-btn <?php echo $counter === 0 ? 'active' : ''; ?>"
                            data-index="<?php echo $index; ?>" style="background-image: url('<?php echo $url; ?>');">
                        </button>
                        <?php 
                                $counter++;
                            endif;
                        endforeach; 
                        ?>
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
                                <?php if ($product['is_verified'] === 'verified'): ?>
                                <span class="verified-badge">Verified</span>
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="product-price-container">
                            <span class="price-label">Price</span>
                            <span class="product-price">₱<?php echo number_format($product['price'], 2); ?></span>
                        </div>

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
                            <a href="sign-in.php?redirect=<?php echo urlencode('product-detail.php?id=' . $product['product_id']); ?>"
                                class="btn btn-primary login-to-purchase-btn">
                                <span class="btn-text">Login to Purchase</span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section (full width below) - FIXED: Only show username with user ID, no full name -->
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
                                <?php 
                                $profilePic = getProfilePictureUrl($review['profile_picture'] ?? '');
                                ?>
                                <img src="<?php echo htmlspecialchars($profilePic); ?>"
                                    alt="<?php echo htmlspecialchars($review['username']); ?>"
                                    onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                            </div>
                            <div class="reviewer-info">
                                <div class="reviewer-username">
                                    <?php echo formatUsername($review['username'], $review['user_id']); ?>
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

    <script src="../scripts/product-detail.js"></script>
</body>

</html>