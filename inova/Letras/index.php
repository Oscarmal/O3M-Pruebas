<?php
require('letras.inc.php');
/*
$Nombre=trim($_POST['n']);
$Monto=trim($_POST['m']);
$Fecha=trim($_POST['f']);
*/
$Nombre=trim($_GET['n']);
$Monto=trim($_GET['m']);
$Fecha=trim($_GET['f']);
PrintCheck($Nombre, $Monto, $Fecha);
?>