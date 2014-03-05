<?php 
## Establece variables con ruta local
## $SiteFolder => El nombre de la carpeta del sitio: www/[Carpeta]
##
session_name('maha_tlalpan');
session_start();
$SiteFolder="breadcrumbs";
$DirLocal=getcwd();
$path=explode($SiteFolder,$DirLocal);
$RaizLoc=$path[0].$SiteFolder.'\\';
$path=explode('www',$DirLocal);
$path2=explode($SiteFolder,$path[1]);
$RaizUrl=($_SERVER['HTTPS']?'https://':'http://').$_SERVER['HTTP_HOST'].$path2[0].$SiteFolder."/";
$RaizUrl=str_replace('\\','/',$RaizUrl);
$_SESSION['RaizLoc']=$RaizLoc;
$_SESSION['RaizUrl']=$RaizUrl;
$_SESSION['SiteFolder']=$SiteFolder;
/*
$DirLocal=$_SERVER['PHP_SELF'];
$path=explode($SiteFolder,$DirLocal);
$RaizLoc='./'.$path[0].$SiteFolder.'/';
$RaizUrl="http://".$_SERVER['HTTP_HOST'].$path[0].$SiteFolder.'/';
$_SESSION['RaizLoc']=$RaizLoc;
$_SESSION['RaizUrl']=$RaizUrl;
/**/
?>