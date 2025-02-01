<?php
// Include the model
require_once "../models/db_connection.php";
require_once "../models/Buyer.php";

use models\DBConnection;
use models\Buyer;

// Get user data
$db = new DBConnection();
$conn = $db->connect();
$buyerModel = new Buyer($conn);

$userId = $_SESSION['user']['id'];
$user = $buyerModel->getUserById($userId);
?>