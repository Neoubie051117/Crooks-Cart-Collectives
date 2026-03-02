<?php
// Admin Sign Up Page - Modified to allow access even when logged in
session_start();

// REMOVED the redirect that sent logged-in admins back to dashboard.
// Now both logged-in and non-logged-in users can access this page.

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-sign-up.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Admin Registration</div>

        <form id="signupForm" class="signup-container" method="POST" action="../database/admin-sign-up-handler.php"
            autocomplete="on">
            <input type="hidden" name="action" value="signup">

            <!-- Two-column layout -->
            <div class="form-section personal-info-section">
                <h3>Personal Information</h3>

                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name"
                        autocomplete="given-name">
                    <div class="error-message" id="firstNameError"></div>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name"
                        autocomplete="family-name">
                    <div class="error-message" id="lastNameError"></div>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number *</label>
                    <input type="tel" id="contact_number" name="contact_number" required placeholder="09XX XXX XXXX"
                        autocomplete="tel">
                    <div class="help-text">Philippine mobile number (e.g., 0912 345 6789)</div>
                    <div class="error-message" id="contactError"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder="admin@example.com"
                        autocomplete="email">
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="username">Username *</label>
                    <input type="text" id="username" name="username" required placeholder="Choose a username"
                        autocomplete="username">
                    <div class="help-text">3-20 characters (letters, numbers, underscore)</div>
                    <div class="error-message" id="usernameError"></div>
                </div>
            </div>

            <div class="form-section account-info-section">
                <h3>Account Security</h3>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required
                            placeholder="Create a strong password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                            aria-label="Toggle password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                        </button>
                    </div>
                    <div class="help-text">8-16 characters, with uppercase, lowercase, and number</div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="Confirm your password" autocomplete="new-password">
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" tabindex="-1"
                            aria-label="Toggle confirm password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password"
                                id="confirmPasswordIcon">
                        </button>
                    </div>
                    <div class="error-message" id="confirmError"></div>
                </div>

                <!-- Buttons inside Account Information column at the bottom -->
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Register Admin</button>
                    <button type="button" class="btn btn-secondary" id="clearForm">Clear Form</button>
                </div>

                <div class="links-group">
                    <p class="login-link">
                        Already have an admin account? <a href="admin-sign-in.php">Sign In</a>
                    </p>
                </div>
            </div>
        </form>
    </div>

    <!-- Notifier Modal -->
    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-sign-up.js"></script>
</body>

</html>