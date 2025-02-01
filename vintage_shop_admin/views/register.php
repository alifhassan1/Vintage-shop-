<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/validation.js"></script>
    <title>Admin Registration</title>
</head>
<body>
    <div class="center">
        <form action="../controllers/AuthController.php" onsubmit="return validation()" method="post">
            <h3>Register Now</h3>
            <?php if (isset($_SESSION["error"])) { echo "<p style='color: red;'>".$_SESSION["error"]."</p>"; unset($_SESSION["error"]); } ?>

            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email" >
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
            <select name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <textarea name="address" placeholder="Address"></textarea>
            <input type="tel" name="phone" placeholder="Phone Number">

            <button type="submit" name="register">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
