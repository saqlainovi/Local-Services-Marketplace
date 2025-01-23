<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get TV technician details
if(isset($_GET['id'])) {
    $technician_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM tv_technicians WHERE id = '$technician_id'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $technician = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <div class="row">
        <!-- Technician Image -->
        <div class="col-md-3">
            <img src="<?= isset($technician['profile_image']) ? '../uploads/'.$technician['profile_image'] : 'assets/img/default-technician.jpg' ?>" 
                 class="img-fluid rounded" 
                 alt="<?= $technician['name'] ?>">
        </div>

        <!-- Technician Details -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h3><?= $technician['name'] ?></h3>
                <span class="badge <?= $technician['availability'] ? 'bg-success' : 'bg-danger' ?>">
                    <?= $technician['availability'] ? 'Available Now' : 'Not Available' ?>
                </span>
            </div>

            <!-- Rating Stars -->
            <div class="d-flex align-items-center mb-3">
                <div class="star-rating me-2">
                    <?php 
                    $rating_query = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                                   FROM reviews WHERE tv_technician_id = '$technician_id'";
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
                Specializes in: <?= $technician['specialization'] ?>
            </p>

            <!-- Location -->
            <p class="mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <?= $technician['location'] ?>
            </p>

            <!-- Contact -->
            <p class="mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <?= $technician['contact_number'] ?>
            </p>

            <!-- Email -->
            <p class="mb-2">
                <i class="fas fa-envelope text-primary me-2"></i>
                <?= $technician['email'] ?>
            </p>

            <!-- Experience -->
            <p class="mb-2">
                <i class="fas fa-briefcase text-primary me-2"></i>
                <?= $technician['work_experience'] ?> Years Experience
            </p>

            <!-- Price -->
            <p class="mb-3">
                <i class="fas fa-money-bill text-primary me-2"></i>
                ৳<?= number_format($technician['price_per_service'], 2) ?> per service
            </p>

            <!-- Services Offered -->
            <div class="mb-4">
                <h5 class="mb-3">Services Offered:</h5>
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>TV Repair & Maintenance</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Display Problems</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Sound Issues</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Smart TV Setup</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Channel Programming</li>
                </ul>
            </div>

            <!-- Hire Button -->
            <?php if(isset($_SESSION['auth_user'])): ?>
                <?php if($technician['availability']): ?>
                    <a href="payment.php?id=<?= $technician_id ?>&type=tv_repair" class="btn btn-primary">
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
                            WHERE r.tv_technician_id = '$technician_id' 
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
    border-left: none;
    border-right: none;
    padding: 0.75rem 0;
}

.list-group-item:first-child {
    border-top: none;
}

.list-group-item:last-child {
    border-bottom: none;
}
</style>

<?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>TV Technician not found</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-danger'>Invalid request</div></div>";
}
include('includes/footer.php');
?> 