<?php
require_once('class.phpmailer/class.phpmailer.php');
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "omaldonado@inovaus.com";
$mail->Password = "Oscar445.";
$mail->SetFrom("omaldonado@gmail.com");
$mail->Subject = "Correo de prueba MailerPHP";
$mail->Body = "El correo ha llegado!";
$mail->AddAddress("omaldonado@inovaus.com");
if(!$mail->Send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message has been sent";
}
?>