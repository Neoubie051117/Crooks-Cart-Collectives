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
    <link rel="stylesheet" href="../styles/cart.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main class="content">
        <div class="cart-container">
            <h1 class="cart-title">Shopping Cart</h1>

            <?php if (empty($cartItems)): ?>
            <div class="empty-cart">
                <p class="empty-cart-message">Your cart is empty.</p>
                <a href="products.php" class="btn btn-primary">Continue Shopping</a>
            </div>
            <?php else: ?>

            <div class="cart-items" id="cartItems">
                <?php foreach ($cartItems as $item): 
                        $imagePath = '../assets/image/icons/PlaceholderAssetProduct.png';
                        if (!empty($item['image_path'])) {
                            if (strpos($item['image_path'], 'assets/') === 0) {
                                $imagePath = '../' . $item['image_path'];
                            } else {
                                $imagePath = '../' . $item['image_path'];
                            }
                        }
                        $subtotal = $item['price'] * $item['quantity'];
                    ?>
                <div class="cart-item" data-id="<?= $item['cart_item_id'] ?>">
                    <div class="cart-item-image">
                        <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($item['name']) ?>"
                            onerror="this.src='../assets/image/icons/PlaceholderAssetProduct.png'">
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="cart-item-seller">Sold by: <?= htmlspecialchars($item['business_name']) ?></p>
                        <p class="cart-item-price">₱<?= number_format($item['price'], 2) ?></p>

                        <div class="cart-item-controls">
                            <div class="cart-item-quantity">
                                <label for="quantity-<?= $item['cart_item_id'] ?>" class="sr-only">Quantity</label>
                                <input type="number" id="quantity-<?= $item['cart_item_id'] ?>" class="quantity-input"
                                    value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stock_quantity'] ?>"
                                    data-id="<?= $item['cart_item_id'] ?>">
                                <button class="remove-btn btn btn-secondary" data-id="<?= $item['cart_item_id'] ?>">
                                    Remove
                                </button>
                            </div>
                            <p class="item-subtotal">
                                Subtotal: <span class="subtotal-amount">₱<?= number_format($subtotal, 2) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <span class="total-label">Total:</span>
                    <span class="total-amount" id="cartTotal">₱<?= number_format($total, 2) ?></span>
                </div>
                <div class="cart-actions">
                    <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
                    <a href="checkout.php" class="btn btn-primary checkout-btn">Proceed to Checkout</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <script>
    (function() {
        // Helper function to show temporary messages
        function showMessage(message, type = 'error') {
            const msgDiv = document.createElement('div');
            msgDiv.className = `cart-message ${type}`;
            msgDiv.textContent = message;
            document.body.appendChild(msgDiv);
            setTimeout(() => msgDiv.remove(), 3000);
        }

        // Update quantity via AJAX
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', async function() {
                const itemId = this.dataset.id;
                const quantity = this.value;
                const originalValue = this.defaultValue;

                // Basic validation
                if (quantity < 1 || quantity > this.max) {
                    this.value = originalValue;
                    showMessage(`Quantity must be between 1 and ${this.max}`, 'error');
                    return;
                }

                // Disable input while saving
                this.disabled = true;

                try {
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
                        // Update subtotal and total without reload
                        const priceText = this.closest('.cart-item-details').querySelector(
                            '.cart-item-price').textContent;
                        const price = parseFloat(priceText.replace(/[^0-9.-]+/g, ''));
                        const newSubtotal = price * quantity;
                        const subtotalSpan = this.closest('.cart-item-controls').querySelector(
                            '.subtotal-amount');
                        subtotalSpan.textContent = '₱' + newSubtotal.toFixed(2);

                        // Update total
                        let newTotal = 0;
                        document.querySelectorAll('.subtotal-amount').forEach(span => {
                            newTotal += parseFloat(span.textContent.replace(
                                /[^0-9.-]+/g, ''));
                        });
                        document.getElementById('cartTotal').textContent = '₱' + newTotal
                            .toFixed(2);

                        this.defaultValue = quantity; // update default for future checks
                    } else {
                        this.value = originalValue;
                        showMessage('Error updating quantity', 'error');
                    }
                } catch (error) {
                    console.error('Update error:', error);
                    this.value = originalValue;
                    showMessage('Network error. Please try again.', 'error');
                } finally {
                    this.disabled = false;
                }
            });
        });

        // Remove item with confirmation
        document.querySelectorAll('.remove-btn').forEach(btn => {
            btn.addEventListener('click', async function() {
                if (!confirm('Remove this item from your cart?')) return;

                const itemId = this.dataset.id;
                const cartItem = this.closest('.cart-item');

                // Disable button while processing
                this.disabled = true;
                this.textContent = 'Removing...';

                try {
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
                        // Remove item from DOM
                        cartItem.remove();

                        // Update total
                        let newTotal = 0;
                        document.querySelectorAll('.subtotal-amount').forEach(span => {
                            newTotal += parseFloat(span.textContent.replace(
                                /[^0-9.-]+/g, ''));
                        });
                        document.getElementById('cartTotal').textContent = '₱' + newTotal
                            .toFixed(2);

                        // If cart is now empty, show empty state
                        if (document.querySelectorAll('.cart-item').length === 0) {
                            location.reload(); // simplest way to show empty cart
                        }
                    } else {
                        showMessage('Error removing item', 'error');
                        this.disabled = false;
                        this.textContent = 'Remove';
                    }
                } catch (error) {
                    console.error('Remove error:', error);
                    showMessage('Network error. Please try again.', 'error');
                    this.disabled = false;
                    this.textContent = 'Remove';
                }
            });
        });
    })();
    </script>
</body>

</html>