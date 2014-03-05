<?php
/*d01*/
define('HOST',"d01mysql");
define('USER',"root");
define('PASS',"D01NksjIw283hsl");
define('DB',"direksys2_e2_om");
/**/
/*d04*
define("HOST","172.20.20.117");
define("USER","root");
define("PASS","In@va$11");
define("DB","direksys2_e2");
/**/
$Link=mysql_connect(HOST,USER,PASS) or die('Error de conexión a DB: '.mysql_error());
mysql_select_db(DB,$Link);
mysql_query("SET NAMES 'utf8'", $Link);
/*O3M*/
?>