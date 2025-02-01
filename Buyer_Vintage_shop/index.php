<?php
// Include the database connection and BuyerController
require_once './models/db_connection.php';
require_once './controllers/BuyerController.php';

// Instantiate DBConnection and get the connection
$dbConnection = new models\DBConnection();
$conn = $dbConnection->connect();

$action = $_GET['action'] ?? null;

if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create an instance of BuyerController and pass the $conn object
    $controller = new BuyerController($conn);

    // Call the register method and pass POST data
    $response = $controller->register($_POST);

    // Output the response (JSON)
    echo $response;
} else {
    // Show the registration form if no action or GET request
    include './view/login.php'; // Make sure this file exists
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
    
</body>
</html>