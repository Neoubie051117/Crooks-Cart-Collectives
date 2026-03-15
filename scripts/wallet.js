/* Crooks-Cart-Collectives/scripts/wallet.js */
/* Handles wallet operations: add funds modal, balance updates, notifications */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ===== DOM ELEMENTS =====
    const addFundsBtn = document.getElementById('addFundsBtn');
    const addFundsModal = document.getElementById('addFundsModal');
    const cancelAddFunds = document.getElementById('cancelAddFunds');
    const confirmAddFunds = document.getElementById('confirmAddFunds');
    
    const confirmationModal = document.getElementById('confirmationModal');
    const cancelConfirm = document.getElementById('cancelConfirm');
    const confirmAdd = document.getElementById('confirmAdd');
    
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    const balanceAmount = document.querySelector('.balance-amount');

    // ===== STATE =====
    let isProcessing = false;

    // ===== MODAL FUNCTIONS =====
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
        hideModal(addFundsModal);
        hideModal(confirmationModal);
        hideModal(notificationModal);
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

    // ===== FETCH WITH ERROR HANDLING =====
    async function fetchWallet(action, method = 'GET', data = null) {
        const url = `../database/wallet-handler.php?action=${action}`;
        const options = {
            method: method,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        };
        
        if (data) {
            options.body = new URLSearchParams(data);
        }
        
        try {
            const response = await fetch(url, options);
            const text = await response.text();
            
            // Check if response is valid JSON
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error('Invalid JSON response:', text.substring(0, 200));
                showNotification('Server error. Please try again.', true);
                return null;
            }
        } catch (error) {
            console.error('Fetch error:', error);
            showNotification('Network error. Please check your connection.', true);
            return null;
        }
    }

    // ===== UPDATE BALANCE DISPLAY =====
    async function updateBalanceDisplay() {
        const result = await fetchWallet('get_balance');
        if (result && result.status === 'success' && balanceAmount) {
            balanceAmount.textContent = result.formatted;
        }
    }

    // ===== OPEN ADD FUNDS MODAL =====
    if (addFundsBtn) {
        addFundsBtn.addEventListener('click', function() {
            showModal(addFundsModal);
        });
    }

    // ===== CLOSE ADD FUNDS MODAL =====
    if (cancelAddFunds) {
        cancelAddFunds.addEventListener('click', function() {
            hideModal(addFundsModal);
        });
    }

    // ===== CONFIRM FROM QR MODAL -> SHOW CONFIRMATION =====
    if (confirmAddFunds) {
        confirmAddFunds.addEventListener('click', function() {
            hideModal(addFundsModal);
            showModal(confirmationModal);
        });
    }

    // ===== CANCEL CONFIRMATION =====
    if (cancelConfirm) {
        cancelConfirm.addEventListener('click', function() {
            hideModal(confirmationModal);
        });
    }

    // ===== CONFIRM ADD FUNDS =====
    if (confirmAdd) {
        confirmAdd.addEventListener('click', async function() {
            if (isProcessing) return;
            
            isProcessing = true;
            const originalText = this.textContent;
            this.textContent = 'Processing...';
            this.disabled = true;

            try {
                const result = await fetchWallet('deposit', 'POST');
                
                if (result && result.status === 'success') {
                    hideModal(confirmationModal);
                    
                    // Update balance display
                    if (balanceAmount) {
                        balanceAmount.textContent = '₱' + parseFloat(result.new_balance).toFixed(2);
                    }
                    
                    showNotification('Funds added successfully! ₱5,000.00 has been credited to your wallet.');
                    
                    // Reload page after 1.5 seconds to show updated transaction history
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    const errorMsg = result ? result.message : 'Failed to add funds';
                    showNotification(errorMsg, true);
                    hideModal(confirmationModal);
                }
            } catch (error) {
                console.error('Add funds error:', error);
                showNotification('Error processing request. Please try again.', true);
                hideModal(confirmationModal);
            } finally {
                isProcessing = false;
                this.textContent = originalText;
                this.disabled = false;
            }
        });
    }

    // ===== NOTIFICATION MODAL CLOSE =====
    if (notificationClose) {
        notificationClose.addEventListener('click', function() {
            hideModal(notificationModal);
        });
    }

    // ===== CLOSE MODALS WHEN CLICKING OUTSIDE =====
    [addFundsModal, confirmationModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    hideModal(modal);
                }
            });
        }
    });

    // ===== CLOSE ON ESCAPE KEY =====
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideAllModals();
        }
    });

    // ===== INITIAL BALANCE CHECK (optional - only if needed) =====
    // Comment this out if you don't need to update balance on page load
    // updateBalanceDisplay();

    console.log('Wallet.js initialized');
});