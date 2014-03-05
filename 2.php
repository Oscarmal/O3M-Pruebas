<?php
require('src/pdf/fpdf2.php');
#require('src/fpdf/fpdf.php');
require('src/conexion2.php');
require('src/funciones.php');
import_request_variables("g,P","v_");

class PDF extends FPDF
{


function Hoja1($folio)
{
	
	global $conn;
	global $pdf;
	global $nombre_arch;
	
	$pdf->setFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->setFillColor(201,201,201);
	/* 
	* Consulta a la base de datos
	*/
	switch ($_SESSION['nivel']){
	
	case 1: 
		$datos_def = "select *,
						(case ent_nac_def when ent_nac_def then (select descripcion_ent from cat_entidades_ent where id_ent=ent_nac_def) end) as nacimiento,
						(case cve_ent_def when cve_ent_def then (select descripcion_ent from cat_entidades_ent where id_ent=cve_ent_def) end) as entidad_def
						from lis_defunciones_def 
						where folio_def='$folio';";
	break;
		
	case 2:
	
		$where = where('lis_defunciones_def');
		$datos_def = "select *,
						(case ent_nac_def when ent_nac_def then (select descripcion_ent from cat_entidades_ent where id_ent=ent_nac_def) end) as nacimiento,
						(case cve_ent_def when cve_ent_def then (select descripcion_ent from cat_entidades_ent where id_ent=cve_ent_def) end) as entidad_def
						from lis_defunciones_def
						where folio_def='$folio' $where;";
	break;
	}//end switch
	
	
	
	//echo $datos_def;
	$ddef = pg_query($conn, $datos_def);
	
	/*
	*	Damos formato a los datos de la ND
	*/
	$x=$pdf->getX();
	$pdf->Rect($x,30,190,40);
	while($res = pg_fetch_assoc($ddef)){
		
		$nombre = $res['nombre_def']." ".$res['paterno_def']." ".$res['materno_def'];
		$domicilio = $res['calle_def']." ".$res['exterior_def']." ".$res['interior_def'];
		$nacimiento = $res['nacimiento'];
		if($nacimiento=="TODAS"){$nacimiento="SIN ENTIDAD";}
	
		if($res['cve_ent_def']<10){$ent_def="0".$res['cve_ent_def'];}else{$ent_def=$res['cve_ent_def'];}
	
		$pdf->setY(31);
		// nombre
		$pdf->setFont('Arial','B',8);
		$pdf->Cell(63,5,utf8_decode($res['nombre_def']),0,0,'C');
		$pdf->Cell(63,5,utf8_decode($res['paterno_def']),0,0,'C');
		$pdf->Cell(63,5,utf8_decode($res['materno_def']),0,1,'C');
		$pdf->setFont('Arial','',7);
		$pdf->Cell(3);
		$pdf->Cell(60,5,'Nombre','T',0,'C');
		$pdf->Cell(3);
		$pdf->Cell(60,5,'Paterno','T',0,'C');
		$pdf->Cell(3);
		$pdf->Cell(60,5,'Materno','T',1,'C');
		
		//datos de nacimiento
		$pdf->setFont('Arial','B',8);
		$a_nac = substr($res['fec_nac_def'],0,4);
		$m_nac = substr($res['fec_nac_def'],4,2);
		$d_nac = substr($res['fec_nac_def'],6,2);
		$pdf->Cell(70,5,"Fecha de Nacimiento: $a_nac-$m_nac-$d_nac",0,0,'L');
		$pdf->Cell(10);
		$pdf->Cell(20,5,"Entidad de Nacimiento: ",0,0,'R');
		$pdf->Cell(50,5,utf8_decode($nacimiento),0,0,'C');
		$pdf->Cell(10);
		$pdf->Cell(10,5,utf8_decode($res['ent_nac_def']),0,1,'C');
		$pdf->setFont('Arial','',7);
		$pdf->Cell(30);
		$pdf->Cell(17,5,'','T',0,'C');
		$pdf->Cell(53);
		$pdf->Cell(50,5,'Estado','T',0,'C');
		$pdf->Cell(10);
		$pdf->Cell(10,5,'Cve.','T',1,'C');
		
		//datos del domicilio
		$pdf->setFont('Arial','B',8);
		$pdf->Cell(80,5,utf8_decode($res['calle_def']),0,0,'C');
		$pdf->Cell(10,5,utf8_decode($res['exterior_def']),0,0,'C');
		$pdf->Cell(10,5,utf8_decode($res['interior_def']),0,0,'C');
		$pdf->Cell(90,5,utf8_decode($res['colonia_def']),0,1,'C');
		$pdf->setFont('Arial','',7);
		$pdf->Cell(3);
		$pdf->Cell(77,5,'Calle','T',0,'C');
		$pdf->Cell(2);
		$pdf->Cell(8,5,'No.Ext.','T',0,'C');
		$pdf->Cell(2);
		$pdf->Cell(8,5,'No.Int.','T',0,'C');
		$pdf->Cell(1);
		$pdf->Cell(88,5,'Colonia o Localidad','T',1,'C');
		
		//datos del acta
		$pdf->setFont('Arial','B',8);
		$pdf->Cell(30,5,utf8_decode($res['acta_def']),0,0,'C');
		$pdf->Cell(60,5,utf8_decode($res['cve_mun_def']),0,0,'C');
		$pdf->Cell(50,5,utf8_decode($res['entidad_def']),0,1,'C');
		$pdf->setFont('Arial','',7);
		$pdf->Cell(3);
		$pdf->Cell(27,5,utf8_decode('Núm. de Acta'),'T',0,'C');
		$pdf->Cell(2);
		$pdf->Cell(58,5,'Municipio','T',0,'C');
		$pdf->Cell(2);
		$pdf->Cell(48,5,'Entidad','T',1,'C');
		
	}
	$y = $pdf->getY();
	
	/***************************************
		Comienza recopilacion 
		de resultados de entrevista	
	***************************************/
	/**************************************/
	$pdf->Rect($x,$y,95,158);
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(95,4,utf8_decode("1. CONDICIÓN DE LA ENTREVISTA"),1,1,'C',1);
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("1.1 ¿Se realizó la entrevista?"),0,1,'C');
	$pdf->Cell(10,5,"Fecha: ",0,0,'L');
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(2);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(2);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(10,5,"Hora: ",0,0,'L');
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(7,4,":",'LB',0,'R');
	$pdf->Cell(5,4,"",'RB',0);
	$pdf->Cell(5,4,"",'LRB',1);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(10);
	$pdf->Cell(10,5,utf8_decode("Día"),0,0,'C');
	$pdf->Cell(2);
	$pdf->Cell(10,5,utf8_decode("Mes"),0,0,'C');
	$pdf->Cell(2);
	$pdf->Cell(20,5,utf8_decode("Año"),0,1,'C');
	$pdf->setFont('Arial','',8);
	$pdf->Cell(20,5,utf8_decode("1. Sí se realizó"),0,0,'L');
	
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+60,$yc-5);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+60,$yc,8,8);
	
	$pdf->setXY($xc,$yc);
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 2)",0,1,'L');
	$pdf->setFont('Arial','',8);
	$pdf->Cell(10,5,utf8_decode("2. No"),0,0,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 1.2)",0,1,'L');
	
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("1.2 ¿Por qué no se realizó la entrevista?"),'T',1,'C');
	$pdf->Cell(95,5,utf8_decode("1. No se localizó el domicilio"),0,1,'L');
	$pdf->Cell(95,5,utf8_decode("2. Es vivienda deshabitada"),0,1,'L');
	$pdf->Cell(30,5,utf8_decode("3. Es otro uso de suelo"),0,1,'L');
	$pdf->Cell(95,5,utf8_decode("4. Es lote baldío"),0,1,'L');
	$pdf->Cell(95,5,utf8_decode("5. Rechazo a la entrevista"),0,1,'L');
	
	//  recuadro
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+80,$yc-5);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+80,$yc,8,8);
	
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("6. Ausencia de ocupantes"),0,1,'L');
	$pdf->Cell(95,5,utf8_decode("7. No hubo informante adecuado"),0,1,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(95,5,utf8_decode("(Pasa al final del formato y anota tu nombre y firma)"),0,1,'C');
	/*******************************************/
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(95,4,utf8_decode("2. RECONOCIMIENTO DEL CIUDADANO"),1,1,'C',1);
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("¿Alguna de las imágenes (muestra las imágenes)"),0,1,'C');
	$pdf->Cell(95,5,utf8_decode("corresponde al ciudadano en cuestión?"),0,1,'C');
	$pdf->Cell(10,5,utf8_decode("1. Sí"),0,0,'L');
	
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+70,$yc);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+70,$yc+5,8,8);
	
	$pdf->setXY($xc,$yc);
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 3.1)",0,1,'L');
	$pdf->setFont('Arial','',8);
	$pdf->Cell(70,5,utf8_decode("¿Cuál es?"),0,1,'C');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(70,5,utf8_decode("marca con una X"),0,1,'C');
	$pdf->Cell(10);
	$pdf->Cell(5,5,"C1",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C2",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C3",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C4",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C5",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C6",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C7",1,0,'C');
	$pdf->Cell(5);
	$pdf->Cell(5,5,"C8",1,1,'C');
	$pdf->setFont('Arial','',8);
	$pdf->Cell(10,5,utf8_decode("2. No"),0,0,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 5)",0,1,'L');
	
	/*******************************************/
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(95,4,utf8_decode("3. RESIDENCIA DEL CIUDADANO"),1,1,'C',1);
	$pdf->setFont('Arial','',8);
	$pdf->MultiCell(95,5,utf8_decode("3.1 ¿Vive ".$nombre." en ".$domicilio."?"),0,'L',0);
	$pdf->ln(2);
	$pdf->Cell(10,5,utf8_decode("1. Sí"),0,0,'L');
	
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+70,$yc-5);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+70,$yc,8,8);
	
	$pdf->setXY($xc,$yc);
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 4)",0,1,'L');
	$pdf->setFont('Arial','',8);
	$pdf->Cell(10,5,utf8_decode("2. No"),0,0,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 3.2)",0,1,'L');
	
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("3.2 ¿Por qué no vive aquí el ciudadano?"),'T',1,'C');
	$pdf->Cell(20,5,utf8_decode("1. Falleció"),0,0,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 4)",0,1,'L');
	
	//  recuadro
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+80,$yc-5);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+80,$yc,8,8);
	
	$pdf->setFont('Arial','',8);
	$pdf->Cell(30,5,utf8_decode("2. Cambió de domicilio"),0,0,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 5)",0,1,'L');
	$pdf->setFont('Arial','',8);
	$pdf->Cell(30,5,utf8_decode("3. Nunca ha vivido aquí"),0,0,'L');
	$pdf->setFont('Arial','IB',7);
	$pdf->Cell(10,5,"(pasa a 5)",0,1,'L');
	
	/*******************************************/
	$pdf->setXY($x,225);
	$x3 = $pdf->getX();
	$y3 = $pdf->getY();
	$pdf->setXY($x3,$y3+4);
	$pdf->Rect($x3,$y3+4,190,42);
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(190,4,utf8_decode("7. NOMBRE Y FIRMA DEL VISITADOR DOMICILIARIO"),1,1,'C',1);
	$pdf->ln(8);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(5);
	$pdf->Cell(120,5,"Nombre",'T',0,'C');
	$pdf->Cell(5);
	$pdf->Cell(50,5,"Firma",'T',1,'C');
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(190,4,utf8_decode("8. Vo.Bo. DEL VOCAL DISTRITAL"),1,1,'C',1);
	$pdf->ln(2);
	$pdf->Cell(15,5,"Fecha: ",0,0,'L');
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(2);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(2);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',0);
	$pdf->Cell(5,4,"",'LRB',1);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(15);
	$pdf->Cell(10,5,utf8_decode("Día"),0,0,'C');
	$pdf->Cell(2);
	$pdf->Cell(10,5,utf8_decode("Mes"),0,0,'C');
	$pdf->Cell(2);
	$pdf->Cell(20,5,utf8_decode("Año"),0,1,'C');
	$pdf->ln(5);
	$pdf->Cell(5);
	$pdf->Cell(120,5,"Nombre",'T',0,'C');
	$pdf->Cell(5);
	$pdf->Cell(50,5,"Firma",'T',1,'C');
	
	/*******************************************
					Segunda columna
	/*******************************************/
	$pdf->setXY(105,$y);
	$pdf->Rect(105,$y,95,158);
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(95,4,utf8_decode("4. DATOS DEL CIUDADANO"),1,1,'C',1);
	$pdf->setX(105);
	$pdf->setFont('Arial','',8);
	$pdf->MultiCell(95,5,utf8_decode("¿Me puede proporcionar la clave de registro de población (CURP) del ciudadano en cuestión?"),0,'L',0);
	$pdf->ln();
	$pdf->setX(105);
	$pdf->Cell(20,5,utf8_decode("1. Sí"),0,1,'L');
	$pdf->setX(105);
	$pdf->setFont('Arial','B',7);
	$pdf->Cell(95,5,utf8_decode("Anota la CURP del ciudadano en cuestión:"),0,1,'C');
	$pdf->setX(105);
	$pdf->Cell(10);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',0);
	$pdf->Cell(4,4,"",'LRB',1);
	$pdf->setX(105);
	
	//  recuadro
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+80,$yc);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+80,$yc+5,8,8);
	
	$pdf->setX(105);
	$pdf->setFont('Arial','',8);
	$pdf->Cell(30,5,utf8_decode("2. No"),0,1,'L');
	$pdf->setX(105);
	$pdf->setFont('Arial','BI',7);
	$pdf->Cell(95,5,utf8_decode("(pasa a 5)"),0,1,'C');
	
	/********************************************/
	$pdf->setX(105);
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(95,4,utf8_decode("5. DATOS DEL INFORMANTE"),1,1,'C',1);
	$pdf->setX(105);
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("El informante es:"),0,1,'C');
	$pdf->setX(105);
	$pdf->Cell(95,5,utf8_decode("1. El ciudadano en cuestión"),0,1,'L');
	$pdf->setX(105);
	$pdf->Cell(95,5,utf8_decode("2. Padre o Madre"),0,1,'L');
	$pdf->setX(105);
	$pdf->Cell(95,5,utf8_decode("3. Esposo(a)"),0,1,'L');
	$pdf->setX(105);
	$pdf->Cell(95,5,utf8_decode("4. Hermano(a)"),0,1,'L');
	$pdf->setX(105);
	$pdf->Cell(95,5,utf8_decode("5. Hijo(a)"),0,1,'L');
	$pdf->setX(105);
	$pdf->Cell(95,5,utf8_decode("6. Abuelo(a)"),0,1,'L');
	$pdf->setX(105);
	$pdf->Cell(30,5,utf8_decode("7. Otro parentesco"),0,1,'L');
	$pdf->setFont('Arial','',7);
	$pdf->setX(105);
	$pdf->Cell(30);
	$pdf->Cell(30,5,utf8_decode("Especifíca"),'T',1,'C');
	
	$pdf->setX(105);
	$pdf->setFont('Arial','I',7);
	$xc = $pdf->getX();
	$yc = $pdf->getY();
	$pdf->setXY($xc+80,$yc);
	$pdf->Cell(8,5,utf8_decode("Código"),0,1,'C');
	$pdf->Rect($xc+80,$yc+5,8,8);
	
	$pdf->setX(105);
	$pdf->setFont('Arial','',8);
	$pdf->Cell(95,5,utf8_decode("8. Informante no familiar"),0,1,'L');
	$pdf->setX(105);
	$pdf->setFont('Arial','BI',7);
	$pdf->Cell(95,5,utf8_decode("(pasa a 6)"),0,1,'C');
	
	/*******************************************/
	$pdf->setX(105);
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(95,4,utf8_decode("6. DATOS DEL CIUDADANO ENTREVISTADO"),1,1,'C',1);
	$pdf->setX(105);
	$pdf->ln(10);
	$pdf->setFont('Arial','',8);
	$pdf->setX(105);
	$pdf->Cell(2);
	$pdf->Cell(90,5,utf8_decode("Nombre        Apellido Paterno        Apellido Materno"),'T',1,'C');
	$pdf->setX(105);
	$pdf->ln(15);
	$pdf->setX(105);
	$pdf->Cell(2);
	$pdf->Cell(90,5,utf8_decode("Firma"),'T',1,'C');
	
	
}

