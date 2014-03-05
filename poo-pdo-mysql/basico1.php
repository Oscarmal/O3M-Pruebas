<?php
/**
*	Conexión a PHP-MySQL usando PDO
*	@author Oscar Maldonado
*	O3M
*/

// $host='localhost';
// $user='root';
// $pass='';
// $database='o3m_test';
define('MYSQL_HOST','mysql:host=localhost');
define('MYSQL_USER','root');
define('MYSQL_PASS','');
define('MYSQL_DATABASE','o3m_test');
//Intento de conexión vía PDO
try{
	//Relaiza la conexión con un objeti tipo PDO
    // $linkDB = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass, array(PDO::ATTR_PERSISTENT => false));
    $linkDB = new PDO(MYSQL_HOST.';dbname='.MYSQL_DATABASE, MYSQL_USER, MYSQL_PASS); //Driver de conexión
    $linkDB->setAttribute(PDO::ATTR_PERSISTENT, false);
    $linkDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $linkDB->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    echo "Funciona OK!!!<br/>";
    foreach($linkDB->query('select * from  tbl_test') as $fila) {
        print_r($fila);
    }
}catch(PDOException $e){
	//Se atrapa e imprime error, si este existe.
    echo "ERROR: " . $e->getMessage();
}

/*O3M*/
?>