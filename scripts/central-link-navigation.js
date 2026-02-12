/* JavaScript File Content: central-link-navigation.js */

const PathManager = {
    init() {
        console.log('PathManager initializing...');
        
        this.fixAllPaths();
        
        setTimeout(() => this.fixAllPaths(), 500);
        
        return this;
    },

    getBasePath() {
        const currentPath = window.location.pathname;
        let basePath = '';
        
        console.log('Current path:', currentPath);
        
        if (currentPath.includes('/pages/')) {
            basePath = '../';
        } else if (currentPath.includes('/database/') || 
                   currentPath.includes('/scripts/') || 
                   currentPath.includes('/styles/')) {
            basePath = '../';
        } else if (currentPath.includes('/Crooks-Cart-Collectives/')) {
            basePath = '';
        } else {
            basePath = '';
        }
        
        console.log('Base path determined:', basePath);
        return basePath;
    },

    fixAllPaths() {
        console.log('Fixing all paths...');
        
        const basePath = this.getBasePath();
        const currentPage = window.location.pathname.split('/').pop();
        
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            
            if (href.startsWith('http') || href.startsWith('#') || 
                href.startsWith('mailto:') || href.startsWith('//')) {
                return;
            }
            
            if (href.includes('dashboard') && !href.includes('/pages/')) {
                if (currentPage === 'sign-in.php' || currentPage === 'customer-sign-up.php') {
                    link.href = 'customer-dashboard.php';
                } else if (currentPage === 'index.php') {
                    link.href = 'pages/customer-dashboard.php';
                }
            }
        });
        
        document.querySelectorAll('link[rel="stylesheet"]').forEach(link => {
            const href = link.getAttribute('href');
            if (href && !href.startsWith('http') && !href.startsWith('//') && !href.startsWith('data:')) {
                if (href.includes('Barangay-System')) {
                    link.href = href.replace(/\/?Barangay-System\//g, basePath);
                } else if (href.startsWith('/')) {
                    link.href = basePath + href.substring(1);
                } else if (!href.startsWith('../') && !href.startsWith('./') && href.indexOf('/') !== 0) {
                    link.href = basePath + href;
                }
            }
        });
        
        document.querySelectorAll('script[src]').forEach(script => {
            const src = script.getAttribute('src');
            if (src && !src.startsWith('http') && !src.startsWith('//')) {
                if (src.includes('Barangay-System')) {
                    script.src = src.replace(/\/?Barangay-System\//g, basePath);
                } else if (src.startsWith('/')) {
                    script.src = basePath + src.substring(1);
                }
            }
        });
        
        console.log('Path fixing complete');
    },
    
    getDatabasePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'database/' + fileName;
    }
};

window.PathManager = PathManager;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => PathManager.init());
} else {
    PathManager.init();
}