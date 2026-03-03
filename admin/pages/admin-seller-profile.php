<?php
session_start();
require_once('../database/admin-database-connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-sign-in.php');
    exit;
}

// Get seller ID from URL
$sellerId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($sellerId === 0) {
    header('Location: admin-verify-sellers.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile - Admin - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/admin-header.css">
    <link rel="stylesheet" href="../styles/admin-seller-profile.css">
    <link rel="stylesheet" href="../styles/admin-footer.css">
</head>

<body>
    <?php include_once('../includes/admin-header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>Seller Profile</h1>
            <a href="admin-verify-sellers.php" class="back-link">
                <img src="../assets/image/icons/cancel.svg" alt="Back" class="back-icon">
                Back to Sellers
            </a>
        </div>

        <!-- Loading State -->
        <div id="loadingState" class="loading-state">
            <div class="loading-spinner"></div>
            <p>Loading seller information...</p>
        </div>

        <!-- Error State -->
        <div id="errorState" class="error-state" style="display: none;">
            <div class="error-content">
                <img src="../assets/image/icons/info-empty.svg" alt="Error" class="error-icon">
                <h2>Error Loading Profile</h2>
                <p id="errorMessage">Unable to load seller information.</p>
                <a href="admin-verify-sellers.php" class="btn btn-primary">Return to Sellers</a>
            </div>
        </div>

        <!-- Seller Profile Container (hidden initially) -->
        <div id="sellerProfileContainer" class="seller-profile-container" style="display: none;">
            <!-- Hidden seller ID field -->
            <input type="hidden" id="sellerId" value="<?php echo $sellerId; ?>">

            <!-- Profile Header Card - Restructured with nested divs for consistent layout -->
            <div class="profile-header-card">
                <!-- Main header wrapper -->
                <div class="header-main-wrapper">
                    <!-- Top row: Business Name and Status -->
                    <div class="header-top-row">
                        <div class="header-business-name">
                            <h1 id="sellerBusinessName" class="profile-business-name-header">Loading...</h1>
                        </div>
                        <div class="header-status">
                            <span id="sellerStatus" class="status-badge pending">Pending</span>
                        </div>
                    </div>

                    <!-- Bottom row: Profile Pic, Full Name, and Action Buttons -->
                    <div class="header-bottom-row">
                        <!-- Left: Profile Picture -->
                        <div class="header-profile-pic">
                            <div class="profile-avatar-wrapper">
                                <img id="profileAvatar" src="../assets/image/icons/user-profile-circle.svg"
                                    alt="Profile">
                            </div>
                        </div>

                        <!-- Middle: Full Name -->
                        <div class="header-full-name">
                            <span id="sellerFullName" class="profile-full-name">Loading...</span>
                        </div>

                        <!-- Right: Action Buttons (Verify/Reject) will be inserted here by JS -->
                        <div class="header-actions" id="profileActions"></div>
                    </div>
                </div>
            </div>

            <!-- Three-column layout based on seller-fill-form -->
            <div class="profile-grid">
                <!-- Column 1: Credential Information (Uploaded Documents) -->
                <div class="profile-card credential-card">
                    <div class="card-header">
                        <h3>Credential Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="document-row">
                            <div class="document-box">
                                <div class="upload-icon">
                                    <img src="../assets/image/icons/user-profile-circle.svg" alt="Formal picture">
                                </div>
                                <div class="upload-preview" id="identityPreview"></div>
                                <div class="document-label">Formal Picture</div>
                                <p class="document-status" id="identityStatus">Not uploaded</p>
                                <a href="#" id="identityLink" class="document-link" target="_blank"
                                    style="display: none;">View Full Image</a>
                            </div>
                            <div class="document-box">
                                <div class="upload-icon">
                                    <img src="../assets/image/icons/submit-valid-id-icon.png" alt="Valid ID">
                                </div>
                                <div class="upload-preview" id="idDocumentPreview"></div>
                                <div class="document-label">Valid ID</div>
                                <p class="document-status" id="idDocumentStatus">Not uploaded</p>
                                <a href="#" id="idDocumentLink" class="document-link" target="_blank"
                                    style="display: none;">View Full Image</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Personal Information -->
                <div class="profile-card personal-card">
                    <div class="card-header">
                        <h3>Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="text" id="birthdate" name="birthdate" disabled>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" disabled>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Account & Seller Information -->
                <div class="profile-card account-card">
                    <div class="card-header">
                        <h3>Account & Seller Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" id="contactNumber" name="contactNumber" disabled>
                        </div>
                        <div class="form-group full-width">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="businessName">Store Name</label>
                            <input type="text" id="businessName" name="businessName" disabled>
                        </div>

                        <!-- New Date Fields -->
                        <div class="form-group">
                            <label for="dateApplied">Date Applied</label>
                            <input type="text" id="dateApplied" name="dateApplied" disabled>
                        </div>
                        <div class="form-group">
                            <label for="dateVerified">Date Verified</label>
                            <input type="text" id="dateVerified" name="dateVerified" disabled>
                        </div>
                        <div class="form-group">
                            <label for="memberSince">Member Since</label>
                            <input type="text" id="memberSince" name="memberSince" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal for Verify/Reject -->
    <div id="confirmationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/info-empty.svg" alt="Confirm">
            </div>
            <h3 id="modalTitle" class="modal-title">Confirm Action</h3>
            <p id="modalMessage" class="modal-message">Are you sure you want to perform this action?</p>
            <div class="modal-actions">
                <button id="modalCancelBtn" class="modal-btn modal-btn-secondary">Cancel</button>
                <button id="modalConfirmBtn" class="modal-btn modal-btn-primary">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="notificationMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button id="notificationCloseBtn" class="modal-btn modal-btn-primary">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('../includes/admin-footer.php'); ?>

    <script src="../scripts/admin-seller-profile.js"></script>
</body>

</html>