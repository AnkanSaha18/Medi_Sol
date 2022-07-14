<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loginTime'])) {
    if (time() - $_SESSION['loginTime'] > 3600) {
        unset($_SESSION['username']);
    }
}


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $from = "medisol060@gmail.com";
    $to = $_POST['email'];
    $subject = "Service Request: " . $_POST['subject'];
    $body = $_POST['message'];
    $headers = "From: " . $from;


    if (mail($from, $subject, $body, $headers)) {
        // echo "Email successfully sent to $to ...";
        echo '<script>alert("We have got Your response! Please wait for Confirmation email.")</script>';

        $headers = "From: " . $to;
        $subject = "Confirmation mail";
        $body = "Hi $name,\nThank you for taking out the time to reach out to us in this regard, I'd be glad to help you out today. Our team will contact you soon.";

        if (mail($to, $subject, $body, $headers)) {
            // echo "Email Successfully send to client";
            echo '<script>alert("Confiramation email has been send! Please check your inbox.")</script>';
        } else {
            // echo "Sorry to fail confirmation email";
            echo '<script>alert("Sorry to fail sending the confirmation email")</script>';
        }
    } else {
        // echo "Email sending failed...";
        echo '<script>alert("Sorry, fail to receive your response. Please Enter a vaild email.")</script>';
    }
    $_POST = array(); //unsetting variable       
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/LandingPage.css">
    <!-- For Font Awesome -->
    <link rel="stylesheet" href="../FontAwesome/css/all.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light  sticky-top">
            <a href="#" class="navbar-brand">
                <img src="Image/Logo.png" alt="" style="width: 50px; margin-left: 30px; margin-right: 10px;">
                <p style="display: inline; font-weight: bolder; font-size: large;"> Medi Sol</p>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item"><a href="LandingPage.php" class="nav-link" style="margin-left: 20px;">Home</a></li>
                    <li class="nav-item dropdown" style="margin-left: 20px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <form action="Service.php" method="POST" class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(60, 138, 255); color: white;">
                            <a class="dropdown-item" href="#"><button type="submit" name="doctor">Doctor</button></a>
                            <a class="dropdown-item" href="#"><button type="submit" name="hospital">Hospital</button></a>
                            <a class="dropdown-item" href="#"><button type="submit" name="ambulance">Ambulance</button></a>
                            <a class="dropdown-item" href="#"><button type="submit" name="blood_bank">Blood Bank</button></a>
                            <a class="dropdown-item" href="#"><button type="submit" name="pharmacy">Pharmacy</button></a>
                        </form>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link" style="margin-left: 20px;">About</a></li>
                    <li class="nav-item"><a href="Articles.php" class="nav-link" style="margin-left: 20px;">Articals</a></li>

                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="navbar-item"><a href="Signup_Signin.php" class="nav-link" style="margin: 0px 50px;"><u>
                                <!-- Login -->
                                <?php
                                if (isset($_SESSION['username']))
                                    echo $_SESSION['username'];
                                else
                                    echo "Login";
                                ?>
                            </u></a></li>
                </ul>
            </div>
        </nav>




        <!-- Carousel-->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">

            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>


            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-item-item background1">
                        <div class="carousel-content">
                            <h4>Looking For Doctor?</h4>
                            <i>Lorem ipsum dolor sit, amet consectetur adipisicing.</i>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-item background2">
                        <div class="carousel-content">
                            <h4>Where is the Ambulance?</h4>
                            <i>Lorem ipsum dolor sit amet.</i>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-item background3">
                        <div class="carousel-content">
                            <h4>Which Hospital will be best?</h4>
                            <i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut.</i>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-item background4">
                        <div class="carousel-content">
                            <h4>Where is the Pharmacy?</h4>
                            <i>Lorem ipsum dolor sit amet.</i>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-item background5">
                        <div class="carousel-content">
                            <h4>Badly needed Blood for saving life?</h4>
                            <i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</i>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </header>



    <main class="container">
        <div class="row row-cols-3 justify-content-center">
            <div class="col section-header">
                <h5>Browse Services</h5>
                <hr>
            </div>
        </div>
        <form class="row row-cols-lg-3 row-cols-md-2  row-cols-sm-1 justify-content-center" action="Service.php" method="POST">
            <button name="doctor" class="service-button">
                <div class="col">
                    <div class="service">
                        <img src="Image/doctor1.jpg" alt="doctor"><br><br>
                        <h5>Doctor</h5>
                    </div>
                </div>
            </button>
            <button name="hospital" class="service-button">
                <div class="col">
                    <div class="service">
                        <img src="Image/hospital1.jpg" alt="doctor"><br><br>
                        <h5>Hospital</h5>
                    </div>
                </div>
            </button>
            <button name="ambulance" class="service-button">
                <div class="col">
                    <div class="service">
                        <img src="Image/ambulance1.png" alt="doctor"><br><br>
                        <h5>Ambulance</h5>
                    </div>
                </div>
            </button>
            <button name="pharmacy" class="service-button">
                <div class="col">
                    <div class="service">
                        <img src="Image/pharmacy1.jpg" alt="doctor"><br><br>
                        <h5>Pharmacy</h5>
                    </div>
                </div>
            </button>
            <button name="blood_bank" class="service-button">
                <div class="col">
                    <div class="service">
                        <img src="Image/blood_bank1.webp" alt="doctor"><br><br>
                        <h5>Blood Bank</h5>
                    </div>
                </div>
            </button>
        </form>


        <div class="row row-cols-3 justify-content-center">
            <div class="col section-header">
                <h5>Service Area</h5>
                <hr>
            </div>
        </div>

        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 justify-content-center">
            <div class="col service-area">
                <div>
                    <img src="Image/dhaka.jpg" alt="dhaka">
                    <h6>Dhaka</h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/chattogram.jpg" alt="dhaka">
                    <h6>Chattogram</h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/sylhet.jfif" alt="dhaka">
                    <h6>Sylhet</h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/barishal.jpg" alt="dhaka">
                    <h6>Barishal</h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/rajshahi.webp" alt="dhaka">
                    <h6>Rajshahi</h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/khulna.jfif" alt="dhaka">
                    <h6>Khulna</h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/mymensingh.webp" alt="dhaka">
                    <h6>Mymensingh </h6>
                </div>
            </div>
            <div class="col service-area">
                <div>
                    <img src="Image/rangpur.webp" alt="dhaka">
                    <h6>Rangpur</h6>
                </div>
            </div>
        </div>


        <div class="row row-cols-3 justify-content-center">
            <div class="col section-header">
                <h5>How to Use</h5>
                <hr>
            </div>
        </div>

        <div class="row row-cols-lg-3 row-cols-md-1 row-cols-sm-1 justify-content-center">
            <div class="col step">
                <h5>Step 1:</h5><br>
                <img src="Image/create.svg" alt="create"><br><br>
                <h6>Create your Account</h6>
            </div>
            <div class="col step">
                <h5>Step 2:</h5><br>
                <img src="Image/search.svg" alt="create"><br><br>
                <h6>Find Service</h6>
            </div>
            <div class="col step">
                <h5>Step 3:</h5><br>
                <img src="Image/done.svg" alt="create"><br><br>
                <h6>All Done!</h6>
            </div>
        </div>



        <div class="row row-cols-3 justify-content-center">
            <div class="col section-header">
                <h5>Customer Services</h5>
                <hr>
            </div>
        </div>
        <div class="row row-cols-lg-2 row-cols-md-1 row-cols-sm-1 justify-content-center align-items-center">
            <div class="col care justify-content-left">
                <form class="care-form" action="LandingPage.php" method="Post">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="Enter Your Name*" name="name" required><br>
                    <label for="email">Email:</label>
                    <input type="email" placeholder="Your Contact Mail*" name="email" required><br>
                    <label for="suject">Subject:</label>
                    <input type="text" placeholder="Subject of query*" name="subject" required><br>
                    <label for="message">Message:</label>
                    <textarea name="message" placeholder="Please enter you query/suggestions*" cols="20" rows="4" required></textarea><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="col care">
                <img src="Image/care.jpg" alt=" Customer Care">
            </div>
        </div>





    </main>












    <!-- <div style="height: 100vh; background-color: aqua">
        <h1>Body start</h1>
        <br>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi sequi fugiat id non, quos dolor odit
            possimus?
            Iure veniam iusto pariatur. Ut nulla sint dicta odit inventore, qui eum! Libero labore fugiat, officiis amet
            cumque aspernatur vitae neque quia odit rerum. Suscipit placeat ad illo expedita optio laudantium eaque
            ullam.
        </p>
    </div> -->






    <!-- Footer -->
    <footer class="footer">
        <div class="footer-left">
            <img src="Image/Logo.png" alt="" style="width: 70px; margin-left: 30px; margin-right: 20px;"><br>
            <span>
                <p style="font-weight: bolder; font-size: large; margin-left: 10px;"> Medi Sol</p>
            </span><br><br>
            <p>Health is a right, not a privilege. It needs to be enjoyed with equity.</p>
            <div class="socials">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-tumblr"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>


            </div>
        </div>



        <ul class="footer-right">
            <li>
                <h2>Services</h2>
                <hr>
                <ul class="box">
                    <li><a href="#">Doctor</a></li>
                    <li><a href="#">Hospital</a></li>
                    <li><a href="#">Doctor Appoinment</a></li>
                </ul>
            </li>
            <li>
                <h2>Useful Links</h2>
                <hr>
                <ul class="box">
                    <li><a href="#">Blood Bank</a></li>
                    <li><a href="#">Pharmacy</a></li>
                    <li><a href="#">Ambulance</a></li>
                </ul>
            </li>
            <li>
                <h2>About Us</h2>
                <hr>
                <ul class="features">
                    <li><a href="#">Certifications</a></li>
                    <li><a href="#">Privicy Policy</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Customer Services</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </li>
        </ul>

        <div class="footer-bottom">
            <p>All Copy Right resorved by &copy; conceptial 2022</p>
        </div>

    </footer>














    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>