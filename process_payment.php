<?php
// Prevent any output before our JSON response
ob_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure we're outputting JSON
header('Content-Type: application/json');

try {
    session_start();
    require_once('dbcon.php');

    // Log incoming data
    error_log("Received request data: " . file_get_contents('php://input'));

    // Get JSON data
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON data received: ' . json_last_error_msg());
    }

    // Log decoded data
    error_log("Decoded data: " . print_r($data, true));

    // Validate user is logged in
    if (!isset($_SESSION['authenticated'])) {
        throw new Exception('User not authenticated');
    }

    // Get user ID from email
    $user_email = $_SESSION['auth_user']['email'];
    $user_query = "SELECT id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($con, $user_query);
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    $user_result = mysqli_stmt_get_result($stmt);

    if (!$user_result) {
        throw new Exception('Database error in user query: ' . mysqli_error($con));
    }

    $user = mysqli_fetch_assoc($user_result);
    if (!$user) {
        throw new Exception('User not found in database');
    }

    $user_id = $user['id'];

    // Validate required data
    $required_fields = ['provider_id', 'provider_type', 'amount', 'payment_intent_id', 'booking_date'];
    $missing_fields = [];
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            $missing_fields[] = $field;
        }
    }
    if (!empty($missing_fields)) {
        throw new Exception('Missing required fields: ' . implode(', ', $missing_fields));
    }

    $provider_id = mysqli_real_escape_string($con, $data['provider_id']);
    $provider_type = mysqli_real_escape_string($con, $data['provider_type']);
    $amount = mysqli_real_escape_string($con, $data['amount']);
    $payment_intent_id = mysqli_real_escape_string($con, $data['payment_intent_id']);
    $booking_date = mysqli_real_escape_string($con, $data['booking_date']);

    // Log processed data
    error_log("Processed payment data - Provider ID: $provider_id, Type: $provider_type, Amount: $amount");

    // Initialize all service type fields with NULL values
    $fields = [
        'painter_id' => 'NULL',
        'tv_technician_id' => 'NULL',
        'plumber_id' => 'NULL',
        'electrician_id' => 'NULL',
        'mechanic_id' => 'NULL',
        'packer_mover_id' => 'NULL',
        'locksmith_id' => 'NULL',
        'battery_service_id' => 'NULL'
    ];

    // Set the correct provider field based on type
    $provider_table = '';
    switch($provider_type) {
        case 'painter':
            $fields['painter_id'] = "'$provider_id'";
            $provider_table = 'painters';
            break;
        case 'packer_mover':
            $fields['packer_mover_id'] = "'$provider_id'";
            $provider_table = 'packers_movers';
            break;
        case 'battery':
            $fields['battery_service_id'] = "'$provider_id'";
            $provider_table = 'battery_services';
            break;
        case 'tv_repair':
            $fields['tv_technician_id'] = "'$provider_id'";
            $provider_table = 'tv_repair';
            break;
        case 'plumber':
            $fields['plumber_id'] = "'$provider_id'";
            $provider_table = 'plumbers';
            break;
        case 'electrician':
            $fields['electrician_id'] = "'$provider_id'";
            $provider_table = 'electricians';
            break;
        case 'mechanic':
            $fields['mechanic_id'] = "'$provider_id'";
            $provider_table = 'car_mechanics';
            break;
        case 'locksmith':
            $fields['locksmith_id'] = "'$provider_id'";
            $provider_table = 'locksmiths';
            break;
        default:
            throw new Exception('Invalid service type: ' . $provider_type);
    }

    // Verify provider exists
    $provider_check_query = "SELECT id FROM $provider_table WHERE id = '$provider_id'";
    error_log("Provider check query: $provider_check_query");
    
    $provider_check = mysqli_query($con, $provider_check_query);
    if (!$provider_check) {
        throw new Exception('Error checking provider: ' . mysqli_error($con));
    }
    if (mysqli_num_rows($provider_check) === 0) {
        throw new Exception("Provider not found in $provider_table with ID $provider_id");
    }

    // Build the payment query
    $query = "INSERT INTO payments (
        user_id, 
        painter_id,
        tv_technician_id,
        plumber_id,
        electrician_id,
        mechanic_id,
        packer_mover_id,
        locksmith_id,
        battery_service_id,
        amount, 
        payment_intent_id, 
        status, 
        booking_date
    ) VALUES (
        '$user_id',
        {$fields['painter_id']},
        {$fields['tv_technician_id']},
        {$fields['plumber_id']},
        {$fields['electrician_id']},
        {$fields['mechanic_id']},
        {$fields['packer_mover_id']},
        {$fields['locksmith_id']},
        {$fields['battery_service_id']},
        '$amount',
        '$payment_intent_id',
        'completed',
        '$booking_date'
    )";

    // Log the query
    error_log("Payment insert query: $query");

    if (!mysqli_query($con, $query)) {
        throw new Exception('Error inserting payment: ' . mysqli_error($con));
    }

    $payment_id = mysqli_insert_id($con);
    
    // Update provider availability
    $update_query = "UPDATE $provider_table SET availability = 0 WHERE id = '$provider_id'";
    error_log("Update availability query: $update_query");
    
    if (!mysqli_query($con, $update_query)) {
        error_log("Error updating availability: " . mysqli_error($con));
    }
    
    // Clear any output buffers
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    // Send success response
    echo json_encode([
        'success' => true, 
        'payment_id' => $payment_id,
        'message' => 'Payment processed successfully'
    ]);

} catch (Exception $e) {
    // Log the error
    error_log("Payment processing error: " . $e->getMessage());
    
    // Clear any output buffers
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    // Send error response
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'debug_info' => [
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]
    ]);
}
?>