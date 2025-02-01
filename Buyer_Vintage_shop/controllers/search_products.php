<?php
session_start();

// Include necessary models
require_once "../models/db_connection.php";
require_once "../models/Buyer.php";

use models\DBConnection;
use models\Buyer;

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $db = new DBConnection();
    $conn = $db->connect();
    $buyerModel = new Buyer($conn);

    // Perform the search
    $products = $buyerModel->searchProducts($query); // Assuming you have this method in your Buyer model

    if ($products) {
        foreach ($products as $product) {
            echo '<div class="product">';
            echo '<img src="../' . htmlspecialchars($product['image_url']) . '" alt="' . htmlspecialchars($product['name']) . '">';
            echo '<h2>' . htmlspecialchars($product['name']) . '</h2>';
            echo '<p>' . htmlspecialchars($product['description']) . '</p>';
            echo '<p>Price: $' . htmlspecialchars($product['price']) . '</p>';
            echo '<p>Stock: ' . htmlspecialchars($product['stock']) . '</p>';
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
            echo '<input type="number" name="quantity" value="1" min="1" max="' . $product['stock'] . '">';
            echo '<input type="submit" name="add_to_cart" value="Add to Cart">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found for your search.</p>';
    }
} else {
    echo '<p>No query provided.</p>';
}
?>
