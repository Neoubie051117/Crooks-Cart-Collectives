document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editProfileBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
    const profileForm = document.getElementById('profileForm');
    
    // Action containers
    const editButtonDiv = document.getElementById('editProfileBtn');
    const profileActionsDiv = document.getElementById('profileActions');
    
    // Get editable inputs in Personal Info card
    const editableInputs = document.querySelectorAll('.personal-info-card input:not([type="hidden"])');
    
    // Profile picture elements
    const profilePicInput = document.getElementById('profile_picture');
    const profilePicTrigger = document.getElementById('profile_picture_trigger');
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
                ? '<img src="../assets/image/icons/cancel.svg" alt="Error">'
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
        
        // Hide edit button, show action buttons
        if (editButtonDiv) editButtonDiv.style.display = 'none';
        if (profileActionsDiv) profileActionsDiv.style.display = 'flex';
        
        // Enable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = false;
        });
        
        // Show avatar edit overlay
        const avatarEdit = document.getElementById('profilePictureUpload');
        if (avatarEdit) avatarEdit.style.display = 'flex';
        
        pictureChanged = false;
    }

    // ===== DISABLE EDIT MODE =====
    function disableEditMode(restore = true) {
        isEditMode = false;
        
        // Show edit button, hide action buttons
        if (editButtonDiv) editButtonDiv.style.display = 'flex';
        if (profileActionsDiv) profileActionsDiv.style.display = 'none';
        
        // Disable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = true;
        });
        
        // Hide avatar edit overlay
        const avatarEdit = document.getElementById('profilePictureUpload');
        if (avatarEdit) avatarEdit.style.display = 'none';
        
        // Clear file input and filename
        if (profilePicInput) {
            profilePicInput.value = '';
        }
        if (profilePicTrigger) {
            profilePicTrigger.value = '';
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
        
        // Reset save button state
        if (saveBtn) saveBtn.disabled = true;
        pictureChanged = false;
    }

    // ===== PROFILE PICTURE HANDLING =====
    function handleProfilePictureSelect(file) {
        if (file) {
            // Validate file size (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                showModal('File size must be less than 2MB', true);
                return false;
            }
            
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                showModal('Please upload a valid image (JPG, PNG, GIF, WEBP)', true);
                return false;
            }
            
            fileNameDisplay.style.display = 'block';
            fileNameDisplay.textContent = 'New photo selected: ' + file.name;
            pictureChanged = true;
            
            // Enable save button if in edit mode
            if (saveBtn) saveBtn.disabled = false;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                if (profilePicPreview) {
                    profilePicPreview.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
            return true;
        }
        return false;
    }

    // Connect both file inputs to the same handler
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
            if (this.files[0]) {
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    if (profilePicTrigger) {
        profilePicTrigger.addEventListener('change', function() {
            if (this.files[0]) {
                // Sync the visible input with the trigger
                if (profilePicInput) {
                    // Create a DataTransfer to copy the file
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(this.files[0]);
                    profilePicInput.files = dataTransfer.files;
                }
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    // Upload photo button click handler
    if (uploadPhotoBtn) {
        uploadPhotoBtn.addEventListener('click', function() {
            if (profilePicTrigger) {
                profilePicTrigger.click();
            } else if (profilePicInput) {
                profilePicInput.click();
            }
        });
    }

    // Hide avatar edit overlay by default
    const avatarEdit = document.getElementById('profilePictureUpload');
    if (avatarEdit) avatarEdit.style.display = 'none';

    // ===== PHONE NUMBER INPUT HANDLING =====
    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode) {
                formatPhilippineNumber(this);
                // Enable save button when changes are made
                if (saveBtn) saveBtn.disabled = false;
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

    // ===== INPUT CHANGE HANDLERS - Enable save button =====
    if (firstNameInput) {
        firstNameInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('firstNameError').textContent = '';
            document.getElementById('firstNameError').style.display = 'none';
        });
    }

    if (lastNameInput) {
        lastNameInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('lastNameError').textContent = '';
            document.getElementById('lastNameError').style.display = 'none';
        });
    }

    if (contactInput) {
        contactInput.addEventListener('input', function() {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
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
            const originalText = saveBtn.innerHTML;
            saveBtn.innerHTML = '<span class="btn-text">Saving...</span>';

            const formData = new FormData(profileForm);

            try {
                // FIXED: Correct path to admin-profile-handler.php
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
                        saveBtn.innerHTML = originalText;
                        
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
                    saveBtn.innerHTML = originalText;
                }
            } catch (error) {
                console.error('Error saving profile:', error);
                showModal('Network error. Please check your connection and try again.', true);
                saveBtn.disabled = false;
                saveBtn.innerHTML = originalText;
            }
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
            if (saveBtn && !saveBtn.disabled) {
                saveBtn.click();
            }
        }
    });

    // ===== INITIAL STORE =====
    storeOriginalValues();
});