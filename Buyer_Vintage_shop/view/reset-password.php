<?php


require_once "../controllers/update_password.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="buyer.php">Home</a>
        <a href="profile.php" class="active">Profile</a>
        <a href="cart.php">Cart</a>
        <a href="purchaseHistory.php">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </nav>
    <fieldset>
        <legend>Update Password</legend>
        <?php if (!empty($updatePasswordError)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($updatePasswordError); ?></p>
        <?php endif; ?>
        <?php if (!empty($updatePasswordSuccess)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($updatePasswordSuccess); ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="hidden" name="update_password" value="1">
            <table>
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" required></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" required></td>
                </tr>
                <tr>
                    <td>Confirm New Password:</td>
                    <td><input type="password" name="confirm_password" required></td>
                </tr>
            </table>
            <input type="submit" value="Update Password">
        </form>
    </fieldset>
</body>
</html>
