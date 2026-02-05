/* JavaScript File Content: central-link-navigation.js - UPDATED FOR NEW STRUCTURE */

/**
 * Central Path Manager - Updated for Crooks-Cart-Collectives
 * Dynamically fixes all broken paths for the new structure
 */

const PathManager = {
    // Initialize
    init() {
        console.log('PathManager initializing for new structure...');
        
        // Fix paths immediately
        this.fixAllPaths();
        
        // Also fix paths after a short delay (in case of dynamically added content)
        setTimeout(() => this.fixAllPaths(), 500);
        
        return this;
    },

    // Get base path based on current location
    getBasePath() {
        const currentPath = window.location.pathname;
        let basePath = '';
        
        // Determine base path based on current directory
        if (currentPath.includes('/pages/')) {
            basePath = '../';
        } else if (currentPath.includes('/database/')) {
            basePath = '../';
        } else if (currentPath.includes('/scripts/')) {
            basePath = '../';
        } else if (currentPath.includes('/styles/')) {
            basePath = '../';
        } else {
            basePath = '';
        }
        
        return basePath;
    },

    // Fix all broken paths on the page
    fixAllPaths() {
        console.log('Fixing all paths for Crooks-Cart-Collectives...');
        
        const basePath = this.getBasePath();
        
        // Fix CSS links
        document.querySelectorAll('link[rel="stylesheet"]').forEach(link => {
            const href = link.getAttribute('href');
            if (href && !href.startsWith('http') && !href.startsWith('//') && !href.startsWith('data:')) {
                if (href.includes('Barangay-System')) {
                    link.href = href.replace(/\/?Barangay-System\//g, basePath);
                } else if (href.startsWith('/')) {
                    // Convert absolute path to relative
                    link.href = basePath + href.substring(1);
                } else if (!href.startsWith('../') && !href.startsWith('./') && href.indexOf('/') !== 0) {
                    // Add base path to relative paths that need it
                    link.href = basePath + href;
                }
            }
        });
        
        // Fix script sources
        document.querySelectorAll('script[src]').forEach(script => {
            const src = script.getAttribute('src');
            if (src && !src.startsWith('http') && !src.startsWith('//')) {
                if (src.includes('Barangay-System')) {
                    script.src = src.replace(/\/?Barangay-System\//g, basePath);
                } else if (src.startsWith('/')) {
                    // Convert absolute path to relative
                    script.src = basePath + src.substring(1);
                }
            }
        });
        
        // Fix image sources
        document.querySelectorAll('img[src]').forEach(img => {
            const src = img.getAttribute('src');
            if (src && !src.startsWith('http') && !src.startsWith('//') && !src.startsWith('data:')) {
                if (src.includes('Barangay-System')) {
                    img.src = src.replace(/\/?Barangay-System\//g, basePath);
                } else if (src.startsWith('/')) {
                    // Convert absolute path to relative
                    img.src = basePath + src.substring(1);
                }
            }
        });
        
        // Fix anchor hrefs
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (href && !href.startsWith('http') && !href.startsWith('#') && !href.startsWith('mailto:') && !href.startsWith('//')) {
                if (href.includes('Barangay-System')) {
                    link.href = href.replace(/\/?Barangay-System\//g, basePath);
                } else if (href.startsWith('/')) {
                    // Convert absolute path to relative
                    link.href = basePath + href.substring(1);
                }
            }
        });
        
        // Fix form actions
        document.querySelectorAll('form[action]').forEach(form => {
            const action = form.getAttribute('action');
            if (action && !action.startsWith('http') && !action.startsWith('#') && !action.startsWith('//')) {
                if (action.includes('Barangay-System')) {
                    form.action = action.replace(/\/?Barangay-System\//g, basePath);
                } else if (action.startsWith('/')) {
                    // Convert absolute path to relative
                    form.action = basePath + action.substring(1);
                }
            }
        });
        
        // Fix inline styles with background images
        document.querySelectorAll('[style*="background-image"]').forEach(el => {
            const style = el.getAttribute('style');
            if (style.includes('Barangay-System')) {
                el.style.backgroundImage = style.replace(/\/?Barangay-System\//g, basePath);
            }
        });
        
        console.log('Path fixing complete. Base path:', basePath);
    },
    
    // Helper to get correct path for database files
    getDatabasePath(fileName) {
        const basePath = this.getBasePath();
        return basePath + 'database/' + fileName;
    }
};

// Make it globally available
window.PathManager = PathManager;

// Auto-initialize immediately
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => PathManager.init());
} else {
    PathManager.init();
}