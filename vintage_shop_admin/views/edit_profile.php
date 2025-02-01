<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

include "../models/Admin.php";
$admin = Admin::getAdminById($_SESSION["admin"]["id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Edit Profile</title>
</head>
<body>
   <div="container">
    <h2>Edit Profile</h2>

    <!-- Success/Error Message -->
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;"><?php echo $_GET['success']; ?></p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <form action="../controllers/admincontroller.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $admin['username']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $admin['email']; ?>" required>

        <label>New Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="update_admin">Update Profile</button>
    </form>

    <a href="dashboard.php">Back to Dashboard</a>
    </div>

</body>
</html>
