<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Initialize cart
}

$productId = $_POST['product_id'];
$productName = $_POST['name'];
$productPrice = $_POST['price'];
$productQuantity = $_POST['quantity'];

// Check if product is already in the cart
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['product_id'] == $productId) {
        $item['quantity'] += $productQuantity; // Update quantity
        $found = true;
        break;
    }
}

if (!$found) {
    // Add new product
    $_SESSION['cart'][] = [
        'product_id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => $productQuantity
    ];
}

header("Location: cart.php");

?>
