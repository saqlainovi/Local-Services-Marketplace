<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo and Brand -->
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Logo">
            <h1>Local Service Provider</h1>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Search Form -->
            <form class="search-form mx-lg-auto" action="search.php" method="GET">
                <input type="text" class="form-control" name="query" placeholder="Search services or locations..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                <button type="submit" class="btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Navigation Links -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>

                <!-- Services Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-concierge-bell"></i> Services
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="painter.php"><i class="fas fa-paint-roller"></i> Painters</a></li>
                        <li><a class="dropdown-item" href="electrician.php"><i class="fas fa-bolt"></i> Electricians</a></li>
                        <li><a class="dropdown-item" href="plumber.php"><i class="fas fa-faucet"></i> Plumbers</a></li>
                        <li><a class="dropdown-item" href="tvrepair.php"><i class="fas fa-tv"></i> TV Repair</a></li>
                        <li><a class="dropdown-item" href="car_mechanic.php"><i class="fas fa-car"></i> Car Mechanics</a></li>
                        <li><a class="dropdown-item" href="packers_movers.php"><i class="fas fa-truck-moving"></i> Packers & Movers</a></li>
                        <li><a class="dropdown-item" href="locksmith.php"><i class="fas fa-key"></i> Locksmiths</a></li>
                        <li><a class="dropdown-item" href="battery_service.php"><i class="fas fa-car-battery"></i> Battery Service</a></li>
                    </ul>
                </li>

                <?php if (!isset($_SESSION['authenticated'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>" href="register.php">
                            <i class="fas fa-user-plus"></i> Registration
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['authenticated'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'Dashbord.php' ? 'active' : ''; ?>" href="Dashbord.php">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'About_us.php' ? 'active' : ''; ?>" href="About_us.php">
                        <i class="fas fa-info-circle"></i> About
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
.navbar {
    background-color: #212529 !important;
    padding: 0.5rem 1rem;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 15px;
}

.navbar-brand img {
    height: 90px;
    width: auto;
}

.navbar-brand h1 {
    font-size: 1.5rem;
    margin: 0;
    color: white;
    font-weight: 600;
}

/* Search Form */
.search-form {
    position: relative;
    width: 400px;
}

.search-form .form-control {
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    border-radius: 20px;
    padding-right: 40px;
}

.search-form .form-control::placeholder {
    color: rgba(255,255,255,0.7);
}

.search-form .btn {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: rgba(255,255,255,0.8);
    padding: 5px 10px;
}

/* Navigation */
.navbar .nav-link {
    color: rgba(255,255,255,0.8) !important;
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.navbar .nav-link:hover,
.navbar .nav-link.active {
    color: white !important;
}

/* Dropdown Menu */
.dropdown-menu {
    margin-top: 0.5rem !important;
    background-color: #212529 !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    border-radius: 8px !important;
}

.dropdown-item {
    color: rgba(255,255,255,0.8) !important;
    padding: 0.7rem 1.5rem !important;
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    transition: all 0.3s ease !important;
}

.dropdown-item:hover {
    background: rgba(255,255,255,0.1) !important;
    color: white !important;
    transform: translateX(5px);
}

.dropdown-item i {
    width: 20px;
    text-align: center;
    color: #0d6efd;
}

/* Mobile Responsive */
@media (max-width: 991.98px) {
    .search-form {
        width: 100%;
        margin: 10px 0;
    }
    
    .navbar-collapse {
        background: rgba(33, 37, 41, 0.98);
        padding: 1rem;
        border-radius: 8px;
        margin-top: 10px;
    }

    .dropdown-menu {
        background: rgba(255,255,255,0.05) !important;
        border: none !important;
    }
}
</style>

<!-- Make sure Bootstrap JS is loaded -->
<script>
    // Initialize all dropdowns
    document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = document.querySelectorAll('.dropdown-toggle');
        dropdowns.forEach(function(dropdown) {
            new bootstrap.Dropdown(dropdown);
        });
    });
</script>