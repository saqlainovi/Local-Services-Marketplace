<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get mechanic details
if(isset($_GET['id'])) {
    $mechanic_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM mechanics WHERE id = '$mechanic_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $mechanic = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Mechanic Image -->
        <div class="col-md-3">
            <img src="<?= isset($mechanic['profile_image']) ? '../uploads/'.$mechanic['profile_image'] : 'assets/img/default-mechanic.jpg' ?>" 
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
                    $rating_query = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                                   FROM reviews WHERE mechanic_id = '$mechanic_id'";
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

            <!-- Specialization -->
            <p class="mb-2">
                <i class="fas fa-tools text-primary me-2"></i>
                Specialization: <?= $mechanic['specialization'] ?>
            </p>

            <!-- Location -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $mechanic['location'] ?>
            </p>

            <!-- Contact -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $mechanic['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $mechanic['email'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $mechanic['work_experience'] ?> Years Experience
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
                    <a href="payment.php?id=<?= $mechanic_id ?>&type=mechanic" class="btn btn-primary">
                        <i class="fas fa-handshake me-2"></i>Hire Now
                    </a>
                <?php else: ?>
                    <button class="btn btn-secondary" disabled>Not Available</button>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Hire
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
                            WHERE r.mechanic_id = '$mechanic_id' 
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