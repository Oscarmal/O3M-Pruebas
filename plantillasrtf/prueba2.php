<?php
//****
/*	Creación de documento RTF a partir de una plantilla documento.rtf
/*	Creado por: Oscar Maldonado
/*	Fecha de creación:	2011-09-13
/*	Actualizada:		2011-12-08
/*	Método 2
****/
/* Función para generar RTF
	$Plantilla  =	Ruta y nombre de archivo RTF que sera la plantilla	=>  /carpeta/archivo.rtf
	$Ruta		=	Ruta en donde se generará el archivo nuevo			=>  /carpeta/nuevos/
	$NuevoDoc	=	Nombre del nuevo archivo RTF a generar				=>  nuevo_archivo.rft
	$Variables	=	Variables dentro de la plantilla que se 
					reemplazaran con valores nuevos.					=>  array("Nombre","Cargo")
	$CharAbre	=	Conjunto de caracteres que indican dentro de la 
					plantilla, donde empiezan las variables a reemplazar=>	\$ = $ ó #*
	$CharCierra	=	Conjunto de caracteres que indican dentro de la 
					plantilla, donde empiezan las variables a reemplazar=>	"" = nada ó *#
	$Valores	=	Valores que reemplazaran las variables de 
					la plantilla, puede ser texto o una consulta SQL.	=>  array("Oscar","Admin") ó 
																		    "select * from tabla"
	$SqlQry		=	Indicandor de uso de consulta SQL.					=>  0=False  1=True
	$ConexDataSql=	Datos para la conexión con els ervidor de MySql		=>  array('host','user','pass')
*/
function Plantilla_RTF($Plantilla,$Ruta,$NuevoDoc,$Variables,$CharAbre,$CharCierra,$Valores,$SqlQry,$ConexDataSql){
	$NuevoDoc=$Ruta.$NuevoDoc;
	$txtplantilla=file_get_contents($Plantilla);
	$matriz=explode("sectd",$txtplantilla);
	$cabecera=$matriz[0]."sectd";
	$inicio=strlen($cabecera);
	$final=strrpos($txtplantilla,"}");
	$largo=$final-$inicio;
	$cuerpo=substr($txtplantilla,$inicio,$largo);
	$punt=fopen($NuevoDoc,"wb");
	fputs($punt,$cabecera);
	if($SqlQry && $ConexDataSql){
		if(!$ConexDataSql){$ConexDataSql[0]="localhost"; $ConexDataSql[1]="root"; $ConexDataSql[2]="osc445";}
		$link=mysql_pconnect($ConexDataSql[0],$ConexDataSql[1],$ConexDataSql[2]);
		$con=mysql_query($Valores,$link)or die(mysql_error());
		mysql_close($link);
		$row=mysql_fetch_array($con);
	}else{$row=$Valores;}
	$despues=$cuerpo;
	for($x=0; $x<count($Variables); $x++){$nvariables[$x][0]=$CharAbre.$Variables[$x].$CharCierra;}
	$n=0;
	foreach($nvariables as $dato){
		$datosql=utf8_decode(str_replace('\\','ñ',utf8_encode(utf8_decode($row[$n]))));
		$datortf=$dato[0];
		$despues=str_replace($datortf,$datosql,$despues);
		$despues=str_replace(strtoupper($datortf),$datosql,$despues);
		$despues=str_replace(strtolower($datortf),$datosql,$despues);
		$n++;
	}
	fputs($punt,$despues);
	#$saltopag="\par \page \par"; fputs($punt,$saltopag);	
	fputs($punt,"}");
	fclose($punt);
	return $NuevoDoc;
}
import_request_variables('g,p','v_');
// Parametros para generar archivo
$ruta="rtf/";
$plantilla="plantillas/documento.rtf";
#$sql="select ent_abrev as nombre, ent_nombre as entidad, ent_nombre_m as fecha, ent_abrev2 as cargo, id_entidad as coc from db_catalogos.cat_entidades limit 15,1";
$sql="select * from sdi_control.tbl_usuarios limit 300,1";
$ConexDataSql=array('172.16.2.15','oscar.maldonado','d3s4_irr3gul4res');
$variables=array("Nombre","Cargo","Entidad","Coc","Fecha");
$valores=array($v_nombre,$v_cargo,$v_entidad,$v_coc,$v_fecha);
$nuevo_doc="documento_".date('Ymd-His').".rtf";
#$archivo=Plantilla_RTF($plantilla,$ruta,$nuevo_doc,$variables,"\$",'',$sql,1,$ConexDataSql); // Con SQL
$archivo=Plantilla_RTF($plantilla,$ruta,$nuevo_doc,$variables,"\$",'',$valores,0,0)	// Sin SQL
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
    <td valign="top"><input name="enviar" type="submit" value="Generar archivo" id="enviar" /></td>
  </tr>
  <tr>
    <td height="37" colspan="2" valign="top">&nbsp;</td>
  </tr>
  </form>
</table>
<?php echo "<a href=\"$archivo\">Descargar $archivo</a>"; ?>