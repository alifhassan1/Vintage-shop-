<?php
session_start();
require_once "../models/db_connection.php";
require_once "../models/Buyer.php";

use models\DBConnection;
use models\Buyer;

// Check if the user is logged in and password is verified
if (!isset($_SESSION['user']) || !isset($_SESSION['password_verified']) || !$_SESSION['password_verified']) {
    header("Location: view_profile.php"); // Redirect if password not verified
    exit();
}

$db = new DBConnection();
$conn = $db->connect();
$buyerModel = new Buyer($conn);

$userId = $_SESSION['user']['id'];
$user = $buyerModel->getUserById($userId);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $country = htmlspecialchars($_POST['country']);
    $postalCode = htmlspecialchars($_POST['postal_code']);

    // Update profile in the database
    $buyerModel->updateUserProfile($userId, $firstName, $lastName, $email, $phone, $address, $city, $country, $postalCode);

    // Update the session with the new user data
    $_SESSION['user'] = $buyerModel->getUserById($userId);
    $_SESSION['password_verified'] = false;

    // Redirect to profile page
    header("Location: profile.php");
    exit();
}
?>
