<?php 
session_start();
$page_title = "Register page";
include('includes/header.php');
include('includes/navbar.php');
require 'helpers/mail_helper.php';
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert">
                <?php 
                    if (isset($_SESSION['status'])) {
                        ?>
                        <div class="alert alert-success">
                            <h5><?=$_SESSION['status'];?></h5>                            
                        </div>
                        <?php
                        unset($_SESSION['status']); 
                    }
                ?>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>    
                    <div class="card-body">
                        <form action="code.php" method="POST" id="registrationForm">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" 
                                       pattern="^01[3-9][0-9]{8}$" 
                                       title="Phone number must be 11 digits starting with 013/014/015/016/017/018/019" 
                                       required>
                                <div id="phoneError" class="text-danger small"></div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                <div id="emailError" class="text-danger small"></div>
                            </div>

                            
                            <div class="form-group mb-3">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" 
           pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
           title="Password must be at least 8 characters long and contain at least one letter and one number"
           required>
    <div id="passwordError" class="text-danger small"></div>
</div>
                            <!-- <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div> -->
                            
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    let isValid = true;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');

    // Reset error messages
    phoneError.textContent = '';
    emailError.textContent = '';

    // Phone number validation
    if (phone) {
        // Check if it's exactly 11 digits
        if (phone.length !== 11) {
            phoneError.textContent = 'Phone number must be exactly 11 digits';
            isValid = false;
        }
        // Check if it starts with valid prefix
        else if (!phone.match(/^01[3-9]/)) {
            phoneError.textContent = 'Phone number must start with 013/014/015/016/017/018/019';
            isValid = false;
        }
        // Check if all digits are same
        else if (/^(\d)\1+$/.test(phone)) {
            phoneError.textContent = 'All digits cannot be the same';
            isValid = false;
        }
        // Check for non-digits
        else if (!/^\d+$/.test(phone)) {
            phoneError.textContent = 'Only numbers are allowed';
            isValid = false;
        }
    }

    // Email validation
    if (email) {
        // Check for valid email domains
        const validDomains = ['gmail.com', 'yahoo.com', 'outlook.com'];
        const domain = email.split('@')[1];
        
        if (!email.includes('@')) {
            emailError.textContent = 'Email must contain @';
            isValid = false;
        }
        else if (!validDomains.includes(domain)) {
            emailError.textContent = 'Only gmail.com, yahoo.com, and outlook.com domains are allowed';
            isValid = false;
        }
    }

    if (!isValid) {
        e.preventDefault();
    }
});

// Real-time phone number validation
document.getElementById('phone').addEventListener('input', function(e) {
    let value = e.target.value;
    
    // Remove any non-digit characters
    value = value.replace(/\D/g, '');
    
    // Limit to 11 digits
    if (value.length > 11) {
        value = value.slice(0, 11);
    }
    
    e.target.value = value;
});
</script>

<style>
.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.text-danger {
    margin-top: 5px;
    font-size: 0.875rem;
}

.card {
    border: none;
    border-radius: 10px;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.btn-primary {
    padding: 10px 20px;
    font-weight: 500;
}

label {
    font-weight: 500;
    margin-bottom: 5px;
}
</style>

<?php include('includes/footer.php'); ?>