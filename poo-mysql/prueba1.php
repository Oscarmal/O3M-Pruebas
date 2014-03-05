<?php
require("conex.class.php");
$objDB = new conexDB();
$sql="select * from tbl_test limit 1";
$row=$objDB->obtenerResultado($sql);
print_r(count($row));
for($x=0; $x<=count($row); $x++){
	#echo $row[0];
}
?>