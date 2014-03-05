<?php 
include("../src/conex_local.php");
$sql="show processlist";
$con=mysql_query($sql, $link)or die(mysql_error());
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
echo "<td>Accion</td>";
echo "</tr>";
while($row=mysql_fetch_array($con)){
	echo "<tr>";
	for($x=0; $x<8; $x++){if(empty($row[$x])){$row[$x]="-";} echo "<td>$row[$x]</td>";}
	if($row[4]=='Sleep'){echo "<td>Kill</td>";}else{"<td>-</td>";}
	echo "</tr>";
}
?>