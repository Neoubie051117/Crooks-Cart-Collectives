<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$customerId = $_SESSION['customer_id'];

// Fetch cart items
$cartItems = [];
$total = 0;
try {
    $stmt = $connection->prepare("
        SELECT ci.*, p.name, p.price, p.image_path, p.stock_quantity, s.business_name
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.product_id
        JOIN sellers s ON p.seller_id = s.seller_id
        WHERE ci.cart_id = (SELECT cart_id FROM shopping_carts WHERE customer_id = ?)
        ORDER BY ci.added_at DESC
    ");
    $stmt->execute([$customerId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cartItems as $item) {
        $total += $item['price'] * $item['quantity'];
    }
} catch (PDOException $e) {
    error_log("Error fetching cart: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    .cart-container {
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
    }

    .cart-item {
        display: flex;
        gap: 20px;
        border-bottom: 1px solid #ddd;
        padding: 20px 0;
    }

    .cart-item-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .cart-item-details {
        flex: 1;
    }

    .cart-item-title {
        font-size: 1.2em;
        margin: 0 0 5px;
    }

    .cart-item-price {
        color: #FF8246;
        font-weight: bold;
    }

    .cart-item-quantity {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 10px 0;
    }

    .quantity-input {
        width: 60px;
        text-align: center;
    }

    .remove-btn {
        background: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 4px;
    }

    .cart-summary {
        margin-top: 30px;
        text-align: right;
        font-size: 1.5em;
    }

    .checkout-btn {
        background: #FF8246;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 5px;
        font-size: 1.2em;
        cursor: pointer;
    }

    .empty-cart {
        text-align: center;
        padding: 50px;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="cart-container">
            <h1>Shopping Cart</h1>

            <?php if (empty($cartItems)): ?>
            <div class="empty-cart">
                <p>Your cart is empty.</p>
                <a href="products.php" class="btn-primary">Continue Shopping</a>
            </div>
            <?php else: ?>

            <div id="cartItems">
                <?php foreach ($cartItems as $item): 
                    $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                    if (!empty($item['image_path'])) {
                        if (strpos($item['image_path'], 'assets/') === 0) {
                            $imagePath = '../' . $item['image_path'];
                        } else {
                            $imagePath = '../' . $item['image_path'];
                        }
                    }
                ?>
                <div class="cart-item" data-id="<?= $item['cart_item_id'] ?>">
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                        class="cart-item-image" onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png'">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>
                        <p>Seller: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price'], 2) ?></p>
                        <div class="cart-item-quantity">
                            <label>Quantity:</label>
                            <input type="number" class="quantity-input" value="<?= $item['quantity'] ?>" min="1"
                                max="<?= $item['stock_quantity'] ?>" data-id="<?= $item['cart_item_id'] ?>">
                            <button class="remove-btn" data-id="<?= $item['cart_item_id'] ?>">Remove</button>
                        </div>
                        <p class="item-subtotal">Subtotal: ₱<?= number_format($item['price'] * $item['quantity'], 2) ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <p>Total: ₱<span id="cartTotal"><?= number_format($total, 2) ?></span></p>
                <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script>
    // Update quantity
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', async function() {
            const itemId = this.dataset.id;
            const quantity = this.value;
            const response = await fetch('../database/cart-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'update',
                    cart_item_id: itemId,
                    quantity: quantity
                })
            });
            const result = await response.json();
            if (result.status === 'success') {
                location.reload(); // simple refresh to update totals
            } else {
                alert('Error updating quantity');
            }
        });
    });

    // Remove item
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            if (!confirm('Remove this item from cart?')) return;
            const itemId = this.dataset.id;
            const response = await fetch('../database/cart-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'remove',
                    cart_item_id: itemId
                })
            });
            const result = await response.json();
            if (result.status === 'success') {
                location.reload();
            } else {
                alert('Error removing item');
            }
        });
    });
    </script>
</body>

</html>