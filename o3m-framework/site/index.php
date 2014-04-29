<?php #session_name('o3m'); session_start(); include_once($_SESSION['header_path']);
include_once('../application/common/php/path.php');
include_once('../application/common/php/header.php');
$_SESSION['header_path']=$Raiz['local'].$cfg['php_header'];

unset($_SESSION['usu_id']);
if($in['er']==1){$Msj="Sesión Cerrada."; 
}elseif($in['er']==2){$Msj="Sin autorización."; $_SESSION['usu_id']=1;
}else{
	$_SESSION['usu_id']=1;
	$sql = "SELECT * FROM tbl_test;";
	$db = new db();
	$Rows = $db->SQLQuery($sql);
	if($Rows){
		foreach($Rows as $Row){
			print_r($Row);
			echo "</br>";
		}
	}

}
echo $Msj.' - '.$_GET[url];
?>
<a href="pag.php">Pagina 2</a><br>
<a href="index.php?er=1">Salir</a>