<?php include('ftp.php'); 
$File=$_GET['f'];
#$FilePDF="MDIS_11564.pdf";
#header ("Content-Type:text/xml");
#header("Content-type: application/pdf");
if(SearchFile($File)){
	#header("Content-type: application/pdf");
	#header ("Content-Type: text/xml");
	echo ReWriteFile($File);
}else{echo "Error";}
?>