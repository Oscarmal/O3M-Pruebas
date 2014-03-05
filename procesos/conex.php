<?php
if(empty($conexion)){$conexion="localhost";}
switch($conexion){
case 'localhost' : $host="localhost"; $user="root"; $pass="osc445";	break;
case '172.16.2.15' : $host="172.16.2.15"; $user="oscar.maldonado"; $pass="d3s4_irr3gul4res"; break;
case '172.16.2.39' : $host="172.16.2.39"; $user="root"; $pass="d3purac10n";	break;
}
$link=mysql_connect($host,$user,$pass)or die(mysql_error());
?>