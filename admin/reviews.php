<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Get review statistics
$stats = [
    'total_reviews' => $conn->query("SELECT COUNT(*) as count FROM reviews")->fetch_assoc()['count'],
    'avg_rating' => $conn->query("SELECT AVG(rating) as avg FROM reviews")->fetch_assoc()['avg'],
    'five_star' => $conn->query("SELECT COUNT(*) as count FROM reviews WHERE rating = 5")->fetch_assoc()['count'],
    'one_star' => $conn->query("SELECT COUNT(*) as count FROM reviews WHERE rating = 1")->fetch_assoc()['count']
];

// Get reviews with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

$total_reviews = $stats['total_reviews'];
$total_pages = ceil($total_reviews / $per_page);

$reviews = $conn->query("
    SELECT r.*, u.name as user_name,
           COALESCE(pa.name, e.name, pl.name, t.name, m.name, pm.name, l.name, b.name) as provider_name,
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
    ORDER BY r.created_at DESC
    LIMIT $offset, $per_page
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Management - Admin Panel</title>
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
        .rating-stars {
            color: #ffc107;
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
                        <a href="payments.php" class="nav-link text-white">
                            <i class="fas fa-credit-card me-2"></i> Payments
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="reviews.php" class="nav-link text-white active">
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
                <h2 class="mb-4">Review Management</h2>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-primary text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Total Reviews</h6>
                                    <h3><?php echo $stats['total_reviews']; ?></h3>
                                </div>
                                <i class="fas fa-comments fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-success text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Average Rating</h6>
                                    <h3><?php echo number_format($stats['avg_rating'], 1); ?> ★</h3>
                                </div>
                                <i class="fas fa-star fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-warning text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>5-Star Reviews</h6>
                                    <h3><?php echo $stats['five_star']; ?></h3>
                                </div>
                                <i class="fas fa-star-half-alt fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card bg-danger text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>1-Star Reviews</h6>
                                    <h3><?php echo $stats['one_star']; ?></h3>
                                </div>
                                <i class="fas fa-exclamation-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Table -->
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Service Type</th>
                                    <th>Provider</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($review = $reviews->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $review['id']; ?></td>
                                    <td><?php echo htmlspecialchars($review['user_name']); ?></td>
                                    <td><?php echo $review['service_type']; ?></td>
                                    <td><?php echo htmlspecialchars($review['provider_name']); ?></td>
                                    <td>
                                        <div class="rating-stars">
                                            <?php 
                                            $rating = $review['rating'];
                                            for($i = 1; $i <= 5; $i++) {
                                                echo $i <= $rating ? '★' : '☆';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars(substr($review['review_text'], 0, 50)) . '...'; ?></td>
                                    <td><?php echo date('M d, Y', strtotime($review['created_at'])); ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="viewReview(<?php echo $review['id']; ?>)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="review_actions.php" method="POST" class="d-inline" 
                                              onsubmit="return confirm('Are you sure you want to delete this review?');">
                                            <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                                            <button type="submit" name="delete_review" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
    function viewReview(reviewId) {
        // Implement view review details functionality
        alert('View review ' + reviewId);
    }
    </script>
</body>
</html> 