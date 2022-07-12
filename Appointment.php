<!-- Some instrustion to use the Head Code( remember: not file)
        1. Copy the Whole code, and Paste in required page
        2. Create new .css file the style the new page
        3. Three style steet for css(bootstrap, head, new page)
        Remember: all the link are not attached here
-->





<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loginTime'])) {
    if (time() - $_SESSION['loginTime'] > 3600) {
        unset($_SESSION['username']);
    }
}


include('Connection.php');
$sql = "SELECT * FROM services WHERE type='Doctor'";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($query)) {
    if (isset($_POST[$row['id']])) {
        // echo "We got";
        $_SESSION['doctorid'] = $row['id'];
        break;
    }
}

// echo "Doctor id is " . $_SESSION['doctorid'];

$sql = "SELECT * FROM services WHERE id = '{$_SESSION['doctorid']}';";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
if($row = mysqli_fetch_assoc($query))
{
    $_SESSION['doctorname']=$row['name'];
}
// echo "Doctor name is " . $_SESSION['doctorname'];


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Appointment</title>

    <!-- For Bootstrap and CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Head.css">
    <link rel="stylesheet" href="CSS/Appointment.css">
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
                    <li class="nav-item"><a href="#" class="nav-link" style="margin-left: 20px;">Articles</a></li>
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


    <div class="container main">
        <u>
            <h1 style="text-align: center;">Doctor Appointment Form</h1>
        </u>

        <!-- <form action="#" method="POST"> -->
        <form action="AppointmentEmail.php" method="POST">

            <div class="container-sm">
                <div class="row row-cols-md-2 row-cols-sm-1 justify-content-center">
                    <div class="col patient">
                        <label for="patient_name">PATIENT:</label><br>
                        <input type="text" name="patient_name" placeholder="Patient Name" required>
                    </div>
                    <div class="col patient">
                        <label for="patient_contact">Contact Number:</label><br>
                        <input type="number" name="patient_contact" placeholder="+880 xxxxxxxxxx" required>
                    </div>
                </div>
            </div>




            <!-- Need to fetch data from database -->
            <h3 style="margin-top: 100px;">Doctor:   <?php echo $_SESSION['doctorname'];?></h3>
            <div class="container-sm">
                <div class="row row-cols-md-2 row-cols-sm-1 justify-content-center">
                    <div class="col data-time">
                        <label for="appointment_date">Appointment Data: </label><br>
                        <input type="date" name="appointment_date" required>
                    </div>
                    <div class="col data-time">
                        <label for="appointment_time">Available Time:</label><br>
                        <input type="time" name="appointment_time" required>
                    </div>
                </div>
            </div>

            <br><br>
            <h4>Symptoms:</h4>
            <input type="text" class="symptoms" name="symptoms" required>


            <h4>Purpose of Appoinment</h4>
            <textarea class="purpose" name="purpose" cols="30" rows="3" placeholder="Describe your problems..." required></textarea>


            <button type="submit" class="btn confirm">Confirm Appointment</button>
        </form>
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