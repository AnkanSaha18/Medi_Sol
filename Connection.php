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
?>