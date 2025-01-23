<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../dbcon.php');

// Check if user is logged in and is admin
if(!isset($_SESSION['auth_user']) || $_SESSION['auth_user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

// Handle provider deletion
if(isset($_POST['delete_provider'])) {
    $provider_id = mysqli_real_escape_string($con, $_POST['provider_id']);
    $provider_type = mysqli_real_escape_string($con, $_POST['provider_type']);
    
    $delete_query = "DELETE FROM {$provider_type}s WHERE id = '$provider_id'";
    if(mysqli_query($con, $delete_query)) {
        $_SESSION['message'] = "Service provider deleted successfully";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error deleting service provider";
        $_SESSION['message_type'] = "danger";
    }
    header("Location: service_providers.php");
    exit();
}

// Get current filter values
$type_filter = $_GET['type'] ?? 'all';
$status_filter = $_GET['status'] ?? 'all';
$search = $_GET['search'] ?? '';

// Build query based on filters
$where_clauses = [];
$tables = ['plumbers', 'electricians', 'painters', 'tv_technicians', 'mechanics', 
           'packers_movers', 'locksmiths', 'battery_services'];

if($type_filter !== 'all') {
    $tables = [$type_filter . 's'];
}

if($status_filter !== 'all') {
    $where_clauses[] = "availability = " . ($status_filter === 'active' ? '1' : '0');
}

if(!empty($search)) {
    $search = mysqli_real_escape_string($con, $search);
    $where_clauses[] = "(name LIKE '%$search%' OR location LIKE '%$search%' OR contact_number LIKE '%$search%')";
}

$where_clause = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";

// Prepare and execute queries for each table
$providers = [];
foreach($tables as $table) {
    $query = "SELECT *, '$table' as provider_type FROM $table $where_clause";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $providers[] = $row;
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Service Providers</h1>
    
    <!-- Alert Messages -->
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Provider Type</label>
                    <select name="type" class="form-select">
                        <option value="all" <?= $type_filter === 'all' ? 'selected' : '' ?>>All Types</option>
                        <option value="plumber" <?= $type_filter === 'plumber' ? 'selected' : '' ?>>Plumbers</option>
                        <option value="electrician" <?= $type_filter === 'electrician' ? 'selected' : '' ?>>Electricians</option>
                        <option value="painter" <?= $type_filter === 'painter' ? 'selected' : '' ?>>Painters</option>
                        <option value="tv_technician" <?= $type_filter === 'tv_technician' ? 'selected' : '' ?>>TV Technicians</option>
                        <option value="mechanic" <?= $type_filter === 'mechanic' ? 'selected' : '' ?>>Mechanics</option>
                        <option value="packer_mover" <?= $type_filter === 'packer_mover' ? 'selected' : '' ?>>Packers & Movers</option>
                        <option value="locksmith" <?= $type_filter === 'locksmith' ? 'selected' : '' ?>>Locksmiths</option>
                        <option value="battery_service" <?= $type_filter === 'battery_service' ? 'selected' : '' ?>>Battery Services</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="all" <?= $status_filter === 'all' ? 'selected' : '' ?>>All Status</option>
                        <option value="active" <?= $status_filter === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $status_filter === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control" value="<?= htmlspecialchars($search) ?>" 
                           placeholder="Search by name, location, or contact">
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary d-block w-100">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add New Provider Button -->
    <div class="mb-4">
        <a href="add_provider.php" class="btn btn-success">
            <i class="fas fa-plus me-2"></i>Add New Provider
        </a>
    </div>

    <!-- Providers Table -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Service Providers List
        </div>
        <div class="card-body">
            <table id="providersTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Contact</th>
                        <th>Experience</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($providers as $provider): ?>
                    <tr>
                        <td><?= $provider['id'] ?></td>
                        <td><?= ucwords(str_replace('_', ' ', substr($provider['provider_type'], 0, -1))) ?></td>
                        <td><?= htmlspecialchars($provider['name']) ?></td>
                        <td><?= htmlspecialchars($provider['location']) ?></td>
                        <td><?= htmlspecialchars($provider['contact_number']) ?></td>
                        <td><?= $provider['work_experience'] ?> years</td>
                        <td>
                            <div class="star-rating">
                                <?php 
                                $rating = $provider['rating'] ?? 0;
                                for($i = 1; $i <= 5; $i++) {
                                    if($i <= $rating) {
                                        echo '<i class="fas fa-star text-warning"></i>';
                                    } else {
                                        echo '<i class="far fa-star text-warning"></i>';
                                    }
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-<?= $provider['availability'] ? 'success' : 'danger' ?>">
                                <?= $provider['availability'] ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit_provider.php?type=<?= substr($provider['provider_type'], 0, -1) ?>&id=<?= $provider['id'] ?>" 
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" 
                                    onclick="confirmDelete('<?= $provider['id'] ?>', '<?= substr($provider['provider_type'], 0, -1) ?>')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this service provider?
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="hidden" name="provider_id" id="delete_provider_id">
                    <input type="hidden" name="provider_type" id="delete_provider_type">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_provider" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, type) {
    document.getElementById('delete_provider_id').value = id;
    document.getElementById('delete_provider_type').value = type;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

// Initialize DataTable
$(document).ready(function() {
    $('#providersTable').DataTable({
        order: [[0, 'desc']],
        pageLength: 25
    });
});
</script>

<?php include('includes/footer.php'); ?> 