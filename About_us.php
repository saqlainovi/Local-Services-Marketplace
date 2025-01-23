<?php
$page_title = "About Us";
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-white mb-4">Local Services Marketplace</h1>
                <p class="lead text-light mb-4">Connecting communities with trusted service providers. A project developed as part of IDP-2 at Green University of Bangladesh.</p>
                <a href="#about-dev" class="btn btn-light btn-lg">Meet the Developer</a>
            </div>
            <div class="col-lg-6">
                <img src="img/services-hero.jpg" alt="Services Marketplace" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Developer Profile Section -->
<section id="about-dev" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="developer-profile text-center mb-4 mb-lg-0">
                    <img src="img/siyam.jpg" alt="Md. Siyam Saqlain Ovi" class="img-fluid rounded-circle dev-image mb-4 shadow-lg">
                    <div class="social-links mb-3">
                        <a href="https://github.com/yourgithub" class="btn btn-dark mx-2"><i class="fab fa-github"></i></a>
                        <a href="https://linkedin.com/in/yourlinkedin" class="btn btn-primary mx-2"><i class="fab fa-linkedin"></i></a>
                        <a href="mailto:your.email@example.com" class="btn btn-danger mx-2"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="developer-info">
                    <h2 class="mb-4">About the Developer</h2>
                    <div class="dev-details mb-4">
                        <h3 class="h4 text-primary">Md. Siyam Saqlain Ovi</h3>
                        <p class="text-muted mb-3">
                            <i class="fas fa-graduation-cap me-2"></i>BSc in Computer Science and Engineering
                            <br>
                            <i class="fas fa-university me-2"></i>Green University of Bangladesh
                            <br>
                            <i class="fas fa-id-card me-2"></i>Student ID: 212002082
                        </p>
                        <p class="lead">A passionate developer dedicated to creating impactful solutions through technology.</p>
                    </div>
                    <div class="about-text">
                        <p>I am currently pursuing my final year in Computer Science and Engineering at Green University of Bangladesh. This Local Services Marketplace platform represents my IDP-2 project, showcasing my commitment to solving real-world problems through technology.</p>
                        <p>Despite not having the strongest academic background, my dedication to practical learning and problem-solving drives me to create solutions that can make a difference in people's lives.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Features -->
<section class="features py-5">
    <div class="container">
        <h2 class="text-center mb-5">Project Highlights</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">User-Centric Design</h3>
                    <p class="text-muted">Intuitive interface designed for both service providers and customers, ensuring seamless interaction.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Secure Platform</h3>
                    <p class="text-muted">Robust security measures to protect user data and ensure safe transactions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-star fa-3x text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Quality Assurance</h3>
                    <p class="text-muted">Verified service providers and rating system to maintain high service standards.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Used -->
<section class="technologies py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Technologies Used</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-2">
                <div class="tech-card text-center p-3">
                    <i class="fab fa-php fa-3x text-primary mb-3"></i>
                    <h4 class="h6">PHP</h4>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="tech-card text-center p-3">
                    <i class="fab fa-bootstrap fa-3x text-primary mb-3"></i>
                    <h4 class="h6">Bootstrap</h4>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="tech-card text-center p-3">
                    <i class="fab fa-js fa-3x text-primary mb-3"></i>
                    <h4 class="h6">JavaScript</h4>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="tech-card text-center p-3">
                    <i class="fab fa-mysql fa-3x text-primary mb-3"></i>
                    <h4 class="h6">MySQL</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* General Styles */
body {
    color: #333;
}

/* Hero Section */
.about-hero {
    background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
    padding: 100px 0;
    margin-top: -20px;
}

.min-vh-50 {
    min-height: 50vh;
}

/* Developer Profile */
.developer-profile .dev-image {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border: 8px solid white;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
}

.developer-info {
    padding: 2rem;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
}

/* Feature Cards */
.feature-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
    height: 100%;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.icon-wrapper {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(13, 110, 253, 0.1);
    border-radius: 50%;
}

/* Tech Cards */
.tech-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
}

.tech-card:hover {
    transform: translateY(-5px);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.feature-card, .tech-card, .developer-info {
    animation: fadeInUp 0.6s ease forwards;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .about-hero {
        padding: 60px 0;
    }
    
    .developer-profile .dev-image {
        width: 200px;
        height: 200px;
    }
}
</style>

<?php include('includes/footer.php'); ?>