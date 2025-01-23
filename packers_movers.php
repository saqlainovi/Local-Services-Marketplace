<?php 
session_start();

// Check if user is not logged in
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['message'] = "Please login to access services";
    header("Location: login.php");
    exit();
}

$page_title = "Packers & Movers Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Build query based on filters
$query = "SELECT * FROM packers_movers WHERE 1=1";

if(isset($_GET['location']) && !empty($_GET['location'])) {
    $location = mysqli_real_escape_string($con, $_GET['location']);
    $query .= " AND location = '$location'";
}

if(isset($_GET['availability'])) {
    if($_GET['availability'] == 'available') {
        $query .= " AND availability = 1";
    } elseif($_GET['availability'] == 'not_available') {
        $query .= " AND availability = 0";
    }
}

if(isset($_GET['price_sort'])) {
    if($_GET['price_sort'] == 'low_high') {
        $query .= " ORDER BY price_per_hour ASC";
    } elseif($_GET['price_sort'] == 'high_low') {
        $query .= " ORDER BY price_per_hour DESC";
    }
}

$result = mysqli_query($con, $query);
?>

<div class="container mt-4">
    <!-- Display user info -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-info">
                Welcome, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?>!
            </div>
        </div>
    </div>

    <h2 class="text-center mb-4">Available Packers & Movers</h2>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select">
                        <option value="">All Locations</option>
                        <?php
                        $locations = mysqli_query($con, "SELECT DISTINCT location FROM packers_movers");
                        while($loc = mysqli_fetch_assoc($locations)) {
                            $selected = ($_GET['location'] ?? '') == $loc['location'] ? 'selected' : '';
                            echo "<option value='{$loc['location']}' {$selected}>{$loc['location']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Availability</label>
                    <select name="availability" class="form-select">
                        <option value="">All</option>
                        <option value="1" <?php echo ($_GET['availability'] ?? '') == '1' ? 'selected' : ''; ?>>Available Now</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sort By Price</label>
                    <select name="price_sort" class="form-select">
                        <option value="">Default</option>
                        <option value="low_high" <?php echo ($_GET['price_sort'] ?? '') == 'low_high' ? 'selected' : ''; ?>>Low to High</option>
                        <option value="high_low" <?php echo ($_GET['price_sort'] ?? '') == 'high_low' ? 'selected' : ''; ?>>High to Low</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary d-block">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Packers & Movers List -->
    <div class="row">
        <?php
        if(mysqli_num_rows($result) == 0) {
            echo '<div class="col-12"><div class="alert alert-info">No packers & movers found matching your criteria.</div></div>';
        }
        
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= isset($row['image']) ? $row['image'] : 'assets/img/default-mover.jpg' ?>" 
                                     class="img-fluid rounded-circle mb-3" 
                                     alt="<?= $row['name'] ?>">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title"><?= $row['name'] ?></h5>
                                <div class="mb-2">
                                    <span class="badge <?= $row['availability'] ? 'bg-success' : 'bg-danger' ?>">
                                        <?= $row['availability'] ? 'Available' : 'Not Available' ?>
                                    </span>
                                    <span class="badge bg-primary"><?= $row['work_experience'] ?> Years Experience</span>
                                </div>
                                <p class="card-text">
                                    <i class="fa fa-map-marker text-danger"></i> <?= $row['location'] ?><br>
                                    <i class="fa fa-money text-success"></i> ৳<?= $row['price_per_hour'] ?> per hour<br>
                                    <i class="fa fa-truck text-info"></i> <?= $row['vehicle_type'] ?><br>
                                    <i class="fa fa-phone text-primary"></i> <?= $row['contact_number'] ?>
                                </p>
                                <a href="packers_movers_info.php?id=<?= $row['id'] ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.badge {
    padding: 8px 12px;
    margin-right: 5px;
}

.rating {
    font-size: 20px;
}

.form-label {
    font-weight: 500;
}
</style>

<?php include('includes/footer.php'); ?> 