<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Complete Payment
if (isset($_POST['complete_payment'])) {
    $payment_id = (int)$_POST['payment_id'];
    
    if ($conn->query("UPDATE payments SET status = 'completed' WHERE id = $payment_id")) {
        $_SESSION['message'] = "Payment marked as completed successfully!";
    } else {
        $_SESSION['message'] = "Error updating payment status: " . $conn->error;
    }
    header("Location: payments.php");
    exit();
}

// Get Payment Details (for AJAX requests)
if (isset($_GET['get_payment'])) {
    $payment_id = (int)$_GET['get_payment'];
    
    $result = $conn->query("
        SELECT p.*, u.name as user_name, u.email as user_email,
               COALESCE(pa.name, e.name, pl.name, t.name, m.name, pm.name, l.name, b.name) as provider_name,
               COALESCE(pa.email, e.email, pl.email, t.email, m.email, pm.email, l.email, b.email) as provider_email,
               CASE
                   WHEN p.painter_id IS NOT NULL THEN 'Painter'
                   WHEN p.electrician_id IS NOT NULL THEN 'Electrician'
                   WHEN p.plumber_id IS NOT NULL THEN 'Plumber'
                   WHEN p.tv_technician_id IS NOT NULL THEN 'TV Technician'
                   WHEN p.mechanic_id IS NOT NULL THEN 'Mechanic'
                   WHEN p.packer_mover_id IS NOT NULL THEN 'Packer & Mover'
                   WHEN p.locksmith_id IS NOT NULL THEN 'Locksmith'
                   WHEN p.battery_service_id IS NOT NULL THEN 'Battery Service'
               END as service_type
        FROM payments p
        JOIN users u ON p.user_id = u.id
        LEFT JOIN painters pa ON p.painter_id = pa.id
        LEFT JOIN electricians e ON p.electrician_id = e.id
        LEFT JOIN plumbers pl ON p.plumber_id = pl.id
        LEFT JOIN tv_repair t ON p.tv_technician_id = t.id
        LEFT JOIN mechanics m ON p.mechanic_id = m.id
        LEFT JOIN packers_movers pm ON p.packer_mover_id = pm.id
        LEFT JOIN locksmiths l ON p.locksmith_id = l.id
        LEFT JOIN battery_services b ON p.battery_service_id = b.id
        WHERE p.id = $payment_id
    ");

    if ($payment = $result->fetch_assoc()) {
        // Get related review if exists
        $review_result = $conn->query("SELECT * FROM reviews WHERE payment_id = $payment_id");
        $payment['review'] = $review_result->fetch_assoc();
        
        echo json_encode($payment);
    } else {
        echo json_encode(['error' => 'Payment not found']);
    }
    exit();
}

// Delete Payment (if needed)
if (isset($_POST['delete_payment'])) {
    $payment_id = (int)$_POST['payment_id'];
    
    // First delete any associated reviews
    $conn->query("DELETE FROM reviews WHERE payment_id = $payment_id");
    
    if ($conn->query("DELETE FROM payments WHERE id = $payment_id")) {
        $_SESSION['message'] = "Payment deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting payment: " . $conn->error;
    }
    header("Location: payments.php");
    exit();
} 