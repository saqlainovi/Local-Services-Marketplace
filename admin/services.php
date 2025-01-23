<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db_connect.php';

// Get service counts
$service_counts = [
    'painters' => $conn->query("SELECT COUNT(*) as count FROM painters")->fetch_assoc()['count'],
    'electricians' => $conn->query("SELECT COUNT(*) as count FROM electricians")->fetch_assoc()['count'],
    'plumbers' => $conn->query("SELECT COUNT(*) as count FROM plumbers")->fetch_assoc()['count'],
    'tv_repair' => $conn->query("SELECT COUNT(*) as count FROM tv_repair")->fetch_assoc()['count'],
    'car_mechanics' => $conn->query("SELECT COUNT(*) as count FROM car_mechanics")->fetch_assoc()['count'],
    'packers_movers' => $conn->query("SELECT COUNT(*) as count FROM packers_movers")->fetch_assoc()['count'],
    'locksmiths' => $conn->query("SELECT COUNT(*) as count FROM locksmiths")->fetch_assoc()['count'],
    'battery_services' => $conn->query("SELECT COUNT(*) as count FROM battery_services")->fetch_assoc()['count']
];

// Get service type from URL
$service_type = isset($_GET['type']) ? $_GET['type'] : 'painters';
$valid_services = ['painters', 'electricians', 'plumbers', 'tv_repair', 'car_mechanics', 'packers_movers', 'locksmiths', 'battery_services'];
if (!in_array($service_type, $valid_services)) {
    $service_type = 'painters';
}

// Get services with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

$total_items = $conn->query("SELECT COUNT(*) as count FROM $service_type")->fetch_assoc()['count'];
$total_pages = ceil($total_items / $per_page);

$services = $conn->query("SELECT * FROM $service_type ORDER BY created_at DESC LIMIT $offset, $per_page");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #212529;
            color: white;
        }
        .service-card {
            transition: transform 0.2s;
            cursor: pointer;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        .service-card.active {
            border: 2px solid #0d6efd;
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
                        <a href="services.php" class="nav-link text-white active">
                            <i class="fas fa-tools me-2"></i> Services
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="payments.php" class="nav-link text-white">
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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Service Management</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                        <i class="fas fa-plus me-2"></i> Add New Service Provider
                    </button>
                </div>

                <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <!-- Service Type Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card service-card <?php echo $service_type === 'painters' ? 'active' : ''; ?>" 
                             onclick="window.location.href='?type=painters'">
                            <div class="card-body text-center">
                                <i class="fas fa-paint-roller fa-2x mb-2"></i>
                                <h5>Painters</h5>
                                <span class="badge bg-primary"><?php echo $service_counts['painters']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card service-card <?php echo $service_type === 'electricians' ? 'active' : ''; ?>"
                             onclick="window.location.href='?type=electricians'">
                            <div class="card-body text-center">
                                <i class="fas fa-bolt fa-2x mb-2"></i>
                                <h5>Electricians</h5>
                                <span class="badge bg-primary"><?php echo $service_counts['electricians']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card service-card <?php echo $service_type === 'plumbers' ? 'active' : ''; ?>"
                             onclick="window.location.href='?type=plumbers'">
                            <div class="card-body text-center">
                                <i class="fas fa-wrench fa-2x mb-2"></i>
                                <h5>Plumbers</h5>
                                <span class="badge bg-primary"><?php echo $service_counts['plumbers']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card service-card <?php echo $service_type === 'tv_repair' ? 'active' : ''; ?>"
                             onclick="window.location.href='?type=tv_repair'">
                            <div class="card-body text-center">
                                <i class="fas fa-tv fa-2x mb-2"></i>
                                <h5>TV Repair</h5>
                                <span class="badge bg-primary"><?php echo $service_counts['tv_repair']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service Providers Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo ucfirst(str_replace('_', ' ', $service_type)); ?></h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($service = $services->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $service['id']; ?></td>
                                    <td><?php echo htmlspecialchars($service['name']); ?></td>
                                    <td><?php echo htmlspecialchars($service['email']); ?></td>
                                    <td><?php echo htmlspecialchars($service['contact_number']); ?></td>
                                    <td><?php echo htmlspecialchars($service['location']); ?></td>
                                    <td>
                                        <div class="text-warning">
                                            <?php 
                                            $rating = $service['rating'];
                                            for($i = 1; $i <= 5; $i++) {
                                                echo $i <= $rating ? '★' : '☆';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="editService(<?php echo $service['id']; ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="service_actions.php" method="POST" class="d-inline" 
                                              onsubmit="return confirm('Are you sure you want to delete this service provider?');">
                                            <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
                                            <input type="hidden" name="service_type" value="<?php echo $service_type; ?>">
                                            <button type="submit" name="delete_service" class="btn btn-sm btn-danger">
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
                                    <a class="page-link" href="?type=<?php echo $service_type; ?>&page=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
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

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Service Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="service_actions.php" method="POST">
                        <input type="hidden" name="service_type" value="<?php echo $service_type; ?>">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Work Experience (Years)</label>
                            <input type="number" class="form-control" name="work_experience" required>
                        </div>
                        <button type="submit" name="add_service" class="btn btn-primary">Add Service Provider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function editService(serviceId) {
        // Implement edit service functionality
        alert('Edit service ' + serviceId);
    }
    </script>
</body>
</html> 