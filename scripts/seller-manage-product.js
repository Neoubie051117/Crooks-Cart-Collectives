/* Crooks-Cart-Collectives/scripts/seller-manage-product.js */
/* Updated with restore functionality for inactive products */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const restoreButtons = document.querySelectorAll('.restore-btn');
    
    // Modal Elements
    const deleteModal = document.getElementById('deleteConfirmModal');
    const restoreModal = document.getElementById('restoreConfirmModal');
    const notificationModal = document.getElementById('notificationModal');
    
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');
    
    const cancelRestore = document.getElementById('cancelRestore');
    const confirmRestore = document.getElementById('confirmRestore');
    
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
        hideModal(restoreModal);
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

    // ============= RESTORE BUTTON HANDLERS =============
    restoreButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            currentProductId = this.dataset.id;
            showModal(restoreModal);
        });
    });

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelDelete) {
        cancelDelete.addEventListener('click', function() {
            hideModal(deleteModal);
            currentProductId = null;
        });
    }

    if (cancelRestore) {
        cancelRestore.addEventListener('click', function() {
            hideModal(restoreModal);
            currentProductId = null;
        });
    }

    // Close modal when clicking outside
    [deleteModal, restoreModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    hideModal(modal);
                    if (modal !== notificationModal) {
                        currentProductId = null;
                    }
                }
            });
        }
    });

    // ============= CONFIRM DELETE =============
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
                    showNotification(result.message || 'Product removed successfully');
                    
                    // Reload the page to show updated product status
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    showNotification('Error: ' + (result.message || 'Failed to remove product'), true);
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

    // ============= CONFIRM RESTORE =============
    if (confirmRestore) {
        confirmRestore.addEventListener('click', async function() {
            if (!currentProductId || isProcessing) return;

            isProcessing = true;
            const originalText = this.textContent;
            this.textContent = 'Restoring...';
            this.disabled = true;

            try {
                const response = await fetch('../database/product-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'restore',
                        product_id: currentProductId
                    })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    hideModal(restoreModal);
                    showNotification(result.message || 'Product restored successfully');
                    
                    // Reload the page to show updated product status
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    showNotification('Error: ' + (result.message || 'Failed to restore product'), true);
                }
            } catch (error) {
                console.error('Restore error:', error);
                showNotification('An error occurred. Please try again.', true);
            } finally {
                isProcessing = false;
                this.textContent = originalText;
                this.disabled = false;
                currentProductId = null;
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