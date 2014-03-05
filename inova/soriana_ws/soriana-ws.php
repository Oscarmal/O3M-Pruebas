<?php
function ws_soriana($invoice_xml){
/**
* Funcion para el cliente de webservises de soriana
* URL de Integracion(pruebas):
*      http://www2.soriana.com/integracion/recibecfd/wseDocRecibo.asmx
* URL de Produccion:
*      http://www.soriana.com/recibecfd/wseDocRecibo.asmx
* @var string $invoice_xml [Factura electronica]
*/
	require_once('nusoap-0.9.5/lib/nusoap.php');
	//creamos el objeto de tipo soapclient.
	$url = "http://www2.soriana.com/integracion/recibecfd/wseDocRecibo.asmx?wsdl";
	$soapclient = new nusoap_client($url, true);
	$soapclient->xml_encoding="UTF-8";
	echo $soapclient->call('RecibeCFD',array('XMLCFD'=>$invoice_xml));
	echo '<br>';
	print_r($soapclient->call('RecibeCFD',array('XMLCFD'=>$invoice_xml)));
	if ($soapclient->fault) {
		echo "\nError: ";
		print_r($soapclient->fault);
		echo "\n";
	}
	$err = $soapclient->getError();
	if ($err) {
		echo "\n<b>"."Constructor error \n \t</b>" . $err;
	}
	//echo "\n";
	echo "<pre>Request:</pre>";
	echo "<pre>".$soapclient->request."</pre>";
	//echo "\n";
	echo "<pre>Response:</pre>";
	echo "<pre>".$soapclient->response."</pre>";
	//echo "\n";
}
if(!($xml = simplexml_load_file("test.xml"))) die("Error al obtener el archivo");
$NameSpaces=$xml->getNamespaces(true);
$ns=array('cfdi','tfd', 'ecfd', 'xmlns', 'xsi', 'xmlns');
for ($x=1; $x<=count($ns); $x++){
	$xml->registerXPathNamespace($ns[$x], $NameSpaces[$ns[$x]]);
}
ws_soriana($xml);
#print_r($xml);
?>