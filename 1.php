<?php
require('src/pdf/fpdf2.php');
require('src/funciones.php');
#include("../src/conex.php");
import_request_variables("g,P","v_");

class PDF extends FPDF
{


function Hoja1()
{
	
	$fotos = 'D:\DATOS\SDI\fotos/';
	
	//fotos
	$row['t_remesa'] = "2008_50";
	$fol_foto = 19160;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,10,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,37,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,65,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,89,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,115,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,150,26);$fol_foto++;
	
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,10,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,37,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,65,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,89,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,115,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,150,26);$fol_foto++;
	
	
}

function Hoja2()
{
	
	$fotos = 'D:\DATOS\SDI\fotos/';
	
	//fotos
	$row['t_remesa'] = "2008_49";
	$fol_foto = 18639;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,10,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,37,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,65,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,89,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,115,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',75,150,26);$fol_foto++;
	
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,10,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,37,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,65,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,89,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,115,26);$fol_foto++;
	$this->Image($fotos.$row['t_remesa'].'/T_0'.$fol_foto.'_FOTO.JPG',150,150,26);$fol_foto++;
	
	$this->Image('src/pixel.jpg',100,190,26);

	
	
}

function Header() {
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
	
function PrintDatos()
{	
	$x=1;
	while($x<=10){
	$this->AddPage();
	$this->Hoja1();
	$this->AddPage();
	$this->Hoja2();
	$x++;
	}
}
}
$pdf=new PDF();
$title="COORDINACIÓN DE OPERACIÓN EN CAMPO";
$pdf->SetTitle($title);
$pdf->SetAuthor('IFE - DDVC');
$pdf->PrintDatos();
$file='valres_'.'prueba_imagenes';
$file.='.pdf';
$pdf->Output($file,'D:\Cedulas/No_id/',"F");

?> 
