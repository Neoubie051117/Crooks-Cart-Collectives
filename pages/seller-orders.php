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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - <?php echo htmlspecialchars($business_name); ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-orders.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="seller-header">
            <h1 class="page-title">Seller Order Management</h1>
        </div>

        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="delivered">Delivered</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <div id="sellerOrdersList" class="seller-orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/cancel.svg" alt="Confirm"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
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
                <img src="../assets/image/icons/mail.svg" alt="Notification"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/seller-orders.js"></script>
</body>

</html>