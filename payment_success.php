<?php
ob_start();
session_start();
$page_title = "Payment Successful";
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}

$payment_id = mysqli_real_escape_string($con, $_GET['id'] ?? '');
$query = "SELECT p.* FROM payments p WHERE p.id = '$payment_id'";
$result = mysqli_query($con, $query);
$payment = mysqli_fetch_assoc($result);

// Get provider details based on which service ID is not NULL
if ($payment) {
    if ($payment['painter_id']) {
        $provider_query = "SELECT name, contact_number FROM painters WHERE id = '{$payment['painter_id']}'";
        $service_label = "Painter";
    } elseif ($payment['battery_service_id']) {
        $provider_query = "SELECT name, contact_number FROM battery_services WHERE id = '{$payment['battery_service_id']}'";
        $service_label = "Battery Service Provider";
    } elseif ($payment['packer_mover_id']) {
        $provider_query = "SELECT name, contact_number FROM packers_movers WHERE id = '{$payment['packer_mover_id']}'";
        $service_label = "Packer & Mover";
    } elseif ($payment['tv_technician_id']) {
        $provider_query = "SELECT name, contact_number FROM tv_repair WHERE id = '{$payment['tv_technician_id']}'";
        $service_label = "TV Repair Technician";
    } elseif ($payment['plumber_id']) {
        $provider_query = "SELECT name, contact_number FROM plumbers WHERE id = '{$payment['plumber_id']}'";
        $service_label = "Plumber";
    } elseif ($payment['electrician_id']) {
        $provider_query = "SELECT name, contact_number FROM electricians WHERE id = '{$payment['electrician_id']}'";
        $service_label = "Electrician";
    } elseif ($payment['mechanic_id']) {
        $provider_query = "SELECT name, contact_number FROM car_mechanics WHERE id = '{$payment['mechanic_id']}'";
        $service_label = "Car Mechanic";
    } elseif ($payment['locksmith_id']) {
        $provider_query = "SELECT name, contact_number FROM locksmiths WHERE id = '{$payment['locksmith_id']}'";
        $service_label = "Locksmith";
    } else {
        $provider_query = "";
        $service_label = "Service Provider";
    }
    
    if ($provider_query) {
        $provider_result = mysqli_query($con, $provider_query);
        $provider = mysqli_fetch_assoc($provider_result);
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-success mb-4">
                        <i class="fas fa-check-circle" style="font-size: 64px;"></i>
                    </div>
                    <h3>Payment Successful!</h3>
                    <p class="text-muted">Your booking has been confirmed</p>
                    
                    <div class="booking-details mt-4 text-start">
                        <p><strong><?php echo $service_label; ?>:</strong> <?php echo $provider['name'] ?? 'N/A'; ?></p>
                        <p><strong>Service Date:</strong> <?php echo date('F j, Y', strtotime($payment['booking_date'])); ?></p>
                        <p><strong>Amount Paid:</strong> ৳<?php echo number_format($payment['amount'], 2); ?></p>
                        <p><strong>Contact Number:</strong> <?php echo $provider['contact_number'] ?? 'N/A'; ?></p>
                    </div>
                    
                    <div class="mt-4">
                        <a href="index.php" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
ob_end_flush();
?>