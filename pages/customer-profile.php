<?php
session_start();
require_once('../database/database-connect.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch user data with proper error handling
$user = [];
try {
    $stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // If user not found, redirect to sign-in
    if (!$user) {
        session_destroy();
        header('Location: sign-in.php');
        exit;
    }
} catch (PDOException $e) {
    error_log("Error fetching user profile: " . $e->getMessage());
    $error = "Unable to load profile data. Please try again later.";
}

// Calculate profile completeness percentage
$completeness = 0;
$filledFields = 0;

// Define field groups
$requiredFields = ['first_name', 'last_name', 'email', 'username', 'contact_number'];
$optionalFields = ['birthdate', 'gender', 'address'];
$allFields = array_merge($requiredFields, $optionalFields);
$totalFields = count($allFields);

// Count filled fields
foreach ($allFields as $field) {
    if (!empty($user[$field])) {
        $filledFields++;
    }
}

$completeness = $totalFields > 0 ? round(($filledFields / $totalFields) * 100) : 0;

// Determine path prefix for assets
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'index.php');
$pathPrefix = $is_root ? '' : '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/profile.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Complete Your Profile</div>

        <?php if (isset($error)): ?>
        <div class="message error" style="display: block; margin-bottom: 20px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="customer-dashboard.php" style="color: white; text-decoration: underline; margin-left: 10px;">
                Return to Dashboard
            </a>
        </div>
        <?php else: ?>

        <!-- Profile Completeness Indicator -->
        <!-- <div class="profile-completeness">
            <div class="completeness-text">
                <span>Profile Completeness</span>
                <span class="percentage"><?php echo $completeness; ?>%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?php echo $completeness; ?>%"></div>
            </div>
            <div class="completeness-details">
                <small><?php echo $filledFields; ?>/<?php echo $totalFields; ?> fields completed</small>
            </div>
        </div> -->

        <form id="profileForm" class="profile-container" method="POST" autocomplete="on">
            <!-- Success/Error Messages -->
            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <div class="form-section">
                <h3>Personal Information</h3>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name" required
                            value="<?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Enter your first name" autocomplete="given-name" maxlength="50">
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name"
                            value="<?php echo htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Enter your middle name (optional)" autocomplete="additional-name"
                            maxlength="50">
                        <div class="error-message" id="middleNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" required
                            value="<?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Enter your last name" autocomplete="family-name" maxlength="50">
                        <div class="error-message" id="lastNameError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate"
                            value="<?php echo htmlspecialchars($user['birthdate'] ?? ''); ?>"
                            max="<?php echo date('Y-m-d', strtotime('-13 years')); ?>"
                            min="<?php echo date('Y-m-d', strtotime('-120 years')); ?>" autocomplete="bday">
                        <div class="error-message" id="birthdateError"></div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" autocomplete="sex">
                            <option value="">Select Gender (Optional)</option>
                            <option value="Male" <?php echo ($user['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male
                            </option>
                            <option value="Female" <?php echo ($user['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>
                                Female</option>
                            <option value="Other" <?php echo ($user['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>
                                Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Contact Information</h3>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required readonly disabled
                            value="<?php echo htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="your@email.com" autocomplete="email" class="readonly-field">
                        <small class="field-hint">Email cannot be changed</small>
                        <div class="error-message" id="emailError"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" id="username" name="username" required readonly disabled
                            value="<?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Username" autocomplete="username" class="readonly-field">
                        <small class="field-hint">Username cannot be changed</small>
                        <div class="error-message" id="usernameError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_number">Phone Number *</label>
                        <input type="tel" id="contact_number" name="contact_number" required
                            value="<?php echo htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="0912 345 6789" autocomplete="tel" maxlength="16">
                        <div class="phone-hint">Phone number cannot be changed</div>
                        <div class="error-message" id="contactNumberError"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Shipping Address *</label>
                    <textarea id="address" name="address" required rows="3"
                        placeholder="Enter your complete shipping address (House/Unit No., Street, Barangay, City, Province)"
                        autocomplete="street-address"
                        maxlength="255"><?php echo htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary" id="saveBtn">Save Profile</button>
                <a href="customer-dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>

            <input type="hidden" name="action" value="update_profile">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        </form>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('profileForm');
        if (!form) return; // Exit if form doesn't exist (error state)

        const saveBtn = document.getElementById('saveBtn');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');
        const contactInput = document.getElementById('contact_number');

        // ============= PHONE NUMBER FORMATTING =============
        if (contactInput) {
            // Format on input
            contactInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove non-digits

                if (value.length === 0) {
                    e.target.value = '';
                } else if (value.startsWith('63') && value.length === 12) {
                    // +639 format
                    e.target.value = '+63' + value.substring(2, 5) + ' ' +
                        value.substring(5, 8) + ' ' +
                        value.substring(8, 12);
                } else if (value.startsWith('0') && value.length === 11) {
                    // 09 format
                    e.target.value = value.substring(0, 4) + ' ' +
                        value.substring(4, 7) + ' ' +
                        value.substring(7, 11);
                } else if (value.startsWith('9') && value.length === 10) {
                    // 9 format (convert to 09)
                    e.target.value = '09' + value.substring(0, 3) + ' ' +
                        value.substring(3, 6) + ' ' +
                        value.substring(6, 10);
                }
            });

            // Format on blur
            contactInput.addEventListener('blur', function(e) {
                const value = e.target.value.trim();
                if (value) {
                    const cleaned = value.replace(/\D/g, '');
                    if (cleaned.length === 11 && cleaned.startsWith('09')) {
                        // Already in correct format
                    } else if (cleaned.length === 12 && cleaned.startsWith('63')) {
                        e.target.value = '+63' + cleaned.substring(2, 5) + ' ' +
                            cleaned.substring(5, 8) + ' ' +
                            cleaned.substring(8, 12);
                    } else if (cleaned.length === 10 && cleaned.startsWith('9')) {
                        e.target.value = '09' + cleaned.substring(0, 3) + ' ' +
                            cleaned.substring(3, 6) + ' ' +
                            cleaned.substring(6, 10);
                    }
                }
            });
        }

        // ============= VALIDATION FUNCTIONS =============
        function validatePhoneNumber(phone) {
            if (!phone) return false;
            const cleaned = phone.replace(/\D/g, '');
            return cleaned.length === 11 && cleaned.startsWith('09');
        }

        function validateEmail(email) {
            if (!email) return false;
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function validateName(name) {
            if (!name) return false;
            return name.length >= 2 && name.length <= 50 && /^[a-zA-Z\s\-']+$/.test(name);
        }

        function validateAddress(address) {
            if (!address) return false;
            return address.length >= 10 && address.length <= 255;
        }

        function calculateAge(birthdate) {
            if (!birthdate) return null;
            const birthDate = new Date(birthdate);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        // ============= UI MESSAGE FUNCTIONS =============
        function showError(message) {
            if (errorMessage) {
                errorMessage.textContent = message;
                errorMessage.style.display = 'block';
                successMessage.style.display = 'none';

                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        }

        function showSuccess(message) {
            if (successMessage) {
                successMessage.textContent = message;
                successMessage.style.display = 'block';
                errorMessage.style.display = 'none';

                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        }

        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(el => {
                el.textContent = '';
                el.classList.remove('show');
            });
            document.querySelectorAll('input, select, textarea').forEach(el => {
                el.classList.remove('error');
            });
        }

        function showFieldError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorEl = document.getElementById(fieldId + 'Error');

            if (field && errorEl) {
                field.classList.add('error');
                errorEl.textContent = message;
                errorEl.classList.add('show');

                // Scroll to error
                field.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        // ============= FORM VALIDATION =============
        function validateForm() {
            clearErrors();
            let isValid = true;

            // First name validation
            const firstName = document.getElementById('first_name')?.value.trim();
            if (!firstName) {
                showFieldError('first_name', 'First name is required');
                isValid = false;
            } else if (!validateName(firstName)) {
                showFieldError('first_name',
                    'First name can only contain letters, spaces, hyphens and apostrophes');
                isValid = false;
            }

            // Last name validation
            const lastName = document.getElementById('last_name')?.value.trim();
            if (!lastName) {
                showFieldError('last_name', 'Last name is required');
                isValid = false;
            } else if (!validateName(lastName)) {
                showFieldError('last_name',
                    'Last name can only contain letters, spaces, hyphens and apostrophes');
                isValid = false;
            }

            // Phone number validation
            const contactNumber = document.getElementById('contact_number')?.value.trim();
            if (!contactNumber) {
                showFieldError('contact_number', 'Phone number is required');
                isValid = false;
            } else if (!validatePhoneNumber(contactNumber)) {
                showFieldError('contact_number',
                    'Please enter a valid Philippine mobile number (e.g., 09123456789)');
                isValid = false;
            }

            // Address validation
            const address = document.getElementById('address')?.value.trim();
            if (!address) {
                showFieldError('address', 'Shipping address is required');
                isValid = false;
            } else if (!validateAddress(address)) {
                showFieldError('address', 'Please enter a complete address (minimum 10 characters)');
                isValid = false;
            }

            // Birthdate validation (optional)
            const birthdate = document.getElementById('birthdate')?.value;
            if (birthdate) {
                const age = calculateAge(birthdate);
                if (age < 13) {
                    showFieldError('birthdate', 'You must be at least 13 years old');
                    isValid = false;
                } else if (age > 120) {
                    showFieldError('birthdate', 'Please enter a valid birthdate');
                    isValid = false;
                }
            }

            return isValid;
        }

        // ============= FORM SUBMISSION =============
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                if (!validateForm()) {
                    showError('Please fix the errors in the form');
                    return;
                }

                // Disable button and show loading
                const originalText = saveBtn.textContent;
                saveBtn.textContent = 'Saving...';
                saveBtn.disabled = true;
                saveBtn.classList.add('loading');

                try {
                    const formData = new FormData(form);

                    // Add timestamp to prevent caching
                    formData.append('timestamp', Date.now());

                    const response = await fetch('../database/profile-handler.php', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const responseText = await response.text();
                    let result;

                    try {
                        result = JSON.parse(responseText);
                    } catch (parseError) {
                        console.error('Parse error:', responseText);
                        throw new Error('Server returned invalid response');
                    }

                    if (result.status === 'success') {
                        showSuccess('Profile updated successfully!');

                        // Update progress bar without reload
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        if (result.message && result.message.includes('duplicate')) {
                            if (result.message.includes('contact')) {
                                showFieldError('contact_number',
                                    'This phone number is already registered');
                            } else {
                                showError(result.message);
                            }
                        } else {
                            showError(result.message ||
                                'Failed to update profile. Please try again.');
                        }
                    }
                } catch (error) {
                    console.error('Update error:', error);
                    showError('Network error. Please check your connection and try again.');
                } finally {
                    // Re-enable button
                    saveBtn.textContent = originalText;
                    saveBtn.disabled = false;
                    saveBtn.classList.remove('loading');
                }
            });

            // Real-time validation on blur
            form.querySelectorAll('input, select, textarea').forEach(field => {
                field.addEventListener('blur', function() {
                    if (this.id && !this.readOnly) {
                        const fieldId = this.id;
                        const value = this.value.trim();

                        // Simple per-field validation
                        if (this.required && !value) {
                            showFieldError(fieldId, this.getAttribute('placeholder') +
                                ' is required');
                        } else {
                            const errorEl = document.getElementById(fieldId + 'Error');
                            if (errorEl) {
                                errorEl.textContent = '';
                                errorEl.classList.remove('show');
                            }
                            this.classList.remove('error');
                        }
                    }
                });
            });
        }
    });
    </script>
</body>

</html>