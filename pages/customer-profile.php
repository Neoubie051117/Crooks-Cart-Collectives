<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

$user = [];
try {
    $stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        session_destroy();
        header('Location: sign-in.php');
        exit;
    }
} catch (PDOException $e) {
    error_log("Error fetching user profile: " . $e->getMessage());
    $error = "Unable to load profile data. Please try again later.";
}

// Helper to get profile picture URL using data-storage-handler
function getProfilePictureUrl($picture) {
    if (empty($picture)) {
        return '../assets/image/icons/user-profile-circle.svg';
    }
    
    // Use the data-storage-handler's getFileUrl function
    return getFileUrl($picture);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/customer-profile.js"></script>
</head>
<body>
    <?php include_once('header.php'); ?>

    <div class="content">

        <?php if (isset($error)): ?>
        <div class="message error" style="display: block; margin-bottom: 20px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="customer-dashboard.php" style="color: white; text-decoration: underline; margin-left: 10px;">
                Return to Dashboard
            </a>
        </div>
        <?php else: ?>

        <form id="profileForm" class="profile-container" method="POST" enctype="multipart/form-data" autocomplete="on">
            <input type="hidden" name="action" value="update_profile">

            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <!-- Personal Info Section with Profile Preview -->
            <div class="form-section personal-info-section">
                <h3>Profile Information</h3>
                
                <!-- PROFILE CONTAINER - Stacked and Centered -->
                <div class="profile-stacked-container">
                    <!-- Profile Picture -->
                    <div class="profile-picture-wrapper">
                        <img id="profilePicturePreview" 
                             src="<?php echo getProfilePictureUrl($user['profile_picture'] ?? ''); ?>" 
                             alt="Profile Picture"
                             onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                        
                        <div class="profile-picture-upload" id="profilePictureUpload" style="display: none;">
                            <label for="profile_picture" class="file-upload-label">Choose Photo to Upload</label>
                            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                            <div class="file-name" id="fileNameDisplay"></div>
                            <div class="help-text">Max 2MB. JPG, PNG, GIF.</div>
                        </div>
                    </div>
                    
                    <!-- Profile Name (one line - first name + last name) -->
                    <div class="profile-name-single-line">
                        <span class="display-full-name"><?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    
                    <!-- Choose button container - centered below name -->
                    <div class="choose-button-container" id="chooseButtonContainer" style="display: none;">
                        <button type="button" class="btn-choose-photo" id="triggerFileUpload">Choose Photo to Upload</button>
                    </div>
                </div>

                <!-- Name fields with labels -->
                <div class="fields-row with-labels">
                    <div class="form-group flex-field">
                        <label for="first_name" class="field-label">First name</label>
                        <input type="text" id="first_name" name="first_name" required
                               value="<?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="First name" maxlength="50" disabled>
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group flex-field">
                        <label for="middle_name" class="field-label">Middle name</label>
                        <input type="text" id="middle_name" name="middle_name"
                               value="<?php echo htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Middle name" maxlength="50" disabled>
                        <div class="error-message" id="middleNameError"></div>
                    </div>

                    <div class="form-group flex-field">
                        <label for="last_name" class="field-label">Last name</label>
                        <input type="text" id="last_name" name="last_name" required
                               value="<?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Last name" maxlength="50" disabled>
                        <div class="error-message" id="lastNameError"></div>
                    </div>
                </div>

                <!-- Birthdate and Gender with labels -->
                <div class="fields-row balanced-row with-labels">
                    <div class="form-group half-field">
                        <label for="birthdate" class="field-label">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate"
                               value="<?php echo htmlspecialchars($user['birthdate'] ?? ''); ?>"
                               max="<?php echo date('Y-m-d', strtotime('-13 years')); ?>"
                               min="<?php echo date('Y-m-d', strtotime('-120 years')); ?>" disabled>
                        <div class="error-message" id="birthdateError"></div>
                    </div>

                    <div class="form-group half-field">
                        <label for="gender" class="field-label">Gender</label>
                        <select id="gender" name="gender" disabled>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo ($user['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($user['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo ($user['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                        <div class="error-message" id="genderError"></div>
                    </div>
                </div>

                <!-- Address with label -->
                <div class="form-group full-width with-label">
                    <label for="address" class="field-label">Address</label>
                    <textarea id="address" name="address" required rows="3"
                              placeholder="Enter your complete address"
                              maxlength="255" disabled><?php echo htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
            </div>

            <!-- Account Info Section with buttons at bottom -->
            <div class="form-section account-info-section">
                <h3>Account Information</h3>

                <div class="info-row">
                    <div class="info-group">
                        <label>Email</label>
                        <p class="info-value centered"><?php echo htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Username</label>
                        <p class="info-value centered"><?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Contact num</label>
                        <p class="info-value centered"><?php echo htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <div class="info-note centered">These details cannot be changed.</div>

                <!-- Buttons inside Account Info column at bottom -->
                <div class="profile-actions">
                    <button type="button" id="editCancelBtn" class="btn btn-secondary">Edit</button>
                    <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>Save</button>
                </div>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <!-- Feedback Modal -->
    <div id="feedbackModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification"
                     style="width: 60px; height: 60px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%);">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-confirm" id="modalCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>