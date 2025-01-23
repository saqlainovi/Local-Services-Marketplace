<?php 
session_start();
$page_title = "Home page";
include('includes/header.php');
include('includes/navbar.php');
//include("../connection.php");
?>
<!-- Add these before closing body tag if not already present -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<html>
    <head>
        <title>MARKET PLACE | LOCAL BUSINESS|SERVICES</title>
<link rel="stylesheet" href="mystyle.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href=“https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css”/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/smooth-scroll.js"></script>
    </head>
<body>

<style>
/* Hero Slider Styling */
.carousel {
    margin-bottom: 0;
}
.carousel-item {
    height: 50vh;
    background-color: #000;
}
.carousel-item img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    opacity: 0.7;
}
.carousel-caption {
    bottom: 50%;
    transform: translateY(50%);
    text-align: left;
    left: 10%;
    right: 10%;
}
.carousel-caption h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    animation: fadeInUp 1s;
}
.carousel-caption p {
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
    max-width: 600px;
    animation: fadeInUp 1s 0.5s;
}
.carousel-caption .btn {
    padding: 12px 30px;
    font-size: 1.1rem;
    animation: fadeInUp 1s 1s;
}
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
</style>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/pexels-mart-production-7706501.jpg" class="d-block w-100" alt="Professional Services">
            <div class="carousel-caption">
                <h1>Professional Services at Your Doorstep</h1>
                <p>Find trusted professionals for all your home service needs. Quality work guaranteed.</p>
                <a class="btn btn-primary btn-lg" href="#browse">Explore Services</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/pexels-rdne-7363204.jpg" class="d-block w-100" alt="Expert Technicians">
            <div class="carousel-caption">
                <h1>Expert Technicians</h1>
                <p>Our verified professionals bring years of experience and expertise to every job.</p>
                <a class="btn btn-primary btn-lg" href="#topservices">View Top Providers</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/pexels-kindelmedia-8488061.jpg" class="d-block w-100" alt="Home Services">
            <div class="carousel-caption">
                <h1>Quality Home Services</h1>
                <p>From repairs to maintenance, we've got all your home service needs covered.</p>
                <a class="btn btn-primary btn-lg" href="#contact">Contact Us</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Add Font Awesome 5 for better icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-----------------------top services----------------------->
