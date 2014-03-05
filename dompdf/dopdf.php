<?php 
extract($_GET, EXTR_PREFIX_ALL, "v");
extract($_POST, EXTR_PREFIX_ALL, "v"); 
if($v_i && $v_url!=''){
    require_once("dompdf-0.5.1/dompdf_config.inc.php"); 
    $html = file_get_contents($v_url);
    $dompdf = new DOMPDF();
    // $dompdf->set_base_path(realpath(APPLICATION_PATH . '/'));
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream("NewPDF.pdf", array("Attachment" => 0));
    
}else{echo "Error al generar PDF";}
?>