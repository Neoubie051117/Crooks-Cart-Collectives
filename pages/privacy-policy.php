<?php
session_start();
$current_page = 'privacy-policy';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/privacy-policy.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="privacy-policy-page">
        <!-- Hero Section -->
        <section class="policy-hero">
            <div class="policy-hero__container">
                <h1 class="policy-hero__title">Privacy <span class="policy-hero__highlight">Policy</span></h1>
                <p class="policy-hero__subtitle">Academic Project - For Educational Purposes Only</p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="policy-intro">
            <div class="policy-intro__card">
                <p class="policy-intro__text">
                    This privacy policy applies to Crooks Cart Collectives, a student project developed for academic
                    requirements at the School of Computer Studies, Arellano University - Bonifacio Campus. This
                    website and its data handling are for educational purposes only.
                </p>
                <p class="policy-intro__last-updated">Last Updated: February 15, 2026 | Academic Project</p>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="policy-content">
            <div class="policy-sections">

                <article id="information-collection" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">1. Information We Collect</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>As part of this school project, we collect:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">
                                <strong>Registration Data:</strong> Name, email, username, password (for login
                                simulation)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Contact Details:</strong> Phone number, address (for order simulation)
                            </li>
                            <li class="policy-section__list-item">
                                <strong>Seller Information:</strong> Business name (optional), valid ID (for
                                verification simulation)
                            </li>
                        </ul>
                        <p class="policy-section__note">
                            <strong>Note:</strong> This is a school project. All data is stored locally in our project
                            database and is used only for demonstrating functionality.
                        </p>
                    </div>
                </article>

                <article id="information-usage" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">2. How We Use Your Information</h2>
                    </header>
                    <div class="policy-section__body">
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">To demonstrate user authentication and profile
                                management</li>
                            <li class="policy-section__list-item">To simulate e-commerce functionality (cart, orders,
                                products)</li>
                            <li class="policy-section__list-item">For project evaluation by our instructors</li>
                            <li class="policy-section__list-item">To showcase our web development skills</li>
                        </ul>
                    </div>
                </article>

                <article id="information-sharing" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">3. Information Sharing</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>Since this is an academic project:</p>
                        <ul class="policy-section__list">
                            <li class="policy-section__list-item">Data is only accessible within this project
                                environment</li>
                            <li class="policy-section__list-item">No information is sold or shared with third parties
                            </li>
                            <li class="policy-section__list-item">Instructors may access the project for grading
                                purposes</li>
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
                            <strong>IMPORTANT:</strong> This website is a student project created for educational
                            purposes as part of the curriculum at the School of Computer Studies, Arellano
                            University - Bonifacio Campus. It is not a commercial platform. Any resemblance to
                            real e-commerce sites is for educational demonstration only.
                        </p>
                        <p>If you have concerns about this project, please contact the School of Computer Studies
                            directly.</p>
                    </div>
                </article>

                <article id="contact-information" class="policy-section">
                    <header class="policy-section__header">
                        <div class="policy-section__accent"></div>
                        <h2 class="policy-section__title">5. Contact Us</h2>
                    </header>
                    <div class="policy-section__body">
                        <p>For questions about this academic project:</p>
                        <address class="policy-contact">
                            <p class="policy-contact__item"><strong>School:</strong> School of Computer Studies</p>
                            <p class="policy-contact__item"><strong>Campus:</strong> Arellano University - Andres
                                Bonifacio Campus</p>
                            <p class="policy-contact__item"><strong>Address:</strong> Pasig City, Philippines</p>
                            <p class="policy-contact__item"><strong>Course:</strong> Web Development Project</p>
                        </address>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php include_once('footer.php'); ?>
</body>

</html>