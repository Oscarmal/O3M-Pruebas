cambiar_texto
<html>
<head>
<script type="text/javascript">
function VerTabla(valor)
{
	var xmlhttp;
	try{xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");}
	catch(e){try{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	catch(E){if(!xmlhttp && typeof XMLHttpRequest!='undefined') 
	xmlhttp=new XMLHttpRequest();}}
	if (valor.length==0){
		document.getElementById("DivEnt").innerHTML="";
		return;
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("DivEnt").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","entidades_tabla.php?v="+valor,true);
	xmlhttp.send(null);
}
</script>
</head> 
<body>
<h3>Entidades</h3>
Seleccione:
<select name="cve_ent" id="cve_ent" onChange="VerTabla(this.value)">
	<option value="" selected>Ent.</option>
	<?php 
	for($x=1; $x<=32; $x++){echo "<option value='$x'>$x</option>";}
	?>
</select>
<br><br>
<div id="DivEnt"></div>
</body>
</html> 
cambiar_texto