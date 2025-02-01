<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require_once "../controllers/ViewProfileControllers.php";
require_once "../models/db_connection.php"; // Include DBConnection class

// Initialize feedback variables
$updatePasswordError = "";
$updatePasswordSuccess = "";

// Handle password update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_password'])) {
    $currentPassword = trim($_POST['current_password']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    $db = new \models\DBConnection();
    $conn = $db->connect();

    // Fetch current user data
    $stmt = $conn->prepare("SELECT * FROM buyers WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user']['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        $updatePasswordError = "User not found.";
    } elseif ($currentPassword !== $user['password']) { // Plain-text comparison (not recommended)
        $updatePasswordError = "Current password is incorrect.";
    } elseif (strlen($newPassword) < 6) {
        $updatePasswordError = "New password must be at least 6 characters long.";
    } elseif ($newPassword !== $confirmPassword) {
        $updatePasswordError = "New password and confirmation do not match.";
    } else {
        // Update the password in the database
        $stmt = $conn->prepare("UPDATE buyers SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $newPassword, $_SESSION['user']['id']);
        if ($stmt->execute()) {
            $updatePasswordSuccess = "Password updated successfully.";
        } else {
            $updatePasswordError = "Failed to update the password. Please try again.";
        }
    }

    $stmt->close();
    $conn->close();
}