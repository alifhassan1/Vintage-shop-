<?php
include '../userModel/db_connect.php'; // Connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO product (name, price, description, image) VALUES ('$name', '$price', '$description', '$target_file')";

    if ($conn->query($sql) === TRUE) {
       // header("Location:../view/view_product.php"); // Redirect after success
       echo "Product added successfully!";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
