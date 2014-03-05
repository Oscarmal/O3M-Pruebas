<?php
/**
*   Uso de conexión a PHP-MySQL usando MySQLi
*   @author Oscar Maldonado
*   O3M
*/

$sql = 'select * from  tbl_test';

//Basico
// $host='localhost';
// $user='root';
// $pass='';
// $database='o3m_test';
// $link = mysqli_connect($host,$user,$pass,$database);
// $con = mysqli_query($link, $sql) or die(mysqli_connect_errno($link).' -> '.mysqli_connect_error());
// while($row=mysqli_fetch_row($con)){
//     foreach ($row as $valor){
//         print $valor;
//     }
// }
// mysqli_close($link);


//Funciones/Procesos
// require_once('mysqli.inc.php');
// $rows = SQLQuery($sql);
// if($rows){
// 	foreach($rows as $row){
// 	    echo $row[texto].'<br>';
// 	}
// }


//Clases - POO
require_once('class.mysqli.php');
$d = new db();
$rows = $d->SQLQuery($sql);
if($rows){
	foreach($rows as $row){
	    echo $row[texto].'<br>';
	}
}
?>