<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="center">
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;"><?php echo $_GET['success']; ?></p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
        <form action="../controllers/AuthController.php" method="post">
            <h3>Admin Login</h3>
            <?php if (isset($_SESSION["error"])) { echo "<p style='color: red;'>".$_SESSION["error"]."</p>"; unset($_SESSION["error"]); } ?>
            
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">

            <button type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</body>
</html>
