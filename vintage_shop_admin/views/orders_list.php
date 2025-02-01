<!-- view/orders_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Shipping Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['item']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['customer_name']; ?></td>
                <td><?php echo $order['address']; ?></td>
                <td>
                    <form action="index.php?action=update-order&id=<?php echo $order['id']; ?>" method="POST">
                        <select name="order_status">
                            <option value="Pending" <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="Shipped" <?php echo $order['status'] == 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
                            <option value="Delivered" <?php echo $order['status'] == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                        </select>
                        <input type="submit" value="Update Status">
                    </form>
                </td>
                <td>
                    <a href="index.php?action=delete-order&id=<?php echo $order['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
