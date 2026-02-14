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

    modalClose.addEventListener('click', closeNotifier);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeNotifier();
    });

    function highlightField(field, highlight = true) {
        field.style.borderColor = highlight ? 'red' : '';
        field.style.boxShadow = highlight ? '0 0 5px red' : '';
    }

    function resetHighlights() {
        form.querySelectorAll('input, select, textarea').forEach(field => highlightField(field, false));
    }

    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/[^0-9+]/g, '');
        return /^(09|\+639|639)\d{9}$/.test(cleaned) || 
               /^9\d{9}$/.test(cleaned) ||
               /^0\d{10}$/.test(cleaned);
    }

    function isUsernameValid(username) {
        return /^[a-zA-Z0-9_]{3,20}$/.test(username);
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

    function checkPasswordRequirements(password) {
        const requirements = {
            length: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password)
        };
        
        const allMet = Object.values(requirements).every(Boolean);
        
        if (password.length > 0 && !allMet) {
            const missingRequirements = [];
            if (!requirements.length) missingRequirements.push("at least 8 characters");
            if (!requirements.uppercase) missingRequirements.push("one uppercase letter");
            if (!requirements.lowercase) missingRequirements.push("one lowercase letter");
            if (!requirements.number) missingRequirements.push("one number");
            
            return {
                valid: false,
                message: `Password must contain: ${missingRequirements.join(", ")}`
            };
        }
        
        return { valid: allMet, message: "" };
    }

    function validateField(field) {
        resetHighlights();
        
        if (field.hasAttribute('required') && !field.value.trim()) {
            return false;
        }
        
        switch(field.id) {
            case 'email':
                if (field.value && !isEmailValid(field.value)) {
                    return false;
                }
                break;
                
            case 'contact_number':
                if (field.value && !isPhoneValid(field.value)) {
                    return false;
                }
                break;
                
            case 'username':
                if (field.value && !isUsernameValid(field.value)) {
                    return false;
                }
                break;
                
            case 'password':
                if (field.value) {
                    const result = checkPasswordRequirements(field.value);
                    if (!result.valid) {
                        return false;
                    }
                }
                break;
                
            case 'confirm_password':
                if (field.value && field.value !== passwordField.value) {
                    return false;
                }
                break;
                
            case 'birthdate':
                if (field.value) {
                    const age = calculateAge(field.value);
                    if (age < 13 || age > 120) {
                        return false;
                    }
                }
                break;
                
            case 'address':
                if (field.value && field.value.length < 10) {
                    return false;
                }
                break;
        }
        
        return true;
    }

    function formatFieldName(fieldId) {
        return fieldId
            .replace(/_/g, ' ')
            .replace(/([A-Z])/g, ' $1')
            .replace(/^\w/, c => c.toUpperCase())
            .trim();
    }

    form.querySelectorAll('input, select, textarea').forEach(field => {
        field.addEventListener('blur', () => {
            if (!validateField(field)) {
                highlightField(field);
            }
        });
        field.addEventListener('input', () => {
            if (field.classList.contains('error-highlight')) {
                highlightField(field, false);
            }
        });
    });

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

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        resetHighlights();
        
        const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;
        let message = '';
        let missing = [];
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                highlightField(field);
                missing.push(field.name || field.id);
                isValid = false;
            }
        });
        
        if (emailField.value && !isEmailValid(emailField.value)) {
            highlightField(emailField);
            message = 'Please enter a valid email address.';
            isValid = false;
        }
        
        if (contactField.value && !isPhoneValid(contactField.value)) {
            highlightField(contactField);
            message = 'Please enter a valid Philippine phone number (09XXXXXXXXX)';
            isValid = false;
        }
        
        if (usernameField.value && !isUsernameValid(usernameField.value)) {
            highlightField(usernameField);
            message = 'Username must be 3-20 characters (letters, numbers, underscore)';
            isValid = false;
        }
        
        const password = passwordField.value;
        const confirmPassword = confirmPasswordField.value;
        
        if (password) {
            const result = checkPasswordRequirements(password);
            if (!result.valid) {
                highlightField(passwordField);
                message = result.message;
                isValid = false;
            }
        }
        
        if (password && confirmPassword && password !== confirmPassword) {
            highlightField(passwordField);
            highlightField(confirmPasswordField);
            message = 'Passwords do not match.';
            isValid = false;
        }
        
        if (birthdateField.value) {
            const age = calculateAge(birthdateField.value);
            if (age < 13) {
                highlightField(birthdateField);
                message = 'You must be at least 13 years old to register.';
                isValid = false;
            } else if (age > 120) {
                highlightField(birthdateField);
                message = 'Please enter a valid birthdate.';
                isValid = false;
            }
        }
        
        if (addressField.value && addressField.value.length < 10) {
            highlightField(addressField);
            message = 'Please enter a complete address (minimum 10 characters).';
            isValid = false;
        }
        
        if (!isValid) {
            if (message) {
                showNotifier(message);
            } else if (missing.length === 1) {
                showNotifier(`Missing: ${formatFieldName(missing[0])}`);
            } else {
                showNotifier('Please complete all required fields.');
            }
            return;
        }
        
        isSubmitting = true;
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Creating Account...';
        submitButton.disabled = true;

        try {
            const formData = new FormData(form);

            const response = await fetch('../database/auth-handler.php', {
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
                if (result.message === 'duplicate-email duplicate-username') {
                    highlightField(emailField);
                    highlightField(usernameField);
                    showNotifier('Email and Username already exist.');
                } else if (result.message === 'duplicate-email') {
                    highlightField(emailField);
                    showNotifier('Email already exists.');
                } else if (result.message === 'duplicate-username') {
                    highlightField(usernameField);
                    showNotifier('Username already exists.');
                } else if (result.message === 'duplicate-contact') {
                    highlightField(contactField);
                    showNotifier('Phone number already registered.');
                } else if (result.message === 'password-requirements') {
                    highlightField(passwordField);
                    showNotifier('Password must contain: at least 8 characters, one uppercase letter, one lowercase letter, and one number.');
                } else if (result.message === 'underage') {
                    highlightField(birthdateField);
                    showNotifier('You must be at least 13 years old to register.');
                } else {
                    showNotifier(result.message || 'Registration failed. Please try again.');
                }
            }
        } catch (error) {
            console.error('Signup error:', error);
            showNotifier('Network error. Please check your connection and try again.');
        } finally {
            isSubmitting = false;
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }
    });

    clearButton.addEventListener('click', () => {
        form.reset();
        resetHighlights();
    });

    setTimeout(() => {
        form.querySelectorAll('input, select, textarea').forEach(field => {
            if (field.value && !validateField(field)) {
                highlightField(field);
            }
        });
    }, 100);
});