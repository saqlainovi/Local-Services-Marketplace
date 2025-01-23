<?php
session_start();
$page_title = "Locksmith Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Service images array
$service_images = [
    'cropped-images (1)/locksmith-service.jpg',
    'cropped-images (1)/locksmith-1.jpg',
    'cropped-images (1)/locksmith-2.jpg',
    'cropped-images (1)/locksmith-3.jpg'
];
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Available Locksmiths</h2>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select">
                        <option value="">All Locations</option>
                        <?php
                        $locations = mysqli_query($con, "SELECT DISTINCT location FROM locksmiths");
                        while($loc = mysqli_fetch_assoc($locations)) {
                            $selected = ($_GET['location'] ?? '') == $loc['location'] ? 'selected' : '';
                            echo "<option value='{$loc['location']}' {$selected}>{$loc['location']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Specialization</label>
                    <select name="specialization" class="form-select">
                        <option value="">All Types</option>
                        <option value="Emergency" <?php echo ($_GET['specialization'] ?? '') == 'Emergency' ? 'selected' : ''; ?>>Emergency Service</option>
                        <option value="Residential" <?php echo ($_GET['specialization'] ?? '') == 'Residential' ? 'selected' : ''; ?>>Residential</option>
                        <option value="Commercial" <?php echo ($_GET['specialization'] ?? '') == 'Commercial' ? 'selected' : ''; ?>>Commercial</option>
                        <option value="Automotive" <?php echo ($_GET['specialization'] ?? '') == 'Automotive' ? 'selected' : ''; ?>>Automotive</option>
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

    <!-- Locksmiths List -->
    <div class="row">
        <?php
        // Build query based on filters
        $query = "SELECT * FROM locksmiths WHERE 1=1";
        $params = [];
        $types = "";
        
        if(isset($_GET['location']) && !empty($_GET['location'])) {
            $query .= " AND LOWER(location) = LOWER(?)";
            $params[] = $_GET['location'];
            $types .= "s";
        }
        
        if(isset($_GET['specialization']) && !empty($_GET['specialization'])) {
            $query .= " AND specialization LIKE ?";
            $params[] = "%{$_GET['specialization']}%";
            $types .= "s";
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
            echo '<div class="col-12"><div class="alert alert-info">No locksmiths found matching your criteria.</div></div>';
        }
        
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= isset($row['image']) ? $row['image'] : 'assets/img/default-locksmith.jpg' ?>" 
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
                                    <i class="fa fa-money text-success"></i> ৳<?php echo $row['price_per_service']; ?> per service<br>
                                    <i class="fa fa-key text-info"></i> <?php echo $row['specialization']; ?><br>
                                    <i class="fa fa-phone text-primary"></i> <?php echo $row['contact_number']; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        <?php
                                        $rating = $row['rating'];
                                        for($i = 1; $i <= 5; $i++) {
                                            if($i <= $rating) {
                                                echo '<i class="fas fa-star text-warning"></i>';
                                            } else {
                                                echo '<i class="far fa-star text-warning"></i>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <a href="locksmith_info.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
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

.img-fluid {
    width: 100%;
    height: 150px;
    object-fit: cover;
}
</style>

<?php include('includes/footer.php'); ?> 