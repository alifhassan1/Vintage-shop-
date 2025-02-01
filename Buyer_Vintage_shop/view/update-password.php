<?php


require_once "../controllers/PasswordResetController.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Vintage Shop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form method="POST">    
        <h2>Reset Your Password</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <p style="color: green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        <fieldset>
            <legend>New Password</legend>
            <table>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" value="Reset Password">
        <a href="../index.php">Back to Login</a>
    </form>
</body>
</html>
