<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Add User
if (isset($_POST['add_user'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verify_token = md5(rand());

    $sql = "INSERT INTO users (name, email, phone, password, verify_token, verify_status) 
            VALUES ('$name', '$email', '$phone', '$password', '$verify_token', 1)";

    if ($conn->query($sql)) {
        $_SESSION['message'] = "User added successfully!";
    } else {
        $_SESSION['message'] = "Error adding user: " . $conn->error;
    }
    header("Location: users.php");
    exit();
}

// Update User
if (isset($_POST['update_user'])) {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $verify_status = isset($_POST['verify_status']) ? 1 : 0;

    $sql = "UPDATE users SET 
            name = '$name',
            email = '$email',
            phone = '$phone',
            verify_status = $verify_status
            WHERE id = $id";

    if ($conn->query($sql)) {
        $_SESSION['message'] = "User updated successfully!";
    } else {
        $_SESSION['message'] = "Error updating user: " . $conn->error;
    }
    header("Location: users.php");
    exit();
}

// Get User Data (for AJAX requests)
if (isset($_GET['get_user'])) {
    $id = (int)$_GET['get_user'];
    $result = $conn->query("SELECT id, name, email, phone, verify_status FROM users WHERE id = $id");
    if ($user = $result->fetch_assoc()) {
        echo json_encode($user);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
    exit();
}

// Delete User (if not handled in users.php)
if (isset($_POST['delete_user'])) {
    $id = (int)$_POST['user_id'];
    if ($conn->query("DELETE FROM users WHERE id = $id")) {
        $_SESSION['message'] = "User deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting user: " . $conn->error;
    }
    header("Location: users.php");
    exit();
} 