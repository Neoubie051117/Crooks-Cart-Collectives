<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch user data
$stmt = $connection->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    session_destroy();
    header('Location: sign-in.php');
    exit;
}

// Fetch seller data if exists
$stmt = $connection->prepare("SELECT * FROM sellers WHERE user_id = ?");
$stmt->execute([$userId]);
$seller = $stmt->fetch(PDO::FETCH_ASSOC);
$isSeller = !empty($seller);

// Helper to get file URL using data-storage-handler
function getVerificationFileUrl($path) {
    if (empty($path)) return '';
    return getFileUrl($path);
}

// Determine existing verification file URLs
$identityUrl = '';
$idDocumentUrl = '';
if ($isSeller) {
    if (!empty($seller['identity_path'])) {
        $identityUrl = getVerificationFileUrl($seller['identity_path']);
    }
    if (!empty($seller['id_document_path'])) {
        $idDocumentUrl = getVerificationFileUrl($seller['id_document_path']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isSeller ? 'Edit Seller Information' : 'Become a Seller' ?> - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/seller-registration.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <script defer src="../scripts/seller-fill-form.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader"><?= $isSeller ? 'Seller Profile' : 'Seller Registration' ?></div>

        <form id="sellerFillForm" class="seller-fill-container" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update_seller">
            <input type="hidden" name="is_seller" value="<?= $isSeller ? '1' : '0' ?>">

            <!-- Column 1: Credential Information -->
            <div class="form-section credential-section">
                <h3>Credential Information</h3>
                <div class="upload-row">
                    <div class="upload-box" id="identityUploadBox">
                        <div class="upload-icon">
                            <img src="../assets/image/icons/user-profile-circle.svg" alt="Formal picture">
                        </div>
                        <div class="upload-preview" id="identityPreview"
                            style="<?= $identityUrl ? 'background-image: url(' . htmlspecialchars($identityUrl) . ');' : '' ?>">
                        </div>
                        <label for="identity_photo" class="upload-label">
                            <span class="upload-text">Upload Formal Picture</span>
                            <input type="file" id="identity_photo" name="identity_photo"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                        </label>
                        <div class="file-name" id="identityFileName"></div>
                        <div class="help-text">Max 2MB. JPG, PNG, GIF, WEBP.</div>
                    </div>
                    <div class="upload-box" id="idDocumentUploadBox">
                        <div class="upload-icon">
                            <img src="../assets/image/icons/submit-valid-id-icon.png" alt="Valid ID">
                        </div>
                        <div class="upload-preview" id="idDocumentPreview"
                            style="<?= $idDocumentUrl ? 'background-image: url(' . htmlspecialchars($idDocumentUrl) . ');' : '' ?>">
                        </div>
                        <label for="id_document" class="upload-label">
                            <span class="upload-text">Upload Valid ID</span>
                            <input type="file" id="id_document" name="id_document"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                        </label>
                        <div class="file-name" id="idDocumentFileName"></div>
                        <div class="help-text">Max 2MB. JPG, PNG, GIF, WEBP.</div>
                    </div>
                </div>
            </div>

            <!-- Column 2: Personal Information -->
            <div class="form-section personal-section">
                <h3>Personal Information</h3>
                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" required
                        value="<?= htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div class="error-message" id="firstNameError"></div>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                        value="<?= htmlspecialchars($user['middle_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div class="error-message" id="middleNameError"></div>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" required
                        value="<?= htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div class="error-message" id="lastNameError"></div>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate *</label>
                    <input type="date" id="birthdate" name="birthdate" required
                        value="<?= htmlspecialchars($user['birthdate'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                        max="<?= date('Y-m-d', strtotime('-13 years')) ?>">
                    <div class="error-message" id="birthdateError"></div>
                </div>
                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?= ($user['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= ($user['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female
                        </option>
                        <option value="Other" <?= ($user['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                    <div class="error-message" id="genderError"></div>
                </div>
            </div>

            <!-- Column 3: Account & Seller Information (with buttons at bottom) -->
            <div class="form-section combined-section">
                <h3>Account & Seller Information</h3>

                <!-- Non-editable account info -->
                <div class="info-group">
                    <label>Email</label>
                    <p class="info-value"><?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="info-group">
                    <label>Username</label>
                    <p class="info-value"><?= htmlspecialchars($user['username'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="info-group">
                    <label>Contact Number</label>
                    <p class="info-value"><?= htmlspecialchars($user['contact_number'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>

                <!-- Editable seller fields -->
                <div class="form-group full-width">
                    <label for="address">Business Address</label>
                    <textarea id="address" name="address" rows="3"
                        required><?= htmlspecialchars($user['address'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
                <div class="form-group">
                    <label for="business_name">Store Name</label>
                    <input type="text" id="business_name" name="business_name"
                        value="<?= htmlspecialchars($seller['business_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="Your store name">
                    <div class="error-message" id="businessNameError"></div>
                </div>

                <!-- Buttons inside this column, pushed to bottom -->
                <div class="column-actions">
                    <button type="button" id="backCancelBtn" class="btn btn-secondary">Back</button>
                    <button type="submit" id="saveSellerBtn" class="btn btn-primary" disabled>Save</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Feedback Modal with single button -->
    <div id="feedbackModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalOkBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>