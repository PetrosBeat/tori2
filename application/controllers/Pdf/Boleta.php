<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boleta extends CI_Controller {


    public function index()
    {

                   $Numero_Venta = $this->uri->segment(2);
                   $dato         = $this->Ventas_Model->ver_ventas($Numero_Venta);
                   $RutCotizador = $dato['rut_cliente'];


                   //establecemos la carpeta en la que queremos guardar los pdfs,
                   //si no existen las creamos y damos permisos
                   $this->html2pdf->folder('./files/pdfs/Otros/');

                   //establecemos el nombre del archivo
                   $this->html2pdf->filename($Numero_Venta.'.pdf');

                   //establecemos el tipo de papel
                   $this->html2pdf->paper('LETTER', 'P');



                   $titulo       = "Venta N° $Numero_Venta";
                   //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
             'titulo'               => $titulo,
             'Empresa'              => $this->Informacion_Model->getApp(),
             'Datos_Venta'          => $this->Ventas_Model->ver_ventas($Numero_Venta),
             'CountVentas'          => $this->Ventas_Model->ventas_count($Numero_Venta),
             'Datos_Venta_Multiple' => $this->Ventas_Model->ver_ventas_multiples($Numero_Venta),
             'Datos_Comprador'      => $this->Cliente_Model->ver_cliente_rut($RutCotizador),
             'Datos_Detalle_Venta'  => $this->Ventas_Model->ver_detalle_ventas($Numero_Venta),
             'NumeroComprobante'    => $Numero_Venta
        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/Boleta', $data, true,'UTF-8')));

 if($this->html2pdf->crear('save'))
        {
            $this->show($Numero_Venta);
        }

    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
   public function show($Numero_Venta)
    {
        if(is_dir("./files/pdfs/Otros/"))
        {
                $route    = base_url("files/pdfs/Otros/".$Numero_Venta.".pdf");
                if(file_exists("./files/pdfs/Otros/".$Numero_Venta.".pdf"))
                {
                        header('Content-type: application/pdf');
                        readfile($route);
                }
        }
    }

}


