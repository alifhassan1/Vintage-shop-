<?php
namespace models;

class DBConnection {
    private $host = "localhost";
    private $dbname = "vintage_shop";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        try {
            $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new \Exception("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;
        } catch (\Exception $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }
}
?>
