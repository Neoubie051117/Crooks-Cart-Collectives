// Admin Seller Profile JavaScript
// Handles loading seller data, displaying documents, and verify/reject actions

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const sellerId = document.getElementById('sellerId')?.value;
    const loadingState = document.getElementById('loadingState');
    const errorState = document.getElementById('errorState');
    const errorMessage = document.getElementById('errorMessage');
    const sellerProfileContainer = document.getElementById('sellerProfileContainer');
    const profileActions = document.getElementById('profileActions');

    // Profile header elements
    const profileAvatar = document.getElementById('profileAvatar');
    const sellerFullName = document.getElementById('sellerFullName');
    const sellerBusinessName = document.getElementById('sellerBusinessName');
    const sellerStatus = document.getElementById('sellerStatus');

    // Document elements
    const identityPreview = document.getElementById('identityPreview');
    const identityStatus = document.getElementById('identityStatus');
    const identityLink = document.getElementById('identityLink');
    const idDocumentPreview = document.getElementById('idDocumentPreview');
    const idDocumentStatus = document.getElementById('idDocumentStatus');
    const idDocumentLink = document.getElementById('idDocumentLink');

    // Personal information fields
    const firstName = document.getElementById('first_name');
    const middleName = document.getElementById('middle_name');
    const lastName = document.getElementById('last_name');
    const birthdate = document.getElementById('birthdate');
    const gender = document.getElementById('gender');

    // Account information fields
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const contactNumber = document.getElementById('contactNumber');
    const address = document.getElementById('address');
    const businessName = document.getElementById('businessName');
    
    // New date fields
    const dateApplied = document.getElementById('dateApplied');
    const dateVerified = document.getElementById('dateVerified');
    const memberSince = document.getElementById('memberSince');

    // Modal elements
    const confirmationModal = document.getElementById('confirmationModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const modalCancelBtn = document.getElementById('modalCancelBtn');
    const modalConfirmBtn = document.getElementById('modalConfirmBtn');

    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationCloseBtn = document.getElementById('notificationCloseBtn');

    // ============= STATE =============
    let currentAction = null;
    let currentSellerId = sellerId;

    // ============= MODAL FUNCTIONS =============
    function showNotification(message, isError = false) {
        if (!notificationModal || !notificationMessage) return;
        notificationMessage.textContent = message;
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        if (!isError) {
            setTimeout(() => {
                hideNotification();
            }, 3000);
        }
    }

    function hideNotification() {
        if (!notificationModal) return;
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (notificationCloseBtn) {
        notificationCloseBtn.addEventListener('click', hideNotification);
    }

    function showConfirmationModal(title, message, action) {
        if (!confirmationModal || !modalTitle || !modalMessage) return;
        modalTitle.textContent = title;
        modalMessage.textContent = message;
        currentAction = action;
        confirmationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function hideConfirmationModal() {
        if (!confirmationModal) return;
        confirmationModal.style.display = 'none';
        document.body.style.overflow = '';
        currentAction = null;
    }

    if (modalCancelBtn) {
        modalCancelBtn.addEventListener('click', hideConfirmationModal);
    }

    // Close modals when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === confirmationModal) hideConfirmationModal();
        if (e.target === notificationModal) hideNotification();
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (confirmationModal.style.display === 'flex') hideConfirmationModal();
            if (notificationModal.style.display === 'flex') hideNotification();
        }
    });

    // ============= LOAD SELLER DATA =============
    async function loadSellerData() {
        if (!sellerId) {
            showError('No seller ID provided');
            return;
        }

        try {
            const response = await fetch(`../database/admin-seller-profile-handler.php?action=get_seller_details&seller_id=${sellerId}&t=${Date.now()}`);
            const result = await response.json();

            if (result.status === 'success' && result.data) {
                populateSellerData(result.data);
                loadingState.style.display = 'none';
                sellerProfileContainer.style.display = 'block';
            } else {
                showError(result.message || 'Failed to load seller data');
            }
        } catch (error) {
            console.error('Error loading seller:', error);
            showError('Network error. Please check your connection and try again.');
        }
    }

    function showError(message) {
        if (loadingState) loadingState.style.display = 'none';
        if (errorState) {
            errorState.style.display = 'flex';
            if (errorMessage) errorMessage.textContent = message;
        }
    }

    // ============= FIXED: Function to test if image loads =============
    function testImageLoad(url, callback) {
        const img = new Image();
        img.onload = function() {
            console.log('Image loaded successfully:', url);
            callback(true);
        };
        img.onerror = function() {
            console.log('Image failed to load:', url);
            callback(false);
        };
        img.src = url;
    }

    // ============= FIXED: Function to set document preview =============
    function setDocumentPreview(previewElement, statusElement, linkElement, url, label) {
        if (!previewElement) {
            console.error('Preview element not found for', label);
            return;
        }

        if (url) {
            console.log(`Setting ${label} preview with URL:`, url);
            
            // Test if image loads first
            testImageLoad(url, function(success) {
                if (success) {
                    // Set background image
                    previewElement.style.backgroundImage = `url('${url}')`;
                    previewElement.style.backgroundSize = 'cover';
                    previewElement.style.backgroundPosition = 'center';
                    previewElement.style.backgroundRepeat = 'no-repeat';
                    
                    // Add a class to indicate image is loaded
                    previewElement.classList.add('image-loaded');
                    
                    // Update status
                    if (statusElement) {
                        statusElement.textContent = 'Uploaded';
                    }
                    
                    // Update link
                    if (linkElement) {
                        linkElement.href = url;
                        linkElement.style.display = 'inline-block';
                        linkElement.onclick = function(e) {
                            e.preventDefault();
                            window.open(url, '_blank');
                        };
                    }
                    
                    console.log(`${label} preview set successfully`);
                } else {
                    // Image failed to load
                    previewElement.style.backgroundImage = 'none';
                    previewElement.classList.remove('image-loaded');
                    
                    if (statusElement) {
                        statusElement.textContent = 'Failed to load';
                    }
                    
                    if (linkElement) {
                        linkElement.style.display = 'none';
                    }
                    
                    console.error(`${label} image failed to load:`, url);
                }
            });
        } else {
            // No URL provided
            previewElement.style.backgroundImage = 'none';
            previewElement.classList.remove('image-loaded');
            
            if (statusElement) {
                statusElement.textContent = 'Not uploaded';
            }
            
            if (linkElement) {
                linkElement.style.display = 'none';
            }
            
            console.log(`No ${label} URL provided`);
        }
    }

    // ============= POPULATE SELLER DATA =============
    function populateSellerData(data) {
        console.log('Populating seller data:', data);
        
        // Profile header
        if (sellerFullName) sellerFullName.textContent = data.full_name || 'Unknown User';
        if (sellerBusinessName) sellerBusinessName.textContent = data.business_name || 'No Business Name';
        
        // Status badge
        if (sellerStatus) {
            sellerStatus.textContent = data.is_verified === 'pending' ? 'Pending' :
                                      data.is_verified === 'verified' ? 'Verified' : 'Rejected';
            sellerStatus.className = 'status-badge ' + 
                (data.is_verified === 'pending' ? 'pending' :
                 data.is_verified === 'verified' ? 'verified' : 'rejected');
        }

        // Profile avatar
        if (profileAvatar) {
            if (data.profile_picture_url) {
                console.log('Setting profile avatar URL:', data.profile_picture_url);
                profileAvatar.src = data.profile_picture_url;
                profileAvatar.onerror = function() {
                    console.log('Profile avatar failed to load, using fallback');
                    this.src = '../assets/image/icons/user-profile-circle.svg';
                    this.onerror = null;
                };
            } else {
                profileAvatar.src = '../assets/image/icons/user-profile-circle.svg';
            }
        }

        // ===== FIXED: Document previews =====
        // Identity document (Formal Picture)
        setDocumentPreview(
            identityPreview, 
            identityStatus, 
            identityLink, 
            data.identity_url, 
            'identity'
        );

        // ID Document (Valid ID)
        setDocumentPreview(
            idDocumentPreview, 
            idDocumentStatus, 
            idDocumentLink, 
            data.id_document_url, 
            'ID document'
        );

        // Personal Information fields
        if (firstName) firstName.value = data.first_name || '';
        if (middleName) middleName.value = data.middle_name || '';
        if (lastName) lastName.value = data.last_name || '';
        if (birthdate) birthdate.value = data.birthdate_formatted || data.birthdate || '';
        if (gender) gender.value = data.gender || '';

        // Account Information fields
        if (email) email.value = data.email || '';
        if (username) username.value = data.username || '';
        if (contactNumber) contactNumber.value = data.contact_number_formatted || data.contact_number || '';
        if (address) address.value = data.address || '';
        if (businessName) businessName.value = data.business_name || '';

        // New date fields
        if (dateApplied) {
            dateApplied.value = data.date_applied_formatted || '';
            if (!data.date_applied_formatted) dateApplied.placeholder = 'Not applied yet';
        }
        
        if (dateVerified) {
            dateVerified.value = data.verification_date_formatted || '';
            if (!data.verification_date_formatted) dateVerified.placeholder = 'Not verified yet';
        }
        
        if (memberSince) {
            memberSince.value = data.date_joined_formatted || '';
            if (!data.date_joined_formatted) memberSince.placeholder = 'N/A';
        }

        // Show verify/reject buttons only for pending sellers
        if (profileActions) {
            if (data.is_verified === 'pending') {
                profileActions.innerHTML = `
                    <button class="btn btn-secondary" id="rejectSellerBtn">
                        <img src="../assets/image/icons/cancel.svg" alt="Reject" class="btn-icon">
                        Reject
                    </button>
                    <button class="btn btn-primary" id="verifySellerBtn">
                        <img src="../assets/image/icons/verified-empty.svg" alt="Verify" class="btn-icon">
                        Verify
                    </button>
                `;
            } else {
                profileActions.innerHTML = '';
            }

            const verifyBtn = document.getElementById('verifySellerBtn');
            const rejectBtn = document.getElementById('rejectSellerBtn');

            if (verifyBtn) {
                verifyBtn.addEventListener('click', () => {
                    showConfirmationModal(
                        'Verify Seller',
                        'Are you sure you want to verify this seller? They will be able to start selling immediately.',
                        'verify'
                    );
                });
            }

            if (rejectBtn) {
                rejectBtn.addEventListener('click', () => {
                    showConfirmationModal(
                        'Reject Seller',
                        'Are you sure you want to reject this seller application? This action cannot be undone.',
                        'reject'
                    );
                });
            }
        }
    }

    // ============= HANDLE VERIFY/REJECT =============
    if (modalConfirmBtn) {
        modalConfirmBtn.addEventListener('click', async function() {
            if (!currentAction || !currentSellerId) return;

            const action = currentAction === 'verify' ? 'verify_seller' : 'reject_seller';
            const originalText = this.textContent;
            this.textContent = 'Processing...';
            this.disabled = true;

            try {
                const formData = new FormData();
                formData.append('action', action);
                formData.append('seller_id', currentSellerId);

                const response = await fetch('../database/admin-seller-profile-handler.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {
                    showNotification(result.message);
                    
                    setTimeout(() => {
                        hideConfirmationModal();
                        loadSellerData();
                    }, 1500);
                } else {
                    showNotification(result.message || 'Action failed', true);
                    hideConfirmationModal();
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Network error. Please try again.', true);
                hideConfirmationModal();
            } finally {
                this.textContent = originalText;
                this.disabled = false;
            }
        });
    }

    // ============= INITIAL LOAD =============
    if (sellerId) {
        loadSellerData();
    } else {
        showError('Invalid seller ID');
    }
});