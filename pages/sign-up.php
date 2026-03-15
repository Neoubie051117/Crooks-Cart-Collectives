<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: product.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sign-up.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/header.js"></script>
    <script defer src="../scripts/sign-up.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Create Your Account</div>

        <form id="signupForm" class="signup-container" method="POST" action="../database/sign-up-handler.php"
            autocomplete="on">
            <input type="hidden" name="action" value="register">

            <!-- Left Column: Personal Information -->
            <div class="form-section personal-info-section">
                <h3>Personal Information</h3>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Juan"
                        autocomplete="given-name" pattern="[A-Za-z\s\-']+"
                        title="First name can only contain letters, spaces, hyphens, and apostrophes"
                        oninput="this.value = this.value.replace(/[^A-Za-z\s\-']/g, '')">
                    <div class="error-message" id="firstNameError"></div>
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name <span class="optional">(Optional)</span></label>
                    <input type="text" id="middle_name" name="middle_name" placeholder="" autocomplete="additional-name"
                        pattern="[A-Za-z\s\-']*"
                        title="Middle name can only contain letters, spaces, hyphens, and apostrophes"
                        oninput="this.value = this.value.replace(/[^A-Za-z\s\-']/g, '')">
                    <div class="error-message" id="middleNameError"></div>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Dela Cruz"
                        autocomplete="family-name" pattern="[A-Za-z\s\-']+"
                        title="Last name can only contain letters, spaces, hyphens, and apostrophes"
                        oninput="this.value = this.value.replace(/[^A-Za-z\s\-']/g, '')">
                    <div class="error-message" id="lastNameError"></div>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" required autocomplete="bday">
                    <div class="error-message" id="birthdateError"></div>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="error-message" id="genderError"></div>
                </div>
            </div>

            <!-- Middle Column: Account Information -->
            <div class="form-section account-info-section">
                <h3>Account Information</h3>

                <div class="form-group">
                    <label for="contact_number">Phone Number</label>
                    <input type="tel" id="contact_number" name="contact_number" required placeholder="09XX XXX XXXX"
                        autocomplete="tel" pattern="[0-9\s\+]+" title="Please enter a valid Philippine mobile number"
                        oninput="this.value = this.value.replace(/[^0-9\s\+]/g, '')">
                    <div class="error-message" id="contactError"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="juandelacruz@mail.com"
                        autocomplete="email">
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="juandelacruz123"
                        autocomplete="username" pattern="[A-Za-z0-9_]{3,20}"
                        title="Username must be 3-20 characters and can only contain letters, numbers, and underscores"
                        oninput="this.value = this.value.replace(/[^A-Za-z0-9_]/g, '')">
                    <div class="error-message" id="usernameError"></div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required
                            placeholder="Create a strong password" autocomplete="new-password"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,16}$"
                            title="Password must be 8-16 characters with at least one uppercase letter, one lowercase letter, and one number">
                        <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                            aria-label="Toggle password visibility">
                            <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                        </button>
                    </div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
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
            </div>

            <!-- Right Column: Address Information -->
            <div class="form-section address-section">
                <h3>Address Information</h3>

                <!-- Block / Street / House Number -->
                <div class="form-group">
                    <label for="block">Block / Street / House Number</label>
                    <input type="text" id="block" name="block" required placeholder="Block 5, Lot 12, Unit 101"
                        maxlength="120">
                    <div class="error-message" id="blockError"></div>
                </div>

                <!-- Barangay and City-->
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="barangay">Barangay</label>
                        <input type="text" id="barangay" name="barangay" placeholder="San Miguel" maxlength="100">
                        <div class="error-message" id="barangayError"></div>
                    </div>

                    <div class="form-group half-width">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required placeholder="Pasig" maxlength="100">
                        <div class="error-message" id="cityError"></div>
                    </div>
                </div>

                <!-- Province and Region -->
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="province">Province</label>
                        <input type="text" id="province" name="province" placeholder="Metro Manila" maxlength="100">
                        <div class="error-message" id="provinceError"></div>
                    </div>

                    <div class="form-group half-width">
                        <label for="region">Region</label>
                        <input type="text" id="region" name="region" placeholder="NCR" maxlength="100">
                        <div class="error-message" id="regionError"></div>
                    </div>
                </div>

                <!-- Postal Code and Country -->
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" required placeholder="1234"
                            maxlength="10" pattern="[0-9]{4,10}" title="Postal code must contain only numbers"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" inputmode="numeric"
                            style="-moz-appearance: textfield; -webkit-appearance: none; appearance: textfield;">
                        <div class="error-message" id="postalCodeError"></div>
                    </div>

                    <div class="form-group half-width">
                        <label for="country">Country</label>
                        <select id="country" name="country" required>
                            <option value="Philippines" selected>Philippines</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="error-message" id="countryError"></div>
                    </div>
                </div>

                <!-- Terms and Conditions Checkbox -->
                <div class="form-group terms-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="terms" name="terms" required>
                        <span class="custom-checkbox"></span>
                        <label for="terms" class="terms-label">
                            I agree to the
                            <a href="terms-and-conditions.php" target="_blank">Terms and Conditions</a>
                            and
                            <a href="privacy-policy.php" target="_blank">Privacy Policy</a>.
                        </label>
                    </div>
                    <div class="error-message" id="termsError"></div>
                </div>

                <!-- Buttons -->
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary" id="registerBtn">Create Account</button>
                    <button type="button" class="btn btn-secondary" id="clearForm">Clear Form</button>
                </div>

                <div class="links-group">
                    <p class="login-link">
                        Already have an account? <a href="sign-in.php">Sign In</a>
                    </p>
                    <!-- <p class="seller-link">
                        Want to sell? <a href="seller-fill-form.php">Become a Seller</a>
                    </p> -->
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

    <?php include_once('footer.php'); ?>
</body>

</html>