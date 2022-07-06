<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "medi_sol";

try {
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
} catch (Throwable $th) {
    echo "Failed to connect Database";
    echo $th->getMessage();
    echo "Failed to connect DB";
    include('Error.php');
}

$username = $_POST['username'];
$password = $_POST['password'];
echo $username . "<br>";
echo $password . "<br>";

$query = $conn->prepare("SELECT * FROM client WHERE username = ? AND password = ?;");
$query->bind_param("ss", $username, $password);
$query->execute();
$query_result = $query->get_result();


if ($query_result->num_rows > 0) {
?>
    <script>
        alert("Log In Successful");
    </script>
<?php

    $_SESSION['username']=$username;
    $_SESSION['loginTime']=time();
    // include('LandingPage.php');
    header("Location: http://localhost/Project/LandingPage.php");
    exit();
} else {
?>
    <script>
        alert("Invalid Username / Password");
    </script>
<?php
    header("Location: http://localhost/Project/Error.php");
}



?>