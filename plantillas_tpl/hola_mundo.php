<?
include("clase_tpl.php");

//al Pasar como parametro hola_Mundo, asumimos que en la carpeta plantillas existe un archivo de nombre hola_Mundo.tpl
$Contenido=new Plantilla("holamundo");
$Contenido->asigna_variables(array(
        "variable" => "holaMundo "
));

//$ContenidoString contiene nuestra plantilla, ya con las variables asignadas, f�cil no?
$ContenidoString = $Contenido->muestra();
echo $ContenidoString;
?>