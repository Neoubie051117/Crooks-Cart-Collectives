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
        const navLinks = document.querySelectorAll(".nav-link, .sign-up");
        const logo = document.getElementById('logo');
        
        // Handle logo click for consistent navigation
        if (logo) {
            logo.style.transition = "opacity 0.5s ease-in-out, visibility 0s linear 0.5s";
            logo.style.cursor = "pointer";
            
            // Remove existing click handlers to prevent conflicts with the HTML anchor
            const newLogo = logo.cloneNode(true);
            logo.parentNode.replaceChild(newLogo, logo);
            
            // Fade in logo after load
            const fadeInLogo = () => {
                setTimeout(() => {
                    newLogo.style.visibility = "visible";
                    newLogo.style.opacity = 1;
                }, 1000);
            };

            if (newLogo.complete && newLogo.naturalHeight !== 0) {
                fadeInLogo();
            } else {
                newLogo.addEventListener("load", fadeInLogo);
            }
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
            document.addEventListener('click', (e) => {
                if (!mobileNav.contains(e.target) && !menuButton.contains(e.target)) {
                    closeMenu();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeMenu();
            });

            mobileNav.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') closeMenu();
            });
        }

        // Highlight active navigation link
        highlightActiveLink(navLinks);
        
        // Add page transition effects to navigation links
        addPageTransition(navLinks);
        
        // Adjust content margin based on header
        adjustContentMargin();
        window.addEventListener('resize', adjustContentMargin);
    }

    function highlightActiveLink(navLinks) {
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

    function addPageTransition(navLinks) {
    navLinks.forEach(link => {
        // Check if this is a navigation link from the header/menu
        const isHeaderLink = link.classList.contains('nav-link') || 
                             link.classList.contains('sign-in') || 
                             link.classList.contains('social-button');
        
        link.addEventListener("click", (e) => {
            const href = link.getAttribute("href");
            
            // Only apply transition to navigation links (not form buttons or regular links in content)
            if (href && isHeaderLink && !href.startsWith("#") && !href.includes("mailto:") && !href.startsWith("http")) {
                e.preventDefault();
                fadeOutAndNavigate(href);
            }
            // Let regular links (like "Log In" in sign-up.php) work normally
        });
    });
}

    function fadeOutAndNavigate(url) {
        const content = document.querySelector('.content');
        if (content) {
            content.style.opacity = 0;
            setTimeout(() => {
                window.location.href = url;
            }, 500);
        } else {
            window.location.href = url;
        }
    }

    function adjustContentMargin() {
        const header = document.querySelector('.header-bar');
        const content = document.querySelector('.content');
        if (header && content) {
            const currentPage = window.location.pathname.split('/').pop();
            const marginRules = {
                "container-activities.html": "0px",
                "sign-up.php": "0px",
                "sign-in.php": "0px"
            };
            content.style.marginTop = marginRules[currentPage] || "0";
        }
    }

    function addFavicon() {
        if (!document.querySelector("link[rel='icon']")) {
            const favicon = document.createElement("link");
            favicon.rel = "icon";
            favicon.type = "image/png";
            
            // Determine correct path for favicon
            const currentPath = window.location.pathname;
            let faviconPath = "assets/Logo.png";
            if (currentPath.includes('/pages/')) {
                faviconPath = "../assets/Logo.png";
            }
            
            favicon.href = faviconPath;
            document.head.appendChild(favicon);
        }
    }

    // Initialize header functionality
    initializeHeader();
    addFavicon();

    // Remove no-transition classes after delay for smooth animations
    const header = document.querySelector('.header-bar');
    const mobileNav = document.getElementById('mobileNav');

    if (header) {
        header.classList.add('header-delay');
    }

    if (mobileNav) {
        mobileNav.classList.add('header-delay');
    }

    setTimeout(() => {
        if (header) header.classList.remove('header-delay');
        if (mobileNav) mobileNav.classList.remove('header-delay');
    }, 500);
});