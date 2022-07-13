<?php
echo isset($_POST['submit']) ."  sdfasdf ". isset($_FILES['image'] ). "<br>";

if(isset($_POST['submit']) && isset($_FILES['image']))
{
    echo "button pressed<br>";
    echo "<pre>";
    print_r($_FILES['image']);
    echo "</pre>";
}


$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$tmp_name =   $_FILES['image']['tmp_name'];
$error = $_FILES['image']['error'];

echo $img_name.'<br>';
echo $img_size.'<br>';
echo $tmp_name.'<br>';
echo $error.'<br><br>';

if($error===0)
{
    if ($img_size>250000) {
        $em = "Sorry, your file is too large.<br>";
        echo $em;
        // header("Location: ImageUpload.php?error=$em");
    }
    else
    {
        echo "Fine, not more than 2 mb<br>";
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        echo $img_ex;
        $img_ex_lc = strtolower($img_ex);  
        $allowed_exs = array("jpg", "jpeg", "png");
        
        
        if(in_array($img_ex_lc, $allowed_exs))
        {
            $new_img_name =  uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = '../databaseImage/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            include('Connection.php');

            // Insert into database
            $sql = "Insert into images(image_url) values ('$new_img_name')";
            mysqli_query($conn,$sql);
            header("Location: ImageShow.php");

        }
        else
        {
            $em = "You can't upload files of this type";
        }
    }
}


?>