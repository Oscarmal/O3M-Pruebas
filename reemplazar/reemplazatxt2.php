<?php
/*
Autor:			Oscar Maldonado
Creación:		20-12-2011
Descripción:	Reemplaza texto dentro de un archivo, de todos los archivos que esten en la misma carpeta
*/
$directorio="carpeta/";
function LeerCarpeta($ruta){
   if (is_dir($ruta)) {
      if ($dh = opendir($ruta)) {
         while (($file = readdir($dh)) !== false) {
			if(filetype($ruta.$file)!='dir'){            	
				$nombre=$ruta.$file;
				$archivo = file_get_contents($nombre);
				$archivo=addslashes($archivo);
				$archivo_nuevo = str_replace('cambiar_texto', '---> Texto cambiado <---', $archivo);
				$archivo_nuevo=stripcslashes($archivo_nuevo);
				$punt = fopen($nombre,"w");
				fputs($punt,$archivo_nuevo);					
				echo "<br>El archivo: $file ha sido modificado.";		
			}            
         }
      closedir($dh);
      }
   }else
      echo "<br>No es ruta valida $ruta";
} 
echo LeerCarpeta($directorio);  
?>