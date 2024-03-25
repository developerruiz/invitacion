<?php
require_once('vendor/autoload.php'); 
require_once('invitacion.php'); 

$css = file_get_contents('css/styles.css');


$mpdf = new \Mpdf\Mpdf([

]);
// html
$plantilla = getPlantilla();
// css
$mpdf -> writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf -> writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output();

