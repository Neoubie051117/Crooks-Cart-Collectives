<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <?php include_once('../pages/header.php'); ?>
    <?php require_once(__DIR__ . '/../database/database-connect.php'); ?>

    <!-- Styles -->
    <link rel="stylesheet" href="/Barangay-System/styles/header.css">
    <link rel="stylesheet" href="/Barangay-System/styles/sign-in.css">
    <link rel="stylesheet" href="/Barangay-System/styles/footer.css">
</head>

<body>


    <div class="content">
        <div class="pageTitleHeader">Account Log In</div>

        <form id="loginForm" class="section" method="POST" autocomplete="on"
            action="/Barangay-System/database/sign-in-handler.php">
            <!-- Username/Email -->
            <div class="group">
                <label for="usernameOrEmail">Username or Email</label>
                <input type="text" id="usernameOrEmail" name="usernameOrEmail" required autocomplete="username">
            </div>

            <!-- Password -->
            <div class="group">
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" required autocomplete="current-password">
            </div>

            <!-- Submit Button -->
            <div class="btn-container">
                <button type="submit" class="btn submit-btn">Log In</button>
            </div>

            <div id="notifierModal" class="notifier hidden">
                <div class="notifier-content">
                    <p id="notifierMessage"></p>
                    <button id="notifierCloseBtn" class="btn" type="button">OK</button>
                </div>
            </div>

            <!-- Sign Up Link -->
            <div class="sign-up-link-container">
                <p>
                    Don't have an account?
                    <a href="/Barangay-System/pages/sign-up.php" class="sign-up-colored-link">Sign Up</a>
                </p>
            </div>
        </form>
    </div>

    <?php include_once('../pages/footer.php'); ?>

    <!-- Scripts -->
    <script src="/Barangay-System/scripts/header.js"></script>
    <script src="/Barangay-System/scripts/sign-in.js"></script>
</body>

</html>