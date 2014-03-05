<?php /*O3M*/
function createHTML($tplFile,$content){
	require("class/class.template.php");
	$htmlTpl=$tplFile;
	$html = new Template($htmlTpl);
	$html->set("fecha", date("d-m-Y H:i:s"));
	$html->set("contenido", $content);
	$html->set("pie", "Direksys - ".date("Y"));
	$html=$html->output();
	return $html;
}
/*O3M*/
?>