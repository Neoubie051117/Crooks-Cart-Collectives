// Crooks-Cart-Collectives/scripts/sign-out.js
// FIXED: Uses relative paths only, no hardcoded absolute paths

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const logoutTriggers = document.querySelectorAll('.logout-trigger');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');
    
    let isProcessing = false;
    let pendingLogout = false;

    if (!logoutTriggers.length || !logoutModal) {
        console.error('Logout elements not found - check if user is logged in');
        return;
    }

    // ===== FIXED: Get correct relative redirect path based on current location =====
    function getRedirectPath() {
        const currentPath = window.location.pathname;
        
        // If we're in pages directory
        if (currentPath.includes('/pages/')) {
            return '../index.php?t=' + Date.now();
        }
        // If we're in root directory
        else if (currentPath === '/' || currentPath.endsWith('index.php')) {
            return 'index.php?t=' + Date.now();
        }
        // If we're in some other directory (like admin)
        else if (currentPath.includes('/admin/')) {
            return '../index.php?t=' + Date.now();
        }
        // Default fallback
        else {
            return 'index.php?t=' + Date.now();
        }
    }

    // ===== FIXED: Get API path using relative paths only =====
    function getApiPath() {
        const currentPath = window.location.pathname;
        
        // If we're in pages directory
        if (currentPath.includes('/pages/')) {
            return '../database/sign-out-handler.php';
        }
        // If we're in root directory
        else if (currentPath === '/' || currentPath.endsWith('index.php')) {
            return 'database/sign-out-handler.php';
        }
        // If we're in admin area (shouldn't happen, but just in case)
        else if (currentPath.includes('/admin/')) {
            return '../database/sign-out-handler.php';
        }
        // Default fallback
        else {
            return 'database/sign-out-handler.php';
        }
    }

    // Show modal when logout is clicked
    logoutTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            // Don't show modal if already processing
            if (isProcessing || pendingLogout) {
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
            if (isProcessing || pendingLogout) {
                return;
            }
            
            isProcessing = true;
            pendingLogout = true;
            
            const originalText = confirmLogout.textContent;
            confirmLogout.textContent = 'Logging out...';
            confirmLogout.disabled = true;

            // Disable cancel button too
            if (cancelLogout) {
                cancelLogout.disabled = true;
            }

            try {
                const apiPath = getApiPath();
                console.log('Logging out using:', apiPath);
                
                // Add cache-busting parameter to URL
                const url = new URL(apiPath, window.location.origin);
                url.searchParams.append('t', Date.now());
                
                // Use AbortController for timeout
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 5000); // 5 second timeout
                
                const response = await fetch(url.toString(), {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Cache-Control': 'no-cache, no-store, must-revalidate',
                        'Pragma': 'no-cache'
                    },
                    credentials: 'same-origin',
                    signal: controller.signal
                });

                clearTimeout(timeoutId);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                console.log('Logout response:', result);

                // ===== FIXED: Use relative redirect path =====
                const redirectPath = getRedirectPath();
                console.log('Redirecting to:', redirectPath);
                window.location.replace(redirectPath);
                
            } catch (error) {
                console.error('Logout error:', error);
                
                // ===== FIXED: Always redirect using relative path on error too =====
                console.log('Logout encountered error - forcing redirect');
                const redirectPath = getRedirectPath();
                window.location.replace(redirectPath);
            } finally {
                // These won't execute if redirect happens, but just in case
                isProcessing = false;
                pendingLogout = false;
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