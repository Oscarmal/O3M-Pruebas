<?php
include("conex.class.php");
$objBd=new ConexDB();
$sql = "select * from tbl_test";
$Rows = $objBd->SQLQuery($sql);
print_r($Rows);
foreach($Rows as $Row){
	echo $Row;
	echo "<br/>";
}
?>