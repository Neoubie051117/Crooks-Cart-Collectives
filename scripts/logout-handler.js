// Crooks-Cart-Collectives/scripts/logout-handler.js
document.addEventListener('DOMContentLoaded', () => {
    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const modal = document.getElementById('logoutModal');
    const confirmBtn = document.getElementById('confirmLogout');
    const cancelBtn = document.getElementById('cancelLogout');

    // Check if we're actually logged in
    if (logoutTriggers.length === 0) {
        console.log('Not logged in - logout handlers disabled');
        return;
    }

    // Exit if modal doesn't exist
    if (!modal || !confirmBtn || !cancelBtn) {
        console.error('Logout modal elements not found');
        return;
    }

    // Open modal when logout is clicked
    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    });

    // Close modal functions
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    cancelBtn.addEventListener('click', closeModal);

    // Click outside to close
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Escape key to close
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeModal();
        }
    });

    // Confirm logout
    confirmBtn.addEventListener('click', async () => {
        try {
            // Try auth-handler.php first
            let response = await fetch('../database/auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: 'action=signout'
            });

            let data;
            try {
                data = await response.json();
            } catch (e) {
                // If auth-handler fails, try sign-out-handler.php
                response = await fetch('../database/sign-out-handler.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                data = await response.json();
            }

            if (data.status === 'success') {
                window.location.href = data.redirect || '../index.php';
            } else {
                window.location.href = '../index.php';
            }
        } catch (error) {
            console.error('Logout error:', error);
            window.location.href = '../index.php';
        }
    });
});