---> Texto cambiado <---
<?php
$link=mysql_pconnect("localhost","root","osc445")or die("Error de conexión con servidor ".mysql_error());
mysql_select_db("db_catalogos",$link);
mysql_query ("SET NAMES 'utf8'");
?>
---> Texto cambiado <---