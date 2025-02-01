<?php
namespace models;
class Buyer
{
    private $conn;

    public function __construct($dbConnection)
    {
        // Set the database connection
        $this->conn = $dbConnection;
    }

    public function register($data)
    {
        $query = "INSERT INTO buyers 
                  (first_name, last_name, email, password, phone, address, city, country, postal_code, shipping_address, user_type)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
    
        if ($stmt === false) {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to prepare SQL query: ' . $this->conn->error
            ]);
        }
    
        // Bind parameters
        $stmt->bind_param(
            'sssssssssss', // Data types for each parameter: s=string
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password'], // Make sure this is hashed before binding
            $data['phone'],
            $data['address'],
            $data['city'],
            $data['country'],
            $data['postal_code'],
            $data['shipping_address'],
            $data['user_type']
        );
    
        // Execute the statement
        $result = $stmt->execute();
    
        if ($result) {
        header("Location: index.php?action=login");
        exit(); 
        }
    
        return json_encode([
            'status' => 'error',
            'message' => 'Registration failed. Please try again.'
        ]);
    }


    public function login($email, $password) {
        $query = "SELECT * FROM buyers WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
    
        // Bind parameters
        $stmt->bind_param('ss', $email, $password);
    
        // Execute query
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Fetch user data
        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        }
    
        return false; // Login failed
    }
    
    public function getAllProducts()
{
    $query = "SELECT * FROM products WHERE stock > 0";
    $result = $this->conn->query($query);

    if ($result === false) {
        return [];
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

public function getUserById($userId) {
    $query = "SELECT * FROM buyers WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Inside Buyer.php
// Modify the method definition to accept all 9 parameters
public function updateUserProfile($userId, $firstName, $lastName, $email, $phone, $address, $city, $country, $postalCode) {
    $query = "UPDATE buyers 
              SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ?, city = ?, country = ?, postal_code = ?
              WHERE id = ?";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ssssssssi", $firstName, $lastName, $email, $phone, $address, $city, $country, $postalCode, $userId);
    $stmt->execute();
}


public function getProductById($productId) {
    // SQL query to fetch product by ID
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        // Throw an exception if the statement preparation fails
        throw new \Exception("Error preparing query: " . $this->conn->error);
    }

    // Bind the parameter
    $stmt->bind_param("i", $productId); // "i" specifies integer

    // Execute the query
    if (!$stmt->execute()) {
        // Throw an exception if the execution fails
        throw new \Exception("Error executing query: " . $stmt->error);
    }

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Return null if no product is found
        return null;
    }

    // Fetch and return the product details
    return $result->fetch_assoc();
}


public function searchProducts($query) {
    // Using MySQLi with '?' placeholder for query parameters
    $query = "%" . $query . "%";  // Add wildcard to query for LIKE search
    $stmt = $this->conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");

    if ($stmt === false) {
        return []; // If query preparation fails, return an empty array
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("ss", $query, $query); // 'ss' means two string parameters

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch all matching rows as an associative array
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

public function checkEmailExists($email) {
    $stmt = $this->conn->prepare("SELECT * FROM buyers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}



public function updatePassword($email, $password)
{
    // Debugging: Output email and password
    var_dump($email, $password);

    $stmt = $this->conn->prepare("UPDATE buyers SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $password, $email);

    if ($stmt->execute()) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . $this->conn->error;
    }

    $stmt->close();
}

}
?>