function Hoja2($folio, $entidad)
{
	require('src/conexion2.php');
	$ent_def = $entidad;
	#$ruta_foto = "D:\DATOS\No identificados\No Identificados\entidad_15/";
	$ruta_foto = "D:\DATOS\No_identificados\No_Identificados\fotos/";
	/*
	* Query de candidatos
	*/
	$datos_can = "select 
				consec_can as candidato, 
				paterno_can||' '||materno_can||' '||nombre_can as nombre,
				calle_can||' '||exterior_can||' '||interior_can as domicilio,
				colonia_can as colonia,
				ent_nac_can||' FECHA NAC: '||fec_nac_can as datos_nac,
				entidad_can||'  DIS: '||distrito_can||'  MUN: '||municipio_can||'  SEC: '||seccion_can||'  LOC: '||localidad_can as entidad
				from lis_candidatos_can where folio_def='$folio' order by consec_can";
	$dcan = pg_query($conn, $datos_can);
	while($res = pg_fetch_assoc($dcan)){
	
	//coloco la foto del candidato
	switch($res['candidato']){
		case 1:
				$valx=$this->getX();
				$valy=$this->getX()+40;
				$this->setXY($valx, $valy);
		break;
		case 3:
		case 5:
		case 7:
				$valx=$this->getX();
				$valy=$this->getX()+45;
				$this->setXY($valx, $valy);
		break;
		case 2:
		case 4:
		case 6:
		case 8:
				$valx=110;
				$this->setXY($valx,$valy);
		break;
	}
	$this->setFont('Arial','',8);
	$filas_a = "";
	foreach($res as $campo => $valor){
		$campo = strtoupper($campo);
		$valor = utf8_decode($valor);
		if($campo == "DATOS_NAC"){$campo = "ENTIDAD NAC";}
		if($campo == "CANDIDATO"){
			$this->setFont('Arial','B',9);
			$this->Cell(90,5,"$campo: $valor",1,1,'R',1);
			$this->Rect($valx,$valy+5, 90,35);
			if(filesize($ruta_foto."ENTIDAD_$ent_def/FOTO_$folio-00$res[candidato].jpg")>0){
			$this->Cell(20,30,$this->Image($ruta_foto."ENTIDAD_$ent_def/FOTO_$folio-00$res[candidato].jpg",$valx+0.5,$valy+6,20,0),0,0);
			}else{
			$this->Cell(20,30,$this->Image("./src/pixel.jpg",$valx+0.5,$valy+6,20,0),0,0);
			}
		}else{
			$this->setX($valx+20);
			$this->setFont('Arial','',8);
			$filas_a .= "$campo: $valor \n";
		}
	}
	$this->Multicell(70,5,$filas_a,0,'L');
	}
}

