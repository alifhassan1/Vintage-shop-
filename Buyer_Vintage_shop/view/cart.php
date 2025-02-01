<?php
require_once "../controllers/CartController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <a href="../view/buyer.php">Home</a>
        <a href="../view/profile.php">Profile</a>
        <a href="../view/cart.php" class="active">Cart</a>
        <a href="purchaseHistory.php">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <h1>Your Cart</h1>

    <div class="cart">
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty. Please add some products.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                            <td>$<?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total Price: $<?php echo $totalPrice; ?></p>

        <!-- Clear Cart Button -->
      <div class="cart-buttons">
      <button type="button" class="checkout-button" onclick="window.location.href='checkout.php'">
        Proceed to Checkout
    </button>
   <form method="POST">
    <button type="submit" name="clear_cart" class="clear-cart-button" onclick="return confirm('Are you sure you want to clear your cart?')">
            Clear Cart
    </button>
</form>
   </div>
        <?php endif; ?>
    </div>
</body>
</html>
