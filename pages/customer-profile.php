<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

// Fetch user data
$stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

// Calculate profile completeness percentage
$completeness = 0;
$totalFields = 8; // first_name, last_name, birthdate, gender, contact_number, address, email, username
$filledFields = 0;

$requiredFields = ['first_name', 'last_name', 'email', 'username', 'contact_number'];
foreach ($requiredFields as $field) {
    if (!empty($user[$field])) $filledFields++;
}

$optionalFields = ['birthdate', 'gender', 'address'];
foreach ($optionalFields as $field) {
    if (!empty($user[$field])) $filledFields++;
}

$completeness = round(($filledFields / $totalFields) * 100);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <?php include_once('header.php'); ?>
</head>

<body>
    <div class="content">
        <div class="pageTitleHeader">Complete Your Profile</div>

        <!-- Profile Completeness Indicator -->
        <div class="profile-completeness">
            <div class="completeness-text">
                <span>Profile Completeness</span>
                <span class="percentage"><?php echo $completeness; ?>%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?php echo $completeness; ?>%"></div>
            </div>
        </div>

        <form id="profileForm" class="profile-container">
            <!-- Success/Error Messages -->
            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <div class="form-section">
                <h3>Personal Information</h3>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name*</label>
                        <input type="text" id="first_name" name="first_name" required
                            value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                            placeholder="Enter your first name">
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name*</label>
                        <input type="text" id="last_name" name="last_name" required
                            value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                            placeholder="Enter your last name">
                        <div class="error-message" id="lastNameError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate"
                            value="<?= htmlspecialchars($user['birthdate'] ?? '') ?>"
                            max="<?php echo date('Y-m-d', strtotime('-13 years')); ?>">
                        <div class="error-message" id="birthdateError"></div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" <?= ($user['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male
                            </option>
                            <option value="Female" <?= ($user['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female
                            </option>
                            <option value="Other" <?= ($user['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Contact Information</h3>

                <div class="form-group">
                    <label for="contact_number">Phone Number*</label>
                    <input type="tel" id="contact_number" name="contact_number" required
                        value="<?= htmlspecialchars($user['contact_number'] ?? '') ?>" placeholder="09XX XXX XXXX">
                    <div class="phone-hint">Format: 09XXXXXXXXX or +639XXXXXXXXX</div>
                    <div class="error-message" id="contactNumberError"></div>
                </div>

                <div class="form-group">
                    <label for="address">Shipping Address*</label>
                    <textarea id="address" name="address" required rows="3"
                        placeholder="Enter your complete shipping address"><?= htmlspecialchars($user['address'] ?? '') ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary" id="saveBtn">Save Profile</button>
                <a href="customer-dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>

            <input type="hidden" name="action" value="update_profile">
        </form>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('profileForm');
        const saveBtn = document.getElementById('saveBtn');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        // Format phone number for display
        const contactInput = document.getElementById('contact_number');
        contactInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');

            if (value.startsWith('63') && value.length === 12) {
                e.target.value = '+63' + value.substring(2);
            } else if (value.startsWith('09') && value.length === 11) {
                e.target.value = value.replace(/(\d{4})(\d{3})(\d{4})/, '$1 $2 $3');
            } else if (value.startsWith('9') && value.length === 10) {
                e.target.value = '09' + value.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3');
            }
        });

        // Validate phone number format
        function validatePhoneNumber(phone) {
            const cleaned = phone.replace(/\D/g, '');
            return /^(09|\+639|639)\d{9}$/.test(cleaned) ||
                /^9\d{9}$/.test(cleaned) ||
                /^0\d{10}$/.test(cleaned);
        }

        // Show error message
        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
            successMessage.style.display = 'none';
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }

        // Show success message
        function showSuccess(message) {
            successMessage.textContent = message;
            successMessage.style.display = 'block';
            errorMessage.style.display = 'none';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }

        // Clear all error messages
        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(el => {
                el.textContent = '';
                el.classList.remove('show');
            });
            document.querySelectorAll('input, select, textarea').forEach(el => {
                el.classList.remove('error');
            });
        }

        // Show field error
        function showFieldError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorEl = document.getElementById(fieldId + 'Error');

            if (field && errorEl) {
                field.classList.add('error');
                errorEl.textContent = message;
                errorEl.classList.add('show');
            }
        }

        // Form validation
        function validateForm() {
            clearErrors();
            let isValid = true;

            // First name validation
            const firstName = document.getElementById('first_name').value.trim();
            if (!firstName) {
                showFieldError('firstName', 'First name is required');
                isValid = false;
            }

            // Last name validation
            const lastName = document.getElementById('last_name').value.trim();
            if (!lastName) {
                showFieldError('lastName', 'Last name is required');
                isValid = false;
            }

            // Phone number validation
            const contactNumber = document.getElementById('contact_number').value.trim();
            if (!contactNumber) {
                showFieldError('contactNumber', 'Phone number is required');
                isValid = false;
            } else if (!validatePhoneNumber(contactNumber)) {
                showFieldError('contactNumber', 'Please enter a valid Philippine phone number');
                isValid = false;
            }

            // Address validation
            const address = document.getElementById('address').value.trim();
            if (!address) {
                showFieldError('address', 'Shipping address is required');
                isValid = false;
            } else if (address.length < 10) {
                showFieldError('address', 'Please enter a complete address (minimum 10 characters)');
                isValid = false;
            }

            // Birthdate validation (optional but if provided, validate)
            const birthdate = document.getElementById('birthdate').value;
            if (birthdate) {
                const birthDate = new Date(birthdate);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();

                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

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

        // Form submission
        form.addEventListener('submit', async (e) => {
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

                const response = await fetch('../database/profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                // Try to parse JSON response
                let result;
                try {
                    const responseText = await response.text();
                    result = JSON.parse(responseText);
                } catch (parseError) {
                    console.error('Parse error:', parseError);
                    throw new Error('Server returned invalid response');
                }

                if (result.status === 'success') {
                    showSuccess('Profile updated successfully!');

                    // Update progress bar after a short delay
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    // Handle specific errors
                    if (result.message.includes('duplicate') || result.message.includes(
                        'Duplicate')) {
                        if (result.message.includes('contact')) {
                            showFieldError('contactNumber',
                                'This phone number is already registered');
                        } else {
                            showError(result.message);
                        }
                    } else {
                        showError(result.message || 'Failed to update profile. Please try again.');
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
            field.addEventListener('blur', () => {
                validateForm();
            });
        });
    });
    </script>
</body>

</html>