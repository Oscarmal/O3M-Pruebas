<?php
/**
* @author		unknown
* @description	Crea la cadena para la adenda de Walmart
* @mod			Oscar Maldonado
* @date			2013-04-15
*
**/
'<Documento>';
"UNB+UNOA:3+SEC031:ZZ+925485MX00:8+".fecha."+".serie.folio."'"; //Linea ¿? Header /*Revisar*/
"UNH+1+INVOIC:D:01B:UN:"."AMC7.1'"; //AMECE Versión para GLN
"BGM+380+".folio."+".statuscfd."'"; //folio y status	/*Revisar*/
"DTM+137:".$fechaEdi.":102'"; //fecha del comprobante
"FTX+ZZZ+++".montoLetra."+ES'"; //monto con texto
"RFF+ON:".OrdendeCompra."'"; //orden de compra
"DTM+171:".$fechaEdi.":102'"; //fecha de la orden de compra
"RFF+BT:".serie."'"; //serie del docto/factura
"RFF+ATZ:".noaprob."'"; //no de aprobacion de folios

## Datos del Comprador
"NAD+BY+"."7507003100001"."::9++"."NUEVA WAL MART DE MEXICO S DE RL DE:CV+NEXTENGO NO. 78:SANTA CRUZ ACAYUCAN+AZCAPOTZALCO+D.F.+02770+MEX'"; // Global Location Number y Dirección de comprador
"RFF+GN:NWM9709244W4'"; // RFC del comprador

## Datos del provedor	
"NAD+SU+".GLN."++".razonsocial."+".$address=$row_empresa['calle']." ".$row_empresa['noExt']." ".$row_empresa['noInt'].":".colonia."+".delmun."+".entidad."+".cp."+MEX'"; // GLN y Dirección de provedor
"RFF+GN:".RFC."'"; // RFC de provedor
"RFF+IA:"."068012409"."'"; // ID_vendor registrado por Walmart para Innova

## Dirección de envío
"NAD+ST+".ship_to_GLN."::9++"."+".NombreLugEnt."+".CalleNum.":".colonia."+".delegacion."+".$HASHTABLE['sh_sta']."+".poc."+MEX'"; // GLN, Nombre y direccion de envío

"CUX+2:"."MXN".":4'"; //Tipo de Moneda
"PAT+1++5:3:D:".pay_day."'"; //Días de pago / vencimiento

## PARTIDAS = n lineas
		$lines=count($factura->partidas);
		$partidan=0;
		$totalAmount=0;
		$totalArticulosF=0;
		$nlotes=0;
	foreach($factura->partidas as $p_part){
		$partidan++;
		$cantidadArts=$p_part->cantidad;
		$totalArticulosF+=doubleval($cantidadArts);
		$fechaPed="";
		$numPed="";
		if(isset($p_part->aduana) && !empty($p_part->aduana)){
			$fechaPed=$p_part->fechaaduana;
			$numPed=$p_part->numaduana;
		}
		$totalAmount+=$p_part->valor;
		$eanArt=$p_part->ean; // se esta tomando este valor de sku por que en las bases de datos estan guardadas ahi, y deberia ser ean y ahi esta vacio en las BD
		$skuArt=$p_part->sku;
		$txtArt=$p_part->concepto.$p_part->descripcion2;
		$amoArt=number_format($p_part->unitario,2,".","");
		$impArt=number_format($p_part->valor,2,".","");
		$codigo_dts=$p_part->codigo_catalogo;//fsm 
		//$codigo_dts=666;//fsm 
		$impuestosPartida=0;
		if(count($p_part->impuestos)>0){
			$pimpsmnt=$p_part->impuestos[0];
			$impuestosPartida=number_format($pimpsmnt->monto,2,".","");
		}
		$taxArt=number_format($impuestosPartida,2,".","");
		$nlotes++;
		
		"LIN+".partida."++".codigo_dts.":SRV:9'"; //No. de linea y codigo UPC/EAN	
		"IMD+F++:::".$txtArt."::"."ES"."'"; // Descripción de linea e idioma (ES:Español)
		"QTY+47:".$cantidadArts.":"."EA"."'"; // Cantidad y unidad de medida (EA:pza/CA:caja) de linea
		"MOA+203:".$impArt."'"; // Precio total de linea (Unitario*Cantidad) 
		"PRI+AAA:".$amoArt."::::"."EA"."'"; // Precio unitario de linea por (pza/caja)		
		## Aduana
		if(isset(aduana) && !empty(p_part->aduana)){	
			"NAD+CM+"."7500000000000"."++".$p_part->aduana."'"; // Campo custom para aduana
			"RFF+TN+".$numPed."'"; // Numero de pedimiento 
			"DTM+171+".FECHA_DE_EDI.":102'"; // Fecha de expedicion de documento aduanero 
		}
		## Impuestos
		if(doubleval($taxArt)!=0){
			"TAX+7+VAT+++:::"."16.00"."+C'"; // IVA 16% de linea
		}else{
			"TAX+7+VAT+++:::"."0.00"."+C'"; // IVA 0% de linea
		}
		"MOA+124:".$taxArt."'"; // Total de IVA  de linea
	}

## Resumen de factura
"UNS+S'"; // Comienza detalle
"CNT+2:".lines; // Total de lineas
"MOA+9:".total,2; // Total a pagar
"MOA+79:".subtotal; // Monto total de las líneas de artículos
"MOA+125:".subtotal; // Importe antes del impuesto (Subtotal)
if(IMPtotalTraslados!=0)
	$map.="TAX+7+VAT+++:::"."16.00"."+C'"; // Porcentaje aplicado de IVA
else
	$map.="TAX+7+VAT+++:::"."0.00"."+C'"; // Porcentaje aplicado de IVA
"MOA+124:".totalTraslados; // Total de impuestos
"UNT+".elementos."+1'"; // 
"UNZ+1+".serie.folio; // 

'<documento>';

/**/
?>