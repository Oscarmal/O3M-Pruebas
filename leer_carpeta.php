<?php
$RAIZ = $_SERVER['DOCUMENT_ROOT']."/";
$directorio="reemplazar/carpeta/";
function LeerCarpeta($ruta){
   if (is_dir($ruta)) {
      if ($dh = opendir($ruta)) {
         while (($file = readdir($dh)) !== false) {
			#if($file!='.' && $file!='..'){
			if(filetype($ruta . $file)!='dir'){
            	echo "<br>Nombre de archivo: <a href=$ruta$file>$file</a> : Es un: " . filetype($ruta . $file)." ";		
			}            
         }
      closedir($dh);
      }
   }else
      echo "<br>No es ruta valida";
} 
echo LeerCarpeta($directorio); 

/*
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) { 
        if (is_dir($file) && $file != "." && $file != "..") { 
            echo "<a href=$file>$file</a> <br>"; 
        } 
    }
closedir($handle); 
} 
*/
/*
foreach($_SERVER as $nombre_campo => $valor){
	$asignacion = "$" . $nombre_campo . "= . $valor . ";
	echo "<br>" . $asignacion;
}
*/
?>

