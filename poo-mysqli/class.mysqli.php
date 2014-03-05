<?php 
/**
*   Conexión a PHP-MySQL usando MySQLi - Clases POO
*   @author Oscar Maldonado
*   O3M
*/
class db {
	private $host;
	private $user;
	private $pass;
	private $database;

	function ServerData(){
		$this->host='localhost';
		$this->user='root';
		$this->pass='';
		$this->database='o3m_test';
	}

	public function SQLConn() {
	/**
	* @return object link con la conexión
	*/
		try{
			$this->ServerData();
			$link = new mysqli($this->host,$this->user,$this->pass,$this->database);
			return $link;
		}catch(PDOException $e){
			//Se atrapa y se envía error, si este existe.
	        $Result = 'ERROR: No puede conectarse con la base de datos';
	        // $Result .= "ERROR: " . $e->getMessage();
	        $this->close();
	        return $Result;
		}
	}

	function SQLQuery($SQL){
	//Ejecuta consultas de extracción
		$Cmd=array('SELECT');
		$vSql=explode(' ',$SQL);
		if(in_array(strtoupper($vSql[0]),$Cmd)){
		    try{
		    	$db = $this->SQLConn(); //Llama conexión
		    	$con = $db->query($SQL)or die('ERROR: '.$con->connect_errno().' -> '.$con->connect_error); //Ejecuta query	    	 	
		    	if($con->num_rows){
		    		while($Rows=$con->fetch_array()){$Result[]=$Rows;} //Recorre el resultado
		    	}else{$Result=null;}
		    	$db->close(); //Cierra conexión
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
		    	$con = $db->query($SQL)or die('ERROR: '.$con->connect_errno().' -> '.$con->connect_error); //Ejecuta query	    	 	
		    	$db->close(); //Cierra conexión
		    	return true;
		    }catch(PDOException $e){
		    	echo "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
		    	echo $e->getMessage();
		    	return false;
		    }
		}
	}
}
/*O3M*/
?>