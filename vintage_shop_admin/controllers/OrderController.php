<?php
include "../models/Order.php";

// Add new order
if (isset($_POST['add_order'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    if (Order::addOrder($product_name, $quantity, $customer_name, $customer_email, $customer_address)) {
        header("Location: ../views/manage_orders.php?success=Order added successfully!");
    } else {
        header("Location: ../views/manage_orders.php?error=Error adding order.");
    }
}

// Update order
if (isset($_POST['update_order_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    if (Order::updateOrderStatus($id, $status)) {
        header("Location: ../views/manage_orders.php?success=Order status updated successfully!");
    } else {
        header("Location: ../views/manage_orders.php?error=Error updating order status.");
    }
}

// Delete order
if (isset($_POST['delete_order'])) {
    $id = $_POST['id'];

    if (Order::deleteOrder($id)) {
        header("Location: ../views/manage_orders.php?success=Order deleted successfully!");
    } else {
        header("Location: ../views/manage_orders.php?error=Error deleting order.");
    }
}
?>
