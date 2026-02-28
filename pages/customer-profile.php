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
        <div class="pageTitleHeader">Edit Your Profile</div>

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

            <!-- Profile Picture Section -->
            <div class="profile-picture-section">
                <div class="profile-picture-wrapper">
                    <img id="profilePicturePreview" 
                         src="<?php echo getProfilePictureUrl($user['profile_picture'] ?? ''); ?>" 
                         alt="Profile Picture"
                         onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                </div>
                <div class="profile-name">
                    <h2><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h2>
                </div>
                <div class="profile-picture-upload" id="profilePictureUpload" style="display: none;">
                    <label for="profile_picture" class="file-upload-label">Choose New Picture</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                    <div class="file-name" id="fileNameDisplay"></div>
                    <div class="help-text">Max 2MB. JPG, PNG, GIF.</div>
                </div>
            </div>

            <!-- Three‑column layout -->
            <div class="profile-columns">
                <!-- Column 1: Personal Information -->
                <div class="form-section personal-info-column">
                    <h3>Personal Information</h3>

                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name" required
                               value="<?php echo htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Enter your first name" maxlength="50" disabled>
                        <div class="error-message" id="firstNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name"
                               value="<?php echo htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Enter your middle name (optional)" maxlength="50" disabled>
                        <div class="error-message" id="middleNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" required
                               value="<?php echo htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               placeholder="Enter your last name" maxlength="50" disabled>
                        <div class="error-message" id="lastNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate"
                               value="<?php echo htmlspecialchars($user['birthdate'] ?? ''); ?>"
                               max="<?php echo date('Y-m-d', strtotime('-13 years')); ?>"
                               min="<?php echo date('Y-m-d', strtotime('-120 years')); ?>" disabled>
                        <div class="error-message" id="birthdateError"></div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" disabled>
                            <option value="">Select Gender (Optional)</option>
                            <option value="Male" <?php echo ($user['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($user['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo ($user['gender'] ?? '') == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                        <div class="error-message" id="genderError"></div>
                    </div>
                </div>

                <!-- Column 2: Account Information -->
                <div class="form-section account-info-column">
                    <h3>Account Information</h3>

                    <div class="info-group">
                        <label>Email Address</label>
                        <p class="info-value"><?php echo htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Username</label>
                        <p class="info-value"><?php echo htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-group">
                        <label>Contact Number</label>
                        <p class="info-value"><?php echo htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="info-note">These details cannot be changed.</div>
                </div>

                <!-- Column 3: Shipping Information -->
                <div class="form-section shipping-info-column">
                    <h3>Shipping Information</h3>

                    <div class="form-group">
                        <label for="address">Address *</label>
                        <textarea id="address" name="address" required rows="4"
                                  placeholder="Enter your complete shipping address"
                                  maxlength="255" disabled><?php echo htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        <div class="error-message" id="addressError"></div>
                    </div>

                    <!-- Buttons -->
                    <div class="profile-actions">
                        <button type="button" id="editCancelBtn" class="btn btn-secondary">Edit</button>
                        <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>Save</button>
                    </div>
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