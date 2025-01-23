<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get packer & mover details
if(isset($_GET['id'])) {
    $mover_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM packers_movers WHERE id = '$mover_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $mover = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Packer & Mover Image -->
        <div class="col-md-3">
            <img src="<?= isset($mover['image']) ? $mover['image'] : 'assets/img/default-mover.jpg' ?>" 
                 class="img-fluid rounded" 
                 alt="<?= $mover['name'] ?>">
        </div>

        <!-- Packer & Mover Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $mover['name'] ?></h3>
                <span class="badge <?= $mover['availability'] ? 'bg-success' : 'bg-danger' ?>">
                    <?= $mover['availability'] ? 'Available Now' : 'Not Available' ?>
                </span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating_query = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                                   FROM reviews WHERE packer_mover_id = '$mover_id'";
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

            <!-- Location -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $mover['location'] ?>
            </p>

            <!-- Contact -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $mover['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $mover['email'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $mover['work_experience'] ?> Years Experience
            </p>

            <!-- Vehicle Type -->
            <p class="mb-2">
                <i class="fas fa-truck text-primary me-2"></i>
                <?= $mover['vehicle_type'] ?>
            </p>

            <!-- Price -->
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($mover['price_per_hour'], 2) ?> per hour
            </p>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['authenticated'])): ?>
                <?php if($mover['availability']): ?>
                    <a href="payment.php?id=<?= $mover_id ?>&type=packer_mover" class="btn btn-primary">
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
                            WHERE r.packer_mover_id = '$mover_id' 
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
    padding: 1rem 0;
}

.review-card:last-child {
    border-bottom: none;
}

.star-rating {
    color: #ffc107;
}

.badge {
    padding: 0.5rem 1rem;
    font-weight: 500;
}
</style>

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Packer & Mover not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 