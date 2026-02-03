<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <!--Database Related PHP-->
    <?php include_once('header.php'); ?>
    <?php require_once(__DIR__ . '/../database/database-connect.php'); ?>
    <?php require_once(__DIR__ . '/../database/sign-up-handler.php'); ?>

    <!-- Header-related CSS and PHP -->
    <link rel="stylesheet" href="../styles/header.css">
    <script defer src="../scripts/header.js"></script>
    <script defer src="../scripts/central-link-navigation.js"></script>

    <!-- Sign Up (current page) CSS and JS -->
    <link rel="stylesheet" href="../styles/sign-up.css">
    <script defer src="../scripts/sign-up.js"></script>

    <!-- Footer-related CSS and PHP -->
    <link rel="stylesheet" href="../styles/footer.css">

</head>

<body>

    <div class="content">
        <div class="pageTitleHeader">Registration</div>

        <form id="signupForm" class="container" method="POST" enctype="multipart/form-data" autocomplete="on">

            <!-- Upload Proof of Residency -->
            <div class="section">
                <div class="section-title">Proof of Residency</div>

                <div class="group image-upload">
                    <img id="imageFormalPicturePreview" class="image-preview" src="../assets/Formal-Picture.png"
                        alt="Upload Formal Picture Preview">
                    <label for="imageFormalPictureUpload">Upload Formal Picture</label>
                    <input type="file" id="imageFormalPictureUpload" name="imageFormalPictureUpload" accept="image/*"
                        required autocomplete="off">
                </div>

                <div class="group image-upload">
                    <img id="imageResidencyProofPreview" class="image-preview" src="../assets/Valid-id-icon.png"
                        alt="Valid ID Preview">
                    <label for="imageResidencyProofUpload">Upload Proof of Residency</label>
                    <input type="file" id="imageResidencyProofUpload" name="imageResidencyProofUpload" accept="image/*"
                        required autocomplete="off">
                </div>
            </div>

            <!-- Personal Information -->
            <div class="section">
                <div class="section-title">Personal Information</div>

                <div class="group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required placeholder="Juan"
                        autocomplete="given-name">
                </div>

                <div class="group">
                    <label for="middleName">Middle Name</label>
                    <input type="text" id="middleName" name="middleName" placeholder="Santos (Optional)"
                        autocomplete="additional-name">
                </div>

                <div class="group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required placeholder="Dela Cruz"
                        autocomplete="family-name">
                </div>

                <div class="group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" required autocomplete="bday">
                </div>

                <div class="group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required autocomplete="sex">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <!-- Contact and Account Details -->
            <div class="section">
                <div class="section-title">Contact and Account Details</div>

                <div class="group">
                    <label for="contact">Contact Number</label>
                    <input type="text" id="contact" name="contact" required placeholder="0912 345 6789"
                        autocomplete="tel">
                </div>

                <div class="group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="example@mail.com"
                        autocomplete="email">
                </div>

                <div class="group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Do not use real name"
                        autocomplete="username">
                </div>

                <div class="group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password">
                </div>

                <div class="group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required
                        autocomplete="new-password">
                </div>
            </div>

            <!-- Address and Demographics -->
            <div class="section" id="bottom-section">
                <div class="section-title">Address and Demographics</div>

                <div class="group">
                    <label for="houseStreet">House/Lot No. & Street</label>
                    <input type="text" id="houseStreet" name="houseStreet" required placeholder="Sesame Street"
                        autocomplete="street-address">
                </div>

                <div class="group">
                    <label for="barangay">Barangay</label>
                    <select id="barangay" name="barangay" required autocomplete="off">
                        <option value="" disabled selected>Select Barangay</option>
                        <option value="San Andres">San Andres</option>
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="San Isidro">San Isidro</option>
                        <option value="San Juan">San Juan</option>
                        <option value="San Roque">San Roque</option>
                        <option value="Santa Rosa">Santa Rosa</option>
                        <option value="Santo Niño">Santo Niño</option>

                    </select>
                </div>

                <div class="group">
                    <label for="residentType">Resident Type</label>
                    <select id="residentType" name="residentType" required autocomplete="off">
                        <option value="" disabled selected>Select Type</option>
                        <option value="Owner">Owner</option>
                        <option value="Tenant">Tenant</option>
                    </select>
                </div>

                <div class="group">
                    <label for="civilStatus">Civil Status</label>
                    <select id="civilStatus" name="civilStatus" required autocomplete="off">
                        <option value="" disabled selected>Select</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>

                <div class="group">
                    <label for="nationality">Nationality</label>
                    <select id="nationality" name="nationality" required autocomplete="country-name">
                        <option value="" disabled selected>Select Nationality</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Foreigner">Foreigner</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="btn-container">
                    <button type="submit" class="btn submit-btn">Submit</button>
                    <button type="reset" class="btn clear-btn" id="clearForm">Reset</button>
                </div>
            </div>
        </form>


    </div>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn">OK</button>
        </div>
    </div>

    <div class="sign-in-link-container">
        <p style="text-align:center; margin-top: 20px;">
            Already have account?
            <a href="sign-in.php" class="log-in-colored-link">Log In</a>
        </p>
    </div>

    <?php include_once('footer.php'); ?>

</body>

</html>