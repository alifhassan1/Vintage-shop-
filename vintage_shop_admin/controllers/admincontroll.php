<?php
session_start();
include "../models/Admin.php";
include "../config/config.php";

// Ensure admin is logged in
if (!isset($_SESSION["admin"])) {
    header("Location: ../views/login.php");
    exit();
}

// Handle profile update
if (isset($_POST['update_admin'])) {
    $id = $_SESSION["admin"]["id"];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (Admin::updateAdmin($id, $username, $email, $password)) {
        // Destroy current session and force re-login
        session_destroy();
        header("Location: ../views/login.php?success=Profile updated. Please log in again.");
        exit();
    } else {
        header("Location: ../views/edit_profile.php?error=Error updating profile.");
        exit();
    }
}
?>
