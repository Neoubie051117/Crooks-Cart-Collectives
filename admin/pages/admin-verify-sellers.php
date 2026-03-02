<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Sellers - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-verify-sellers.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>Verify Sellers</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="pending">Pending Verification</span>
            <span class="filter-tab" data-filter="verified">Verified</span>
            <span class="filter-tab" data-filter="rejected">Rejected</span>
        </div>

        <!-- Sellers List Container -->
        <div id="sellersList" class="sellers-list">
            <div class="loading">Loading sellers...</div>
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

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-verify-sellers.js"></script>
</body>

</html>