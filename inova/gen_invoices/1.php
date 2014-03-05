<?php
$file = fopen("1.txt", "r") or exit("No se puede abrir el archivo");
$y=1;
while(!feof($file))
{
	$id_orden=fgets($file);
	$link="<div id='linea".$y."'><a href='http://mx.direksys.com/cgi-bin/mod/admin/dbman?cmd=opr_orders&view=".$id_orden."&tab=13&geninvoice=1' onclick='ocultardiv(\"linea".$y."\")' target='_blank'>http://mx.direksys.com/cgi-bin/mod/admin/dbman?cmd=opr_orders&view=".$id_orden."&tab=13&geninvoice=1</a><br/></div>";
	echo $link;
	$y++;
}
fclose($file);
?>
<script>
function mostrardiv(nombre) {
div = document.getElementById(nombre);
div.style.display = "";
}
function ocultardiv(nombre) {
div = document.getElementById(nombre);
div.style.display="none";
}
</script>
