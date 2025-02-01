<?php
session_start();
require_once "../models/db_connection.php";
require_once "../models/Buyer.php";

use models\DBConnection;
use models\Buyer;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the password field is not empty
    if (empty($_POST['password'])) {
        $_SESSION['error'] = "Please enter your password to continue.";
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to show the error message
        exit();
    }

    $enteredPassword = $_POST['password']; // The password entered by the user
    $userId = $_SESSION['user']['id']; // The current logged-in user's ID

    // Fetch the user's stored password using their ID
    $db = new DBConnection();
    $conn = $db->connect();
    $buyerModel = new Buyer($conn);
    $user = $buyerModel->getUserById($userId);

    // Check if the entered password matches the stored password
    if ($user && $user['password'] === $enteredPassword) {
        // Password is correct, allow the user to edit their profile
        $_SESSION['password_verified'] = true; // Set a session flag for verification
        header("Location: ../view/edit_profile_form.php"); // Redirect to the profile editing page
        exit(); // Ensure no further code runs after the redirect
    } else {
        // Incorrect password, show an error
        $_SESSION['error'] = "Incorrect password. Please try again.";
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to show the error message
        exit();
    }
}
?>
