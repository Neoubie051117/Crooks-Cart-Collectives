/* Crooks-Cart-Collectives/scripts/orders.js */
/* UPDATED: Maps database status 'ordered' to display 'Pending'. Styled with orange/black/white. */

document.addEventListener('DOMContentLoaded', () => {
    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('ordersList');
    
    // Review Modal Elements
    const reviewModal = document.getElementById('reviewModal');
    const reviewForm = document.getElementById('reviewForm');
    const reviewOrderId = document.getElementById('reviewOrderId');
    const reviewProductId = document.getElementById('reviewProductId');
    const ratingValue = document.getElementById('ratingValue');
    const ratingError = document.getElementById('ratingError');
    const cancelReview = document.getElementById('cancelReview');
    const submitReview = document.getElementById('submitReview');
    const starContainer = document.getElementById('starRatingContainer');
    
    // Cancel Modal Elements
    const cancelModal = document.getElementById('cancelModal');
    const cancelCancel = document.getElementById('cancelCancel');
    const confirmCancel = document.getElementById('confirmCancel');
    
    // Notification Modal Elements
    const notificationModal = document.getElementById('notificationModal');
    const notificationMessage = document.getElementById('notificationMessage');
    const notificationClose = document.getElementById('notificationClose');
    
    // State
    let currentRating = 0;
    let currentCancelOrderId = null;
    let stars = [];

    // ============= INITIALIZE STAR RATING =============
    function initStarRating() {
        if (!starContainer) return;
        
        starContainer.innerHTML = '';
        stars = [];
        
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.className = 'star';
            star.dataset.value = i;
            star.style.cssText = 'cursor: pointer; display: inline-block; width: 32px; height: 32px;';
            
            const img = document.createElement('img');
            img.src = '../assets/image/icons/star-empty.svg';
            img.alt = 'Star';
            img.style.width = '32px';
            img.style.height = '32px';
            img.dataset.filled = 'false';
            
            star.appendChild(img);
            starContainer.appendChild(star);
            stars.push(star);
            
            // Add hover handlers
            star.addEventListener('mouseover', function() {
                const value = parseInt(this.dataset.value);
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    if (j < value) {
                        starImg.src = '../assets/image/icons/star-filled.svg';
                    } else {
                        starImg.src = '../assets/image/icons/star-empty.svg';
                    }
                }
            });
            
            star.addEventListener('mouseout', function() {
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    if (j < currentRating) {
                        starImg.src = '../assets/image/icons/star-filled.svg';
                    } else {
                        starImg.src = '../assets/image/icons/star-empty.svg';
                    }
                }
            });
            
            star.addEventListener('click', function() {
                const value = parseInt(this.dataset.value);
                currentRating = value;
                if (ratingValue) ratingValue.value = value;
                
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    starImg.src = j < value ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
                }
            });
        }
    }
    
    // Reset rating form
    function resetRatingForm() {
        currentRating = 0;
        if (ratingValue) ratingValue.value = '';
        if (ratingError) ratingError.textContent = '';
        if (reviewForm) reviewForm.reset();
        
        // Reset stars
        stars.forEach(star => {
            const img = star.querySelector('img');
            if (img) img.src = '../assets/image/icons/star-empty.svg';
        });
    }

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
        hideModal(reviewModal);
        hideModal(cancelModal);
        hideModal(notificationModal);
        resetRatingForm();
        currentCancelOrderId = null;
    }
    
    function showNotification(message, isError = false) {
        if (notificationMessage) {
            notificationMessage.textContent = message;
            const icon = notificationModal.querySelector('.modal-icon svg');
            if (icon) {
                icon.style.stroke = isError ? '#dc3545' : '#FF8246';
            }
        }
        showModal(notificationModal);
        
        // Auto-hide after 3 seconds for success messages
        if (!isError) {
            setTimeout(() => {
                hideModal(notificationModal);
            }, 3000);
        }
    }

    // ============= LOAD ORDERS =============
    async function loadOrders() {
        if (!ordersList) return;
        
        ordersList.innerHTML = '<div class="loading">Loading orders...</div>';
        
        try {
            const response = await fetch('../database/order-handler.php?action=get_customer_orders');
            const result = await response.json();
            
            if (result.status === 'success') {
                renderOrders(result.data);
            } else {
                ordersList.innerHTML = '<div class="empty-orders"><p>Failed to load orders. Please try again.</p></div>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-orders"><p>Network error. Please check your connection.</p></div>';
        }
    }

    // ============= RENDER ORDERS (with status mapping) =============
    function renderOrders(orders) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-orders">
                    <p>You haven't placed any orders yet.</p>
                    <a href="products.php" class="btn-primary">Start Shopping</a>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = order.order_date ? formatDate(order.order_date) : 'Date unavailable';
            // Map database status to display text
            let displayStatus;
            switch (order.status) {
                case 'ordered':   displayStatus = 'Pending'; break;
                case 'delivered': displayStatus = 'Delivered'; break;
                case 'cancelled': displayStatus = 'Cancelled'; break;
                default:          displayStatus = order.status; // fallback
            }
            const statusClass = order.status.toLowerCase(); // use original for CSS class
            const canCancel = order.status === 'ordered';   // only pending (original ordered) can be cancelled
            const canReview = order.status === 'delivered' && !order.has_review;
            const imagePath = getImagePath(order.image_path);
            
            html += `
                <div class="order-card" data-order-id="${order.order_id}">
                    <div class="order-header">
                        <div class="order-header-left">
                            <span class="order-id">Order #${order.order_id}</span>
                            <span class="order-date">${orderDate}</span>
                        </div>
                        <div class="order-header-right">
                            <span class="order-status-badge ${statusClass}">${displayStatus}</span>
                        </div>
                    </div>

                    <div class="order-body">
                        <!-- Product Image -->
                        <div class="order-item-image">
                            <img src="${imagePath}" alt="${escapeHtml(order.product_name)}"
                                 onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                        </div>
                        
                        <!-- Product Details -->
                        <div class="order-item-details">
                            <h3 class="product-name">${escapeHtml(order.product_name)}</h3>
                            <p class="seller-name">Seller: ${escapeHtml(order.business_name || 'Unknown Seller')}</p>
                            
                            <div class="order-meta">
                                <span class="item-quantity">Quantity: ${order.quantity}</span>
                                <span class="item-price">₱${Number(order.price_at_time).toFixed(2)} each</span>
                            </div>
                            
                            <div class="order-subtotal">
                                Subtotal: <strong>₱${Number(order.subtotal).toFixed(2)}</strong>
                            </div>
                            
                            <div class="shipping-address">
                                <strong>Ship to:</strong> ${escapeHtml(order.shipping_address || 'No address provided')}
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="order-actions">
            `;
            
            // Add action buttons based on original status
            if (canCancel) {
                html += `
                    <button class="action-btn action-btn-cancel" data-order-id="${order.order_id}">
                        Cancel Item
                    </button>
                `;
            }
            
            if (canReview) {
                html += `
                    <button class="action-btn action-btn-review" 
                            data-order-id="${order.order_id}" 
                            data-product-id="${order.product_id}">
                        Write Review
                    </button>
                `;
            } else if (order.has_review) {
                html += `
                    <span class="reviewed-badge">
                        Reviewed
                    </span>
                `;
            }
            
            html += `
                            <a href="product-details.php?id=${order.product_id}" 
                               class="action-btn action-btn-view">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            `;
        });

        ordersList.innerHTML = html;
        attachEventListeners();
    }

    // ============= HELPER FUNCTIONS =============
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        return date.toLocaleDateString(undefined, options);
    }
    
    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
        if (path.startsWith('../')) return path;
        return '../' + path;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        // Review buttons
        document.querySelectorAll('.action-btn-review').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (reviewOrderId) reviewOrderId.value = btn.dataset.orderId;
                if (reviewProductId) reviewProductId.value = btn.dataset.productId;
                resetRatingForm();
                showModal(reviewModal);
            });
        });
        
        // Cancel buttons
        document.querySelectorAll('.action-btn-cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentCancelOrderId = btn.dataset.orderId;
                showModal(cancelModal);
            });
        });
    }

    // ============= REVIEW SUBMISSION =============
    if (reviewForm) {
        reviewForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Validate rating
            if (currentRating === 0) {
                if (ratingError) ratingError.textContent = 'Please select a rating';
                return;
            }
            
            // Disable submit button
            if (submitReview) {
                submitReview.disabled = true;
                submitReview.textContent = 'Submitting...';
            }
            
            try {
                const formData = new FormData();
                formData.append('order_id', reviewOrderId?.value || '');
                formData.append('product_id', reviewProductId?.value || '');
                formData.append('rating', currentRating);
                formData.append('comment', document.getElementById('comment')?.value || '');
                
                const response = await fetch('../database/review-handler.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Review submitted successfully!');
                    hideModal(reviewModal);
                    resetRatingForm();
                    loadOrders(); // Reload orders to update review status
                } else {
                    showNotification(result.message || 'Failed to submit review', true);
                }
            } catch (error) {
                console.error('Review error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                // Re-enable submit button
                if (submitReview) {
                    submitReview.disabled = false;
                    submitReview.textContent = 'Submit Review';
                }
            }
        });
    }

    // ============= CANCEL ORDER =============
    if (confirmCancel) {
        confirmCancel.addEventListener('click', async () => {
            if (!currentCancelOrderId) return;
            
            confirmCancel.disabled = true;
            confirmCancel.textContent = 'Processing...';
            
            try {
                const formData = new URLSearchParams();
                formData.append('action', 'cancel_item');
                formData.append('order_id', currentCancelOrderId);
                
                const response = await fetch('../database/order-handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showNotification('Order cancelled successfully');
                    hideModal(cancelModal);
                    loadOrders(); // Reload orders
                } else {
                    showNotification(result.message || 'Failed to cancel order', true);
                }
            } catch (error) {
                console.error('Cancel error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                confirmCancel.disabled = false;
                confirmCancel.textContent = 'Yes, Cancel Item';
                currentCancelOrderId = null;
            }
        });
    }

    // ============= MODAL CLOSE HANDLERS =============
    if (cancelCancel) {
        cancelCancel.addEventListener('click', () => {
            hideModal(cancelModal);
            currentCancelOrderId = null;
        });
    }

    if (cancelReview) {
        cancelReview.addEventListener('click', () => {
            hideModal(reviewModal);
            resetRatingForm();
        });
    }

    if (notificationClose) {
        notificationClose.addEventListener('click', () => {
            hideModal(notificationModal);
        });
    }

    // Close modals when clicking outside
    [cancelModal, reviewModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal(modal);
            });
        }
    });

    // Escape key 
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    // Initialize star rating
    initStarRating();

    // Load orders on page start
    loadOrders();
});