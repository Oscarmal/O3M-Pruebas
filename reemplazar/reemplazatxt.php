<?php
/*
Autor:			Oscar Maldonado
Creación:		20-12-2011
Descripción:	Reemplaza texto dentro de un archivo
*/
$nombre='online.php';
$archivo = file_get_contents($nombre);
$archivo=addslashes($archivo);
$archivo_nuevo = str_replace('sdi_control', '\$db1', $archivo);
$archivo_nuevo=stripcslashes($archivo_nuevo);
$punt = fopen($nombre,"w");
fputs($punt,$archivo_nuevo);
echo $punt;  
?>