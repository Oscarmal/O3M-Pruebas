<?php /*O3M*/
require_once("class/o3m.functions.php");
eval(d_include('class/MailClass.php'));
require_once("html/createHTML.php");
#echo d_include('MailClass.php'); //Debug
$fromMail = "anonymous@mail.com"; 
$fromName = "Sistema Direksys";
$toMail = "omaldonado@inovaus.com";
$toName = "Oscar";
$subject = "Correo de prueba MailerPHP";
#$body = "El correo ha llegado!"; //solo texto
$body = createHTML("html/direksys.tpl","Se ha detectado un problema en la replicaci&oacute;n MX12-MX11");
$attachment='prueba.txt'; //ruta de archivo
echo sendMail($fromMail,$fromName,$toMail,$toName,$subject,$body,$attachment);
/*O3M*/

?>