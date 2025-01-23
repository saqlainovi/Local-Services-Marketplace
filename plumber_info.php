<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get plumber details
if(isset($_GET['id'])) {
    $plumber_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM plumbers WHERE id = '$plumber_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $plumber = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Plumber Image -->
        <div class="col-md-3">
            <img src="<?= isset($plumber['profile_image']) ? 'uploads/'.$plumber['profile_image'] : 'assets/img/default-plumber.jpg' ?>" 
                 class="img-fluid rounded" 
                 alt="<?= $plumber['name'] ?>">
        </div>

        <!-- Plumber Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $plumber['name'] ?></h3>
                <span class="badge <?= $plumber['availability'] ? 'bg-success' : 'bg-danger' ?>">
                    <?= $plumber['availability'] ? 'Available Now' : 'Not Available' ?>
                </span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating = $plumber['rating'] ?? 0;
                    for($i = 1; $i <= 5; $i++) {
                        if($i <= $rating) {
                            echo '<i class="fa fa-star text-warning"></i>';
                        } else {
                            echo '<i class="fa fa-star-o text-warning"></i>';
                        }
                    }
                    ?>
                </div>
                <span>(<?= $plumber['total_reviews'] ?? 0 ?> reviews)</span>
            </div>

            <!-- Location -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $plumber['location'] ?>
            </p>

            <!-- Contact -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $plumber['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $plumber['email'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $plumber['work_experience'] ?> Years Experience
            </p>

            <!-- Price Section -->
            <?php
            // First, let's check which price field exists in our database
            $price_display = "Price not available";
            $price_type_display = "service";

            if(isset($plumber['price_per_hour']) && !empty($plumber['price_per_hour'])) {
                $price_display = "৳" . number_format($plumber['price_per_hour'], 2);
                $price_type_display = "hour";
            } elseif(isset($plumber['price_per_service']) && !empty($plumber['price_per_service'])) {
                $price_display = "৳" . number_format($plumber['price_per_service'], 2);
                $price_type_display = "service";
            } elseif(isset($plumber['price']) && !empty($plumber['price'])) {
                $price_display = "৳" . number_format($plumber['price'], 2);
                $price_type_display = isset($plumber['price_type']) ? $plumber['price_type'] : "service";
            }
            ?>

            <!-- Display Price -->
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                <?= $price_display ?> per <?= $price_type_display ?>
            </p>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <?php if($plumber['availability']): ?>
                    <a href="payment.php?type=plumber&id=<?= $plumber_id ?>" class="btn btn-primary">
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

    <!-- Reviews Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Reviews</h5>
        </div>
        <div class="card-body">
            <?php
            // Updated query to get reviews for plumbers
            $reviews_query = "SELECT r.*, u.name as reviewer_name, r.rating as review_rating, r.review_text, r.created_at 
                             FROM reviews r 
                             JOIN users u ON r.user_id = u.id 
                             WHERE r.plumber_id = '$plumber_id' 
                             ORDER BY r.created_at DESC";
            
            $reviews_result = mysqli_query($con, $reviews_query);

            if($reviews_result && mysqli_num_rows($reviews_result) > 0):
                while($review = mysqli_fetch_assoc($reviews_result)):
            ?>
                <div class="review-card mb-3 p-3 border-bottom">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="mb-1"><?= htmlspecialchars($review['reviewer_name']) ?></h6>
                            <div class="star-rating mb-2">
                                <?php 
                                for($i = 1; $i <= 5; $i++) {
                                    if($i <= $review['review_rating']) {
                                        echo '<i class="fas fa-star text-warning"></i>';
                                    } else {
                                        echo '<i class="far fa-star text-warning"></i>';
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

    <!-- Review Form -->
    <?php if(isset($_SESSION['auth_user'])): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Write a Review</h5>
            </div>
            <div class="card-body">
                <form action="submit_review.php" method="POST">
                    <input type="hidden" name="plumber_id" value="<?= $plumber_id ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <div class="star-rating-input">
                            <?php for($i = 5; $i >= 1; $i--): ?>
                                <input type="radio" name="rating" value="<?= $i ?>" id="star<?= $i ?>" required>
                                <label for="star<?= $i ?>"><i class="far fa-star"></i></label>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Your Review</label>
                        <textarea class="form-control" name="review_text" rows="3" required></textarea>
                    </div>
                    
                    <button type="submit" name="submit_review" class="btn btn-primary">
                        Submit Review
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
.star-rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.star-rating-input input {
    display: none;
}

.star-rating-input label {
    cursor: pointer;
    font-size: 1.5rem;
    color: #ddd;
    margin: 0 2px;
}

.star-rating-input label:hover,
.star-rating-input label:hover ~ label,
.star-rating-input input:checked ~ label {
    color: #ffd700;
}
</style>

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Plumber not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 