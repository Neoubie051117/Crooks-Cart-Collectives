/* JavaScript File Content */
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signupForm');
    const clearButton = document.getElementById('clearForm');
    const submitButton = form.querySelector('.btn-primary');
    
    const modal = document.getElementById('notifierModal');
    const modalMessage = document.getElementById('notifierMessage');
    const modalClose = document.getElementById('notifierCloseBtn');
    
    const emailField = document.getElementById('email');
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    const contactField = document.getElementById('contact_number');
    const birthdateField = document.getElementById('birthdate');
    const addressField = document.getElementById('address');
    
    // Password toggle elements
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');
    
    let isModalOpen = false;
    let isSubmitting = false;

    // ============= PASSWORD TOGGLE FUNCTIONALITY =============
    if (togglePassword && passwordField && passwordIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            if (type === 'text') {
                passwordIcon.src = '../assets/image/icons/password-unhide.svg';
                passwordIcon.alt = 'Show password';
            } else {
                passwordIcon.src = '../assets/image/icons/password-hide.svg';
                passwordIcon.alt = 'Hide password';
            }
        });
    }
    
    if (toggleConfirmPassword && confirmPasswordField && confirmPasswordIcon) {
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            
            if (type === 'text') {
                confirmPasswordIcon.src = '../assets/image/icons/password-unhide.svg';
                confirmPasswordIcon.alt = 'Show password';
            } else {
                confirmPasswordIcon.src = '../assets/image/icons/password-hide.svg';
                confirmPasswordIcon.alt = 'Hide password';
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

    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    // ============= VALIDATION FUNCTIONS =============
    function highlightField(field, highlight = true) {
        if (!field) return;
        if (highlight) {
            field.style.borderColor = 'red';
            field.style.boxShadow = '0 0 5px rgba(255, 0, 0, 0.5)';
        } else {
            field.style.borderColor = '';
            field.style.boxShadow = '';
        }
    }

    function resetHighlights() {
        form.querySelectorAll('input, select, textarea').forEach(field => highlightField(field, false));
    }

    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/[^0-9+]/g, '');
        return /^(09|\+639|639)\d{9}$/.test(cleaned) || /^0\d{10}$/.test(cleaned);
    }

    function calculateAge(birthdate) {
        const birthDate = new Date(birthdate);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function validatePassword(password) {
        if (password.length < 8) {
            return { valid: false, message: 'Password must be at least 8 characters long.' };
        }
        if (password.length > 16) {
            return { valid: false, message: 'Password cannot exceed 16 characters.' };
        }
        if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
            return { valid: false, message: 'Password must contain both uppercase and lowercase letters.' };
        }
        if (!/[0-9]/.test(password)) {
            return { valid: false, message: 'Password must contain number.' };
        }
        return { valid: true, message: '' };
    }

    function validateUsername(username) {
        if (username.length < 2) {
            return { valid: false, message: 'Username must be at least 2 characters long.' };
        }
        if (username.length > 15) {
            return { valid: false, message: 'Username cannot exceed 15 characters.' };
        }
        return { valid: true, message: '' };
    }

    // ============= REAL-TIME VALIDATION (for visual feedback only) =============
    passwordField.addEventListener('input', () => {
        highlightField(passwordField, false);
    });

    confirmPasswordField.addEventListener('input', () => {
        highlightField(confirmPasswordField, false);
    });

    usernameField.addEventListener('input', () => {
        highlightField(usernameField, false);
    });

    // ============= PHONE NUMBER FORMATTING =============
    contactField.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        
        if (value.startsWith('63') && value.length === 12) {
            e.target.value = '+63' + value.substring(2);
        } else if (value.startsWith('09') && value.length === 11) {
            e.target.value = value.replace(/(\d{4})(\d{3})(\d{4})/, '$1 $2 $3');
        } else if (value.startsWith('9') && value.length === 10) {
            e.target.value = '09' + value.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3');
        }
    });

    // ============= FORM SUBMISSION =============
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        // Validate required fields
        const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;
        let missing = [];
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                highlightField(field);
                missing.push(field.name || field.id);
                isValid = false;
            }
        });
        
        if (!isValid) {
            if (missing.length === 1) {
                showNotifier(`Please fill in the ${missing[0].replace(/_/g, ' ')} field.`);
            } else {
                showNotifier('Please fill in all required fields.');
            }
            return;
        }
        
        // Validate email
        if (!isEmailValid(emailField.value)) {
            highlightField(emailField);
            showNotifier('Please enter a valid email address.');
            return;
        }
        
        // Validate phone
        if (!isPhoneValid(contactField.value)) {
            highlightField(contactField);
            showNotifier('Please enter a valid Philippine phone number (e.g., 09123456789).');
            return;
        }
        
        // Validate username
        const usernameValidation = validateUsername(usernameField.value);
        if (!usernameValidation.valid) {
            highlightField(usernameField);
            showNotifier(usernameValidation.message);
            return;
        }
        
        // Validate password
        const passwordValidation = validatePassword(passwordField.value);
        if (!passwordValidation.valid) {
            highlightField(passwordField);
            showNotifier(passwordValidation.message);
            return;
        }
        
        // Check if passwords match
        if (passwordField.value !== confirmPasswordField.value) {
            highlightField(passwordField);
            highlightField(confirmPasswordField);
            showNotifier('Passwords do not match.');
            return;
        }
        
        // Validate age
        if (birthdateField.value) {
            const age = calculateAge(birthdateField.value);
            if (age < 13) {
                highlightField(birthdateField);
                showNotifier('You must be at least 13 years old to register.');
                return;
            } else if (age > 120) {
                highlightField(birthdateField);
                showNotifier('Please enter a valid birthdate.');
                return;
            }
        }
        
        // Validate address
        if (addressField.value.length < 5) {
            highlightField(addressField);
            showNotifier('Please enter a valid address.');
            return;
        }
        
        // Show loading state
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        try {
            const formData = new FormData(form);

            const response = await fetch('../database/sign-up-handler.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                const delayTime = result.delay || 5000;
                showNotifier(result.message || 'Account created successfully! Please sign in.');
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, delayTime);
            } else {
                // Log the actual error for debugging
                console.error('Signup error details:', result);
                
                // Handle specific error messages
                if (result.message === 'duplicate-email') {
                    highlightField(emailField);
                    showNotifier('Email already exists. Please use a different email.');
                } else if (result.message === 'username-unavailable') {
                    highlightField(usernameField);
                    showNotifier('Username unavailable. Please choose a different username.');
                } else if (result.message === 'duplicate-contact') {
                    highlightField(contactField);
                    showNotifier('Phone number already registered. Please use a different number.');
                } else if (result.message === 'username-too-short') {
                    highlightField(usernameField);
                    showNotifier('Username must be at least 2 characters long.');
                } else if (result.message === 'username-too-long') {
                    highlightField(usernameField);
                    showNotifier('Username cannot exceed 15 characters.');
                } else if (result.message === 'password-too-short') {
                    highlightField(passwordField);
                    showNotifier('Password must be at least 8 characters long.');
                } else if (result.message === 'password-too-long') {
                    highlightField(passwordField);
                    showNotifier('Password cannot exceed 16 characters.');
                } else if (result.message === 'password-needs-mixed-case') {
                    highlightField(passwordField);
                    showNotifier('Password must contain both uppercase and lowercase letters.');
                } else if (result.message === 'password-needs-number') {
                    highlightField(passwordField);
                    showNotifier('Password must contain number.');
                } else if (result.message === 'passwords-mismatch') {
                    highlightField(passwordField);
                    highlightField(confirmPasswordField);
                    showNotifier('Passwords do not match.');
                } else if (result.message === 'invalid-email') {
                    highlightField(emailField);
                    showNotifier('Please enter a valid email address.');
                } else if (result.message === 'invalid-contact') {
                    highlightField(contactField);
                    showNotifier('Please enter a valid Philippine phone number.');
                } else if (result.message === 'underage') {
                    highlightField(birthdateField);
                    showNotifier('You must be at least 13 years old to register.');
                } else if (result.message === 'invalid-age') {
                    highlightField(birthdateField);
                    showNotifier('Please enter a valid birthdate.');
                } else if (result.message === 'missing-field') {
                    const field = result.field || '';
                    if (field) {
                        const fieldElement = document.getElementById(field);
                        if (fieldElement) highlightField(fieldElement);
                    }
                    showNotifier('Please fill in all required fields.');
                } else {
                    showNotifier('Oops! There was a problem creating your account. Please try again.');
                }
            }
        } catch (error) {
            console.error('Signup error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            // Reset button state
            isSubmitting = false;
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }
    });

    // ============= CLEAR FORM =============
    if (clearButton) {
        clearButton.addEventListener('click', () => {
            form.reset();
            resetHighlights();
        });
    }
});