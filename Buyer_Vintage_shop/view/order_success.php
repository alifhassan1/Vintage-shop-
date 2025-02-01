<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
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

    <h1>Order Successful</h1>

    <div class="order-success">
        <h2>Your order has been placed successfully!</h2>
        <p>Thank you for your purchase. We will process your order and notify you once it ships.</p>
    </div>
    <div class="order-successs">
    <button type="button" class="Go to Home Page" onclick="window.location.href='../view/buyer.php'">
    Go to Home Page
    </button>
</body>
</html>
