<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Add Service Provider
if (isset($_POST['add_service'])) {
    $service_type = $conn->real_escape_string($_POST['service_type']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $location = $conn->real_escape_string($_POST['location']);
    $price = (float)$_POST['price'];
    $work_experience = (int)$_POST['work_experience'];

    // Determine price field name based on service type
    $price_field = 'price_per_service';
    if ($service_type == 'painters') {
        $price_field = 'price_per_day';
    } elseif (in_array($service_type, ['car_mechanics', 'electricians', 'packers_movers'])) {
        $price_field = 'price_per_hour';
    }

    $sql = "INSERT INTO $service_type (name, email, contact_number, location, $price_field, work_experience) 
            VALUES ('$name', '$email', '$contact_number', '$location', $price, $work_experience)";

    if ($conn->query($sql)) {
        $_SESSION['message'] = "Service provider added successfully!";
    } else {
        $_SESSION['message'] = "Error adding service provider: " . $conn->error;
    }
    header("Location: services.php?type=$service_type");
    exit();
}

// Update Service Provider
if (isset($_POST['update_service'])) {
    $service_type = $conn->real_escape_string($_POST['service_type']);
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $location = $conn->real_escape_string($_POST['location']);
    $price = (float)$_POST['price'];
    $work_experience = (int)$_POST['work_experience'];

    // Determine price field name based on service type
    $price_field = 'price_per_service';
    if ($service_type == 'painters') {
        $price_field = 'price_per_day';
    } elseif (in_array($service_type, ['car_mechanics', 'electricians', 'packers_movers'])) {
        $price_field = 'price_per_hour';
    }

    $sql = "UPDATE $service_type SET 
            name = '$name',
            email = '$email',
            contact_number = '$contact_number',
            location = '$location',
            $price_field = $price,
            work_experience = $work_experience
            WHERE id = $id";

    if ($conn->query($sql)) {
        $_SESSION['message'] = "Service provider updated successfully!";
    } else {
        $_SESSION['message'] = "Error updating service provider: " . $conn->error;
    }
    header("Location: services.php?type=$service_type");
    exit();
}

// Delete Service Provider
if (isset($_POST['delete_service'])) {
    $service_type = $conn->real_escape_string($_POST['service_type']);
    $id = (int)$_POST['service_id'];

    if ($conn->query("DELETE FROM $service_type WHERE id = $id")) {
        $_SESSION['message'] = "Service provider deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting service provider: " . $conn->error;
    }
    header("Location: services.php?type=$service_type");
    exit();
}

// Get Service Provider Data (for AJAX requests)
if (isset($_GET['get_service'])) {
    $service_type = $conn->real_escape_string($_GET['type']);
    $id = (int)$_GET['get_service'];
    
    $result = $conn->query("SELECT * FROM $service_type WHERE id = $id");
    if ($service = $result->fetch_assoc()) {
        echo json_encode($service);
    } else {
        echo json_encode(['error' => 'Service provider not found']);
    }
    exit();
} 