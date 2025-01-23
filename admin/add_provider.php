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

// Handle form submission
if(isset($_POST['add_provider'])) {
    $provider_type = mysqli_real_escape_string($con, $_POST['provider_type']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $work_experience = mysqli_real_escape_string($con, $_POST['work_experience']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $availability = isset($_POST['availability']) ? 1 : 0;
    $emergency_service = isset($_POST['emergency_service']) ? 1 : 0;

    // Handle file upload
    $profile_image = '';
    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['profile_image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(in_array(strtolower($filetype), $allowed)) {
            $new_filename = uniqid() . '.' . $filetype;
            $upload_path = '../uploads/' . $new_filename;
            
            if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_path)) {
                $profile_image = $new_filename;
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

    // Insert into database
    $table = $provider_type . 's';
    $price_field = $provider_type === 'packer_mover' ? 'price_per_day' : 
                   ($provider_type === 'mechanic' ? 'price_per_hour' : 'price_per_service');
    
    $query = "INSERT INTO $table (name, email, contact_number, location, work_experience, 
              $price_field, availability, emergency_service, profile_image $additional_fields) 
              VALUES ('$name', '$email', '$contact_number', '$location', '$work_experience', 
              '$price', '$availability', '$emergency_service', '$profile_image')";

    if(mysqli_query($con, $query)) {
        $_SESSION['message'] = "Service provider added successfully";
        $_SESSION['message_type'] = "success";
        header('Location: service_providers.php');
        exit();
    } else {
        $_SESSION['message'] = "Error adding service provider: " . mysqli_error($con);
        $_SESSION['message_type'] = "danger";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Service Provider</h1>

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
            <form method="POST" enctype="multipart/form-data" id="providerForm">
                <!-- Basic Information -->
                <div class="mb-3">
                    <label class="form-label">Provider Type</label>
                    <select name="provider_type" class="form-select" required onchange="showSpecificFields(this.value)">
                        <option value="">Select Provider Type</option>
                        <option value="plumber">Plumber</option>
                        <option value="electrician">Electrician</option>
                        <option value="painter">Painter</option>
                        <option value="tv_technician">TV Technician</option>
                        <option value="mechanic">Mechanic</option>
                        <option value="packer_mover">Packer & Mover</option>
                        <option value="locksmith">Locksmith</option>
                        <option value="battery_service">Battery Service</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Work Experience (Years)</label>
                        <input type="number" name="work_experience" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="availability" class="form-check-input" id="availability" checked>
                            <label class="form-check-label" for="availability">Available for Service</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="emergency_service" class="form-check-input" id="emergency_service">
                            <label class="form-check-label" for="emergency_service">Provides Emergency Service</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                </div>

                <!-- Provider Specific Fields (Initially Hidden) -->
                <div id="specificFields" style="display: none;">
                    <!-- Plumber Fields -->
                    <div class="provider-fields" id="plumber-fields">
                        <div class="mb-3">
                            <label class="form-label">Specialization</label>
                            <select name="specialization" class="form-select">
                                <option value="General">General Plumbing</option>
                                <option value="Bathroom">Bathroom Specialist</option>
                                <option value="Kitchen">Kitchen Specialist</option>
                                <option value="Drainage">Drainage Expert</option>
                            </select>
                        </div>
                    </div>

                    <!-- Electrician Fields -->
                    <div class="provider-fields" id="electrician-fields">
                        <div class="mb-3">
                            <label class="form-label">Certification</label>
                            <input type="text" name="certification" class="form-control">
                        </div>
                    </div>

                    <!-- Add other provider-specific fields here -->
                </div>

                <button type="submit" name="add_provider" class="btn btn-primary">Add Provider</button>
                <a href="service_providers.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
function showSpecificFields(providerType) {
    // Hide all provider-specific fields
    document.querySelectorAll('.provider-fields').forEach(field => {
        field.style.display = 'none';
    });

    // Show specific fields based on provider type
    if(providerType) {
        const specificFields = document.getElementById(providerType + '-fields');
        if(specificFields) {
            document.getElementById('specificFields').style.display = 'block';
            specificFields.style.display = 'block';
        }
    }
}
</script>

<?php include('includes/footer.php'); ?> 