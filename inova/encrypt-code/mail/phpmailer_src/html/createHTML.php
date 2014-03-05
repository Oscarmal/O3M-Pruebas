<?php /*O3M*/
function createHTML(){
	require("class/template.class.php");
	$htmlTpl="html/textoHTML.tpl";
	$html = new Template($htmlTpl);
	$html->set("titulo", "Correo enviado con HTML!!!");
	$html->set("subtitulo", "Todo OK");
	$html->set("contenido", "Contenido bla, bla, bla...");
	$html->set("pie", "O3M - ".date("Y"));
	$html=$html->output();
	return $html;
}
/*O3M*/
?>