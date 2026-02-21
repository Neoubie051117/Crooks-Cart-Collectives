<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$seller_id = $_SESSION['seller_id'];

// Fetch seller info
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

        <!-- Filter Tabs - Reusing the same pattern as customer orders -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Orders</span>
            <span class="filter-tab" data-filter="pending">Pending</span>
            <span class="filter-tab" data-filter="processing">Processing</span>
            <span class="filter-tab" data-filter="completed">Completed</span>
            <span class="filter-tab" data-filter="cancelled">Cancelled</span>
        </div>

        <!-- Orders List Container -->
        <div id="sellerOrdersList" class="seller-orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <!-- Confirmation Modal - Reusing pattern from orders.php -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#FF8246" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
            </div>
            <h3 id="confirmTitle" class="modal-title">Confirm Action</h3>
            <p id="confirmMessage" class="modal-message">Are you sure?</p>
            <div class="modal-actions">
                <button id="cancelAction" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmAction" class="modal-btn modal-btn-confirm">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal - Reusing pattern from orders.php -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#FF8246" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
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