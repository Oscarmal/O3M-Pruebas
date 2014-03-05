<?php include('ftp.php'); 
/** Busca por FTP archivos PDF y XML y los copia a /cfdi/results/ para mostrarlos */           
$file_pdf=$invoicesDTO->getDocSerial() . '_' . $invoicesDTO->getDocNum(). '.pdf';
$file_xml=$invoicesDTO->getDocSerial() . '_' . $invoicesDTO->getDocNum(). '.xml';
$file_xml_adenda=$invoicesDTO->getDocSerial() . '_' . $invoicesDTO->getDocNum(). '_A.xml';

/**/
#if(SearchFile($file_pdf)){
	/*Establece carpeta correspondiente al folio del invoice*/
	if($invoicesDTO->getDocNum()>=$total_folios){
		$Folder=floor($invoicesDTO->getDocNum()/$total_folios)*$total_folios;
	}else{$Folder=1;} 
	
	$FolderName=$Folder; 
	$FolderSerial='/'.$ftp_path.$invoicesDTO->getDocSerial().'/';                       
	$FolderNum=$FolderSerial.$FolderName.'/';

if($invoicesDTO->getViewed()<1 && $invoicesDTO->getDocSerial()!=''){
	//--Crea Directorio si no existe
	if(!CheckFolder($FolderSerial)){MakeDir($FolderSerial);}
	if(!CheckFolder($FolderNum)){MakeDir($FolderNum);}
	if(SearchFile('/'.$ftp_path.$file_pdf) && SearchFile('/'.$ftp_path.$file_xml) && ($invoicesDTO->getStatus()=='InProcess')){  

		$exito = updateStatus($invoicesDTO->getID_invoices()); // Actualiza Status a Certified
		$exit=updateRead($invoicesDTO->getID_invoices(),1);
		Update_Invoice_logs($ID_Invoices=$invoicesDTO->getID_invoices()); // Actualiza cu_invoices_logs
	}
}elseif($invoicesDTO->getViewed()>0 && $invoicesDTO->getDocSerial()!=''){ 

	if(SearchFile('/'.$ftp_path.$file_pdf)){
		MoveFile('/'.$ftp_path.$file_pdf, $FolderNum.$file_pdf); 
	}                               
	if(SearchFile('/'.$ftp_path.$file_xml_adenda)){
		MoveFile('/'.$ftp_path.$file_xml_adenda, $FolderNum.$file_xml_adenda);
	}
	if(SearchFile('/'.$ftp_path.$file_xml)){
		MoveFile('/'.$ftp_path.$file_xml, $FolderNum.$file_xml);
	}
	
	if($invoicesDTO->getViewed()>0 && $invoicesDTO->getDocSerial()!='' && $invoicesDTO->getStatus()=='InProcess'){
		$exit = updateStatus($invoicesDTO->getID_invoices()); // Actualiza Status a Certified    
		Update_Invoice_logs($ID_Invoices=$invoicesDTO->getID_invoices()); // Actualiza cu_invoices_logs                
	}
	
	if(SearchFile($FolderNum.$file_xml_adenda)){$file_xml=$file_xml_adenda;}                            
	$str_html .= '<a href="cfdi_doc.php?f='.$file_pdf.'&id='.$invoicesDTO->getID_invoices().'&m=2" target="_blank"><img src="' . $COMMON_PATH . '/common/img/pdf.gif" height="16px" width="16px" style="cursor: pointer" /></a>&nbsp;';
	$str_html .= '<a href="cfdi_doc.php?f='.$file_xml.'&id='.$invoicesDTO->getID_invoices().'&m=2" target="_blank" ><img src="' . $COMMON_PATH . '/common/img/xml.gif" height="16px" width="16px" style="cursor: pointer" alt="XML" /></a>&nbsp;';
	$str_html .= '</td>';
	$str_html .= '<td align="center">';
	$str_html .= '<a href="cfdi_doc.php?f='.$file_pdf.'&id='.$invoicesDTO->getID_invoices().'&m=0" target="_blank" alt="Descargar PDF"><img src="' . $COMMON_PATH . '/common/img/pdf_download.gif" height="16px" width="16px" style="cursor: pointer" /></a>&nbsp;';                
	$str_html .= '<a href="cfdi_doc.php?f='.$file_xml.'&id='.$invoicesDTO->getID_invoices().'&m=0" target="_blank" ><img src="' . $COMMON_PATH . '/common/img/xml_download.gif" height="16px" width="16px" style="cursor: pointer" alt="XML" /></a>&nbsp;';
	$str_html .= '</td>';
	$str_html .= '<td align="center" colspan="4">';
	$str_html .= '<input type="checkbox" id="'.substr($file_pdf,0,strlen($file_pdf)-4).'" value="1" onclick="CheckInOut(this.id,ToPrint.value)" >';
	$str_html .= '</td></tr>';
	/**/
}
?>