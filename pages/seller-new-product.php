<?php
session_start();
require_once('../database/database-connect.php');
require_once('../database/data-storage-handler.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];
$editMode = false;
$product = null;

// If editing, fetch product
if (isset($_GET['id'])) {
    $editMode = true;
    $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ? AND seller_id = ?");
    $stmt->execute([$_GET['id'], $sellerId]);
    $product = $stmt->fetch();
    if (!$product) {
        header('Location: seller-manage-product.php');
        exit;
    }
    
    // Get existing images if any
    $existingImages = [];
    if (!empty($product['media_path'])) {
        $fullDir = dirname(__DIR__, 2) . '/' . $product['media_path'];
        if (is_dir($fullDir)) {
            for ($i = 1; $i <= 5; $i++) {
                $thumbFiles = glob($fullDir . 'thumbnail_' . $i . '.*');
                if (!empty($thumbFiles)) {
                    $thumbFile = basename($thumbFiles[0]);
                    $existingImages[] = getFileUrl($product['media_path'] . $thumbFile);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editMode ? 'Edit' : 'Add' ?> Product - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/seller-new-product.css">
    <script defer src="../scripts/seller-new-product.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader"><?= $editMode ? 'Edit Product' : 'Add New Product' ?></div>

        <form id="productForm" class="seller-add-product-container" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?= $editMode ? 'update' : 'add' ?>">
            <?php if ($editMode): ?>
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <?php endif; ?>

            <!-- Two-column layout -->
            <div class="form-left">
                <div class="form-section">
                    <h3>Product Details</h3>

                    <div class="form-group">
                        <label for="name">Product Name *</label>
                        <input type="text" id="name" name="name" required
                               value="<?= htmlspecialchars($product['name'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="category">Category *</label>
                        <input type="text" id="category" name="category" required
                               value="<?= htmlspecialchars($product['category'] ?? '') ?>"
                               placeholder="e.g., Electronics, Clothing, Food">
                    </div>

                    <div class="row-fields">
                        <div class="form-group half">
                            <label for="price">Price (₱) *</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" required
                                   value="<?= htmlspecialchars($product['price'] ?? '') ?>">
                        </div>

                        <div class="form-group half">
                            <label for="stock_quantity">Stock *</label>
                            <input type="number" id="stock_quantity" name="stock_quantity" min="0" required
                                   value="<?= htmlspecialchars($product['stock_quantity'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" rows="5"
                                  required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-right">
                <!-- Images Section - Now contains form actions at bottom -->
                <div class="form-section images-section">
                    <h3>Product Images</h3>
                    <p class="help-text">Upload at least 2 images, maximum of 5 images. Each image ≤ 2MB. JPG, PNG, GIF, WEBP.</p>

                    <div class="image-preview-container">
                        <!-- Single Preview Box -->
                        <div class="preview-box" id="mainPreviewBox">
                            <div class="preview-placeholder" id="previewPlaceholder">
                                <img src="../assets/image/icons/package.svg" alt="Upload image">
                                <span>Upload product photos</span>
                            </div>
                            <div class="preview-image" id="previewImage" style="display: none;"></div>
                            <input type="file" id="fileInput" name="images[]" accept="image/jpeg,image/png,image/gif,image/webp" multiple style="display: none;">
                        </div>

                        <!-- Pagination-style Navigation Buttons -->
                        <div class="thumbnail-navigation" id="thumbnailNavigation">
                            <!-- Generated by JavaScript -->
                        </div>
                    </div>

                    <!-- Hidden file inputs for multiple uploads (kept for form submission) -->
                    <div style="display: none;">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="file" name="images[]" class="image-input-hidden" data-index="<?= $i ?>" accept="image/jpeg,image/png,image/gif,image/webp">
                        <?php endfor; ?>
                    </div>

                    <div class="file-info" id="fileInfo">
                        <?php if ($editMode && !empty($existingImages)): ?>
                            <p><?= count($existingImages) ?> image(s) currently saved. Select new files to replace all.</p>
                        <?php else: ?>
                            <p>No images uploaded yet.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Form Actions - Inside the form section -->
                    <div class="form-actions">
                        <button type="button" id="backBtn" class="btn btn-secondary">Back</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary" disabled>Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Feedback Modal -->
    <div id="feedbackModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-icon">
                <img src="../assets/image/icons/mail.svg" alt="Notification">
            </div>
            <p id="modalMessage" class="modal-message"></p>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" id="modalOkBtn">OK</button>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>