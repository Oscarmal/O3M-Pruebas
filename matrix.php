<?php 
for($x=1; $x<=1000000; $x++){
	$y++;
	$z++;
	if($y==2){echo ' '; $y=0;}  #Columnas multiplo del total de linea (abajo)
	if($z==52){echo "\n"; $z=0;}
	echo chr(rand(33,126));
}
?>