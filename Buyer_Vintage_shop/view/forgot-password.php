<?php
// Include the controller to handle the logic
require_once "../controllers/forgot-passwordController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


    <h1>Forgot Password</h1>

    <div class="container">
        <!-- Display error message if any -->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <!-- Forgot Password Form -->
        <form name="forgotPasswordForm" method="POST" action="forgot-password.php">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
            <input type="submit" value="Send Reset Link">
        </form>
    </div>

</body>
</html>
