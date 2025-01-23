<?php 
session_start();
$page_title = "Car Mechanic Services";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');
?>

<div class="container mt-4">
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
                        $locations = mysqli_query($con, "SELECT DISTINCT location FROM mechanics");
                        while($loc = mysqli_fetch_assoc($locations)) {
                            $selected = ($_GET['location'] ?? '') == $loc['location'] ? 'selected' : '';
                            echo "<option value='{$loc['location']}' {$sselected}>{$loc['location']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Specialization</label>
                    <select name="specialization" class="form-select">
                        <option value="">All Types</option>
                        <option value="Engine" <?= ($_GET['specialization'] ?? '') == 'Engine' ? 'selected' : ''; ?>>Engine Specialist</option>
                        <option value="Transmission" <?= ($_GET['specialization'] ?? '') == 'Transmission' ? 'selected' : ''; ?>>Transmission</option>
                        <option value="Electrical" <?= ($_GET['specialization'] ?? '') == 'Electrical' ? 'selected' : ''; ?>>Electrical Systems</option>
                        <option value="General" <?= ($_GET['specialization'] ?? '') == 'General' ? 'selected' : ''; ?>>General Repair</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sort By Price</label>
                    <select name="price_sort" class="form-select">
                        <option value="">Default</option>
                        <option value="low_high" <?= ($_GET['price_sort'] ?? '') == 'low_high' ? 'selected' : ''; ?>>Low to High</option>
                        <option value="high_low" <?= ($_GET['price_sort'] ?? '') == 'high_low' ? 'selected' : ''; ?>>High to Low</option>
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
        // Build query based on filters
        $query = "SELECT * FROM mechanics WHERE 1=1";
        
        if(isset($_GET['location']) && !empty($_GET['location'])) {
            $location = mysqli_real_escape_string($con, $_GET['location']);
            $query .= " AND location = '$location'";
        }

        if(isset($_GET['specialization']) && !empty($_GET['specialization'])) {
            $specialization = mysqli_real_escape_string($con, $_GET['specialization']);
            $query .= " AND specialization LIKE '%$specialization%'";
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
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= isset($row['profile_image']) ? '../uploads/'.$row['profile_image'] : 'assets/img/default-mechanic.jpg' ?>" 
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
                                    <span class="badge bg-info"><?= $row['specialization'] ?></span>
                                </div>
                                <p class="card-text">
                                    <i class="fa fa-map-marker text-danger"></i> <?= $row['location'] ?><br>
                                    <i class="fa fa-money text-success"></i> ৳<?= $row['price_per_hour'] ?> per hour<br>
                                    <i class="fa fa-phone text-primary"></i> <?= $row['contact_number'] ?><br>
                                    <i class="fa fa-wrench text-secondary"></i> <?= $row['specialization'] ?>
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
                                        <a href="mechanic_info.php?id=<?= $row['id'] ?>" 
                                           class="btn btn-outline-primary me-2">View Details</a>
                                        <?php if(isset($_SESSION['auth_user'])): ?>
                                            <?php if($row['availability']): ?>
                                                <a href="payment.php?id=<?= $row['id'] ?>&type=mechanic" 
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
        if(mysqli_num_rows($result) == 0) {
            echo '<div class="col-12"><div class="alert alert-info">No mechanics found matching your criteria.</div></div>';
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