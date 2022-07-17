<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loginTime'])) {
    if (time() - $_SESSION['loginTime'] > 3600) {
        unset($_SESSION['username']);
    }
}

$from = "medisol060@gmail.com";
$to;
$subject = "Appointment Request";
$body = "";
$headers = "From: " . $from;

include('Connection.php');

// echo $_SESSION['doctorid']."<br>";
$sql = "SELECT * FROM services WHERE id = {$_SESSION['doctorid']};";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
if ($row = mysqli_fetch_assoc($query)) {
    $_SESSION['doctorname'] = $row['name'];
    // echo $row['email']."<br>";
    $to=$row['email'];
}
// echo "Doctor name is " . $_SESSION['doctorname']."<br>";

// echo $_POST['patient_name']."<br>";
// echo $_POST['patient_contact']."<br>";
// echo $_POST['appointment_date']."<br>";
// echo $_POST['appointment_time']."<br>";
// echo $_POST['symptoms']."<br>";
// echo $_POST['purpose']."<br>";

$body .= "Hello " . $_SESSION['doctorname'] . ",\n";
$body .= "We have an appointment request for you. Details in below.\n\n";
$body .= "Patient name: ". $_POST['patient_name'] . "\n";
$body .= "Contact Number: ". $_POST['patient_contact'] . "\n";
$body .= "Requested Date: ". $_POST['appointment_date'] . "\n";
$body .= "Requested Time: ". $_POST['appointment_time'] . "\n";
$body .= "Disease Symptoms: ". $_POST['symptoms'] . "\n";
$body .= "Details: ". $_POST['purpose'] . "\n";
$body .= "Please confirm the appointment through system procedure.";


// echo $body;
//Email Send;
if (mail($to, $subject, $body, $headers)) {
    echo '<script>alert("Appoinment request has been sent successfully. Doctor will confirm you Appointment.")</script>';
} else {
    echo '<script>alert("Failed to send Appoinment Request")</script>';
}








//Generating PDF
ob_start();
require('PDF/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial',"B", 25);

//add data now
$pdf->Cell(190,40,"Medi_Sol", 0, 1, 'C');

$pdf->Line(10, 45, 200, 45);
$pdf->SetFont('Arial','i', 12);

$pdf->Cell(50,10,"Doctor ID:", 0, 0);
$pdf->Cell(90,10, $_SESSION['doctorid'], 0, 1);

$pdf->Cell(50,10,"Doctor Name:", 0, 0);
$pdf->Cell(90,10, $_SESSION['doctorname'], 0, 1);


$pdf->Cell(50,10,"Patient:", 0, 0);
$pdf->Cell(90,10, $_POST['patient_name'], 0, 1);

$pdf->Cell(50,10,"Contact Number:", 0, 0);
$pdf->Cell(90,10, $_POST['patient_contact'], 0, 1);

$pdf->Cell(50,10,"Appoinment Date:", 0, 0);
$pdf->Cell(90,10, $_POST['appointment_date'], 0, 1);

$pdf->Cell(50,10,"Appoinment Time:", 0, 0);
$pdf->Cell(90,10, $_POST['appointment_time'], 0, 1);


$pdf->Cell(90,10, "", 0, 1);
$pdf->Line(10, 120, 200, 120);

$pdf->Cell(50,10,"Symptoms:", 0, 0);
$pdf->Cell(90,10, $_POST['symptoms'], 0, 1);

$pdf->SetFont('Arial', 'u', 12);
$pdf->Cell(50,10, "Problem Description:", 0, 1);
$pdf->SetFont('Arial', 'i', 12);
$pdf->Cell(90,10, $_POST['purpose'], 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190,100, "Your Appoinment Request has been sent. Please Store this PDf For farther need.", 0, 1, 'C');


$pdf->Output();
ob_end_flush(); 






// include('LandingPage.php');
// header('Location: http://localhost/Project/LandingPage.php');
// exit;

?>