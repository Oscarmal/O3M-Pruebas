<?php
$dir = getcwd();
$SiteFolder = "inova";
list($b_cgibin, $a_cgibin) = explode($SiteFolder, $dir);
$cfg_folder = $b_cgibin . $SiteFolder . '/conf/';

echo $cfg_folder;

?>