<?php
require('../ftp/ftp.php'); 
require_once('implode-pdf.php');
$e=$in['e'];
$File_path = '';
$File_name=$_GET['f'];
$File=explode('|',$File_name);
$FilesTot=count($File);
for($x=0; $x<$FilesTot; $x++){
	if(substr($File[$x],strlen($File[$x])-4,4)!='.pdf'){$File[$x].='.pdf';}
	$FileTmp=$File_path.$File[$x];
	if(SearchFile($File[$x])){
		DownloadFile($File[$x], $FileTmp);
	}else{echo "ERROR: El documento $File[$x] no existe.";}
}
$FileResult=ImplodePDF($File_path,$File_name,'|','Facturas_CMU060119UI7', '../../src/',true,2);
for($x=0; $x<$FilesTot; $x++){unlink($File_path.$File[$x]);}

if(file_exists($FileResult)){
	$Handle = fopen($FileResult, 'rb');
	$Content = fread($Handle, filesize($FileResult));		
	fclose($Handle);
	if(strtolower(substr($FileResult, -3))=='pdf'){
		header("Content-type: application/pdf");
	}
	#if(!empty($ID_invoices) && $ID_invoices>0){$exit=updateRead($ID_invoices);}	//Actualiza campo viewed
	echo $Content;
	unlink($FileResult);
}else{
	// Intenta recargar hasta 3 veces el documento, en caso de que no se cargue correctamente.
	if($_GET['r']<1){$_GET['r']=1;}else{$_GET['r']++;}
		if($_GET['r']<4){
			echo "<meta content='1;URL=".$PHP_SELF."?f=".$_GET['f']."&r=".$_GET['r']."' http-equiv='REFRESH'></meta>";
			echo "Intentando acceder al documento... ".$File." <br /><a href='".$PHP_SELF."?f=".$_GET['f']."&r=".$_GET['r']."'>[Ver Ahora]</a>";
		}else{echo "ERROR: No se puede acceder al documento.";}
}

/**/
?>