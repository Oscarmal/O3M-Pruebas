<?php cambiar_texto
include("conex.php");
import_request_variables("g,p","v_");
$v=explode("|",$v_v);
$sql="select * from cat_adscripciones where id_adscripcion='$v[0]'";
$con=mysql_query($sql, $link) or die(mysql_error());
if(empty($v_v)){echo "Sin definir";}
else{
	while($row=mysql_fetch_array($con)){
		echo "<table border='1' width='900'>";
		echo "<tr>";
		echo "<td width='50'>Cve.</td>";
		echo "<td width='450'>Adscripcion</td>";
		echo "<td width='100'>Siglas</td>";
		echo "<td width='250'>Calle</td>";
		echo "<td width='50'>Entidad</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[calle]</td>";
		echo "<td>$row[id_entidad]</td>";
		echo "</tr>";
		echo "</table>";
	}
}
cambiar_texto
?>