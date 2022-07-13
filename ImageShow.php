<?php

include('Connection.php');
$sql = "select * from images order by id desc";
$res = mysqli_query($conn, $sql);

while ($images = mysqli_fetch_assoc($res)) {
    // echo $images['image_url'] . "  ";
    $str = "../databaseImage/" . $images['image_url'];
    // echo $str . "  ";
?>

    <img src="<?php echo $str ?>" alt="images" width="500px" height="500px">
    <br><br><br>


<?php
}





?>