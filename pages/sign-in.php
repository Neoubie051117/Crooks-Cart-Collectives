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
                <input type="password" id="password" name="password" required autocomplete="current-password">
                <div class="error-message" id="passwordError"></div>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <p class="signup-link">
                Don't have an account? <a href="customer-sign-up.php">Sign Up</a>
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

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('signinForm');
        const modal = document.getElementById('notifierModal');
        const modalMessage = document.getElementById('notifierMessage');
        const modalClose = document.getElementById('notifierCloseBtn');
        const identifierInput = document.getElementById('identifier');
        const passwordInput = document.getElementById('password');
        const identifierError = document.getElementById('identifierError');
        const passwordError = document.getElementById('passwordError');

        let isModalOpen = false;
        let isSubmitting = false;

        function showNotifier(message) {
            if (isModalOpen) return;
            modalMessage.textContent = message;
            modal.classList.remove('hidden');
            isModalOpen = true;
        }

        function closeNotifier() {
            modal.classList.add('hidden');
            isModalOpen = false;
        }

        function clearErrors() {
            identifierError.textContent = '';
            passwordError.textContent = '';
            identifierInput.classList.remove('error');
            passwordInput.classList.remove('error');
        }

        function showFieldError(field, message) {
            const errorElement = field === 'identifier' ? identifierError : passwordError;
            const inputElement = field === 'identifier' ? identifierInput : passwordInput;

            errorElement.textContent = message;
            inputElement.classList.add('error');
        }

        modalClose.addEventListener('click', closeNotifier);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeNotifier();
        });

        identifierInput.addEventListener('blur', () => {
            if (!identifierInput.value.trim()) {
                showFieldError('identifier', 'Email or username is required');
            } else {
                identifierError.textContent = '';
                identifierInput.classList.remove('error');
            }
        });

        passwordInput.addEventListener('blur', () => {
            if (!passwordInput.value) {
                showFieldError('password', 'Password is required');
            } else {
                passwordError.textContent = '';
                passwordInput.classList.remove('error');
            }
        });

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            if (isSubmitting) return;

            clearErrors();

            let isValid = true;
            if (!identifierInput.value.trim()) {
                showFieldError('identifier', 'Email or username is required');
                isValid = false;
            }

            if (!passwordInput.value) {
                showFieldError('password', 'Password is required');
                isValid = false;
            }

            if (!isValid) {
                showNotifier('Please fix the errors above');
                return;
            }

            isSubmitting = true;
            const submitBtn = form.querySelector('.btn-primary');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Signing In...';
            submitBtn.disabled = true;

            try {
                const formData = new FormData(form);

                const response = await fetch('../database/auth-handler.php', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                });

                const responseText = await response.text();
                let result;

                try {
                    result = JSON.parse(responseText);
                } catch (parseError) {
                    console.error('JSON Parse Error:', responseText);
                    showNotifier('Server returned invalid response. Please try again.');
                    return;
                }

                if (result.status === 'success') {
                    showNotifier('Login successful! Redirecting...');

                    const urlParams = new URLSearchParams(window.location.search);
                    const redirectParam = urlParams.get('redirect');

                    let redirectUrl = result.redirect;
                    if (redirectParam) {
                        redirectUrl = redirectParam.startsWith('../') ? redirectParam.substring(2) :
                            redirectParam;
                    }

                    setTimeout(() => {
                        window.location.href = redirectUrl;
                    }, 1500);
                } else {
                    const errorMessages = {
                        'Invalid username or email': 'The email or username you entered is not registered.',
                        'Invalid password': 'The password you entered is incorrect.',
                        'All fields are required': 'Please fill in all required fields.'
                    };

                    const message = errorMessages[result.message] || result.message ||
                        'Login failed. Please try again.';
                    showNotifier(message);

                    if (result.message === 'Invalid username or email') {
                        showFieldError('identifier', 'Email or username not found');
                    } else if (result.message === 'Invalid password') {
                        showFieldError('password', 'Incorrect password');
                    }
                }
            } catch (error) {
                console.error('Login error:', error);
                showNotifier('Network error. Please check your connection and try again.');
            } finally {
                isSubmitting = false;
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });

        setTimeout(() => {
            identifierInput.focus();
        }, 100);
    });
    </script>
</body>

</html>