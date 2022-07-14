<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



if (isset($error)) {
    // echo "<br><br><br>" . $error;
    if ($error > 0) {
?>
        <script>
            alert("Sorry, Failed to Add Service");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("New Service is Added Successfully!!!");
        </script>
<?php
    }
}


?>


<?php
if (isset($_SESSION['articlePost'])) {
    unset($_SESSION['articlePost']);
?>
    <script>
        alert("Your Article has been posted successfully.");
    </script>
<?php
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- For CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Admin.css">

    <!-- For Font Awesome -->
    <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>

<body>
    <div class="button-section">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft"><i class="fa-solid fa-bars"></i></button>
    </div>

    <div class="circle">
        <div>
            <img src="Image/Logo.png" alt="Logo">
            <h1>Medi Sol</h1>
        </div>
        <div>
            <p>Admin Panel</p>
        </div>

    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
        <div class="offcanvas-header">
            <div>
                <img src="Image/Logo.png" alt="Logo">
                <h3>Medi Sol</h3>
            </div>

            <button type="button" class="btn-close" style="background-color: rgb(162, 203, 255);" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul style="list-style-type:none;" class="nav-menu-items">
                <hr>
                <div class="nav-section">
                    <li><a href="#"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                </div>
                <hr>
                <div class="nav-section">
                    <li><a href="#"><i class="fa-solid fa-plus"></i> Add Admin</a></li>
                    <li><a href="http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=medi_sol&table=services&pos=0"><i class="fa-solid fa-pen-to-square"></i> Modify Services</a></li>
                    <li><a href="http://localhost/project/AdminAddService.php"><i class="fa-solid fa-plus"></i> Add Services</a></li>
                </div>
                <hr>
                <div class="nav-section">
                    <li><a href="http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=medi_sol&table=client&pos=0"><i class="fa-solid fa-check"></i> Check client</a></li>
                    <li><a href="http://localhost/project/Signup_Signin.php"><i class="fa-solid fa-plus"></i> Add client</a></li>
                </div>
                <hr>
                <div class="nav-section">
                    <li><a href="http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=medi_sol&table=articles&pos=0"><i class="fa-solid fa-pen-to-square"></i> Edit Post</a></li>
                    <li><a href="http://localhost/project/AdminAddArticle.php"><i class="fa-solid fa-calendar-plus"></i> Create Post</a></li>
                </div>
            </ul>





        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>