<?php
include('src/inc.copydir.php');
import_request_variables("g,p","v_");
function Raiz($Var='U'){
	if(strtoupper($Var)=='U'){$raiz="http://".$_SERVER['HTTP_HOST'].'/'.basename(getcwd()).'/';}
	if(strtoupper($Var)=='L'){$raiz=$_SERVER['DOCUMENT_ROOT'].'/'.basename(getcwd()).'/';}
	return $raiz;
}
if(!empty($v_id)){AbrirMime($v_id);}
else{
	if(empty($v_origen)){
		echo '<p>Copiar archivo de un directorio local a un directorio en el Servidor Web.</p><form name="f_ruta" method="post" action="'.$_SERVER['PHP_SELF'].'">Copiar de: <input name="origen" id="origen" type="text" value="D:\\Compartida\\"> Pegar en: '.Raiz('u').'<input name="destino" id="destino" type="text" value="repositorio/"><input name="b_ruta" id="b_ruta" type="submit" value="Copiar Archivos"></form>';
		echo '<div id="espere"></div>';
	}else{
		/*Inicia detección y reemplazo de backslash por slash simple*/
		$v_origen.='\\\\';
		for($x=1; $x<=3; $x++){	$origen=str_replace('\\\\','@',$v_origen); $origen=str_replace('@','/',$origen);}
		for($x=1; $x<=3; $x++){
			if(substr($origen,strlen($origen)-$x,1)=='/'){$corta=substr($origen,0,strlen($origen)-$x);}
		}$origen=$corta.'/';
		$v_destino.='\\\\';		
		for($x=1; $x<=3; $x++){	$destino=str_replace('\\\\','@',$v_destino); $destino=str_replace('@','/',$destino);}
		for($x=1; $x<=3; $x++){
			if(substr($destino,strlen($destino)-$x,1)=='/'){$corta=substr($destino,0,strlen($destino)-$x);}
		}$destino=$corta.'/';
		/*Fin de detección de backslash*/		
		echo '<a href="'.Raiz('u').'">[Regresar]</a>';
		LeerCarpeta($origen,$destino); 		
	}
}
?>

