<?php
function addSpaces($string = '', $valid_string_length = 0) {
if (strlen($string) < $valid_string_length) {
$spaces = $valid_string_length - strlen($string);
for ($index1 = 1; $index1 <= $spaces; $index1++) {
$string = $string . ' ';
}
}
return $string;
}
require './vendor/mike42/escpos-php/autoload.php';

use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
use Mike42\Escpos\GdEscposImage;
// use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;
use Mike42\Escpos\Devices\AuresCustomerDisplay;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
 //use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
//var_dump($this->input->ip_address());
$connector = new NetworkPrintConnector("192.168.0.100", 9100);
 //$connector = new WindowsPrintConnector("IM");
//$connector = new WindowsPrintConnector("EPSON Coupon Generator(TM-T20II)");
$printer = new Printer($connector);
//$connector = new WindowsPrintConnector("POS"):
$date = date_crear($Datos_Compra['fecha']);
//HEADER
$printer -> setEmphasis(true);
$printer -> setJustification( Printer::JUSTIFY_CENTER);
$printer -> setFont( Printer::FONT_A);
$printer->feed();
$printer->setPrintLeftMargin(0);
$printer ->setTextSize(2,2);
$logo = EscposImage::load("1.jpg", false);
$printer -> bitImage($logo);

$printer -> setTextSize(1,1);
//$printer -> text($Empresa['direccion']."\n");
//$printer -> text($Empresa['telefono']."\n");
//$printer -> text($Empresa['correo']."\n");
$printer -> text("**********************************************\n");
$printer -> text(date_format($date, 'd-m-Y H:i')."\n");
$printer -> text("COMPRA NRO ".number_format( (int)($Numero_Compra) , 0, ',', '.')."\n");
$printer -> text("PROVEEDOR: ".$Datos_Proveedor['razonSocial'] ."\n");
$printer -> text("DIRECCION: ".$Datos_Proveedor['direccion'] ."\n");
$printer -> text("TELEFONO: ".$Datos_Proveedor['telefono'] ."\n");
$printer -> text("**********************************************\n");
//FIN HEADER
//CUERPO
$printer->text(addSpaces('DIAMETRO', 10) . addSpaces('CANTIDAD', 10). addSpaces('CUBICO', 10) . addSpaces('TOTAL', 8) . "\n");
$productoo  = "";
$sum_total = 0;
foreach($Datos_Detalle_Compra as $DatosDetalleCompra) {
//Current item ROW 1

$diametro = str_split($DatosDetalleCompra['diametro'], 10);
foreach ($diametro as $k => $l) {
$l = trim($l);
$diametro[$k] = addSpaces($l, 10);
}
$cantidad = str_split($DatosDetalleCompra['cantidad'], 10);
foreach ($cantidad as $k => $l) {
$l = trim($l);
$cantidad[$k] = addSpaces($l, 10);
}
$cubico = str_split($DatosDetalleCompra['cubico'], 10);
foreach ($cubico as $k => $l) {
$l = trim($l);
$cubico[$k] = addSpaces($l, 10);
}
$totales = str_split($DatosDetalleCompra['cantidad'] * $DatosDetalleCompra['cubico'], 8);
foreach ($totales as $k => $l) {
$l = trim($l);
$totales[$k] = addSpaces($l, 8);
}
$counter = 0;
$temp = [];
$temp[] = count($diametro);
$temp[] = count($cantidad);
$temp[] = count($cubico);
$temp[] = count($totales);
$counter = max($temp);
for ($i = 0; $i < $counter; $i++) {
$line = '';
if (isset($diametro[$i])) {
$line .= ($diametro[$i]);
}
if (isset($cantidad[$i])) {
$line .= ($cantidad[$i]);
}
if (isset($cubico[$i])) {
$line .= ($cubico[$i]);
}
if (isset($totales[$i])) {
$line .= $totales[$i];
}
$printer->text($line);
$printer->text("\n");
}
$line = "";

}

$printer -> text("**********************************************\n");
$printer -> setTextSize(2,2);
if($Datos_Compra['quemado'] == 0)
{
$printer->text(addSpaces('TIPO METRO ', 1)  . addSpaces("",3). addSpaces(": VERDE", 10) . "\n");
}
else
{
$printer->text(addSpaces('TIPO METRO ', 1)  . addSpaces("",3). addSpaces("QUEMADO", 10) . "\n");
}

$printer->text(addSpaces('TOTAL CUBICO ', 1)  . addSpaces("",1). addSpaces(": ".$Datos_Compra['total_metros'], 10) . "\n");
$printer->text(addSpaces('PRECIO COMPRA ', 1)  . addSpaces("",0). addSpaces( ": $".number_format( (int)$Datos_Compra['precio_compra'] , 0, ',', '.'), 10) . "\n");
$printer->text(addSpaces('TOTAL PAGO ', 1)  . addSpaces("",0). addSpaces( ": $".number_format( (int)$Datos_Compra['precio_compra'] * $Datos_Compra['total_metros'] , 0, ',', '.'), 10) . "\n");
$printer -> text("*****************\n");

//FIN CUERPO
$printer -> setEmphasis(false);
$printer -> cut();
$printer->pulse();
$printer -> close();
?>