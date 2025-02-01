<?php
include "../models/Product.php";

if (isset($_POST['add_product'])) {
    // Add Product Logic
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    
    // Image Upload Logic
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    
    if (Product::addProduct($name, $price, $description, $image)) {
        header("Location: ../views/manage_product.php?success=Product added successfully!");
    } else {
        header("Location: ../views/manage_product.php?error=Error adding product.");
    }
}

if (isset($_POST['delete_product'])) {
    // Delete Product Logic
    $id = $_POST['id'];
    if (Product::deleteProduct($id)) {
        header("Location: ../views/manage_product.php?success=Product deleted successfully!");
    } else {
        header("Location: ../views/manage_product.php?error=Error deleting product.");
    }
}

if (isset($_POST['update_product'])) {
    // Update Product Logic
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    
    // Image Upload Logic
    if ($image) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        $product = Product::getProductById($id);
        $image = $product['image']; // Keep the old image if no new one is uploaded
    }
    
    if (Product::updateProduct($id, $name, $price, $description, $image)) {
        header("Location: ../views/manage_product.php?success=Product updated successfully!");
    } else {
        header("Location: ../views/manage_product.php?error=Error updating product.");
    }
}
?>
