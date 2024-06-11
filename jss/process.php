<?php
if (isset($_POST['contact'])) 
    {

$errorMSG = "";

// redirect to success page

if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["number"];
    $content = $_POST["message"];

    $toEmail = "vicrrampc@gmail.com";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
    }
}

require_once "contact.php";
}
?>