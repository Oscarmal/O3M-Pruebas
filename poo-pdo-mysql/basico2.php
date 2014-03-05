<?php
/**
*   Conexión a PHP-MySQL usando PDO
*   @author Oscar Maldonado
*   O3M
*/

function SQLConn(){
//Crea conexión con base de datos
    define('MYSQL_HOST','mysql:host=localhost');
    define('MYSQL_USER','root');
    define('MYSQL_PASS','');
    define('MYSQL_DATABASE','o3m_test');
    try{
    //Validación de conexión vía PDO
        //Relaiza la conexión con un objeti tipo PDO
        $linkDB = new PDO(MYSQL_HOST.';dbname='.MYSQL_DATABASE, MYSQL_USER, MYSQL_PASS); //Driver de conexión
        $linkDB->setAttribute(PDO::ATTR_PERSISTENT, false);
        $linkDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $linkDB->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); //Usa el buffer del server MysQL        
        return $linkDB;
    }catch(PDOException $e){
        //Se atrapa y se envía error, si este existe.
        $Result = 'Error: No puede conectarse con la base de datos'."\r\n";
        $Result .= "ERROR: " . $e->getMessage();
        $linkDB = null;
        exit();
    }
}

function SQLQuery($SQL){
//Ejecuta consulta
    $db = SQLConn();
    $Result = $db->query($SQL);
    $db = null; //Cierra conexión (destruye objeto)
    return $Result;
}


$sql = 'select * from  tbl_test';
$rows = SQLQuery($sql);
foreach($rows as $row){
    print_r($row).'<br><br>';
}

/*O3M*/
?>