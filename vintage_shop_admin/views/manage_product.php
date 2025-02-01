<?php include "../models/Product.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style3.css">
    <title>Manage Products</title>
</head>
<body>
    <div="container">

    <h2>Product List</h2>

    <!-- Display Success/Error Messages -->
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;"><?php echo $_GET['success']; ?></p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        $products = Product::getAllProducts();
        while ($row = $products->fetch_assoc()) {
            echo "<tr>
                <td><img src='../uploads/{$row['image']}' width='50' height='50' alt='Product Image'></td>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['description']}</td>
                <td>
                    <!-- Update Form -->
                    <form action='manage_products.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <input type='text' name='name' value='{$row['name']}' required>
                        <input type='number' name='price' value='{$row['price']}' required step='0.01'>
                        <textarea name='description' required>{$row['description']}</textarea>
                        <input type='file' name='image' accept='image/*'>
                        <button type='submit' name='update_product'>Update</button>
                    </form>
                    <form action='../controllers/ProductController.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit' name='delete_product'>Delete</button>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>

    <h3>Add Product</h3>
    <form action="../controllers/ProductController.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="price" placeholder="Price" required step="0.01">
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit" name="add_product">Add</button>
    </form>

    <form>
    <p><a href="dashboard.php">Back to DashBoard</a></p>
    </form>

 </div>   

</body>
</html>
