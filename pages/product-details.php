<?php
session_start();
require_once('../database/database-connect.php');

$product_id = $_GET['id'] ?? 0;

// Fetch product details
$product = [];
try {
    $stmt = $connection->prepare("
        SELECT p.*, s.business_name, s.is_verified 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.product_id = ? AND p.is_active = 1
    ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching product: " . $e->getMessage());
}

if (!$product) {
    header('Location: products.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Crooks Cart Collectives</title>
    <?php include_once('header.php'); ?>
    <style>
    .product-details {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .product-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .product-image img {
        width: 100%;
        border-radius: 10px;
    }

    .product-info h1 {
        margin-top: 0;
    }

    .product-price {
        color: var(--color-accent-A);
        font-size: 2rem;
        font-weight: bold;
        margin: 20px 0;
    }

    .add-to-cart-btn {
        background: var(--color-accent-A);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 5px;
        font-size: 1.1rem;
        cursor: pointer;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="content">
        <div class="product-details">
            <div class="product-container">
                <div class="product-image">
                    <?php if (!empty($product['image_path'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image_path']); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php else: ?>
                    <img src="https://via.placeholder.com/500x400?text=No+Image" alt="No image">
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                    <div class="product-price">₱<?php echo number_format($product['price'], 2); ?></div>
                    <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                    <p><strong>Seller:</strong> <?php echo htmlspecialchars($product['business_name']); ?></p>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                    <p><strong>Stock:</strong> <?php echo $product['stock_quantity']; ?> available</p>

                    <?php if (isset($_SESSION['user_id'])): ?>
                    <button class="add-to-cart-btn">Add to Cart</button>
                    <?php else: ?>
                    <a href="sign-in.php" class="add-to-cart-btn">Login to Purchase</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>