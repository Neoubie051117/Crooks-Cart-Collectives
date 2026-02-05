<?php
// Start session and define path prefix
$pathPrefix = '../';
echo "<!-- PHP is working -->";

// Include header AFTER setting path prefix
include_once('header.php');

// Check database connection (but DON'T include the handler)
$dbConnected = false;
if (file_exists(__DIR__ . '/../database/database-connect.php')) {
    require_once(__DIR__ . '/../database/database-connect.php');
    $dbConnected = ($connection !== null);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Log In</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/header.css">
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/sign-up.css"> <!-- Using sign-up.css for now -->
    <link rel="stylesheet" href="<?php echo $pathPrefix; ?>styles/footer.css">

    <!-- Scripts (with defer) -->
    <script defer src="<?php echo $pathPrefix; ?>scripts/header.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/central-link-navigation.js"></script>
    <script defer src="<?php echo $pathPrefix; ?>scripts/sign-in.js"></script>

</head>

<body>

    <div class="content">
        <div class="pageTitleHeader">Account Log In</div>

        <!-- Database Warning -->
        <?php if (!$dbConnected): ?>
        <div class="db-warning"
            style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; margin: 20px 0; border-radius: 5px; text-align: center;">
            Database is currently unavailable. You can view the page, but login functionality is disabled.
        </div>
        <?php endif; ?>

        <form id="loginForm" class="container" method="POST" autocomplete="on"
            action="<?php echo $dbConnected ? $pathPrefix . 'database/sign-in-handler.php' : '#'; ?>">

            <div class="section">
                <div class="section-title">Account Details</div>

                <!-- Username/Email -->
                <div class="group">
                    <label for="usernameOrEmail">Username or Email</label>
                    <input type="text" id="usernameOrEmail" name="usernameOrEmail" required
                        placeholder="Enter your username or email" autocomplete="username"
                        <?php echo !$dbConnected ? 'disabled' : ''; ?>>
                </div>

                <!-- Password -->
                <div class="group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="loginPassword" required
                        placeholder="Enter your password" autocomplete="current-password"
                        <?php echo !$dbConnected ? 'disabled' : ''; ?>>
                </div>

                <!-- Submit Button -->
                <div class="btn-container">
                    <button type="submit" class="btn submit-btn" <?php echo !$dbConnected ? 'disabled' : ''; ?>>
                        <?php echo $dbConnected ? 'Log In' : 'Database Offline'; ?>
                    </button>
                </div>
            </div>
        </form>

        <!-- Notifier Modal -->
        <div id="notifierModal" class="notifier hidden">
            <div class="notifier-content">
                <p id="notifierMessage"></p>
                <button id="notifierCloseBtn" class="btn" type="button">OK</button>
            </div>
        </div>

        <!-- Sign Up Link -->
        <div class="sign-in-link-container">
            <p style="text-align:center; margin-top: 20px;">
                Don't have an account?
                <a href="./sign-up.php" class="log-in-colored-link" onclick="return navigateToSignUp(event)">Sign Up</a>
            </p>
        </div>

        <script>
        function navigateToSignUp(e) {
            e.preventDefault();
            window.location.href = "./sign-up.php";
            return false;
        }
        </script>
    </div>

    <?php include_once('footer.php'); ?>

</body>

</html>