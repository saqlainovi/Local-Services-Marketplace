 <!-- Add this section where you want to display reviews in painter's profile -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Reviews & Ratings</h5>
        <?php
        // Get painter's reviews
        $painter_id = $painter['id']; // Get current painter's ID
        $reviews_query = "SELECT 
            r.rating,
            r.review_text,
            r.created_at,
            u.name as user_name,
            p.id as payment_id,
            p.booking_date
            FROM reviews r
            JOIN users u ON r.user_id = u.id
            JOIN payments p ON r.payment_id = p.id
            WHERE r.painter_id = '$painter_id'
            ORDER BY r.created_at DESC";
        $reviews_result = mysqli_query($con, $reviews_query);
        
        // Calculate average rating
        $avg_query = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                     FROM reviews WHERE painter_id = '$painter_id'";
        $avg_result = mysqli_query($con, $avg_query);
        $avg_data = mysqli_fetch_assoc($avg_result);
        ?>
        
        <div class="d-flex align-items-center mt-2">
            <div class="h4 mb-0 me-2"><?= number_format($avg_data['avg_rating'], 1) ?></div>
            <div class="star-rating me-2">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <i class="fas fa-star <?= $i <= $avg_data['avg_rating'] ? 'text-warning' : 'text-muted' ?>"></i>
                <?php endfor; ?>
            </div>
            <div class="text-muted">(<?= $avg_data['total_reviews'] ?> reviews)</div>
        </div>
    </div>
    
    <div class="card-body">
        <?php if (mysqli_num_rows($reviews_result) > 0): ?>
            <?php while($review = mysqli_fetch_assoc($reviews_result)): ?>
                <div class="border-bottom mb-3 pb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex align-items-center mb-1">
                                <h6 class="mb-0 me-2"><?= $review['user_name'] ?></h6>
                                <div class="star-rating">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?= $i <= $review['rating'] ? 'text-warning' : 'text-muted' ?> small"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="text-muted small mb-2">
                                Service Date: <?= date('M d, Y', strtotime($review['booking_date'])) ?>
                            </div>
                            <p class="mb-0"><?= $review['review_text'] ?></p>
                        </div>
                        <small class="text-muted">
                            <?= date('M d, Y', strtotime($review['created_at'])) ?>
                        </small>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-muted my-4">No reviews yet</p>
        <?php endif; ?>
    </div>
</div>

<style>
.star-rating {
    color: #ffc107;
}
.star-rating .text-muted {
    color: #dee2e6 !important;
}
.card {
    border: none;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}
.card-header {
    background: white;
    border-bottom: 1px solid #dee2e6;
    padding: 1rem 1.5rem;
}
.card-body {
    padding: 1.5rem;
}
</style>