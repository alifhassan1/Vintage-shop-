<?php

require_once "../models/db_connection.php";
require_once "../models/Buyer.php";

use models\DBConnection;
use models\Buyer;

class PasswordResetController
{
    public function resetPassword()
    {
        session_start();

        if (!isset($_GET['email'])) {
            $_SESSION['error'] = "Invalid request.";
            header("Location: ../view/forgot-password.php");
            exit;
        }

        $email = $_GET['email'];
        $db = new DBConnection();
        $buyerModel = new Buyer($db->connect());
        $user = $buyerModel->checkEmailExists($email);

        if (!$user) {
            $_SESSION['error'] = "Email address not found.";
            header("Location: ../view/forgot-password.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = trim($_POST['password']);
            if (strlen($password) >= 6) {
                $buyerModel->updatePassword($email, $password);
                $_SESSION['success'] = "Password updated successfully. You can now log in.";
                header("Location: ../index.php");
                exit;
            } else {
                $_SESSION['error'] = "Password must be at least 6 characters long.";
            }
        }
    }
}

$controller = new PasswordResetController();
$controller->resetPassword();
