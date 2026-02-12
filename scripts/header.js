/* JavaScript File Content */
// scripts/header.js - FIXED VERSION

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
    
    // Initialize header with clean, non-conflicting code
    initializeHeader();
    
    // Remove no-transition classes after delay
    setTimeout(() => {
        const header = document.querySelector('.header-bar');
        const mobileNav = document.getElementById('mobileNav');
        
        if (header) header.classList.remove('no-transition');
        if (mobileNav) mobileNav.classList.remove('no-transition');
    }, 300);
});

function initializeHeader() {
    // Get elements
    const menuButton = document.getElementById('menuButton');
    const mobileNav = document.getElementById('mobileNav');
    const logo = document.getElementById('logo');
    
    // Handle logo
    if (logo) {
        logo.style.opacity = "1";
        logo.style.visibility = "visible";
        
        // Fallback if logo fails to load
        logo.onerror = function() {
            this.src = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIGZpbGw9IiNGRjgyNDYiLz48dGV4dCB4PSIyMCIgeT0iMjAiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZmlsbD0id2hpdGUiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5DQ0M8L3RleHQ+PC9zdmc+";
        };
    }
    
    // IMPORTANT: Mobile menu functionality - CLEAN VERSION
    if (menuButton && mobileNav) {
        // Remove any existing backdrop first
        const existingBackdrop = document.querySelector('.menu-backdrop');
        if (existingBackdrop) existingBackdrop.remove();
        
        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'menu-backdrop';
        document.body.appendChild(backdrop);
        
        // Toggle function
        function toggleMenu() {
            const isOpen = mobileNav.classList.contains('open');
            
            if (!isOpen) {
                // Open menu
                mobileNav.classList.add('open');
                backdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuButton.classList.add('active');
                
                // Force repaint for Android
                setTimeout(() => {
                    mobileNav.style.transform = 'translateX(0)';
                }, 10);
            } else {
                // Close menu
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = '';
            }
        }
        
        // Close menu function
        function closeMenu() {
            if (mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = '';
                menuButton.classList.remove('active');
                mobileNav.style.transform = '';
            }
        }
        
        // Event listeners - remove old ones first
        menuButton.replaceWith(menuButton.cloneNode(true));
        const newMenuButton = document.getElementById('menuButton');
        
        if (newMenuButton) {
            // Use both click and touchstart for Android
            newMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleMenu();
            });
            
            newMenuButton.addEventListener('touchstart', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleMenu();
            }, { passive: false });
        }
        
        // Backdrop click
        backdrop.addEventListener('click', closeMenu);
        backdrop.addEventListener('touchstart', closeMenu, { passive: false });
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('open') && 
                !mobileNav.contains(e.target) && 
                !(newMenuButton && newMenuButton.contains(e.target))) {
                closeMenu();
            }
        });
        
        // Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenu();
        });
        
        // Close when clicking links in mobile nav
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
            link.addEventListener('touchstart', closeMenu, { passive: false });
        });
    }
    
    // Highlight active link
    highlightActiveLink();
    
    // Adjust content margin
    adjustContentMargin();
    window.addEventListener('resize', adjustContentMargin);
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
            if (href.endsWith(currentPage) || 
                (currentPage === 'index.php' && href.includes('index.php'))) {
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