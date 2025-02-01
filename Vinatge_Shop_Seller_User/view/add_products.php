<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h2>Add a New Product</h2>
    <form action="../controller/upload_product.php" method="post" enctype="multipart/form-data">
        <label>Product Name:</label>
        <input type="text" name="name"><br><br>

        <label>Price:</label>
        <input type="number" name="price" step="0.01"><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <label>Upload Image:</label>
        <input type="file" name="image"><br><br>

        <input type="submit" value="Add Product">
    </form>
    <br>
</body>
</html>
