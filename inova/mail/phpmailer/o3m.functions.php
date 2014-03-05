<?php /*O3M*/
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
/**
* Descripcion	Encripta y desencripta (md5) una cadena
* @author		Oscar Maldonado
*				Encrypter::encrypt($texto); | Encrypter::decrypt($texto);
*				Encrypter->encrypt($texto); | Encrypter->decrypt($texto);
*/
class EncrypMd5 { 
	//needle
    private static $Key = "Qwerty12345$."; 
	//Encrypt
    public static function encrypt ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(EncrypMd5::$Key), $input, MCRYPT_MODE_CBC, md5(md5(EncrypMd5::$Key))));
        return $output;
    } 
	//Decrypt
    public static function decrypt ($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(EncrypMd5::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(EncrypMd5::$Key))), "\0");
        return $output;
    } 
}
/*O3M*/
?>