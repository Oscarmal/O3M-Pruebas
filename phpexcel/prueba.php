<?php
//-- Generación de archivo CVS --//

// Llama funcion
require_once 'excel/reader.php';
// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();
// Set output Encoding.
$data->setOutputEncoding('CP1251');
// Ruta de archivo a leer
$data->read('prueba.xls');
// Reporta errores en el codigo
error_reporting(E_ALL ^ E_NOTICE);

$remesa = "200838";
// Primera lectura de archivo, detecta bloque de datos. $x->Horizontal $y->Vertical
for ($y=1; $y<=$data->sheets[0]['numRows']; $y++) {
	for ($x=1; $x<=$data->sheets[0]['numCols']; $x++) {
		$actual = $data->sheets[0]['cells'][$y][$x];
		if($inicio<1 && $x==2 && $actual==$remesa){$inicio=$y;}
		if(isset($inicio) && $fin<1 && $x==2 && $actual!=$remesa){$fin=$y-1;}
	}
	echo "\n";
}

// Resumen de datos del archivo
echo "Total de Filas: ".($y-1)."\n";
echo "Inicio de datos: ".$inicio."\n";
echo "Fin de datos: ".$fin."\n";
echo "<br><br>";

//impresion de contenido limpiado de cabecera y pie.
for ($y=$inicio; $y<=$fin; $y++) {
	$z=$z+1;
	echo $z."--> ";
	echo "\"\",";
	for ($x=1; $x<=69; $x++) {
		if($x==1){$c="";}else{$c=",";}
		$actual = $data->sheets[0]['cells'][$y][$x];
		if($x==2){
			$rem=substr($actual,0,4).'_'.substr($actual,4,2);
			$actual=$rem;
		}
		if($x==3){
			$f_ret=explode(substr($actual,2,1),$actual); 
			$actual=$f_ret[2].'-'.$f_ret[1].'-'.$f_ret[0];
		}
		if($x==13){
			$f_tram=explode(substr($actual,2,1),$actual); 
			$actual=$f_tram[2].'-'.$f_tram[1].'-'.$f_tram[0];
		}
		if($x==48){
			$f_ulttram=explode(substr($actual,2,1),$actual); 
			$actual=$f_ulttram[2].'-'.$f_ulttram[1].'-'.$f_ulttram[0];
		}
		echo $c."\"".$actual."\"";
	}
	echo "\n<br>";
}

?>
