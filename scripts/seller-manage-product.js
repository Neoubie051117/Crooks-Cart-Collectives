/* Crooks-Cart-Collectives/scripts/seller-manage-product.js */
/* Updated to use soft delete (set is_active to 0) instead of permanent deletion */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    // Modal Elements
    const deleteModal = document.getElementById('deleteConfirmModal');
    const notificationModal = document.getElementById('notificationModal');
    
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    // ============= STATE =============
    let currentProductId = null;
    let isProcessing = false;

    // ============= MODAL FUNCTIONS =============
    function showModal(modal) {
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function hideModal(modal) {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function hideAllModals() {
        hideModal(deleteModal);
        hideModal(notificationModal);
        currentProductId = null;
    }

    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        showModal(notificationModal);
        
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= DELETE BUTTON HANDLERS =============
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            currentProductId = this.dataset.id;
            showModal(deleteModal);
        });
    });

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelDelete) {
        cancelDelete.addEventListener('click', function() {
            hideModal(deleteModal);
            currentProductId = null;
        });
    }

    if (confirmDelete) {
        confirmDelete.addEventListener('click', async function() {
            if (!currentProductId || isProcessing) return;

            isProcessing = true;
            const originalText = this.textContent;
            this.textContent = 'Removing...';
            this.disabled = true;

            try {
                const response = await fetch('../database/product-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'delete',
                        product_id: currentProductId
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    hideModal(deleteModal);
                    showNotification(result.message);
                    
                    // Update the product card to show inactive status instead of removing it
                    const productCard = document.querySelector(`.delete-btn[data-id="${currentProductId}"]`).closest('.product-card');
                    if (productCard) {
                        // Change the product status display
                        const statusElement = productCard.querySelector('.product-status');
                        if (statusElement) {
                            statusElement.textContent = 'Inactive';
                            statusElement.className = 'product-status status-inactive';
                        }
                        
                        // Disable or change the edit button if needed
                        const editButton = productCard.querySelector('.edit-btn');
                        if (editButton) {
                            // Optionally change edit button appearance
                            // editButton.style.opacity = '0.5';
                        }
                        
                        // Visual indication that product is inactive
                        productCard.style.opacity = '0.8';
                        productCard.style.borderColor = '#cccccc';
                        
                        // Add a small badge or indicator
                        const existingBadge = productCard.querySelector('.inactive-badge');
                        if (!existingBadge) {
                            const badge = document.createElement('span');
                            badge.className = 'inactive-badge';
                            badge.textContent = 'Removed';
                            badge.style.cssText = 'display: inline-block; background: #000000; color: #ffffff; padding: 2px 6px; border-radius: 4px; font-size: 0.7rem; margin-left: 5px;';
                            const titleElement = productCard.querySelector('.product-title');
                            if (titleElement) {
                                titleElement.appendChild(badge);
                            }
                        }
                        
                        // Hide the delete button for this product
                        const deleteButton = productCard.querySelector('.delete-btn');
                        if (deleteButton) {
                            deleteButton.style.display = 'none';
                        }
                    }
                } else {
                    showNotification('Error: ' + result.message, true);
                }
            } catch (error) {
                console.error('Delete error:', error);
                showNotification('An error occurred. Please try again.', true);
            } finally {
                isProcessing = false;
                this.textContent = originalText;
                this.disabled = false;
                currentProductId = null;
            }
        });
    }

    // Close modal when clicking outside
    if (deleteModal) {
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                hideModal(deleteModal);
                currentProductId = null;
            }
        });
    }

    if (notificationModal) {
        notificationModal.addEventListener('click', function(e) {
            if (e.target === notificationModal) {
                hideModal(notificationModal);
            }
        });
    }

    // Close notification with button
    if (notificationClose) {
        notificationClose.addEventListener('click', function() {
            hideModal(notificationModal);
        });
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideAllModals();
        }
    });
});