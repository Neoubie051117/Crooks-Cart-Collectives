/* Crooks-Cart-Collectives/scripts/seller-manage-product.js */
/* Revised with consistent modal styling and empty state handling */

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
            this.textContent = 'Deleting...';
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
                    
                    // Remove the deleted product card from DOM
                    const productCard = document.querySelector(`.delete-btn[data-id="${currentProductId}"]`).closest('.product-card');
                    if (productCard) {
                        productCard.style.transition = 'opacity 0.3s ease';
                        productCard.style.opacity = '0';
                        setTimeout(() => {
                            productCard.remove();
                            
                            // Check if no products left
                            const remainingProducts = document.querySelectorAll('.product-card');
                            if (remainingProducts.length === 0) {
                                setTimeout(() => {
                                    location.reload();
                                }, 500);
                            }
                        }, 300);
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