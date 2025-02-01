<?php
// Include the controller to handle the logic
require_once "../controllers/PasswordVerificationController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Link the external JavaScript file -->
    <script src="../js/validation.js" defer></script>
</head>
<body>

    <!-- Navbar Section -->
    <div class="navbar">
        <a href="buyer.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="cart.php">Cart</a>
        <a href="purchaseHistory.php">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <h1>Enter Password to Edit Profile</h1>

    <div class="container">
        <!-- Display error message if any -->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <!-- Password Form -->
        <form name="passwordForm" method="POST" action="" onsubmit="return validatePasswordForm()">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Verify Password">
        </form>
    </div>

</body>
</html>
