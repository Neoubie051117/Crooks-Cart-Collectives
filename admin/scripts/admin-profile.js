// Admin Profile JavaScript
// Handles edit mode, form validation, profile picture upload, and modal feedback

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    // ============= DOM ELEMENTS =============
    const editBtn = document.getElementById('editProfileBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
    const profileForm = document.getElementById('profileForm');

    // Action containers - editActions is the container for save/cancel buttons
    const editActions = document.getElementById('editActions');
    const profileActions = document.getElementById('profileActions'); // Container for the right side

    // Get editable inputs in Personal Info card
    const editableInputs = document.querySelectorAll('.personal-info-card input:not([type="hidden"])');

    // Profile picture elements
    const profilePicInput = document.getElementById('profile_picture');
    const profilePicTrigger = document.getElementById('profile_picture_trigger');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const profilePicUpload = document.getElementById('profilePictureUpload');

    // Modal elements
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // Form fields for validation
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const contactInput = document.getElementById('contact_number');

    // ============= STATE =============
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;
    let autoCloseTimer = null;

    // ============= PHONE NUMBER FORMATTING =============
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

    // ============= MODAL FUNCTIONS =============
    function showModal(message, isError = false) {
        // Clear any existing auto-close timer
        if (autoCloseTimer) {
            clearTimeout(autoCloseTimer);
            autoCloseTimer = null;
        }
        
        modalMessage.textContent = message;
        const modalIcon = document.querySelector('.modal-icon');
        if (modalIcon) {
            modalIcon.className = 'modal-icon ' + (isError ? 'error-icon' : 'success-icon');
            modalIcon.innerHTML = isError
                ? '<img src="../assets/image/icons/cancel.svg" alt="Error">'
                : '<img src="../assets/image/icons/info-empty.svg" alt="Success">';
        }
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // Auto-close after 5 seconds if user doesn't click
        autoCloseTimer = setTimeout(() => {
            hideModal();
        }, 5000);
    }

    function hideModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
        
        // Clear timer if exists
        if (autoCloseTimer) {
            clearTimeout(autoCloseTimer);
            autoCloseTimer = null;
        }
    }

    if (modalClose) {
        modalClose.addEventListener('click', hideModal);
    }

    window.addEventListener('click', function (e) {
        if (e.target === modal) hideModal();
    });

    // ============= STORE ORIGINAL VALUES =============
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

    // ============= ENABLE EDIT MODE =============
    function enableEditMode() {
        isEditMode = true;

        // Hide edit button in the right side, show action buttons
        if (editBtn) editBtn.style.display = 'none';
        if (editActions) editActions.style.display = 'flex';

        // Enable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = false;
        });

        // Show avatar edit overlay
        if (profilePicUpload) profilePicUpload.style.display = 'flex';

        pictureChanged = false;

        // Clear any existing validation highlights
        clearFieldHighlights();
    }

    // ============= DISABLE EDIT MODE =============
    function disableEditMode(restore = true) {
        isEditMode = false;

        // Show edit button in the right side, hide action buttons
        if (editBtn) editBtn.style.display = 'inline-flex';
        if (editActions) editActions.style.display = 'none';

        // Disable all editable inputs
        editableInputs.forEach(field => {
            field.disabled = true;
        });

        // Hide avatar edit overlay
        if (profilePicUpload) profilePicUpload.style.display = 'none';

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

        // Clear validation highlights
        clearFieldHighlights();
    }

    function clearFieldHighlights() {
        [firstNameInput, lastNameInput, contactInput].forEach(field => {
            if (field) {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
        });

        document.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
            el.style.display = 'none';
        });
    }

    // ============= PROFILE PICTURE HANDLING =============
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
            reader.onload = function (e) {
                if (profilePicPreview) {
                    profilePicPreview.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
            return true;
        }
        return false;
    }

    // Connect file input to handler
    if (profilePicInput) {
        profilePicInput.addEventListener('change', function () {
            if (this.files[0]) {
                handleProfilePictureSelect(this.files[0]);
            }
        });
    }

    if (profilePicTrigger) {
        profilePicTrigger.addEventListener('change', function () {
            if (this.files[0]) {
                // Sync the visible input with the trigger
                if (profilePicInput) {
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
        uploadPhotoBtn.addEventListener('click', function () {
            if (profilePicTrigger) {
                profilePicTrigger.click();
            } else if (profilePicInput) {
                profilePicInput.click();
            }
        });
    }

    // Hide avatar edit overlay by default
    if (profilePicUpload) profilePicUpload.style.display = 'none';

    // ============= PHONE NUMBER INPUT HANDLING =============
    if (contactInput) {
        contactInput.addEventListener('input', function () {
            if (isEditMode) {
                formatPhilippineNumber(this);
                // Enable save button when changes are made
                if (saveBtn) saveBtn.disabled = false;
            }
        });

        contactInput.addEventListener('blur', function () {
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

    // ============= EDIT BUTTON CLICK =============
    if (editBtn) {
        editBtn.addEventListener('click', function () {
            storeOriginalValues();
            enableEditMode();
        });
    }

    // ============= CANCEL EDIT BUTTON =============
    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', function () {
            disableEditMode(true);
        });
    }

    // ============= INPUT CHANGE HANDLERS - Enable save button =============
    if (firstNameInput) {
        firstNameInput.addEventListener('input', function () {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('firstNameError').textContent = '';
            document.getElementById('firstNameError').style.display = 'none';
        });
    }

    if (lastNameInput) {
        lastNameInput.addEventListener('input', function () {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
            this.style.borderColor = '';
            document.getElementById('lastNameError').textContent = '';
            document.getElementById('lastNameError').style.display = 'none';
        });
    }

    if (contactInput) {
        contactInput.addEventListener('input', function () {
            if (isEditMode && saveBtn) saveBtn.disabled = false;
        });
    }

    // ============= SAVE BUTTON CLICK =============
    if (saveBtn) {
        saveBtn.addEventListener('click', async function () {

            // Clear previous errors
            clearFieldHighlights();

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

            // Log FormData contents for debugging (excluding file data)
            console.log('Submitting form with fields:');
            for (let pair of formData.entries()) {
                if (pair[0] !== 'profile_picture') {
                    console.log(pair[0] + ': ' + pair[1]);
                } else {
                    console.log('profile_picture: [FILE PRESENT]');
                }
            }

            try {
                // Set a timeout for the fetch request
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 30000); // 30 second timeout

                const response = await fetch('../database/admin-profile-handler.php', {
                    method: 'POST',
                    body: formData,
                    signal: controller.signal,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                clearTimeout(timeoutId);

                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers.get('content-type'));

                // Get response text first
                const responseText = await response.text();
                console.log('Raw response (first 200 chars):', responseText.substring(0, 200));

                // Check if response is OK
                if (!response.ok) {
                    // Try to parse error response as JSON
                    try {
                        const errorResult = JSON.parse(responseText);
                        throw new Error(errorResult.message || `Server error: ${response.status}`);
                    } catch (e) {
                        // If not JSON, use status text
                        throw new Error(`HTTP error ${response.status}: ${response.statusText}`);
                    }
                }

                // Try to parse JSON response
                let result;
                try {
                    result = JSON.parse(responseText);
                    console.log('Parsed JSON result:', result);
                } catch (parseError) {
                    console.error('JSON Parse Error:', parseError);
                    console.error('Raw response that failed:', responseText);

                    // Send error to server log
                    await fetch('../database/admin-profile-handler.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            action: 'client_error_log',
                            error: {
                                type: 'json_parse_error',
                                message: parseError.message,
                                response: responseText.substring(0, 1000)
                            }
                        })
                    });

                    throw new Error('Server returned invalid JSON response');
                }

                // Check if result has expected structure
                if (!result || typeof result !== 'object') {
                    // Send error to server log
                    await fetch('../database/admin-profile-handler.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            action: 'client_error_log',
                            error: {
                                type: 'invalid_response_format',
                                response: responseText.substring(0, 1000)
                            }
                        })
                    });

                    throw new Error('Server returned invalid response format');
                }

                if (result.status === 'success') {
                    console.log('Profile update successful');
                    showModal('Profile updated successfully!');

                    // Update UI after successful save
                    setTimeout(() => {
                        // Update the displayed full name
                        const nameElement = document.querySelector('.profile-full-name');
                        if (nameElement && result.data) {
                            nameElement.textContent = (result.data.first_name || '') + ' ' + (result.data.last_name || '');
                        }

                        // Update profile picture preview if URL is provided
                        if (result.profile_picture_url && profilePicPreview) {
                            console.log('Updating profile picture to:', result.profile_picture_url);
                            profilePicPreview.src = result.profile_picture_url;
                        }

                        // Store new original values
                        storeOriginalValues();

                        // Exit edit mode without restoring old values
                        disableEditMode(false);

                        // Restore button text
                        saveBtn.innerHTML = originalText;

                        // If picture changed, reload to update header
                        if (pictureChanged) {
                            console.log('Picture changed, reloading page...');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    }, 1500);

                } else {
                    // Handle business logic error
                    console.error('Server returned error:', result);

                    // Send error to server log
                    await fetch('../database/admin-profile-handler.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            action: 'client_error_log',
                            error: {
                                type: 'business_logic_error',
                                message: result.message,
                                result: result
                            }
                        })
                    });

                    showModal(result.message || 'Update failed. Please try again.', true);
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = originalText;
                }

            } catch (error) {
                // Handle network errors, timeouts, and other exceptions
                console.error('Error saving profile:', error);
                console.error('Error name:', error.name);
                console.error('Error message:', error.message);

                // Send error to server log
                try {
                    await fetch('../database/admin-profile-handler.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            action: 'client_error_log',
                            error: {
                                type: error.name || 'network_error',
                                message: error.message,
                                stack: error.stack
                            }
                        })
                    });
                } catch (logError) {
                    console.error('Failed to send error to server log:', logError);
                }

                // Provide user-friendly error message
                let errorMessage = 'Network error. Please check your connection and try again.';

                if (error.name === 'AbortError') {
                    errorMessage = 'Request timed out. Please try again.';
                } else if (error.message.includes('Failed to fetch')) {
                    errorMessage = 'Cannot connect to server. Please check your internet connection.';
                } else if (error.message) {
                    errorMessage = error.message;
                }

                showModal(errorMessage, true);

                // Re-enable save button
                saveBtn.disabled = false;
                saveBtn.innerHTML = originalText;
            }
        });
    }

    // ============= KEYBOARD SHORTCUTS =============
    document.addEventListener('keydown', function (e) {
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

    // ============= INITIAL STORE =============
    storeOriginalValues();
});