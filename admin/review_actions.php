<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Delete Review
if (isset($_POST['delete_review'])) {
    $review_id = (int)$_POST['review_id'];
    
    if ($conn->query("DELETE FROM reviews WHERE id = $review_id")) {
        $_SESSION['message'] = "Review deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting review: " . $conn->error;
    }
    header("Location: reviews.php");
    exit();
}

// Get Review Details (for AJAX requests)
if (isset($_GET['get_review'])) {
    $review_id = (int)$_GET['get_review'];
    
    $result = $conn->query("
        SELECT r.*, u.name as user_name, u.email as user_email,
               COALESCE(pa.name, e.name, pl.name, t.name, m.name, pm.name, l.name, b.name) as provider_name,
               COALESCE(pa.email, e.email, pl.email, t.email, m.email, pm.email, l.email, b.email) as provider_email,
               CASE
                   WHEN r.painter_id IS NOT NULL THEN 'Painter'
                   WHEN r.electrician_id IS NOT NULL THEN 'Electrician'
                   WHEN r.plumber_id IS NOT NULL THEN 'Plumber'
                   WHEN r.tv_technician_id IS NOT NULL THEN 'TV Technician'
                   WHEN r.mechanic_id IS NOT NULL THEN 'Mechanic'
                   WHEN r.packer_mover_id IS NOT NULL THEN 'Packer & Mover'
                   WHEN r.locksmith_id IS NOT NULL THEN 'Locksmith'
                   WHEN r.battery_service_id IS NOT NULL THEN 'Battery Service'
               END as service_type
        FROM reviews r
        JOIN users u ON r.user_id = u.id
        LEFT JOIN painters pa ON r.painter_id = pa.id
        LEFT JOIN electricians e ON r.electrician_id = e.id
        LEFT JOIN plumbers pl ON r.plumber_id = pl.id
        LEFT JOIN tv_repair t ON r.tv_technician_id = t.id
        LEFT JOIN mechanics m ON r.mechanic_id = m.id
        LEFT JOIN packers_movers pm ON r.packer_mover_id = pm.id
        LEFT JOIN locksmiths l ON r.locksmith_id = l.id
        LEFT JOIN battery_services b ON r.battery_service_id = b.id
        WHERE r.id = $review_id
    ");

    if ($review = $result->fetch_assoc()) {
        // Get related payment if exists
        $payment_result = $conn->query("SELECT * FROM payments WHERE id = {$review['payment_id']}");
        $review['payment'] = $payment_result->fetch_assoc();
        
        echo json_encode($review);
    } else {
        echo json_encode(['error' => 'Review not found']);
    }
    exit();
}

// Flag Review (if needed)
if (isset($_POST['flag_review'])) {
    $review_id = (int)$_POST['review_id'];
    $flag_reason = $conn->real_escape_string($_POST['flag_reason']);
    
    if ($conn->query("UPDATE reviews SET flagged = 1, flag_reason = '$flag_reason' WHERE id = $review_id")) {
        $_SESSION['message'] = "Review flagged successfully!";
    } else {
        $_SESSION['message'] = "Error flagging review: " . $conn->error;
    }
    header("Location: reviews.php");
    exit();
}

// Unflag Review (if needed)
if (isset($_POST['unflag_review'])) {
    $review_id = (int)$_POST['review_id'];
    
    if ($conn->query("UPDATE reviews SET flagged = 0, flag_reason = NULL WHERE id = $review_id")) {
        $_SESSION['message'] = "Review unflagged successfully!";
    } else {
        $_SESSION['message'] = "Error unflagging review: " . $conn->error;
    }
    header("Location: reviews.php");
    exit();
} 