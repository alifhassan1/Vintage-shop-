<?php
session_start();
include_once "../config/config.php";
include_once "../models/Admin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        // Basic PHP Validation
        if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["username"]) || 
            empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"]) || 
            empty($_POST["gender"]) || empty($_POST["address"]) || empty($_POST["phone"])) {
            $_SESSION["error"] = "All fields are required!";
            header("Location: ../views/register.php");
            exit();
        }
        
        if ($_POST["password"] !== $_POST["confirmpassword"]) {
            $_SESSION["error"] = "Passwords do not match!";
            header("Location: ../views/register.php");
            exit();
        }
        
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Invalid email format!";
            header("Location: ../views/register.php");
            exit();
        }
        
        if (strlen($_POST["password"]) < 6) {
            $_SESSION["error"] = "Password must be at least 6 characters long!";
            header("Location: ../views/register.php");
            exit();
        }

        if (!is_numeric($_POST["phone"])) {
            $_SESSION["error"] = "Phone number must be numeric!";
            header("Location: ../views/register.php");
            exit();
        }

        $registerSuccess = Admin::register($_POST);
        if ($registerSuccess) {
            $_SESSION["success"] = "Registration successful! Please log in.";
            header("Location: ../views/login.php");
        } else {
            $_SESSION["error"] = "Registration failed. Try again.";
            header("Location: ../views/register.php");
        }
        exit();
    }

    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $_SESSION["error"] = "Username and Password are required!";
            header("Location: ../views/login.php");
            exit();
        }

        $admin = Admin::login($_POST["username"], $_POST["password"]);
        if ($admin) {
            $_SESSION["admin"] = $admin;
            header("Location: ../views/dashboard.php");
        } else {
            $_SESSION["error"] = "Invalid username or password!";
            header("Location: ../views/login.php");
        }
        exit();
    }
}

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: ../views/login.php");
}
?>
