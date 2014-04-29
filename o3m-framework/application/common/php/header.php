<?php /*O3M*/
/**
* Descripción:	Establece ambiente de trabajo (el orden es importante)
* @author 		Oscar Maldonado - O3M
*/
$Raiz['local'] = $_SESSION['RaizLoc'];
$Raiz['url'] = $_SESSION['RaizUrl'];
$Raiz['sitefolder'] = $_SESSION['SiteFolder'].'/site/';
require_once($Raiz['local'].'application\common\php\parse-ini.php');
load_vars($Raiz['local'].'application\common\ini\config.ini');
$Path['php']=$Raiz['local'].$cfg[path_php];
require_once($Path['php'].'o3m.functions.php');
require_once($Path['php'].'class.pdo.php');
require_once($Path['php'].'class.tpl.php');
$Path['js']=$Raiz['url'].$cfg[path_js];
$Path['css']=$Raiz['url'].$cfg[path_css];
$Path['img']=$Raiz['url'].$cfg[path_img];
$Path['tpl']=$Raiz['local'].$cfg[path_tpl];
$Path['tmp']=$Raiz['local'].$cfg[path_tmp];
$Path['log']=$Raiz['local'].$cfg[path_log];
parseFormSanitizer($_GET, $_POST);
parseForm($_GET, $_POST);
##Autentificación
if(!$_SESSION['usu_id']) { 
	#session_destroy();
	header("Location: ".$Raiz['url']."site/index.php?er=2&url=".$_SERVER['REQUEST_URI']); 
}
/*O3M*/
?>