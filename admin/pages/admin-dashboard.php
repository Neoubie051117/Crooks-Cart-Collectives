<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}

$adminId = $_SESSION['admin_id'];

// Fetch admin name
try {
    $stmt = $connection->prepare("SELECT first_name FROM administrators WHERE admin_id = ?");
    $stmt->execute([$adminId]);
    $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstName = $adminData['first_name'] ?? 'Admin';
} catch (PDOException $e) {
    error_log("Error fetching admin: " . $e->getMessage());
    $firstName = "Admin";
}

// Fetch stats for dashboard - UPDATED for ENUM values
$stats = [];
try {
    // Pending seller verifications - now checking for 'pending' enum value
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 'pending'");
    $stmt->execute();
    $stats['pending_verifications'] = $stmt->fetch()['count'];
    
    // Verified sellers - now checking for 'verified' enum value
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 'verified'");
    $stmt->execute();
    $stats['verified_sellers'] = $stmt->fetch()['count'];
    
    // Rejected sellers - now checking for 'rejected' enum value
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers WHERE is_verified = 'rejected'");
    $stmt->execute();
    $stats['rejected_sellers'] = $stmt->fetch()['count'];
    
    // Total users
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM users");
    $stmt->execute();
    $stats['total_users'] = $stmt->fetch()['count'];
    
    // Total sellers
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM sellers");
    $stmt->execute();
    $stats['total_sellers'] = $stmt->fetch()['count'];
    
    // Total products
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM products");
    $stmt->execute();
    $stats['total_products'] = $stmt->fetch()['count'];
    
    // Total orders
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM orders");
    $stmt->execute();
    $stats['total_orders'] = $stmt->fetch()['count'];
    
} catch (PDOException $e) {
    error_log("Error fetching admin stats: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #FF8246;
        margin: 10px 0;
    }

    .stat-label {
        color: #666666;
        font-size: 0.9rem;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #363940;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-color: #FF8246;
    }

    .card-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 15px;
    }

    .card-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .dashboard-card h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #000000;
    }

    .dashboard-card p {
        color: #666666;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    </style>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage the marketplace, verify sellers, and monitor system activity.</p>
        </div>

        <!-- Statistics Overview - UPDATED to show all seller statuses -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['pending_verifications'] ?? 0; ?></div>
                <div class="stat-label">Pending Verifications</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_users'] ?? 0; ?></div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_sellers'] ?? 0; ?></div>
                <div class="stat-label">Total Sellers</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_products'] ?? 0; ?></div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $stats['total_orders'] ?? 0; ?></div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <!-- Admin Profile Card -->
            <a href="admin-profile.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/profile.svg" alt="Profile">
                </div>
                <h3>Admin Profile</h3>
                <p>Manage your personal information and account settings</p>
            </a>

            <!-- Verify Sellers Card - UPDATED to show pending count correctly -->
            <a href="admin-verify-sellers.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/verified-empty.svg" alt="Verify Sellers">
                </div>
                <h3>Verify Sellers</h3>
                <p>Review and verify seller applications (<?php echo $stats['pending_verifications'] ?? 0; ?> pending)
                </p>
            </a>

            <!-- Register Other Admin Card -->
            <a href="admin-sign-up.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/add-circle-empty.svg" alt="Register Admin">
                </div>
                <h3>Register Admin</h3>
                <p>Create new administrator accounts</p>
            </a>

            <!-- Logs Card -->
            <a href="admin-logs.php" class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/time-update.svg" alt="Logs">
                </div>
                <h3>System Logs</h3>
                <p>Monitor user activities and system events</p>
            </a>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>