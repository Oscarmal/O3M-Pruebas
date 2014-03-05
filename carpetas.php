<?php
#$raiz = $argv[1];
#$carpeta = $argv[2];
#$total = $argv[3];
$total = $argv[1];
$accion = $argv[2];

$raiz = "D:\Cedulas\Carpetas2\\";
$carpeta = "_CURP_Datos_Irregulares"; // Si esta vacio, crea 01, 02, 03, etc...
for($x=1; $x<=$total; $x++){
	if($x<10){$x="0".$x;}
	if($accion=="crear"){
		$dir = $raiz.$x.$carpeta."\\";
		mkdir($dir); //Crea el directorio 
		echo "Directorio $dir creado correctamente.\n";
	}elseif($accion="renombrar"){
		$dir_old = $raiz.$x;
		$dir_new = $raiz.$x.$carpeta;
		rename($dir_old, $dir_new); // Renombra el directorio 01, 02, etc...
		echo "Directorio $dir_old renombrado como: $dir_new correctamente.\n";
	}
}

?>
