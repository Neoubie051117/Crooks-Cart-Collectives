<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

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
    <title>Customer Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/customer-dashboard.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage your account, track orders, and discover amazing products from our community.</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Start Shopping</h3>
                <p>Browse our curated collection of products from verified sellers</p>
                <a href="products.php" class="btn-primary">Shop Now</a>
            </div>

            <div class="dashboard-card">
                <h3>Your Profile</h3>
                <p>Keep your personal information and contact details up to date</p>
                <a href="customer-profile.php" class="btn-primary">View Profile</a>
            </div>

            <div class="dashboard-card">
                <h3>Become a Seller</h3>
                <p>Start your entrepreneurial journey with our community</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Now</a>
            </div>

            <div class="dashboard-card">
                <h3>Shopping Cart</h3>
                <p>Review and manage items ready for purchase</p>
                <a href="cart.php" class="btn-primary">Go to Cart</a>
            </div>

            <div class="dashboard-card">
                <h3>My Orders</h3>
                <p>Track your order history and delivery status</p>
                <a href="orders.php" class="btn-primary">View Orders</a>
            </div>

            <div class="dashboard-card">
                <h3>About Us</h3>
                <p>Learn about our project, mission, and the development team</p>
                <a href="about.php" class="btn-primary">About Page</a>
            </div>

            <div class="dashboard-card">
                <h3>Contact Us</h3>
                <p>Get in touch with our team for questions or feedback</p>
                <a href="contact.php" class="btn-primary">Contact Page</a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>