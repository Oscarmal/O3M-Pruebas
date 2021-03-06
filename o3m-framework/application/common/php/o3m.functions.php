<?php /*O3M*/
/**
* Descripción:	Funciones globales
* Creación:		2014-04-25
* @author		Oscar Maldonado - O3M
*/

##Function
function parseFormSanitizer($g,$p){
#Load form information ($_GET/$_POST) into array $ins[], $cmd[] with sanitizer
#ejem: parse_form($_GET, $_POST);
	global $ins, $cmd;
	if(!empty($g)){
		$tvars = count($g);
		$vnames = array_keys($g);
		$vvalues = array_values($g);
	}elseif(!empty($p)){
		$tvars = count($p);
		$vnames = array_keys($p);
		$vvalues = array_values($p);
	}
	for($i=0;$i<$tvars;$i++){
		if($vnames[$i]=='cmd'){$cmd=$vvalues[$i];}
		$ins[$vnames[$i]]=sanitizerUrl($vvalues[$i]);
	}
}

function parseForm($g,$p){
#Load form information ($_GET/$_POST) into array $in[], $cmd[] without sanitizer
#ejem: parse_form($_GET, $_POST);
	global $in, $cmd;
	if(!empty($g)){
		$tvars = count($g);
		$vnames = array_keys($g);
		$vvalues = array_values($g);
	}elseif(!empty($p)){
		$tvars = count($p);
		$vnames = array_keys($p);
		$vvalues = array_values($p);
	}
	for($i=0;$i<$tvars;$i++){
		if($vnames[$i]=='cmd'){$cmd=$vvalues[$i];}
		$in[$vnames[$i]]=$vvalues[$i];
	}
}

function sanitizerUrl($param) {
#Sanitizes a url param
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($param)));
	return $clean;
}

function fechaHoy(){
	$dia=date("l");
	if ($dia=="Monday") $dia="Lunes";
	if ($dia=="Tuesday") $dia="Martes";
	if ($dia=="Wednesday") $dia="Miercoles";
	if ($dia=="Thursday") $dia="Jueves";
	if ($dia=="Friday") $dia="Viernes";
	if ($dia=="Saturday") $dia="Sabado";
	if ($dia=="Sunday") $dia="Domingo";
	$dia2=date("d");
	$mes=date("F");
	if ($mes=="January") $mes="Enero";
	if ($mes=="February") $mes="Febrero";
	if ($mes=="March") $mes="Marzo";
	if ($mes=="April") $mes="Abril";
	if ($mes=="May") $mes="Mayo";
	if ($mes=="June") $mes="Junio";
	if ($mes=="July") $mes="Julio";
	if ($mes=="August") $mes="Agosto";
	if ($mes=="September")$mes="Septiembre";
	if ($mes=="October") $mes="Octubre";
	if ($mes=="November") $mes="Noviembre";
	if ($mes=="December") $mes="Diciembre";
	$anio=date("Y");
	return "$dia $dia2 de $mes del $anio";
}

function limpiarTmp($dir, $extension, $segundos){
    $t=time();
    $h=opendir($dir);
    while($file=readdir($h)){
        if(substr($file,-4)=='.'.$extension){
            $path=$dir.$file;
            if($t-filemtime($path)>$segundos)
                @unlink($path);
        }
    }
    closedir($h);
}

function zipFile($File='', $Path='', $Delete=false){
##Compress in Zip file in the same directory
	chdir($Path);
	$f = explode('.',$File);
	for($i=0; $i<count($f)-1; $i++){
		$zipFile .= $f[$i];
	}
	$zipFile .= '.zip';
	$Zip = new ZipArchive;
	$Zip->open($zipFile, ZipArchive::CREATE);	
	$Zip->addFile($File);
	$Zip->close();
	if($Delete){
		unlink($File);
	}
	return $zipFile;
}

function ceros($num=0, $digitos=1){
	if(strlen($num)<$digitos){
	    for($i=1; $i<=$digitos-strlen($num); $i++){
	        $cero .= '0';
	    }
	    $num = $cero.$num;
	}
    return $num;
}

