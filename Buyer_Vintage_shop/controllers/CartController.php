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

// Ensure the cart session variable is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get cart items and total price
$cartData = $cartModel->getCartItems($_SESSION['cart']);
$cartItems = $cartData['items'];
$totalPrice = $cartData['totalPrice'];

// Handle cart clearing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
    $cartModel->clearCart();
    header("Location: cart.php");
    exit();
}

// Include the view
require_once "../view/cart.php";
?>
