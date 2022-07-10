<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "medi_sol";

try {
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
} catch (Throwable $th) {
    echo "Failed to connect Database";
    echo $th->getMessage();
    //direct to Failed Page
    include('Error.php');
}

$error = 0;
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    // echo $type."<br>";
}
if (isset($_POST['type'])) {
    $division = $_POST['division'];
    // echo $division . "<br>";
}
if (isset($_POST['type'])) {
    $district = $_POST['district'];
    $district = strtolower($district);
    // echo $district . "<br>";
}
if (isset($_POST['type'])) {
    $location = $_POST['location'];
    // echo $location . "<br>";
}
if (isset($_POST['type'])) {
    $name = $_POST['name'];
    // echo $name . "<br>";
}
if (isset($_POST['type'])) {
    $phone = $_POST['phone'];
    // echo $phone . "<br>";
}
if (isset($_POST['type'])) {
    $email = $_POST['email'];
    // echo $email . "<br>";
}

$query1 = $conn->prepare("INSERT INTO District VALUES (?, ?);");
$query1->bind_param("ss", $district, $division);
try {
    $query1->execute();
} catch (Throwable $th) {
    // $error = $error + 1;
    // echo "Area already inserted";
}

$query2 = $conn->prepare("INSERT INTO Services(name, phone, email, type, location, district_name, division_name) VALUES (?, ?, ?, ?, ?, ?, ?);");
$query2->bind_param("sssssss", $name, $phone, $email, $type, $location, $district, $division);
try {
    $query2->execute();
    // echo "New Service is Successfully Added";
    // header("Location: http://localhost/Project/Admin.php");
    // exit();
} catch (Throwable $th) {
    $error = 2;
    // echo "Failed to add new Service";
}



$query1->close();
$query2->close();
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Services</title>
    <!-- For CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/AdminAddService.css">

    <!-- For Font Awesome -->
    <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>

<body>
    <?php
    include('Admin.php');
    ?>

    <div class="container-md container">
        <div class="container-img row">
            <img src="Image/addservices.svg" alt="Add Services"><br>
        </div>
        <div class="container-form row">
            <form action="AdminAddService.php" method="POST" class="text-center">
                <fieldset>
                    <legend>
                        <p> Add New Services </p>
                    </legend>

                    <div class="form-item">
                        <i class="fa-solid fa-house-medical"></i>
                        <select name="type" id="type" required>
                            <option class="dropdown-menu" value="Service Type">--Select Service Type--</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Hospital">Hospital</option>
                            <option value="Ambulance">Ambulance</option>
                            <option value="Blood_Bank">Blood_Bank</option>
                            <option value="Pharmacy">Pharmacy</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <i class="fa-solid fa-city"></i>
                        <select name="division" id="division" required>
                            <option class="dropdown-menu" value="Service_Division">--Select Division--</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="sylhet">Sylhet</option>
                            <option value="barisal">Barisal</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="khulna">Khulna</option>
                            <option value="mymensingh">Mymensingh</option>
                            <option value="rangpur">Rangpur</option>
                        </select>
                    </div>






                    <div class="form-item">
                        <i class="fa-solid fa-location-crosshairs"></i>
                        <input type="text" id="district" name="district" placeholder="Area / District" required>
                    </div>
                    <div class="form-item">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <input type="text" id="Location" name="location" placeholder="Location(from map)" required>
                    </div>
                    <div class="form-item">
                        <i class="fa-solid fa-users"></i>
                        <input type="text" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-item">
                        <i class="fa-solid fa-phone"></i>
                        <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-item">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-item">
                        <input type="submit" value="SUBMIT">
                    </div>

                </fieldset>
            </form>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>