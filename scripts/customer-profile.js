// customer-profile.js

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // DOM Elements
    const editBtn = document.getElementById('editCancelBtn');
    const saveBtn = document.getElementById('saveProfileBtn');
    const profileForm = document.getElementById('profileForm');
    const editableInputs = profileForm.querySelectorAll('input:not([type="hidden"]):not([disabled]), select, textarea');
    const profilePicUpload = document.getElementById('profilePictureUpload');
    const profilePicInput = document.getElementById('profile_picture');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const profilePicPreview = document.getElementById('profilePicturePreview');
    const modal = document.getElementById('feedbackModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalClose = document.getElementById('modalCloseBtn');

    // State
    let isEditMode = false;
    let originalValues = {};
    let pictureChanged = false;

    // Modal functions
    function showModal(message) {
        modalMessage.textContent = message;
        modal.style.display = 'flex';
    }

    function hideModal() {
        modal.style.display = 'none';
    }

    modalClose.addEventListener('click', hideModal);
    window.addEventListener('click', function(e) {
        if (e.target === modal) hideModal();
    });

    // Store original values
    function storeOriginalValues() {
        originalValues = {};
        editableInputs.forEach(input => {
            originalValues[input.id] = input.value;
        });
        if (profilePicPreview) {
            originalValues.profile_picture = profilePicPreview.src;
        }
    }

    // Enable edit mode
    function enableEditMode() {
        isEditMode = true;
        editBtn.textContent = 'Cancel';
        saveBtn.disabled = false;
        profilePicUpload.style.display = 'block';
        document.querySelectorAll('.personal-info-column input, .personal-info-column select, .shipping-info-column textarea').forEach(field => {
            field.disabled = false;
        });
        pictureChanged = false;
    }

    // Disable edit mode
    function disableEditMode(restore = true) {
        isEditMode = false;
        editBtn.textContent = 'Edit';
        saveBtn.disabled = true;
        profilePicUpload.style.display = 'none';
        profilePicInput.value = '';
        fileNameDisplay.textContent = '';
        document.querySelectorAll('.personal-info-column input, .personal-info-column select, .shipping-info-column textarea').forEach(field => {
            field.disabled = true;
        });
        
        if (restore) {
            for (let id in originalValues) {
                const field = document.getElementById(id);
                if (field) {
                    field.value = originalValues[id];
                }
            }
            if (originalValues.profile_picture) {
                profilePicPreview.src = originalValues.profile_picture;
            }
        }
        pictureChanged = false;
    }

    // File input change
    profilePicInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            fileNameDisplay.textContent = file.name;
            pictureChanged = true;
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            fileNameDisplay.textContent = '';
            pictureChanged = false;
        }
    });

    // Edit/Cancel button
    editBtn.addEventListener('click', function() {
        if (!isEditMode) {
            storeOriginalValues();
            enableEditMode();
        } else {
            disableEditMode(true);
        }
    });

    // Save button
    saveBtn.addEventListener('click', async function() {
        // Validation
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const address = document.getElementById('address').value.trim();

        if (!firstName || !lastName || !address) {
            showModal('First name, last name, and address are required.');
            return;
        }

        // Disable button
        saveBtn.disabled = true;
        const originalText = saveBtn.textContent;
        saveBtn.textContent = 'Saving...';

        const formData = new FormData(profileForm);

        try {
            const response = await fetch('../database/customer-profile-handler.php', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();

            if (result.status === 'success') {
                showModal('Profile updated successfully!');
                
                if (pictureChanged) {
                    // Refresh page after 2 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    disableEditMode(false);
                }
            } else {
                showModal(result.message || 'Update failed. Please try again.');
                saveBtn.disabled = false;
            }
        } catch (error) {
            console.error('Error saving profile:', error);
            showModal('Network error. Please check your connection and try again.');
            saveBtn.disabled = false;
        } finally {
            saveBtn.textContent = originalText;
        }
    });

    // Initial store
    storeOriginalValues();
});