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
    <link rel="icon" type="image/png" href="assets/image/brand/Logo.png" loading="lazy">

    <script src="scripts/header.js" defer></script>
    <link rel="stylesheet" href="/styles/header.css">
    <script src="scripts/footer.js" defer></script>
    <link rel="stylesheet" href="/styles/footer.css">
    <link rel="stylesheet" href="/styles/terms-and-conditions.css">
</head>

<body>
    <?php include_once('../pages/header.php'); ?>

    <div class="content">
        <main class="terms-conditions">
            <section class="terms-hero">
                <div class="hero-content">
                    <h1>Terms & <span>Conditions</span></h1>
                    <p>Rules and guidelines for using our platform</p>
                </div>
            </section>

            <section class="terms-intro">
                <div class="intro-card">
                    <p>Welcome to Crooks Cart Collectives. By accessing or using our platform, you agree to be bound by
                        these Terms and Conditions. Please read them carefully before using our services.</p>
                    <p class="last-updated">Effective Date: February 15, 2026</p>
                </div>
            </section>

            <section class="terms-content">
                <div class="content-grid">
                    <nav class="terms-nav">
                        <h3>Quick Navigation</h3>
                        <ul>
                            <li><a href="#acceptance">1. Acceptance of Terms</a></li>
                            <li><a href="#eligibility">2. Eligibility</a></li>
                            <li><a href="#accounts">3. Account Registration</a></li>
                            <li><a href="#conduct">4. User Conduct</a></li>
                            <li><a href="#buyers">5. Buyer Terms</a></li>
                            <li><a href="#sellers">6. Seller Terms</a></li>
                            <li><a href="#transactions">7. Transactions</a></li>
                            <li><a href="#intellectual">8. Intellectual Property</a></li>
                            <li><a href="#prohibited">9. Prohibited Items</a></li>
                            <li><a href="#termination">10. Account Termination</a></li>
                            <li><a href="#liability">11. Limitation of Liability</a></li>
                            <li><a href="#disputes">12. Dispute Resolution</a></li>
                            <li><a href="#changes">13. Changes to Terms</a></li>
                            <li><a href="#contact">14. Contact Information</a></li>
                        </ul>
                    </nav>

                    <div class="terms-sections">
                        <div id="acceptance" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>1. Acceptance of Terms</h2>
                            </div>
                            <div class="section-body">
                                <p>By accessing and using the Crooks Cart Collectives platform, you agree to comply with
                                    and be bound by these Terms and Conditions, along with our Privacy Policy. If you do
                                    not agree to all terms, please refrain from using our services.</p>
                                <p>Your continued use of the platform constitutes acceptance of any updates or
                                    modifications to these terms.</p>
                            </div>
                        </div>

                        <div id="eligibility" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>2. Eligibility</h2>
                            </div>
                            <div class="section-body">
                                <p>To use our platform, you must:</p>
                                <ul>
                                    <li>Be at least 13 years of age</li>
                                    <li>Have the legal capacity to enter into binding contracts</li>
                                    <li>Provide accurate and complete registration information</li>
                                    <li>Not have been previously suspended or removed from our platform</li>
                                </ul>
                                <p>If you are under 18, you may only use the platform with parental or guardian consent.
                                </p>
                            </div>
                        </div>

                        <div id="accounts" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>3. Account Registration</h2>
                            </div>
                            <div class="section-body">
                                <p>When creating an account, you agree to:</p>
                                <ul>
                                    <li>Provide accurate, current, and complete information</li>
                                    <li>Maintain and update your information as needed</li>
                                    <li>Keep your password secure and confidential</li>
                                    <li>Notify us immediately of any unauthorized account use</li>
                                    <li>Accept responsibility for all activities under your account</li>
                                </ul>
                                <p>We reserve the right to refuse service, terminate accounts, or cancel orders at our
                                    discretion.</p>
                            </div>
                        </div>

                        <div id="conduct" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>4. User Conduct</h2>
                            </div>
                            <div class="section-body">
                                <p>Users must not engage in:</p>
                                <ul>
                                    <li>Harassment, bullying, or threatening behavior</li>
                                    <li>Posting offensive, obscene, or discriminatory content</li>
                                    <li>Impersonating others or providing false information</li>
                                    <li>Attempting to breach platform security</li>
                                    <li>Engaging in fraudulent activities or scams</li>
                                    <li>Violating any applicable laws or regulations</li>
                                </ul>
                                <p>Violations may result in immediate account suspension or permanent ban.</p>
                            </div>
                        </div>

                        <div id="buyers" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>5. Buyer Terms</h2>
                            </div>
                            <div class="section-body">
                                <p>As a buyer, you agree to:</p>
                                <ul>
                                    <li>Provide accurate shipping information</li>
                                    <li>Complete payment for purchased items</li>
                                    <li>Communicate respectfully with sellers</li>
                                    <li>Report issues through proper channels</li>
                                    <li>Not misuse the platform's dispute system</li>
                                </ul>
                                <p>Buyers are responsible for understanding product descriptions and seller policies
                                    before purchase.</p>
                            </div>
                        </div>

                        <div id="sellers" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>6. Seller Terms</h2>
                            </div>
                            <div class="section-body">
                                <p>As a seller, you agree to:</p>
                                <ul>
                                    <li>Provide accurate product descriptions and images</li>
                                    <li>Set fair and transparent prices</li>
                                    <li>Process orders within 2 business days</li>
                                    <li>Respond to buyer inquiries promptly</li>
                                    <li>Maintain adequate inventory</li>
                                    <li>Comply with all applicable laws and regulations</li>
                                    <li>Undergo identity verification with valid government ID</li>
                                </ul>
                                <p>Sellers are independent merchants and not employees of Crooks Cart Collectives.</p>
                            </div>
                        </div>

                        <div id="transactions" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>7. Transactions</h2>
                            </div>
                            <div class="section-body">
                                <p>All transactions are between buyers and sellers. Our platform facilitates
                                    communication and provides a secure environment but is not a party to the actual
                                    sale.</p>
                                <ul>
                                    <li>Prices are listed in Philippine Peso (PHP)</li>
                                    <li>Payment methods include cash on delivery, GCash, and bank transfers</li>
                                    <li>Shipping arrangements and costs are between buyer and seller</li>
                                    <li>Returns and refunds are subject to seller policies</li>
                                </ul>
                            </div>
                        </div>

                        <div id="intellectual" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>8. Intellectual Property</h2>
                            </div>
                            <div class="section-body">
                                <p>All content on the platform, including logos, text, graphics, and software, is the
                                    property of Crooks Cart Collectives or its licensors and is protected by
                                    intellectual property laws.</p>
                                <p>Users retain ownership of content they post but grant us a license to use, display,
                                    and distribute it for platform operations.</p>
                                <p>Unauthorized use of our intellectual property is strictly prohibited.</p>
                            </div>
                        </div>

                        <div id="prohibited" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>9. Prohibited Items</h2>
                            </div>
                            <div class="section-body">
                                <p>The following items may not be listed or sold on our platform:</p>
                                <ul>
                                    <li>Illegal drugs and paraphernalia</li>
                                    <li>Weapons, firearms, and ammunition</li>
                                    <li>Counterfeit or replica goods</li>
                                    <li>Stolen property</li>
                                    <li>Hazardous materials</li>
                                    <li>Adult content or services</li>
                                    <li>Prescription medications</li>
                                    <li>Live animals (except approved pet listings)</li>
                                </ul>
                                <p>Listings violating these rules will be removed, and accounts may be terminated.</p>
                            </div>
                        </div>

                        <div id="termination" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>10. Account Termination</h2>
                            </div>
                            <div class="section-body">
                                <p>We reserve the right to terminate or suspend accounts that:</p>
                                <ul>
                                    <li>Violate these Terms and Conditions</li>
                                    <li>Engage in fraudulent or illegal activities</li>
                                    <li>Receive multiple negative reports</li>
                                    <li>Are inactive for an extended period</li>
                                    <li>Harm the platform or other users</li>
                                </ul>
                                <p>Users may terminate their accounts at any time by contacting support.</p>
                            </div>
                        </div>

                        <div id="liability" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>11. Limitation of Liability</h2>
                            </div>
                            <div class="section-body">
                                <p>To the maximum extent permitted by law, Crooks Cart Collectives shall not be liable
                                    for:</p>
                                <ul>
                                    <li>Indirect, incidental, or consequential damages</li>
                                    <li>Loss of profits, data, or business opportunities</li>
                                    <li>Issues arising from third-party actions</li>
                                    <li>Problems with products sold by sellers</li>
                                    <li>Service interruptions or technical issues</li>
                                </ul>
                                <p>Our total liability shall not exceed the amount you paid us in the past 12 months.
                                </p>
                            </div>
                        </div>

                        <div id="disputes" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>12. Dispute Resolution</h2>
                            </div>
                            <div class="section-body">
                                <p>Any disputes arising from these terms shall first be addressed through:</p>
                                <ul>
                                    <li>Informal negotiation between parties</li>
                                    <li>Mediation through our platform's support system</li>
                                    <li>If unresolved, disputes shall be governed by Philippine law and resolved in the
                                        courts of Pasig City, Philippines.</li>
                                </ul>
                            </div>
                        </div>

                        <div id="changes" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>13. Changes to Terms</h2>
                            </div>
                            <div class="section-body">
                                <p>We may update these Terms and Conditions periodically. Changes will be effective upon
                                    posting to the platform. Material changes will be notified through:</p>
                                <ul>
                                    <li>Email notification to registered users</li>
                                    <li>Site-wide announcement</li>
                                    <li>Updated "Effective Date"</li>
                                </ul>
                                <p>Continued use of the platform after changes constitutes acceptance of the updated
                                    terms.</p>
                            </div>
                        </div>

                        <div id="contact" class="terms-section">
                            <div class="section-header">
                                <div class="vertical-line"></div>
                                <h2>14. Contact Information</h2>
                            </div>
                            <div class="section-body">
                                <p>For questions or concerns regarding these Terms and Conditions:</p>
                                <div class="contact-details">
                                    <p><strong>Email:</strong> legal@crookscart.com</p>
                                    <p><strong>Phone:</strong> +63 (2) 8123 4567</p>
                                    <p><strong>Address:</strong> Arellano University - Andres Bonifacio Campus, Pasig
                                        City, Philippines</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="terms-agreement">
                <div class="agreement-box">
                    <p>By using Crooks Cart Collectives, you acknowledge that you have read, understood, and agree to be
                        bound by these Terms and Conditions.</p>
                    <div class="agreement-buttons">
                        <a href="sign-up.php" class="btn btn-primary">Create Account</a>
                        <a href="index.php" class="btn btn-secondary">Return to Home</a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php include_once('../pages/footer.php'); ?>
</body>

</html>