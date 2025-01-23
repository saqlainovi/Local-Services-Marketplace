<?php 
session_start();

// Check if user is not logged in
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['message'] = "Please login to access services";
    header("Location: login.php");
    exit();
}

$page_title = "Car Mechanic Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('includes/db_connect.php');

// Service images array
$service_images = [
    'cropped-images (1)/car-service.jpg',
    'cropped-images (1)/mechanic-1.jpg',
    'cropped-images (1)/mechanic-2.jpg',
    'cropped-images (1)/mechanic-3.jpg'
];
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

    <h2 class="text-center mb-4">Available Car Mechanics</h2>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Location</label>
                    <select name="location" class="form-select">
                        <option value="">All Locations</option>
                        <?php
                        try {
                            $locations = $conn->query("SELECT DISTINCT location FROM car_mechanics");
                            while($loc = $locations->fetch_assoc()) {
                                $selected = ($_GET['location'] ?? '') == $loc['location'] ? 'selected' : '';
                                echo "<option value='{$loc['location']}' {$selected}>{$loc['location']}</option>";
                            }
                        } catch (Exception $e) {
                            echo "<option value=''>Error loading locations</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Specialization</label>
                    <select name="specialization" class="form-select">
                        <option value="">All Specializations</option>
                        <?php
                        try {
                            $specializations = $conn->query("SELECT DISTINCT specialization FROM car_mechanics WHERE specialization IS NOT NULL");
                            while($spec = $specializations->fetch_assoc()) {
                                $selected = ($_GET['specialization'] ?? '') == $spec['specialization'] ? 'selected' : '';
                                echo "<option value='{$spec['specialization']}' {$selected}>{$spec['specialization']}</option>";
                            }
                        } catch (Exception $e) {
                            echo "<option value=''>Error loading specializations</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Price</label>
                    <select name="price_sort" class="form-select">
                        <option value="">Sort by Price</option>
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

    <!-- Mechanics List -->
    <div class="row">
        <?php
        try {
            // Build query based on filters
            $query = "SELECT * FROM car_mechanics WHERE 1=1";
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
                $query .= " ORDER BY price_per_hour " . 
                         ($_GET['price_sort'] == 'low_high' ? 'ASC' : 'DESC');
            }

            // Prepare and execute the query
            $stmt = $conn->prepare($query);
            if (!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows == 0) {
                echo '<div class="col-12"><div class="alert alert-info">No mechanics found matching your criteria.</div></div>';
            }
            
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= isset($row['image']) ? $row['image'] : 'assets/img/default-mechanic.jpg' ?>" 
                                         class="img-fluid rounded-circle mb-3" 
                                         alt="<?= $row['name'] ?>">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                    <div class="mb-2">
                                        <span class="badge <?php echo $row['availability'] ? 'bg-success' : 'bg-danger'; ?>">
                                            <?php echo $row['availability'] ? 'Available' : 'Not Available'; ?>
                                        </span>
                                        <span class="badge bg-primary"><?php echo $row['work_experience']; ?> Years Experience</span>
                                    </div>
                                    <p class="card-text">
                                        <i class="fa fa-map-marker text-danger"></i> <?php echo htmlspecialchars($row['location']); ?><br>
                                        <i class="fa fa-money text-success"></i> ৳<?php echo htmlspecialchars($row['price_per_hour']); ?> per hour<br>
                                        <i class="fa fa-wrench text-info"></i> <?php echo htmlspecialchars($row['specialization']); ?><br>
                                        <i class="fa fa-phone text-primary"></i> <?php echo htmlspecialchars($row['contact_number']); ?>
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
                                        <?php if($row['availability']): ?>
                                            <a href="car_mechanic_info.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                                        <?php else: ?>
                                            <button class="btn btn-secondary" disabled>Not Available</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            $stmt->close();
        } catch (Exception $e) {
            echo '<div class="col-12"><div class="alert alert-danger">An error occurred while fetching mechanics. Please try again later.</div></div>';
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