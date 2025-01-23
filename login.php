<?php 
session_start(); // Make sure session is started before accessing $_SESSION
if (isset($_SESSION["authenticated"])) {

    $_SESSION['status'] = "you are alrady logidin";
    header('Location: dashboard.php');
    exit(0);
}
$page_title = "Register page";
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="py-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<?php
if (isset($_SESSION['status'])) 
{
?>
<div class="alert alert-success">
 <h5><?= $_SESSION['status']; ?></h5>
</div>
<?php
unset($_SESSION['status']);
}
?>

<div class="card shadow">
<div class="card-header">
<h5>login Form</h5>
</div>
<div class="card-body">

<form action="logincode.php" method="POST"> <!-- Add action URL and method -->
<div class="form-group mb-3">
 <label for="">User Name or Email</label>
 <input type="text" name="email" class="form-control" required> <!-- Add required for validation -->
 </div>

<div class="form-group mb-3">
<label for="">Password</label>
 <input type="password" name="password" class="form-control" required> <!-- Changed type to password -->
 </div>

<div class="form-group">
<button type="submit" name="login_now_btn" class="btn btn-primary">login</button>
<a href="password_reset.php" class="float-end">forgate your password</a>
</div>
 </form>
 <hr>
 <h5>
    did u not recive ur verification email?
    <a href="resend-email-verification.php">Resend</a>
 </h5>

</div>
</div>
 </div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?> 

