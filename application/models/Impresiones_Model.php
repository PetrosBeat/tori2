<?php
defined('BASEPATH') OR exit('No direct script access allowed');
         require './vendor/mike42/escpos-php/autoload.php';
                                use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
use Mike42\Escpos\GdEscposImage;
// use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;
use Mike42\Escpos\Devices\AuresCustomerDisplay;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    class Impresiones_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
            function addSpaces($string = '', $valid_string_length = 0) {
            if (strlen($string) < $valid_string_length) {
            $spaces = $valid_string_length - strlen($string);
            for ($index1 = 1; $index1 <= $spaces; $index1++) {
            $string = $string . ' ';
            }
            }
            return $string;
            }
          function print_compra($numero_compra)
          {
             $dato         = $this->Compras_Model->ver_compra($numero_compra);
            $comprador     = $dato['rut'];
             $Empresa              = $this->Informacion_Model->getApp();
              $Datos_Compra        = $this->Compras_Model->ver_compra($numero_compra);
              $Datos_Proveedor     = $this->Proveedor_Model->ver_proveedor_rut($comprador);
              $Datos_Detalle_Compra = $this->Compras_Model->ver_detalle_compra($numero_compra);
                $connector = new NetworkPrintConnector("192.168.0.6", 9100);
                $printer = new Printer($connector);
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
                $printer -> text("**********************************************\n");
                $printer -> text(date_format($date, 'd-m-Y H:i')."\n");
                $printer -> text("COMPRA NRO ".number_format( (int)($numero_compra) , 0, ',', '.')."\n");
                $printer -> text("PROVEEDOR: ".$Datos_Proveedor['razonSocial'] ."\n");
                $printer -> text("DIRECCION: ".$Datos_Proveedor['direccion'] ."\n");
                $printer -> text("TELEFONO: ".$Datos_Proveedor['telefono'] ."\n");
                $printer -> text("**********************************************\n");
                //FIN HEADER
                //CUERPO
                $printer->text($this->addSpaces('DIAMETRO', 10) . $this->addSpaces('CANTIDAD', 10). $this->addSpaces('CUBICO', 10) . $this->addSpaces('TOTAL', 8) . "\n");
                $productoo  = "";
                $sum_total = 0;
                foreach($Datos_Detalle_Compra as $DatosDetalleCompra) {
                //Current item ROW 1

                $diametro = str_split($DatosDetalleCompra['diametro'], 10);
                foreach ($diametro as $k => $l) {
                $l = trim($l);
                $diametro[$k] = $this->addSpaces($l, 10);
                }
                $cantidad = str_split($DatosDetalleCompra['cantidad'], 10);
                foreach ($cantidad as $k => $l) {
                $l = trim($l);
                $cantidad[$k] = $this->addSpaces($l, 10);
                }
                $cubico = str_split($DatosDetalleCompra['cubico'], 10);
                foreach ($cubico as $k => $l) {
                $l = trim($l);
                $cubico[$k] = $this->addSpaces($l, 10);
                }
                $totales = str_split($DatosDetalleCompra['cantidad'] * $DatosDetalleCompra['cubico'], 8);
                foreach ($totales as $k => $l) {
                $l = trim($l);
                $totales[$k] = $this->addSpaces($l, 8);
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
                $printer->text($this->addSpaces('TIPO METRO ', 1)  . $this->addSpaces("",3). $this->addSpaces(": VERDE", 10) . "\n");
                }
                else
                {
                $printer->text($this->addSpaces('TIPO METRO ', 1)  . $this->addSpaces("",3). $this->addSpaces("QUEMADO", 10) . "\n");
                }

                $printer->text($this->addSpaces('TOTAL CUBICO ', 1)  . $this->addSpaces("",1). $this->addSpaces(": ".$Datos_Compra['total_metros'], 10) . "\n");
                $printer->text($this->addSpaces('PRECIO COMPRA ', 1)  . $this->addSpaces("",0). $this->addSpaces( ": $".number_format( (int)$Datos_Compra['precio_compra'] , 0, ',', '.'), 10) . "\n");
                $printer->text($this->addSpaces('TOTAL PAGO ', 1)  . $this->addSpaces("",0). $this->addSpaces( ": $".number_format( (int)($Datos_Compra['precio_compra'] * $Datos_Compra['total_metros']) , 0, ',', '.'), 10) . "\n");
                $printer -> text("*****************\n");

                //FIN CUERPO
                $printer -> setEmphasis(false);
                $printer -> cut();
                $printer->pulse();
                $printer -> close();
          }
            function print_compra2($numero_compra)
          {
             $dato         = $this->Compras_Model->ver_compra($numero_compra);
            $comprador     = $dato['rut'];
             $Empresa              = $this->Informacion_Model->getApp();
              $Datos_Compra        = $this->Compras_Model->ver_compra($numero_compra);
              $Datos_Proveedor     = $this->Proveedor_Model->ver_proveedor_rut($comprador);
              $Datos_Detalle_Compra = $this->Compras_Model->ver_detalle_compra($numero_compra);
                $connector = new NetworkPrintConnector("192.168.0.6", 9100);
                $printer = new Printer($connector);
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
                $printer -> text("**********************************************\n");
                $printer -> text(date_format($date, 'd-m-Y H:i')."\n");
                $printer -> text("COMPRA NRO ".number_format( (int)($numero_compra) , 0, ',', '.')."\n");
                $printer -> text("PROVEEDOR: ".$Datos_Proveedor['razonSocial'] ."\n");
                $printer -> text("DIRECCION: ".$Datos_Proveedor['direccion'] ."\n");
                $printer -> text("TELEFONO: ".$Datos_Proveedor['telefono'] ."\n");
                $printer -> text("**********************************************\n");
                //FIN HEADER
                //CUERPO
                $printer->text($this->addSpaces('DIAMETRO', 10) . $this->addSpaces('CANTIDAD', 10). $this->addSpaces('CUBICO', 10) . $this->addSpaces('TOTAL', 8) . "\n");
                $productoo  = "";
                $sum_total = 0;
                foreach($Datos_Detalle_Compra as $DatosDetalleCompra) {
                //Current item ROW 1

                $diametro = str_split($DatosDetalleCompra['diametro'], 10);
                foreach ($diametro as $k => $l) {
                $l = trim($l);
                $diametro[$k] = $this->addSpaces($l, 10);
                }
                $cantidad = str_split($DatosDetalleCompra['cantidad'], 10);
                foreach ($cantidad as $k => $l) {
                $l = trim($l);
                $cantidad[$k] = $this->addSpaces($l, 10);
                }
                $cubico = str_split($DatosDetalleCompra['cubico'], 10);
                foreach ($cubico as $k => $l) {
                $l = trim($l);
                $cubico[$k] = $this->addSpaces($l, 10);
                }
                $totales = str_split($DatosDetalleCompra['cantidad'] * $DatosDetalleCompra['cubico'], 8);
                foreach ($totales as $k => $l) {
                $l = trim($l);
                $totales[$k] = $this->addSpaces($l, 8);
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
                $printer->text($this->addSpaces('TIPO METRO ', 1)  . $this->addSpaces("",3). $this->addSpaces(": VERDE", 10) . "\n");
                }
                else
                {
                $printer->text($this->addSpaces('TIPO METRO ', 1)  . $this->addSpaces("",3). $this->addSpaces("QUEMADO", 10) . "\n");
                }

                $printer->text($this->addSpaces('TOTAL CUBICO ', 1)  . $this->addSpaces("",1). $this->addSpaces(": ".$Datos_Compra['total_metros'], 10) . "\n");
              //  $printer->text($this->addSpaces('PRECIO COMPRA ', 1)  . $this->addSpaces("",0). $this->addSpaces( ": $".number_format( (int)$Datos_Compra['precio_compra'] , 0, ',', '.'), 10) . "\n");
               // $printer->text($this->addSpaces('TOTAL PAGO ', 1)  . $this->addSpaces("",0). $this->addSpaces( ": $".number_format( (int)($Datos_Compra['precio_compra'] * $Datos_Compra['total_metros']) , 0, ',', '.'), 10) . "\n");
                $printer -> text("*****************\n");

                //FIN CUERPO
                $printer -> setEmphasis(false);
                $printer -> cut();
                $printer->pulse();
                $printer -> close();
          }
           function print_venta($numero_venta)
          {
             $dato         = $this->Ventas_Model->ver_ventas($numero_venta);
            $comprador     = $dato['rut_cliente'];
             $Empresa              = $this->Informacion_Model->getApp();
              $Datos_Venta        = $this->Ventas_Model->ver_ventas($numero_venta);
              $Datos_Cliente     = $this->Cliente_Model->ver_cliente_rut($comprador);
              $Datos_Detalle_Venta = $this->Ventas_Model->ver_detalle_ventas($numero_venta);
                $connector = new NetworkPrintConnector("192.168.0.6", 9100);
                $printer = new Printer($connector);
                $date = date_crear($Datos_Venta['fecha']);
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
                $printer -> text("**********************************************\n");
                $printer -> text(date_format($date, 'd-m-Y H:i')."\n");
                $printer -> text("VENTA NRO ".number_format( (int)($numero_venta) , 0, ',', '.')."\n");
                $printer -> text("CLIENTE: ".$Datos_Cliente['razonSocial'] ."\n");
                $printer -> text("**********************************************\n");
                //FIN HEADER
                //CUERPO
                $printer->text($this->addSpaces('CANT', 5) . $this->addSpaces('NOMBRE', 20). $this->addSpaces('PRECIO', 8) . $this->addSpaces('TOTAL', 10) . "\n");
                $productoo  = "";
                $sum_total = 0;
                $sum_total_pulgadas = 0;
                foreach($Datos_Detalle_Venta as $DatosDetalleVenta) {
                //Current item ROW 1

                $cantidad = str_split($DatosDetalleVenta['cantidad'], 5);
                foreach ($cantidad as $k => $l) {
                $l = trim($l);
                $cantidad[$k] = $this->addSpaces($l, 5);
                }
                $nombre = str_split($DatosDetalleVenta['nombre'], 20);
                foreach ($nombre as $k => $l) {
                $l = trim($l);
                $nombre[$k] = $this->addSpaces($l, 20);
                }
                $precio = str_split("$".number_format( $DatosDetalleVenta['valor_unitario'], 0, ',', '.'), 8);
                foreach ($precio as $k => $l) {
                $l = trim($l);
                $precio[$k] = $this->addSpaces($l, 8);
                }

                $totales = str_split("$".number_format( $DatosDetalleVenta['cantidad'] * $DatosDetalleVenta['valor_unitario'] ,0, ',', '.'), 10);
                 $sum_total = $sum_total + ($DatosDetalleVenta['cantidad'] * $DatosDetalleVenta['valor_unitario']);
                  $sum_total_pulgadas = $sum_total_pulgadas + ($DatosDetalleVenta['total_pulgadas'] );
                foreach ($totales as $k => $l) {
                $l = trim($l);
                $totales[$k] = $this->addSpaces($l, 10);
                }
                $counter = 0;
                $temp = [];
                $temp[] = count($cantidad);
                $temp[] = count($nombre);
                $temp[] = count($precio);
                $temp[] = count($totales);
                $counter = max($temp);
                for ($i = 0; $i < $counter; $i++) {
                $line = '';
                if (isset($cantidad[$i])) {
                $line .= ($cantidad[$i]);
                }
                if (isset($nombre[$i])) {
                $line .= ($nombre[$i]);
                }
                if (isset($precio[$i])) {
                $line .= ($precio[$i]);
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
                 $neto        =  intval($sum_total) ;
                 $iva         =  intval($sum_total) * ($Empresa['iva']/100);
                 $total_final = $neto + $iva;
                 $printer->text($this->addSpaces('DINERO REC. ', 1)  . $this->addSpaces("",3). $this->addSpaces("$ ".number_format( $Datos_Venta['dinero_recibido'], 0, ',', '.'), 10) . "\n");

                if($Datos_Venta['documento'] == '33' OR $Datos_Venta['documento'] == '52' )
                {

                 $printer->text($this->addSpaces('NETO ', 1)  . $this->addSpaces("",3). $this->addSpaces("$ ".number_format( $neto, 0, ',', '.'), 10) . "\n");
                  $printer->text($this->addSpaces('IVA ', 1)  . $this->addSpaces("",3). $this->addSpaces("$ ".number_format( $iva, 0, ',', '.'), 10) . "\n");
                $printer->text($this->addSpaces('TOTAL ', 1)  . $this->addSpaces("",3). $this->addSpaces(number_format("$ ".$total_final, 0, ',', '.'), 10) . "\n");
                }
                else
                {
                    $printer->text($this->addSpaces('TOTAL ', 1)  . $this->addSpaces("",3). $this->addSpaces("$ ".number_format( $neto, 0, ',', '.'), 10) . "\n");
                }
                $printer->text($this->addSpaces('VUELTO ', 1)  . $this->addSpaces("",3). $this->addSpaces("$ ".number_format( $Datos_Venta['vuelto'], 0, ',', '.'), 10) . "\n");
                $printer->text($this->addSpaces('TOTAL PULGADAS ', 1)  . $this->addSpaces("",3). $this->addSpaces($sum_total_pulgadas, 10) . "\n");
                $printer -> text("*****************\n");

                //FIN CUERPO
                $printer -> setEmphasis(false);
                $printer -> cut();
                $printer->pulse();
                $printer -> close();
          }
                     function print_pedido($numero_pedido)
          {
             $dato         = $this->Pedidos_Model->ver_pedidos($numero_pedido);
            $comprador     = $dato['rut_cliente'];
             $Empresa              = $this->Informacion_Model->getApp();
              $Datos_Pedido        = $this->Pedidos_Model->ver_pedidos($numero_pedido);
              $Datos_Cliente     = $this->Cliente_Model->ver_cliente_rut($comprador);
              $Datos_Detalle_Venta = $this->Pedidos_Model->ver_detalle_pedidos($numero_pedido);
                $connector = new NetworkPrintConnector("192.168.0.6", 9100);
                $printer = new Printer($connector);
                $date = date_crear($Datos_Pedido['fecha']);
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
                $printer -> text("**********************************************\n");
                $printer -> text(date_format($date, 'd-m-Y H:i')."\n");
                $printer -> text("PEDIDO NRO ".number_format( (int)($numero_pedido) , 0, ',', '.')."\n");
                $printer -> text("CLIENTE: ".$Datos_Cliente['razonSocial'] ."\n");
                $printer -> text("**********************************************\n");
                //FIN HEADER
                //CUERPO
                $printer->text($this->addSpaces('CANTIDAD', 20) . $this->addSpaces('PRODUCTO', 20). "\n");
                $productoo  = "";
                $sum_total = 0;
                $sum_total_pulgadas = 0;
                $sum_total_paquetes = 0;
                foreach($Datos_Detalle_Venta as $DatosDetalleVenta) {
                //Current item ROW 1
                if($DatosDetalleVenta['tipo_venta'] == '0')
                {
                    $sum_total_paquetes = $sum_total_paquetes + $DatosDetalleVenta['cantidad'];
                    $cantidad = str_split(($DatosDetalleVenta['cantidad']." PAQUETE(S)"), 20);
                }
                else
                {
                    $cantidad = str_split(($DatosDetalleVenta['cantidad']." UNIDAD(ES)."), 20);
                }

                foreach ($cantidad as $k => $l) {
                $l = trim($l);
                $cantidad[$k] = $this->addSpaces($l, 20);
                }
                $nombre = str_split($DatosDetalleVenta['nombre'], 20);
                foreach ($nombre as $k => $l) {
                $l = trim($l);
                $nombre[$k] = $this->addSpaces($l, 20);
                }

                $

                  $sum_total_pulgadas = $sum_total_pulgadas + ($DatosDetalleVenta['total_pulgadas'] );

                $counter = 0;
                $temp = [];
                $temp[] = count($cantidad);
                $temp[] = count($nombre);

                $counter = max($temp);
                for ($i = 0; $i < $counter; $i++) {
                $line = '';
                if (isset($cantidad[$i])) {
                $line .= ($cantidad[$i]);
                }
                if (isset($nombre[$i])) {
                $line .= ($nombre[$i]);
                }


                $printer->text($line);
                $printer->text("\n");
                }
                $line = "";

                }

                $printer -> text("**********************************************\n");
                $printer -> setTextSize(2,2);
                 $neto        =  intval($sum_total) ;
                 $iva         =  intval($sum_total) * ($Empresa['iva']/100);
                 $total_final = $neto + $iva;


                 $printer->text($this->addSpaces('TOTAL PAQUETES ', 10)  . $this->addSpaces("",3). $this->addSpaces($sum_total_paquetes, 10) . "\n");
                $printer -> text("*****************\n");

                //FIN CUERPO
                $printer -> setEmphasis(false);
                $printer -> cut();
                $printer->pulse();
                $printer -> close();
          }
            function print_cotizacion($numero_cotizacion)
          {
             $dato         = $this->Cotizaciones_Model->ver_cotizacion($numero_cotizacion);
            $comprador     = $dato['cliente'];
             $Empresa              = $this->Informacion_Model->getApp();
              $Datos_Cotizacion        = $this->Cotizaciones_Model->ver_cotizacion($numero_cotizacion);
              $Datos_Cliente     = $this->Cliente_Model->ver_cliente_rut($comprador);
              $Datos_Detalle_Cotizacion = $this->Cotizaciones_Model->ver_detalle_cotizacion($numero_cotizacion);
                $connector = new NetworkPrintConnector("192.168.0.6", 9100);
                $printer = new Printer($connector);
                $date = date_crear($Datos_Cotizacion['fecha_emision']);
                 $date2 = date_crear($Datos_Cotizacion['fecha_expiracion']);
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
                $printer -> text("**********************************************\n");
                 $printer ->setTextSize(2,2);
                 $printer -> text("COTIZACION ".$this->Informacion_Model->Numero_Boleta($numero_cotizacion)."\n");
                    $printer -> setTextSize(1,1);
                $printer -> text("**********************************************\n");
                $printer -> text("FECHA EMISION ".date_format($date, 'd-m-Y H:i')."\n");
                $printer -> text("COTIZACION EXPIRA EL :".date_format($date2, 'd-m-Y H:i')."\n");

                $printer -> text("CLIENTE: ".$Datos_Cliente['razonSocial'] ."\n");
                $printer -> text("**********************************************\n");
                //FIN HEADER
                //CUERPO
                $printer->text($this->addSpaces('CANT', 5) . $this->addSpaces('NOMBRE', 22). $this->addSpaces('PRECIO', 10) . $this->addSpaces('TOTAL', 10) . "\n");
                $productoo  = "";
                $sum_total = 0;
                $sum_total_pulgadas = 0;
                foreach($Datos_Detalle_Cotizacion as $DatosDetalleCotizacion) {
                //Current item ROW 1

                $cantidad = str_split($DatosDetalleCotizacion['cantidad'], 3);
                foreach ($cantidad as $k => $l) {
                $l = trim($l);
                $cantidad[$k] = $this->addSpaces($l, 3);
                }
                $nombre = str_split($DatosDetalleCotizacion['nombre'], 22);
                foreach ($nombre as $k => $l) {
                $l = trim($l);
                $nombre[$k] = $this->addSpaces($l, 22);
                }
                $precio = str_split("$".number_format( $DatosDetalleCotizacion['valor_unitario'], 0, ',', '.'), 10);
                foreach ($precio as $k => $l) {
                $l = trim($l);
                $precio[$k] = $this->addSpaces($l, 10);
                }

                $totales = str_split("$".number_format( $DatosDetalleCotizacion['cantidad'] * $DatosDetalleCotizacion['valor_unitario'] ,0, ',', '.'), 10);
                 $sum_total = $sum_total + ($DatosDetalleCotizacion['cantidad'] * $DatosDetalleCotizacion['valor_unitario']);
                  $sum_total_pulgadas = $sum_total_pulgadas + ($DatosDetalleCotizacion['total_pulgadas'] );
                foreach ($totales as $k => $l) {
                $l = trim($l);
                $totales[$k] = $this->addSpaces($l, 10);
                }
                $counter = 0;
                $temp = [];
                $temp[] = count($cantidad);
                $temp[] = count($nombre);
                $temp[] = count($precio);
                $temp[] = count($totales);
                $counter = max($temp);
                for ($i = 0; $i < $counter; $i++) {
                $line = '';
                if (isset($cantidad[$i])) {
                $line .= ($cantidad[$i]);
                }
                if (isset($nombre[$i])) {
                $line .= ($nombre[$i]);
                }
                if (isset($precio[$i])) {
                $line .= ($precio[$i]);
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
                 $neto        =  intval($sum_total) ;
                 $iva         =  intval($sum_total) * ($Empresa['iva']/100);
                 $total_final = $neto + $iva;
                 $printer->text($this->addSpaces('TOTAL  ', 7)  . $this->addSpaces("   ",3). $this->addSpaces(": $ ".number_format( $Datos_Cotizacion['total'], 0, ',', '.'), 10) . "\n");
                 $printer->text($this->addSpaces('DOCUMENTO   :', 0)  . $this->addSpaces("",1). $this->addSpaces($Datos_Cotizacion['tipo_documento'], 10) . "\n");


                $printer->text($this->addSpaces('FORMA PAGO  : ', 1)  . $this->addSpaces("",0). $this->addSpaces($Datos_Cotizacion['tipo_pago'], 10) . "\n");

                $printer -> text("*****************\n");

                //FIN CUERPO
                $printer -> setEmphasis(false);
                $printer -> cut();
                $printer->pulse();
                $printer -> close();
          }
    }