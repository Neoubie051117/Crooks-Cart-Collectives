document.addEventListener('DOMContentLoaded', () => {
    const ordersList = document.getElementById('sellerOrdersList');

    async function loadOrders() {
        try {
            const response = await fetch('../database/order-handler.php?action=get_seller_orders');
            const result = await response.json();
            if (result.status === 'success') {
                renderOrders(result.data);
            } else {
                ordersList.innerHTML = '<p class="error">Failed to load orders.</p>';
            }
        } catch (error) {
            console.error('Error loading seller orders:', error);
            ordersList.innerHTML = '<p class="error">Network error.</p>';
        }
    }

    function renderOrders(orders) {
        if (!orders.length) {
            ordersList.innerHTML = '<p class="empty">No orders yet.</p>';
            return;
        }

        let html = '';
        orders.forEach(order => {
            const orderDate = new Date(order.order_date).toLocaleDateString();
            html += `
                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">Order #${order.order_id}</span>
                        <span class="order-date">${orderDate}</span>
                        <span class="customer-info">${order.first_name} ${order.last_name}</span>
                    </div>
                    <div class="order-body">
                        <div class="order-items">
            `;
            order.items.forEach(item => {
                const image = item.image_path ? '../' + item.image_path : '../assets/image/icons/PlaceholderAssetProduct.png';
                html += `
                    <div class="order-item" data-item-id="${item.order_item_id}">
                        <img src="${image}" alt="${item.name}" class="order-item-image">
                        <div class="order-item-details">
                            <h4>${item.name}</h4>
                            <p class="item-price">₱${Number(item.price_at_time).toFixed(2)} x ${item.quantity}</p>
                        </div>
                        <div class="item-status ${item.seller_status}">${item.seller_status}</div>
                        <div class="item-actions">
                            ${item.seller_status === 'pending' ? `<button class="status-btn ship" data-item="${item.order_item_id}" data-status="shipped">Mark Shipped</button>` : ''}
                            ${item.seller_status === 'shipped' ? `<button class="status-btn deliver" data-item="${item.order_item_id}" data-status="delivered">Mark Delivered</button>` : ''}
                        </div>
                    </div>
                `;
            });
            html += `
                        </div>
                        <div class="order-shipping">
                            <h4>Shipping Address</h4>
                            <p>${order.shipping_address}</p>
                            <p>Contact: ${order.contact_number} | ${order.email}</p>
                        </div>
                    </div>
                </div>
            `;
        });
        ordersList.innerHTML = html;

        // Attach status update events
        document.querySelectorAll('.status-btn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const itemId = btn.dataset.item;
                const newStatus = btn.dataset.status;
                btn.disabled = true;

                try {
                    const response = await fetch('../database/order-handler.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({
                            action: 'update_item_status',
                            item_id: itemId,
                            status: newStatus
                        })
                    });
                    const result = await response.json();
                    if (result.status === 'success') {
                        loadOrders(); // refresh
                    } else {
                        alert('Error: ' + result.message);
                        btn.disabled = false;
                    }
                } catch (error) {
                    console.error('Status update error:', error);
                    alert('Network error');
                    btn.disabled = false;
                }
            });
        });
    }

    loadOrders();
});