<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

if(isset($_GET['id'])) {
    $mechanic_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM car_mechanics WHERE id = '$mechanic_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $mechanic = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Mechanic Image -->
        <div class="col-md-3">
            <img src="<?= $mechanic['image'] ?>" class="img-fluid rounded" alt="<?= $mechanic['name'] ?>">
        </div>

        <!-- Mechanic Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $mechanic['name'] ?></h3>
                <span class="badge bg-success">Available Now</span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating = $mechanic['rating'] ?? 0;
                    for($i = 1; $i <= 5; $i++) {
                        if($i <= $rating) {
                            echo '<i class="fa fa-star text-warning"></i>';
                        } else {
                            echo '<i class="fa fa-star-o text-warning"></i>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Other details -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $mechanic['location'] ?>
            </p>
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $mechanic['contact_number'] ?>
            </p>
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $mechanic['email'] ?>
            </p>
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $mechanic['work_experience'] ?> Years Experience
            </p>
            <p class="mb-2">
                <i class="fas fa-wrench text-primary me-2"></i>
                <?= $mechanic['specialization'] ?>
            </p>
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($mechanic['price_per_hour'], 2) ?> per hour
            </p>

            <!-- Services Offered -->
            <div class="mb-4">
                <h5>Services Offered:</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Engine Repair & Maintenance</li>
                    <li><i class="fas fa-check text-success me-2"></i>Brake System Service</li>
                    <li><i class="fas fa-check text-success me-2"></i>Transmission Repair</li>
                    <li><i class="fas fa-check text-success me-2"></i>Electrical System Diagnosis</li>
                    <li><i class="fas fa-check text-success me-2"></i>AC Service & Repair</li>
                </ul>
            </div>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <a href="payment.php?id=<?= $mechanic_id ?>&type=carmechanic" class="btn btn-primary">
                    <i class="fas fa-handshake me-2"></i>Hire Now
                </a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Hire
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Reviews Section -->
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
                <div class="review-card mb-3">
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

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Mechanic not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 