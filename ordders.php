<?php 
session_start();
$page_title = "My Orders";
include('includes/header.php');
include('includes/navbar.php');
include('authentication.php'); // Ensure user is logged in
include('dbcon.php');

// Get user's ID from session
$user_id = $_SESSION['auth_user']['id'];

// Fetch user's bookings
$query = "SELECT b.*, p.amount, p.status as payment_status 
          FROM bookings b 
          LEFT JOIN payments p ON b.payment_id = p.id 
          WHERE b.user_id = ? 
          ORDER BY b.created_at DESC";

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
                                    <th>Booking ID</th>
                                    <th>Service Type</th>
                                    <th>Booking Date</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Booking Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['booking_id']) ?></td>
                                        <td><?= ucfirst(htmlspecialchars($row['service_type'])) ?></td>
                                        <td><?= date('d M Y', strtotime($row['booking_date'])) ?></td>
                                        <td>₹<?= number_format($row['amount'], 2) ?></td>
                                        <td>
                                            <span class="badge <?= $row['payment_status'] == 'completed' ? 'bg-success' : 'bg-warning' ?>">
                                                <?= ucfirst(htmlspecialchars($row['payment_status'])) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge <?= $row['status'] == 'completed' ? 'bg-success' : ($row['status'] == 'pending' ? 'bg-warning' : 'bg-danger') ?>">
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
