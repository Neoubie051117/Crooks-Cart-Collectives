<?php // PHP File Content ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Force check if session is valid
$isLoggedIn = isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);

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
                <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
                <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>

                <?php if ($isLoggedIn): ?>
                <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
                <!-- Cart and Orders for logged in users -->
                <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
                <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
                <?php else: ?>
                <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
                <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
                <?php endif; ?>
            </nav>

            <?php if ($isLoggedIn): ?>
            <a href="#" class="social-button logout-trigger">LOG OUT</a>
            <?php else: ?>
            <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="mobile-nav no-transition" id="mobileNav">
        <a href="<?php echo $pathPrefix; ?>index.php" class="nav-link">HOME</a>
        <a href="<?php echo $pathPrefix; ?>pages/products.php" class="nav-link">SHOP</a>

        <?php if ($isLoggedIn): ?>
        <a href="<?php echo $pathPrefix; ?>pages/customer-dashboard.php" class="nav-link">MY ACCOUNT</a>
        <!-- Cart and Orders in mobile nav for logged in users -->
        <a href="<?php echo $pathPrefix; ?>pages/cart.php" class="nav-link">CART</a>
        <a href="<?php echo $pathPrefix; ?>pages/orders.php" class="nav-link">ORDERS</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/about.php" class="nav-link">ABOUT</a>
        <a href="<?php echo $pathPrefix; ?>pages/contact.php" class="nav-link">CONTACT</a>
        <?php endif; ?>

        <?php if ($isLoggedIn): ?>
        <a href="#" class="social-button logout-trigger">LOG OUT</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/sign-in.php" class="social-button">SIGN IN</a>
        <?php endif; ?>
    </nav>

    <?php if ($isLoggedIn): ?>
    <div id="logoutModal" class="logout-modal" style="display: none;">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                    stroke="#FF8246" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
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

    <!-- Cart count display (optional - uncomment if you want cart count badge)
    <?php if ($isLoggedIn): ?>
    <span id="cartCount" class="cart-count" style="display: none;">0</span>
    <?php endif; ?> -->
</body>

</html>