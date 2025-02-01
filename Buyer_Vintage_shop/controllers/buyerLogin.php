<?php
session_start();
require_once "../models/Buyer.php";
require_once "../models/db_connection.php";
use models\DBConnection;
use models\Buyer;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new DBConnection();
    $conn = $db->connect();
    $buyerModel = new Buyer($conn);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $buyerModel->login($email, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: ../view/buyer.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password";
        header("Location: ../index.php");
        exit();
    }
}
?>
