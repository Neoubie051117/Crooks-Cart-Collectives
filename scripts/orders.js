/* Crooks-Cart-Collectives/scripts/orders.js */
/* Fixed version - shows cancel reason in order-item-status badge, keeps header badge as simple status */

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
            
            star.appendChild(img);
            starContainer.appendChild(star);
            stars.push(star);
            
            star.addEventListener('mouseover', function() {
                const value = parseInt(this.dataset.value);
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    starImg.src = j < value ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
                }
            });
            
            star.addEventListener('mouseout', function() {
                for (let j = 0; j < stars.length; j++) {
                    const starImg = stars[j].querySelector('img');
                    starImg.src = j < currentRating ? '../assets/image/icons/star-filled.svg' : '../assets/image/icons/star-empty.svg';
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
    
    function resetRatingForm() {
        currentRating = 0;
        if (ratingValue) ratingValue.value = '';
        if (ratingError) ratingError.textContent = '';
        if (reviewForm) reviewForm.reset();
        
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
        }
        showModal(notificationModal);
        
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

    // ============= RENDER ORDERS =============
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
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase(); // pending, delivered, cancelled
            const imagePath = getImagePath(order.image_path);
            
            // Determine cancellation text for order-item-status - ONLY for cancelled orders
            let cancellationText = '';
            if (order.status === 'cancelled' && order.cancelled_by) {
                if (order.cancelled_by === 'customer') {
                    cancellationText = 'Cancelled by Customer';
                } else if (order.cancelled_by === 'seller') {
                    cancellationText = 'Cancelled by Seller';
                }
            }
            
            // Price summary data
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2); // shipping is free

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
                        <!-- Column 1: Order Items -->
                        <div class="order-items-column">
                            <div class="order-items">
                                <div class="order-item">
                                    <img src="${imagePath}" alt="${escapeHtml(order.product_name)}"
                                         class="order-item-image"
                                         onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                                    <div class="order-item-details">
                                        <div class="order-item-seller">${escapeHtml(order.seller_name || 'Unknown Seller')}</div>
                                        <div class="order-item-title">${escapeHtml(order.product_name)}</div>
                                        <div class="order-item-meta">
                                            <span class="item-quantity">Qty: ${order.quantity}</span>
                                            <span class="item-price">₱${Number(order.price_at_time).toFixed(2)}</span>
                                        </div>
                                        <div class="order-item-status">
                                            ${order.status === 'cancelled' && cancellationText ? 
                                                `<span class="status-badge ${statusClass}">${cancellationText}</span>` : 
                                                ''
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Price Summary -->
                        <div class="order-price-summary">
                            <div class="price-summary-title">Order Summary</div>
                            <div class="price-row">
                                <span>Quantity</span>
                                <span class="price-value">${order.quantity}</span>
                            </div>
                            <div class="price-row">
                                <span>Subtotal</span>
                                <span class="price-value">₱${subtotal}</span>
                            </div>
                            <div class="price-row">
                                <span>Shipping Fee</span>
                                <span class="price-value">Free</span>
                            </div>
                            <div class="price-divider"></div>
                            <div class="price-row price-total">
                                <span>Total</span>
                                <span class="price-value">₱${total}</span>
                            </div>
                        </div>

                        <!-- Column 3: Shipping + Actions -->
                        <div class="order-shipping-column">
                            <div class="order-shipping-location">
                                <div class="shipping-address-title">Shipping Address</div>
                                <div class="shipping-address-text">${escapeHtml(order.shipping_address || 'No address provided')}</div>
                            </div>

                            <div class="order-item-actions">
            `;

            // FIXED: Use 'pending' instead of 'ordered' for cancel button
            const canCancel = order.status === 'pending';
            const canReview = order.status === 'delivered' && !order.has_review;

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
            
            if (canCancel) {
                html += `
                    <button class="action-btn action-btn-cancel" 
                            data-order-id="${order.order_id}">
                        Cancel Order
                    </button>
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
        document.querySelectorAll('.action-btn-review').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (reviewOrderId) reviewOrderId.value = btn.dataset.orderId;
                if (reviewProductId) reviewProductId.value = btn.dataset.productId;
                resetRatingForm();
                showModal(reviewModal);
            });
        });
        
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
            
            if (currentRating === 0) {
                if (ratingError) ratingError.textContent = 'Please select a rating';
                return;
            }
            
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
                    loadOrders();
                } else {
                    showNotification(result.message || 'Failed to submit review', true);
                }
            } catch (error) {
                console.error('Review error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
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
                    loadOrders();
                } else {
                    showNotification(result.message || 'Failed to cancel order', true);
                }
            } catch (error) {
                console.error('Cancel error:', error);
                showNotification('Network error. Please try again.', true);
            } finally {
                confirmCancel.disabled = false;
                confirmCancel.textContent = 'Yes, Cancel Order';
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

    [cancelModal, reviewModal, notificationModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal(modal);
            });
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    initStarRating();
    loadOrders();
});