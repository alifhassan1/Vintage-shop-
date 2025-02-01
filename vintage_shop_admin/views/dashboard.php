<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">

        <!-- Sidebar for Navigation -->
        <div class="sidebar">
            <a href="manage_product.php">Manage Products</a>
            <a href="manage_orders.php">Manage Orders</a>
            <a href="help_section.php">Help</a>
            <a href="edit_profile.php">Edit Profile</a>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Welcome, <?php echo $_SESSION["admin"]["username"]; ?>!</h1>
            
            <!-- Logout Button -->
            <a href="../controllers/AuthController.php?logout=true" class="logout">Logout</a>
        </div>

    </div>
</body>
</html>
