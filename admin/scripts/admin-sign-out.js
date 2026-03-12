// Crooks-Cart-Collectives/admin/scripts/admin-sign-out.js
// FIXED: Proper logout functionality with reliable redirect

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    
    let isProcessing = false;

    if (!logoutTriggers.length || !logoutModal) {
        console.error('Admin logout elements not found - check if admin is logged in');
        return;
    }

    // ===== FIXED: Get correct relative path based on current location =====
    function getRedirectPath() {
        const currentPath = window.location.pathname;
        
        // If we're in admin/pages directory
        if (currentPath.includes('/admin/pages/')) {
            return 'admin-sign-in.php';
        }
        // If we're in admin/includes directory
        else if (currentPath.includes('/admin/includes/')) {
            return '../pages/admin-sign-in.php';
        }
        // If we're in admin root
        else if (currentPath.includes('/admin/')) {
            return 'pages/admin-sign-in.php';
        }
        // Default fallback
        else {
            return 'pages/admin-sign-in.php';
        }
    }

    // ===== FIXED: Get API path using relative paths only =====
    function getApiPath() {
        const currentPath = window.location.pathname;
        
        // If we're in admin/pages directory
        if (currentPath.includes('/admin/pages/')) {
            return '../database/admin-sign-out-handler.php';
        }
        // If we're in admin/includes directory
        else if (currentPath.includes('/admin/includes/')) {
            return '../../database/admin-sign-out-handler.php';
        }
        // If we're in admin root
        else if (currentPath.includes('/admin/')) {
            return 'database/admin-sign-out-handler.php';
        }
        // Default fallback
        else {
            return 'database/admin-sign-out-handler.php';
        }
    }

    // Show modal when logout is clicked
    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            // Don't show modal if already processing
            if (isProcessing) {
                return;
            }
            
            logoutModal.style.display = 'flex';
        });
    });

    // Hide modal on cancel
    if (cancelLogout) {
        cancelLogout.addEventListener('click', () => {
            logoutModal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === logoutModal) {
            logoutModal.style.display = 'none';
        }
    });

    // Handle confirm logout
    if (confirmLogout) {
        confirmLogout.addEventListener('click', async () => {
            // Prevent multiple simultaneous logout attempts
            if (isProcessing) {
                return;
            }
            
            isProcessing = true;
            
            const originalText = confirmLogout.textContent;
            confirmLogout.textContent = 'Logging out...';
            confirmLogout.disabled = true;

            // Disable cancel button too
            if (cancelLogout) {
                cancelLogout.disabled = true;
            }

            try {
                const apiPath = getApiPath();
                console.log('Admin logging out using:', apiPath);
                
                // Use fetch with cache busting
                const response = await fetch(apiPath + '?t=' + Date.now(), {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const result = await response.json();
                console.log('Admin logout response:', result);

                // ===== FIXED: Always redirect to sign-in page =====
                const redirectPath = getRedirectPath();
                console.log('Redirecting to:', redirectPath);
                
                // Use window.location.href for reliable redirect
                window.location.href = redirectPath;
                
            } catch (error) {
                console.error('Admin logout error:', error);
                
                // ===== FIXED: Force redirect even on error =====
                console.log('Admin logout encountered error - forcing redirect');
                const redirectPath = getRedirectPath();
                window.location.href = redirectPath;
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && logoutModal.style.display === 'flex') {
            logoutModal.style.display = 'none';
        }
    });

    // Clean up on page unload
    window.addEventListener('beforeunload', () => {
        if (confirmLogout) {
            confirmLogout.disabled = false;
        }
        if (cancelLogout) {
            cancelLogout.disabled = false;
        }
    });
});