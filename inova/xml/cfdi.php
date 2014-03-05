<?php
/**
*@author		Oscar Maldonado
*@date			2013-04-09
*@description	Lee un archivo xml con el formato CFDI
*				(factura electr�nica) y muestra su contenido.
*
**/

echo '<form name="fForm"  method="post" enctype="multipart/form-data" action="'.$PHP_SELF.'">XML File: <input name="xmlFile" type="file" id="xmlFile" onchange="submit();" /></form>';
if (is_uploaded_file($_FILES['xmlFile']['tmp_name'])) {
	//---Crea objeto xml
	$xml = simplexml_load_file($_FILES['xmlFile']['tmp_name']);
	#$xml = simplexml_load_file('cfdi.xml');
	//---Define prefijos para Xpath
	$NameSpaces=$xml->getNamespaces(true);
	$ns=array('cfdi','tfd', 'ecfd', 'xmlns', 'xsi', 'xmlns');
	for ($x=1; $x<=count($ns); $x++){
		$xml->registerXPathNamespace($ns[$x], $NameSpaces[$ns[$x]]);
	}
	
	/*
	//---Crea arreglo con nombres de etiquetas padre, hijas y dependientes
	$Own=array('Comprobante'=>'//cfdi:Comprobante');
	$Parents=array(
				'Emisor'=>$Own['Comprobante'].'//cfdi:Emisor',
				'Receptor'=>$Own['Comprobante'].'//cfdi:Receptor',
				'Conceptos'=>$Own['Comprobante'].'//cfdi:Conceptos',
				'Impuestos'=>$Own['Comprobante'].'//cfdi:Impuestos',
				'Complemento'=>$Own['Comprobante'].'//cfdi:Complemento',
				'Adenda'=>$Own['Comprobante'].'//cfdi:Adenda'
				);
	$Childs = array(
				//---Datos de emisor
				'DomicilioFiscal'=>$Parents['Emisor'].'//cfdi:DomicilioFiscal',
				'ExpedidoEn'=>$Parents['Emisor'].'//cfdi:ExpedidoEn',
				'RegimenFiscal'=>$Parents['Emisor'].'//cfdi:RegimenFiscal',
				//---Datos de receptor
				'ReceptorDomicilio'=>$Parents['Receptor'].'//cfdi:Domicilio',
				//---Datos de Conceptos
				'Concepto'=>$Parents['Conceptos'].'//cfdi:Concepto',
				//---Datos de impuestos
				'Traslados'=>$Parents['Impuestos'].'//cfdi:Traslados//cfdi:Traslado',
				//---Datos de timbre fiscal digital
				'TimbreFiscalDigital'=>$Parents['Complemento'].'//tfd:TimbreFiscalDigital',
				//---Datos de adenda
				'ecfd'=>$Parents['Adenda'].'//ecfd:ECFD'
				);
	$ecfd_Parents = array(
				//---Adenda
				'Documento'=>$Childs['ecfd'].'//ecfd:Documento',			
				//---Campos Personalizados
				'Personalizados'=>$Childs['ecfd'].'//ecfd:Personalizados'			
				);
	$ecfd_Childs = array(
				//---Campos de Documento
				'Encabezado'=>$ecfd_Parents['Documento'].'//ecfd:Encabezado',
				'Detalle'=>$ecfd_Parents['Documento'].'//ecfd:Detalle',
				'Referencia'=>$ecfd_Parents['Documento'].'//ecfd:Referencia',
				'TimeStamp'=>$ecfd_Parents['Documento'].'//ecfd:TimeStamp',
				//---Campos Personalizados
				'CampoString'=>$ecfd_Parents['Personalizados'].'//ecfd:campoString'
				);
	$ecfd_Childs_Doc = array(
				//---Encabezado-IdDoc
				'IdDoc'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc',
				'NroAprob'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//NroAprob',
				'AnoAprob'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//AnoAprob',
				'Tipo'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//Tipo',
				'Serie'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//Serie',
				'Folio'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//Folio',
				'Estado'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//Estado',
				'NumeroInterno'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//NumeroInterno',
				'FechaEmis'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//FechaEmis',
				'FormaPago'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//FormaPago',
				'MedioPago'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//MedioPago',
				'LugarExpedicion'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//LugarExpedicion',
				'NumCtaPago'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//NumCtaPago',
				'CondPago'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//CondPago',
				'TermPagoCdg'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//TermPagoCdg',
				'TermPagoDias'=>$ecfd_Childs['Encabezado'].'//ecfd:IdDoc'.'//TermPagoDias',
				//---Encabezado-ExEmisor
				'ExEmisor'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor',
				'RFCEmisor'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//RFCEmisor',
				'NmbEmisor'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//NmbEmisor',
				//---Encabezado-ExEmisor-DomFiscal
				'DomFiscal'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal',
				'DFCalle'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//Calle',
				'DFNroExterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//NroExterior',
				'DFNroInterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//NroInterior',
				'DFColonia'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//Colonia',
				'DFMunicipio'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//Municipio',
				'DFEstado'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//Estado',
				'DFPais'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//Pais',
				'DFCodigoPostal'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//DomFiscal'.'//CodigoPostal',
				//---Encabezado-ExEmisor-LugarExpedicion
				'LugarExped'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped',
				'LECalle'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//Calle',
				'LENroExterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//NroExterior',
				'LENroInterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//NroInterior',
				'LEColonia'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//Colonia',
				'LEMunicipio'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//Municipio',
				'LEEstado'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//Estado',
				'LEPais'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//Pais',
				'LECodigoPostal'=>$ecfd_Childs['Encabezado'].'//ecfd:ExEmisor'.'//LugarExped'.'//CodigoPostal',
				//---Encabezado-ExReceptor
				'ExReceptor'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor',
				'RFCRecep'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//RFCRecep',
				'NmbRecep'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//NmbRecep',
				//---Encabezado-ExReceptor-DomFiscal
				'DomFiscalRcp'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp',
				'RDFCalle'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//Calle',
				'RDFNroExterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//NroExterior',
				'RDFNroInterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//NroInterior',
				'RDFColonia'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//Colonia',
				'DFMunicipio'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//Municipio',
				'RDFEstado'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//Estado',
				'RDFPais'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//Pais',
				'RDFCodigoPostal'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//DomFiscalRcp'.'//CodigoPostal',
				//---Encabezado-ExReceptor-LugarRecepcion
				'LugarExped'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep',
				'LECalle'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//Calle',
				'LENroExterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//NroExterior',
				'LENroInterior'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//NroInterior',
				'LEColonia'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//Colonia',
				'LEMunicipio'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//Municipio',
				'LEEstado'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//Estado',
				'LEPais'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//Pais',
				'LECodigoPostal'=>$ecfd_Childs['Encabezado'].'//ecfd:ExReceptor'.'//LugarRecep'.'//CodigoPostal',
				//---Encabezado-ExReceptor-Totales			
				'Totales'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales',
				'Moneda'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//Moneda',
				'FctConv'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//FctConv',
				'SubTotal'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//SubTotal',
				'MntDcto'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//MntDcto',
				'MntBase'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//MntBase',
				'MntImp'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//MntImp',
				'VlrPagar'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//VlrPagar',
				'VlrPalabras'=>$ecfd_Childs['Encabezado'].'//ecfd:Totales'.'//VlrPalabras',
				//---Encabezado-ExReceptor-ExImpuestos	
				'ExImpuestos'=>$ecfd_Childs['Encabezado'].'//ecfd:ExImpuestos',
				'TipoImp'=>$ecfd_Childs['Encabezado'].'//ecfd:ExImpuestos'.'//TipoImp',
				'TasaImp'=>$ecfd_Childs['Encabezado'].'//ecfd:ExImpuestos'.'//TasaImp',
				'MontoImp'=>$ecfd_Childs['Encabezado'].'//ecfd:ExImpuestos'.'//MontoImp',
				//---Detalle
				'NroLinDet'=>$ecfd_Childs['Detalle'].'//ecfd:NroLinDet',
				'DscLang'=>$ecfd_Childs['Detalle'].'//ecfd:DscLang',
				'DscItem'=>$ecfd_Childs['Detalle'].'//ecfd:DscItem',
				'QtyItem'=>$ecfd_Childs['Detalle'].'//ecfd:QtyItem',
				'UnmdItem'=>$ecfd_Childs['Detalle'].'//ecfd:UnmdItem',
				'PrcNetoItem'=>$ecfd_Childs['Detalle'].'//ecfd:PrcNetoItem',
				'ImpuestosDet'=>$ecfd_Childs['Detalle'].'//ecfd:ImpuestosDet',
				'IDTipoImp'=>$ecfd_Childs['Detalle'].'//ecfd:ImpuestosDet'.'//TipoImp',
				'IDTasaImp'=>$ecfd_Childs['Detalle'].'//ecfd:ImpuestosDet'.'//TasaImp',
				'IDMontoImp'=>$ecfd_Childs['Detalle'].'//ecfd:ImpuestosDet'.'//MontoImp',
				'MontoNetoItem'=>$ecfd_Childs['Detalle'].'//ecfd:MontoNetoItem',
				//---Referencia
				'NroLinRef'=>$ecfd_Childs['Referencia'].'//ecfd:NroLinRef',
				'TpoDocRef'=>$ecfd_Childs['Referencia'].'//ecfd:TpoDocRef',
				'FolioRef'=>$ecfd_Childs['Referencia'].'//ecfd:FolioRef'			
				);
	#echo "---Parents----<br>";
	while(list($nombre,$valor)=each($Parents)){
		echo "'".$nombre."' => '".$valor."',<br/>";
	}
	#echo "---Childs----<br>";
	while(list($nombre,$valor)=each($Childs)){
		echo "'".$nombre."' => '".$valor."',<br/>";
	}
	#echo "---ECFD-Parents----<br>";
	while(list($nombre,$valor)=each($ecfd_Parents)){
		echo "'".$nombre."' => '".$valor."',<br/>";
	}
	#echo "---ECFD-Childs----<br>";
	while(list($nombre,$valor)=each($ecfd_Childs)){
		echo "'".$nombre."' => '".$valor."',<br/>";
	}
	#echo "---ECFD-Childs-Sub----<br>";
	while(list($nombre,$valor)=each($ecfd_Childs_Doc)){
		echo "'".$nombre."' => '".$valor."',<br/>";
	}
	*/
	
	$Traces = array(
			'Comprobante' => '//cfdi:Comprobante',
			'Emisor' => '//cfdi:Comprobante//cfdi:Emisor',
			'Receptor' => '//cfdi:Comprobante//cfdi:Receptor',
			'Conceptos' => '//cfdi:Comprobante//cfdi:Conceptos',
			'Impuestos' => '//cfdi:Comprobante//cfdi:Impuestos',
			'Complemento' => '//cfdi:Comprobante//cfdi:Complemento',
			'Adenda' => '//cfdi:Comprobante//cfdi:Adenda',
			'DomicilioFiscal' => '//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal',
			'ExpedidoEn' => '//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn',
			'RegimenFiscal' => '//cfdi:Comprobante//cfdi:Emisor//cfdi:RegimenFiscal',
			'ReceptorDomicilio' => '//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio',
			'Concepto' => '//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto',
			'Traslados' => '//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado',
			'TimbreFiscalDigital' => '//cfdi:Comprobante//cfdi:Complemento//tfd:TimbreFiscalDigital',
			'ecfd' => '//ecfd:ECFD',
			'Documento' => '//ecfd:ECFD//ecfd:Documento',
			'Personalizados' => '//ecfd:ECFD//ecfd:Personalizados',
			'Encabezado' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado',
			'Detalle' => '//ecfd:ECFD//ecfd:Documento//ecfd:Detalle',
			'Referencia' => '//ecfd:ECFD//ecfd:Documento//ecfd:Referencia',
			'TimeStamp' => '//ecfd:ECFD//ecfd:Documento//ecfd:TimeStamp',
			'CampoString' => '//ecfd:ECFD//ecfd:Personalizados//ecfd:campoString',
			'IdDoc' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:IdDoc',
			'ExEmisor' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExEmisor',
			'DomFiscal' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExEmisor//ecfd:DomFiscal',
			'LugarExped' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExEmisor//ecfd:LugarExped',
			'ExReceptor' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExReceptor',
			'DomFiscalRcp' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExReceptor//ecfd:DomFiscalRcp',
			'LugarRecep' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExReceptor//ecfd:LugarRecep',
			'Totales' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:Totales',
			'ExImpuestos' => '//ecfd:ECFD//ecfd:Documento//ecfd:Encabezado//ecfd:ExImpuestos',
			'ImpuestosDet' => '//ecfd:ECFD//ecfd:Documento//ecfd:Detalle//ecfd:ImpuestosDet'
			);
	//---Define los campos de cada seccion
	$Fields['Comprobante'] = array('NumCtaPago','LugarExpedicion','metodoDePago','tipoDeComprobante','total','Moneda','TipoCambio','descuento','subTotal','condicionesDePago','certificado','noCertificado','formaDePago','sello','fecha','folio','serie','version','xsi:schemaLocation','xmlns:cfdi','xmlns:xsi');
	$Fields['Emisor'] = array('rfc','nombre');
	$Fields['DomicilioFiscal'] = array('calle','noExterior','noInterior','colonia','municipio','estado','pais','codigoPostal');
	$Fields['ExpedidoEn'] = array('calle','noExterior','noInterior','colonia','municipio','estado','pais','codigoPostal');
	$Fields['RegimenFiscal'] = array('Regimen');
	$Fields['Receptor'] = array('rfc','nombre');
	$Fields['ReceptorDomicilio'] = array('calle','noExterior','noInterior','colonia','municipio','estado','pais','codigoPostal');
	$Fields['Concepto'] = array('cantidad','unidad','descripcion','valorUnitario','importe');
	$Fields['Impuestos'] = array('totalImpuestosTrasladados');
	$Fields['Traslados'] = array('impuesto','tasa', 'importe');
	$Fields['Complemento'] = array('');
	$Fields['TimbreFiscalDigital'] = array('version','UUID','FechaTimbrado','selloCFD','noCertificadoSAT','selloSAT','xmlns:tfd','xsi:schemaLocation');
	$Fields['Adenda'] = array('xmlns:ecfd','xsi:schemaLocation');
	$Fields['ecfd'] = array('version');
	$Fields['Documento'] = array('ID');
	$Fields['Encabezado'] = array('');
	$Fields['IdDoc'] = array('NroAprob','AnoAprob','Tipo','Serie','Folio','Estado','NumeroInterno','FechaEmis','FormaPago','MedioPago','LugarExpedicion','NumCtaPago','CondPago','TermPagoCdg','TermPagoDias');
	$Fields['ExEmisor'] = array('RFCEmisor','NmbEmisor',);
	$Fields['DomFiscal'] = array('Calle','NroExterior','NroInterior','Colonia','Municipio','Estado','Pais','CodigoPostal');
	$Fields['LugarExped'] = array('Calle','NroExterior','NroInterior','Colonia','Municipio','Estado','Pais','CodigoPostal');
	$Fields['ExReceptor'] = array('RFCRecep','NmbRecep',);
	$Fields['DomFiscalRcp'] = array('Calle','NroExterior','NroInterior','Colonia','Municipio','Estado','Pais','CodigoPostal');
	$Fields['LugarRecep'] = array('Calle','NroExterior','NroInterior','Colonia','Municipio','Estado','Pais','CodigoPostal');
	$Fields['Totales'] = array('Moneda','FctConv','SubTotal','MntDcto','MntBase','MntImp','VlrPagar','VlrPalabras');
	$Fields['ExImpuestos'] = array('TipoImp','TasaImp','MontoImp');
	$Fields['Detalle'] = array('NroLinDet','DscLang','DscItem','QtyItem','UnmdItem','PrcNetoItem','MontoNetoItem');
	$Fields['ImpuestosDet'] = array('TipoImp','TasaImp','MontoImp');
	$Fields['Referencia'] = array('NroLinRef','TpoDocRef','FolioRef');
	$Fields['Documento'] = array('TimeStamp');
	//---Campos Personalizados NOTA: @array(0=>Nombre de etiqueta, 1=>Nombre de atributo)
	//---		ejem: <[Etiqueta] [Atributo]="1">Txt</[Etiqueta]>
	$Fields['Personalizados'] = array('campoString','name');
	
	//---Imprime Resultados
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo '<script type="text/javascript" src="../../src/jquery-1.9.1.js"></script>';
	echo "<a href='".$_SERVER['PHP_SELF']."?v=".$v."'>[Collapse]</a>";
	if($_GET['v']>0 || !isset($v)){$ViewAll=""; $v=0; $v2='none'; $v3='';}else{$ViewAll="none"; $v=1; $v2=''; $v3='none';}
	//---Imprime una tabla por cada secci�n
	for($x=1; $x<=count($Fields); $x++){
		$Name=key($Fields);	
		if($Name=='Encabezado' && $type==0){$type=1;}
		#elseif($Name=='Concepto' && $type==0){$type=3;}
		elseif($Name=='Personalizados' && $type==1){$type=2; $TitleExtra=' - '.$Fields[$Name][0];}
		
		
		#elseif($Name=='Concepto' && $type==0){$type=3;}
		echo "<table width='500px' cellpadding='0' cellspacing='1'>
		<tr><td colspan='2' align='left' style='background-color:#999; color:#000; border: 1px solid #777;'>".
		"<span id='Show".$x."' style='display:".$v2."';>
		<a href='#' onclick='Show(Segment".$x.".id); Show(Hide".$x.".id); Hide(Show".$x.".id); '>[+]</a>
		</span>
		<span id='Hide".$x."' style='display:".$v3."';>
		<a href='#' onclick='Hide(Segment".$x.".id); Hide(Hide".$x.".id); Show(Show".$x.".id); '>[-]</a>
		</span>
		&nbsp;".key($Fields).$TitleExtra."</td></tr>
		<tr><td><div id='Segment".$x."' style='display:".$ViewAll."';><table width=500px; border=1  style=' border: 1px solid #777;'>";
		
		#$Fields[$Name]=array_reverse($Fields[$Name]);
		while(list(, $Field)=each($Fields[$Name])){
			if(empty($Field)){break;}		
			if($type==0){
				//---Con atributos con valores
				foreach ($xml->xpath($Traces[$Name]) as $cfdiData){
				  echo "<tr><td>".$Field."</td><td width='70%'>".$cfdiData[$Field]."</td></tr>";  
				}			
			}elseif($type==1){
				//---Sin atributos y con valores fuera de las etiquetas
				foreach ($xml->xpath($Traces[$Name].'//ecfd:'.$Field) as $cfdiData){
				  echo "<tr><td>".$Field."</td><td width='70%'>".$cfdiData[0]."</td></tr>";  
				}
			}elseif($type==2){
				//---Con atributos con valores y con valores fuera de las etiquetas
				foreach ($xml->xpath($Traces[$Name].'//ecfd:'.$Field) as $cfdiData){
					echo "<tr><td>".$cfdiData[$Fields[$Name][1]]."</td><td width='70%'>".$cfdiData[0]."</td></tr>";
				}
				
			}
		}
		echo "</table></div></td></tr></table>";
		next($Fields); 
	}
}
/**/
?>
<script>
function Show(Id) {
	//var Element = document.getElementById(Id);
	//Element.style.display = "";
	$("#"+Id).show('400');
}
function Hide(Id) {
	//var Element = document.getElementById(Id);
	//Element.style.display="none";
	$("#"+Id).hide('400');
}
</script>