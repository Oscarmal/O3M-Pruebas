<?php
function fechahoy(){
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miercoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";
$dia2=date("d");
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September")$mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
$ano=date("Y");
return "$dia $dia2 de $mes del $ano";}

function estados($nombre,$valor,$tab){
$caja = "<select name=$nombre class='texto_cajas' tabindex=$tab>";
$caja.= "<option value=$valor selected>$valor</option>
		<option value=1>Ags</option>
		<option value=2>BC</option>
		<option value=3>BCS</option>
		<option value=4>Camp</option>
		<option value=5>Coah</option>
		<option value=6>Col</option>
		<option value=7>Chis</option>
		<option value=8>Chih</option>
		<option value=9>DF</option>
		<option value=10>Dgo</option>
		<option value=11>Gto</option>
		<option value=12>Gro</option>
		<option value=13>Hgo</option>
		<option value=14>Jal</option>
		<option value=15>Mex</option>
		<option value=16>Mich</option>
		<option value=17>Mor</option>
		<option value=18>Nay</option>
		<option value=19>NL</option>
		<option value=20>Oax</option>
		<option value=21>Pue</option>
		<option value=22>Qro</option>
		<option value=23>Qroo</option>
		<option value=24>SLP</option>
		<option value=25>Sin</option>
		<option value=26>Son</option>
		<option value=27>Tab</option>
		<option value=28>Tamps</option>
		<option value=29>Tlax</option>
		<option value=30>Ver</option>
		<option value=31>Yuc</option>
		<option value=32>Zac</option>";
$caja.= "</select>";
return $caja;
}

function meses_nom($nombre){
$hoy1=date("m");
$caja = "<select name=$nombre class='estilotextarea1'>";
for($n=1; $n<=12; $n++){
	if($hoy1==$n){ $s="selected";}else{$s="";}
	if ($n==1) $mes="Enero";
	if ($n==2) $mes="Febrero";
	if ($n==3) $mes="Marzo";
	if ($n==4) $mes="Abril";
	if ($n==5) $mes="Mayo";
	if ($n==6) $mes="Junio";
	if ($n==7) $mes="Julio";
	if ($n==8) $mes="Agosto";
	if ($n==9) $mes="Setiembre";
	if ($n==10) $mes="Octubre";
	if ($n==11) $mes="Noviembre";
	if ($n==12) $mes="Diciembre";
	$caja.= "<option value=$n $s>$mes</option>";
}
$caja.="</select>";
return $caja;
}

function meses_abr($nombre){
$hoy1=date("m");
$caja = "<select name=$nombre class='estilotextarea1'>";
for($n=1; $n<=12; $n++){
	if($hoy1==$n){ $s="selected";}else{$s="";}
	if ($n==1) $mes="Ene";
	if ($n==2) $mes="Feb";
	if ($n==3) $mes="Mar";
	if ($n==4) $mes="Abr";
	if ($n==5) $mes="May";
	if ($n==6) $mes="Jun";
	if ($n==7) $mes="Jul";
	if ($n==8) $mes="Ago";
	if ($n==9) $mes="Sep";
	if ($n==10) $mes="Oct";
	if ($n==11) $mes="Nov";
	if ($n==12) $mes="Dic";
	$caja.= "<option value=$n $s>$mes</option>";
}
$caja.="</select>";
return $caja;
}

function numames($num){
for($n=1; $n<=12; $n++){
	if ($num==$n) $mes="Enero";
	if ($num==$n) $mes="Febrero";
	if ($num==$n) $mes="Marzo";
	if ($num==$n) $mes="Abril";
	if ($num==$n) $mes="Mayo";
	if ($num==$n) $mes="Junio";
	if ($num==$n) $mes="Julio";
	if ($num==$n) $mes="Agosto";
	if ($num==$n) $mes="Septiembre";
	if ($num==$n) $mes="Octubre";
	if ($num==$n) $mes="Noviembre";
	if ($num==$n) $mes="Diciembre";
}
return $mes;
}

function anios($nombre){
$hoy = date("Y");
$caja = "<select name=$nombre class='estilotextarea1'>";
for($n=$hoy; $n<=($hoy+1); $n++){
	$caja.= "<option value=$n>$n</option>";
}
$caja.="</select>";
return $caja;
}

