document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editCancelBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const profileForm = document.getElementById('profileForm');
    const profileActions = document.getElementById('profileActions');
    
    // Get editable inputs in Personal Info card
    const editableInputs = document.querySelectorAll('.personal-info-card input:not([type="hidden"])');
    
    // Profile picture elements
    const profilePicInput = document.getElementById('profile_picture');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    
    // Modal elements
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const contactInput = document.getElementById('contact_number');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // ===== PHONE NUMBER FORMATTING =====
    function formatPhilippineNumber(input) {
        let value = input.value.replace(/\D/g, '');
        
        if (value.startsWith('09') && value.length <= 11) {
            if (value.length > 4) {
                let formatted = value.substring(0, 4) + ' ' + value.substring(4, 7);
                if (value.length > 7) {
                    formatted += ' ' + value.substring(7, 11);
                }
                input.value = formatted;
            } else {
                input.value = value;
            }
        } else {
            // Remove non-digits for other formats
            input.value = value;
        }
    }

    function isPhoneValid(phone) {
        const cleaned = phone.replace(/\D/g, '');
        return (cleaned.length === 11 && cleaned.startsWith('09'));
    }

    // ===== MODAL FUNCTIONS =====
    function showModal(message, isError = false) {
        modalMessage.textContent = message;
        const modalIcon = document.querySelector('.modal-icon');
        if (modalIcon) {
            modalIcon.className = 'modal-icon ' + (isError ? 'error-icon' : 'success-icon');
            modalIcon.innerHTML = isError 
                ? '<img src="../assets/image/icons/error.svg" alt="Error">'
                : '<img src="../assets/image/icons/check-circle.svg" alt="Success">';
        }
        modal.style.display = 'flex';
    }

    function hideModal() {
        modal.style.display = 'none';
    }

    if (modalClose) {
        modalClose.addEventListener('click', hideModal);
    }
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
    });

    // ===== STORE ORIGINAL VALUES =====
    function storeOriginalValues() {
        originalValues = {};
        editableInputs.forEach(input => {
            if (input.id) {
                originalValues[input.id] = input.value;
            }
        });
        if (profilePicPreview) {
            originalValues.profile_picture = profilePicPreview.src;
        }
    }

    // ===== ENABLE EDIT MODE =====
    function enableEditMode() {
        isEditMode = true;
        editBtn.style.display = 'none';
        profileActions.style.display = 'block';
        
        // Enable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        
        pictureChanged = false;
    }

    // ===== DISABLE EDIT MODE =====
    function disableEditMode(restore = true) {
        isEditMode = false;
        editBtn.style.display = 'flex';
        profileActions.style.display = 'none';
        
        // Disable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
        // Clear file input and filename
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (fileNameDisplay) {
            fileNameDisplay.style.display = 'none';
            fileNameDisplay.textContent = '';
        }
        
        // Restore original values if needed
        if (restore) {
            for (let id in originalValues) {
                const field = document.getElementById(id);
                if (field) {
                    field.value = originalValues[id];
                }
            }
            if (originalValues.profile_picture && profilePicPreview) {
                profilePicPreview.src = originalValues.profile_picture;
            }
        }
        
        pictureChanged = false;
    }

    // ===== PROFILE PICTURE HANDLING =====
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    showModal('File size must be less than 2MB', true);
                    this.value = '';
                    return;
                }
                
                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    showModal('Please upload a valid image (JPG, PNG, GIF)', true);
                    this.value = '';
                    return;
                }
                
                fileNameDisplay.style.display = 'block';
                fileNameDisplay.textContent = file.name;
                pictureChanged = true;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (profilePicPreview) {
                        profilePicPreview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.style.display = 'none';
                fileNameDisplay.textContent = '';
                pictureChanged = false;
            }
        });
    }

    // ===== PHONE NUMBER INPUT HANDLING =====
    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode) {
                formatPhilippineNumber(this);
            }
        });
        
        contactInput.addEventListener('blur', function() {
            if (isEditMode && this.value && !isPhoneValid(this.value)) {
                this.style.borderColor = '#FF8246';
                document.getElementById('contactError').textContent = 'Please enter a valid Philippine mobile number (09XXXXXXXXX)';
                document.getElementById('contactError').style.display = 'block';
            } else {
                this.style.borderColor = '';
                document.getElementById('contactError').textContent = '';
                document.getElementById('contactError').style.display = 'none';
            }
        });
    }

    // ===== EDIT BUTTON CLICK =====
    if (editBtn) {
        editBtn.addEventListener('click', function() {
            storeOriginalValues();
            enableEditMode();
        });
    }

    // ===== CANCEL EDIT BUTTON =====
    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', function() {
            disableEditMode(true);
        });
    }

    // ===== SAVE BUTTON CLICK =====
    if (saveBtn) {
        saveBtn.addEventListener('click', async function() {
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.textContent = '';
                el.style.display = 'none';
            });
            
            // Validation
            const firstName = firstNameInput ? firstNameInput.value.trim() : '';
            const lastName = lastNameInput ? lastNameInput.value.trim() : '';
            const contact = contactInput ? contactInput.value.trim() : '';

            let isValid = true;

            if (!firstName) {
                document.getElementById('firstNameError').textContent = 'First name is required';
                document.getElementById('firstNameError').style.display = 'block';
                firstNameInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!lastName) {
                document.getElementById('lastNameError').textContent = 'Last name is required';
                document.getElementById('lastNameError').style.display = 'block';
                lastNameInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!contact) {
                document.getElementById('contactError').textContent = 'Contact number is required';
                document.getElementById('contactError').style.display = 'block';
                contactInput.style.borderColor = '#FF8246';
                isValid = false;
            } else if (!isPhoneValid(contact)) {
                document.getElementById('contactError').textContent = 'Please enter a valid Philippine mobile number (e.g., 09123456789)';
                document.getElementById('contactError').style.display = 'block';
                contactInput.style.borderColor = '#FF8246';
                isValid = false;
            }

            if (!isValid) {
                showModal('Please fix the errors before saving', true);
                return;
            }

            // Disable button and show loading state
            saveBtn.disabled = true;
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';

            const formData = new FormData(profileForm);

            try {
                const response = await fetch('../database/admin-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                if (result.status === 'success') {
                    showModal('Profile updated successfully!');
                    
                    setTimeout(() => {
                        // Update the displayed full name
                        const nameElement = document.querySelector('.profile-full-name');
                        if (nameElement && result.data) {
                            nameElement.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                        }
                        
                        storeOriginalValues();
                        disableEditMode(false);
                        saveBtn.textContent = originalText;
                        
                        // If picture changed, reload to update header
                        if (pictureChanged) {
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    }, 1500);
                    
                } else {
                    showModal(result.message || 'Update failed. Please try again.', true);
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.', true);
                saveBtn.disabled = false;
                saveBtn.textContent = originalText;
            }
        });
    }

    // ===== INPUT ERROR CLEARING =====
    if (firstNameInput) {
        firstNameInput.addEventListener('input', function() {
            this.style.borderColor = '';
            document.getElementById('firstNameError').textContent = '';
            document.getElementById('firstNameError').style.display = 'none';
        });
    }

    if (lastNameInput) {
        lastNameInput.addEventListener('input', function() {
            this.style.borderColor = '';
            document.getElementById('lastNameError').textContent = '';
            document.getElementById('lastNameError').style.display = 'none';
        });
    }

    if (contactInput) {
        contactInput.addEventListener('input', function() {
            this.style.borderColor = '';
            document.getElementById('contactError').textContent = '';
            document.getElementById('contactError').style.display = 'none';
        });
    }

    // ===== KEYBOARD SHORTCUTS =====
    document.addEventListener('keydown', function(e) {
        // Escape key cancels edit mode
        if (e.key === 'Escape' && isEditMode) {
            disableEditMode(true);
        }
        
        // Ctrl+S or Cmd+S saves
        if ((e.ctrlKey || e.metaKey) && e.key === 's' && isEditMode) {
            e.preventDefault();
            if (!saveBtn.disabled) {
                saveBtn.click();
            }
        }
    });

    // ===== INITIAL STORE =====
    storeOriginalValues();
});