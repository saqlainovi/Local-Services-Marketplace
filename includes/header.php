<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($page_title) ? "$page_title - Local Service Provider" : "Local Service Provider"; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background: #ffffff;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .navbar {
            background: #fff !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #eee;
        }

        .navbar-brand {
            color: #333 !important;
            font-weight: 600;
        }

        .nav-link {
            color: #555 !important;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        .search-form {
            background: #f8f9fa;
            border-radius: 25px;
            padding: 5px 15px;
            border: 1px solid #eee;
        }

        .search-form input {
            background: transparent;
            border: none;
            color: #333;
            width: 300px;
        }

        .search-form input::placeholder {
            color: #999;
        }

        .search-form input:focus {
            outline: none;
            box-shadow: none;
        }

        .search-form button {
            background: transparent;
            border: none;
            color: #666;
        }

        .content-wrapper {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Status badges */
        .badge.available {
            background: #28a745;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
        }

        .badge.not-available {
            background: #dc3545;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
        }

        /* Experience badges */
        .badge.experience {
            background: #0d6efd;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
        }

        /* Buttons */
        .btn-view-details {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-view-details:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
        }

        .btn-hire-now {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-hire-now:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
        }

        /* Filter section */
        .filter-section {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
        }

        .filter-section select {
            background: #fff;
            border: 1px solid #ddd;
            color: #333;
            border-radius: 10px;
            padding: 8px 15px;
        }

        .filter-section select option {
            background: #fff;
            color: #333;
        }

        .btn-apply-filters {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-apply-filters:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
        }

        /* Heading styles */
        h1, h2, h3, h4, h5, h6 {
            color: #333;
        }

        /* Link styles */
        a {
            color: #0d6efd;
            text-decoration: none;
        }

        a:hover {
            color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="main-content">
</body>
</html> 