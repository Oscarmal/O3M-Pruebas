<?php
/**
* Conexion a DB vía MySQL
* @author Oscar Maldonado
* O3M
*/
class ConexDB{
	//Atributos fijos
	private $host; 
	private $database; 
	private $user; 
	private $pass; 
	private $link;
	//Atributos variabes
	public $resultado = array();
	public $consulta;	
	
	function __construct(){
	//Contructor de clase
		$this->host='localhost';
		$this->database='o3m_test';
		$this->user='root';
		$this->pass='';
	}

	private function conectarBD(){	
	//Conexión a DB		
		if($this->link=mysql_connect($this->host,$this->user,$this->pass)){	
			if(mysql_select_db($this->database,$this->link)){
				return true;
			}else{
				throw new Exception("Error al seleccionar la base de datos: ".$this->database);
				return false;
			}		
		}else{
			throw new Exception("Error al conectar con el Servidor: ".$this->host);
			return false;
		}
	}

	public function SQLQuery($sentenciaSQL){
	//Ejecuta consulta y regresa en un array el resultado
		try{
			$this->conectarBD();
			$this->consulta=mysql_query($sentenciaSQL,$this->link) or die(mysql_error());	
			$this->resultado=mysql_fetch_array($this->consulta);
			$this->liberarConsulta();
			$this->desconectarBD();
			return $this->resultado;
		}catch(Exception $e){
			echo 'Error al realizar la consulta: ',  $e->getMessage(), "\n";
			return false;
		}

	}
		
	private function liberarConsulta(){	
	//Libera el cache
		mysql_free_result($this->consulta);	
		return true;
	}
	
	private function desconectarBD(){
	//cierra la conexión a la DB	
		mysql_close($this->link);
		return true;
	}
	
}
/*O3M*/
?>