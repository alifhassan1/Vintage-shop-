<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user']['id'])) {
    header("Location: ../index.php");
    exit;
}

require_once "../models/db_connection.php"; // Include your DBConnection class

use models\DBConnection;

// Initialize the DBConnection class and connect to the database
$dbInstance = new DBConnection();
$db = $dbInstance->connect(); // Call the connect() method to get the mysqli connection

$userId = $_SESSION['user']['id']; // Use 'id' from the session's user array

// SQL query to fetch the purchase history
$query = "SELECT oh.id AS order_id, oh.product_id, oh.quantity, oh.price, oh.total_price, oh.status, oh.created_at, 
                 p.name AS product_name, p.description AS product_description
          FROM order_history oh
          JOIN products p ON oh.product_id = p.id
          WHERE oh.user_id = ?
          ORDER BY oh.created_at DESC";

$stmt = $db->prepare($query); // Use the mysqli prepare() method
if (!$stmt) {
    die("Error: Failed to prepare query. " . $db->error); // Handle query preparation errors
}

$stmt->bind_param("i", $userId); // Bind the user_id parameter to the query
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result set

$purchaseHistory = []; // Initialize an array to hold the purchase history
while ($row = $result->fetch_assoc()) {
    $purchaseHistory[] = $row; // Fetch and store each row of data
}

$stmt->close(); // Close the prepared statement
$db->close(); // Close the database connection
?>
