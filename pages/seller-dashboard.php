<?php
session_start();
if (!isset($_SESSION['is_seller'])) {
    header('Location: seller-registration.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <?php include_once('header.php'); ?>
</head>

<body>
    <div class="content">
        <h1>Seller Dashboard</h1>
        <p>Manage your products and orders here.</p>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>