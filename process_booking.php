<?php
session_start();
include('dbcon.php');

if(isset($_POST['payment_intent_id'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $payment_intent_id = mysqli_real_escape_string($con, $data['payment_intent_id']);
    $provider_id = mysqli_real_escape_string($con, $data['provider_id']);
    $amount = mysqli_real_escape_string($con, $data['amount']);
    $booking_date = mysqli_real_escape_string($con, $data['booking_date']);
    $user_id = $_SESSION['auth_user']['id'];
    
    // Generate booking ID
    $booking_id = 'BK' . time() . rand(1000, 9999);
    
    // Insert payment record
    $payment_query = "INSERT INTO payments (payment_intent_id, amount, status) 
                     VALUES ('$payment_intent_id', '$amount', 'completed')";
    
    if(mysqli_query($con, $payment_query)) {
        $payment_id = mysqli_insert_id($con);
        
        // Insert booking record
        $booking_query = "INSERT INTO bookings (booking_id, user_id, provider_id, 
                         service_type, booking_date, payment_id, status) 
                         VALUES ('$booking_id', '$user_id', '$provider_id', 
                         'plumber', '$booking_date', '$payment_id', 'pending')";
        
        if(mysqli_query($con, $booking_query)) {
            echo json_encode(['success' => true, 'payment_id' => $payment_id]);
            exit();
        }
    }
    
    echo json_encode(['success' => false, 'message' => 'Booking failed']);
    exit();
}

header('Location: index.php');
exit();
?> 