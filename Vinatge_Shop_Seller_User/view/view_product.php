<?php
include '../userModel/db_connect.php'; // Connect to database

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
</head>
<body>
    <h2>Products</h2>
    <table border="1">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" width="100"></td>
                <td><?php echo $row['name']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td><?php echo $row['description']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
</body>
</html>

<?php $conn->close(); ?>
