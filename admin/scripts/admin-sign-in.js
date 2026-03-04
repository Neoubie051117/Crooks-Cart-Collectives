document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signinForm');
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    const identifierInput = document.getElementById('identifier');
    const passwordInput = document.getElementById('password');
    const identifierError = document.getElementById('identifierError');
    const passwordError = document.getElementById('passwordError');
    const togglePassword = document.getElementById('togglePassword');
    const passwordIcon = document.getElementById('passwordIcon');

    let isModalOpen = false;
    let isSubmitting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
    if (togglePassword && passwordInput && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }

    // ============= NOTIFIER FUNCTIONS =============
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

    // ============= MODAL EVENT LISTENERS =============
    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= BLUR VALIDATION =============
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

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (isSubmitting) return;

        clearErrors();

        // Client-side validation
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

        // Show loading state
        isSubmitting = true;
        const submitBtn = form.querySelector('.btn-primary');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Signing In...';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(form);
            
            // Log what we're sending (for debugging)
            console.log('Sending identifier:', identifierInput.value.trim());

            const response = await fetch('../database/admin-sign-in-handler.php', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            const result = await response.json();
            console.log('Server response:', result);

            if (result.status === 'success') {
                showNotifier('Login successful! Redirecting...');
                
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 1500);
            } else {
                // Handle specific error messages
                if (result.message === 'invalid-credentials') {
                    showNotifier('Invalid email/username or password. Please try again.');
                    identifierInput.classList.add('error');
                    passwordInput.classList.add('error');
                } else if (result.message === 'All fields are required') {
                    showNotifier('Please fill in all fields.');
                } else {
                    showNotifier(result.message || 'Login failed. Please try again.');
                }
            }
        } catch (error) {
            console.error('Login error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            // Reset button state
            isSubmitting = false;
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });

    // Focus on identifier field
    setTimeout(() => {
        identifierInput.focus();
    }, 100);
});