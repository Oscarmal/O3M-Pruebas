<?php
#$zip = new ZipArchive();
#$filename="D:\AppServ\www\stn.domiciliosobs\dictamen/prueba.zip";
#if($zip->open($filename,ZIPARCHIVE::CREATE)===true){
#	$zip->addFile('gen-rtf.php');
#	$zip->close();
#	echo "Archivo $filename creado con éxito.";
#}else{echo "Error: no se ha podido crear el archivo Zip";}



 //A la función le pasamos como parametro el directorio y el archivo zip  
 function comprimirDirectorio($dir, $zip) {  
    //Primero comprabamos que sea un directorio  
    if (is_dir($dir)){   
       //Por cada elemento dentro del directorio  
       foreach (scandir($dir) as $item) {   
          //Evitamos la carpeta actual y la anterior  
          if ($item == '.' || $item == '..') continue;  
          //Si encuentra una que no sea las anteriores,  
          //vuelve a llamar a la función, con un nuevo directorio  
          comprimirDirectorio($dir . "\\" . $item, $zip);  
		  echo $dir.'\\'.$item."\n";
       }  
    }else{  
       //En el caso de que sea un archivo, lo añade al zip  
       $zip->addFile($dir);  
    }  
}  
 //Creamos el archivo  
 $directorio='D:\AppServ\www\stn.domiciliosobs\captura';
 $zip = new ZipArchive();  
 if ($zip->open("D:\AppServ\www\stn.domiciliosobs\dictamen\prueba.rar", ZIPARCHIVE::CREATE)==TRUE) {  
    //Si lo abre, es porque no existe ningun zip con ese nombre  
    //Llamámos a la función para comprimir 
	#$directorio="D:\AppServ\www\stn.domiciliosobs\captura/"; 
    comprimirDirectorio($directorio, $zip);  
    //Cerramos el archivo  
    $zip -> close;  
 } 

?>