<?php

$conn= mysqli_connect("localhost", "root", "", "medi_sol") or die("connection failed");

$sql = "select * from district ORDER BY division_name, district_name";

$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

$str = "";
while($row=mysqli_fetch_assoc($query))
{
    $temp= $row['district_name'] . ", " . $row['division_name'];
    $str .= "<option value='{$temp}'>{$temp}</option>";
}

echo $str;
?>