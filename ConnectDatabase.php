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
        //direct to Failed Page
        include('Error.php');
    }


    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $strt = $conn->prepare("INSERT into client(username, email, phone, password) VALUES(?, ?, ?, ?);");
    $strt->bind_param("ssss", $username, $email, $phone, $password);
    try {
        $strt->execute();
        ?>
        <script>
            alert("You have Signed UP successfully! Please Log in now");
        </script>
        <?pHP
    } catch (Throwable $th) {
        ?>
        <script>
            alert("Failed to register!!! Please try again");
            </script>
        <?pHP
    }
    include('Signup_Signin.php');
    $strt->close();
    $conn->close();
    // header("Location: http://localhost/Project/Signup_Signin.php");
    // exit();
?>
