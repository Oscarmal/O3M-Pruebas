<?php
/**
*   Estructur básica de una clase para utilizar POO
*   @author Oscar Maldonado
*   O3M
*/
class conecta {
	//Atributos
	private $host;
	
	//Setter & Getters
	function setHost($host){
		$this->host = $host;
	}
	function getHost(){
		return $this->host;
	}

	//Metodos
	function abre(){
		echo 'Valor de $host: '.$this->host;
	}
}
/*
//Invocación desde archivo externo
require('clase.php');
$d = new conecta();
$d->setHost('Inicial');
echo $d->getHost().'<br>';
$d->setHost('nuevo');
echo $d->abre();
*/
/*O3M*/
?>