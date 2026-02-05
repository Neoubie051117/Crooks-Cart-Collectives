<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$userRole = $isLoggedIn ? $_SESSION['is_verified'] : -1;

// Determine path prefix based on where this file is included from
$pathPrefix = (defined('IN_ROOT') && IN_ROOT) ? '' : '../';
?>

<header class="header-bar no-transition">
    <div class="header-logo">
        <a href="<?php echo $pathPrefix; ?>index.php" class="logo-link" style="display: contents;">
            <img id="logo" src="<?php echo $pathPrefix; ?>assets/Logo.png" alt="Logo"
                style="opacity: 0; visibility: hidden;">
            <div class="title"><span>Crook's</span> Cart <span>Collectives</span></div>
        </a>
    </div>
    <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
        <img src="<?php echo $pathPrefix; ?>assets/hamburger-menu.svg" alt="Menu icon" class="hamburger-icon">
    </button>
    <div class="nav-container">
        <nav class="nav-bar">
            <?php if ($isLoggedIn && $userRole == 2): ?>
            <a href="<?php echo $pathPrefix; ?>pages/workdesk.php" class="nav-link">WORKDESK</a>
            <?php endif; ?>
            <?php if ($isLoggedIn && $userRole == 3): ?>
            <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">ADMIN</a>
            <?php endif; ?>

            <?php if ($isLoggedIn): ?>
            <a href="<?php echo $pathPrefix; ?>pages/home.php" class="nav-link">HOME</a>
            <a href="<?php echo $pathPrefix; ?>pages/announcements.php" class="nav-link">ANNOUNCEMENTS</a>
            <a href="<?php echo $pathPrefix; ?>pages/complaint.php" class="nav-link">COMPLAINTS</a>
            <a href="#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
            <a href="#" class="nav-link">SUPPORT</a>
            <a href="#" class="nav-link">ABOUT</a>
            <?php else: ?>
            <a href="#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
            <a href="#" class="nav-link">ABOUT</a>
            <a href="#" class="nav-link">SUPPORT</a>
            <?php endif; ?>
        </nav>

        <?php if ($isLoggedIn): ?>
        <a href="<?php echo $pathPrefix; ?>database/sign-out-handler.php" class="social-button">LOGOUT</a>
        <?php else: ?>
        <a href="<?php echo $pathPrefix; ?>pages/sign-up.php" class="social-button">SIGN UP</a>
        <?php endif; ?>
    </div>
</header>

<nav class="mobile-nav no-transition" id="mobileNav">
    <?php if ($isLoggedIn && $userRole == 2): ?>
    <a href="<?php echo $pathPrefix; ?>pages/workdesk.php" class="nav-link">WORKDESK</a>
    <?php endif; ?>
    <?php if ($isLoggedIn && $userRole == 3): ?>
    <a href="<?php echo $pathPrefix; ?>pages/admin-dashboard.php" class="nav-link">ADMIN</a>
    <?php endif; ?>

    <?php if ($isLoggedIn): ?>
    <a href="<?php echo $pathPrefix; ?>pages/home.php" class="nav-link">HOME</a>
    <a href="<?php echo $pathPrefix; ?>pages/announcements.php" class="nav-link">ANNOUNCEMENTS</a>
    <a href="<?php echo $pathPrefix; ?>pages/complaint.php" class="nav-link">COMPLAINTS</a>
    <a href="#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
    <a href="#" class="nav-link">SUPPORT</a>
    <a href="#" class="nav-link">ABOUT</a>
    <a href="<?php echo $pathPrefix; ?>database/sign-out-handler.php" class="social-button">LOG OUT</a>
    <?php else: ?>
    <a href="#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
    <a href="#" class="nav-link">ABOUT</a>
    <a href="#" class="nav-link">SUPPORT</a>
    <a href="<?php echo $pathPrefix; ?>pages/sign-up.php" class="social-button">SIGN UP</a> <!-- CHANGED THIS LINE -->
    <?php endif; ?>
</nav>