<?php
// Include the controller to handle the logic
require_once "../controllers/checkoutController.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="../view/buyer.php">Home</a>
        <a href="../view/profile.php">Profile</a>
        <a href="../view/cart.php">Cart</a>
        <a href="purchaseHistory.php">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </div>

    <h1>Checkout</h1>

    <div class="checkout">
        <h2>Order Summary</h2>
        <?php if (!empty($cartItems)): ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                        <td>$<?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p>Total Price: $<?php echo $totalPrice; ?></p>
            <form action="../controllers/complete_order.php" method="POST">
                <input type="submit" value="Complete Order">
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
