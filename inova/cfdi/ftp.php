<?
/*
*			Funciones para Conexión a Servidor FTP vía PHP
*@author	Oscar Maldonado
*/

# CONSTANTES
/*Prueba local*/
define("SERVER","172.20.20.26"); //IP o Nombre del Servidor
define("PORT",21); //Puerto
define("USER","ftp_test"); //Nombre de Usuario
define("PASSWORD","12345"); //Contraseña de acceso
define("PASV",true); //Activa modo pasivo
define("LAGTIME",100000); //Tiempo de espera para ejecutar otro comando

/*Colocar txt
define("SERVER","172.16.1.7"); //IP o Nombre del Servidor
define("PORT",21); //Puerto
define("USER","Ti_Port"); //Nombre de Usuario
define("PASSWORD","prnport13"); //Contraseña de acceso
define("PASV",true); //Activa modo pasivo

/*Resultados PDF y XML*
define("SERVER","172.16.1.23"); //IP o Nombre del Servidor
define("PORT",21); //Puerto
define("USER","EDX"); //Nombre de Usuario
define("PASSWORD","F4cXmL.13#"); //Contraseña de acceso
define("PASV",true); //Activa modo pasivo
/**/
# FUNCIONES
function ConectFTP(){
//Conexión Servidor FTP
$connFTP=ftp_connect(SERVER,PORT); //Obtiene un manejador del Servidor FTP
ftp_login($connFTP,USER,PASSWORD); //Se loguea al Servidor FTP
ftp_pasv($connFTP,PASV); //Establece el modo de conexión
return $connFTP; //Devuelve el manejador a la función
}

function SubirArchivo($LocalFile,$ServerFile){
//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
$connFTP=ConectFTP(); //Obtiene un manejador y se conecta al Servidor FTP
ftp_put($connFTP,$ServerFile,$LocalFile,FTP_BINARY); //Sube archivo al Servidor FTP en modo Binario
ftp_quit($connFTP); //Cierra la conexion FTP
usleep(LAGTIME);
}

function ObtenerRuta(){
//Obriene ruta del directorio del Servidor FTP (Comando PWD)
$connFTP=ConectFTP(); //Obtiene un manejador y se conecta al Servidor FTP
$Directorio=ftp_pwd($connFTP); //Devuelve ruta actual p.e. "/home/willy"
ftp_quit($connFTP); //Cierra la conexion FTP
return $Directorio; //Devuelve la ruta a la función
}

function BorraArchivo($File){
//Elimina un archivo del Servidor FTP
$connFTP=ConectFTP();
$Path=ftp_pwd($connFTP);
ftp_delete($connFTP, $Path.$File);
}

function DownloadFile($ServerFile, $LocalFile){
//Descarga (copia) un archivo a la ruta local
$connFTP=ConectFTP();
ftp_get($connFTP, $LocalFile, $ServerFile, FTP_BINARY);
ftp_quit($connFTP);
usleep(LAGTIME);
}

function OpenFile($ServerFile){
//Abre un archivo
	$connFTP=ConectFTP();
	$Path=ftp_pwd($connFTP);
	$Size=ftp_size($connFTP,$ServerFile);
	ftp_quit($connFTP);
	if($Size>0){
		$File="ftp://".USER.":".PASSWORD."@".SERVER.$Path.$ServerFile;
		return header("location: ".$File);
	}else{return 0;}
}

function ListFiles(){
//Enlista los archivos en la carpeta FTP
	$connFTP=ConectFTP();
	$Files=ftp_nlist($connFTP, ".");
	ftp_quit($connFTP);
	foreach($Files as $File){
		echo $File."<br />";
	}
}

function SearchFile($FileName){
//Revisa si existe un archivo y devuelve su nombre
	$connFTP=ConectFTP();
	$Files=ftp_nlist($connFTP, ".");
	ftp_quit($connFTP);
	foreach($Files as $File){
		$Name=explode('/',$File);
		if($Name[1]==$FileName){return true;}
	}
}
/*
function ReWriteFile($ServerFile, $LocalFile){
	if(SearchFile($ServerFile)){
		$connFTP=ConectFTP();
		$Path=ftp_pwd($connFTP);
		$Handle = fopen($LocalFile, 'rb');
		ftp_fget($connFTP, $Handle, $ServerFile, FTP_BINARY, 1);
		ftp_close($connFTP);
		fclose($Handle);
	}
}
*/
function ReWriteFile($ServerFile){
	if(SearchFile($ServerFile)){
		$connFTP=ConectFTP();
		$Path=ftp_pwd($connFTP);
		$File=$Path.$ServerFile;
		$Handle = fopen($File, 'rb');
		$Content = fread($Handle, filesize($File));		
		fclose($Handle);
		ftp_quit($connFTP);
	}
	return $Content;
}

function MoveFile($FileNameOrigin, $FileNameDestiny){
//Renombra y/o mueve archivo a otra ruta dentro del servidor FTP
	$connFTP=ConectFTP();
	ftp_rename($connFTP, $FileNameOrigin, $FileNameDestiny);
	ftp_quit($connFTP);
	usleep(LAGTIME);
}

function MakeDir($DirName){
//Crea un directorio dentro del servicor FTP
	$connFTP=ConectFTP();
	ftp_mkdir($connFTP, $DirName);
	ftp_quit($connFTP);
	usleep(LAGTIME);
}

function CheckFolder($FolderName){
//Verifica la existencia de un directorio dentro del servicor FTP
	#$connFTP=ConectFTP();
	#$Path=ftp_pwd($connFTP);
	#ftp_quit($connFTP);
	if(is_dir($Folder="ftp://".USER.":".PASSWORD."@".SERVER.$Path.$FolderName)){
	return 1;}else{return 0;}
	
}
?>