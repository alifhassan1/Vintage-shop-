<?php
// Include the controller to handle the logic
require_once "../controllers/ProfileController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/validation.js" defer></script>
</head>
<body>
    <nav class="navbar">
        <a href="buyer.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="cart.php">Cart</a>
        <a href="purchaseHistory.php">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </nav>

    <h1>Edit Profile</h1>

    <div class="container">
        <form name="profileForm" method="POST" action="" onsubmit="return validateProfileForm()">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address']); ?>">
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($user['city']); ?>">
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" value="<?php echo htmlspecialchars($user['country']); ?>">
            </div>

            <div class="form-group">
                <label for="postal_code">Postal Code:</label>
                <input type="text" name="postal_code" id="postal_code" value="<?php echo htmlspecialchars($user['postal_code']); ?>">
            </div>

            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>
