<?php
// Crooks-Cart-Collectives/pages/seller-dashboard.php
// FIXED VERSION - Replaced emoji icons with SVG icons
?>
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch seller info
$stmt = $connection->prepare("SELECT business_name FROM sellers WHERE seller_id = ?");
$stmt->execute([$sellerId]);
$seller = $stmt->fetch();
$business_name = $seller['business_name'] ?? 'Your Store';

// Fetch basic stats
$stats = [];
try {
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as total FROM products WHERE seller_id = ?");
    $stmt->execute([$sellerId]);
    $stats['products'] = $stmt->fetch()['total'];

    // Total orders count (distinct seller orders)
    $stmt = $connection->prepare("
        SELECT COUNT(DISTINCT seller_order_id) as orders,
               SUM(quantity) as items_sold
        FROM purchase_items pi
        JOIN seller_orders so ON pi.seller_order_id = so.seller_order_id
        WHERE so.seller_id = ?
    ");
    $stmt->execute([$sellerId]);
    $orderStats = $stmt->fetch(PDO::FETCH_ASSOC);
    $stats['orders'] = $orderStats['orders'] ?? 0;
    $stats['items_sold'] = $orderStats['items_sold'] ?? 0;

    // Total revenue
    $stmt = $connection->prepare("
        SELECT SUM(seller_total) as total_revenue
        FROM seller_orders
        WHERE seller_id = ? AND seller_status = 'completed'
    ");
    $stmt->execute([$sellerId]);
    $revenue = $stmt->fetch();
    $stats['revenue'] = $revenue['total_revenue'] ?? 0;

} catch (PDOException $e) {
    error_log("Seller dashboard stats error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - <?php echo htmlspecialchars($business_name); ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    /* Main Content Layout */
    .content {
        max-width: 1200px;
        margin: 100px auto 40px;
        padding: 0 20px;
    }

    /* Welcome Section */
    .welcome-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 40px 30px;
        border-radius: 16px;
        margin-bottom: 40px;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
    }

    .welcome-section h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .welcome-section h1 span {
        color: #FF8246;
    }

    .welcome-section p {
        font-size: 1.1rem;
        color: #666;
        margin: 0;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #eef2f6;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8246, #FFA500);
    }

    /* FIXED: Stat icon styling */
    .stat-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
        transition: transform 0.3s ease;
    }

    .stat-card:hover .stat-icon img {
        transform: scale(1.1);
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 700;
        color: #FF8246;
        line-height: 1.2;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 1rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .stat-subtext {
        font-size: 0.9rem;
        color: #adb5bd;
        margin-top: 10px;
    }

    /* Quick Actions */
    .quick-actions {
        margin-bottom: 40px;
    }

    .quick-actions h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .action-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #eef2f6;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border-color: #FF8246;
    }

    /* FIXED: Action icon styling */
    .action-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .action-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
        transition: transform 0.3s ease;
    }

    .action-card:hover .action-icon img {
        transform: scale(1.1);
    }

    .action-card h3 {
        font-size: 1.3rem;
        color: #333;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .action-card p {
        font-size: 0.95rem;
        color: #6c757d;
        margin-bottom: 0;
        line-height: 1.5;
    }

    /* Recent Activity */
    .recent-activity {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #eef2f6;
    }

    .recent-activity h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .recent-activity h2 a {
        font-size: 0.95rem;
        color: #FF8246;
        text-decoration: none;
        font-weight: 500;
    }

    .recent-activity h2 a:hover {
        text-decoration: underline;
    }

    .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .activity-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #eef2f6;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-status {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .activity-status.pending {
        background: #ffc107;
    }

    .activity-status.confirmed {
        background: #17a2b8;
    }

    .activity-status.processing {
        background: #007bff;
    }

    .activity-status.shipped {
        background: #6f42c1;
    }

    .activity-status.delivered {
        background: #28a745;
    }

    .activity-status.cancelled {
        background: #dc3545;
    }

    .activity-details {
        flex: 1;
    }

    .activity-details p {
        margin: 0;
        font-size: 0.95rem;
        color: #495057;
    }

    .activity-details small {
        font-size: 0.8rem;
        color: #adb5bd;
    }

    .activity-link {
        color: #FF8246;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .content {
            margin-top: 80px;
        }

        .welcome-section {
            padding: 30px 20px;
        }

        .welcome-section h1 {
            font-size: 1.8rem;
        }

        .stat-number {
            font-size: 1.8rem;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .welcome-section {
            padding: 25px 15px;
        }

        .welcome-section h1 {
            font-size: 1.5rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .action-card {
            padding: 25px;
        }
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($business_name); ?></span>!</h1>
            <p>Manage your products, track orders, and grow your business</p>
        </div>

        <!-- Statistics - FIXED: Replaced emojis with SVG icons -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/package.svg" alt="Products icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number"><?= $stats['products'] ?></div>
                <div class="stat-label">Total Products</div>
                <div class="stat-subtext">Active listings</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/order.svg" alt="Orders icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number"><?= $stats['orders'] ?></div>
                <div class="stat-label">Orders Received</div>
                <div class="stat-subtext">Across all products</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/cart-shopping-fast.svg" alt="Items sold icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number"><?= $stats['items_sold'] ?></div>
                <div class="stat-label">Items Sold</div>
                <div class="stat-subtext">Total quantity</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <img src="../assets/image/icons/chart-line-up.svg" alt="Revenue icon"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <div class="stat-number">₱<?= number_format($stats['revenue'], 2) ?></div>
                <div class="stat-label">Total Revenue</div>
                <div class="stat-subtext">From completed orders</div>
            </div>
        </div>

        <!-- Quick Actions - FIXED: Replaced emojis with SVG icons -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="actions-grid">
                <a href="seller-add-product.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/cart-plus.svg" alt="Add product icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>Add New Product</h3>
                    <p>List a new item for sale on the marketplace</p>
                </a>

                <a href="seller-products.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/updatesvg.svg" alt="Manage products icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>Manage Products</h3>
                    <p>Edit, update, or remove your existing listings</p>
                </a>

                <a href="seller-orders.php" class="action-card">
                    <div class="action-icon">
                        <img src="../assets/image/icons/order.svg" alt="View orders icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3>View All Orders</h3>
                    <p>Track and manage customer orders</p>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h2>
                Recent Orders
                <a href="seller-orders.php">View All →</a>
            </h2>
            <?php
            // Fetch recent 5 orders
            try {
                $stmt = $connection->prepare("
                    SELECT 
                        so.seller_order_id,
                        so.seller_status,
                        so.created_at,
                        COUNT(pi.order_item_id) as item_count,
                        co.order_id
                    FROM seller_orders so
                    JOIN customer_orders co ON so.order_id = co.order_id
                    LEFT JOIN purchase_items pi ON so.seller_order_id = pi.seller_order_id
                    WHERE so.seller_id = ?
                    GROUP BY so.seller_order_id
                    ORDER BY so.created_at DESC
                    LIMIT 5
                ");
                $stmt->execute([$sellerId]);
                $recentOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (empty($recentOrders)) {
                    echo '<p style="text-align: center; color: #6c757d; padding: 20px;">No orders yet. Check back soon!</p>';
                } else {
                    echo '<ul class="activity-list">';
                    foreach ($recentOrders as $order) {
                        $date = new DateTime($order['created_at']);
                        $formattedDate = $date->format('M j, Y g:i A');
                        ?>
            <li class="activity-item">
                <span class="activity-status <?= $order['seller_status'] ?>"></span>
                <div class="activity-details">
                    <p>Order #<?= $order['order_id'] ?> - <?= $order['item_count'] ?> item(s)</p>
                    <small><?= $formattedDate ?></small>
                </div>
                <a href="seller-orders.php#order-<?= $order['seller_order_id'] ?>" class="activity-link">View Details
                    →</a>
            </li>
            <?php
                    }
                    echo '</ul>';
                }
            } catch (PDOException $e) {
                error_log("Error fetching recent orders: " . $e->getMessage());
                echo '<p style="text-align: center; color: #6c757d; padding: 20px;">Unable to load recent orders.</p>';
            }
            ?>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>