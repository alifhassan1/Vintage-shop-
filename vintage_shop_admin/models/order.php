<?php
include_once "../config/config.php";

class Order {
    // Get all orders
    public static function getAllOrders() {
        global $conn;
        $sql = "SELECT * FROM orders ORDER BY order_date DESC"; // Get all orders in descending order by date
        return $conn->query($sql);
    }

    // Add new order
    public static function addOrder($product_name, $quantity, $customer_name, $customer_email, $customer_address) {
        global $conn;
        $sql = "INSERT INTO orders (product_name, quantity, customer_name, customer_email, customer_address) 
                VALUES ('$product_name', '$quantity', '$customer_name', '$customer_email', '$customer_address')";
        return $conn->query($sql);
    }

    // Update order status
    public static function updateOrderStatus($id, $status) {
        global $conn;
        $sql = "UPDATE orders SET status = '$status' WHERE id = '$id'";
        return $conn->query($sql);
    }

    // Delete order
    public static function deleteOrder($id) {
        global $conn;
        $sql = "DELETE FROM orders WHERE id = '$id'";
        return $conn->query($sql);
    }
}
?>