function meses($nombre){
$m=date("m");
$caja = "<select name=$nombre class='estilotextarea1'>";
$caja.= "<option value='$m' selected>$m </option>";
for($n=1; $n<=12; $n++){
	if($n<10){ $n="0".$n;} 
	$caja.= "<option value=$n>$n</option>";
}
return $caja;
}

function sino($nombre,$si,$vsi,$no,$vno){
$sel="selected";
echo "<select name=$nombre class='estilotextarea2' id=$nombre>";
echo "<option value='' $sel> </option>";
echo "<option value=$si> $vsi </option>";
echo "<option value=$no> $vno </option>";
return;
}

function salto(){
$pagina = "<div style='page-break-after:always'></div>";
return "$pagina"; }

function vfecha($fecha)
{
if($fecha!="00-00-0000"){ 
$datos = explode('-',$fecha);
$orden = array_reverse($datos);
$nueva_fecha = implode('-', $orden);
//$fecha = $datos[2].'-'.$datos[1].'-'.$datos[0];
} else { $nueva_fecha=""; } 
return $nueva_fecha;
}

function vfecha1($fecha)
{
$datos = explode('-',$fecha);
$orden = array_reverse($datos);
$nueva_fecha = implode('-', $orden);
return $nueva_fecha;
}

function vfecha_esp($fecha)
{
$datos = explode('-',$fecha);
$orden = array_reverse($datos);
$nueva_fecha = implode(' - ', $orden);
return $nueva_fecha;
}

function con($exe,$link,$msj){
$con = mysql_query($exe, $link) or die($msj." - ".mysql_error());
return $con;
}

function acceso($nom, $u, $n, $e, $l, $r){
$fec = date("Y_m_d");
if($_SERVER["HTTP_X_FORWARDED_FOR"])
{
	if($pos=strpos($_SERVER["HTTP_X_FORWARDED_FOR"]," "))
	{
		$ip_loc = substr($_SERVER["HTTP_X_FORWARDED_FOR"],0,$pos);
		$ip_pub = substr($_SERVER["HTTP_X_FORWARDED_FOR"],$pos+1);
	}else{$ip_pub=$_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	if($_SERVER["REMOTE_ADDR"])
		$proxy = $_SERVER["REMOTE_ADDR"];
}else{$ip_pub=$_SERVER["REMOTE_ADDR"];
	
}
$s = "|";	//separador
$page_ant = $_SERVER['HTTP_REFERER'];
$page = $_SERVER['PHP_SELF'];  
$hostname=gethostbyaddr($ip_pub);
if($ip_pub!=$hostname){	$host = $hostname; }
$f = date("d-m-Y H:i:s");
$nav = $_SERVER['HTTP_USER_AGENT'];
$archivo = $r."log/".$nom."_".$fec.".txt";
$fp = fopen($archivo, "a+");
# FECHA | USUARIO | NOMBRE | ENTIDAD | CVE_ENTIDAD | IP PUBLICA | IP LOCAL | NOMBRE DE PC | NAVEGADOR | URL ANTERIOR | URL ACTUAL
$texto = $f."$s".$u."$s".$n."$s".$e."$s".$l."$s".$ip_pub."$s".$ip_loc."$s".$host."$s".$nav."$s".$page_ant."$s".$page."\r\n";
$write = fputs($fp, $texto);
fclose($fp);
return ;
}

function doc($nombre){
$sel="selected";
$caja = "<select name=$nombre class='estilotextarea2' id=$nombre>";
$caja.= "<option value='' $sel> </option>";
$caja.= "<option value='O'> ORIGINAL </option>";
$caja.= "<option value='C'> COPIA </option>";
$caja.= "<option value='N'> NADA </option>";
return $caja;
}

function docs($nombre,$ck,$forma){
$s=1;
$nom1 = $nombre;
$clic = $forma.".".$nom1.$s.".value=1";
if($ck!=1){ $c=''; } else { $c='checked'; }
$caja ="<input type='checkbox' name=$nombre $c value=1>";
return $caja; $val;
}
#<!--O3M-->
?>