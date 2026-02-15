<?php
session_start();
$current_page = 'terms-and-conditions';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/terms-and-conditions.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="terms-page">
        <!-- Hero Section -->
        <section class="terms-hero">
            <div class="terms-hero__container">
                <h1 class="terms-hero__title">Terms & <span class="terms-hero__highlight">Conditions</span></h1>
                <p class="terms-hero__subtitle">Academic Project - School of Computer Studies</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="terms-intro">
            <div class="terms-intro__card">
                <p class="terms-intro__text">
                    Welcome to Crooks Cart Collectives. By accessing or using our platform, you agree to these Terms
                    and Conditions, which apply to this academic project developed by students of Arellano
                    University - Bonifacio Campus.
                </p>
                <p class="terms-intro__effective-date">Effective Date: February 15, 2026 | For Educational Use Only</p>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="terms-content">
            <div class="terms-sections">

                <article id="project-purpose" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">1. Academic Project Purpose</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>Crooks Cart Collectives is a student project created for the School of Computer Studies at
                            Arellano University - Bonifacio Campus. The purpose of this website is to demonstrate web
                            development skills including:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">PHP and MySQL database integration</li>
                            <li class="terms-section__list-item">User authentication and session management</li>
                            <li class="terms-section__list-item">E-commerce functionality simulation</li>
                            <li class="terms-section__list-item">Responsive front-end design</li>
                        </ul>
                    </div>
                </article>

                <article id="eligibility" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">2. Eligibility</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>This project is open to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Students and faculty of Arellano University for testing
                                purposes</li>
                            <li class="terms-section__list-item">Anyone interested in viewing the project demonstration
                            </li>
                            <li class="terms-section__list-item">Users must be at least 13 years of age (as required by
                                our course)</li>
                        </ul>
                    </div>
                </article>

                <article id="account-registration" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">3. Account Registration</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>When creating an account for this school project:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">You may use test data (no real personal information
                                required)</li>
                            <li class="terms-section__list-item">Passwords are stored for authentication demonstration
                            </li>
                            <li class="terms-section__list-item">Accounts may be reset or deleted as part of project
                                maintenance</li>
                        </ul>
                    </div>
                </article>

                <article id="transactions" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">4. Transactions</h2>
                    </header>
                    <div class="terms-section__body">
                        <p class="terms-section__important">
                            <strong>IMPORTANT:</strong> This is a demonstration project only.
                        </p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">No actual money transactions occur on this platform
                            </li>
                            <li class="terms-section__list-item">All prices, orders, and purchases are simulated</li>
                            <li class="terms-section__list-item">Products listed are for demonstration purposes only
                            </li>
                            <li class="terms-section__list-item">No real products will be shipped or delivered</li>
                        </ul>
                    </div>
                </article>

                <article id="user-conduct" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">5. User Conduct</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As this is an educational project, users are expected to:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">Use the platform respectfully for testing purposes</li>
                            <li class="terms-section__list-item">Not attempt to hack or compromise the site</li>
                            <li class="terms-section__list-item">Not upload inappropriate or offensive content</li>
                            <li class="terms-section__list-item">Understand that this is a student project, not a
                                commercial service</li>
                        </ul>
                    </div>
                </article>

                <article id="liability" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">6. Limitation of Liability</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>As an academic project:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This platform is provided "as is" for educational
                                demonstration</li>
                            <li class="terms-section__list-item">The developers are students, not professional service
                                providers</li>
                            <li class="terms-section__list-item">No warranty or guarantee of uninterrupted service is
                                provided</li>
                            <li class="terms-section__list-item">The School of Computer Studies is not liable for any
                                issues arising from project use</li>
                        </ul>
                    </div>
                </article>

                <article id="contact" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">7. Contact Information</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>For questions regarding this academic project:</p>
                        <address class="terms-contact">
                            <p class="terms-contact__item"><strong>Institution:</strong> School of Computer Studies</p>
                            <p class="terms-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="terms-contact__item"><strong>Course:</strong> Web Development</p>
                            <p class="terms-contact__item"><strong>Project Lead:</strong> Lance N. Madelar</p>
                        </address>
                    </div>
                </article>

                <article id="acknowledgment" class="terms-section">
                    <header class="terms-section__header">
                        <div class="terms-section__accent"></div>
                        <h2 class="terms-section__title">8. Acknowledgment</h2>
                    </header>
                    <div class="terms-section__body">
                        <p>By using Crooks Cart Collectives, you acknowledge that:</p>
                        <ul class="terms-section__list">
                            <li class="terms-section__list-item">This is a student project for academic purposes only
                            </li>
                            <li class="terms-section__list-item">No real commercial transactions take place</li>
                            <li class="terms-section__list-item">The site may be modified or taken down after project
                                completion</li>
                            <li class="terms-section__list-item">You are participating in testing an educational
                                platform</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <!-- Agreement Section -->
        <section class="terms-agreement">
            <div class="terms-agreement__box">
                <p class="terms-agreement__text">
                    By using Crooks Cart Collectives, you acknowledge that this is an academic project created by
                    students of the School of Computer Studies, Arellano University - Bonifacio Campus for
                    educational purposes only.
                </p>
                <div class="terms-agreement__actions">
                    <a href="sign-up.php" class="terms-agreement__btn terms-agreement__btn--primary">Create Test
                        Account</a>
                    <a href="../index.php" class="terms-agreement__btn terms-agreement__btn--secondary">Return to
                        Home</a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('footer.php'); ?>
</body>

</html>