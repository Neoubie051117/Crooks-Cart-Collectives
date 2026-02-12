/* JavaScript File Content: central-link-navigation.js */

const PathManager = {
    init() {
        console.log('PathManager initializing for Crooks-Cart-Collectives...');
        
        // Only fix dashboard navigation links
        this.fixDashboardLinks();
        
        return this;
    },

    getBasePath() {
        const currentPath = window.location.pathname;
        
        // Simple base path detection for navigation
        if (currentPath.includes('/pages/')) {
            return '../';
        }
        return '';
    },

    // ONLY fix dashboard navigation links - NOT stylesheets or scripts
    fixDashboardLinks() {
        console.log('Fixing dashboard navigation links...');
        
        const basePath = this.getBasePath();
        const currentPage = window.location.pathname.split('/').pop();
        
        // Only process anchor tags with href attributes
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            
            // Skip external links, anchors, mailto, etc.
            if (href.startsWith('http') || href.startsWith('#') || 
                href.startsWith('mailto:') || href.startsWith('//') ||
                href.startsWith('tel:') || href.startsWith('javascript:')) {
                return;
            }
            
            // Fix dashboard links that don't have the correct path
            if (href.includes('dashboard') && !href.includes('/pages/')) {
                if (currentPage === 'sign-in.php' || currentPage === 'customer-sign-up.php') {
                    link.href = 'customer-dashboard.php';
                    console.log(`Fixed dashboard link: ${href} -> ${link.href}`);
                } else if (currentPage === 'index.php') {
                    link.href = 'pages/customer-dashboard.php';
                    console.log(`Fixed dashboard link: ${href} -> ${link.href}`);
                }
            }
            
            // Fix profile link
            if (href.includes('customer-profile') && !href.includes('/pages/')) {
                if (currentPage === 'index.php') {
                    link.href = 'pages/customer-profile.php';
                    console.log(`Fixed profile link: ${href} -> ${link.href}`);
                }
            }
        });
        
        console.log('Dashboard link fixing complete');
    },
    
    // Helper method for database paths (kept for compatibility)
    getDatabasePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'database/' + fileName;
    },
    
    // Helper method for asset paths (kept for compatibility)
    getAssetPath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'assets/' + fileName;
    },
    
    // Helper method for page paths (kept for compatibility)
    getPagePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'pages/' + fileName;
    }
};

window.PathManager = PathManager;

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => PathManager.init());
} else {
    // Run after a tiny delay to ensure DOM is ready
    setTimeout(() => PathManager.init(), 10);
}