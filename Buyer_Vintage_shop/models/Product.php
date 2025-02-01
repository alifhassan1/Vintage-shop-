<?php
namespace models;

class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all products from the database
    public function getAllProducts() {
        $stmt = $this->conn->prepare("SELECT id, name, price, description, stock, image_url FROM products");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Search products based on a query
    public function searchProducts($query) {
        $stmt = $this->conn->prepare("SELECT id, name, price, description, stock, image_url FROM products WHERE name LIKE ? OR description LIKE ?");
        $searchTerm = "%" . $query . "%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
