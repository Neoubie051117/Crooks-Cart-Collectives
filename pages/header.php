<?php // PHP File Content ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===== FIXED: Separate user login from admin login =====
// Check if user is logged in (regular user/customer/seller)
$isUserLoggedIn = isset($_SESSION['user_id']);

// Check if user is a seller
$isSeller = isset($_SESSION['is_seller']) && $_SESSION['is_seller'] === true;

// ===== IMPORTANT: DO NOT check for admin_id in public header =====
// Admin users should use the admin panel, not the public interface
// If an admin tries to access public pages, treat them as NOT logged in
// This prevents admin session from affecting public navigation

// Path detection
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = dirname($_SERVER['PHP_SELF']);

$is_root = ($current_dir == '/' || $current_dir == '\\' || $current_dir == '.');
$is_pages = strpos($current_dir, '/pages') !== false || strpos($current_dir, '\pages') !== false;

if ($is_root) {
    $pathPrefix = '';
} elseif ($is_pages) {
    $pathPrefix = '../';
} else {
    $depth = substr_count($current_dir, '/') - 1;
    $pathPrefix = str_repeat('../', $depth);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/sign-out.css">

    <script defer src="<?php echo $pathPrefix; ?>scripts/header.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/sign-out.js"></script>
</head>

<body>
    <header class="header-bar no-transition">
        <div class="header-logo">
            <a href="<?php echo $pathPrefix; ?>index.php" class="logo-link"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <img id="logo" src="<?php echo $pathPrefix; ?>assets/image/brand/Logo.png" alt="Logo"
                    style="height: 40px; width: auto;">
                <div class="title"><span>Crook's</span> Cart <span>Collectives</span></div>
            </a>
        </div>

        <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/hamburger-menu.svg" alt="Menu icon"
                class="hamburger-icon">
        </button>

        <div class="nav-container">
            <nav class="nav-bar">
                <?php if (!$isUserLoggedIn): ?>
                <!-- NOT LOGGED IN: Home, Shop, About, Contact -->
                <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
                <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
                <?php else: ?>
                <!-- LOGGED IN USER (CUSTOMER/SELLER) - NO ADMIN LINKS HERE -->
                <?php if ($isSeller): ?>
                <!-- LOGGED IN & SELLER: My Account, Shop, Cart, Orders, Sell -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
                <?php else: ?>
                <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <?php endif; ?>
                <?php endif; ?>
            </nav>

            <?php if ($isUserLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php else: ?>
            <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <?php if (!$isUserLoggedIn): ?>
        <!-- NOT LOGGED IN: Home, Shop, About, Contact -->
        <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
        <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
        <?php else: ?>
        <!-- LOGGED IN USER (CUSTOMER/SELLER) - NO ADMIN LINKS HERE -->
        <?php if ($isSeller): ?>
        <!-- LOGGED IN & SELLER: My Account, Shop, Cart, Orders, Sell -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <a href="<?php echo $pathPrefix; ?>pages/seller-dashboard.php" class="nav-link sell-link">SELL</a>
        <?php else: ?>
        <!-- LOGGED IN & CUSTOMER ONLY: My Account, Shop, Cart, Orders -->
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <a href="<?php echo $pathPrefix; ?>pages/product.php" class="nav-link">SHOP</a>
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <?php endif; ?>
        <?php endif; ?>

        <?php if ($isUserLoggedIn): ?>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isUserLoggedIn): ?>
    <div id="logoutModal" class="logout-modal" style="display: none;">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/logoutsvg.svg" alt="Logout"
                    style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </div>
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="logout-modal-buttons">
                <button id="cancelLogout" class="logout-modal-btn btn-cancel">Cancel</button>
                <button id="confirmLogout" class="logout-modal-btn btn-confirm">Logout</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>