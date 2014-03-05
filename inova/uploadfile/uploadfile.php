<?php
extract($_GET, EXTR_PREFIX_ALL, "v");
extract($_POST, EXTR_PREFIX_ALL, "v");
if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
	$temp=$_FILES['archivo']['tmp_name'];
	$nombre=$_FILES['archivo']['name'];
	$tamanio=$_FILES['archivo']['size'];
	$tipo=$_FILES['archivo']['type'];
	echo $nombre;
}else{echo "Error: No se subio el archivo.";}

?> 
<html>
<body>
	<form name="f_datos" method="post" action="<?php $_SERVER['php_self']; ?>" enctype="multipart/form-data">    
	    <b>Enviar un nuevo archivo: </b>
	    <br>
	    <input name="archivo" type="file">    
	    <input type="submit" value="Enviar">
	</form> 
</body>
</html>