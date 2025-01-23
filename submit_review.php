<?php
session_start();
include('dbcon.php');

if(isset($_POST['submit_review'])) {
    $user_id = $_SESSION['auth_user']['id'];
    $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);
    $review_text = mysqli_real_escape_string($con, $_POST['review_text']);
    
    // Set the correct ID field based on service type
    switch($service_type) {
        case 'battery':
            $service_id = mysqli_real_escape_string($con, $_POST['battery_service_id']);
            $id_field = 'battery_service_id';
            $table = 'battery_services';
            break;
        case 'plumber':
            $service_id = mysqli_real_escape_string($con, $_POST['plumber_id']);
            $id_field = 'plumber_id';
            $table = 'plumbers';
            break;
        // Add other service types here
        default:
            $_SESSION['message'] = "Invalid service type";
            header('Location: index.php');
            exit();
    }
    
    // Check for existing review
    $check_query = "SELECT * FROM reviews 
                   WHERE user_id = '$user_id' 
                   AND $id_field = '$service_id'";
    $check_result = mysqli_query($con, $check_query);
    
    if(mysqli_num_rows($check_result) > 0) {
        // Update existing review
        $update_query = "UPDATE reviews 
                        SET rating = '$rating',
                            review_text = '$review_text',
                            updated_at = CURRENT_TIMESTAMP
                        WHERE user_id = '$user_id' 
                        AND $id_field = '$service_id'";
        
        $result = mysqli_query($con, $update_query);
    } else {
        // Insert new review
        $insert_query = "INSERT INTO reviews 
                        (user_id, $id_field, rating, review_text) 
                        VALUES 
                        ('$user_id', '$service_id', '$rating', '$review_text')";
        
        $result = mysqli_query($con, $insert_query);
    }
    
    if($result) {
        // Update service provider's average rating
        $avg_query = "UPDATE $table 
                     SET rating = (
                         SELECT AVG(rating) 
                         FROM reviews 
                         WHERE $id_field = '$service_id'
                     )
                     WHERE id = '$service_id'";
        mysqli_query($con, $avg_query);
        
        $_SESSION['message'] = "Review submitted successfully!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error submitting review. Please try again.";
        $_SESSION['message_type'] = "danger";
    }
    
    // Redirect back to the appropriate page
    header("Location: {$service_type}_info.php?id=$service_id");
    exit();
}

header("Location: index.php");
exit();
?> 