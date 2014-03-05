<?php
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
?>