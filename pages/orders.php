<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];

// Helper function to get product image URL for orders page
function getOrdersImageUrl($mediaPath) {
    // Default fallback
    $fallbackImage = '../assets/image/icons/package.svg';
    
    if (empty($mediaPath)) {
        return $fallbackImage;
    }
    
    // Check if it's a media directory path
    if (strpos($mediaPath, 'Crooks-Data-Storage/products/') === 0) {
        $mediaDir = rtrim($mediaPath, '/') . '/';
        
        // Build the full server path to look for thumbnail_1.*
        $fullDir = dirname(__DIR__, 2) . '/' . $mediaDir;
        $thumbFiles = glob($fullDir . 'thumbnail_1.*');
        
        if (!empty($thumbFiles)) {
            $thumbFile = basename($thumbFiles[0]);
            return '../database/data-storage-handler.php?action=serve&path=' . rawurlencode($mediaDir . $thumbFile);
        }
        
        return $fallbackImage;
    }
    
    // Direct file path
    if (strpos($mediaPath, 'assets/') === 0) {
        return '../' . $mediaPath;
    }
    
    if (filter_var($mediaPath, FILTER_VALIDATE_URL)) {
        return $mediaPath;
    }
    
    return $fallbackImage;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/orders.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>My Orders</h1>
        </div>

        <!-- Filter Tabs - Will be shown/hidden by JavaScript based on orders data -->
        <div class="filter-tabs" id="filterTabs" style="display: none;">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="delivered">Delivered</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <!-- Orders Container - Will be populated by JavaScript -->
        <div id="ordersList" class="orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Review Modal -->
    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/star-filled.svg" alt="Review">
            </div>
            <h2 class="modal-title">Write a Review</h2>
            <form id="reviewForm">
                <input type="hidden" name="order_id" id="reviewOrderId">
                <input type="hidden" name="product_id" id="reviewProductId">

                <div class="form-group">
                    <label class="form-label">Rating</label>
                    <div class="star-rating" id="starRatingContainer">
                        <span class="star" data-value="1"></span>
                        <span class="star" data-value="2"></span>
                        <span class="star" data-value="3"></span>
                        <span class="star" data-value="4"></span>
                        <span class="star" data-value="5"></span>
                    </div>
                    <input type="hidden" name="rating" id="ratingValue" required>
                    <div class="rating-error" id="ratingError"></div>
                </div>

                <div class="form-group">
                    <label for="comment" class="form-label">Review (Optional)</label>
                    <textarea id="comment" name="comment" class="form-textarea" rows="4"
                        placeholder="Share your experience with this product..."></textarea>
                </div>

                <div class="modal-actions">
                    <button type="button" class="modal-btn modal-btn-cancel" id="cancelReview">Cancel</button>
                    <button type="submit" class="modal-btn modal-btn-confirm" id="submitReview">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <div id="cancelModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Cancel">
            </div>
            <h2 class="modal-title">Cancel Order</h2>
            <p class="modal-message">Are you sure you want to cancel this order? This action cannot be undone.</p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-cancel" id="cancelCancel">No</button>
                <button class="modal-btn modal-btn-confirm" id="confirmCancel">Confirm</button>
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
                <button class="modal-btn modal-btn-confirm" id="notificationClose">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    <script src="../scripts/orders.js"></script>
</body>

</html>