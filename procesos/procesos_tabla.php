<?php import_request_variables("g,p","v_");
$v=explode("|",$v_v);
$ids=explode("-",$v[1]);
$ids_tot=count($ids);
if(!empty($v[0])){
	$conexion=$v[0];
	include("conex.php");
	if($ids_tot>0){
		for($x=0; $x<$ids_tot; $x++){
			if($ids[$x]>0){
				$sqlKill="kill $ids[$x]";
				$con=mysql_query($sqlKill, $link)or die(mysql_error());
				$msj.="Se ha eliminado el Proceso ID $ids[$x]<br>";
			}
		}
	}
}
$sql="show processlist";
$con=mysql_query($sql, $link)or die(mysql_error());
echo "<a href=\"javascript:VerTabla('$conexion')\">[Actualizar]</a>";
echo "<table border='1' cellspacing='3'>";
echo "<tr>";
echo "<td>ID</td>";
echo "<td>User</td>";
echo "<td>Host</td>";
echo "<td>DB</td>";
echo "<td>Command</td>";
echo "<td>Time</td>";
echo "<td>State</td>";
echo "<td>Info</td>";
echo "<td>Acci&oacute;n</td>";
echo "</tr>";
while($row=mysql_fetch_array($con)){
	echo "<tr>";
	for($x=0; $x<8; $x++){if(empty($row[$x])){$row[$x]="-";} echo "<td>$row[$x]</td>";}
	if($row[4]=='Sleep'){echo "<td><a href=\"javascript:Kill($row[0],'$conexion')\" >Kill</a></td>"; $Ids.=$row[0]."-";}else{"<td>-</td>";}
	echo "</tr>";	
}
echo "</table>";
echo "<input type='button' name='b_sleep' id='b_sleep' value=':: Eliminar Todos los Procesos Sleep ::' onClick=\"Kill('$Ids','$conexion')\" />";
echo "<br><br>".$msj;
mysql_free_result($con);
mysql_close($link);
?>