<?php
session_start();
$current_page = 'about';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <script src="../scripts/footer.js" defer></script>
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/about.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <!-- Hero Section -->
        <section class="about-hero">
            <div class="hero-content">
                <h1>About <span>Crooks Cart Collectives</span></h1>
                <p>Your Trusted Community Marketplace</p>
            </div>
        </section>

        <!-- Our Story Section -->
        <section class="story-section">
            <div class="story-container">
                <div class="story-image">
                    <img src="../assets/image/icons/Showcase1.png" alt="Our Story">
                </div>
                <div class="story-content">
                    <h2>Our <span>Story</span></h2>
                    <p>Founded in 2024, Crooks Cart Collectives began as a simple idea: create a safe, community-driven
                        marketplace where people can buy and sell with confidence. What started as a small group of
                        passionate developers from Arellano University - Andres Bonifacio campus has grown into a
                        vibrant platform serving thousands of users.</p>
                    <p>We believe in the power of community commerce - where every transaction builds relationships, and
                        every purchase supports local entrepreneurs. Our platform is designed to make online selling
                        accessible, secure, and enjoyable for everyone.</p>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="mission-vision">
            <div class="mv-card mission">
                <div class="mv-icon">🎯</div>
                <h2>Our Mission</h2>
                <p>To empower local entrepreneurs and provide a secure, user-friendly platform that fosters trust and
                    community growth through fair and transparent commerce.</p>
            </div>
            <div class="mv-card vision">
                <div class="mv-icon">👁️</div>
                <h2>Our Vision</h2>
                <p>To become the leading community marketplace in the Philippines, where every barangay has access to
                    safe and convenient online trading.</p>
            </div>
        </section>

        <!-- Core Values -->
        <section class="values-section">
            <h2>Our <span>Core Values</span></h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">🛡️</div>
                    <h3>Trust & Safety</h3>
                    <p>All sellers are verified with government IDs, and we maintain strict community guidelines.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3>Community First</h3>
                    <p>We prioritize local connections and support small businesses in every community.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">✨</div>
                    <h3>Transparency</h3>
                    <p>Clear policies, honest dealings, and open communication with all users.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">💡</div>
                    <h3>Innovation</h3>
                    <p>Constantly improving our platform to serve you better.</p>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team-section">
            <h2>Meet the <span>Team</span></h2>
            <p class="team-subtitle">Arellano University - Andres Bonifacio Campus</p>

            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/icons/Formal-Picture.png" alt="Lance N. Madelar">
                    </div>
                    <h3>Lance N. Madelar</h3>
                    <p class="team-role">Lead Developer</p>
                    <p class="team-bio">Computer Science student passionate about web development and creating
                        user-friendly experiences.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/icons/PlaceholderAssetProduct.png" alt="Team Member">
                    </div>
                    <h3>Project Contributors</h3>
                    <p class="team-role">Development Team</p>
                    <p class="team-bio">A dedicated group of students working together to build a better marketplace for
                        everyone.</p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Active Sellers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1,000+</div>
                    <div class="stat-label">Products Listed</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5,000+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
            </div>
        </section>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>