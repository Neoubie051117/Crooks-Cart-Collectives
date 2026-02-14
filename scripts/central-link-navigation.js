const PathManager = {
    init() {
        console.log('PathManager initializing for Crooks-Cart-Collectives...');
        this.fixDashboardLinks();
        return this;
    },

    getBasePath() {
        const currentPath = window.location.pathname;
        if (currentPath.includes('/pages/')) {
            return '../';
        }
        return '';
    },

    fixDashboardLinks() {
        console.log('Fixing navigation links...');
        
        const basePath = this.getBasePath();
        const currentPage = window.location.pathname.split('/').pop();
        
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            
            if (href.startsWith('http') || href.startsWith('#') || 
                href.startsWith('mailto:') || href.startsWith('//') ||
                href.startsWith('tel:') || href.startsWith('javascript:')) {
                return;
            }
            
            // Fix paths for renamed files
            if (href.includes('customer-sign-up.php')) {
                link.href = link.href.replace('customer-sign-up.php', 'sign-up.php');
            }
            
            if (href.includes('seller-registration.php')) {
                link.href = link.href.replace('seller-registration.php', 'seller-fill-form.php');
            }
            
            if (href.includes('complaint.php')) {
                link.href = link.href.replace('complaint.php', 'report-seller.php');
            }
            
            // Fix asset paths
            if (href.includes('assets/') && !href.includes('assets/image/')) {
                const assetFile = href.split('/').pop();
                if (assetFile === 'Logo.png') {
                    link.href = link.href.replace('assets/Logo.png', 'assets/image/brand/Logo.png');
                } else if (assetFile.match(/(Showcase|Formal|Placeholder|Valid|complaint|facebook|github|hamburger|icons8|mail)/i)) {
                    link.href = link.href.replace('assets/' + assetFile, 'assets/image/icons/' + assetFile);
                }
            }
        });
        
        console.log('Link fixing complete');
    },
    
    getDatabasePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'database/' + fileName;
    },
    
    getAssetPath(fileName, type = 'icons') {
        const basePath = this.getBasePath();
        if (type === 'brand') {
            return basePath + 'assets/image/brand/' + fileName;
        }
        return basePath + 'assets/image/icons/' + fileName;
    },
    
    getPagePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'pages/' + fileName;
    }
};

window.PathManager = PathManager;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => PathManager.init());
} else {
    setTimeout(() => PathManager.init(), 10);
}