<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$userRole = $isLoggedIn ? $_SESSION['is_verified'] : -1;
?>

<header class="header-bar no-transition">
    <div class="header-logo">
        <img id="logo" src="/Barangay-System/assets/Logo.png" alt="Logo" style="opacity: 0; visibility: hidden;">
        <div class="title">Bara<span>ngay</span> Sys<span>tem</span></div>
    </div>
    <button class="hamburger-menu" id="menuButton" aria-label="Toggle menu">
        <img src="/Barangay-System/assets/hamburger-menu.svg" alt="Menu icon" class="hamburger-icon">
    </button>
    <div class="nav-container">
        <nav class="nav-bar">
            <?php if ($isLoggedIn && $userRole == 2): ?>
            <a href="/Barangay-System/pages/workdesk.php" class="nav-link">WORKDESK</a>
            <?php endif; ?>
            <?php if ($isLoggedIn && $userRole == 3): ?>
            <a href="/Barangay-System/pages/admin-dashboard.php" class="nav-link">ADMIN</a>
            <?php endif; ?>

            <?php if ($isLoggedIn): ?>
            <a href="/Barangay-System/pages/home.php" class="nav-link">HOME</a>
            <a href="/Barangay-System/pages/announcements.php" class="nav-link">ANNOUNCEMENTS</a>
            <a href="/Barangay-System/pages/complaint.php" class="nav-link">COMPLAINTS</a>
            <a href="/Barangay-System/pages/#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
            <a href="/Barangay-System/pages/#" class="nav-link">SUPPORT</a>
            <a href="/Barangay-System/pages/#" class="nav-link">ABOUT</a>
            <?php else: ?>
            <a href="/Barangay-System/pages/#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
            <a href="/Barangay-System/pages/#" class="nav-link">ABOUT</a>
            <a href="/Barangay-System/pages/#" class="nav-link">SUPPORT</a>
            <?php endif; ?>
        </nav>

        <?php if ($isLoggedIn): ?>
        <a href="/Barangay-System/database/sign-out-handler.php" class="sign-in">LOGOUT</a>
        <?php else: ?>
        <a href="/Barangay-System/pages/sign-in.php" class="sign-in">SIGN IN</a>
        <?php endif; ?>
    </div>
</header>

<nav class="mobile-nav no-transition" id="mobileNav">
    <?php if ($isLoggedIn && $userRole == 2): ?>
    <a href="/Barangay-System/pages/workdesk.php" class="nav-link">WORKDESK</a>
    <?php endif; ?>
    <?php if ($isLoggedIn && $userRole == 3): ?>
    <a href="/Barangay-System/pages/admin-dashboard.php" class="nav-link">ADMIN</a>
    <?php endif; ?>

    <?php if ($isLoggedIn): ?>
    <a href="/Barangay-System/pages/home.php" class="nav-link">HOME</a>
    <a href="/Barangay-System/pages/announcements.php" class="nav-link">ANNOUNCEMENTS</a>
    <a href="/Barangay-System/pages/complaint.php" class="nav-link">COMPLAINTS</a>
    <a href="/Barangay-System/pages/#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
    <a href="/Barangay-System/pages/#" class="nav-link">SUPPORT</a>
    <a href="/Barangay-System/pages/#" class="nav-link">ABOUT</a>
    <a href="/Barangay-System/database/sign-out-handler.php" class="sign-in">LOG OUT</a>
    <?php else: ?>
    <a href="/Barangay-System/pages/#" class="nav-link" id="activities-mobile-highlight">EVENTS</a>
    <a href="/Barangay-System/pages/#" class="nav-link">ABOUT</a>
    <a href="/Barangay-System/pages/#" class="nav-link">SUPPORT</a>
    <a href="/Barangay-System/pages/sign-in.php" class="sign-in">SIGN IN</a>
    <?php endif; ?>
</nav>