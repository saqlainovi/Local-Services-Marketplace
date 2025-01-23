<?php
session_start();
include '../includes/db_connect.php';

// Admin credentials - in production, these should be stored securely
$ADMIN_USERNAME = "admin";
$ADMIN_PASSWORD = password_hash("admin123", PASSWORD_DEFAULT); // Change this in production

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $ADMIN_USERNAME && password_verify($password, $ADMIN_PASSWORD)) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
} 