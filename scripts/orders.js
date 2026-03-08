/* Crooks-Cart-Collectives/scripts/orders.js */
/* Updated to handle inactive products and display payment method at top of shipping details */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // ============= DOM ELEMENTS =============
    const ordersList = document.getElementById('ordersList');
    const filterTabs = document.getElementById('filterTabs');
    
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
    let allOrders = [];
    let currentFilter = 'all';

    // ============= INITIALIZE STAR RATING =============
    function initStarRating() {
        if (!starContainer) return;
        
        starContainer.innerHTML = '';
        stars = [];
        
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.className = 'star';
            star.dataset.value = i;
            
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

    // ============= FILTER FUNCTIONS =============
    function setActiveFilter(filter) {
        if (!filterTabs) return;
        
        const tabs = filterTabs.querySelectorAll('.filter-tab');
        tabs.forEach(tab => {
            const tabFilter = tab.dataset.filter;
            if (tabFilter === filter) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    function filterOrders(filter) {
        currentFilter = filter;
        setActiveFilter(filter);
        
        if (filter === 'all') {
            renderOrders(allOrders);
        } else {
            const filtered = allOrders.filter(order => order.status === filter);
            renderOrders(filtered);
        }
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
                allOrders = result.data;
                
                // Show/hide filter tabs based on orders data
                if (filterTabs) {
                    if (allOrders && allOrders.length > 0) {
                        filterTabs.style.display = 'flex';
                    } else {
                        filterTabs.style.display = 'none';
                    }
                }
                
                filterOrders(currentFilter);
            } else {
                ordersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Failed to load orders. Please try again.</p><a href="product.php" class="btn btn-primary">Start Shopping</a></div></div>';
                if (filterTabs) filterTabs.style.display = 'none';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<div class="empty-state"><div class="empty-state-content"><p>Network error. Please check your connection.</p><a href="product.php" class="btn btn-primary">Start Shopping</a></div></div>';
            if (filterTabs) filterTabs.style.display = 'none';
        }
    }

    // ============= FORMAT DATE =============
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

    // ============= FORMAT PAYMENT METHOD =============
    function formatPaymentMethod(method) {
        if (!method) return 'COD';
        
        switch(method) {
            case 'COD':
                return 'Cash on Delivery';
            case 'Online':
                return 'Online Payment';
            default:
                return method;
        }
    }

    // ============= GET PAYMENT ICON =============
    function getPaymentIcon(method) {
        if (method === 'Online') {
            return '../assets/image/icons/mail.svg';
        }
        return '../assets/image/icons/cart-shopping.svg';
    }

    // ============= GET IMAGE PATH =============
    function getProductImageUrl(mediaPath) {
        if (!mediaPath) {
            return '../assets/image/icons/package.svg';
        }
        
        // If it's already a data-storage-handler URL, return as is
        if (mediaPath.includes('data-storage-handler.php')) {
            return mediaPath;
        }
        
        // Check if it's a media directory path
        if (mediaPath.includes('Crooks-Data-Storage/products/')) {
            const baseDir = mediaPath.endsWith('/') ? mediaPath : mediaPath + '/';
            // We need to let the server find the actual file extension
            // So we encode the base path and let the handler do the glob search
            return '../database/data-storage-handler.php?action=serve&path=' + encodeURIComponent(baseDir + 'thumbnail_1.*');
        }
        
        if (mediaPath.startsWith('assets/')) {
            return '../' + mediaPath;
        }
        
        if (mediaPath.startsWith('http')) {
            return mediaPath;
        }
        
        if (mediaPath.startsWith('../')) {
            return mediaPath;
        }
        
        return '../' + mediaPath;
    }

    // ============= ESCAPE HTML =============
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ============= RENDER ORDERS =============
    function renderOrders(orders) {
        if (!orders || orders.length === 0) {
            ordersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-content">
                        <img src="../assets/image/icons/order.svg" alt="No orders" class="empty-state-icon">
                        <h2>No Orders Found</h2>
                        <p>You haven't placed any orders yet.</p>
                        <a href="product.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                </div>
            `;
            return;
        }

        let html = '';

        orders.forEach(order => {
            const orderDate = formatDate(order.order_date);
            const displayStatus = order.status === 'pending' ? 'Pending' : order.status;
            const statusClass = order.status.toLowerCase();
            
            const imagePath = getProductImageUrl(order.image_path);
            
            const isEditable = order.status === 'pending';
            
            const subtotal = Number(order.subtotal).toFixed(2);
            const total = Number(order.subtotal).toFixed(2);
            
            // Format payment method
            const paymentMethodDisplay = formatPaymentMethod(order.payment_method);
            const paymentIcon = getPaymentIcon(order.payment_method);
            
            // Check if product is active
            const isProductActive = order.is_active ? true : false;

            let eventHtml = '';
            eventHtml += `<div class="event-item customer-event"><span class="event-icon"><img src="../assets/image/icons/order.svg" alt="Order placed" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(59%) sepia(96%) saturate(374%) hue-rotate(338deg) brightness(101%) contrast(101%); vertical-align: middle;"></span><span class="event-text">Order placed: ${orderDate}</span></div>`;
                    
            if (order.status === 'delivered' && order.delivered_at) {
                const deliveredDate = formatDate(order.delivered_at);
                eventHtml += `<div class="event-item delivered-event"><span class="event-icon"><img src="../assets/image/icons/package.svg" alt="Item sold" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">Item sold: ${deliveredDate}</span></div>`;
            }
            
            if (order.status === 'cancelled' && order.cancelled_at) {
                const cancelledDate = formatDate(order.cancelled_at);
                const cancelledBy = order.cancelled_by === 'customer' ? 'Customer' : 'Seller';
                eventHtml += `<div class="event-item cancelled-event"><span class="event-icon"><img src="../assets/image/icons/cancel.svg" alt="Cancelled" style="width: 16px; height: 16px; filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) brightness(0%) contrast(100%); vertical-align: middle;"></span><span class="event-text">${cancelledBy} cancelled: ${cancelledDate}</span></div>`;
            }
            
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
                        <div class="order-product-column">
                            <div class="column-title">Product Details</div>
                            <div class="product-details">
                                <img src="${imagePath}" alt="${escapeHtml(order.product_name)}" 
                                     class="product-thumbnail"
                                     onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                                <div class="product-info">
                                    ${!isProductActive ? '<span class="inactive-badge" style="display: inline-block; background: #000000; color: #ffffff; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; margin-bottom: 5px;">Product Unavailable</span>' : ''}
                                    <h4>${!isProductActive ? 'This product is unavailable' : escapeHtml(order.product_name)}</h4>
                                    <p><span class="info-label">Seller:</span> ${escapeHtml(order.seller_name || 'Unknown Seller')}</p>
                                    <p><span class="info-label">Quantity:</span> ${order.quantity}</p>
                                    <p><span class="info-label">Price:</span> ₱${Number(order.price).toFixed(2)}</p>
                                </div>
                            </div>
                        </div>

                        <div class="order-event-column">
                            <div class="column-title">Event Activity</div>
                            <div class="event-activity-content">
                                ${eventHtml}
                            </div>
                        </div>

                        <div class="order-shipping-column">
                            <div class="column-title">Shipping Information</div>
                            <div class="shipping-details" data-order-id="${order.order_id}" data-original="${escapeHtml(order.shipping_address || 'No address provided')}">
                                <!-- Payment Method at the TOP of shipping details -->
                                <div class="payment-method-wrapper">
                                    <span class="payment-method-label">Payment Method</span>
                                    <span class="payment-method-badge">
                                        <img src="${paymentIcon}" alt="${paymentMethodDisplay}">
                                        <span class="payment-method-text">${paymentMethodDisplay}</span>
                                    </span>
                                </div>
                                
                                <span class="payment-method-label">Address</span>
                                <p class="shipping-address-text">${escapeHtml(order.shipping_address || 'No address provided')}</p>
                                
                                <div class="shipping-edit-controls" style="${isEditable ? 'display: flex;' : 'display: none;'}">
                                    <textarea class="shipping-edit-textarea" rows="3" style="display: none;">${escapeHtml(order.shipping_address || '')}</textarea>
                                    <div class="shipping-buttons">
                                        <button class="action-btn edit-shipping" data-order-id="${order.order_id}" ${!isEditable ? 'style="display: none;"' : ''}>
                                            <img src="../assets/image/icons/edit.svg" alt="Edit" class="btn-icon">
                                            <span class="btn-text">Edit</span>
                                        </button>
                                        <button class="action-btn save-shipping" data-order-id="${order.order_id}" style="display: none;">
                                            <img src="../assets/image/icons/save-empty.svg" alt="Save" class="btn-icon">
                                            <span class="btn-text">Save</span>
                                        </button>
                                        <button class="action-btn reset-shipping" data-order-id="${order.order_id}" style="display: none;">
                                            <img src="../assets/image/icons/reset.svg" alt="Reset" class="btn-icon">
                                            <span class="btn-text">Reset</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-price-summary">
                            <div class="column-title">Order Summary</div>
                            <div class="price-summary-details">
                                <div class="price-row">
                                    <span>Subtotal</span>
                                    <span class="price-value">₱${subtotal}</span>
                                </div>
                                <div class="price-row">
                                    <span>Shipping</span>
                                    <span class="price-value free-shipping">Free</span>
                                </div>
                                <div class="price-divider"></div>
                                <div class="price-row price-total">
                                    <span>Total</span>
                                    <span class="price-value">₱${total}</span>
                                </div>
                            </div>
            `;

            const canCancel = order.status === 'pending';
            const canReview = order.status === 'delivered' && !order.has_review && isProductActive;

            if (canReview) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn review" data-order-id="${order.order_id}" data-product-id="${order.product_id}">
                            Write Review
                        </button>
                        <a href="product-detail.php?id=${order.product_id}" class="action-btn view">
                            View Product
                        </a>
                    </div>
                `;
            } else if (canCancel) {
                html += `
                    <div class="order-actions">
                        <button class="action-btn cancel" data-order-id="${order.order_id}">
                            Cancel Order
                        </button>
                        ${isProductActive ? '<a href="product-detail.php?id=' + order.product_id + '" class="action-btn view">View Product</a>' : '<span class="action-btn view" style="opacity: 0.5; background: #cccccc; cursor: not-allowed;">Unavailable</span>'}
                    </div>
                `;
            } else {
                html += `
                    <div class="order-actions">
                        ${isProductActive ? '<a href="product-detail.php?id=' + order.product_id + '" class="action-btn view">View Product</a>' : '<span class="action-btn view" style="opacity: 0.5; background: #cccccc; cursor: not-allowed;">Unavailable</span>'}
                    </div>
                `;
            }
            
            html += `
                        </div>
                    </div>
                </div>
            `;
        });

        ordersList.innerHTML = html;
        attachEventListeners();
    }

    // ============= ATTACH EVENT LISTENERS =============
    function attachEventListeners() {
        document.querySelectorAll('.action-btn.review').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (reviewOrderId) reviewOrderId.value = btn.dataset.orderId;
                if (reviewProductId) reviewProductId.value = btn.dataset.productId;
                resetRatingForm();
                showModal(reviewModal);
            });
        });
        
        document.querySelectorAll('.action-btn.cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentCancelOrderId = btn.dataset.orderId;
                showModal(cancelModal);
            });
        });

        document.querySelectorAll('.action-btn.edit-shipping').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                const shippingColumn = btn.closest('.shipping-details');
                if (!shippingColumn) return;
                
                const addressText = shippingColumn.querySelector('.shipping-address-text');
                const textarea = shippingColumn.querySelector('.shipping-edit-textarea');
                const editBtn = shippingColumn.querySelector('.edit-shipping');
                const saveBtn = shippingColumn.querySelector('.save-shipping');
                const resetBtn = shippingColumn.querySelector('.reset-shipping');
                
                if (addressText && textarea && editBtn && saveBtn && resetBtn) {
                    addressText.style.display = 'none';
                    textarea.style.display = 'block';
                    editBtn.style.display = 'none';
                    saveBtn.style.display = 'inline-flex';
                    resetBtn.style.display = 'inline-flex';
                    
                    textarea.focus();
                }
            });
        });

        document.querySelectorAll('.action-btn.save-shipping').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.stopPropagation();
                const orderId = btn.dataset.orderId;
                const shippingColumn = btn.closest('.shipping-details');
                if (!shippingColumn) return;
                
                const addressText = shippingColumn.querySelector('.shipping-address-text');
                const textarea = shippingColumn.querySelector('.shipping-edit-textarea');
                const editBtn = shippingColumn.querySelector('.edit-shipping');
                const saveBtn = shippingColumn.querySelector('.save-shipping');
                const resetBtn = shippingColumn.querySelector('.reset-shipping');
                
                if (!textarea || !addressText) return;
                
                const newAddress = textarea.value.trim();
                
                if (!newAddress) {
                    showNotification('Shipping address cannot be empty', true);
                    return;
                }
                
                const originalText = btn.innerHTML;
                btn.innerHTML = '<span class="btn-text">Saving...</span>';
                btn.disabled = true;
                
                try {
                    const formData = new URLSearchParams();
                    formData.append('action', 'update_shipping');
                    formData.append('order_id', orderId);
                    formData.append('shipping_address', newAddress);
                    
                    const response = await fetch('../database/order-handler.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.status === 'success') {
                        addressText.textContent = newAddress;
                        addressText.style.display = 'block';
                        textarea.style.display = 'none';
                        editBtn.style.display = 'inline-flex';
                        saveBtn.style.display = 'none';
                        resetBtn.style.display = 'none';
                        
                        shippingColumn.dataset.original = newAddress;
                        
                        showNotification('Shipping address updated successfully');
                    } else {
                        showNotification(result.message || 'Failed to update address', true);
                        textarea.value = addressText.textContent;
                        addressText.style.display = 'block';
                        textarea.style.display = 'none';
                        editBtn.style.display = 'inline-flex';
                        saveBtn.style.display = 'none';
                        resetBtn.style.display = 'none';
                    }
                } catch (error) {
                    console.error('Update shipping error:', error);
                    showNotification('Network error. Please try again.', true);
                    textarea.value = addressText.textContent;
                    addressText.style.display = 'block';
                    textarea.style.display = 'none';
                    editBtn.style.display = 'inline-flex';
                    saveBtn.style.display = 'none';
                    resetBtn.style.display = 'none';
                } finally {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
            });
        });

        document.querySelectorAll('.action-btn.reset-shipping').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const shippingColumn = btn.closest('.shipping-details');
                if (!shippingColumn) return;
                
                const textarea = shippingColumn.querySelector('.shipping-edit-textarea');
                const addressText = shippingColumn.querySelector('.shipping-address-text');
                const originalAddress = shippingColumn.dataset.original;
                
                if (!textarea) return;
                
                textarea.value = originalAddress;
                
                const originalBtnText = btn.innerHTML;
                btn.innerHTML = '<span class="btn-text">Reset!</span>';
                btn.disabled = true;
                
                setTimeout(() => {
                    btn.innerHTML = originalBtnText;
                    btn.disabled = false;
                }, 500);
            });
        });
    }

    // ============= FILTER TAB CLICK HANDLERS =============
    if (filterTabs) {
        filterTabs.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const filter = tab.dataset.filter;
                filterOrders(filter);
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
                    submitReview.textContent = 'Submit';
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
                confirmCancel.textContent = 'Confirm';
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

    // ============= INITIAL LOAD =============
    initStarRating();
    loadOrders();
});