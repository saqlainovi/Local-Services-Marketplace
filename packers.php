<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get packers list
$query = "SELECT * FROM packers_movers WHERE availability = 1";
$result = mysqli_query($con, $query);

// For debugging - check table structure
// $table_info = mysqli_query($con, "DESCRIBE packers_movers");
// while($row = mysqli_fetch_assoc($table_info)) {
//     print_r($row);
// }
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Packers & Movers Services</h2>
    
    <div class="row">
        <?php while($packer = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= isset($packer['profile_image']) ? 'uploads/'.$packer['profile_image'] : 'assets/img/default-packer.jpg' ?>" 
                         class="card-img-top" alt="<?= $packer['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $packer['name'] ?></h5>
                        <p class="card-text">
                            <i class="fa fa-map-marker"></i> <?= $packer['location'] ?><br>
                            <?php if(isset($packer['vehicle_type'])): ?>
                                <i class="fa fa-truck"></i> <?= $packer['vehicle_type'] ?><br>
                            <?php endif; ?>
                            <i class="fa fa-money"></i> ৳<?= $packer['price'] ?? 'Price on request' ?> 
                            <?php if(isset($packer['price_type'])): ?>
                                per <?= $packer['price_type'] ?>
                            <?php endif; ?>
                        </p>
                        <div class="mt-3">
                            <?php if(isset($packer['emergency_service']) && $packer['emergency_service']): ?>
                                <span class="badge badge-success mb-2">Emergency Service Available</span><br>
                            <?php endif; ?>
                            <a href="book_service.php?type=packer_mover&id=<?= $packer['id'] ?>" 
                               class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<style>
.card {
    transition: transform 0.3s ease;
    margin-bottom: 20px;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.card-body {
    padding: 1.25rem;
}

.card-title {
    font-weight: 600;
    margin-bottom: 1rem;
}

.card-text {
    color: #666;
    line-height: 1.8;
}

.card-text i {
    width: 20px;
    color: #007bff;
    margin-right: 5px;
}

.badge {
    padding: 0.5em 1em;
    font-size: 85%;
}

.btn-primary {
    width: 100%;
    padding: 0.5rem 1rem;
    font-weight: 500;
}

.badge-success {
    background-color: #28a745;
}
</style>

<?php include('includes/footer.php'); ?> 