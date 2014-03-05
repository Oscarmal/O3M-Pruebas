<?php 
/* 1 Generar un TXT
$archivo= fopen("tmpfichero.txt", "w+"); 
fwrite($archivo, 'Prueba'); 
fclose($archivo);
echo "Listo";
*/

/* 2 Abrir un TXT 
$enlace = archivo.txt;
header ("Content-Disposition: attachment; filename=".$id);
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace)); 
readfile($enlace); // Lee el contenido de un archivo
*/

/* 3 Genera un TXT */
header ("Content-Disposition: attachment; filename=".'prueba.txt');
header ("Content-Type: application/octet-stream");
echo "prueba";
?>