<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Get payment statistics
$stats = [
    'total_payments' => $conn->query("SELECT COUNT(*) as count FROM payments")->fetch_assoc()['count'],
    'total_amount' => $conn->query("SELECT SUM(amount) as total FROM payments WHERE status = 'completed'")->fetch_assoc()['total'],
    'pending_payments' => $conn->query("SELECT COUNT(*) as count FROM payments WHERE status = 'pending'")->fetch_assoc()['count'],
    'completed_payments' => $conn->query("SELECT COUNT(*) as count FROM payments WHERE status = 'completed'")->fetch_assoc()['count']
];

// Get payments with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

$total_payments = $stats['total_payments'];
$total_pages = ceil($total_payments / $per_page);

$payments = $conn->query("
    SELECT p.*, u.name as user_name,
           COALESCE(pa.name, e.name, pl.name, t.name, m.name, pm.name, l.name, b.name) as provider_name,
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
    ORDER BY p.created_at DESC
    LIMIT $offset, $per_page
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #212529;
            color: white;
        }
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <h4 class="text-center mb-4">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="dashboard.php" class="nav-link text-white">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="users.php" class="nav-link text-white">
                            <i class="fas fa-users me-2"></i> Users
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="services.php" class="nav-link text-white">
                            <i class="fas fa-tools me-2"></i> Services
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="payments.php" class="nav-link text-white active">
                            <i class="fas fa-credit-card me-2"></i> Payments
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="reviews.php" class="nav-link text-white">
                            <i class="fas fa-star me-2"></i> Reviews
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a href="logout.php" class="nav-link text-white">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <h2 class="mb-4">Payment Management</h2>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-primary text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Payments</h6>
                                    <h3><?php echo $stats['total_payments']; ?></h3>
                                </div>
                                <i class="fas fa-credit-card fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-success text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Amount</h6>
                                    <h3>৳<?php echo number_format($stats['total_amount'], 2); ?></h3>
                                </div>
                                <i class="fas fa-money-bill-wave fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-warning text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Pending</h6>
                                    <h3><?php echo $stats['pending_payments']; ?></h3>
                                </div>
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-info text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Completed</h6>
                                    <h3><?php echo $stats['completed_payments']; ?></h3>
                                </div>
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payments Table -->
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Service Type</th>
                                    <th>Provider</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($payment = $payments->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $payment['id']; ?></td>
                                    <td><?php echo htmlspecialchars($payment['user_name']); ?></td>
                                    <td><?php echo $payment['service_type']; ?></td>
                                    <td><?php echo htmlspecialchars($payment['provider_name']); ?></td>
                                    <td>৳<?php echo number_format($payment['amount'], 2); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo $payment['status'] == 'completed' ? 'success' : 'warning'; ?>">
                                            <?php echo ucfirst($payment['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('M d, Y', strtotime($payment['created_at'])); ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="viewPayment(<?php echo $payment['id']; ?>)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <?php if($payment['status'] == 'pending'): ?>
                                        <form action="payment_actions.php" method="POST" class="d-inline">
                                            <input type="hidden" name="payment_id" value="<?php echo $payment['id']; ?>">
                                            <button type="submit" name="complete_payment" class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <?php if ($total_pages > 1): ?>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo $page === $i ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function viewPayment(paymentId) {
        // Implement view payment details functionality
        alert('View payment ' + paymentId);
    }
    </script>
</body>
</html> 