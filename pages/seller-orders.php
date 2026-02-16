<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$seller_id = $_SESSION['seller_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Orders - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-orders.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <h1 class="page-title">Orders Containing Your Products</h1>
        <div id="sellerOrdersList" class="seller-orders-list">
            <div class="loading">Loading orders...</div>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/seller-orders.js"></script>
</body>

</html>