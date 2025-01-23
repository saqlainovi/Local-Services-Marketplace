<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../dbcon.php');

// Check if user is logged in and is admin
if(!isset($_SESSION['auth_user']) || $_SESSION['auth_user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

$provider_type = $_GET['type'] ?? '';
$provider_id = $_GET['id'] ?? '';

if(empty($provider_type) || empty($provider_id)) {
    $_SESSION['message'] = "Invalid request";
    $_SESSION['message_type'] = "danger";
    header('Location: service_providers.php');
    exit();
}

// Handle form submission
if(isset($_POST['update_provider'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $work_experience = mysqli_real_escape_string($con, $_POST['work_experience']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $availability = isset($_POST['availability']) ? 1 : 0;
    $emergency_service = isset($_POST['emergency_service']) ? 1 : 0;

    // Handle file upload
    $profile_image_update = '';
    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['profile_image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(in_array(strtolower($filetype), $allowed)) {
            $new_filename = uniqid() . '.' . $filetype;
            $upload_path = '../uploads/' . $new_filename;
            
            if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_path)) {
                // Delete old image if exists
                if(!empty($_POST['old_image'])) {
                    @unlink('../uploads/' . $_POST['old_image']);
                }
                $profile_image_update = ", profile_image = '$new_filename'";
            }
        }
    }

    // Prepare specific fields based on provider type
    $additional_fields = '';
    switch($provider_type) {
        case 'plumber':
            $specialization = mysqli_real_escape_string($con, $_POST['specialization'] ?? '');
            $additional_fields = ", specialization = '$specialization'";
            break;
        case 'electrician':
            $certification = mysqli_real_escape_string($con, $_POST['certification'] ?? '');
            $additional_fields = ", certification = '$certification'";
            break;
        case 'painter':
            $painting_type = mysqli_real_escape_string($con, $_POST['painting_type'] ?? '');
            $additional_fields = ", painting_type = '$painting_type'";
            break;
        case 'tv_technician':
            $brands = mysqli_real_escape_string($con, $_POST['brands'] ?? '');
            $additional_fields = ", brands_serviced = '$brands'";
            break;
        case 'mechanic':
            $vehicle_types = mysqli_real_escape_string($con, $_POST['vehicle_types'] ?? '');
            $additional_fields = ", vehicle_types = '$vehicle_types'";
            break;
        case 'packer_mover':
            $vehicle_type = mysqli_real_escape_string($con, $_POST['vehicle_type'] ?? '');
            $additional_fields = ", vehicle_type = '$vehicle_type'";
            break;
        case 'locksmith':
            $service_types = mysqli_real_escape_string($con, $_POST['service_types'] ?? '');
            $additional_fields = ", service_types = '$service_types'";
            break;
        case 'battery_service':
            $battery_types = mysqli_real_escape_string($con, $_POST['battery_types'] ?? '');
            $additional_fields = ", battery_types = '$battery_types'";
            break;
    }

    // Update database
    $table = $provider_type . 's';
    $price_field = $provider_type === 'packer_mover' ? 'price_per_day' : 
                   ($provider_type === 'mechanic' ? 'price_per_hour' : 'price_per_service');
    
    $query = "UPDATE $table SET 
              name = '$name', 
              email = '$email', 
              contact_number = '$contact_number', 
              location = '$location', 
              work_experience = '$work_experience', 
              $price_field = '$price', 
              availability = '$availability', 
              emergency_service = '$emergency_service'
              $profile_image_update
              $additional_fields
              WHERE id = '$provider_id'";

    if(mysqli_query($con, $query)) {
        $_SESSION['message'] = "Service provider updated successfully";
        $_SESSION['message_type'] = "success";
        header('Location: service_providers.php');
        exit();
    } else {
        $_SESSION['message'] = "Error updating service provider: " . mysqli_error($con);
        $_SESSION['message_type'] = "danger";
    }
}

// Get provider details
$table = $provider_type . 's';
$query = "SELECT * FROM $table WHERE id = '$provider_id'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 0) {
    $_SESSION['message'] = "Provider not found";
    $_SESSION['message_type'] = "danger";
    header('Location: service_providers.php');
    exit();
}

$provider = mysqli_fetch_assoc($result);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Service Provider</h1>

    <!-- Alert Messages -->
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <!-- Basic Information -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required 
                               value="<?= htmlspecialchars($provider['name']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required 
                               value="<?= htmlspecialchars($provider['email']) ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" required 
                               value="<?= htmlspecialchars($provider['contact_number']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" required 
                               value="<?= htmlspecialchars($provider['location']) ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Work Experience (Years)</label>
                        <input type="number" name="work_experience" class="form-control" required 
                               value="<?= htmlspecialchars($provider['work_experience']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" required 
                               value="<?= htmlspecialchars($provider[$price_field]) ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="availability" class="form-check-input" id="availability" 
                                   <?= $provider['availability'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="availability">Available for Service</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="emergency_service" class="form-check-input" id="emergency_service" 
                                   <?= $provider['emergency_service'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="emergency_service">Provides Emergency Service</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <?php if(!empty($provider['profile_image'])): ?>
                        <div class="mb-2">
                            <img src="../uploads/<?= $provider['profile_image'] ?>" 
                                 alt="Current Profile Image" 
                                 style="max-width: 200px; height: auto;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                    <input type="hidden" name="old_image" value="<?= $provider['profile_image'] ?? '' ?>">
                </div>

                <!-- Provider Specific Fields -->
                <?php if($provider_type === 'plumber'): ?>
                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <select name="specialization" class="form-select">
                            <option value="General" <?= $provider['specialization'] === 'General' ? 'selected' : '' ?>>General Plumbing</option>
                            <option value="Bathroom" <?= $provider['specialization'] === 'Bathroom' ? 'selected' : '' ?>>Bathroom Specialist</option>
                            <option value="Kitchen" <?= $provider['specialization'] === 'Kitchen' ? 'selected' : '' ?>>Kitchen Specialist</option>
                            <option value="Drainage" <?= $provider['specialization'] === 'Drainage' ? 'selected' : '' ?>>Drainage Expert</option>
                        </select>
                    </div>
                <?php endif; ?>

                <!-- Add other provider-specific fields here -->

                <button type="submit" name="update_provider" class="btn btn-primary">Update Provider</button>
                <a href="service_providers.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?> 