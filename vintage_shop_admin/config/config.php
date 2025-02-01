<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$dbname = "vintage_shop1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
