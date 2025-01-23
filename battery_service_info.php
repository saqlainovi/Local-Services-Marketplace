<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get battery service provider details
if(isset($_GET['id'])) {
    $provider_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM battery_services WHERE id = '$provider_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $provider = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Provider Image -->
        <div class="col-md-3">
            <img src="<?= isset($provider['profile_image']) ? '../uploads/'.$provider['profile_image'] : 'assets/img/default-battery.jpg' ?>" 
                 class="img-fluid rounded" 
                 alt="<?= $provider['name'] ?>">
                 
            <!-- Emergency Contact Card -->
            <?php if(strpos(strtolower($provider['battery_types']), 'emergency') !== false): ?>
            <div class="card mt-3 bg-light">
                <div class="card-body">
                    <h6 class="card-title text-danger">
                        <i class="fas fa-bolt me-2"></i>Emergency Service
                    </h6>
                    <p class="card-text">
                        <strong>24/7 Hotline:</strong><br>
                        <?= $provider['contact_number'] ?>
                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Provider Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $provider['name'] ?></h3>
                <span class="badge <?= $provider['availability'] ? 'bg-success' : 'bg-danger' ?>">
                    <?= $provider['availability'] ? 'Available Now' : 'Not Available' ?>
                </span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating_query = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                                   FROM reviews WHERE battery_service_id = '$provider_id'";
                    $rating_result = mysqli_query($con, $rating_query);
                    $rating_data = mysqli_fetch_assoc($rating_result);
                    $rating = $rating_data['avg_rating'] ?? 0;
                    
                    for($i = 1; $i <= 5; $i++) {
                        if($i <= $rating) {
                            echo '<i class="fa fa-star text-warning"></i>';
                        } else {
                            echo '<i class="fa fa-star-o text-warning"></i>';
                        }
                    }
                    ?>
                </div>
                <span>(<?= $rating_data['total_reviews'] ?? 0 ?> reviews)</span>
            </div>

            <!-- Battery Types -->
            <p class="mb-2">
                <i class="fas fa-battery-full text-primary me-2"></i>
                Battery Types: <?= $provider['battery_types'] ?>
            </p>

            <!-- Location -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $provider['location'] ?>
            </p>

            <!-- Contact -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $provider['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $provider['email'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $provider['work_experience'] ?> Years Experience
            </p>

            <!-- Service Charge -->
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($provider['price_per_service'] ?? 0, 2) ?> service charge
            </p>

            <!-- Services Offered -->
            <div class="mb-4">
                <h5 class="mb-3">Services Offered:</h5>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Battery Testing
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Battery Replacement
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Battery Charging
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Jump Start Service
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Battery Sales
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Alternator Testing
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Electrical System Check
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check text-success me-2"></i>Battery Maintenance
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="alert alert-info mb-4">
                <h6 class="mb-2"><i class="fas fa-info-circle me-2"></i>Service Information:</h6>
                <ul class="mb-0">
                    <?php if(strpos(strtolower($provider['battery_types']), 'emergency') !== false): ?>
                        <li>24/7 Emergency Service Available</li>
                        <li>Quick Response Time: Usually within 30 minutes</li>
                    <?php endif; ?>
                    <li>All types of batteries available</li>
                    <li>Warranty on new batteries</li>
                    <li>Professional testing equipment used</li>
                    <li>Free battery health check</li>
                </ul>
            </div>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <?php if($provider['availability']): ?>
                    <a href="payment.php?id=<?= $provider_id ?>&type=battery" class="btn btn-primary">
                        <i class="fas fa-handshake me-2"></i>Book Now
                    </a>
                <?php else: ?>
                    <button class="btn btn-secondary" disabled>Not Available</button>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Book
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Reviews Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Recent Reviews</h5>
        </div>
        <div class="card-body">
            <?php
            $reviews_query = "SELECT r.*, u.name as reviewer_name 
                            FROM reviews r 
                            JOIN users u ON r.user_id = u.id 
                            WHERE r.battery_service_id = '$provider_id' 
                            ORDER BY r.created_at DESC";
            $reviews_result = mysqli_query($con, $reviews_query);

            if(mysqli_num_rows($reviews_result) > 0):
                while($review = mysqli_fetch_assoc($reviews_result)):
            ?>
                <div class="review-card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="mb-1"><?= htmlspecialchars($review['reviewer_name']) ?></h6>
                            <div class="star-rating mb-2">
                                <?php 
                                $rating = $review['rating'] ?? 0;
                                for($i = 1; $i <= 5; $i++) {
                                    if($i <= $rating) {
                                        echo '<i class="fa fa-star text-warning"></i>';
                                    } else {
                                        echo '<i class="fa fa-star-o text-warning"></i>';
                                    }
                                }
                                ?>
                            </div>
                            <p class="mb-1"><?= htmlspecialchars($review['review_text']) ?></p>
                        </div>
                        <small class="text-muted">
                            <?= date('M d, Y', strtotime($review['created_at'])) ?>
                        </small>
                    </div>
                </div>
            <?php 
                endwhile;
            else:
            ?>
                <p class="text-center text-muted my-4">No reviews yet</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.review-card {
    border-bottom: 1px solid #eee;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
}

.review-card:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.star-rating .fa {
    color: #ffc107;
}

.badge {
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
}

.card {
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
}

.btn-primary {
    padding: 0.5rem 1.5rem;
    font-size: 1rem;
}

.list-group-item {
    border: none;
    padding: 0.5rem 0;
}

.alert ul {
    padding-left: 1.2rem;
    margin-bottom: 0;
}
</style>

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Battery service provider not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 