<?php
function codigobarras ($texto,$tamanio,$fuente){
// Define variable to prevent hacking
define('IN_CB',true);

// Including all required classes
require('../barcode1/class/index.php');
require('../barcode1/class/FColor.php');
require('../barcode1/class/BarCode.php');
require('../barcode1/class/FDrawing.php');

// including the barcode technology
include('../barcode1/class/code128.barcode.php');

// Creating some Color (arguments are R, G, B)
$barras = new FColor(0,0,0);
$fondo = new FColor(255,255,255);

/* Here is the list of the arguments:
1 - Thickness
2 - Color of bars
3 - Color of spaces
4 - Resolution
5 - Text
6 - Text Font (0-5) */
$code_generated = new code128(30,$barras,$fondo,$tamanio,$texto,$fuente);

/* Here is the list of the arguments
1 - Width
2 - Height
3 - Filename (empty : display on screen)
4 - Background color */
$drawing = new FDrawing(1024,1024,'',$fondo);
$drawing->init(); // You must call this method to initialize the image
$drawing->add_barcode($code_generated);
$drawing->draw_all();
$im = $drawing->get_im();

// Next line create the little picture, the barcode is being copied inside
$im2 = imagecreate($code_generated->lastX,$code_generated->lastY);
imagecopyresized($im2, $im, 0, 0, 0, 0, $code_generated->lastX, $code_generated->lastY, $code_generated->lastX, $code_generated->lastY);
$drawing->set_im($im2);

// Header that says it is an image (remove it if you save the barcode to a file)
header('Content-Type: image/png');

// Draw (or save) the image into PNG format.
$drawing->finish(IMG_FORMAT_PNG);

return $drawing;
}
?>