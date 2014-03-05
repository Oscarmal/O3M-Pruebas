// Primero hay que guardar el archivo TXT en formato UTF-8
<?php
import_request_variables("g, P","v_");
function limpiar_acentos($s)
{
$s = ereg_replace("[áàâãª]","a",$s);
$s = ereg_replace("[ÁÀÂÃ]","A",$s);
$s = ereg_replace("[ÍÌÎ]","I",$s);
$s = ereg_replace("[íìî]","i",$s);
$s = ereg_replace("[éèê]","e",$s);
$s = ereg_replace("[ÉÈÊ]","E",$s);
$s = ereg_replace("[óòôõº]","o",$s);
$s = ereg_replace("[ÓÒÔÕ]","O",$s);
$s = ereg_replace("[úùû]","u",$s);
$s = ereg_replace("[ÚÙÛ]","U",$s);
$s = str_replace("ç","c",$s);
$s = str_replace("Ç","C",$s);
$s = str_replace("[ñ]","n",$s);
$s = str_replace("[Ñ]","N",$s);
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