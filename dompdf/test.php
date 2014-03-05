<?php
	// HTML to PDF in PHP
	// ejemplo de utilización de la clase dompdf
	// http://www.parentesys.com
	
	
	if (!isset($_GET["op"])) { $op = ""; } else { $op = trim($_GET["op"]); } 
	

	// construimos el HTML para el mensaje
	$strHTML =            "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><HTML xmlns='http://www.w3.org/1999/xhtml' xml:lang='es'>";
	$strHTML = $strHTML . "<HEAD><TITLE>HTMLtoPDFinPHP</TITLE><meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'></HEAD>" ;
	$strHTML = $strHTML . "<BODY>" ;
	$strHTML = $strHTML . "<TABLE border=0 cellpadding=2 cellspacing=2 width='100%'>" ;
	$strHTML = $strHTML . "<TR><TD align='center'>&nbsp;&nbsp;<img src='http://www.parentesys.com/images/logo_parentesys.gif' width='150px'></TD></TR>";
	$strHTML = $strHTML . "<TR><TD align='center'><b>PRUEBAS HTMLtoPDFinPHP</b>&nbsp;&nbsp;</TD></TR>";
	$strHTML = $strHTML . "<TR><TD align='center'>www.parentesys.com&nbsp;&nbsp;</TD></TR>" ;
	$strHTML = $strHTML . "<TR><TD align='center'><br><br><h1>En este ejemplo vemos como transformar una cadena HTML en un PDF</h1></TD></TR>" ;
	$strHTML = $strHTML . "</TABLE>" ;
	$strHTML = $strHTML . "</BODY>" ;
	$strHTML = $strHTML . "</HTML>";
	

	// si hemos pulsado el boton de PDF desde el listado de factura, pasa por aqui.	
	if ($op=="pdf") {
				// generamos PDF
				require_once("dompdf-0.5.1/dompdf_config.inc.php");
				
				$dompdf = new DOMPDF();
				$dompdf->load_html($strHTML);
				$dompdf->render();
				#guardar archivo
				// $dompdf->stream("HTMLtoPDFinPHP.pdf");
				#abrir en navegador
				$dompdf->stream("NewPDF.pdf", array("Attachment" => 1));
				
	
	}
	
				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<HEAD>
	<TITLE>HTMLtoPDFinPHP</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" href='http://www.parentesys.com/css/estilos.css' type="text/css">
</HEAD>

<body leftmargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0" scroll="yes">

    <BR><BR>
	<center>
	  <form name='formFactura' id='formFactura' method='post' action="test.php?op=pdf">  
		<table>
		  <tr>	
			<td>  
					<br>      
					<?php echo $strHTML; ?>
					<br> 
			</td>
		  </tr>
		  
		  <tr>
		      <td align="center">
			    <input type="submit"
			    	id="btnAceptar"
			    	name="btnAceptar"
			   	    title="crear PDF"
					value="crear PDF"/>
		      </td>
		  </tr>     
		</table>
	  </form>
 	</center> 
	

</body>

</html>