<?php
/**
* Conexion a DB vía MySQLi
* @author Oscar Maldonado
* O3M
*/
class conexDB{
	//Atributos fijos
	var $host; 
	var $database; 
	var $user; 
	var $pass; 
	var $link;
	//Atributos variabes
	var $resultado;
	var $consulta;	
	
	function conexDB(){
	//opt 2: function conexDB($host,$database,$user,$pass){
	//Contructor de clase
		$this->host='localhost';
		$this->database='o3m_test';
		$this->user='root';
		$this->pass='osc445';
	}

	function conectarBD(){	
	//Conexión a DB		
		if($link=mysql_connect($this->host,$this->user,$this->pass)){	
			if(mysql_select_db($this->database,$link)){
				$this->link=$link;
			}else{
				echo "Error al seleccionar la base de datos: ".$this->database;		
				exit();	
			}		
		}else{
			echo "Error al conectar con el Servidor: ".$this->host;		
			exit();	
		}
	}
	
	function consultarBD($sentenciaSQL){
	//Ejecuta consulta
		$this->conectarBD();
		$con=$this->consulta=mysql_query($sentenciaSQL,$this->link) or die(mysql_error());	
		return $con;
	}
	
	function obtenerResultado($sentenciaSQL){
	//Obtiene los resultados del query
		$query=$this->consultarBD($sentenciaSQL);
		$this->resultado=mysql_fetch_array($query);	
		#$this->resultado=mysql_fetch_array($this->consulta);	
		return $this->resultado;	
	}

	function insertarRegistro($sentenciaSQL){	
		mysql_query($sentenciaSQL,$this->link);	
	}
	
	function liberarConsulta(){	
	//Libera el cache
		mysql_free_result($this->consulta);	
	}
	
	function desconectarBD(){
	//cierra la conexión a la DB	
		mysql_close($this->link);
	}
	
}
/*O3M*/
?>
