<?php 
session_start();
$page_title = "Electrician Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Available Electricians</h2>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select">
                        <option value="">All Locations</option>
                        <?php
                        $locations = mysqli_query($con, "SELECT DISTINCT location FROM electricians");
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
                        <option value="available" <?php echo ($_GET['availability'] ?? '') == 'available' ? 'selected' : ''; ?>>Available Now</option>
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

    <!-- Electricians List -->
    <div class="row">
        <?php
        // Build query based on filters
        $query = "SELECT * FROM electricians WHERE availability = 1";
        
        if(isset($_GET['location']) && !empty($_GET['location'])) {
            $location = mysqli_real_escape_string($con, $_GET['location']);
            $query .= " AND location = '$location'";
        }
        
        if(isset($_GET['availability']) && $_GET['availability'] == 'available') {
            $query .= " AND availability = 1";
        }
        
        if(isset($_GET['price_sort'])) {
            if($_GET['price_sort'] == 'low_high') {
                $query .= " ORDER BY price_per_hour ASC";
            } elseif($_GET['price_sort'] == 'high_low') {
                $query .= " ORDER BY price_per_hour DESC";
            }
        }

        $result = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Single Electrician Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= isset($row['profile_image']) ? $row['profile_image'] : 'assets/img/default-electrician.jpg' ?>" 
                                     class="img-fluid rounded-circle mb-3" 
                                     alt="<?= $row['name'] ?>">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <div class="mb-2">
                                    <span class="badge <?php echo $row['availability'] ? 'bg-success' : 'bg-danger'; ?>">
                                        <?php echo $row['availability'] ? 'Available' : 'Not Available'; ?>
                                    </span>
                                    <span class="badge bg-primary"><?php echo $row['work_experience']; ?> Years Experience</span>
                                </div>
                                <p class="card-text">
                                    <i class="fa fa-map-marker text-danger"></i> <?php echo $row['location']; ?><br>
                                    <i class="fa fa-money text-success"></i> ৳<?php echo $row['price_per_hour']; ?> per hour<br>
                                    <i class="fa fa-phone text-primary"></i> <?php echo $row['contact_number']; ?><br>
                                    <i class="fa fa-envelope text-info"></i> <?php echo $row['email']; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        <?php
                                        $rating = $row['rating'] ?? 0;
                                        for($i = 1; $i <= 5; $i++) {
                                            if($i <= $rating) {
                                                echo '<i class="fa fa-star text-warning"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o text-warning"></i>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <a href="electrician_info.php?id=<?php echo $row['id']; ?>" 
                                           class="btn btn-outline-primary me-2">View Details</a>
                                        <?php if(isset($_SESSION['auth_user'])): ?>
                                            <?php if($row['availability']): ?>
                                                <a href="payment.php?id=<?php echo $row['id']; ?>&type=electrician" 
                                                   class="btn btn-primary">Book Now</a>
                                            <?php else: ?>
                                                <button class="btn btn-secondary" disabled>Not Available</button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="login.php" class="btn btn-primary">Login to Book</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
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

<!-- Add custom CSS -->
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