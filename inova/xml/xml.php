<?php

if(!($xml = simplexml_load_file("xml.xml"))) die("Error al obtener el archivo");

foreach($xml->prueba[0]->attributes() as $a => $b) {
    echo $a,'="',$b,"\"\n";
}

/*
foreach($xml as $i)
{
    list($n) = $i->attributes();
    echo "<li>$n -  $i</li>";
}

/*
$xml = simplexml_load_file('archivo.xml');
$salida ="";
foreach($xml->nota as $item){
$autor= $item->autor;
$contenido= $item->contenido;
$fecha= $item->fecha;
$titulo= $item->titulo;
$salida .= "Autor: " . $autor . "<br><b>$titulo</b> [$fecha]<br>" . strip_tags($contenido) . "<hr>";
}
echo $salida;
*/

?>