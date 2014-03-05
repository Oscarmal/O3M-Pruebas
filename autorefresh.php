<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url"); 
echo $url.' - '.date('H:i:s').'<br/>';
?>