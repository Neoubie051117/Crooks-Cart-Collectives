document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const sellersList = document.getElementById('sellersList');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');

    let currentFilter = 'pending';
    let allSellers = [];

    // Show/hide modal functions
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
        }
        notificationModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        if (!isError) {
            setTimeout(() => {
                notificationModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 3000);
        }
    }

    function hideNotification() {
        notificationModal.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', hideNotification);
    }

    notificationModal.addEventListener('click', (e) => {
        if (e.target === notificationModal) hideNotification();
    });

    // Filter functions
    function setActiveFilter(filter) {
        filterTabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterSellers(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (!allSellers || allSellers.length === 0) {
            renderEmptyState('No sellers found in the database.');
            return;
        }

        let filteredSellers = [];
        if (filter === 'pending') {
            filteredSellers = allSellers.filter(s => s.is_verified === 0);
        } else if (filter === 'verified') {
            filteredSellers = allSellers.filter(s => s.is_verified === 1);
        } else if (filter === 'rejected') {
            filteredSellers = allSellers.filter(s => s.is_verified === 2);
        }

        if (filteredSellers.length === 0) {
            let message = '';
            if (filter === 'pending') {
                message = 'No pending seller applications.';
            } else if (filter === 'verified') {
                message = 'No verified sellers yet.';
            } else if (filter === 'rejected') {
                message = 'No rejected applications.';
            }
            renderEmptyState(message);
        } else {
            renderSellers(filteredSellers);
        }
    }

    function renderEmptyState(message) {
        sellersList.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-content">
                    <img src="../assets/image/icons/verified-empty.svg" alt="No sellers" class="empty-state-icon">
                    <h2>${message}</h2>
                    <p class="empty-state-hint">When users apply to become sellers, they will appear here for verification.</p>
                </div>
            </div>
        `;
    }

    function renderSellers(sellers) {
        let html = '<div class="sellers-grid">';

        sellers.forEach(seller => {
            const createdDate = seller.created_at ? new Date(seller.created_at).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : 'N/A';

            const statusBadge = seller.is_verified === 0 ? 'pending' : 
                               seller.is_verified === 1 ? 'verified' : 'rejected';
            const statusText = seller.is_verified === 0 ? 'Pending' : 
                              seller.is_verified === 1 ? 'Verified' : 'Rejected';

            const fullName = (seller.first_name && seller.first_name !== 'Unknown' ? seller.first_name : '') + 
                            (seller.last_name && seller.last_name !== 'User' ? ' ' + seller.last_name : '');
            
            const displayName = fullName.trim() || 'Unknown User';

            html += `
                <div class="seller-card" data-id="${seller.seller_id}">
                    <div class="seller-header">
                        <h3>${escapeHtml(seller.business_name)}</h3>
                        <span class="status-badge ${statusBadge}">${statusText}</span>
                    </div>
                    <div class="seller-body">
                        <p><strong>Name:</strong> ${escapeHtml(displayName)}</p>
                        <p><strong>Email:</strong> ${escapeHtml(seller.email)}</p>
                        <p><strong>Contact:</strong> ${escapeHtml(seller.contact_number)}</p>
                        <p><strong>Applied:</strong> ${createdDate}</p>
                    </div>
            `;

            if (seller.is_verified === 0) {
                html += `
                    <div class="seller-actions">
                        <button class="btn-verify" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/verified-filled.svg" alt="Verify" class="btn-icon">
                            Verify
                        </button>
                        <button class="btn-reject" data-id="${seller.seller_id}">
                            <img src="../assets/image/icons/cancel.svg" alt="Reject" class="btn-icon">
                            Reject
                        </button>
                    </div>
                `;
            } else {
                html += `
                    <div class="seller-actions">
                        <span class="status-message">Already ${statusText.toLowerCase()}</span>
                    </div>
                `;
            }

            html += '</div>';
        });

        html += '</div>';
        sellersList.innerHTML = html;
        attachEventListeners();
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function attachEventListeners() {
        document.querySelectorAll('.btn-verify').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'verify');
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', async () => {
                const sellerId = btn.dataset.id;
                await handleVerification(sellerId, 'reject');
            });
        });
    }

    async function handleVerification(sellerId, action) {
        // Disable button to prevent double submission
        const buttons = document.querySelectorAll(`.btn-${action}[data-id="${sellerId}"]`);
        buttons.forEach(btn => {
            btn.disabled = true;
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Processing...';
            btn.dataset.originalText = originalText;
        });

        try {
            const formData = new URLSearchParams();
            formData.append('action', action);
            formData.append('seller_id', sellerId);

            const response = await fetch('../database/admin-auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotification(result.message);
                await loadSellers(); // Reload the list
            } else {
                showNotification(result.message || 'Action failed', true);
                // Re-enable buttons
                buttons.forEach(btn => {
                    btn.disabled = false;
                    btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
                });
            }
        } catch (error) {
            console.error('Verification error:', error);
            showNotification('Network error. Please try again.', true);
            // Re-enable buttons
            buttons.forEach(btn => {
                btn.disabled = false;
                btn.innerHTML = btn.dataset.originalText || (action === 'verify' ? 'Verify' : 'Reject');
            });
        }
    }

    async function loadSellers() {
        sellersList.innerHTML = '<div class="loading">Loading sellers...</div>';

        try {
            const response = await fetch('../database/admin-auth-handler.php?action=get_all_sellers');
            const result = await response.json();

            if (result.status === 'success') {
                allSellers = result.data || [];
                if (allSellers.length === 0) {
                    renderEmptyState('No sellers found in the database.');
                } else {
                    filterSellers(currentFilter);
                }
            } else {
                sellersList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-content">
                            <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                            <h2>Error Loading Sellers</h2>
                            <p>${result.message || 'Failed to load sellers.'}</p>
                        </div>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error loading sellers:', error);
            sellersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/verified-empty.svg" alt="Error" class="empty-state-icon">
                        <h2>Network Error</h2>
                        <p>Please check your connection and try again.</p>
                    </div>
                </div>
            `;
        }
    }

    // Filter tab click handlers
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            filterSellers(filter);
        });
    });

    // Initial load
    loadSellers();
});