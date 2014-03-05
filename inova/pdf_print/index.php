<?php
/**
**	Descripcion: Implosiona varios documentos PDF en uno solo.
** @author: Oscar Maldonado
** Requiere: Clase FPDF y clase FPDI con FPDF_TPL
*/

require_once('../../src/fpdf/fpdf.php');
require_once('../../src/fpdi/fpdi.php');
class concat_pdf extends FPDI {  
      
	var $files = array();  

	function setFiles($files) {  
		$this->files = $files;  
	}  

	function concat() {  
		foreach($this->files AS $file) {  
			$pagecount = $this->setSourceFile($file);  
			for ($i = 1; $i <= $pagecount; $i++) {                    
				$tplidx = $this->ImportPage($i);  
				 $s = $this->getTemplatesize($tplidx);  
				 $this->AddPage('P', array($s['w'], $s['h']));  
				 $this->useTemplate($tplidx);  
			}  
		}  
	}  
} 

###Inicio de datos - No es parte de la funcion para implode, solo busca y copia los pdf individuales
require('../ftp/ftp.php'); 
$e=$in['e'];
$File_path = '';
$File_name=$_GET['f'];
$ID_invoices=$_GET['id'];
$Files=explode('|',$File_name);
$FilesTot=count($Files);
for($x=0; $x<$FilesTot; $x++){
	$FilePath=$File_path.$Files[$x];
	if(SearchFile($Files[$x])){
		DownloadFile($Files[$x], $FilePath);
	}
}
### Fin de datos

## Ejecución de la clase Implore PDF
$pdf = new concat_pdf();   
$pdf->setFiles($Files);  // Se envia la ruta de cada archivo pdf en un array()
$pdf->concat();  // Ejecuta la implosion de PDF's 
$Mark = date('Ymd-His');
$pdf->Output("Resultado_".$Mark.".pdf", 'F');  // Crea el archivo final con todos las hojas

/**/
?>