document.addEventListener('DOMContentLoaded', () => {
    const placeOrderBtn = document.getElementById('placeOrderBtn');
    const notifier = document.getElementById('checkoutNotifier');
    const messageEl = document.getElementById('checkoutMessage');
    const closeBtn = document.getElementById('checkoutCloseBtn');

    function showNotifier(msg, redirect = null) {
        messageEl.textContent = msg;
        notifier.classList.remove('hidden');
        if (redirect) {
            setTimeout(() => {
                window.location.href = redirect;
            }, 2000);
        }
    }

    closeBtn.addEventListener('click', () => {
        notifier.classList.add('hidden');
    });

    placeOrderBtn.addEventListener('click', async () => {
        placeOrderBtn.disabled = true;
        placeOrderBtn.textContent = 'Processing...';

        try {
            const response = await fetch('../database/checkout-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ action: 'place_order' })
            });

            const result = await response.json();

            if (result.status === 'success') {
                showNotifier('Order placed successfully! Redirecting to your orders...', result.redirect);
            } else {
                showNotifier('Error: ' + result.message);
                placeOrderBtn.disabled = false;
                placeOrderBtn.textContent = 'Place Order';
            }
        } catch (error) {
            console.error('Checkout error:', error);
            showNotifier('Network error. Please try again.');
            placeOrderBtn.disabled = false;
            placeOrderBtn.textContent = 'Place Order';
        }
    });
});