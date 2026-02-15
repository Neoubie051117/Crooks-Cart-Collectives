<?php
session_start();
require_once('../database/database-connect.php');

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
        header('Location: seller-products.php');
        exit;
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
    <link rel="stylesheet" href="../styles/seller-registration.css"> <!-- reuse form styles -->
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader"><?= $editMode ? 'Edit Product' : 'Add New Product' ?></div>

        <form id="productForm" class="seller-container" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?= $editMode ? 'update' : 'add' ?>">
            <?php if ($editMode): ?>
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <?php endif; ?>

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

                <div class="form-group">
                    <label for="price">Price (₱) *</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required
                        value="<?= htmlspecialchars($product['price'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="stock_quantity">Stock Quantity *</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" min="0" required
                        value="<?= htmlspecialchars($product['stock_quantity'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="5"
                        required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*" <?= $editMode ? '' : 'required' ?>>
                    <?php if ($editMode && !empty($product['image_path'])): ?>
                    <p class="help-text">Current image: <?= basename($product['image_path']) ?> (upload new to replace)
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit"
                    class="btn btn-primary"><?= $editMode ? 'Update Product' : 'Add Product' ?></button>
                <a href="seller-products.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.getElementById('productForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        try {
            const response = await fetch('../database/product-handler.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert(result.message);
                window.location.href = 'seller-products.php';
            } else {
                alert('Error: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        }
    });
    </script>
</body>

</html>