function LogTxt($nom, $u, $n, $g, $ub, $r){
# Función para crear archivo log .txt con movimientos dentro del sistema
# acceso(nombre_archivo, usuario ID, usuario_nombre, usuario, nivel, ruta)
$fec = date("Y_m_d");
if($_SERVER["HTTP_X_FORWARDED_FOR"])
{
	if($pos=strpos($_SERVER["HTTP_X_FORWARDED_FOR"]," "))
	{
		$ip_loc = substr($_SERVER["HTTP_X_FORWARDED_FOR"],0,$pos);
		$ip_pub = substr($_SERVER["HTTP_X_FORWARDED_FOR"],$pos+1);
	}else{$ip_pub=$_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	if($_SERVER["REMOTE_ADDR"])
		$proxy = $_SERVER["REMOTE_ADDR"];
}else{$ip_pub=$_SERVER["REMOTE_ADDR"];
}
$s = "|";	//separador
$page_ant = $_SERVER['HTTP_REFERER'];
$page = $_SERVER['PHP_SELF'];  
#$hostname=gethostbyaddr($ip_pub);
if($ip_pub!=$hostname){	$host = $hostname; }
$f = date("d-m-Y H:i:s");
$nav = $_SERVER['HTTP_USER_AGENT'];
$archivo = $r."log/".$nom."_".$fec.".txt";
$fp = fopen($archivo, "a+");
# FECHA | USUARIO | NOMBRE | GRUPO | UBICACION | IP PUBLICA | IP LOCAL | NOMBRE DE PC | NAVEGADOR | URL ANTERIOR | URL ACTUAL
#$texto = $f."$s".$u."$s".$n."$s".$e."$s".$ub."$s".$ip_pub."$s".$ip_loc."$s".$host."$s".$nav."$s".$page_ant."$s".$page."\r\n";
$texto = $f."$s".$u."$s".$n."$s".$g."$s".$ub."$s".$ip_pub."$s".$ip_loc."$s".$host."$s".$nav."$s".$page_ant."$s".$page."\r\n";
$write = fputs($fp, $texto);
fclose($fp);
return ;
}

function breadcrumbs($home = 'Inicio', $separator = '>') {
## Crea la barra de navegación para el usuario
## @params $home String, $separatos String (puede ser un caracter o la ruta de una imagen)
	global $Raiz;
	$home=(!$Raiz['sitefolder']?ucwords($home):ucwords($Raiz['sitefolder']));
	#$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$rootPath = explode($Raiz['sitefolder'].'/', $_SERVER['REQUEST_URI']);
	$path = array_filter(explode('/', $rootPath[1]));
	$base = $Raiz['url'];
	$breadcrumbs = array(':: <a rel="nofollow" href="'. $base .'">'. $home .'</a>');	
	$last = end(array_keys($path));	 
	foreach ($path as $x => $crumb) {
		$base.=$crumb.'/';
		$title = ucwords(str_replace(array('.php', '_', '-'), array('', ' ', ' '), $crumb));	 
		if ($x != $last) {
			$breadcrumbs[] = '<a rel="nofollow" href="'. $base .'">'. $title .'</a>';
		} else {
			$breadcrumbs[] = $title;
		}
	}
	if(strlen($separator)>3){
		$separator="&nbsp;<img src='$separator' border='0' align='middle'>&nbsp;";
	}
	return implode($separator, $breadcrumbs);
}

function plantillaRtf($Plantilla,$Ruta,$NuevoDoc,$Variables,$CharAbre,$CharCierra,$Valores){
	$NuevoDoc=$Ruta.$NuevoDoc;
	$txtplantilla=file_get_contents($Plantilla);
	$matriz=explode("sectd",$txtplantilla);
	$cabecera=$matriz[0]."sectd";
	$inicio=strlen($cabecera);
	$final=strrpos($txtplantilla,"}");
	$largo=$final-$inicio;
	$cuerpo=substr($txtplantilla,$inicio,$largo);
	$punt=fopen($NuevoDoc,"wb");
	fputs($punt,$cabecera);
	$Registros = count($Valores);
	for($i=1; $i<=$Registros; $i++){			
		$row=$Valores[$i];
		$despues=$cuerpo;
		for($x=0; $x<count($Variables); $x++){$nvariables[$x][0]=$CharAbre.$Variables[$x].$CharCierra;}
		$n=0;
		foreach($nvariables as $dato){
			$datosql=utf8_decode(str_replace('\\','Ñ',utf8_encode(utf8_decode($row[$n]))));
			$datortf=$dato[0];
			$despues=str_replace($datortf,$datosql,$despues);
			$despues=str_replace(strtoupper($datortf),$datosql,$despues);
			$despues=str_replace(strtolower($datortf),$datosql,$despues);
			$n++;
		}
		fputs($punt,$despues);
	}	
	fputs($punt,"}");
	fclose($punt);
	return $NuevoDoc;
}
/*O3M*/
?>