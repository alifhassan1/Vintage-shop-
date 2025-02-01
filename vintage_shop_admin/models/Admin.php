<?php
include_once "../config/config.php";

class Admin {
    public static function register($data) {
        global $conn;

        $firstname = htmlspecialchars($data['firstname']);
        $lastname = htmlspecialchars($data['lastname']);
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $gender = htmlspecialchars($data['gender']);
        $address = htmlspecialchars($data['address']);
        $phone = htmlspecialchars($data['phone']);

        $sql = "INSERT INTO admins (firstname, lastname, username, email, password, gender, address, phone) 
                VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$gender', '$address', '$phone')";

        return $conn->query($sql);
    }

    public static function login($username, $password) {
        global $conn;

        $sql = "SELECT * FROM admins WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                return $admin;
            }
        }
        return false;
    }

    public static function getAdminById($id) {
        global $conn;
        $sql = "SELECT * FROM admins WHERE id='$id'";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function updateAdmin($id, $username, $email, $password) {
        global $conn;
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE admins SET username='$username', email='$email', password='$passwordHash' WHERE id='$id'";
        return $conn->query($sql);
    }
}
?>
