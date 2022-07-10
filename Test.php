<?php
echo $_POST['Division'] . "<br>";

if (isset($_POST['submit'])) {
    echo "submit button is pressed";
}
if (isset($_POST['reset'])) {
    echo "reset button is pressed";
}
if (isset($_POST['newbutton'])) {
    echo "newbutton button is pressed";
}

if (isset($_POST['b1'])) {
    echo "Dhaka button is pressed";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Button test</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        button {
            background-color: red;
            border: 0px solid white;
        }
    </style>

</head>


<body>
    <form action="Test.php" method="post">
        <select name="Division" required>
            <option value="Select">Select </option>
            <button type="submit" name="b1">
                <option value="Dhaka">Dhaka</option>
            </button>
            <option value="Chittagonj">Chittagonj</option>
            <option value="Shylet">Shylet</option>
            <option value="Khulna">Khulna</option>
        </select>


        <input type="submit" name="submit" value="SUBMIT">
        <input type="submit" name="reset" value="RESET">
        <button name="newbutton">
            <div src="Image/dhaka.jpg" style="width: 100px; height:50px"></div>
        </button>
    </form>
    <br>
    <br>
    <a href="https://goo.gl/maps/6SGQfe54RT3ojHx17" target="_">Hasan pharmacy</a>
</body>

</html>