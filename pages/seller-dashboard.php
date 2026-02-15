<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch basic stats
$stats = [];
try {
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as total FROM products WHERE seller_id = ?");
    $stmt->execute([$sellerId]);
    $stats['products'] = $stmt->fetch()['total'];

    // Total orders (items sold)
    $stmt = $connection->prepare("
        SELECT COUNT(DISTINCT co.order_id) as orders, SUM(pi.quantity) as items_sold
        FROM customer_orders co
        JOIN purchase_items pi ON co.order_id = pi.order_id
        JOIN products p ON pi.product_id = p.product_id
        WHERE p.seller_id = ? AND co.status IN ('processing','shipped','delivered')
    ");
    $stmt->execute([$sellerId]);
    $stats = array_merge($stats, $stmt->fetch(PDO::FETCH_ASSOC) ?: ['orders' => 0, 'items_sold' => 0]);
} catch (PDOException $e) {
    error_log("Seller dashboard stats error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .stat-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .stat-number {
        font-size: 2.5em;
        font-weight: bold;
        color: #FF8246;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .action-card {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 25px;
        text-align: center;
        transition: box-shadow 0.3s;
    }

    .action-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background: #FF8246;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 15px;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <h1>Seller Dashboard</h1>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-number"><?= $stats['products'] ?></div>
                <div>Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $stats['orders'] ?? 0 ?></div>
                <div>Orders Received</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $stats['items_sold'] ?? 0 ?></div>
                <div>Items Sold</div>
            </div>
        </div>

        <div class="action-grid">
            <div class="action-card">
                <h3>Add New Product</h3>
                <p>List a new item for sale</p>
                <a href="seller-add-product.php" class="btn">Add Product</a>
            </div>
            <div class="action-card">
                <h3>Manage Products</h3>
                <p>Edit or remove your listings</p>
                <a href="seller-products.php" class="btn">Manage</a>
            </div>
            <div class="action-card">
                <h3>View Orders</h3>
                <p>See orders containing your products</p>
                <a href="seller-orders.php" class="btn">View Orders</a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>