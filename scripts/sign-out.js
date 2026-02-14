document.addEventListener('DOMContentLoaded', () => {
    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const modal = document.getElementById('logoutModal');
    const confirmBtn = document.getElementById('confirmLogout');
    const cancelBtn = document.getElementById('cancelLogout');

    if (logoutTriggers.length === 0) {
        return;
    }

    if (!modal || !confirmBtn || !cancelBtn) {
        console.error('Logout modal elements not found');
        return;
    }

    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    });

    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    cancelBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeModal();
        }
    });

    confirmBtn.addEventListener('click', async () => {
        try {
            const currentPath = window.location.pathname;
            let logoutUrl = '';
            let redirectUrl = '';
            
            if (currentPath.includes('/pages/')) {
                logoutUrl = '../database/auth-handler.php';
                redirectUrl = '../index.php';
            } else {
                logoutUrl = 'database/auth-handler.php';
                redirectUrl = 'index.php';
            }

            const response = await fetch(logoutUrl, {
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
                const fallbackUrl = currentPath.includes('/pages/') 
                    ? '../database/sign-out-handler.php' 
                    : 'database/sign-out-handler.php';
                
                const fallbackResponse = await fetch(fallbackUrl, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                data = await fallbackResponse.json();
            }

            window.location.href = redirectUrl;
            
        } catch (error) {
            console.error('Logout error:', error);
            const currentPath = window.location.pathname;
            if (currentPath.includes('/pages/')) {
                window.location.href = '../index.php';
            } else {
                window.location.href = 'index.php';
            }
        }
    });
});