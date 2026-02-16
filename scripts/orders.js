document.addEventListener('DOMContentLoaded', () => {
    const ordersList = document.getElementById('ordersList');
    const reviewModal = document.getElementById('reviewModal');
    const reviewForm = document.getElementById('reviewForm');
    const cancelReview = document.getElementById('cancelReview');
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInput = document.getElementById('ratingValue');
    let currentRating = 0;

    // Star rating hover/click
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
            if (result.status === 'success') {
                renderOrders(result.data);
            } else {
                ordersList.innerHTML = '<p class="error">Failed to load orders.</p>';
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            ordersList.innerHTML = '<p class="error">Network error.</p>';
        }
    }

    function renderOrders(orders) {
        if (!orders.length) {
            ordersList.innerHTML = '<p class="empty">You have no orders yet.</p>';
            return;
        }

        let html = '';
        orders.forEach(order => {
            const orderDate = new Date(order.order_date).toLocaleDateString();
            const statusClass = order.status.toLowerCase();
            html += `
                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">Order #${order.order_id}</span>
                        <span class="order-date">${orderDate}</span>
                        <span class="order-status ${statusClass}">${order.status}</span>
                    </div>
                    <div class="order-body">
                        <div class="order-items">
            `;
            order.items.forEach(item => {
                const image = item.image_path ? '../' + item.image_path : '../assets/image/icons/PlaceholderAssetProduct.png';
                const reviewed = item.reviewed > 0;
                const itemStatus = item.seller_status || 'pending';
                html += `
                    <div class="order-item">
                        <img src="${image}" alt="${item.name}" class="order-item-image">
                        <div class="order-item-details">
                            <h4>${item.name}</h4>
                            <p class="order-item-seller">Seller: ${item.business_name}</p>
                            <p class="order-item-price">₱${Number(item.price_at_time).toFixed(2)} x ${item.quantity}</p>
                            <p class="order-item-status ${itemStatus}">Status: ${itemStatus}</p>
                `;
                if (itemStatus === 'delivered' && !reviewed) {
                    html += `<button class="review-btn" data-order="${order.order_id}" data-product="${item.product_id}">Write Review</button>`;
                } else if (reviewed) {
                    html += `<span class="reviewed-badge">✓ Reviewed</span>`;
                }
                html += `
                        </div>
                    </div>
                `;
            });
            html += `
                        </div>
                        <div class="order-total">
                            <span>Total:</span>
                            <span>₱${Number(order.total_amount).toFixed(2)}</span>
                        </div>
                    </div>
                </div>
            `;
        });
        ordersList.innerHTML = html;

        // Attach review button events
        document.querySelectorAll('.review-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('reviewOrderId').value = btn.dataset.order;
                document.getElementById('reviewProductId').value = btn.dataset.product;
                reviewModal.classList.remove('hidden');
            });
        });
    }

    // Cancel review
    cancelReview.addEventListener('click', () => {
        reviewModal.classList.add('hidden');
        resetReviewForm();
    });

    // Submit review
    reviewForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(reviewForm);
        formData.append('action', 'add_review');

        try {
            const response = await fetch('../database/review-handler.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert('Review submitted!');
                reviewModal.classList.add('hidden');
                resetReviewForm();
                loadOrders(); // refresh
            } else {
                alert('Error: ' + result.message);
            }
        } catch (error) {
            console.error('Review error:', error);
            alert('Network error');
        }
    });

    function resetReviewForm() {
        reviewForm.reset();
        stars.forEach(s => {
            s.classList.remove('active');
            s.textContent = '☆';
        });
        currentRating = 0;
        ratingInput.value = '';
    }

    loadOrders();
});