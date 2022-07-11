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
                            <select name="district_division" id="division">
                                <option value="select">Select District/Area, Division</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chattogram">Chattogram</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="barishal">Barishal</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="khulna">Khulna</option>
                                <option value="rangpur">Rangpur</option>
                                <option value="mymensingh">Mymensingh </option>

                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "medi_sol") or die("connection failed");

                                $sql = "select * from district ORDER BY division_name, district_name";

                                $query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                $str = "";
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $temp = $row['district_name'] . ", " . $row['division_name'];
                                    $str .= "<option value='{$temp}'>{$temp}</option>";
                                }
                                echo $str;
                                ?>
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


    // database connection
    $conn = mysqli_connect("localhost", "root", "", "medi_sol") or die("connection failed");

    $sql = "SELECT * FROM services WHERE id=1;";

    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['search'];
        // generate search result
        // echo $_SESSION['type'] . "  ";
        // echo $_SESSION['search'];
        $sql = "SELECT * FROM services WHERE name LIKE '%" . $_SESSION['search'] . "%' OR phone LIKE '%" . $_SESSION['search'] . "%'OR email like '%" . $_SESSION['search'] . "%' OR type LIKE '%" . $_SESSION['search'] . "%' OR district_name LIKE '%" . $_SESSION['search'] . "%' OR division_name LIKE '%" . $_SESSION['search'] . "%';";
        // echo $sql;
    }

    if (isset($_POST['location'])) {
        // echo $_SESSION['type'] . "  ";

        $district_division = explode(", ", $_POST['district_division']);
        if (!isset($district_division[1])) {
            $_SESSION['division_name'] = $district_division[0];
            // echo "district not found ";
            // echo $_SESSION['division_name'];

            $sql = "SELECT * FROM services WHERE division_name='" . $_SESSION['division_name'] . "' AND type='" . $_SESSION['type'] . "';";
            // echo $sql;
        } else {
            $_SESSION['district_name'] = $district_division[0];
            $_SESSION['division_name'] = $district_division[1];
            // echo $_SESSION['district_name'];
            // echo $_SESSION['division_name'];
            $sql = "SELECT * FROM services WHERE district_name='" . $_SESSION['district_name'] . "' AND division_name='" . $_SESSION['division_name'] . "' AND type='" . $_SESSION['type'] . "';";
            // echo $sql;
            //separate query
        }
    }
    // echo "<br>1.   " . $sql . "<br>";
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    // while ($row = mysqli_fetch_assoc($query)) {
    //     echo $row['id'] . "<br>";
    // }
    ?>

    <!-- add all service now, which is got from database -->


    <div class="container">
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col cell">
                    <div class="card" style="width: 18rem;">
                        <div><?php echo $row['type']; ?></div>
                        <?php
                        if ($row['type'] == 'Doctor')
                            echo "<img src='Image/doctor.jpg' class='card-img-top' alt='doctor pic'>";
                        else if ($row['type'] == 'Pharmacy')
                            echo "<img src='Image/pharmacy.jpg' class='card-img-top' alt='pharmacy pic'>";
                        else if ($row['type'] == 'Hospital')
                            echo "<img src='Image/hospital.jpg' class='card-img-top' alt='hospital pic'>";
                        else if ($row['type'] == 'Ambulance')
                            echo "<img src='Image/ambulance.jpg' class='card-img-top' alt='ambulance pic'>";
                        else if ($row['type'] == 'Blood_Bank')
                            echo "<img src='Image/blood_bank.jpg' class='card-img-top' alt='blood bank pic'>";

                        ?>
                        <!-- <img src='Image/' class="card-img-top" alt="doctor pic"> -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p><i class="fa-solid fa-location-dot"></i><?php echo $row['division_name']; ?></p>
                            <hr>
                            <p>34/46 No. AC Dhor Road, kalibazer, Narayangonj, Dhaka</p>
                            <h5><i class="fa-solid fa-phone"></i> <?php echo $row['phone']; ?></h5>
                            <h5><i class="fa-solid fa-envelope"></i> <?php echo $row['email']; ?></h5>
                            <br>
                            <a href="<?php echo $row['location']; ?>" target="_" class="btn btn-primary"><i class="fa-solid fa-map-location-dot"></i> Location</a>
                            <?php
                            // Link need to updated letter
                            if ($row['type'] == 'Doctor')
                                echo "<a href='#' class='btn btn-primary'>Appoinment</a>";
                            else if ($row['type'] == 'Pharmacy')
                                echo "<a href='#' class='btn btn-primary'>Order</a>";
                            else if ($row['type'] == 'Hospital')
                                echo "<a href='#' class='btn btn-primary'>Book</a>";
                            else if ($row['type'] == 'Ambulance')
                                echo "<a href='#' class='btn btn-primary'>Book</a>";
                            else if ($row['type'] == 'Blood_Bank')
                                echo "<a href='#' class='btn btn-primary'>Show</a>";
                            ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>