// Primero hay que guardar el archivo TXT en formato UTF-8
<?php
import_request_variables("g, P","v_");
function limpiar_acentos($s)
{
$s = ereg_replace("[����]","a",$s);
$s = ereg_replace("[����]","A",$s);
$s = ereg_replace("[���]","I",$s);
$s = ereg_replace("[���]","i",$s);
$s = ereg_replace("[���]","e",$s);
$s = ereg_replace("[���]","E",$s);
$s = ereg_replace("[�����]","o",$s);
$s = ereg_replace("[����]","O",$s);
$s = ereg_replace("[���]","u",$s);
$s = ereg_replace("[���]","U",$s);
$s = str_replace("�","c",$s);
$s = str_replace("�","C",$s);
$s = str_replace("[�]","n",$s);
$s = str_replace("[�]","N",$s);
return $s;
}

$ruta= "D:\Archivos_TXT/";
#$archivotxt ="Aviso2_Sepomex.txt";
$archivotxt =$v_archivo;
$arcsin = explode(".",$archivotxt);
$archivo = file($ruta.$archivotxt);
$lineas = count($archivo);
for($i=0; $i < $lineas; $i++){
	$txt=utf8_decode($archivo[$i]);
	$txt=limpiar_acentos($txt);
	$archivo_nuevo = fopen($ruta.$arcsin[0]."_sin.txt","a"); 
	fputs($archivo_nuevo,utf8_decode($txt));
	echo $txt."<br>";
}
?>