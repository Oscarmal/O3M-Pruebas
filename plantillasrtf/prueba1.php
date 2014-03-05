<?php
//****
/*	Creación de documento RTF a partir de una plantilla documento.rtf
/*	Creado por: Oscar Maldonado
/*	Fecha de creación:	2011-12-08
/*	Método 2
****/
require("../src/php/o3m_funciones.php");
import_request_variables('g,p','v_');
$ruta="rtf/";
$plantilla="plantillas/documento2.rtf";
$sql="select ent_abrev as nombre, ent_nombre as entidad, ent_nombre_m as fecha, ent_abrev2 as cargo, id_entidad as coc from db_catalogos.cat_entidades limit 2,1";
$valores[0][0]="#*NOMBRE*#";	
$valores[0][1]=$v_nombre;
$valores[1][0]="#*ENTIDAD*#";
$valores[1][1]=$v_entidad;
$valores[2][0]="#*fecha*#";
$valores[2][1]=$v_fecha;
$valores[3][0]="#*CARGO*#";
$valores[3][1]=$v_cargo;
$valores[4][0]="#*COC*#";
$valores[4][1]=$v_coc;
$nuevo_doc="documento2_".date('Ymd-His').".rtf";
$archivo=rtf($plantilla,$ruta,$nuevo_doc,$valores);
?>

<table width="486" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <form name="f_forma" action="<? $PHP_SELF; ?>" method="post" enctype="multipart/form-data">
  <tr>
    <td height="25" colspan="2" valign="top"><em><strong>Datos para insertar en plantilla RTF</strong></em></td>
  </tr>
  <tr>
    <td width="134" height="22" align="right" valign="top">Nombre&nbsp;</td>
    <td width="352" valign="top"><input name="nombre" type="text" value="<?php echo $v_nombre; ?>" size="30" /></td>
  </tr>
  <tr>
    <td height="25" align="right" valign="top">Cargo&nbsp;</td>
    <td valign="top"><input name="cargo" type="text" id="cargo" value="<?php echo $v_cargo; ?>" size="30" /></td>
  </tr>
  <tr>
    <td height="24" align="right" valign="top">COC&nbsp;</td>
    <td valign="top"><input name="coc" type="text" id="coc" value="<?php echo $v_coc; ?>" /></td>
  </tr>
  <tr>
    <td height="22" align="right" valign="top">Entidad&nbsp;</td>
    <td valign="top"><input name="entidad" type="text" id="entidad" value="<?php echo $v_entidad; ?>" size="30" /></td>
  </tr>
  <tr>
    <td height="23" align="right" valign="top">Fecha&nbsp;</td>
    <td valign="top"><input name="fecha" type="text" id="fecha" value="<?php echo $v_fecha; ?>" size="50" /></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="top"><input name="enviar" type="submit" value="Subir archivo" id="enviar" /></td>
  </tr>
  <tr>
    <td height="37" colspan="2" valign="top">&nbsp;</td>
  </tr>
  </form>
</table>
<?php echo "<a href=\"$archivo\">Descargar $archivo</a>"; ?>
