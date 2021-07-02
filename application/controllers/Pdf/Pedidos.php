<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion_Pdf extends CI_Controller {


    public function index()
    {

                  $NumeroCotizacion                  = $this->uri->segment(2);
                   $dato                                = $this->Cotizaciones_Model->ver_cotizacion($NumeroCotizacion);
                   $RutCotizador                          = $dato['rut'];


//establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->crearFolderCotizaciones();

        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/Cotizaciones/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename($NumeroCotizacion.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');



   $titulo ="Cotizacion N° $NumeroCotizacion";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
             'titulo'                   => $titulo,
             'Empresa'                  => $this->Informacion_Model->getApp(),
             'Datos_Cotizacion'         => $this->Cotizaciones_Model->ver_cotizacion($NumeroCotizacion),
             'Datos_Cotizador'          => $this->Cliente_Model->ver_cliente_rut($RutCotizador),
             'Datos_Detalle_Cotizacion' => $this->Cotizaciones_Model->ver_detalle_cotizacion($NumeroCotizacion),
             'NumeroComprobante'        =>$NumeroCotizacion

        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/Cotizacion_Pdf', $data, true,'UTF-8')));


      if($this->html2pdf->crear('save'))
        {
            $this->show($NumeroCotizacion);
        }

    }
     private function crearFolderCotizaciones()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs/Cotizaciones/", 0777);
        }
    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show($NumeroCotizacion)
    {
        if(is_dir("./files/pdfs/Cotizaciones/"))
        {
            $filename = $NumeroCotizacion.".pdf";
            $route = base_url("files/pdfs/Cotizaciones/".$NumeroCotizacion.".pdf");
            if(file_exists("./files/pdfs/Cotizaciones/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


