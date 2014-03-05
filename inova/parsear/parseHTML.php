<?php /*O3M*/
require("template.class.php");
$htmlTpl="textoHTML.tpl";
$html = new Template($htmlTpl);
$html->set("titulo", "Correo enviado con HTML!!!");
$html->set("subtitulo", "Todo OK");
$html->set("contenido", "Contenido bla, bla, bla...");
$html->set("pie", "O3M - ".date("Y"));
$html=$html->output();
echo $html;
/*O3M*/
?>