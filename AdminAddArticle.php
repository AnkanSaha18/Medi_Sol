<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include('Connection.php');

// echo "<br><br>";

// if (isset($_POST['articleTitle'])) {
//     echo $_POST['articleTitle'];
// }
// if (isset($_FILES['articleImage'])) {
//     echo "<pre>";
//     print_r($_FILES['articleImage']);
//     echo "</pre>";
// }
// if (isset($_POST['articleDetails'])) {
//     echo $_POST['articleDetails'];
// }


if (isset($_POST['articleButton']) && isset($_POST['articleTitle']) && isset($_FILES['articleImage']) && isset($_POST['articleDetails'])) {
    $img_name = $_FILES['articleImage']['name'];
    $img_size = $_FILES['articleImage']['size'];
    $tmp_name =   $_FILES['articleImage']['tmp_name'];
    $errorImg = $_FILES['articleImage']['error'];

    // echo $img_name . '<br>';
    // echo $img_size . '<br>';
    // echo $tmp_name . '<br>';
    // echo $errorImg . '<br><br>';

    if ($errorImg === 0) {
        if ($img_size > 250000) {
?>
            <script>
                alert("Sorry, Image size is too large too upload. Please select image size less than 2MB.");
            </script>
            <?php
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            // echo $img_ex;
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");


            if (in_array($img_ex_lc, $allowed_exs)) {
                // here we can post new articles


                $new_img_name =  uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../databaseImage/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                include('Connection.php');

                // Insert into database
                $sql = "INSERT INTO articles(title, description, image_url) values ( '{$_POST['articleTitle']}', '{$_POST['articleDetails']}', '$new_img_name')";
                // echo "<br><br>" . $sql . "<br><br>";
                mysqli_query($conn, $sql);
                unset($_POST);
                unset($_FILES);
                $_SESSION['articlePost']=1;
                header("Location: Admin.php");
                exit();
            ?>
                <script>
                    alert("Your Article has been posted successfully.");
                </script>
            <?php


            } else {
            ?>
                <script>
                    alert("Your can't upload file of this type!");
                </script>
        <?php
            }
        }
    } else {
        ?>
        <script>
            alert("Something went wrong. Please try again!!!");
        </script>
<?php
    }
}



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Articles</title>
    <!-- For CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/AdminAddArticle.css">

    <!-- For Font Awesome -->
    <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>

<body>
    <?php
    include('Admin.php');
    ?>


    <div class="container mt-5">
        <div class="row row-cols-md-2 row-cols-sm-1">
            <div class="col section">
                <img src="Image/addarticles.svg" alt="Add Article"><br>
            </div>
            <div class="col section">
                <form action="AdminAddArticle.php" method="POST" class="text-center" enctype="multipart/form-data">
                    <fieldset>
                        <legend>
                            <p> Create New Post </p>
                        </legend>
                        <div class="form-item">
                            <i class="fa-solid fa-t"></i>
                            <input type="text" name="articleTitle" placeholder="Article Title" required>
                        </div>

                        <div class="form-item">
                            <i class="fa-solid fa-image"></i>
                            <input type="file" name="articleImage" required>
                        </div>
                        <div class="form-item">
                            <i class="fa-solid fa-blog"></i>
                            <textarea name="articleDetails" cols="30" rows="10" placeholder="Describe the Article"></textarea>
                        </div>

                        <div class="form-item">
                            <input type="submit" name="articleButton" value="Create Post">
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>


    </div>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>