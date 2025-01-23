<?php
session_start();
$page_title = "TV Repair Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Available TV Repair Technicians</h2>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select">
                        <option value="">All Locations</option>
                        <?php
                        $locations = mysqli_query($con, "SELECT DISTINCT location FROM tv_repair");
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

    <!-- TV Repair Technicians List -->
    <div class="row">
        <?php
        // Build query based on filters
        $query = "SELECT * FROM tv_repair WHERE 1=1";
        $params = [];
        $types = "";
        
        if(isset($_GET['location']) && !empty($_GET['location'])) {
            $query .= " AND LOWER(location) = LOWER(?)";
            $params[] = $_GET['location'];
            $types .= "s";
        }
        
        if(isset($_GET['availability']) && $_GET['availability'] == '1') {
            $query .= " AND availability = ?";
            $params[] = 1;
            $types .= "i";
        }
        
        if(isset($_GET['price_sort']) && !empty($_GET['price_sort'])) {
            $query .= " ORDER BY price_per_service " . 
                     ($_GET['price_sort'] == 'low_high' ? 'ASC' : 'DESC');
        }

        // Prepare and execute the query
        $stmt = mysqli_prepare($con, $query);
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) == 0) {
            echo '<div class="col-12"><div class="alert alert-info">No TV repair technicians found matching your criteria.</div></div>';
        }
        
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= isset($row['profile_image']) ? $row['profile_image'] : 'assets/img/default-tv.jpg' ?>" 
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
                                    <i class="fa fa-money text-success"></i> ৳<?= $row['service_charge'] ?> per service<br>
                                    <i class="fa fa-tv text-info"></i> <?= $row['brand_expertise'] ?><br>
                                    <i class="fa fa-wrench text-primary"></i> <?= $row['services_offered'] ?><br>
                                    <i class="fa fa-phone text-primary"></i> <?= $row['contact_number'] ?>
                                </p>
                                <a href="tvrepair_info.php?id=<?= $row['id'] ?>" class="btn btn-primary">View Details</a>
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

<?php include('includes/footer.php'); ?> 