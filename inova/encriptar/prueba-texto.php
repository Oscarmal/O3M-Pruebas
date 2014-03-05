<?php
require('class.encryp-md5.php');
#$encrypter1 = new EncrypMd5;

echo parseFile("texto.php","auto/autogen_new.php");

function parseFile($filename,$newFile=''){
#Parsea un archivo y puede crear uno nuevo con la misma información
	$file = fopen($filename, "r") or exit("No se pudo abrir el archivo: ".$filename);
	while(!feof($file)){
		$content .= utf8_decode(fgets($file));		
	}
	fclose($file);
	if($newFile!=''){
		if(!createFile($newFile,$content)){
			return "Error al crear el archivo: ".$newFile;
		}
		return "Archivo generado: ".$newFile;
	}else{
		return $content;
	}
}

function createFile($fileName,$content){
#Crea un nuevo archivo
	if(file_exists($fileName)){chmod($fileName, 0777);}
	$file = @fopen($fileName, "w")or die("Error al crear archivo");
	fwrite($file, $content);
	fclose($file);
	if(file_exists($fileName)){
		return true;
	}else{
		return false;
	}
}
?>