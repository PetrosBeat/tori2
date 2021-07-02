<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaMes extends CI_Controller {


    public function index()
    {

                  $mes                  = $this->uri->segment(2);


//establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
         $this->html2pdf->folder('./files/pdfs/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename('VentaMes'.$mes.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');



        $titulo ="Venta N° $mes";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
             'titulo'               => $titulo,
             'Empresa'              => $this->Informacion_Model->getApp(),
             'Datos_Venta'          => $this->Ventas_Model->ver_ventas_mes($mes),
             'Mes'                  => $this->Informacion_Model->getMes($mes)
        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/VentaMes', $data, true,'UTF-8')));

 if($this->html2pdf->crear('save'))
        {
            $this->show($mes);
        }

    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
   public function show($mes)
    {
        if(is_dir("./files/pdfs/"))
        {
                $route    = base_url("files/pdfs/VentaMes".$mes.".pdf");
                if(file_exists("./files/pdfs/VentaMes".$mes.".pdf"))
                {
                        header('Content-type: application/pdf');
                        readfile($route);
                }
        }
    }

}


