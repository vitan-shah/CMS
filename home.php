<?php
session_start(); 
include('connection.php');
if (!$_SESSION['id']) {
    header('location:../project/login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <title>Index Page</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue" style="background-color: blue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DeliverFast.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../project/admin_side/admin_login.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Book Your Parcel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tracking.php">Track your order</a>
                    </li>
                </ul>
                <ul class="navbar-nav"> 
			<li style="color: white;">Welcome :</li>				
			<li style="color: white;"><?php echo($_SESSION['name']);?></li> 
			<!-- <li class="sigi"><a href="logout.php" style="background:none";>/ Logout</a></li> -->
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item">
                        <a class="nav-link" href="profile.php">View your profile</a>
                    </li>
        </ul>
                <form class="d-flex"  action="login.php">
                    
                    <button class="btn btn-outline-success" type="submit" style="background-color:white;">LogOut</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/parcel.jpg" class="d-block w-100" style="height: 80vh;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome To Deliver Fast</h5>
                    <p>Choose your best delivery</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./images/parcel-1.jpg" class="d-block w-100" style="height: 80vh;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Everything From Door To Door</h5>
                    <p>We Ensure to Get You Best Deal</p>
                </div>
            </div>
            <!-- <div class="carousel-item">
                <img src="./images/carousel_3.jpg" class="d-block w-100" style="height: 99vh;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Heroes -->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">Delivery Service</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">There are many different types of courier services available in the market nowadays.
                 Each type of service is designed and catered for different needs of bussinesses and individuals across the country and subsequently the globe.
                  Courier services are critical in terms security of the package, timing, and the accurate delivery. 
                  Typical types of courier services are broken down according to its duration, types of goods and the mode of transport.
                  </p>
            <!-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div> -->
        </div>
    </div>

    <!-- Heroes -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="./images/parcel.webp" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                    width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Make Your Best Move With Us</h1>
                <p class="lead">DeliverFast  is Wellknown nowadays.We Providing service from your door to door.
                    We Provide you to resonable pricing to pay the charge.We ensure you that your data and postal is safe.
                    We are with you to do your work fast and clean.
                </p>
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Caousel rows -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4" id="about">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./images/aboutus.jpg" alt="">
                <h2 class="fw-normal">About Us</h2>
                
                <p><button class="btn btn-primary" data-bs-target="#about-us" data-bs-toggle="collapse" type="button" aria-expanded="false" aria-controls="about-us">View details »</button></p>
                <div class="collapse" id="about-us">
  <div class="card card-body">
      
    Established in 2022<br>
    Goal To Reaches 1 million Customers to Connect with Us<br>
    Ready For Improvement at any time.<br>
    24-7 Services Available.

  </div>
</div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4" id="contact">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./images/contactus.jpg" alt="">

                <h2 class="fw-normal">Contact Us</h2>
                
                <p><button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#contact_us" aria-expanded="false" aria-controls="contact_us">View details »</button></p>
                <div class="collapse" id="contact_us">
  <div class="card card-body">
      
   Email: deliverfast@outlook.com<br>
   LinkedIn Profile URL: https://www.linkedin.com/hp/<br>
   Contact US:+261 273 50 30

  </div>
</div>
            </div><!-- /.col-lg-4 -->
            <!-- <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="./images/carousel_row_3.jfif" alt="">

                <h2 class="fw-normal">Heading</h2>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                    column.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div> /.col-lg-4 -->
        </div>
    </div> 

    <!-- Footer -->
    <div class="container">
        <footer class="py-5">
            
            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2022 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </div>

</body>

</html>