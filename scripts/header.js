// Update scripts/header.js
document.addEventListener("DOMContentLoaded", () => {
    // Content fade in effect
    const content = document.querySelector('.content');
    if (content) {
        content.style.opacity = 0;
        content.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            content.style.opacity = 1;
        }, 500);
    }
    
    function initializeHeader() {
        const menuButton = document.getElementById('menuButton');
        const mobileNav = document.getElementById('mobileNav');
        const logo = document.getElementById('logo');
        
        // Handle logo load
        if (logo) {
            // Set initial state
            logo.style.opacity = "1";
            logo.style.visibility = "visible";
            
            // If logo fails to load, show fallback
            logo.onerror = function() {
                this.src = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIGZpbGw9IiNGRjgyNDYiLz48dGV4dCB4PSIyMCIgeT0iMjAiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZmlsbD0id2hpdGUiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5DQ0M8L3RleHQ+PC9zdmc+";
            };
            
            // Load with timeout
            setTimeout(() => {
                if (logo.naturalWidth === 0) {
                    logo.style.opacity = "1";
                    logo.style.visibility = "visible";
                }
            }, 1000);
        }

        // Mobile menu functionality
        if (menuButton && mobileNav) {
            const backdrop = document.createElement('div');
            backdrop.className = 'menu-backdrop fade-transition';
            document.body.appendChild(backdrop);

            const toggleMenu = () => {
                const isOpen = mobileNav.classList.toggle('open');
                backdrop.classList.toggle('active', isOpen);
                document.body.style.overflow = isOpen ? 'hidden' : 'auto';
                menuButton.classList.toggle('open', isOpen);
            };

            const closeMenu = () => {
                mobileNav.classList.remove('open');
                backdrop.classList.remove('active');
                document.body.style.overflow = 'auto';
                menuButton.classList.remove('open');
            };

            menuButton.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMenu();
            });

            backdrop.addEventListener('click', closeMenu);
            
            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (mobileNav.classList.contains('open') && 
                    !mobileNav.contains(e.target) && 
                    !menuButton.contains(e.target)) {
                    closeMenu();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeMenu();
            });

            // Close menu when clicking a link
            mobileNav.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') {
                    setTimeout(closeMenu, 300); // Small delay for UX
                }
            });
        }

        // Highlight active navigation link
        highlightActiveLink();
        
        // Adjust content margin based on header
        adjustContentMargin();
        window.addEventListener('resize', adjustContentMargin);
    }

    function highlightActiveLink() {
        const navLinks = document.querySelectorAll('.nav-link');
        if (!navLinks.length) return;
        
        let currentPage = window.location.pathname.split('/').pop();
        if (currentPage === '' || currentPage === '/') {
            currentPage = 'index.php';
        }

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href && (href.endsWith(currentPage) || href.includes(currentPage.replace('.php', '')))) {
                link.classList.add('active');
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

    // Initialize header functionality
    initializeHeader();

    // Remove no-transition classes after delay for smooth animations
    setTimeout(() => {
        const header = document.querySelector('.header-bar');
        const mobileNav = document.getElementById('mobileNav');

        if (header) header.classList.remove('no-transition');
        if (mobileNav) mobileNav.classList.remove('no-transition');
    }, 500);
});