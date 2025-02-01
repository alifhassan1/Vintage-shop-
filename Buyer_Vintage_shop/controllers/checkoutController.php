<?php
session_start();
require_once "../models/db_connection.php";
require_once "../models/Cart.php";

use models\DBConnection;
use models\Cart;

// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

// Initialize DB connection and Cart model
$db = new DBConnection();
$conn = $db->connect();
$cartModel = new Cart($conn);

// Get cart items and total price
$cartData = $cartModel->getCartItems($_SESSION['cart']);
$cartItems = $cartData['items'];
$totalPrice = $cartData['totalPrice'];

// Include the view
require_once "../view/checkout.php";
?>
