<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>

<body>
    <div class="container">
        <h1 class="text-center">Send Email</h1>
        <h2 class="text-center">Reminder</h2>


<?php

require 'PHPMailerAutoload.php';
require 'credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Owner');
$mail->addAddress($_POST['email']);     // Add a recipient               // Name is optional
$mail->addReplyTo(EMAIL);


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
$mail->Body    = '<div style="border: 2px solid white;"> This is the HTML message body <b>in bold!</b>';
$mail->AltBody = $_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

