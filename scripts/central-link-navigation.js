/* JavaScript File Content: central-link-navigation.js - FIXED VERSION */

/**
 * Central Path Manager - Fixed Version
 * Dynamically fixes all broken paths
 */

const PathManager = {
    // Initialize
    init() {
        console.log('PathManager initializing...');
        
        // Fix paths immediately
        this.fixAllPaths();
        
        // Also fix paths after a short delay (in case of dynamically added content)
        setTimeout(() => this.fixAllPaths(), 500);
        
        return this;
    },

    // Fix all broken paths on the page
    fixAllPaths() {
        console.log('Fixing all broken paths...');
        
        // Get current directory
        const currentPath = window.location.pathname;
        let basePath = '';
        
        // Determine base path
        if (currentPath.includes('/pages/')) {
            basePath = '../';
        } else if (currentPath.includes('/database/')) {
            basePath = '../';
        } else {
            basePath = '';
        }
        
        // Fix CSS links
        document.querySelectorAll('link[rel="stylesheet"]').forEach(link => {
            const href = link.getAttribute('href');
            if (href && !href.startsWith('http') && !href.startsWith('//')) {
                if (href.includes('Barangay-System')) {
                    link.href = href.replace(/\/?Barangay-System\//g, basePath);
                } else if (href.startsWith('/')) {
                    // Convert absolute path to relative
                    link.href = basePath + href.substring(1);
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
        
        // Fix inline styles with background images
        document.querySelectorAll('[style*="background-image"]').forEach(el => {
            const style = el.getAttribute('style');
            if (style.includes('Barangay-System')) {
                el.style.backgroundImage = style.replace(/\/?Barangay-System\//g, basePath);
            }
        });
        
        console.log('Path fixing complete. Base path:', basePath);
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