<style>
    #topservices {
        padding: 60px 0;
        background: linear-gradient(to bottom, #f8f9fa, #fff);
    }
    #topservices .container {
        max-width: 1200px;
    }
    #topservices h1 {
        text-align: center;
        color: #2d3436;
        margin-bottom: 50px;
        font-size: 2.2rem;
        font-weight: 600;
        position: relative;
    }
    #topservices h1:after {
        content: '';
        display: block;
        width: 60px;
        height: 3px;
        background: #0984e3;
        margin: 15px auto 0;
        border-radius: 2px;
    }
    .service-category {
        margin-bottom: 40px;
        padding: 25px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.04);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .service-category:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }
    .service-category-title {
        color: #0984e3;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 25px;
        text-decoration: none;
        display: inline-block;
        position: relative;
    }
    .service-category-title:after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background: #0984e3;
        transition: width 0.3s ease;
    }
    .service-category-title:hover:after {
        width: 100%;
    }
    .provider-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .provider-item {
        margin-bottom: 25px;
        padding: 15px;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }
    .provider-item:hover {
        background-color: #f8f9fa;
    }
    .provider-header {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        gap: 10px;
    }
    .provider-number {
        color: #0984e3;
        font-weight: 600;
        font-size: 0.9rem;
        background: rgba(9, 132, 227, 0.1);
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .provider-name {
        font-size: 1.1rem;
        font-weight: 500;
        color: #2d3436;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .provider-name:hover {
        color: #0984e3;
    }
    .provider-rating {
        color: #fdcb6e;
        font-size: 0.9rem;
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .provider-rating i {
        color: #fdcb6e;
    }
    .provider-details {
        padding-left: 34px;
        font-size: 0.95rem;
        color: #636e72;
    }
    .provider-details p {
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .provider-details i {
        color: #0984e3;
        font-size: 0.9rem;
        width: 16px;
        opacity: 0.8;
    }
    .view-details-link {
        color: #0984e3;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        margin-top: 10px;
        margin-left: 34px;
        padding: 6px 12px;
        border-radius: 6px;
        background: rgba(9, 132, 227, 0.1);
        transition: all 0.3s ease;
    }
    .view-details-link:hover {
        background: rgba(9, 132, 227, 0.15);
        transform: translateX(5px);
    }
    .view-details-link i {
        margin-left: 6px;
        font-size: 0.8rem;
    }
</style>
<section id="topservices">
    <div class="container">
        <h1>Top Services</h1>
        <div class="row">
            <?php
            include('includes/db_connect.php');

            $services = [
                'Painter' => 'painters',
                'Electrician' => 'electricians',
                'Plumber' => 'plumbers',
                'Battery Service' => 'battery_services'
            ];

            foreach ($services as $service_type => $table): 
                $query = "SELECT * FROM $table WHERE availability = 1 ORDER BY rating DESC, work_experience DESC LIMIT 2";
                $result = mysqli_query($conn, $query);
            ?>
                <div class="col-md-6">
                    <div class="service-category">
                        <a href="<?= strtolower($service_type) ?>.php" class="service-category-title"><?= $service_type ?></a>
                        <ul class="provider-list">
                            <?php 
                            if($result && mysqli_num_rows($result) > 0):
                                $index = 1;
                                while($provider = mysqli_fetch_assoc($result)): 
                                    $rating = number_format($provider['rating'], 1);
                            ?>
                                <li class="provider-item">
                                    <div class="provider-header">
                                        <span class="provider-number"><?= $index ?></span>
                                        <a href="<?= strtolower($service_type) ?>_info.php?id=<?= $provider['id'] ?>" class="provider-name">
                                            <?= htmlspecialchars($provider['name']) ?>
                                        </a>
                                        <span class="provider-rating">
                                            <?= $rating ?><i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="provider-details">
                                        <p><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($provider['location']) ?></p>
                                        <?php if(isset($provider['price_per_day'])): ?>
                                            <p><i class="fas fa-money-bill-wave"></i> ৳<?= number_format($provider['price_per_day'], 2) ?> per day</p>
                                        <?php elseif(isset($provider['price_per_hour'])): ?>
                                            <p><i class="fas fa-money-bill-wave"></i> ৳<?= number_format($provider['price_per_hour'], 2) ?> per hour</p>
                                        <?php elseif(isset($provider['price_per_service'])): ?>
                                            <p><i class="fas fa-money-bill-wave"></i> ৳<?= number_format($provider['price_per_service'], 2) ?> per service</p>
                                        <?php endif; ?>
                                        <p><i class="fas fa-phone-alt"></i> <?= htmlspecialchars($provider['contact_number']) ?></p>
                                    </div>
                                    <a href="<?= strtolower($service_type) ?>_info.php?id=<?= $provider['id'] ?>" class="view-details-link">
                                        VIEW DETAILS <i class="fas fa-arrow-right"></i>
                                    </a>
                                </li>
                            <?php 
                                $index++;
                                endwhile;
                            endif; 
                            ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!---------------Browse by business------------------------->

  <section id="browse">
    <div class="container">
        <h1>Browse by service</h1>
        <div class="row row1">
            <div class="col-md-3">
                    <div class="single-box">
                        <a href="electrician.php"><div class="icon1">
                             <i class="fa fa-plug"></i>
                        </div>
                                 </a>
                         <h5>Electrician</h5>  
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="single-box">
                       <a href="painter.php"> <div class="icon1">
                                <i class="fa fa-paint-brush"></i>
                        </div> </a>
                         <h5>Painter</h5>  
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="single-box">
                            <a href="plumber.php"> <div class="icon1">
                                <i class="fa fa-shower"></i>
                        </div> </a> 
                        <h5>Plumber</h5>  
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="single-box">
                        <a href="tvrepair.php">  <div class="icon1">
                                <i class="fa fa-tv"></i>
                        </div> </a>
                         <h5>TV Repairing</h5>  
                    </div>
            </div>
            
    </div>

    <div class="row row1">
            <div class="col-md-3">
                    <div class="single-box">
                        <a href="car_mechanic.php">  <div class="icon1">
                                <i class="fa fa-car"></i>
                        </div> </a>
                         <h5>Car Mechanic</h5>  
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="single-box">
                        <a href="packers_movers.php"> <div class="icon1">
                                <i class="fa fa-truck"></i>
                        </div> </a>
                         <h5>Packers & Movers</h5>  
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="single-box">
                        <a href="locksmith.php">  <div class="icon1">
                                <i class="fa fa-unlock-alt"></i>
                        </div> </a>
                        <h5>Lock Smith</h5>  
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="single-box">
                        <a href="battery.php">   <div class="icon1">
                                        <i class="fa fa-battery-quarter"></i>
                        </div> </a>
                         <h5>Battery service</h5>  
                    </div>
            </div>
            
    </div>

</section>
<!-------------ABOUT US------------>








<!-----------------CONTACT US------------------------->


<script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    



    <script>


function myfun()
  {
    var str = "goto";
    var result1 = str.link("painter.html");
    document.getElementById("demo").innerHTML = result1;
  }
                function autocomplete(inp, arr) {
                  /*the autocomplete function takes two arguments,
                  the text field element and an array of possible autocompleted values:*/
                  var currentFocus;
                  /*execute a function when someone writes in the text field:*/
                  inp.addEventListener("input", function(e) {
                      var a, b, i, val = this.value;
                      /*close any already open lists of autocompleted values*/
                      closeAllLists();
                      if (!val) { return false;}
                      currentFocus = -1;
                      /*create a DIV element that will contain the items (values):*/
                      a = document.createElement("DIV");
                      a.setAttribute("id", this.id + "autocomplete-list");
                      a.setAttribute("class", "autocomplete-items");
                      /*append the DIV element as a child of the autocomplete container:*/
                      this.parentNode.appendChild(a);
                      /*for each item in the array...*/
                      for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                          /*create a DIV element for each matching element:*/
                          b = document.createElement("DIV");
                          /*make the matching letters bold:*/
                          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                          b.innerHTML += arr[i].substr(val.length);
                          /*insert a input field that will hold the current array item's value:*/
                          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                          /*execute a function when someone clicks on the item value (DIV element):*/
                          b.addEventListener("click", function(e) {
                              /*insert the value for the autocomplete text field:*/
                              inp.value = this.getElementsByTagName("input")[0].value;
                              /*close the list of autocompleted values,
                              (or any other open lists of autocompleted values:*/
                              closeAllLists();
                          });
                          a.appendChild(b);
                        }
                      }
                  });
                  /*execute a function presses a key on the keyboard:*/
                  inp.addEventListener("keydown", function(e) {
                      var x = document.getElementById(this.id + "autocomplete-list");
                      if (x) x = x.getElementsByTagName("div");
                      if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                        increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                      } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                        decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                      } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                          /*and simulate a click on the "active" item:*/
                          if (x) x[currentFocus].click();
                        }
                      }
                  });
                  function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x) return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                  }
                  function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                      x[i].classList.remove("autocomplete-active");
                    }
                  }
                  function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                    except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                      if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                      }
                    }
                  }
                  /*execute a function when someone clicks in the document:*/
                  document.addEventListener("click", function (e) {
                      closeAllLists(e.target);
                  });
                }
                
                /*An array containing all the country names in the world:*/
                var countries = ["Painter","Carpenter","Pest control","Plumber","Driver","Electrician","Cleaner","House hold cleaner","TV repair","Auto Mechanic","Aoto Battery service","Lock smith","Packers & Movers","Car Mechanic","Zimbabwe"];
                
                /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("myInput"), countries);
                </script>
                




</body>
</html>


<?php include('includes/footer.php'); ?>
