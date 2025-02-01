<?php
session_start();
require_once "../models/db_connection.php";
require_once "../models/Buyer.php";

use models\DBConnection;
use models\Buyer;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    // Validate email
    if ($email) {
        // Initialize DB connection and Buyer model
        $db = new DBConnection();
        $conn = $db->connect();
        $buyerModel = new Buyer($conn);

        // Check if the email exists in the database
        $user = $buyerModel->checkEmailExists($email);

        if ($user) {
            // Redirect to the reset password page with email
            header("Location: ../view/update-password.php?email=" . urlencode($email));
            exit;
        } else {
            // Set error if email not found
            $_SESSION['error'] = "Email address not found.";
        }

        $conn->close();
    } else {
        // Set error if the email is invalid
        $_SESSION['error'] = "Please enter a valid email address.";
    }

    // Redirect back to the forgot password page with the error message
    header("Location: forgot-password.php");
    exit;
}
?>
