<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="../src/js/o3m_funciones.js"></script>
<script> 
function VerTabla(Conexion){fajax('DivResultados','procesos_tabla.php',Conexion+"|");}
function Kill(IdProcess, Conexion){fajax('DivResultados','procesos_tabla.php',Conexion+"|"+IdProcess);}
</script>
<title>Procesos de MySQL</title>
</head>

<body>
<table width="436" border="0" cellpadding="0" cellspacing="0">
  <form name="f_datos" method="post" action="">
  <tr>
    <td height="30" colspan="2" align="center" valign="middle"><h3>Procesos activos en servidor MySQL</h3></td>
  </tr>
  <tr>
    <td width="150" height="19" align="right" valign="middle">Conexión:&nbsp;</td>
    <td width="286" valign="top"><label>
      <select name="conexion" id="conexion" onchange="VerTabla(this.value)">
        <option selected="selected"> </option>
        <option value="localhost">Localhost</option>
        <option value="172.16.2.15">Server Linux</option>
        <option value="172.16.2.39">Server DPI</option>
                  </select>
    </label></td>
  </tr>
  <!--
  <tr>
    <td height="20" align="right" valign="middle">Servidor:&nbsp;</td>
    <td valign="top"><input name="servidor" type="text" id="servidor" value="<?php #echo $v_servidor; ?>" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td height="21" align="right" valign="middle">Usuario:&nbsp;</td>
    <td valign="top"><input name="usuario" type="text" id="usuario" value="<?php #echo $v_usuario; ?>" size="20" maxlength="50" /></td>
  </tr>
  <tr>
    <td height="23" align="right" valign="middle">Clave:&nbsp;</td>
    <td valign="top"><input name="clave" type="password" id="clave" value="<?php #echo $v_clave; ?>" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td align="left" valign="middle"><input type="submit" name="b_aplicar" id="b_aplicar" value=":: Aplicar cambios ::" /></td>
  </tr>
-->  
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<div id="DivResultados"></div>
</body>
</html>