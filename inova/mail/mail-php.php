<?php 
// Envia Correo 

$cuerpo="
<!DOCTYPE html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title></title>
<style type='text/css'>
<!--
body,td,th {
	font-family: sans-serif, Arial, Verdana, helvetica;
	font-size: 12px;
	color: #333333;
}
body {
	background-color: #FFFFFF;
}
.style2 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style></head>
<body>
<table width='700' border='0' cellpadding='0' cellspacing='3'>
  <tr>
    <td height='1'>El correo ha sido enviado con éxito.</td>
  </tr>
</table>
</body>
</html>";
$destinatario = "omaldonado@inovaus.com";
$CC="oscarmaldonado_1@hotmail.com";
$asunto = "Prueba de Correo PHP";
$headers = "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type: text/html; charset=utf-8"."\r\n";
$headers .= "From: Sitema Direksys"."\r\n";
$headers .= "Cc: ".$CC."\r\n";
$headers .= "Reply-To: "."\r\n";
$headers .= "Return-path: "."\r\n";
mail($destinatario,$asunto,$cuerpo,$headers);
//Fin de Envio de correo
?>