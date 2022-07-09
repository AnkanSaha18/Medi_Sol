<!-- Some instruction to use this file
        set the variable before include this file
        set $to, $subject, $body
        the include this file , mail will be automatically sent
-->


<?php
$from= "medisol060@gmail.com";
$to;
$subject;
$body;
$headers = "From: ".$from;

if (mail($to, $subject, $body, $headers)) {
    echo '<script>alert("Email has been sent successfully")</script>';
} else {
    echo '<script>alert("Failed to send email")</script>';
}


?>