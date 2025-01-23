<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';  // Default XAMPP/Laragon username
$db_pass = '';      // Default XAMPP/Laragon password
$db_name = '@fank'; // Exact database name as shown in phpMyAdmin

// Create connection with error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Set charset to utf8mb4
    $conn->set_charset("utf8mb4");

    // Set timezone
    date_default_timezone_set('Asia/Dhaka');
    
} catch (Exception $e) {
    die("Connection error: " . $e->getMessage());
}