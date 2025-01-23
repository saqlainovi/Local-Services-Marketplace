<?php
session_start();

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';

if(empty($type) || empty($id)) {
    header('Location: index.php');
    exit();
}

// Redirect to appropriate info page based on service type
switch($type) {
    case 'plumber':
        header("Location: plumber_info.php?id=$id");
        break;
    case 'electrician':
        header("Location: electrician_info.php?id=$id");
        break;
    case 'painter':
        header("Location: painter_info.php?id=$id");
        break;
    // Add other service types here
    default:
        header('Location: index.php');
}
exit();
?> 