<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-profile.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
    <script defer src="../scripts/admin-profile.js"></script>
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <?php if (isset($error)): ?>
        <div class="message error"
            style="display: block; margin-bottom: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px;">
            <?php echo htmlspecialchars($error); ?>
            <a href="admin-dashboard.php" style="color: #721c24; text-decoration: underline; margin-left: 10px;">Return
                to Dashboard</a>
        </div>
        <?php else: ?>

        <form id="profileForm" class="profile-container" method="POST" enctype="multipart/form-data" autocomplete="on">
            <input type="hidden" name="action" value="update_profile">

            <div id="successMessage" class="message success" style="display: none;"></div>
            <div id="errorMessage" class="message error" style="display: none;"></div>

            <div class="profile-header-card" id="profileHeaderCard">
                <div class="profile-header-left">
                    <div class="profile-avatar-wrapper">
                        <img id="profilePicturePreview" src="<?php echo $profilePicUrl; ?>" alt="Profile Picture"
                            onerror="this.onerror=null; this.src='../assets/image/icons/user-profile-circle.svg';">
                        <div class="profile-avatar-edit" id="profilePictureUpload">
                            <label for="profile_picture" class="file-upload-label" title="Upload profile picture">
                                <img src="../assets/image/icons/camera.svg" alt="Upload">
                            </label>
                            <input type="file" id="profile_picture" name="profile_picture"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                        </div>
                    </div>
                    <div class="profile-name-role">
                        <h1 class="profile-full-name">
                            <?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            <?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </h1>
                        <span class="profile-role-badge">Administrator</span>
                        <div id="fileNameDisplay" class="file-name"></div>
                    </div>
                </div>

                <div class="profile-header-right">
                    <button type="button" id="editProfileBtn" class="btn btn-edit">
                        <img src="../assets/image/icons/edit.svg" alt="Edit" class="btn-icon">
                        Edit Profile
                    </button>

                    <div id="profileActions" class="profile-actions-header" style="display: none;">
                        <button type="button" id="uploadPhotoBtn" class="btn btn-upload" title="Upload Profile Photo">
                            <img src="../assets/image/icons/camera.svg" alt="Upload" class="btn-icon">
                            <span class="btn-text">Upload Photo</span>
                        </button>
                        <button type="button" id="saveProfileBtn" class="btn btn-primary" disabled>
                            <img src="../assets/image/icons/check.svg" alt="Save" class="btn-icon">
                            <span class="btn-text">Save</span>
                        </button>
                        <button type="button" id="cancelEditBtn" class="btn btn-secondary">
                            <img src="../assets/image/icons/cancel.svg" alt="Cancel" class="btn-icon">
                            <span class="btn-text">Cancel</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="profile-grid">
                <div class="profile-card personal-info-card">
                    <div class="card-header">
                        <h3>Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name" class="field-label">
                                <img src="../assets/image/icons/user.svg" alt="" class="field-icon">
                                First Name
                            </label>
                            <input type="text" id="first_name" name="first_name" required
                                value="<?php echo htmlspecialchars($admin['first_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="First name" maxlength="50" disabled>
                            <div class="error-message" id="firstNameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="field-label">
                                <img src="../assets/image/icons/user.svg" alt="" class="field-icon">
                                Last Name
                            </label>
                            <input type="text" id="last_name" name="last_name" required
                                value="<?php echo htmlspecialchars($admin['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Last name" maxlength="50" disabled>
                            <div class="error-message" id="lastNameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="contact_number" class="field-label">
                                <img src="../assets/image/icons/phone.svg" alt="" class="field-icon">
                                Contact Number
                            </label>
                            <input type="tel" id="contact_number" name="contact_number" required
                                value="<?php echo htmlspecialchars($admin['contact_number'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="09XX XXX XXXX" maxlength="13" disabled>
                            <div class="error-message" id="contactError"></div>
                        </div>
                    </div>
                </div>

                <div class="profile-card account-info-card">
                    <div class="card-header">
                        <h3>Account Information</h3>
                        <span class="badge">Cannot be changed</span>
                    </div>
                    <div class="card-body">
                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/mail.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Email Address</span>
                                <span
                                    class="info-value"><?php echo htmlspecialchars($admin['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>

                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/user.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Username</span>
                                <span
                                    class="info-value"><?php echo htmlspecialchars($admin['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>

                        <div class="info-display-group">
                            <div class="info-icon">
                                <img src="../assets/image/icons/calendar.svg" alt="">
                            </div>
                            <div class="info-content">
                                <span class="info-label">Member Since</span>
                                <span class="info-value"><?php echo htmlspecialchars($dateJoined ?: 'N/A'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="file" id="profile_picture_trigger" name="profile_picture"
                accept="image/jpeg,image/png,image/gif,image/webp" style="display: none;">
        </form>
        <?php endif; ?>
    </div>

    <div id="feedbackModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon success-icon">
                <img src="../assets/image/icons/check-circle.svg" alt="Success">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>
</body>

</html>