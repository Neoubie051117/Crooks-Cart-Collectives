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
    <title>System Logs - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-logs.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>System Logs</h1>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <span class="filter-tab active" data-filter="all">All Activities</span>
            <span class="filter-tab" data-filter="user_login">User Logins</span>
            <span class="filter-tab" data-filter="seller_application">Seller Applications</span>
            <span class="filter-tab" data-filter="product_added">Product Additions</span>
            <span class="filter-tab" data-filter="order_placed">Orders</span>
        </div>

        <!-- Logs Container -->
        <div id="logsList" class="logs-list">
            <div class="loading">Loading logs...</div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-logs.js"></script>
</body>

</html>