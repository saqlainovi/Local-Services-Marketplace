<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

if(isset($_GET['id'])) {
    $packer_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM packers_movers WHERE id = '$packer_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $packer = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Packer Image -->
        <div class="col-md-3">
            <img src="<?= $packer['image'] ?>" class="img-fluid rounded" alt="<?= $packer['name'] ?>">
        </div>

        <!-- Packer Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $packer['name'] ?></h3>
                <span class="badge bg-success">Available Now</span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating = $packer['rating'] ?? 0;
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
                <?= $packer['location'] ?>
            </p>
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $packer['contact_number'] ?>
            </p>
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $packer['email'] ?>
            </p>
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $packer['work_experience'] ?> Years Experience
            </p>
            <p class="mb-2">
                <i class="fas fa-truck text-primary me-2"></i>
                <?= $packer['vehicle_type'] ?>
            </p>
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($packer['price_per_hour'], 2) ?> per hour
            </p>

            <!-- Services Offered -->
            <div class="mb-4">
                <h5>Services Offered:</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>House Moving</li>
                    <li><i class="fas fa-check text-success me-2"></i>Office Relocation</li>
                    <li><i class="fas fa-check text-success me-2"></i>Furniture Moving</li>
                    <li><i class="fas fa-check text-success me-2"></i>Packing Services</li>
                    <li><i class="fas fa-check text-success me-2"></i>Loading/Unloading</li>
                    <li><i class="fas fa-check text-success me-2"></i>Storage Services</li>
                </ul>
            </div>

            <!-- Vehicle Types -->
            <div class="mb-4">
                <h5>Available Vehicles:</h5>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-secondary p-2">
                        <i class="fas fa-truck-pickup me-1"></i>Pickup Truck
                    </span>
                    <span class="badge bg-secondary p-2">
                        <i class="fas fa-truck me-1"></i>Moving Van
                    </span>
                    <span class="badge bg-secondary p-2">
                        <i class="fas fa-truck-moving me-1"></i>Large Truck
                    </span>
                </div>
            </div>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <a href="payment.php?id=<?= $packer_id ?>&type=packers" class="btn btn-primary">
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
                            WHERE r.packer_id = '$packer_id' 
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
        echo "<div class='container mt-4'><div class='alert alert-danger'>Service provider not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 