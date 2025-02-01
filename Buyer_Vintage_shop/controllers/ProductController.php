<?php
session_start();
require_once "../models/db_connection.php";
require_once "../models/Product.php";
require_once "../models/Cart.php";

use models\DBConnection;
use models\Product;


// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

// Initialize DB connection and Product model
$db = new DBConnection();
$conn = $db->connect();
$productModel = new Product($conn);

// Fetch all products
$products = $productModel->getAllProducts();

// Handle search query if it's passed
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $products = $productModel->searchProducts($query);
}

// Initialize the cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if product ID and quantity are set in POST request
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if product is already in the cart
    $productFound = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['id'] == $productId) {
            $cartItem['quantity'] += $quantity; // Update quantity
            $productFound = true;
            break;
        }
    }

    // If product is not found in the cart, add it
    if (!$productFound) {
        $_SESSION['cart'][] = [
            'id' => $productId,
            'quantity' => $quantity
        ];
    }
}

// Check if the page is requested via AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    // If it's an AJAX request, render the product list as HTML and send it back as the response
    foreach ($products as $product) {
        echo "<div class='product'>
                <img src='../" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "'>
                <h2>" . htmlspecialchars($product['name']) . "</h2>
                <p>" . htmlspecialchars($product['description']) . "</p>
                <p>Price: $" . htmlspecialchars($product['price']) . "</p>
                <p>Stock: " . htmlspecialchars($product['stock']) . "</p>
                <form action='' method='POST'>
                    <input type='hidden' name='product_id' value='" . $product['id'] . "'>
                    <input type='number' name='quantity' value='1' min='1' max='" . $product['stock'] . "'>
                    <input type='submit' name='add_to_cart' value='Add to Cart'>
                </form>
            </div>";
    }
    exit(); // End the script after sending the response
}

// If it's a normal page request, include the view
require_once "../view/Buyer.php";
?>
