<?php
/**
* Encripta archivo de codigo fuente
*/
require("o3m.functions.php");
$path="phpmailer_src/class/";
#$path="mail/";
$filename="MailClass.php";
$fileNew="phpmailer_e/class/".$filename;
echo parseFile($path.$filename,1,$fileNew);
?>