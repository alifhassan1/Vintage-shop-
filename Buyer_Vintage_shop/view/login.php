<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vintage Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST" action="controllers/buyerLogin.php">    
        <h2>Login to Vintage Shop</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <fieldset>
            <legend>Login</legend>
            <table>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" value="Login">
        <a href="./view/register.php">Register</a><br>
        <a href="./view/forgot-password.php">Forgot Password?</a> <!-- Forgot Password link -->
    </form>
</body>
</html>
