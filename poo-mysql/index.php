<?php
include("conex.class.php");
$objBd=new conexDB();
$objBd->conectarBD();
$objBd->consultarBD("select * from tbl_test");
while($row=$objBd->obtenerResultado()){
	printf("%s<br>",$row[0]);
}
$objBd->liberarConsulta();
$objBd->desconectarBD();
?>