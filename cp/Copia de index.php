<?php include("src/conex.php");
import_request_variables("g,P","v_");

if(isset($v_buscar)){
	if($v_ent!=""){$ent="and c_entidad='$v_ent'"; }else{$ent=""; }
	if($v_mpio_cve!=""){$mpio_cve="and c_mpio='$v_mpio_cve'"; }else{$mpio_cve=""; }
	if($v_mpio!=""){$mpio="and d_mpio like '$v_mpio%'"; }else{$mpio=""; }
	if($v_col!=""){$col="and d_asenta like '$v_col%'"; }else{$col=""; }
	if($v_cp!=""){$cp="and d_cp='$v_cp'";}else{$cp="";}
	$filtro = $ent." ".$mpio_cve." ".$mpio." ".$col." ".$cp;
	if(trim($filtro)==""){$limite="limit 1";}
	$sql = "select * from db_catalogos.cat_cp a
			left join db_catalogos.cat_municipios_ife b on a.c_entidad=b.m_ent and a.c_mpio=b.m_cve_inegi
			where 1=1 $filtro $v_orden $limite";
	$con=mysql_query($sql, $link)or die(mysql_error());
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IFE - DDVC - Búsqueda de CP</title>
<link href="css/estilos2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table width="789" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="29" height="16"></td>
    <td width="163"></td>
    <td width="377"></td>
    <td width="180"></td>
    <td width="40"></td>
  </tr>
  <tr>
    <td height="215"></td>
    <td></td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <form name="f_reporte" method="post" action="<?php $_SERVER['PHP_SELF']?>">
        <tr>
          <td width="10" height="23" valign="top"><img src="img/tops/rosa_2_01.gif" width="10" height="23" /></td>
              <td width="415" valign="top" class="tit_bco" style="background:url(img/tops/rosa_2_02.gif) repeat-x;">B&uacute;squeda de Codigos Postales </td>
              <td width="10" valign="top"><img src="img/tops/rosa_2_03.gif" width="10" height="23" /></td>
            </tr>
        <tr>
          <td height="136" valign="top" style="background:url(img/marco/marco_04.gif) repeat-y;"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#EFF1F3">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="20" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="137" height="14" valign="top" class="tit_azul3">Entidad:&nbsp;</td>
                    <td width="278" valign="top"><div align="left">
                      <input name="ent" type="text" class="txt_cajas2" id="ent" value="<?php echo $v_ent; ?>" size="5" maxlength="2" />
                    </div></td>
                  </tr>
                  <tr>
                    <td height="13" valign="top" class="tit_azul3">Mpio Cve:&nbsp;</td>
                    <td valign="top"><div align="left">
                      <input name="mpio_cve" type="text" class="txt_cajas2" id="mpio_cve" value="<?php echo $v_mpio_cve; ?>" size="5" maxlength="4" />
                    </div></td>
                  </tr>
				  <tr>
                    <td height="13" valign="top" class="tit_azul3">Municipio:&nbsp;</td>
                    <td valign="top"><div align="left">
                      <input name="mpio" type="text" class="txt_cajas1" id="mpio" value="<?php echo $v_mpio; ?>" size="50" maxlength="150" />
                    </div></td>
                  </tr>
                  <tr>
                    <td height="13" valign="top" class="tit_azul3">Colonia:&nbsp;</td>
                    <td valign="top"><div align="left">
                      <input name="col" type="text" class="txt_cajas1" id="col" value="<?php echo $v_col; ?>" size="50" maxlength="70" />
                    </div></td>
                  </tr>
                  <tr>
                    <td height="13" valign="top" class="tit_azul3">C.P.:&nbsp;</td>
                    <td valign="top"><div align="left">
                      <input name="cp" type="text" class="txt_cajas2" id="cp" value="<?php echo $v_cp; ?>" size="10" maxlength="5" />
                    </div></td>
                  </tr>
                  <tr>
                    <td height="13" valign="top" class="tit_azul3">Ordenado por:&nbsp; </td>
                    <td valign="top"><div align="left">
                      <select name="orden" class="txt_campo" id="orden">
                        <option value="order by d_oficina, d_cp asc">CR-CP</option>
                        <option value="order by d_asenta asc" selected>Colonia</option>
                        <option value="order by d_mpio asc">Municipio</option>
                      </select>
                      </div></td>
                  </tr>
                  <tr>
                    <td height="13" valign="top" class="tit_azul3"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top"><div align="left"></div></td>
                  </tr>
                  <tr>
                    <td height="44" colspan="2" align="center" valign="middle"><input name="buscar" type="submit" class="boton1" id="buscar" value="Buscar Info" /></td>
                  </tr>
                  
                  
                  
                  
              </table></td>
              <td valign="top" style="background:url(img/marco/marco_06.gif) repeat-y;"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
        <tr>
          <td height="10" valign="top"><img src="img/marco/marco_07.gif" width="10" height="10" /></td>
              <td rowspan="2" valign="top" style="background:url(img/marco/marco_08.gif) repeat-x;"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td valign="top"><img src="img/marco/marco_09.gif" width="10" height="10" /></td>
            </tr>
        
        <tr>
          <td height="3"></td>
            <td></td>
            </tr>
        </form>
    </table></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="14"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="79"></td>
    <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <form name="f_reporte" method="post" action="<?php $_SERVER['PHP_SELF']?>">
        <tr>
          <td width="10" height="23" valign="top"><img src="img/tops/rosa_2_01.gif" width="10" height="23" /></td>
              <td width="699" valign="top" class="tit_bco" style="background:url(img/tops/rosa_2_02.gif) repeat-x;">Resultados  </td>
              <td width="11" valign="top"><img src="img/tops/rosa_2_03.gif" width="10" height="23" /></td>
            </tr>
        <tr>
          <td height="43" valign="top" style="background:url(img/marco/marco_04.gif) repeat-y;"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td valign="top">
                <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#EFF1F3" class="tabla1">
                  <!--DWLayoutTable-->
                  <tr>
                    <td width="30" height="13" valign="top" class="tit_bcongr2">No</td>
                    <td width="50" valign="top" class="tit_bcongr2">Ent</td>
                    <td width="120" valign="top" class="tit_bcongr2">Entidad</td>
                    <td width="52" valign="top" class="tit_bcongr2">Mpio CM</td>
                    <td width="52" valign="top" class="tit_bcongr2">Mpio IFE</td>
                    <td width="150" valign="top" class="tit_bcongr2">Municipio CM</td>
                    <td width="200" valign="top" class="tit_bcongr2">Colonia</td>
                    <td width="44" valign="top" class="tit_bcongr2">C.P.</td>
                    <td width="28" valign="top" class="tit_bcongr2">C.R.</td>
                  </tr>
                  <?php
				if(isset($v_buscar)){
				while($row=mysql_fetch_array($con)){
				$x=$x+1;
				echo "<tr>";
				echo "<td class='linea tbl_num'>$x</td>";
				echo "<td class='linea tbl_num'>$row[c_entidad]</td>";
				echo "<td class='linea tbl_txt'>$row[d_entidad]</td>";
				echo "<td class='linea tbl_num'>$row[c_mpio]</td>";
				echo "<td class='linea tbl_num'>$row[m_cve_ife]</td>";
				echo "<td class='linea tbl_txt'>$row[d_mpio]</td>";
				echo "<td class='linea tbl_txt'>$row[d_asenta]</td>";
				echo "<td class='linea tbl_num'>$row[d_cp]</td>";
				echo "<td class='linea tbl_num'>$row[c_oficina]</td>";
				echo "</tr>";
				
				}
				}
				?>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <script type="text/javascript" src="src/tbl_resalta.js"></script>  
                </table></td>
              <td valign="top" style="background:url(img/marco/marco_06.gif) repeat-y;"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
        <tr>
          <td height="10" valign="top"><img src="img/marco/marco_07.gif" width="10" height="10" /></td>
              <td rowspan="2" valign="top" style="background:url(img/marco/marco_08.gif) repeat-x;"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td valign="top"><img src="img/marco/marco_09.gif" width="10" height="10" /></td>
            </tr>
        <tr>
          <td height="3"></td>
            <td></td>
          </tr>
          </form>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="185"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</center>
</body>
</html>
