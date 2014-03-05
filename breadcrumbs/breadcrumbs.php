<?php
require_once('path.php');
$RaizLoc=$_SESSION['RaizLoc'];
$RaizUrl=$_SESSION['RaizUrl'];
$SiteFolder=$_SESSION['SiteFolder'];
#$path = array_filter(explode($SiteFolder.'/modules', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
#echo $path[0].'  '.$path[1];
function breadcrumbs($home = 'Inicio', $separator = '>') {
	global $RaizUrl,$SiteFolder;
	$home=(!$SiteFolder?ucwords($home):ucwords($SiteFolder));
	#$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$rootPath = explode($SiteFolder.'/', $_SERVER['REQUEST_URI']);
	$path = array_filter(explode('/', $rootPath[1]));
	$base = $RaizUrl;
	$breadcrumbs = array('<a rel="nofollow" href="'. $base .'">'. $home .'</a>');	
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
	#$separator=$RaizUrl.'dot_arrow.gif';
	if(strlen($separator)>3){
		$separator="&nbsp;<img src='$separator' border='0' align='middle'>&nbsp;";
	}
	return implode($separator, $breadcrumbs);
}
?>