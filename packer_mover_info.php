<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/db_connect.php');

if (!isset($_GET['id'])) {
    header('Location: packers_movers.php');
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM packers_movers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$provider = $result->fetch_assoc();

if (!$provider) {
    header('Location: packers_movers.php');
    exit();
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo isset($provider['image']) ? $provider['image'] : 'cropped-images (1)/packers-1.jpg'; ?>" 
                 class="img-fluid rounded" 
                 alt="<?php echo htmlspecialchars($provider['name']); ?>">
        </div>
        <div class="col-md-8">
            <h2><?php echo htmlspecialchars($provider['name']); ?></h2>
            
            <div class="mb-3">
                <span class="badge <?php echo $provider['availability'] ? 'bg-success' : 'bg-danger'; ?>">
                    <?php echo $provider['availability'] ? 'Available' : 'Not Available'; ?>
                </span>
                <span class="badge bg-primary"><?php echo $provider['work_experience']; ?> Years Experience</span>
                <span class="badge bg-info"><?php echo htmlspecialchars($provider['vehicle_type']); ?></span>
            </div>

            <div class="mb-2">
                <i class="fa fa-map-marker text-danger"></i> <?php echo htmlspecialchars($provider['location']); ?>
            </div>
            <div class="mb-2">
                <i class="fa fa-money text-success"></i> ৳<?php echo htmlspecialchars($provider['price_per_hour']); ?> per hour
            </div>
            <div class="mb-2">
                <i class="fa fa-truck text-info"></i> <?php echo htmlspecialchars($provider['vehicle_type']); ?>
            </div>
            <div class="mb-2">
                <i class="fa fa-phone text-primary"></i> <?php echo htmlspecialchars($provider['contact_number']); ?>
            </div>
            <div class="mb-2">
                <i class="fa fa-envelope text-secondary"></i> <?php echo htmlspecialchars($provider['email']); ?>
            </div>

            <?php if($provider['availability']): ?>
                <a href="payment.php?type=packer_mover&id=<?php echo $provider['id']; ?>" class="btn btn-primary mt-3">
                    <i class="fas fa-truck"></i> Hire Now
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-5">
        <h3>Reviews</h3>
        <?php
        $review_query = "SELECT r.*, u.name as reviewer_name FROM reviews r 
                        LEFT JOIN users u ON r.user_id = u.id 
                        WHERE r.packer_mover_id = ?";
        $review_stmt = $conn->prepare($review_query);
        $review_stmt->bind_param('i', $id);
        $review_stmt->execute();
        $reviews = $review_stmt->get_result();

        if ($reviews->num_rows == 0) {
            echo '<p>No reviews yet</p>';
        } else {
            while ($review = $reviews->fetch_assoc()) {
                ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title"><?php echo htmlspecialchars($review['reviewer_name']); ?></h5>
                            <div class="rating">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $review['rating']) {
                                        echo '<i class="fas fa-star text-warning"></i>';
                                    } else {
                                        echo '<i class="far fa-star text-warning"></i>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <p class="card-text"><?php echo htmlspecialchars($review['review_text']); ?></p>
                        <small class="text-muted">Posted on <?php echo date('F j, Y', strtotime($review['created_at'])); ?></small>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <!-- Write Review Section -->
    <?php if (isset($_SESSION['authenticated'])): ?>
    <div class="mt-4 mb-5">
        <h3>Write a Review</h3>
        <form action="process_review.php" method="POST">
            <input type="hidden" name="packer_mover_id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <div class="rating-input">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" required>
                    <label for="star<?php echo $i; ?>"><i class="far fa-star"></i></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="review" class="form-label">Your Review</label>
                <textarea class="form-control" id="review" name="review_text" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
    <?php endif; ?>
</div>

<style>
.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.rating-input input {
    display: none;
}

.rating-input label {
    cursor: pointer;
    font-size: 25px;
    color: #ddd;
    margin-right: 5px;
}

.rating-input label:hover,
.rating-input label:hover ~ label,
.rating-input input:checked ~ label {
    color: #ffc107;
}

.rating-input label:hover i,
.rating-input label:hover ~ label i,
.rating-input input:checked ~ label i {
    content: '\f005';
    font-weight: 900;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingLabels = document.querySelectorAll('.rating-input label');
    ratingLabels.forEach(label => {
        label.addEventListener('mouseover', function() {
            this.querySelector('i').classList.remove('far');
            this.querySelector('i').classList.add('fas');
        });
        label.addEventListener('mouseout', function() {
            if (!this.previousElementSibling.checked) {
                this.querySelector('i').classList.remove('fas');
                this.querySelector('i').classList.add('far');
            }
        });
        label.previousElementSibling.addEventListener('change', function() {
            if (this.checked) {
                this.nextElementSibling.querySelector('i').classList.remove('far');
                this.nextElementSibling.querySelector('i').classList.add('fas');
            }
        });
    });
});
</script>

<?php include('includes/footer.php'); ?> 