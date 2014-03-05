<?php
include("conex.php");
import_request_variables("g,p","v_");
$v=explode("|",$v_v);
$sql="select * from cat_entidades where id_entidad='$v[0]'";
$con=mysql_query($sql, $link) or die(mysql_error());
if(empty($v_v)){echo "Sin definir";}
else{
	while($row=mysql_fetch_array($con)){
		echo "<table border='1' width='600'>";
		echo "<tr>";
		echo "<td width='50'>Cve.</td>";
		echo "<td width='100'>AbrevPunto</td>";
		echo "<td width='150'>AltasBajas</td>";
cambiar_texto
		echo "<td width='250'>Altas</td>";
		echo "<td width='50'>Abrev</td>";
		echo "</tr>";
cambiar_texto
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
cambiar_texto
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "</tr>";
		echo "</table>";
	}
}
?>