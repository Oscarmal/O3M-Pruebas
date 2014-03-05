<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="md5.js" type="text/javascript"></script>
<script src="sha-1.js" type="text/javascript"></script>
<title>Encriptado MD5 y SHA-1</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
.style6 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
</style>
</head>

<body style="text-align:center;" onload="this.document.f_datos.txt.focus()">
<table width="413" border="0" cellpadding="0" cellspacing="3" >
  <form id="f_datos" method="post" action="">
  <tr>
    <td height="15" colspan="2" valign="top" bgcolor="#0099FF"><span class="style1">&nbsp;Encriptado MD5 y SHA-1</span></td>
  </tr>
  <tr>
    <td height="14" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="152" height="19" align="right" valign="middle"><span class="style4">Texto:&nbsp;</span></td>
    <td width="252" valign="top">
    <input name="txt" type="text" id="txt" size="35" onkeyup="document.getElementById('hash_md5').innerHTML = hex_md5(document.getElementById('txt').value); document.getElementById('hash_sha1').innerHTML = hex_sha1(document.getElementById('txt').value);" />
    </td>
  </tr>
  <tr>
    <td height="71" colspan="2" align="center" valign="middle">
    <span class="style4">MD5: </span><span class="style6" id="hash_md5"></span><br />
    <span class="style4">SHA-1: </span><span class="style6" id="hash_sha1"></span></td>
  </tr>
  </form>
</table>
</body>
</html>
