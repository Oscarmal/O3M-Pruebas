cambiar_texto
<html>
<head><script type="text/javascript" src="ajax.js"></script></head> 
<body>
<h3>Entidades</h3>
Seleccione:
<select name="cve_ent" id="cve_ent" onChange="fajax('DivEnt','entidades_tabla.php',this.value+'|')">
	<option value="" selected>Ent.</option>
	<?php 
	for($x=1; $x<=32; $x++){echo "<option value='$x'>$x</option>";}
	?>
</select>
<br><br>
<div id="DivEnt"></div>
<br><br>
<h3>Adscripciones</h3>
Seleccione:
<?php 
include("conex.php");
$sql="select id_adscripcion from cat_adscripciones";
$con=mysql_query($sql, $link) or die(mysql_error());
?>
<select name="cve_adsc" id="cve_adsc" onChange="fajax('DivAdsc','adscripciones_tabla.php',this.value+'|')">
	<option value="" selected>Adsc.</option>
	<?php 
	while($row=mysql_fetch_array($con)){echo "<option value='$row[0]'>$row[0]</option>";}
	?>
</select>
<br><br>
<div id="DivAdsc"></div>
</body>
</html> 
cambiar_texto