function Header() {
		global $cbarras;
		$this->Image('src/logo.jpg',10,8,40);
		$this->SetFont('Arial','B',8.5);
		$this->Cell(10);
		$x=$this->getX();
		$y=$this->getY();
		$this->setXY(180,$y);
		$this->Cell(0,5,$cbarras);
		$this->setXY($x,$y);
		$this->MultiCell(0,5,utf8_decode("TESTIMONIAL DE CORROBORACIÓN DE DATOS\nNOTIFICACIONES DE DEFUNCIÓN NO IDENTIFICADAS\n"),0,'C');
		$this->Ln(2);
	
}

function Footer() {
		$this->SetY(-15);
		$this->SetFont('Arial','I',10);
		$this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
		$this->SetX(230);
		$this->Cell(20,10,fecha_hoy());
}
	
function PrintDatos($folio, $entidad)
{	
	$this->AddPage();
	$this->Hoja1($folio);
	$this->AddPage();
	$this->Hoja2($folio, $entidad);
}

}

$entidad = $argv[1];
$mun = $argv[2];
$nombre_arch = "Testimoniales_".$entidad."_".$mun.".pdf";
#$qry = "select folio_def from lis_defunciones_def where id_est=2 and cve_ent_def='$entidad' and cve_mun_def='$mun' order by cve_mun_def, colonia_def, folio_def limit 10;";
$qry = "select folio_def from lis_defunciones_def where id_est=2 and cve_ent_def='$entidad' order by folio_def limit 10;";
$qry = pg_query($conn, $qry);


$pdf=new PDF();
$pdf->SetTitle("COORDINACIÓN DE OPERACIÓN EN CAMPO");
$pdf->SetAuthor('IFE - DDVC');

while($res = pg_fetch_assoc($qry)){
	$cbarras = $res['folio_def'];
	$pdf->PrintDatos($res['folio_def'], $entidad);
}

#$pdf->PrintDatos();
$file=$nombre_arch;
#$file.='.pdf';
$pdf->Output($file,'D:\Cedulas/No_id/',"F");

?> 
