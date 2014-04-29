<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);?>
<?php
#echo $cfg[site_title];
echo $db[server][conn_std];
?>
<a href="index.php">Inicio</a><br>
<a href="index.php?er=1">Salir</a>