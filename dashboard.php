<?php
ob_start();
session_start();
$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

if (!isset($_SESSION['authenticated'])) {
    $_SESSION['message'] = "Please login to access dashboard";
    header('Location: login.php');
    exit();
}

// Get user ID from email
$user_email = $_SESSION['auth_user']['email'];
$user_query = "SELECT id FROM users WHERE email = '$user_email'";
$user_result = mysqli_query($con, $user_query);
$user = mysqli_fetch_assoc($user_result);
$user_id = $user['id'];

// Updated query to handle NULL image
$query = "SELECT p.*, pa.name as painter_name, pa.contact_number, 
          COALESCE(pa.image, 'assets/img/default-painter.jpg') as image 
          FROM payments p 
          JOIN painters pa ON p.painter_id = pa.id 
          WHERE p.user_id = '$user_id' 
          ORDER BY p.created_at DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h4>Welcome <?= $_SESSION['auth_user']['username']; ?></h4>
                        <hr>
                        <h5>Your Info:</h5>
                        <p>Email: <?= $_SESSION['auth_user']['email']; ?></p>
                        <p>Phone: <?= $_SESSION['auth_user']['phone']; ?></p>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Dashboard Menu</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="my_orders.php" class="list-group-item list-group-item-action">
                        My Orders
                    </a>
                    <a href="edit_profile.php" class="list-group-item list-group-item-action">
                        Change Profile
                    </a>
                    <a href="reviews.php" class="list-group-item list-group-item-action">
                        Reviews & Ratings
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Orders Section -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">My Orders</h4>
                    
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Painter</th>
                                        <th>Service Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($order = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td>#<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo $order['image']; ?>" 
                                                         class="rounded-circle me-2" 
                                                         width="40" height="40" 
                                                         alt="<?php echo $order['painter_name']; ?>">
                                                    <div>
                                                        <div class="fw-bold"><?php echo $order['painter_name']; ?></div>
                                                        <small class="text-muted"><?php echo $order['contact_number']; ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo date('M d, Y', strtotime($order['booking_date'])); ?></td>
                                            <td>৳<?php echo number_format($order['amount'], 2); ?></td>
                                            <td>
                                                <span class="badge bg-success">
                                                    <?php echo ucfirst($order['status']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-primary" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#orderModal<?php echo $order['id']; ?>">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order Details Modal -->
                                        <div class="modal fade" id="orderModal<?php echo $order['id']; ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Order #<?php echo str_pad($order['id'], 5, '0', STR_PAD_LEFT); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <img src="<?php echo $order['image']; ?>" 
                                                                 class="rounded-circle me-3" 
                                                                 width="60" height="60" 
                                                                 alt="<?php echo $order['painter_name']; ?>">
                                                            <div>
                                                                <h6 class="mb-1"><?php echo $order['painter_name']; ?></h6>
                                                                <p class="text-muted mb-0"><?php echo $order['contact_number']; ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3">
                                                            <div class="col-6">
                                                                <p class="mb-1 text-muted">Service Date</p>
                                                                <p class="mb-0 fw-bold"><?php echo date('F j, Y', strtotime($order['booking_date'])); ?></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-1 text-muted">Amount Paid</p>
                                                                <p class="mb-0 fw-bold">৳<?php echo number_format($order['amount'], 2); ?></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-1 text-muted">Payment ID</p>
                                                                <p class="mb-0 fw-bold"><?php echo $order['payment_intent_id']; ?></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-1 text-muted">Status</p>
                                                                <p class="mb-0">
                                                                    <span class="badge bg-success">
                                                                        <?php echo ucfirst($order['status']); ?>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="download_invoice.php?id=<?php echo $order['id']; ?>" 
                                                           class="btn btn-primary">
                                                            <i class="fas fa-download me-2"></i>Download Invoice
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <img src="assets/img/no-orders.svg" alt="No Orders" class="mb-3" style="width: 150px;">
                            <h5>No Orders Yet</h5>
                            <p class="text-muted">You haven't made any bookings yet.</p>
                            <a href="painter.php" class="btn btn-primary">Book a Service</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.table img {
    object-fit: cover;
}

.modal-body {
    max-height: 70vh;
    overflow-y: auto;
}

.badge {
    padding: 0.5em 1em;
}
</style>

<?php 
include('includes/footer.php');
ob_end_flush();
?>