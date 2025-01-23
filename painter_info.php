<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get painter details
if(isset($_GET['id'])) {
    $painter_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM painters WHERE id = '$painter_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $painter = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Painter Image -->
        <div class="col-md-3">
            <img src="<?= $painter['image'] ?>" class="img-fluid rounded" alt="<?= $painter['name'] ?>">
        </div>

        <!-- Painter Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $painter['name'] ?></h3>
                <span class="badge bg-success">Available Now</span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating_query = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                                   FROM reviews WHERE painter_id = '$painter_id'";
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
                <?= $painter['location'] ?>
            </p>

            <!-- Contact -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $painter['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $painter['email'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $painter['work_experience'] ?> Years Experience
            </p>

            <!-- Specialization -->
            <p class="mb-2">
                <i class="fas fa-paint-brush text-primary me-2"></i>
                <?= $painter['specialization'] ?>
            </p>

            <!-- Price -->
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($painter['price_per_day'], 2) ?> per day
            </p>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <a href="payment.php?type=painter&id=<?= $painter_id ?>" class="btn btn-primary">
                    <i class="fas fa-handshake me-2"></i>Hire Now
                </a>
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
                            WHERE r.painter_id = '$painter_id' 
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

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Painter not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?>
