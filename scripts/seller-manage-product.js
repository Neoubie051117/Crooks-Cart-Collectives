/* Crooks-Cart-Collectives/scripts/seller-manage-product.js */
/* Fixed: Replaced window alert with modal confirmation for delete */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============= DOM ELEMENTS =============
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    // Modal Elements
    const deleteModal = document.createElement('div');
    deleteModal.className = 'modal';
    deleteModal.id = 'deleteConfirmModal';
    deleteModal.innerHTML = `
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/trash.svg" alt="Delete">
            </div>
            <h3 class="modal-title">Confirm Delete</h3>
            <p class="modal-message">Are you sure you want to delete this product? This action cannot be undone.</p>
            <div class="modal-actions">
                <button id="cancelDelete" class="modal-btn modal-btn-cancel">Cancel</button>
                <button id="confirmDelete" class="modal-btn modal-btn-confirm">Delete</button>
            </div>
        </div>
    `;
    document.body.appendChild(deleteModal);

    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');

    // Notification Modal (reuse existing or create new)
    let notificationModal = document.getElementById('notificationModal');
    if (!notificationModal) {
        notificationModal = document.createElement('div');
        notificationModal.className = 'modal';
        notificationModal.id = 'notificationModal';
        notificationModal.innerHTML = `
            <div class="modal-content">
                <div class="modal-icon">
                    <img src="../assets/image/icons/mail.svg" alt="Notification">
                </div>
                <p id="notificationMessage" class="modal-message"></p>
                <div class="modal-actions">
                    <button id="notificationClose" class="modal-btn modal-btn-confirm">OK</button>
                </div>
            </div>
        `;
        document.body.appendChild(notificationModal);
    }

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
    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            hideModal(deleteModal);
            currentProductId = null;
        }
    });

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
            hideModal(deleteModal);
            hideModal(notificationModal);
            currentProductId = null;
        }
    });
});