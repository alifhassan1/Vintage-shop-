<?php
    include_once "../config/config.php";

    class Admin {
        public static function getadmin_profileById($id) {
            global $conn;
            $sql = "SELECT * FROM admins WHERE id='$id'";
            $result = $conn->query($sql);
            return $result->fetch_assoc();
        }
    
        public static function updateAdmin($id, $username, $email, $password, $profile_image) {
            global $conn;
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE admins SET username='$username', email='$email', password='$passwordHash', profile_image='$profile_image' WHERE id='$id'";
            return $conn->query($sql);
        }
    }
    ?>