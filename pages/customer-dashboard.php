<?php // PHP File Content ?>
<?php // PHP File Content ?>
<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_customer'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];
$isSeller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'] === true;

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
    <style>
    /* Dashboard card icon styling - using actual img tags instead of pseudo-elements */
    .dashboard-card {
        position: relative;
        padding-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .card-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 12px;
    }

    .card-icon img {
        width: 40px;
        height: 40px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover .card-icon img {
        transform: scale(1.1);
    }

    /* Remove any pseudo-element icons */
    .dashboard-card::before,
    .dashboard-card::after {
        display: none;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="welcome-section">
            <h1>Welcome back, <span><?php echo htmlspecialchars($firstName); ?></span>!</h1>
            <p>Manage your account, track orders, and discover amazing products from our community.</p>
        </div>

        <div class="dashboard-grid">
            <!-- Start Shopping Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cart-shopping.svg" alt="Shopping cart"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Start Shopping</h3>
                <p>Browse our curated collection of products from verified sellers</p>
                <a href="products.php" class="btn-primary">Shop Now</a>
            </div>

            <!-- Your Profile Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/order.svg" alt="Profile"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Your Profile</h3>
                <p>Keep your personal information and contact details up to date</p>
                <a href="customer-profile.php" class="btn-primary">View Profile</a>
            </div>

            <?php if ($isSeller): ?>
            <!-- SELLER: Show Selling dashboard link -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/package.svg" alt="Seller dashboard"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Selling Dashboard</h3>
                <p>Manage your products, view orders, and track your sales</p>
                <a href="seller-dashboard.php" class="btn-primary">Manage</a>
            </div>
            <?php else: ?>
            <!-- CUSTOMER ONLY: Show Become a Seller -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cart-plus.svg" alt="Become a seller"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Become a Seller</h3>
                <p>Start your entrepreneurial journey with our community</p>
                <a href="seller-fill-form.php" class="btn-primary">Apply Now</a>
            </div>
            <?php endif; ?>

            <!-- Shopping Cart Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/cart-arrow-downsvg.svg" alt="Shopping cart"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Shopping Cart</h3>
                <p>Review and manage items ready for purchase</p>
                <a href="cart.php" class="btn-primary">Go to Cart</a>
            </div>

            <!-- My Orders Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/order.svg" alt="Orders"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>My Orders</h3>
                <p>Track your order history and delivery status</p>
                <a href="orders.php" class="btn-primary">View Orders</a>
            </div>

            <!-- About Us Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/mail.svg" alt="About us"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>About Us</h3>
                <p>Learn about our project, mission, and the development team</p>
                <a href="about.php" class="btn-primary">About Page</a>
            </div>

            <!-- Contact Us Card -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="../assets/image/icons/mail.svg" alt="Contact us"
                        onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                </div>
                <h3>Contact Us</h3>
                <p>Get in touch with our team for questions or feedback</p>
                <a href="contact.php" class="btn-primary">Contact Page</a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>