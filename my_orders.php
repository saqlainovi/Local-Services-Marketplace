<?php 
session_start();
include('dbcon.php');

// Authentication check before any output
if(!isset($_SESSION['auth_user']['id'])) {
    $_SESSION['message'] = "Please login to view your orders";
    header("Location: login.php");
    exit();
}

$page_title = "My Orders";
include('includes/header.php');
include('includes/navbar.php');

// Get user's ID from session
$user_id = $_SESSION['auth_user']['id'];

// Fetch user's orders with service provider details
$query = "SELECT p.*, 
          pa.name as painter_name,
          e.name as electrician_name,
          pl.name as plumber_name,
          tv.name as tv_technician_name,
          m.name as mechanic_name,
          pm.name as packer_name,
          l.name as locksmith_name,
          b.name as battery_name
          FROM payments p
          LEFT JOIN painters pa ON p.painter_id = pa.id
          LEFT JOIN electricians e ON p.electrician_id = e.id
          LEFT JOIN plumbers pl ON p.plumber_id = pl.id
          LEFT JOIN tv_repair_technicians tv ON p.tv_technician_id = tv.id
          LEFT JOIN mechanics m ON p.mechanic_id = m.id
          LEFT JOIN packers_movers pm ON p.packer_mover_id = pm.id
          LEFT JOIN locksmiths l ON p.locksmith_id = l.id
          LEFT JOIN battery_services b ON p.battery_service_id = b.id
          WHERE p.user_id = ?
          ORDER BY p.created_at DESC";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">My Orders</h2>
                <?php if($result->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Service Provider</th>
                                    <th>Service Type</th>
                                    <th>Booking Date</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $result->fetch_assoc()): 
                                    // Determine service provider name and type
                                    $provider_name = '';
                                    $service_type = '';
                                    
                                    if($row['painter_id']) {
                                        $provider_name = $row['painter_name'];
                                        $service_type = 'Painter';
                                    } elseif($row['electrician_id']) {
                                        $provider_name = $row['electrician_name'];
                                        $service_type = 'Electrician';
                                    } elseif($row['plumber_id']) {
                                        $provider_name = $row['plumber_name'];
                                        $service_type = 'Plumber';
                                    } elseif($row['tv_technician_id']) {
                                        $provider_name = $row['tv_technician_name'];
                                        $service_type = 'TV Repair';
                                    } elseif($row['mechanic_id']) {
                                        $provider_name = $row['mechanic_name'];
                                        $service_type = 'Mechanic';
                                    } elseif($row['packer_mover_id']) {
                                        $provider_name = $row['packer_name'];
                                        $service_type = 'Packer & Mover';
                                    } elseif($row['locksmith_id']) {
                                        $provider_name = $row['locksmith_name'];
                                        $service_type = 'Locksmith';
                                    } elseif($row['battery_service_id']) {
                                        $provider_name = $row['battery_name'];
                                        $service_type = 'Battery Service';
                                    }
                                ?>
                                    <tr>
                                        <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                        <td><?= htmlspecialchars($provider_name) ?></td>
                                        <td><?= htmlspecialchars($service_type) ?></td>
                                        <td><?= date('d M Y', strtotime($row['booking_date'])) ?></td>
                                        <td>₹<?= number_format($row['amount'], 2) ?></td>
                                        <td>
                                            <span class="badge <?= $row['status'] == 'completed' ? 'bg-success' : 'bg-warning' ?>">
                                                <?= ucfirst(htmlspecialchars($row['status'])) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">
                        <p class="mb-0">You haven't placed any orders yet.</p>
                        <a href="index.php" class="btn btn-primary mt-3">Browse Services</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
