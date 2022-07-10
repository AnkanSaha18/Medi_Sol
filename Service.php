<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loginTime'])) {
    if (time() - $_SESSION['loginTime'] > 3600) {
        unset($_SESSION['username']);
    }
}




?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services</title>

    <!-- For Bootstrap and CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Head.css">
    <link rel="stylesheet" href="CSS/Service.css">
    <!-- For Font Awesome -->
    <link rel="stylesheet" href="FontAwesome/css/all.css">



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
                    <li class="nav-item"><a href="#" class="nav-link" style="margin-left: 20px;">Contact</a></li>
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
    </header>

    <!-- Add your code from right here -->


    <div class="header2">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col search">
                    <div>
                        <form action="Service.php" method="post">
                            <input type="text" placeholder="   Search ..." name="search" required>
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1">
                <div class="col location">
                    <div>
                        <form action="Service.php" method="POST">
                            <select name="division" id="division">
                                <option value="select">Select Division</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chattogram">Chattogram</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="barishal">Barishal</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="khulna">Khulna</option>
                                <option value="rangpur">Rangpur</option>
                                <option value="mymensingh">Mymensingh </option>
                            </select>
                            <select name="district" id="district">
                                <option value="Select">Select District/Area</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chittagonj">Chittagonj</option>
                                <option value="Shylet">Shylet</option>
                                <option value="Khulna">Khulna</option>
                            </select>
                            <button type="submit" name="location" name="location">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['doctor'])) {
        $_SESSION['type'] = 'doctor';
    }
    if (isset($_POST['hospital'])) {
        $_SESSION['type'] = 'hospital';
    }
    if (isset($_POST['ambulance'])) {
        $_SESSION['type'] = 'ambulance';
    }
    if (isset($_POST['pharmacy'])) {
        $_SESSION['type'] = 'pharmacy';
    }
    if (isset($_POST['blood_bank'])) {
        $_SESSION['type'] = 'blood_bank';
    }
    // echo $_SESSION['type']."<br>";

    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['search'];
        // generate search result
        echo $_SESSION['type'] . "  ";
        echo $_SESSION['search'];
    }

    if (isset($_POST['location'])) {
        $_SESSION['district'] = $_POST['district'];
        $_SESSION['division'] = $_POST['division'];
        echo $_SESSION['type'] . "  ";
        echo $_SESSION['division'] . " ";
        echo $_SESSION['district'];
        // generate query according division and district basis
    }
    ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>