<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// No need to fetch user name anymore - we don't display it
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Addresses - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/address-list.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="page-title-header">
            <h1>My Addresses</h1>
            <span class="address-count-badge" id="addressCount">0/5</span>
        </div>

        <!-- Address List Container -->
        <div id="addressesContainer" class="addresses-container">
            <div class="loading">Loading addresses...</div>
        </div>

        <!-- Add New Address Button -->
        <div class="add-address-container">
            <button class="btn btn-primary" id="addAddressBtn">
                <img src="../assets/image/icons/add.svg" alt="Add" class="btn-icon">
                Add New Address
            </button>
        </div>
    </div>

    <!-- Address Modal (Add/Edit) -->
    <div id="addressModal" class="modal" style="display: none;">
        <div class="modal-content modal-lg">
            <h2 id="modalTitle">Add New Address</h2>
            <form id="addressForm">
                <input type="hidden" name="address_id" id="addressId">

                <!-- Block / Street / House Number -->
                <div class="form-group">
                    <label for="block">Block / Street / House Number *</label>
                    <input type="text" id="block" name="block" required maxlength="120">
                    <div class="error-message" id="blockError"></div>
                </div>

                <!-- Barangay and City -->
                <div class="form-row">
                    <div class="form-group half">
                        <label for="barangay">Barangay <span class="optional">(Optional)</span></label>
                        <input type="text" id="barangay" name="barangay" maxlength="100">
                        <div class="error-message" id="barangayError"></div>
                    </div>

                    <div class="form-group half">
                        <label for="city">City / Municipality *</label>
                        <input type="text" id="city" name="city" required maxlength="100">
                        <div class="error-message" id="cityError"></div>
                    </div>
                </div>

                <!-- Province and Region -->
                <div class="form-row">
                    <div class="form-group half">
                        <label for="province">Province <span class="optional">(Optional)</span></label>
                        <input type="text" id="province" name="province" maxlength="100">
                        <div class="error-message" id="provinceError"></div>
                    </div>

                    <div class="form-group half">
                        <label for="region">Region <span class="optional">(Optional)</span></label>
                        <input type="text" id="region" name="region" maxlength="100">
                        <div class="error-message" id="regionError"></div>
                    </div>
                </div>

                <!-- Postal Code and Country -->
                <div class="form-row">
                    <div class="form-group half">
                        <label for="postal_code">Postal Code *</label>
                        <input type="text" id="postal_code" name="postal_code" required maxlength="10"
                            pattern="[0-9]{4,10}" inputmode="numeric">
                        <div class="error-message" id="postalCodeError"></div>
                    </div>

                    <div class="form-group half">
                        <label for="country">Country *</label>
                        <select id="country" name="country" required>
                            <option value="Philippines">Philippines</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="error-message" id="countryError"></div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" id="cancelModalBtn">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveAddressBtn">Save Address</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/trash.svg" alt="Delete">
            </div>
            <h3 class="modal-title">Delete Address</h3>
            <p class="modal-message">Are you sure you want to delete this address? This action cannot be undone.</p>
            <div class="modal-actions">
                <button class="btn btn-secondary" id="cancelDeleteBtn">Cancel</button>
                <button class="btn btn-primary" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>

    <!-- Main Address Warning Modal -->
    <div id="mainAddressModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/info-empty.svg" alt="Warning">
            </div>
            <h3 class="modal-title">Cannot Delete Main Address</h3>
            <p class="modal-message">This is your main address and cannot be deleted. You can edit it if needed, but it
                must remain as your primary address.</p>
            <div class="modal-actions">
                <button class="btn btn-primary" id="mainAddressOkBtn">OK</button>
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
                <button class="btn btn-primary" id="notificationCloseBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/address-list.js"></script>
</body>

</html>