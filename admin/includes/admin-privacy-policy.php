<?php
session_start();
$current_page = 'admin-privacy-policy';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Privacy Policy - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/admin-header.js" defer></script>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <link rel="stylesheet" href="../styles/admin-privacy-policy.css">
</head>

<body>
    <?php include_once('admin-header.php'); ?>

    <main class="privacy-policy-page">
        <!-- Hero Section -->
        <section class="policy-hero">
            <div class="policy-hero__container">
                <h1 class="policy-hero__title">Admin <span class="policy-hero__highlight">Privacy Policy</span></h1>
                <p class="policy-hero__subtitle">Administrator Data Handling - Academic Project</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="policy-intro">
            <div class="policy-intro__card">
                <p class="policy-intro__text">
                    This privacy policy applies to the administrator panel of Crooks Cart Collectives, a student project
                    developed for academic requirements at the School of Computer Studies, Arellano University -
                    Bonifacio Campus. This section outlines how administrator data is handled.
                </p>
                <p class="policy-intro__last-updated">Last Updated: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="policy-content">
            <div class="policy-sections">

                <article id="admin-information-collection" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">1. Administrator Information Collected</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For administrator accounts, we collect:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">
                                <strong>Personal Information:</strong> First name, last name
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Contact Details:</strong> Email address, contact number
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Account Credentials:</strong> Username, password (hashed for security)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Profile Picture:</strong> Optional profile image
                            </li>
                        </ul>
                        <p class="policy-section__note">
                            <strong>Note:</strong> Administrator accounts are created for project management and
                            monitoring purposes only.
                        </p>
                    </div>
                </article>

                <article id="admin-data-access" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">2. Data Access & Monitoring</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>Administrators have access to:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">User registration data (for verification purposes)
                            </li>
                            <li class="policy-section__list-item">Seller applications and verification status</li>
                            <li class="policy-section__list-item">Product listings across the platform</li>
                            <li class="policy-section__list-item">Order information and transaction logs</li>
                            <li class="policy-section__list-item">System activity logs (user logins, product additions,
                                orders)</li>
                        </ul>
                        <p>All administrator actions are logged for accountability.</p>
                    </div>
                </article>

                <article id="admin-security" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">3. Administrator Security</h2>
                    </header>
                    <div class="policy-section__body">
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">Passwords are securely hashed using industry standards
                            </li>
                            <li class="policy-section__list-item">Session management with timeout protection</li>
                            <li class="policy-section__list-item">Access restricted to authenticated administrators only
                            </li>
                            <li class="policy-section__list-item">All administrative actions are logged for security
                                auditing</li>
                        </ul>
                    </div>
                </article>

                <article id="academic-disclaimer" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">4. Academic Disclaimer</h2>
                    </header>
                    <div class="policy-section__body">
                        <p class="policy-section__important">
                            <strong>IMPORTANT:</strong> This administrator panel is part of a student project created
                            for educational purposes. All data, including administrator information, is stored locally
                            in the project database and used solely for demonstrating system administration
                            functionality.
                        </p>
                    </div>
                </article>

                <article id="contact-information" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">5. Contact Information</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For questions about administrator data handling:</p>
                        <address class="policy-contact">
                            <p class="policy-contact__item"><strong>School:</strong> School of Computer Studies</p>
                            <p class="policy-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="policy-contact__item"><strong>Email:</strong> scs.bonifacio@arellano.edu.ph</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php include_once('admin-footer.php'); ?>
</body>

</html>