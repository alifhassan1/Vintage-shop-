<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

// Include the database connection
require_once "../models/db_connection.php";
require_once "../models/Buyer.php";  // Make sure you include the Buyer model

use models\DBConnection;
use models\Buyer;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $db = new DBConnection();
    $conn = $db->connect();

    // Create Buyer model instance
    $buyer = new Buyer($conn);

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Loop through cart items and insert them into the order_history table
        foreach ($_SESSION['cart'] as $cartItem) {
            // Fetch product details
            $stmt = $conn->prepare("SELECT id, price, stock FROM products WHERE id = ?");
            if ($stmt === false) {
                die('MySQL prepare error (SELECT): ' . $conn->error);
            }

            $stmt->bind_param("i", $cartItem['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();

            if ($product) {
                $totalPrice = $product['price'] * $cartItem['quantity'];

                // Insert order item into the order_history table
                $stmt = $conn->prepare("INSERT INTO order_history (user_id, product_id, quantity, price, total_price, status) VALUES (?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die('MySQL prepare error (INSERT): ' . $conn->error);
                }

                $userId = $_SESSION['user']['id'];
                $status = 'pending';  // Set status as 'pending' initially
                $stmt->bind_param("iiidss", $userId, $cartItem['id'], $cartItem['quantity'], $product['price'], $totalPrice, $status);
                $stmt->execute();

                // Decrease the stock of the product after the order is placed
                $newStock = $product['stock'] - $cartItem['quantity'];

                // Update the product stock in the database
                $updateStockStmt = $conn->prepare("UPDATE products SET stock = ? WHERE id = ?");
                if ($updateStockStmt === false) {
                    die('MySQL prepare error (UPDATE stock): ' . $conn->error);
                }
                $updateStockStmt->bind_param("ii", $newStock, $cartItem['id']);
                $updateStockStmt->execute();
            }
        }

        // Commit the transaction
        $conn->commit();

        // Clear the cart session after the order is completed
        unset($_SESSION['cart']);

        // Redirect to the order success page
        header("Location: ../view/order_success.php");
        exit();

    } catch (Exception $e) {
        // If an error occurs, rollback the transaction
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Your cart is empty.";
}
?>
