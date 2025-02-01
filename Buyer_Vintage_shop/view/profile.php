<?php

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
require_once "../controllers/ViewProfileControllers.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>

    </style>
</head>
<body>
    <nav class="navbar">
        <a href="buyer.php">Home</a>
        <a href="profile.php" class="active">Profile</a>
        <a href="cart.php">Cart</a>
        <a href="purchaseHistory.php">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </nav>

    <h1>Profile - <?php echo htmlspecialchars($user['first_name']); ?> <?php echo htmlspecialchars($user['last_name']); ?></h1>
    <fieldset>
<fieldset>
    <legend>Profile Options</legend>
    <nav class="navbar-secondary">
        <a href="profile.php" class="active">Profile</a>
        <a href="reset-password.php">Change Password</a>
    </nav>
    <div class="profile-details">
        <!-- Profile details here -->
    </div>
</fieldset>
        <div class="profile-details">
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
            <p><strong>City:</strong> <?php echo htmlspecialchars($user['city']); ?></p>
            <p><strong>Country:</strong> <?php echo htmlspecialchars($user['country']); ?></p>
            <p><strong>Postal Code:</strong> <?php echo htmlspecialchars($user['postal_code']); ?></p>
        </div>
        <form method="POST" action="edit_profile.php">
            <input type="submit" value="Edit Profile">
        </form>
    </fieldset>
</body>
</html>
