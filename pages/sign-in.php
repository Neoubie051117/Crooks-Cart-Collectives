<?php // PHP File Content ?>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        header('Location: admin-dashboard.php');
    } elseif (isset($_SESSION['is_seller']) && $_SESSION['is_seller'] && isset($_SESSION['seller_verified']) && $_SESSION['seller_verified']) {
        header('Location: seller-dashboard.php');
    } else {
        header('Location: customer-dashboard.php');
    }
    exit;
}

$redirect = $_GET['redirect'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sign-in.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    /* Password toggle styles */
    .password-wrapper {
        position: relative;
        width: 100%;
    }

    .password-wrapper input {
        width: 100%;
        padding-right: 40px;
    }

    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: none;
        border: none;
        padding: 0;
    }

    .password-toggle img {
        width: 20px;
        height: 20px;
        opacity: 0.6;
        transition: opacity 0.3s;
    }

    .password-toggle:hover img {
        opacity: 1;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">Sign In to Your Account</div>

        <form id="signinForm" class="signin-container" method="POST">
            <input type="hidden" name="action" value="signin">

            <?php if (!empty($redirect)): ?>
            <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($redirect); ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="identifier">Email or Username*</label>
                <input type="text" id="identifier" name="identifier" required autocomplete="username">
                <div class="error-message" id="identifierError"></div>
            </div>

            <div class="form-group">
                <label for="password">Password*</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                    <button type="button" class="password-toggle" id="togglePassword" tabindex="-1"
                        aria-label="Toggle password visibility">
                        <img src="../assets/image/icons/password-hide.svg" alt="Hide password" id="passwordIcon">
                    </button>
                </div>
                <div class="error-message" id="passwordError"></div>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <p class="signup-link">
                Don't have an account? <a href="sign-up.php">Sign Up</a>
            </p>

            <p class="forgot-password-link">
                <a href="forgot-password.php">Forgot your password?</a>
            </p>
        </form>
    </div>

    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/sign-in.js"></script>
</body>

</html>