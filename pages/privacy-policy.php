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

    <div class="content">
        <main class="privacy-policy">
            <section class="policy-hero">
                <div class="hero-content">
                    <h1>Privacy <span>Policy</span></h1>
                    <p>Academic Project - For Educational Purposes Only</p>
                </div>
            </section>

            <section class="policy-intro">
                <div class="intro-card">
                    <p>This privacy policy applies to Crooks Cart Collectives, a student project developed for academic
                        requirements at the School of Computer Studies, Arellano University - Bonifacio Campus. This
                        website and its data handling are for educational purposes only.</p>
                    <p class="last-updated">Last Updated: February 15, 2026 | Academic Project</p>
                </div>
            </section>

            <section class="policy-content">
                <div class="content-grid">
                    <div class="policy-sections">
                        <div id="information" class="policy-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>1. Information We Collect</h2>
                            </div>
                            <div class="section-body">
                                <p>As part of this school project, we collect:</p>
                                <ul>
                                    <li><strong>Registration Data:</strong> Name, email, username, password (for login
                                        simulation)</li>
                                    <li><strong>Contact Details:</strong> Phone number, address (for order simulation)
                                    </li>
                                    <li><strong>Seller Information:</strong> Business name (optional), valid ID (for
                                        verification simulation)</li>
                                </ul>
                                <p class="note"><strong>Note:</strong> This is a school project. All data is stored
                                    locally in our project database and is used only for demonstrating functionality.
                                </p>
                            </div>
                        </div>

                        <div id="usage" class="policy-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>2. How We Use Your Information</h2>
                            </div>
                            <div class="section-body">
                                <ul>
                                    <li>To demonstrate user authentication and profile management</li>
                                    <li>To simulate e-commerce functionality (cart, orders, products)</li>
                                    <li>For project evaluation by our instructors</li>
                                    <li>To showcase our web development skills</li>
                                </ul>
                            </div>
                        </div>

                        <div id="sharing" class="policy-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>3. Information Sharing</h2>
                            </div>
                            <div class="section-body">
                                <p>Since this is an academic project:</p>
                                <ul>
                                    <li>Data is only accessible within this project environment</li>
                                    <li>No information is sold or shared with third parties</li>
                                    <li>Instructors may access the project for grading purposes</li>
                                </ul>
                            </div>
                        </div>

                        <div id="disclaimer" class="policy-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>4. Academic Disclaimer</h2>
                            </div>
                            <div class="section-body">
                                <p><strong>IMPORTANT:</strong> This website is a student project created for educational
                                    purposes as part of the curriculum at the School of Computer Studies, Arellano
                                    University - Bonifacio Campus. It is not a commercial platform. Any resemblance to
                                    real e-commerce sites is for educational demonstration only.</p>
                                <p>If you have concerns about this project, please contact the School of Computer
                                    Studies directly.</p>
                            </div>
                        </div>

                        <div id="contact" class="policy-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>5. Contact Us</h2>
                            </div>
                            <div class="section-body">
                                <p>For questions about this academic project:</p>
                                <div class="contact-details">
                                    <p><strong>School:</strong> School of Computer Studies</p>
                                    <p><strong>Campus:</strong> Arellano University - Andres Bonifacio Campus</p>
                                    <p><strong>Address:</strong> Pasig City, Philippines</p>
                                    <p><strong>Course:</strong> Web Development Project</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>