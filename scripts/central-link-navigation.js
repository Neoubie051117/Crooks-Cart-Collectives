/* JavaScript File Content: central-link-navigation.js - SIMPLIFIED VERSION */

/**
 * Central Path Manager - Simple Version
 * Provides consistent paths for all resources
 */

const PathManager = {
    // Base paths configuration
    config: {
        projectRoot: '', // Will be auto-detected
        assets: 'assets/',
        styles: 'styles/',
        scripts: 'scripts/',
        pages: 'pages/',
        database: 'database/'
    },

    // Initialize with current path
    init() {
        // Detect project root from current URL
        const currentPath = window.location.pathname;
        
        // If we're in the project folder
        if (currentPath.includes('Crooks-Cart-Collectives')) {
            const parts = currentPath.split('/');
            const projectIndex = parts.indexOf('Crooks-Cart-Collectives');
            if (projectIndex !== -1) {
                this.config.projectRoot = '/' + parts.slice(1, projectIndex + 1).join('/') + '/';
            }
        } else {
            // Assume we're at root
            this.config.projectRoot = '/';
        }
        
        // If still empty, try to detect from current directory
        if (!this.config.projectRoot) {
            const depth = currentPath.split('/').length - 2;
            this.config.projectRoot = depth > 0 ? '../'.repeat(depth) : './';
        }
        
        console.log('PathManager initialized with root:', this.config.projectRoot);
    },

    // Get full path for a resource
    getPath(type, filename) {
        if (!this.config.projectRoot) this.init();
        
        const baseTypes = {
            'asset': this.config.assets,
            'style': this.config.styles,
            'script': this.config.scripts,
            'page': this.config.pages,
            'database': this.config.database,
            'root': ''
        };
        
        if (baseTypes[type]) {
            return this.config.projectRoot + baseTypes[type] + filename;
        }
        
        console.error('Unknown path type:', type);
        return this.config.projectRoot + filename;
    },

    // Convenience methods
    getAsset(name) { return this.getPath('asset', name); },
    getStyle(name) { return this.getPath('style', name); },
    getScript(name) { return this.getPath('script', name); },
    getPage(name) { return this.getPath('page', name); },
    getDatabase(name) { return this.getPath('database', name); },
    
    // Fix all absolute paths on the page
    fixAbsolutePaths() {
        // Fix image sources
        document.querySelectorAll('img').forEach(img => {
            let src = img.getAttribute('src');
            if (src && src.includes('/Barangay-System/')) {
                img.src = src.replace('/Barangay-System/', this.config.projectRoot);
            }
        });
        
        // Fix link hrefs
        document.querySelectorAll('a').forEach(link => {
            let href = link.getAttribute('href');
            if (href && href.includes('/Barangay-System/') && !href.startsWith('http')) {
                link.href = href.replace('/Barangay-System/', this.config.projectRoot);
            }
        });
        
        // Fix form actions
        document.querySelectorAll('form').forEach(form => {
            let action = form.getAttribute('action');
            if (action && action.includes('/Barangay-System/')) {
                form.action = action.replace('/Barangay-System/', this.config.projectRoot);
            }
        });
    }
};

// Initialize and expose
window.PathManager = PathManager;

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    PathManager.init();
    PathManager.fixAbsolutePaths();
});