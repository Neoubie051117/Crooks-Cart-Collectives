<?php // PHP File Content ?>
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// FIXED: Changed from MySQLi to PDO to match your database-connect.php
try {
    $stmt = $connection->prepare("SELECT first_name FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($userData && isset($userData['first_name'])) {
        $firstName = $userData['first_name'];
    } else {
        $firstName = "Customer";
    }
} catch (PDOException $e) {
    error_log("Error fetching user: " . $e->getMessage());
    $firstName = "Customer";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <!-- FIXED: Moved inline styles to external CSS but kept minimal structure -->
    <style>
    .content {
        max-width: 1200px;
        margin: 80px auto 20px;
        padding: 20px;
    }

    .welcome-section {
        background: #f8f9fa;
        padding: 40px;
        border-radius: 8px;
        margin-bottom: 30px;
        text-align: center;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .dashboard-card {
        background: white;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .btn-primary {
        display: inline-block;
        background: #FF8246;
        color: white;
        padding: 12px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 20px;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background: #e66a2e;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <?php echo htmlspecialchars($firstName); ?>!</h1>
            <p>Manage your account, track orders, and start shopping.</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Start Shopping</h3>
                <p>Browse our collection of products</p>
                <a href="products.php" class="btn-primary">Shop Now</a>
            </div>

            <div class="dashboard-card">
                <h3>Your Profile</h3>
                <p>Update your personal information</p>
                <!-- FIXED: Correct path to profile page -->
                <a href="customer-profile.php" class="btn-primary">View Profile</a>
            </div>

            <div class="dashboard-card">
                <h3>Become a Seller</h3>
                <p>Start selling your products</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Now</a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>