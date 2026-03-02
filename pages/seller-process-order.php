<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$seller_id = $_SESSION['seller_id'];

$stmt = $connection->prepare("SELECT business_name FROM sellers WHERE seller_id = ?");
$stmt->execute([$seller_id]);
$seller = $stmt->fetch();
$business_name = $seller['business_name'] ?? 'Your Store';

// Helper function to get product image URL for seller process orders
function getSellerProcessImageUrl($mediaPath) {
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
    <title>Process Orders - <?php echo htmlspecialchars($business_name); ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-process-order.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="page-title-header">
            <h1>Process Orders</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="delivered">Delivered</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <!-- Orders Container -->
        <div id="sellerOrdersList" class="orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Confirm">
            </div>
            <h3 id="confirmTitle" class="modal-title">Confirm Action</h3>
            <p id="confirmMessage" class="modal-message">Are you sure?</p>
            <div class="modal-actions">
                <button id="cancelAction" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmAction" class="modal-btn modal-btn-confirm">Confirm</button>
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

    <script src="../scripts/seller-process-order.js"></script>
</body>

</html>