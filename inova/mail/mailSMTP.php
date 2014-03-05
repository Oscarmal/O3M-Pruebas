<?php /*O3M*/
require('phpmailer/MailClass.php');
$fromMail = "anonymous@mail.com"; 
$fromName = "Sistema Direksys";
$toMail = "omaldonado@inovaus.com";
$toName = "Oscar";
$subject = "Correo de prueba MailerPHP";
$body = "El correo ha llegado!";
#$body = file_get_contents('contenido.html');
$attachment=''; //ruta de archivo

echo sendMail($fromMail,$fromName,$toMail,$toName,$subject,$body,$attachment);

/*O3M*/
?>