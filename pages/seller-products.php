<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['is_seller']) || !$_SESSION['is_seller']) {
    header('Location: seller-fill-form.php');
    exit;
}

$sellerId = $_SESSION['seller_id'];

// Fetch seller's products
$products = [];
try {
    $stmt = $connection->prepare("SELECT * FROM products WHERE seller_id = ? ORDER BY date_added DESC");
    $stmt->execute([$sellerId]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching seller products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/products.css"> <!-- reuse product grid -->
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    .product-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .edit-btn,
    .delete-btn {
        padding: 5px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
    }

    .edit-btn {
        background: #FF8246;
        color: white;
    }

    .delete-btn {
        background: #dc3545;
        color: white;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="pageTitleHeader">My Products</div>

        <?php if (empty($products)): ?>
        <div class="no-products">
            <p>You haven't added any products yet.</p>
            <p><a href="seller-add-product.php" class="btn-primary">Add Your First Product</a></p>
        </div>
        <?php else: ?>

        <div class="products-grid">
            <?php foreach ($products as $product): 
                $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                if (!empty($product['image_path'])) {
                    if (strpos($product['image_path'], 'assets/') === 0) {
                        $imagePath = '../' . $product['image_path'];
                    } elseif (filter_var($product['image_path'], FILTER_VALIDATE_URL)) {
                        $imagePath = $product['image_path'];
                    } else {
                        $imagePath = '../' . $product['image_path'];
                    }
                }
            ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                    class="product-image" onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png'">
                <div class="product-info">
                    <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="product-price">₱<?= number_format($product['price'], 2) ?></p>
                    <p class="product-stock">Stock: <?= $product['stock_quantity'] ?></p>
                    <p class="product-status"><?= $product['is_active'] ? 'Active' : 'Inactive' ?></p>
                    <div class="product-actions">
                        <a href="seller-add-product.php?id=<?= $product['product_id'] ?>" class="edit-btn">Edit</a>
                        <button class="delete-btn" data-id="<?= $product['product_id'] ?>">Delete</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            if (!confirm('Are you sure you want to delete this product?')) return;
            const productId = btn.dataset.id;
            try {
                const response = await fetch('../database/product-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'delete',
                        product_id: productId
                    })
                });
                const result = await response.json();
                if (result.status === 'success') {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Delete error:', error);
                alert('An error occurred.');
            }
        });
    });
    </script>
</body>

</html>