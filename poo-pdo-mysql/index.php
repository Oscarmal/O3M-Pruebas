<?php
/**
*   Uso de conexión a PHP-MySQL usando PDO
*   @author Oscar Maldonado
*   O3M
*/

/*Con funciones - Procesos*/
// require_once('pdo.inc.php');
// $SQL = 'select * from  tbl_test';
// $rows = SQLQuery($SQL);
// if($rows){
// 	foreach($rows as $row){
// 	    echo $row[texto].'<br>';
// 	}
// }


/*Con Clases - POO*/
require_once('class.pdo.php');
$SQL = 'select * from  tbl_test';
$d = new db();
$rows = $d->SQLQuery($SQL);
if($rows){
	foreach($rows as $row){
	    echo $row[texto].'<br>';
	}
}
/*O3M*/
?>