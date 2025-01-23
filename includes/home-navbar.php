<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="bg-transparent position-absolute w-100" style="z-index: 1000;">
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
            <img src="img/logo.png" alt="Logo" style="height: 70px; width: auto; margin-right: 20px;">
            <a class="navbar-brand" href="index.php"><h1>Local Service Provider</h1></a>
            
            <div class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Search" style="height: 40px; width: 300px;">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php">Home</a>
                </li>

                <?php if (!isset($_SESSION['authenticated'])): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Registration</a>
                  </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['authenticated'])): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                      Profile
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="Dashbord.php">Dashboard</a></li>
                      <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                      <li><a class="dropdown-item" href="Orders.php">My Orders</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="review.php">Rating</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <li class="nav-item">
                  <a class="nav-link" href="About_us.php">About Us</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        </div>
    </div>
</div>
</div> 