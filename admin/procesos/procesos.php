<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procesos en MySQL</title>
</head>

<body>
<table width="436" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="30" colspan="2" align="center" valign="middle"><h3>Procesos activos en servidor MySQL</h3></td>
  </tr>
  <tr>
    <td width="150" height="19" align="right" valign="middle">Conexión:&nbsp;</td>
    <td width="286" valign="top"><label>
      <select name="conexion" id="conexion">
        <option selected="selected"> </option>
        <option value="localhost">Localhost</option>
        <option value="172.16.2.15">Server Linux</option>
        <option value="172.16.2.39">Server DPI</option>
                  </select>
    </label></td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle">Servidor:&nbsp;</td>
    <td valign="top"><input name="servidor" type="text" id="servidor" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td height="21" align="right" valign="middle">Usuario:&nbsp;</td>
    <td valign="top"><input name="usuario" type="text" id="usuario" size="20" maxlength="50" /></td>
  </tr>
  <tr>
    <td height="23" align="right" valign="middle">Clave:&nbsp;</td>
    <td valign="top"><input name="clave" type="password" id="clave" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td align="left" valign="middle"><input type="submit" name="b_ver" id="b_ver" value=":: Ver Procesos ::" /></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="Resultados"></div>
</body>
</html>
