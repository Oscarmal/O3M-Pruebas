<?php
##Run a DOS command and parse it for specific lines
#Enviar a impresora
#exec("print \AppServ\www\cache\archivo.txt lpt1:");

$path='../';
chdir($path);
$x = 0;
exec('dir /w', $response);
foreach($response as $line) {
  echo trim($line).'@@'.strpos($line, ']').'<br />';
  if (strpos($line, '[')>0) {
  	$carpetas[$x]=explode('] [',$line);
	$x++;
  }
  
}

#echo count($carpetas[0]);
echo $carpetas[1][0];
?>