<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/db_connect.php');

// Get mechanic details
if(isset($_GET['id'])) {
    $mechanic_id = $_GET['id'];
    $query = "SELECT * FROM car_mechanics WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $mechanic_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if(mysqli_num_rows($result) > 0) {
        $mechanic = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Mechanic Image -->
        <div class="col-md-3">
            <img src="<?= isset($mechanic['image']) ? $mechanic['image'] : 'assets/img/default-mechanic.jpg' ?>" 
                 class="img-fluid rounded" 
                 alt="<?= $mechanic['name'] ?>">
        </div>

        <!-- Mechanic Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $mechanic['name'] ?></h3>
                <span class="badge <?= $mechanic['availability'] ? 'bg-success' : 'bg-danger' ?>">
                    <?= $mechanic['availability'] ? 'Available Now' : 'Not Available' ?>
                </span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating = $mechanic['rating'];
                    for($i = 1; $i <= 5; $i++) {
                        if($i <= $rating) {
                            echo '<i class="fas fa-star text-warning"></i>';
                        } else {
                            echo '<i class="far fa-star text-warning"></i>';
                        }
                    }
                    ?>
                </div>
                <span class="text-muted">(<?= number_format($rating, 1) ?>)</span>
            </div>

            <!-- Contact Info -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $mechanic['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $mechanic['email'] ?>
            </p>

            <!-- Location -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $mechanic['location'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $mechanic['work_experience'] ?> Years Experience
            </p>

            <!-- Specialization -->
            <p class="mb-2">
                <i class="fas fa-wrench text-primary me-2"></i>
                <?= $mechanic['specialization'] ?>
            </p>

            <!-- Price -->
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($mechanic['price_per_hour'], 2) ?> per hour
            </p>

            <!-- Services Offered -->
            <div class="mb-4">
                <h5 class="mb-3">Services Offered:</h5>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Engine Diagnostics & Repair
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Brake System Service
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Oil & Filter Change
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Transmission Service
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Electrical System Repair
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>AC Service & Repair
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Tire Service
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>General Maintenance
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <?php if($mechanic['availability']): ?>
                    <a href="payment.php?type=car_mechanic&id=<?= $mechanic_id ?>" class="btn btn-primary">
                        Hire Now
                    </a>
                <?php else: ?>
                    <button class="btn btn-secondary" disabled>Currently Unavailable</button>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">Login to Hire</a>
            <?php endif; ?>

            <!-- Reviews Section -->
            <?php
            // Get reviews for this mechanic
            $reviews_query = "SELECT r.*, u.name as user_name 
                            FROM reviews r 
                            JOIN users u ON r.user_id = u.id 
                            WHERE r.mechanic_id = ? 
                            ORDER BY r.created_at DESC";
            $stmt = $conn->prepare($reviews_query);
            $stmt->bind_param("i", $mechanic_id);
            $stmt->execute();
            $reviews_result = $stmt->get_result();
            ?>

            <div class="mt-5">
                <h4>Customer Reviews</h4>
                <?php if(mysqli_num_rows($reviews_result) > 0): ?>
                    <?php while($review = mysqli_fetch_assoc($reviews_result)): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title"><?= $review['user_name'] ?></h6>
                                    <small class="text-muted">
                                        <?= date('M d, Y', strtotime($review['created_at'])) ?>
                                    </small>
                                </div>
                                <div class="mb-2">
                                    <?php
                                    for($i = 1; $i <= 5; $i++) {
                                        if($i <= $review['rating']) {
                                            echo '<i class="fas fa-star text-warning"></i>';
                                        } else {
                                            echo '<i class="far fa-star text-warning"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                                <p class="card-text"><?= $review['review_text'] ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-muted">No reviews yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.star-rating {
    color: #ffd700;
    font-size: 1.2rem;
}

.list-group-item {
    border: none;
    padding: 0.5rem 0;
}

.review-card:last-child {
    border-bottom: none !important;
}

.card {
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    margin-bottom: 1rem;
}

.badge {
    padding: 8px 16px;
    font-size: 0.9rem;
}
</style>

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Mechanic not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 