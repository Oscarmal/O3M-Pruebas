<?php
/**
*   Conexión a PHP-MySQL usando PDO - Clases POO
*   @author Oscar Maldonado
*   O3M
*/
class db {
	private $host;
	private $user;
	private $pass;
	private $database;

	public function ServerData(){
		$this->host='localhost';
		$this->user='root';
		$this->pass='';
		$this->database='o3m_test';
	}

	public function SQLConn(){
	//Crea conexión con base de datos	    
	    try{
	    //Validación de conexión vía PDO
	    	$this->ServerData();
	        //Realiza la conexión con un objeto tipo PDO
	        $linkDB = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->pass); //Driver de conexión
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
	        return $Result;
	        exit();
	    }
	}

	public function SQLQuery($SQL){
	//Ejecuta consultas de extracción
		$Cmd=array('SELECT');
		$vSql=explode(' ',$SQL);
		if(in_array(strtoupper($vSql[0]),$Cmd)){
		    try{
		    	$db = $this->SQLConn(); //Llama conexión
		    	$Result = $db->query($SQL); //Ejecuta query
		    	$db = null; //Cierra conexión (destruye objeto)  	
		    	return $Result;
		    }catch(PDOException $e){
		    	echo "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
		    	echo $e->getMessage();
		    	return false;
		    }
		}
	}

	function SQLDo($SQL){
	//Ejecuta consultas de modificación
		$Cmd=array('INSERT', 'UPDATE', 'DELETE');
		$vSql=explode(' ',$SQL);
		if(in_array(strtoupper($vSql[0]),$Cmd)){
		    try{
		    	$db = $this->SQLConn(); //Llama conexión
		    	$Result = $db->query($SQL); //Ejecuta query
		    	$id = $db->lastInsertId(); //obtiene ID insertado
		    	$db = null; //Cierra conexión (destruye objeto)  	
		    	return true;
		    }catch(PDOException $e){
		    	echo  "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
		    	echo $e->getMessage();
		    	return false;
		    }
		}else{
			echo "ERROR: La consulta es erronea.";
			return false;
		}
	}
}
/*O3M*/
?>