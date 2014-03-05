cambiar_texto
<?php
/*	Nombre:			Implementación de AJAX
**	Descripción:	Recibe un valor [POST/GET] y devuelve un nombre.
**	Dependencia:	ajax.html
**	Autor:			Oscar Maldonado
**	Fecha:			21-Sep-2011
*/

// Crea arreglo del 1 al 30 con los nombres
$a[1]="Anna";
$a[2]="Brittany";
$a[3]="Cinderella";
$a[4]="Diana";
$a[5]="Eva";
$a[6]="Fiona";
$a[7]="Gunda";
$a[8]="Hege";
$a[9]="Inga";
$a[10]="Johanna";
$a[11]="Kitty";
$a[12]="Linda";
$a[13]="Nina";
$a[14]="Ophelia";
$a[15]="Petunia";
$a[16]="Amanda";
$a[17]="Raquel";
$a[18]="Cindy";
$a[19]="Doris";
$a[20]="Eve";
$a[21]="Evita";
$a[22]="Sunniva";
$a[23]="Tove";
$a[24]="Unni";
$a[25]="Violet";
$a[26]="Liza";
$a[27]="Elizabeth";
$a[28]="Ellen";
$a[29]="Wenche";
$a[30]="Vicky";

// Importa las variables enviadas POST/GET
import_request_variables("g,p","v_");
// Devuelve el resultado de acuerdo con el valor recibido
if(empty($v_q)){echo "Sin definir";}else{echo $a[$v_q];}
?>
cambiar_texto