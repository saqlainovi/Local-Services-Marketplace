<?php
session_start();
$page_title = "Login form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
         <div class="row justify-content-center"> <!-- Corrected class name here -->
            <div class="col-md-6">

                 <?php 
                    if (isset($_SESSION['status'])) {
                        ?>
                        <div class="alert alert_success">
                            <h5><?=$_SESSION['status'];?></h5>                            
                        </div>
                        <?php
                        unset($_SESSION['status']); 
                    }
                                     
                    ?>

                <div class="card">
                    <div class="card-header">
                        <h5>Resend email verification</h5>
                    </div>
                    <div class="card-body">
                        <form action="resend-code.php" method="POST">
                            <div class="form-group mb-3">
                                <label >Email address</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter email address">

                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="resent_email_verify_btn" class="btn btn-primary">submit</button>

                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<?php include('includes/footer.php'); ?>