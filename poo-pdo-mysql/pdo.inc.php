<?php
/**
*   Conexión a PHP-MySQL usando PDO - Funciones/Procesos
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
        //Realiza la conexión con un objeto tipo PDO
        $linkDB = new PDO(MYSQL_HOST.';dbname='.MYSQL_DATABASE, MYSQL_USER, MYSQL_PASS); //Driver de conexión
        $linkDB->setAttribute(PDO::ATTR_PERSISTENT, false);
        $linkDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores a mostrar
        $linkDB->setAttribute(PDO::ERRMODE_WARNING, true); //Warnings a mostrar
        $linkDB->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); //Usa el buffer del server MysQL        
        return $linkDB;
    }catch(PDOException $e){
        //Se atrapa y se envía error, si este existe.
        $Result = 'ERROR: No puede conectarse con la base de datos';
        // $Result .= "ERROR: " . $e->getMessage();
        $linkDB = null;
        echo $Result;
        exit();
    }
}

function SQLQuery($SQL){
//Ejecuta consulta    
	$Cmd=array('SELECT');
	$vSql=explode(' ',$SQL);
	if(in_array(strtoupper($vSql[0]),$Cmd)){
	    try{
	    	$db = SQLConn(); //Llama conexión
	    	$Result = $db->query($SQL); //Ejecuta query
	    	$db = null; //Cierra conexión (destruye objeto)  	
	    	return $Result;
	    }catch(PDOException $e){
	    	$Result = "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
	    	// $Result .= $e->getMessage();
	    	echo $Result;
	    }
	}
}

function SQLDo($SQL){
//Ejecuta consulta    
	$Cmd=array('INSERT', 'UPDATE', 'DELETE');
	$vSql=explode(' ',$SQL);
	if(in_array(strtoupper($vSql[0]),$Cmd)){
	    try{
	    	$db = SQLConn(); //Llama conexión
	    	$Result = $db->query($SQL); //Ejecuta query
	    	$id = $db->lastInsertId(); //obtiene ID insertado
	    	$db = null; //Cierra conexión (destruye objeto)  	
	    	return $Result;
	    }catch(PDOException $e){
	    	$Result = "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
	    	// $Result .= $e->getMessage();
	    	echo $Result;
	    }
	}else{
		echo "ERROR: La consulta es erronea.";
	}
}
/*O3M*/
?>