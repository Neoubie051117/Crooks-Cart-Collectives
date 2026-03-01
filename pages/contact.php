<?php
// Crooks-Cart-Collectives/pages/contact.php
// FIXED VERSION - Replaced emoji icons with SVG icons
?>
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
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/contact.css">

    <style>
     Contact card icon styling/
    .contact-card__icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 130, 70, 0.1);
        border-radius: 50%;
        padding: 15px;
    }

    .contact-card__icon img {
        width: 32px;
        height: 32px;
        filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);
    }

    .contact-card:hover .contact-card__icon img {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="contact-page">
        <!-- Hero Section -->
        <section class="contact-hero">
            <div class="contact-hero__container">
                <h1 class="contact-hero__title">Get in <span class="contact-hero__highlight">Touch</span></h1>
                <p class="contact-hero__subtitle">School Project Contact Information</p>
            </div>
        </section>

        <!-- Contact Info Grid - FIXED: Replaced emojis with SVG icons -->
        <section class="contact-info">
            <div class="contact-info__grid">
                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/building.svg" alt="Location icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">Our Campus</h3>
                    <address class="contact-card__details">
                        Arellano University<br>
                        Andres Bonifacio Campus<br>
                        Pasig City, Philippines
                    </address>
                </article>

                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/mail.svg" alt="Email icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">Project Email</h3>
                    <p class="contact-card__details">
                        scs.bonifacio@arellano.edu.ph<br>
                        ccs.project@arellano.edu.ph
                    </p>
                </article>

                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/contact-us-empty.svg" alt="Phone icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">School Contact</h3>
                    <p class="contact-card__details">
                        +63 (2) 8123 4567<br>
                        School of Computer Studies
                    </p>
                </article>

                <article class="contact-card">
                    <div class="contact-card__icon">
                        <img src="../assets/image/icons/time-update.svg" alt="Hours icon"
                            onerror="this.onerror=null; this.src='../assets/image/brand/Logo.png';">
                    </div>
                    <h3 class="contact-card__title">School Hours</h3>
                    <p class="contact-card__details">
                        Monday - Friday: 8:00 - 17:00<br>
                        Saturday: 8:00 - 12:00
                    </p>
                </article>
            </div>
        </section>

        <!-- Contact Form & Map Section -->
        <section class="contact-interaction">
            <div class="contact-form-container">
                <header class="contact-form__header">
                    <h2 class="contact-form__title">Send us a <span class="contact-form__highlight">Message</span></h2>
                    <p class="contact-form__subtitle">For project inquiries or feedback</p>
                </header>

                <form id="contactForm" class="contact-form" novalidate>
                    <div class="contact-form__row">
                        <div class="contact-form__group">
                            <label for="fullName" class="contact-form__label">Your Name</label>
                            <input type="text" id="fullName" name="fullName" class="contact-form__input" required
                                placeholder="Enter your full name" aria-required="true">
                            <div class="contact-form__error" id="fullNameError" role="alert"></div>
                        </div>

                        <div class="contact-form__group">
                            <label for="emailAddress" class="contact-form__label">Email Address</label>
                            <input type="email" id="emailAddress" name="emailAddress" class="contact-form__input"
                                required placeholder="your@email.com" aria-required="true">
                            <div class="contact-form__error" id="emailError" role="alert"></div>
                        </div>
                    </div>

                    <div class="contact-form__row">
                        <div class="contact-form__group">
                            <label for="studentId" class="contact-form__label">Student ID</label>
                            <input type="text" id="studentId" name="studentId" class="contact-form__input"
                                placeholder="If you're a student">
                        </div>

                        <div class="contact-form__group">
                            <label for="inquirySubject" class="contact-form__label">Subject</label>
                            <select id="inquirySubject" name="inquirySubject" class="contact-form__select" required
                                aria-required="true">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="project">Project Question</option>
                                <option value="feedback">Feedback</option>
                                <option value="report">Report Issue</option>
                            </select>
                            <div class="contact-form__error" id="subjectError" role="alert"></div>
                        </div>
                    </div>

                    <div class="contact-form__group contact-form__group--full">
                        <label for="inquiryMessage" class="contact-form__label">Your Message</label>
                        <textarea id="inquiryMessage" name="inquiryMessage" class="contact-form__textarea" rows="6"
                            required placeholder="How can we help you?" aria-required="true"></textarea>
                        <div class="contact-form__error" id="messageError" role="alert"></div>
                    </div>

                    <div class="contact-form__actions">
                        <button type="submit" class="contact-form__submit-btn">
                            Send Message
                        </button>
                    </div>
                </form>

                <div id="formSuccessMessage" class="contact-form__success" style="display: none;" role="status">
                    <p>Thank you for your message! (This is a demo - no actual email will be sent)</p>
                </div>
            </div>
        </section>
    </main>

    <?php include_once('footer.php'); ?>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal modal--hidden" role="dialog" aria-modal="true"
        aria-labelledby="modalMessage">
        <div class="modal__content">
            <p id="modalMessage" class="modal__message"></p>
            <button id="modalCloseBtn" class="modal__close-btn">OK</button>
        </div>
    </div>

    <script src="../scripts/contact.js"></script>
</body>

</html>