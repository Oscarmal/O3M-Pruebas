<?php
$dir='files/';
for($x=1; $x<=10; $x++){$Files[$x]='MDISD_'.$x.'.xml';}
#$files = array('readme.txt', 'test.html', 'image.gif');
$ZipName = 'FileZip_'.date('Ymd-His').'.zip';
$Zip = new ZipArchive;
$Zip->open($ZipName, ZipArchive::CREATE);
chdir($dir);
foreach ($Files as $File) {

  $Zip->addFile($File);
}
$Zip->close();
/*
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$ZipName);
header('Content-Length: ' . filesize($ZipName));
readfile($ZipName);
/**/
?>