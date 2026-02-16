/* Crooks-Cart-Collectives/scripts/orders.js */
document.addEventListener('DOMContentLoaded', () => {
    const ordersList = document.getElementById('ordersList');
    const reviewModal = document.getElementById('reviewModal');
    const reviewForm = document.getElementById('reviewForm');
    const cancelReview = document.getElementById('cancelReview');
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInput = document.getElementById('ratingValue');
    
    const cancelModal = document.getElementById('cancelModal');
    const cancelCancel = document.getElementById('cancelCancel');
    const confirmCancel = document.getElementById('confirmCancel');
    
    const notifierModal = document.getElementById('notifierModal');
    const notifierMessage = document.getElementById('notifierMessage');
    const notifierClose = document.getElementById('notifierClose');
    
    let currentRating = 0;
    let currentCancelItemId = null;

    function showModal(modal) { modal.style.display = 'flex'; }
    function hideModal(modal) { modal.style.display = 'none'; }

    function hideAllModals() {
        hideModal(reviewModal);
        hideModal(cancelModal);
        hideModal(notifierModal);
        resetReviewForm();
        currentCancelItemId = null;
    }

    function showNotifier(message) {
        notifierMessage.textContent = message;
        showModal(notifierModal);
    }

    // Star rating (unchanged)
    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            const val = parseInt(star.dataset.value);
            stars.forEach((s, i) => {
                if (i < val) s.classList.add('hover');
                else s.classList.remove('hover');
            });
        });
        star.addEventListener('mouseout', () => {
            stars.forEach(s => s.classList.remove('hover'));
        });
        star.addEventListener('click', () => {
            currentRating = parseInt(star.dataset.value);
            ratingInput.value = currentRating;
            stars.forEach((s, i) => {
                if (i < currentRating) {
                    s.classList.add('active');
                    s.textContent = '★';
                } else {
                    s.classList.remove('active');
                    s.textContent = '☆';
                }
            });
        });
    });

    // Load orders
    async function loadOrders() {
        try {
            const response = await fetch('../database/order-handler.php?action=get_customer_orders');
            const result = await response.json();
            console.log('Orders response:', result); // Debug: see what the server returns
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

    // Render orders with fallback values
    function renderOrders(orders) {
    if (!orders || orders.length === 0) {
        ordersList.innerHTML = `
            <div class="empty-orders">
                <p>You haven't placed any orders yet.</p>
                <a href="products.php" class="btn">Start Shopping</a>
            </div>
        `;
        return;
    }

    let html = '';

    orders.forEach(order => {
        const orderDate = order.order_date ? formatDate(order.order_date) : 'Date unavailable';
        const orderStatus = order.order_status || 'pending';
        const total = Number(order.total_amount).toFixed(2);
        const shippingAddress = escapeHtml(order.shipping_address || 'Address not available');

        html += `
            <div class="order-container">
                <div class="order-header">
                    <div class="order-header-left">
                        <span class="order-id">Order #${order.order_id}</span>
                        <span class="order-date">${orderDate}</span>
                    </div>
                    <div class="order-header-right">
                        <span class="order-total">₱${total}</span>
                        <span class="order-status-badge ${orderStatus}">${orderStatus}</span>
                    </div>
                </div>

                <div class="order-body">
                    <div class="order-items-column">
                        <div class="order-items">
        `;

        order.items.forEach(item => {
            const imagePath = getImagePath(item.image_path);
            const itemStatus = item.status || 'pending';
            const canCancel = ['pending', 'confirmed'].includes(itemStatus);
            const reviewed = item.reviewed > 0;
            const productName = escapeHtml(item.name || 'Product');
            const sellerName = escapeHtml(item.business_name || 'Unknown Seller');
            const priceAtTime = Number(item.price_at_time).toFixed(2);
            const quantity = item.quantity;
            const subtotal = Number(item.subtotal || (item.price_at_time * item.quantity)).toFixed(2);

            html += `
                <div class="order-item" data-status="${itemStatus}">
                    <img src="${imagePath}" alt="${productName}" class="order-item-image"
                         onerror="this.onerror=null; this.src='../assets/image/icons/package.svg';">
                    
                    <div class="order-item-details">
                        <div class="order-item-title">
                            <a href="product-details.php?id=${item.product_id}" class="product-link">
                                ${productName}
                            </a>
                        </div>
                        
                        <div class="order-item-seller">${sellerName}</div>
                        
                        <div class="order-item-pricing">
                            <span class="order-item-price">₱${priceAtTime}</span>
                            <span class="order-item-quantity">× ${quantity}</span>
                            <span class="order-item-subtotal">₱${subtotal}</span>
                        </div>
                        
                        <div class="order-item-status-badge ${itemStatus}">${itemStatus}</div>
                        
                        <div class="order-item-actions">
            `;

            if (itemStatus === 'delivered' && !reviewed) {
                html += `<button class="action-btn review" data-item="${item.order_item_id}" data-product="${item.product_id}">Write Review</button>`;
            } else if (reviewed) {
                html += `<span class="reviewed-badge">✓ Reviewed</span>`;
            }
            
            if (canCancel) {
                html += `<button class="action-btn cancel" data-item="${item.order_item_id}">Cancel Item</button>`;
            }

            html += `<a href="product-details.php?id=${item.product_id}" class="action-btn view">View Product</a>`;

            html += `
                        </div>
                    </div>
                </div>
            `;
        });

        // Price summary and shipping columns
        html += `
                        </div>
                    </div>
                    <div class="order-price-summary">
                        <div class="price-summary-title">Order Summary</div>
                        <div class="price-row">
                            <span>Subtotal</span>
                            <span class="value">₱${total}</span>
                        </div>
                        <div class="price-row">
                            <span>Shipping</span>
                            <span class="value">Free</span>
                        </div>
                        <div class="price-row total">
                            <span>Total</span>
                            <span class="value">₱${total}</span>
                        </div>
                    </div>
                    <div class="order-shipping-location">
                        <div class="shipping-address">
                            <strong>Shipping Address</strong>
                            <p>${shippingAddress}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    ordersList.innerHTML = html;
    attachEventListeners();
}

    // Helper functions
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    function getImagePath(path) {
        if (!path) return '../assets/image/icons/package.svg';
        if (path.startsWith('assets/')) return '../' + path;
        if (path.startsWith('http')) return path;
        return '../' + path;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function attachEventListeners() {
        document.querySelectorAll('.action-btn.review').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                document.getElementById('reviewOrderItemId').value = btn.dataset.item;
                document.getElementById('reviewProductId').value = btn.dataset.product;
                resetReviewForm();
                showModal(reviewModal);
            });
        });
        
        document.querySelectorAll('.action-btn.cancel').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                currentCancelItemId = btn.dataset.item;
                showModal(cancelModal);
            });
        });
    }

    function resetReviewForm() {
        reviewForm.reset();
        stars.forEach(s => {
            s.classList.remove('active', 'hover');
            s.textContent = '☆';
        });
        currentRating = 0;
        ratingInput.value = '';
    }

    // Review submission
    reviewForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        if (!ratingInput.value) {
            showNotifier('Please select a rating');
            return;
        }
        
        const formData = new FormData();
        formData.append('action', 'add_review');
        formData.append('order_item_id', document.getElementById('reviewOrderItemId').value);
        formData.append('product_id', document.getElementById('reviewProductId').value);
        formData.append('rating', ratingInput.value);
        formData.append('comment', document.getElementById('comment').value);
        
        try {
            const response = await fetch('../database/review-handler.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.status === 'success') {
                showNotifier('Review submitted successfully!');
                hideModal(reviewModal);
                resetReviewForm();
                loadOrders();
            } else {
                showNotifier(result.message || 'Failed to submit review');
            }
        } catch (error) {
            console.error('Review error:', error);
            showNotifier('Network error. Please try again.');
        }
    });

    // Cancel item
    confirmCancel.addEventListener('click', async () => {
        if (!currentCancelItemId) return;
        
        confirmCancel.disabled = true;
        confirmCancel.textContent = 'Processing...';
        
        try {
            const formData = new URLSearchParams();
            formData.append('action', 'cancel_item');
            formData.append('item_id', currentCancelItemId);
            
            const response = await fetch('../database/order-handler.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: formData
            });
            
            const result = await response.json();
            if (result.status === 'success') {
                showNotifier('Item cancelled successfully');
                hideModal(cancelModal);
                loadOrders();
            } else {
                showNotifier(result.message || 'Failed to cancel item');
            }
        } catch (error) {
            console.error('Cancel error:', error);
            showNotifier('Network error. Please try again.');
        } finally {
            confirmCancel.disabled = false;
            confirmCancel.textContent = 'Yes, Cancel';
            currentCancelItemId = null;
        }
    });

    // Modal close handlers
    cancelCancel.addEventListener('click', () => {
        hideModal(cancelModal);
        currentCancelItemId = null;
    });

    cancelReview.addEventListener('click', () => {
        hideModal(reviewModal);
        resetReviewForm();
    });

    notifierClose.addEventListener('click', () => {
        hideModal(notifierModal);
    });

    // Close modals when clicking outside
    [cancelModal, reviewModal, notifierModal].forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) hideModal(modal);
        });
    });

    // Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') hideAllModals();
    });

    // Load orders on page start
    loadOrders();
});