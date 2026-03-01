/* Crooks-Cart-Collectives/scripts/seller-new-product.js */
/* Revised version 4.3 – Single file replace on index, multi-file sequential fill */

(function() {
    'use strict';

    console.log('Seller New Product JS loaded - Version 4.3');

    document.addEventListener('DOMContentLoaded', function() {
        initializeSellerNewProduct();
    });

    function initializeSellerNewProduct() {
        console.log('Initializing seller new product form...');

        // DOM elements
        const productForm = document.getElementById('productForm');
        const backBtn = document.getElementById('backBtn');
        const saveBtn = document.getElementById('saveBtn');

        const mainPreviewBox = document.getElementById('mainPreviewBox');
        const previewPlaceholder = document.getElementById('previewPlaceholder');
        const previewImage = document.getElementById('previewImage');
        const thumbnailNavigation = document.getElementById('thumbnailNavigation');
        const fileInfo = document.getElementById('fileInfo');

        const nameInput = document.getElementById('name');
        const categoryInput = document.getElementById('category');
        const priceInput = document.getElementById('price');
        const stockInput = document.getElementById('stock_quantity');
        const descriptionInput = document.getElementById('description');

        const modal = document.getElementById('feedbackModal');
        const modalMessage = document.getElementById('modalMessage');
        const modalOkBtn = document.getElementById('modalOkBtn');

        // state
        let selectedFiles = [];                // array of File objects (index 0-4)
        let currentPreviewIndex = 0;            // current active index (clicked/selected)
        let hoveredIndex = -1;                  // index currently being hovered (-1 = none)
        let formChanged = false;
        let isSubmitting = false;
        const editMode = document.querySelector('input[name="action"]')?.value === 'update';

        // URL cache
        let fileObjectUrls = new Map();

        // get or create persistent object URL
        function getObjectURL(file) {
            if (!file) return null;
            
            if (!fileObjectUrls.has(file)) {
                const url = URL.createObjectURL(file);
                fileObjectUrls.set(file, url);
            }
            
            return fileObjectUrls.get(file);
        }

        // clean up URLs
        function cleanupObjectUrls() {
            fileObjectUrls.forEach(url => URL.revokeObjectURL(url));
            fileObjectUrls.clear();
        }

        // modal
        function showModal(message) {
            if (!modal || !modalMessage) {
                alert(message);
                return;
            }
            modalMessage.textContent = message;
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function hideModal() {
            if (!modal) return;
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        if (modalOkBtn) modalOkBtn.addEventListener('click', hideModal);
        if (modal) modal.addEventListener('click', (e) => { if (e.target === modal) hideModal(); });

        // file upload trigger
        function triggerFileUpload(targetSlot) {
            const tempInput = document.createElement('input');
            tempInput.type = 'file';
            tempInput.accept = 'image/jpeg,image/png,image/gif,image/webp';
            tempInput.multiple = true;
            tempInput.style.position = 'fixed';
            tempInput.style.top = '-100px';
            tempInput.style.left = '-100px';
            tempInput.style.opacity = '0';
            tempInput.style.pointerEvents = 'none';
            document.body.appendChild(tempInput);

            tempInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files.length > 0) {
                    handleFileSelect(e.target.files, targetSlot);
                }
                if (tempInput.parentNode) document.body.removeChild(tempInput);
            });

            setTimeout(() => {
                if (tempInput.parentNode) document.body.removeChild(tempInput);
            }, 60000);

            tempInput.click();
        }

        // compact files to left
        function compactFiles(filesArray) {
            const defined = filesArray.filter(f => f !== undefined);
            const compacted = new Array(5).fill(undefined);
            for (let i = 0; i < defined.length && i < 5; i++) {
                compacted[i] = defined[i];
            }
            return compacted;
        }

        // handle file selection - single file replace OR multi-file sequential fill
        function handleFileSelect(files, targetSlot) {
            if (!files || files.length === 0) return;

            const fileArray = Array.from(files);
            
            // Filter valid images
            const validFiles = fileArray.filter(file => 
                file.type.match('image.*') && file.size <= 2 * 1024 * 1024
            );

            if (validFiles.length === 0) return;

            // Clean up old URLs
            cleanupObjectUrls();

            // Create a copy of current files
            const newFiles = [...selectedFiles];

            if (validFiles.length === 1) {
                // SINGLE FILE MODE: Replace only the clicked slot
                newFiles[targetSlot] = validFiles[0];
            } else {
                // MULTI-FILE MODE: Fill sequentially from target slot
                for (let i = 0; i < validFiles.length; i++) {
                    const slotIndex = targetSlot + i;
                    if (slotIndex < 5) {
                        newFiles[slotIndex] = validFiles[i];
                    }
                }
            }

            // Fill any undefined slots
            while (newFiles.length < 5) newFiles.push(undefined);
            
            // Always compact to left for clean presentation
            selectedFiles = compactFiles(newFiles);

            // Set preview to first image or keep target if valid
            const firstFilled = selectedFiles.findIndex(f => f !== undefined);
            if (firstFilled !== -1) {
                currentPreviewIndex = firstFilled;
            }
            hoveredIndex = -1;

            // Re-render
            renderThumbnailNavigation();
            updatePreviewDisplay();
            updateFileInfo();

            formChanged = true;
            updateSaveButtonState();
            
            console.log('Files handled:', validFiles.length, 'files, mode:', validFiles.length === 1 ? 'single replace' : 'multi sequential');
        }

        // update preview from file
        function setPreviewFromFile(file) {
            if (!previewPlaceholder || !previewImage) return;

            if (file) {
                const url = getObjectURL(file);
                
                if (previewImage.dataset.url !== url) {
                    previewImage.style.backgroundImage = `url('${url}')`;
                    previewImage.dataset.url = url;
                }
                
                previewImage.style.display = 'block';
                previewPlaceholder.style.display = 'none';
            } else {
                previewImage.style.display = 'none';
                previewPlaceholder.style.display = 'flex';
                previewImage.dataset.url = '';
            }
        }

        function setPreviewFromIndex(index) {
            setPreviewFromFile(selectedFiles[index]);
        }

        // update main preview
        function updatePreviewDisplay() {
            if (hoveredIndex !== -1 && selectedFiles[hoveredIndex]) {
                setPreviewFromIndex(hoveredIndex);
            } else {
                setPreviewFromIndex(currentPreviewIndex);
            }
        }

        // render thumbnails
        function renderThumbnailNavigation() {
            if (!thumbnailNavigation) return;

            thumbnailNavigation.innerHTML = '';

            for (let i = 0; i < 5; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'thumbnail-image-btn';
                btn.dataset.index = i;

                btn.innerHTML = '';

                if (selectedFiles[i]) {
                    const url = getObjectURL(selectedFiles[i]);
                    btn.style.backgroundImage = `url('${url}')`;
                    btn.classList.remove('empty-slot');
                } else {
                    btn.style.backgroundImage = '';
                    btn.classList.add('empty-slot');
                    
                    const iconImg = document.createElement('img');
                    iconImg.src = '../assets/image/icons/package.svg';
                    iconImg.alt = 'Empty slot';
                    iconImg.className = 'thumbnail-image';
                    btn.appendChild(iconImg);
                }

                // Hover
                btn.addEventListener('mouseenter', (function(index) {
                    return function() {
                        if (selectedFiles[index]) {
                            hoveredIndex = index;
                            updatePreviewDisplay();
                            
                            const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
                            thumbnails.forEach((btn, idx) => {
                                if (idx === index) btn.classList.add('hover');
                                else btn.classList.remove('hover');
                            });
                        }
                    };
                })(i));

                // Mouse leave
                btn.addEventListener('mouseleave', (function(index) {
                    return function() {
                        if (hoveredIndex !== -1 && selectedFiles[hoveredIndex]) {
                            currentPreviewIndex = hoveredIndex;
                        }

                        hoveredIndex = -1;

                        const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
                        thumbnails.forEach((btn, idx) => {
                            btn.classList.remove('hover');
                            if (idx === currentPreviewIndex) {
                                btn.classList.add('active');
                            } else {
                                btn.classList.remove('active');
                            }
                        });

                        updatePreviewDisplay();
                    };
                })(i));

                // Click handler
                btn.addEventListener('click', (function(index) {
                    return function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        currentPreviewIndex = index;
                        hoveredIndex = -1;
                        
                        const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
                        thumbnails.forEach((btn, idx) => {
                            if (idx === index) btn.classList.add('active');
                            else btn.classList.remove('active');
                        });
                        
                        updatePreviewDisplay();
                        triggerFileUpload(index);
                    };
                })(i));

                thumbnailNavigation.appendChild(btn);
            }

            // mark active
            const thumbnails = document.querySelectorAll('.thumbnail-image-btn');
            thumbnails.forEach((btn, index) => {
                if (index === currentPreviewIndex) btn.classList.add('active');
                else btn.classList.remove('active');
                btn.classList.remove('hover');
            });
        }

        // update file info
        function updateFileInfo() {
            if (!fileInfo) return;
            const filled = selectedFiles.filter(f => f !== undefined).length;
            if (filled === 0) {
                fileInfo.innerHTML = '<p>No images selected. Click any slot or the preview box to upload. Minimum 2 images required.</p>';
            } else {
                fileInfo.innerHTML = `<p>${filled} of 5 slots filled. Click a slot to upload/replace images.</p>`;
            }
        }

        // form validation
        function validateForm() {
            if (!nameInput?.value?.trim()) return false;
            if (!categoryInput?.value?.trim()) return false;
            if (!priceInput?.value || parseFloat(priceInput.value) <= 0) return false;
            if (!stockInput?.value || parseInt(stockInput.value) < 0) return false;
            if (!descriptionInput?.value?.trim()) return false;
            if (!editMode && selectedFiles.filter(f => f !== undefined).length < 2) return false;
            return true;
        }

        function updateSaveButtonState() {
            if (!saveBtn) return;
            saveBtn.disabled = !validateForm();
        }

        // event listeners
        if (mainPreviewBox) {
            mainPreviewBox.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                triggerFileUpload(currentPreviewIndex);
            });
        }

        [nameInput, categoryInput, priceInput, stockInput, descriptionInput].forEach(field => {
            if (field) {
                field.addEventListener('input', () => {
                    formChanged = true;
                    updateSaveButtonState();
                });
            }
        });

        // form submission
        if (productForm) {
            productForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                if (isSubmitting) return;

                if (!validateForm()) {
                    let message = 'Please fill in all required fields.';
                    if (!editMode && selectedFiles.filter(f => f !== undefined).length < 2) {
                        message = 'Please upload at least 2 images.';
                    }
                    showModal(message);
                    return;
                }

                isSubmitting = true;
                const originalText = saveBtn?.textContent || 'Save';
                if (saveBtn) {
                    saveBtn.textContent = 'Saving...';
                    saveBtn.disabled = true;
                }

                try {
                    const formData = new FormData(productForm);
                    formData.delete('images[]');
                    selectedFiles.forEach(file => {
                        if (file) formData.append('images[]', file);
                    });

                    const currentPath = window.location.pathname;
                    let apiPath = '../database/seller-new-product-handler.php';
                    if (!currentPath.includes('/pages/')) {
                        apiPath = 'database/seller-new-product-handler.php';
                    }

                    const response = await fetch(apiPath, {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.status === 'success') {
                        showModal(result.message);
                        setTimeout(() => {
                            window.location.href = 'seller-manage-product.php';
                        }, 1500);
                    } else {
                        showModal(result.message || 'Failed to save product.');
                        if (saveBtn) {
                            saveBtn.textContent = originalText;
                            saveBtn.disabled = false;
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showModal('Network error. Please try again.');
                    if (saveBtn) {
                        saveBtn.textContent = originalText;
                        saveBtn.disabled = false;
                    }
                } finally {
                    isSubmitting = false;
                }
            });
        }

        // back button
        if (backBtn) {
            backBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (formChanged) {
                    if (confirm('You have unsaved changes. Are you sure you want to leave?')) {
                        window.location.href = 'seller-manage-product.php';
                    }
                } else {
                    window.location.href = 'seller-manage-product.php';
                }
            });
        }

        // cleanup
        window.addEventListener('beforeunload', function() {
            cleanupObjectUrls();
        });

        // initial render
        renderThumbnailNavigation();
        updateFileInfo();
        updateSaveButtonState();

        console.log('Initialization complete');
    }
})();