<?php
include_once "../config/config.php";

class Product {
    // Get all products from the database
    public static function getAllProducts() {
        global $conn;
        $sql = "SELECT * FROM products ORDER BY id DESC";
        return $conn->query($sql);
    }

    // Get a single product by its ID
    public static function getProductById($id) {
        global $conn;
        $sql = "SELECT * FROM products WHERE id='$id'";
        return $conn->query($sql)->fetch_assoc();
    }

    // Add a new product to the database
    public static function addProduct($name, $price, $description, $image) {
        global $conn;
        $sql = "INSERT INTO products (name, price, description, image) VALUES ('$name', '$price', '$description', '$image')";
        return $conn->query($sql);
    }

    // Delete a product by its ID
    public static function deleteProduct($id) {
        global $conn;
        $sql = "DELETE FROM products WHERE id='$id'";
        return $conn->query($sql);
    }

    // Update a product's details
    public static function updateProduct($id, $name, $price, $description, $image) {
        global $conn;
        $sql = "UPDATE products SET name='$name', price='$price', description='$description', image='$image' WHERE id='$id'";
        return $conn->query($sql);
    }
}
?>
