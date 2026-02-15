<?php
session_start();
$current_page = 'contact';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Crooks Cart Collectives</title>
    <link rel="icon" type="image/png" href="../assets/image/brand/Logo.png">

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <script src="../scripts/footer.js" defer></script>
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/contact.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <!-- Hero Section -->
        <section class="contact-hero">
            <div class="hero-content">
                <h1>Get in <span>Touch</span></h1>
                <p>We'd love to hear from you</p>
            </div>
        </section>

        <!-- Contact Info Grid -->
        <section class="contact-info-grid">
            <div class="info-card">
                <div class="info-icon">📍</div>
                <h3>Visit Us</h3>
                <p>Arellano University<br>Andres Bonifacio Campus<br>Pasig City, Philippines</p>
            </div>

            <div class="info-card">
                <div class="info-icon">📧</div>
                <h3>Email Us</h3>
                <p>support@crookscart.com<br>inquiries@crookscart.com<br>help@crookscart.com</p>
            </div>

            <div class="info-card">
                <div class="info-icon">📞</div>
                <h3>Call Us</h3>
                <p>+63 (2) 8123 4567<br>+63 912 345 6789<br>Mon-Fri, 9am-6pm</p>
            </div>

            <div class="info-card">
                <div class="info-icon">⏰</div>
                <h3>Business Hours</h3>
                <p>Monday - Friday: 9:00 - 18:00<br>Saturday: 10:00 - 15:00<br>Sunday: Closed</p>
            </div>
        </section>

        <!-- Contact Form & Map -->
        <section class="contact-form-section">
            <div class="form-container">
                <h2>Send us a <span>Message</span></h2>
                <p class="form-subtitle">We'll get back to you within 24 hours</p>

                <form id="contactForm" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Your Name *</label>
                            <input type="text" id="name" name="name" required placeholder="Enter your full name">
                            <div class="error-message" id="nameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required placeholder="your@email.com">
                            <div class="error-message" id="emailError"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="09XX XXX XXXX">
                            <div class="error-message" id="phoneError"></div>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="support">Technical Support</option>
                                <option value="billing">Billing Question</option>
                                <option value="seller">Seller Application</option>
                                <option value="report">Report a Problem</option>
                                <option value="feedback">Feedback</option>
                            </select>
                            <div class="error-message" id="subjectError"></div>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" rows="6" required
                            placeholder="How can we help you?"></textarea>
                        <div class="error-message" id="messageError"></div>
                    </div>

                    <div class="form-group checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="privacy" required>
                            <span>I agree to the <a href="privacy-policy.php">Privacy Policy</a> and consent to being
                                contacted *</span>
                        </label>
                        <div class="error-message" id="privacyError"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>

                <div id="successMessage" class="success-message" style="display: none;">
                    <p>Thank you for your message! We'll get back to you soon.</p>
                </div>
            </div>

            <div class="map-container">
                <h2>Find us on <span>Map</span></h2>
                <div class="map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.775403455372!2d121.05254331529254!3d14.562667289822337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c979a7e7c1b7%3A0x1e3e1a3b4b4c4d4e!2sArellano%20University%20Andres%20Bonifacio%20Campus!5e0!3m2!1sen!2sph!4v1620000000000!5m2!1sen!2sph"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </section>

        <!-- FAQ Preview -->
        <section class="faq-preview">
            <h2>Frequently Asked <span>Questions</span></h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <h3>How do I become a seller?</h3>
                    <p>Simply go to your dashboard and click "Become a Seller". Upload a valid ID and wait for
                        verification.</p>
                </div>
                <div class="faq-item">
                    <h3>What payment methods do you accept?</h3>
                    <p>We accept cash on delivery, GCash, and bank transfers for verified sellers.</p>
                </div>
                <div class="faq-item">
                    <h3>How long does shipping take?</h3>
                    <p>Shipping typically takes 2-5 business days depending on your location.</p>
                </div>
                <div class="faq-item">
                    <h3>Is my information secure?</h3>
                    <p>Yes, we use industry-standard encryption to protect your data.</p>
                </div>
            </div>
            <a href="faq.php" class="btn btn-secondary">View All FAQs</a>
        </section>
    </div>

    <?php include_once('footer.php'); ?>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <script src="../scripts/contact.js"></script>
</body>

</html>