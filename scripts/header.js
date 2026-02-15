/* JavaScript File Content */
document.addEventListener("DOMContentLoaded", () => {
    // Content fade in effect
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 100);
    }
    
    initializeHeader();
    
    setTimeout(() => {
        const header = document.querySelector('.header-bar');
        const mobileNav = document.getElementById('mobileNav');
        
        if (header) header.classList.remove('no-transition');
        if (mobileNav) mobileNav.classList.remove('no-transition');
    }, 300);
});

function initializeHeader() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    const logo = document.getElementById('logo');
    
    // Handle logo
    if (logo) {
        logo.style.opacity = "1";
        logo.style.visibility = "visible";
        
        logo.onerror = function() {
            this.src = "assets/image/brand/Logo.png";
        };
    }
    
    // Mobile menu functionality - FIXED VERSION
    if (menuButton && mobileNav) {
        console.log('Initializing mobile menu'); // Debug log
        
        // Remove any existing inline styles that might interfere
        mobileNav.style.transform = '';
        mobileNav.style.display = '';
        
        // Remove any existing backdrop to avoid duplicates
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        // Ensure mobile nav is hidden by default (using transform, not display)
        mobileNav.classList.remove('open');
        
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            console.log('Toggling menu, currently open:', isOpen); // Debug log
            
            if (!isOpen) {
                // Open menu
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
                
                // Debug - check if class was added
                console.log('Mobile nav classes after open:', mobileNav.className);
                console.log('Mobile nav transform style:', window.getComputedStyle(mobileNav).transform);
            } else {
                // Close menu
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
        }
        
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
            }
        }
        
        // Event listeners
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });
        
        backdrop.addEventListener('click', closeMenu);
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !menuButton.contains(e.target)) {
                closeMenu();
            }
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        // Close when clicking a link inside mobile nav
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
        
        // Handle window resize - close mobile menu on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1005 && mobileNav.classList.contains('open')) {
                closeMenu();
            }
        });
        
        // Debug - log initial state
        console.log('Mobile nav initial classes:', mobileNav.className);
        console.log('Mobile nav initial transform:', window.getComputedStyle(mobileNav).transform);
    } else {
        console.error('Menu elements not found:', {
            menuButton: !!menuButton,
            mobileNav: !!mobileNav
        });
        
        // Try again after a short delay (in case elements are loaded dynamically)
        setTimeout(() => {
            const retryMenuButton = document.getElementById('menuButton');
            const retryMobileNav = document.getElementById('mobileNav');
            
            if (retryMenuButton && retryMobileNav && !window.menuInitialized) {
                window.menuInitialized = true;
                console.log('Retrying menu initialization...');
                
                // Re-run initialization
                const retryBackdrop = document.querySelector('.menu-backdrop');
                if (retryBackdrop) retryBackdrop.remove();
                
                // Recreate backdrop
                const newBackdrop = document.createElement('div');
                newBackdrop.className = 'menu-backdrop';
                document.body.appendChild(newBackdrop);
                
                retryMobileNav.classList.remove('open');
                
                retryMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    if (retryMobileNav.classList.contains('open')) {
                        retryMobileNav.classList.remove('open');
                        newBackdrop.classList.remove('active');
                        document.body.style.overflow = '';
                        retryMenuButton.classList.remove('active');
                    } else {
                        retryMobileNav.classList.add('open');
                        newBackdrop.classList.add('active');
                        document.body.style.overflow = 'hidden';
                        retryMenuButton.classList.add('active');
                    }
                });
                
                newBackdrop.addEventListener('click', function() {
                    retryMobileNav.classList.remove('open');
                    newBackdrop.classList.remove('active');
                    document.body.style.overflow = '';
                    retryMenuButton.classList.remove('active');
                });
            }
        }, 500);
    }
    
    highlightActiveLink();
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
    
    // Update cart count if user is logged in
    updateCartCount();
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    if (!navLinks.length) return;
    
    let currentPage = window.location.pathname.split('/').pop();
    if (!currentPage || currentPage === '/') {
        currentPage = 'index.php';
    }
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href) {
            const filename = href.split('/').pop();
            if (filename === currentPage || 
                (currentPage === 'index.php' && filename === 'index.php')) {
                link.classList.add('active');
            }
        }
    });
}

function adjustContentMargin() {
    const header = document.querySelector('.header-bar');
    const content = document.querySelector('.content');
    if (header && content) {
        const headerHeight = header.offsetHeight;
        content.style.marginTop = headerHeight + 'px';
    }
}

// Function to update cart count
async function updateCartCount() {
    // Check if user is logged in by looking for logout modal or checking session via PHP
    const logoutModal = document.getElementById('logoutModal');
    if (!logoutModal) return; // User not logged in
    
    const cartCountEl = document.getElementById('cartCount');
    if (!cartCountEl) return;
    
    try {
        // Determine correct path for API call
        const currentPath = window.location.pathname;
        let apiPath = '../database/cart-handler.php?action=get_count';
        
        if (currentPath.includes('/pages/')) {
            apiPath = '../database/cart-handler.php?action=get_count';
        } else {
            apiPath = 'database/cart-handler.php?action=get_count';
        }
        
        const response = await fetch(apiPath);
        const data = await response.json();
        
        if (data.status === 'success' && data.count > 0) {
            cartCountEl.textContent = data.count;
            cartCountEl.style.display = 'inline';
        } else {
            cartCountEl.style.display = 'none';
        }
    } catch (e) {
        console.error('Failed to fetch cart count', e);
    }
}

// Export functions for use in other scripts if needed
window.HeaderFunctions = {
    updateCartCount: updateCartCount,
    highlightActiveLink: highlightActiveLink,
    adjustContentMargin: adjustContentMargin
};

// Add a small test to verify the menu is working
window.testMenu = function() {
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    
    if (menuButton && mobileNav) {
        console.log('Menu button found:', menuButton);
        console.log('Mobile nav found:', mobileNav);
        console.log('Mobile nav current classes:', mobileNav.className);
        console.log('Mobile nav computed style display:', window.getComputedStyle(mobileNav).display);
        console.log('Mobile nav computed style transform:', window.getComputedStyle(mobileNav).transform);
        console.log('Mobile nav computed style visibility:', window.getComputedStyle(mobileNav).visibility);
        console.log('Mobile nav computed style opacity:', window.getComputedStyle(mobileNav).opacity);
        
        // Manually toggle to test
        if (mobileNav.classList.contains('open')) {
            mobileNav.classList.remove('open');
        } else {
            mobileNav.classList.add('open');
        }
        console.log('Mobile nav classes after manual toggle:', mobileNav.className);
    } else {
        console.log('Menu elements not found for test');
    }
};

// Run test after a short delay
setTimeout(() => {
    if (window.location.href.includes('debug') || window.location.hash === '#debug') {
        window.testMenu();
    }
}, 1000);