<?php
$archivo = 'tmp/1.txt';
$fp = fopen($archivo,'r');
$contenido = fread($fp, filesize($archivo));
$lineas = explode("\n", $contenido);
foreach($lineas as $linea)
{
	if(substr($linea,0,4)!='cons'){
    	$campo = explode("|", $linea);
   		for($x=0; $x<=40; $x++){
			echo $campo[$x].' ';
		}
		echo "<br>";
	}
}


?>