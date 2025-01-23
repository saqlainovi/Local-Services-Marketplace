<?php 
session_start();
$page_title = "Painter Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// শুধু ছবির array টা যোগ করুন ফাইলের শুরুতে
$service_images = [
    'cropped-images (1)/ac-service.jpg',
    'cropped-images (1)/battery-service.jpg',
    'cropped-images (1)/car-service.jpg',
    'cropped-images (1)/carpenter-service.jpg',
    'cropped-images (1)/cleaning-service.jpg',
    'cropped-images (1)/electrician-service.jpg',
    'cropped-images (1)/painter-service.jpg',
    'cropped-images (1)/plumber-service.jpg'
];
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Available Painters</h2>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select">
                        <option value="">All Locations</option>
                        <?php
                        $locations = mysqli_query($con, "SELECT DISTINCT location FROM painters");
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

    <!-- Painters List -->
    <div class="row">
        <?php
        // Build query based on filters
        $query = "SELECT * FROM painters WHERE 1=1";
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
            $query .= " ORDER BY price_per_day " . 
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
            echo '<div class="col-12"><div class="alert alert-info">No painters found matching your criteria.</div></div>';
        }
        
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= isset($row['image']) ? $row['image'] : 'assets/img/default-painter.jpg' ?>" 
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
                                    <i class="fa fa-money text-success"></i> ৳<?php echo $row['price_per_day']; ?> per day<br>
                                    <i class="fa fa-paint-brush text-info"></i> <?php echo $row['specialization']; ?><br>
                                    <i class="fa fa-phone text-primary"></i> <?php echo $row['contact_number']; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        <!--  -->
                                    </div>
                                    <a href="painter_info.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
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