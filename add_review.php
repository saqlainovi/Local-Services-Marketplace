<?php
session_start();
include('dbcon.php');

if(!isset($_SESSION['auth_user'])) {
    $_SESSION['message'] = "Please login to add a review";
    header('Location: login.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['auth_user']['id'];
    $painter_id = mysqli_real_escape_string($con, $_POST['painter_id']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);
    $review_text = mysqli_real_escape_string($con, $_POST['review_text']);
    
    // Check if user has already reviewed
    $check_query = "SELECT COUNT(*) as review_count 
                    FROM reviews r 
                    JOIN payments p ON r.payment_id = p.id 
                    WHERE r.user_id = '$user_id' 
                    AND p.painter_id = '$painter_id'";
    $result = mysqli_query($con, $check_query);
    $data = mysqli_fetch_assoc($result);
    
    if($data['review_count'] > 0) {
        $_SESSION['message'] = "You have already reviewed this provider";
        header('Location: painter_info.php?id=' . $painter_id);
        exit();
    }
    
    // Get the payment ID
    $payment_query = "SELECT id FROM payments 
                     WHERE user_id = '$user_id' 
                     AND painter_id = '$painter_id' 
                     AND status = 'completed' 
                     ORDER BY created_at DESC LIMIT 1";
    $payment_result = mysqli_query($con, $payment_query);
    $payment_data = mysqli_fetch_assoc($payment_result);
    
    if(!$payment_data) {
        $_SESSION['message'] = "You need to hire this provider first";
        header('Location: painter_info.php?id=' . $painter_id);
        exit();
    }
    
    // Insert the review
    $payment_id = $payment_data['id'];
    $insert_query = "INSERT INTO reviews (payment_id, user_id, painter_id, rating, review_text) 
                    VALUES ('$payment_id', '$user_id', '$painter_id', '$rating', '$review_text')";
    
    if(mysqli_query($con, $insert_query)) {
        $_SESSION['message'] = "Review added successfully";
    } else {
        $_SESSION['message'] = "Something went wrong";
    }
    
    header('Location: painter_info.php?id=' . $painter_id);
    exit();
}
?> 