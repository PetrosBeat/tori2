<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    class Sii_Model extends CI_Model
    {
           public function __construct()
           {
           //   $this->load->library('rest', array('server' => 'https://api.haulmer.com/v2/dte/taxpayer'));
                parent::__construct();
           }

           //Obtenemos todos los categorias
           public function getClienteSII($rut_cliente)
           {

                $query = $this->rest->get($rut_cliente);


                if($query == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $query;
                     }
           }

           public function BoletaElectronica($detalle,$neto,$numero_venta)
           {
              $datos_empresa          = $this->Informacion_Model->getApp();
              $neto = round($neto / (1.19),1);
              $iva = intval((($neto * (0.19))));
              $total = intval($neto +$iva);

              $this->load->library('rest', array('server' => 'https://dev-api.haulmer.com/v2/dte/'));





                   $json = '{"response":
                        ["PDF","FOLIO"],
                        "dte":{
                            "Encabezado":
                            {
                              "IdDoc":
                                {
                                "TipoDTE":39,
                                "Folio":0,
                                "FchEmis":"'.date('Y-m-d').'",
                                "IndServicio":"3",

                                }
                                ,"Emisor": {
                                    "RUTEmisor"   : "76430498-5",
                                    "RznSocEmisor": "HOSTY SPA",
                                    "GiroEmisor"  : "EMPRESAS DE SERVICIOS INTEGRALES DE INFORMÁTICA",
                                    "DirOrigen"   : "ARTURO PRAT 527 3 pis OF 1",
                                    "CmnaOrigen"  : "Curicó",
                                    "CiudadOrigen": "Curicó",
                                    "CdgSIISucur" : "79457965"
                                },
                                "Receptor":
                                {
                                  "RUTRecep":"66666666-6"
                                }
                                ,"Totales":
                                {
                                  "MntNeto" : '.intval($neto).',
                                  "IVA": '.$iva.',
                                  "MntTotal":'.$total.',

                                  "VlrPagar":'.$total.'
                                }
                            }
                            ,"Detalle": '.json_encode($detalle).'
                          }
                    }';
                        $xml = $this->rest->post('document',($json));
                       // $this->rest->debug();


                    $im = new Imagick();


                     $datos = json_decode(json_encode($xml), true);
                    $img_file = "files/pdfs/Boletas/".$datos['FOLIO'].'.pdf';
                    $img_file2 = $datos['FOLIO'].'.png';
                   define('UPLOAD_DIR', 'files/pdfs/Boletas/');
                    $img =$datos['PDF'];
                    $img = str_replace('data:image/pdf;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = UPLOAD_DIR .$datos['FOLIO'] . '.pdf';
                    $success = file_put_contents($file, $data);

                    $data_update_venta = array("numero_boleta_electronica" => $datos['FOLIO']);
                        $this->Ventas_Model->update_venta($data_update_venta,$numero_venta);
                      return $datos['FOLIO'];

           }



           public function FacturaElectronica($detalle,$neto,$numero_venta,$datos_receptor,$forma_pago)
           {

            $datos_empresa          = $this->Informacion_Model->getApp();

              $neto  = round($neto / (1.19),1);
              $iva   = ((($neto * (0.19))));
              $total = intval(round(($neto +$iva),1));

                 $this->load->library('rest', array('server' => 'https://dev-api.haulmer.com/v2/dte/'));
                 $datos_empresa         = $this->Informacion_Model->getApp();

                   $json ='{
    "response": ["FOLIO","PDF"],
    "dte": {
        "Encabezado": {
            "IdDoc": {
                "TipoDTE"      : 33,
                "Folio"        : 0,
                "FchEmis"      : "'.date('Y-m-d').'",
                "TpoTranCompra": "1",
                "TpoTranVenta" : "1",
                "FmaPago"      : "'.$forma_pago.'",
                "MntBruto"     : "1"

            },
          "Emisor": {
                                    "RUTEmisor"   : "76430498-5",
                                    "RznSoc": "HOSTY SPA",
                                    "GiroEmis"  : "EMPRESAS DE SERVICIOS INTEGRALES DE INFORMATICA",
                                    "DirOrigen"   : "ARTURO PRAT 527 3 pis OF 1",
                                    "CmnaOrigen"  : "Curicó",
                                    "CiudadOrigen": "Curicó",
                                    "CorreoEmisor":"garcias.aravena@gmail.com",
                                    "Acteco" : "620200"

             },
            "Receptor":'.json_encode($datos_receptor).',
             "Totales": {
                "MntNeto" : '.intval($neto).',
                "TasaIVA" : "19",
                "IVA"     : '.intval($iva).',
                "MntTotal": '.$total.',
                "VlrPagar": '.$total.'
            }
        }
        ,"Detalle": '.json_encode($detalle).'
    }
}';
                $xml = $this->rest->post('document',($json));
              // $this->rest->debug();


                    $im = new Imagick();
                    $datos = json_decode(json_encode($xml), true);


                    $img_file = "files/pdfs/Facturas/".$datos['FOLIO'].'.pdf';
                    $img_file2 = $datos['FOLIO'].'.png';
                   define('UPLOAD_DIR', 'files/pdfs/Facturas/');
                    $img =$datos['PDF'];
                    $img = str_replace('data:image/pdf;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = UPLOAD_DIR .$datos['FOLIO'] . '.pdf';
                    $success = file_put_contents($file, $data);
                      $data_update_venta = array("numero_factura_electronica" => $datos['FOLIO']);
                        $this->Ventas_Model->update_venta($data_update_venta,$numero_venta);
                        return $datos['FOLIO'];


           }

           function GuiaDespacho($detalle,$neto,$numero_venta,$datos_receptor,$transporte,$tipo_despacho,$tipo_traslado)
           {

              $datos_empresa = $this->Informacion_Model->getApp();

              $iva           = intval(round(($neto * (0.19)),1));
              $total         = intval(round(($neto +$iva),1));
              $this->load->library('rest', array('server' => 'https://dev-api.haulmer.com/v2/dte/'));


             $json ='{
                    "response":
                        ["PDF","FOLIO"],
                    "dte":{
                            "Encabezado":
                            {
                              "IdDoc": {
                                    "TipoDTE"     : 52,
                                    "Folio"       : 0,
                                    "FchEmis"     : "'.date('Y-m-d').'",
                                    "TipoDespacho":"'.$tipo_despacho.'",
                                    "IndTraslado" :"'.$tipo_traslado.'",
                                    "TpoTranVenta": "1",
                                    "FmaPago"     :"2"

                                },
                              "Emisor": {
                                    "RUTEmisor"   : "76430498-5",
                                    "RznSoc"      : "HOSTY SPA",
                                    "GiroEmis"    : "EMPRESAS DE SERVICIOS INTEGRALES DE INFORMATICA",
                                    "DirOrigen"   : "ARTURO PRAT 527 3 pis OF 1",
                                    "CmnaOrigen"  : "Curicó",
                                    "CiudadOrigen": "Curicó",
                                    "CorreoEmisor":"garcias.aravena@gmail.com",
                                    "Acteco"      : "620200"

                                },
                                "Receptor":'.json_encode($datos_receptor).' ,
                                "Transporte"  :'.json_encode($transporte).',
                                "Totales"     : {
                                           "MntNeto" : '.($neto).',
                                            "TasaIVA" : "19",
                                            "IVA"     : '.intval($iva).',
                                            "MntTotal": '.$total.',
                                            "VlrPagar": '.$total.'
                                         }
                                },
                                "Detalle": '.json_encode($detalle).'
                            }
                        }';





                                 $xml = $this->rest->post('document',($json));
             //  $this->rest->debug();


                    $im = new Imagick();


                     $datos = json_decode(json_encode($xml), true);
                    $img_file = "files/pdfs/Guias/".$datos['FOLIO'].'.pdf';
                    $img_file2 = $datos['FOLIO'].'.png';
                   define('UPLOAD_DIR', 'files/pdfs/Guias/');
                    $img =$datos['PDF'];
                    $img = str_replace('data:image/pdf;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = UPLOAD_DIR .$datos['FOLIO'] . '.pdf';
                    $success = file_put_contents($file, $data);
                      $data_update_venta = array("numero_guia_electronica" => $datos['FOLIO']);
                        $this->Ventas_Model->update_venta($data_update_venta,$numero_venta);

                 return $datos['FOLIO'];
           }




 }