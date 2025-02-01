<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

include "../models/Order.php";
$orders = Order::getAllOrders();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style3.css">
    <title>Manage Orders</title>
</head>
<body>
    <div="container">
    <h1>Manage Orders</h1>

    <a href="dashboard.php" class="dashboard-link">Back to Dashboard</a>

    <!-- Display Success/Error Messages -->
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;"><?php echo $_GET['success']; ?></p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <h3>Add New Order</h3>
    <form action="../controllers/OrderController.php" method="POST">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="text" name="customer_name" placeholder="Customer Name" required>
        <input type="email" name="customer_email" placeholder="Customer Email" required>
        <textarea name="customer_address" placeholder="Customer Address" required></textarea>
        <button type="submit" name="add_order">Add Order</button>
    </form>

    <h3>Order List</h3>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Customer</th>
            <th>Email</th>
            <th>Address</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $orders->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['customer_email']; ?></td>
            <td><?php echo $row['customer_address']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td>
                <!-- Update Order Status -->
                <form action="../controllers/OrderController.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <select name="status">
                        <option value="Pending" <?php echo $row['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="Shipped" <?php echo $row['status'] == 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
                        <option value="Delivered" <?php echo $row['status'] == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                        <option value="Cancelled" <?php echo $row['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                    <button type="submit" name="update_order_status">Update Status</button>
                </form>

                <!-- Delete Order -->
                <form action="../controllers/OrderController.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_order">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
  
</div>
</body>
</html>
