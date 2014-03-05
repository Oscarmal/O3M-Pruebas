<?php include("src/header.php"); ?>
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
    Sistema de Control Administrativo</span><span class="titulo2">&nbsp;</span></td>
  <td width="67" align="right" valign="top" style="border-bottom:#FFCC66 solid 5px;"><img src="img/Logo AD Tlalpan fondo azul_low.jpg" width="66" height="70" /></td>
  </tr>
  <tr>
    <td height="19" colspan="2" valign="middle" class="txt_barra">&nbsp;<?php echo $usuario; ?> | <?php echo $usuario_nombre; ?></td>
    <td colspan="2" align="right" valign="middle" class="txt_barra"><?php echo fechahoy(); ?>&nbsp;</td>
  </tr>
  <tr>
    <td height="0"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

	    <div id="menu"><a href="/mahanaim.tlalpan/inicio.php" target="_self" class="link_menu">Inicio</a> | Inventarios | Contabilidad | Congregantes | Administración | <a href="/mahanaim.tlalpan/" target="_self" class="link_menu">Salir</a></div>
      <div id="barra_ruta">:: Inicio ></div>
    </div>    
    <div id=contenido><iframe height="100%" width="100%" src="" scrolling="auto" frameborder="0"></iframe></div>
    <div id=barra_fin></div>
</div>
<div id="pie">Iglesia de Jesucristo Mahanaim Tlalpan <br /> Ministerios Palabra Miel <br /> <?php echo date('Y'); ?></div>
</body>
</html>
