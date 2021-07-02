<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiquidacionTrabajador extends CI_Controller {


    public function index()
    {

            $id                  = $this->uri->segment(2);
            $dato                = $this->Remuneraciones_Model->ver_trabajador($id);
            $rut                 = $dato['rut'];



        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/liquidaciones/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename($rut.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('A4', 'P');



   $titulo ="LIQUIDACION DE SUELDO ";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
             'afp'                   => $this->Informacion_Model->getAfp($dato['afp']),
             'Empresa'                  => $this->Informacion_Model->getApp(),
             'Datos_Trabajador'         => $this->Trabajadores_Model->ver_trabajador($id)


        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/LiquidacionTrabajador', $data, true,'UTF-8')));


      if($this->html2pdf->crear('save'))
        {
            $this->show($rut);
        }

    }
     private function crearFolderCotizaciones()
    {
        if(!is_dir("./files/liquidaciones"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs/liquidaciones", 0777);
        }
    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show($rut)
    {
        if(is_dir("./files/pdfs/liquidaciones"))
        {
            $filename = $rut.".pdf";
            $route = base_url("files/pdfs/liquidaciones/".$rut.".pdf");
            if(file_exists("./files/pdfs/liquidaciones/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


