<?php 
require_once "../controllers/purchaseHistoryController.php"; 
$currentPage = basename($_SERVER['PHP_SELF']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="../view/buyer.php" class="<?php echo $currentPage == 'buyer.php' ? 'active' : ''; ?>">Home</a>
        <a href="../view/profile.php" class="<?php echo $currentPage == 'profile.php' ? 'active' : ''; ?>">Profile</a>
        <a href="../view/cart.php" class="<?php echo $currentPage == 'cart.php' ? 'active' : ''; ?>">Cart</a>
        <a href="../view/purchaseHistory.php" class="<?php echo $currentPage == 'purchaseHistory.php' ? 'active' : ''; ?>">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </div>

    <h1>Purchase History</h1>

    <?php if (!empty($purchaseHistory)): ?>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
            <?php foreach ($purchaseHistory as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                    <td>$<?php echo htmlspecialchars($order['price']); ?></td>
                    <td>$<?php echo htmlspecialchars($order['total_price']); ?></td>
                    <td><?php echo htmlspecialchars(ucfirst($order['status'])); ?></td>
                    <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>You have no purchase history.</p>
    <?php endif; ?>
</body>
</html>
