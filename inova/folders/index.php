<?php require('../ftp/ftp.php');

function SearchFile2($FileName){
	$connFTP=ConectFTP();
		$Files=ftp_nlist($connFTP, ".");
		ftp_quit($connFTP);
		foreach($Files as $File){
			$Name=explode('/',$File);
			if($Name[0]==$FileName){return true;}
	}
}
/**/
$SiteFolder="folders";
$DirLocal=getcwd();
$path=explode($SiteFolder,$DirLocal);
$RaizLoc=$path[0].$SiteFolder.'\\';
$path=explode('www',$DirLocal);
$path2=explode($SiteFolder,$path[1]);
$RaizUrl="http://".$_SERVER['HTTP_HOST'].$path2[0].$SiteFolder."/";
$RaizUrl=str_replace('\\','/',$RaizUrl);

$link=mysql_connect('172.20.20.117','root','In@va$11');
mysql_select_db('direksys2_e3',$link);
$path="/";
$limit=500;
$sql="select id_invoices, doc_serial, doc_num from cu_invoices where doc_num>0 order by doc_serial, doc_num asc";
$con=mysql_query($sql, $link)or die(mysql_error());
echo "<table border='1'>";
echo "<tr>
	<td>Cons</td>
	<td>ID</td>
	<td>Serie</td>
	<td>Folio</td>
	<td>Ruta</td>
	</tr>";
$z=0;
while($row=mysql_fetch_array($con)){
	echo "<tr>";
	echo "<td>".$z++."</td>";
	for($x=0; $x<=2; $x++){			
		echo "<td>".$row[$x]."</td>";
	}	
	if($row['doc_num']>=$limit){
		$serial=floor($row['doc_num']/$limit)*$limit;
	}else{$serial=1;}
	#$foldername=$serial.'-'.($serial+($limit-1));
	$FolderName=$serial;	
	$FolderSerial=$path.$row['doc_serial'].'/';
	$FolderNum=$FolderSerial.$FolderName.'/';	
	//Locales
	#if(!is_dir($FolderSerial)){mkdir($FolderSerial,0777)or die("Error al crear carpeta: $FolderSerial");}
	#if(!is_dir($FolderNum)){mkdir($FolderNum,0777)or die("Error al crear carpeta: $FolderNum");}
	//--
	$FilePDF=$row['doc_serial'].'_'.$row['doc_num'].'.pdf';
	$FileXML=$row['doc_serial'].'_'.$row['doc_num'].'.xml';
	$FileXMLA=$row['doc_serial'].'_'.$row['doc_num'].'_A.xml';
	//--Crea Directorio si no existe
	if(!CheckFolder($FolderSerial)){MakeDir($FolderSerial); }
	if(!CheckFolder($FolderNum)){MakeDir($FolderNum);}
	//--Mueve archivos a sus directorios
	if(SearchFile2($FilePDF)){MoveFile($FilePDF, $FolderNum.$FilePDF); }	
	if(SearchFile2($FileXML)){MoveFile($FileXML, $FolderNum.$FileXML); }	
	if(SearchFile2($FileXMLA)){MoveFile($FileXMLA, $FolderNum.$FileXMLA); }	
	echo "<td>$FolderNum</td>";
	echo "</tr>";
	#if($c==100){break;}else{$c++;}	
}
echo "</table>";
/*O3M*/
?>