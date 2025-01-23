<?php
session_start();
include('dbcon.php');

if (!isset($_SESSION['authenticated'])) {
    $_SESSION['message'] = "Please login to access reviews";
    header('Location: login.php');
    exit();
}

// Get user ID from email
$user_email = $_SESSION['auth_user']['email'];
$user_query = "SELECT id FROM users WHERE email = '$user_email'";
$user_result = mysqli_query($con, $user_query);
$user = mysqli_fetch_assoc($user_result);
$user_id = $user['id'];

// Get all completed orders with painters
$query = "SELECT 
    p.id as payment_id,
    p.booking_date,
    p.status,
    p.amount,
    pa.name as painter_name, 
    pa.image as painter_image,
    pa.contact_number as painter_phone,
    pa.location as painter_address,
    pa.work_experience as painter_experience,
    pa.specialization,
    pa.rate as price_per_day,
    r.rating,
    r.review_text,
    r.created_at as review_date
    FROM payments p 
    JOIN painters pa ON p.painter_id = pa.id 
    LEFT JOIN reviews r ON p.id = r.payment_id
    WHERE p.user_id = '$user_id' AND p.status = 'completed'
    ORDER BY p.created_at DESC";
$result = mysqli_query($con, $query);

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);
    $review = mysqli_real_escape_string($con, $_POST['review']);
    
    // Get painter_id from payment
    $painter_query = "SELECT painter_id FROM payments WHERE id = '$payment_id'";
    $painter_result = mysqli_query($con, $painter_query);
    $payment_data = mysqli_fetch_assoc($painter_result);
    $painter_id = $payment_data['painter_id'];
    
    // Insert new review
    $insert_query = "INSERT INTO reviews (payment_id, user_id, painter_id, rating, review_text) 
                    VALUES ('$payment_id', '$user_id', '$painter_id', '$rating', '$review')";
    
    if(mysqli_query($con, $insert_query)) {
        $_SESSION['status'] = "Review submitted successfully!";
    } else {
        $_SESSION['status'] = "Error: " . mysqli_error($con);
    }
    
    header('Location: reviews.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .table th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        .painter-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .status-completed {
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 0.875rem;
        }
        .btn-view {
            padding: 4px 12px;
            font-size: 0.875rem;
        }
        .star-rating {
            color: #ffc107;
            font-size: 0.9rem;
        }
        .amount {
            font-weight: 500;
            color: #28a745;
        }
        .painter-details small {
            display: block;
            color: #6c757d;
            font-size: 0.8rem;
            line-height: 1.4;
        }
        .experience-badge {
            background: #e9ecef;
            color: #495057;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            margin-left: 5px;
        }
        .modal-content {
            background: #fff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .modal-header {
            background: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            background: #fff;
            border-top: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
        }

        .painter-info-box,
        .rating-box,
        .review-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .star-rating .star-label {
            cursor: pointer;
            padding: 5px;
        }

        .star-rating .star-label i {
            color: #dee2e6;
            transition: color 0.2s;
        }

        .star-rating .star-label:hover i,
        .star-rating .star-label:hover ~ .star-label i {
            color: #ffc107;
        }

        .star-rating input:checked + i,
        .star-rating input:checked ~ .star-label i {
            color: #ffc107;
        }

        .form-control {
            background: #fff;
            border: 1px solid #ced4da;
            padding: 0.75rem;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }

        .btn {
            font-weight: 500;
            padding: 0.5rem 1.5rem;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }

        .btn-light {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body class="bg-light">
    <?php include('includes/navbar.php'); ?>

    <div class="container py-4">
        <div class="row">
            <!-- Add Dashboard Menu -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>Dashboard Menu</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="dashboard.php" class="list-group-item list-group-item-action">
                            My Orders
                        </a>
                        <a href="edit_profile.php" class="list-group-item list-group-item-action">
                            Change Profile
                        </a>
                        <a href="reviews.php" class="list-group-item list-group-item-action active">
                            Reviews & Ratings
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h4 class="mb-4">My Reviews</h4>
                <div class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Painter Details</th>
                                <th>Service Date</th>
                                <th>Amount</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($order = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>#<?= str_pad($order['payment_id'], 5, '0', STR_PAD_LEFT) ?></td>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img src="<?= $order['painter_image'] ?? 'assets/img/default-painter.jpg' ?>" 
                                                     class="painter-img" 
                                                     alt="<?= $order['painter_name'] ?>">
                                                <div class="painter-details">
                                                    <div>
                                                        <?= $order['painter_name'] ?>
                                                        <span class="experience-badge">
                                                            <?= $order['painter_experience'] ?? '0' ?> Years
                                                        </span>
                                                    </div>
                                                    <small>
                                                        <i class="fas fa-phone-alt me-1"></i>
                                                        <?= $order['painter_phone'] ?>
                                                    </small>
                                                    <small>
                                                        <i class="fas fa-map-marker-alt me-1"></i>
                                                        <?= $order['painter_address'] ?>
                                                    </small>
                                                    <?php if(isset($order['specialization'])): ?>
                                                        <small>
                                                            <i class="fas fa-tools me-1"></i>
                                                            <?= $order['specialization'] ?>
                                                        </small>
                                                    <?php endif; ?>
                                                    <?php if(isset($order['price_per_day'])): ?>
                                                        <small>
                                                            <i class="fas fa-money-bill-wave me-1"></i>
                                                            ৳<?= number_format($order['price_per_day'], 2) ?>/day
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($order['booking_date'])) ?></td>
                                        <td>
                                            <span class="amount">৳<?= number_format($order['amount'], 2) ?></span>
                                        </td>
                                        <td>
                                            <?php if (isset($order['rating']) && $order['rating'] > 0): ?>
                                                <div class="star-rating">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <i class="fas fa-star <?= $i <= $order['rating'] ? '' : 'text-muted' ?>"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-muted">Not rated</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="status-completed">Completed</span></td>
                                        <td>
                                            <?php if (isset($order['rating']) && $order['rating'] > 0): ?>
                                                <button class="btn btn-outline-primary btn-view" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editReview<?= $order['payment_id'] ?>">
                                                    Edit Review
                                                </button>
                                            <?php else: ?>
                                                <button class="btn btn-primary btn-view" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#addReview<?= $order['payment_id'] ?>">
                                                    Add Review
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <!-- Review Modal with solid box design -->
                                    <div class="modal fade" id="<?= isset($order['rating']) && $order['rating'] > 0 ? 'editReview' : 'addReview' ?><?= $order['payment_id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold">
                                                            Add Review for <?= $order['painter_name'] ?>
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body bg-white">
                                                        <input type="hidden" name="payment_id" value="<?= $order['payment_id'] ?>">
                                                        
                                                        <!-- Painter Info Box -->
                                                        <div class="painter-info-box mb-4 p-3 bg-light rounded">
                                                            <div class="d-flex align-items-center">
                                                                <img src="<?= $order['painter_image'] ?? 'assets/img/default-painter.jpg' ?>" 
                                                                     class="rounded-circle me-3" 
                                                                     width="50" height="50" 
                                                                     alt="<?= $order['painter_name'] ?>">
                                                                <div>
                                                                    <h6 class="mb-1"><?= $order['painter_name'] ?></h6>
                                                                    <div class="text-muted small">
                                                                        <i class="fas fa-map-marker-alt me-1"></i> <?= $order['painter_address'] ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Rating Box -->
                                                        <div class="rating-box mb-4 p-3 bg-light rounded">
                                                            <label class="form-label fw-bold mb-3">Your Rating</label>
                                                            <div class="star-rating d-flex gap-2 justify-content-center">
                                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                                    <label class="star-label m-0">
                                                                        <input type="radio" name="rating" value="<?= $i ?>" class="d-none"
                                                                               <?= (isset($order['rating']) && $order['rating'] == $i) ? 'checked' : '' ?>>
                                                                        <i class="fas fa-star fs-2"></i>
                                                                    </label>
                                                                <?php endfor; ?>
                                                            </div>
                                                        </div>

                                                        <!-- Review Box -->
                                                        <div class="review-box p-3 bg-light rounded">
                                                            <label class="form-label fw-bold mb-2">Your Review</label>
                                                            <textarea name="review" 
                                                                      class="form-control border"
                                                                      rows="4"
                                                                      placeholder="Share your experience with this painter..."
                                                                      required><?= $order['review_text'] ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary px-4">Submit Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <p class="mb-2">No completed orders found</p>
                                        <a href="painter.php" class="btn btn-primary btn-sm">Book a Service</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 