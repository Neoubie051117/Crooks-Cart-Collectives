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
                <p>School Project Contact Information</p>
            </div>
        </section>

        <!-- Contact Info Grid -->
        <section class="contact-info-grid">
            <div class="info-card">
                <div class="info-icon">📍</div>
                <h3>Our Campus</h3>
                <p>Arellano University<br>Andres Bonifacio Campus<br>Pasig City, Philippines</p>
            </div>

            <div class="info-card">
                <div class="info-icon">📧</div>
                <h3>Project Email</h3>
                <p>scs.bonifacio@arellano.edu.ph<br>ccs.project@arellano.edu.ph</p>
            </div>

            <div class="info-card">
                <div class="info-icon">📞</div>
                <h3>School Contact</h3>
                <p>+63 (2) 8123 4567<br>School of Computer Studies</p>
            </div>

            <div class="info-card">
                <div class="info-icon">⏰</div>
                <h3>School Hours</h3>
                <p>Monday - Friday: 8:00 - 17:00<br>Saturday: 8:00 - 12:00</p>
            </div>
        </section>

        <!-- Contact Form & Map -->
        <section class="contact-form-section">
            <div class="form-container">
                <h2>Send us a <span>Message</span></h2>
                <p class="form-subtitle">For project inquiries or feedback</p>

                <form id="contactForm" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Your Name *</label>
                            <input type="text" id="name" name="name" required placeholder="Enter your full name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required placeholder="your@email.com">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="student_id">Student ID</label>
                            <input type="text" id="student_id" name="student_id" placeholder="If you're a student">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="project">Project Question</option>
                                <option value="feedback">Feedback</option>
                                <option value="report">Report Issue</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" rows="6" required
                            placeholder="How can we help you?"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>

                <div id="successMessage" class="success-message" style="display: none;">
                    <p>Thank you for your message! (This is a demo - no actual email will be sent)</p>
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