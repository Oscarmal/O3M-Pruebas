<?php include("src/conex.php"); require("src/funciones.php");
import_request_variables("g,p","v_");
session_name('maha_tlalpan');
session_start();
session_destroy();
unset($_SESSION['usu_id']);
if(!empty($v_usuario) || !empty($v_clave)){
	$sql='select a.id_usuario, a.usu_usuario, concat(b.per_nombre,\' \',b.per_paterno,\' \',b.per_materno) as nombre_completo, \'\' as nivel from '.$db1.'.sis_usuarios a left join '.$db1.'.cat_personas b on a.id_persona=b.id_persona where a.usu_usuario=\''.mysql_real_escape_string($v_usuario).'\''.' and a.usu_clave=\''.mysql_real_escape_string($v_clave).'\'';
	$con=SQLconsulta($sql);
	$row=SQLresultados($con);
	if(isset($row[0])){
		session_name('maha_tlalpan');
		session_start();
		$_SESSION['usu_id']=$row['id_usuario'];
		$_SESSION['usu_usuario']=$row['usu_usuario'];
		$_SESSION['usu_nombre']=$row['nombre_completo'];
		$_SESSION['usu_nivel']=$row['nivel'];
		header("location: /mahanaim.tlalpan/inicio.php");
	}else{$msj="Acceso no autorizado. Por favor, ingrese su Usuario y Clave correctamente.";}
}else{
	if($v_er==true){$msj="Debe autentificarse para entrar a esta área.";}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Iglesia de Jesucristo Mahanaim Tlalpan ::</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="pagina">
	<div id="cabecera">
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="200" height="75" valign="top"><img src="img/Logo_Tlalpan.jpg" width="200" height="67" /></td>
    <td colspan="2" align="right" valign="middle" style="border-bottom:#FFCC66 solid 5px;">
    <span class="titulo1">Iglesia de Jesucristo Mahanaim Tlalpan</span><span class="titulo2">&nbsp;    <br />
    Ministerios Palabra Miel&nbsp;<br />
    </span><span class="titulo3"><br />
    </span><span class="titulo2">&nbsp;</span></td>
  <td width="67" align="right" valign="top" style="border-bottom:#FFCC66 solid 5px;"><img src="img/Logo AD Tlalpan fondo azul_low.jpg" width="66" height="70" /></td>
  </tr>
  <tr>
    <td height="19" colspan="2" valign="middle" class="txt_barra">&nbsp;</td>
    <td colspan="2" align="right" valign="middle" class="txt_barra"><?php echo fechahoy(); ?>&nbsp;</td>
  </tr>
  <tr>
    <td height="0"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

	    <div id="menu">.</div>
        <div id="barra_ruta">:: Login ></div>
  </div>    
    <div id=contenido>
    	<div id="login">
  <table width="300" border="0" cellpadding="0" cellspacing="3" bgcolor="#333333">
  <form name="f_login" method="post" action="<?php $_SERVER['php_self']; ?>">
  <tr>
    <td height="21" colspan="2" align="left" valign="middle" class="tit_azul">&nbsp;Autentificación</td>
  </tr>
  <tr>
    <td width="97" height="27">&nbsp;</td>
    <td width="194">&nbsp;</td>
  </tr>
  <tr>
    <td height="22" align="right" valign="middle">Usuario:&nbsp;</td>
    <td align="left" valign="middle"><input name="usuario" type="text" id="usuario" size="15" /></td>
  </tr>
  <tr>
    <td height="21" align="right" valign="middle">Clave:&nbsp;</td>
    <td align="left" valign="middle"><input name="clave" type="password" id="clave" size="15" /></td>
  </tr>
  <tr>
    <td height="15"></td>
    <td align="left" valign="middle"><input type="submit" name="entrar" id="entrar" value=":: Entrar ::" /></td>
  </tr>
  <tr>
    <td height="23" colspan="2" align="center" valign="middle" class="msj_rojo"><?php echo $msj; ?></td>
  </tr>
  </form>
</table>
        </div>
    </div>
  <div id=barra_fin></div>
</div>
<div id="pie">Iglesia de Jesucristo Mahanaim Tlalpan <br /> Ministerios Palabra Miel <br /> <?php echo date('Y'); ?></div>
</body>
</html>
