<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReglamentoInterno extends CI_Controller {


    public function index()
    {

                  $id                  = $this->uri->segment(2);
                   $dato                                = $this->Trabajadores_Model->ver_trabajador($id);
                   $rut                          = $dato['rut'];


//establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->crearFolderCotizaciones();

        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename("ReglamentoInterno-".$rut.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');



   $titulo ="Reglamento Interno";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
             'afp'                   => $this->Informacion_Model->getAfp($dato['afp']),
             'Empresa'                  => $this->Informacion_Model->getApp(),
             'Datos_Trabajador'         => $this->Trabajadores_Model->ver_trabajador($id)


        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/ReglamentoInterno', $data, true,'UTF-8')));


      if($this->html2pdf->crear('save'))
        {
            $this->show($rut);
        }

    }
     private function crearFolderCotizaciones()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs/", 0777);
        }
    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show($rut)
    {
        if(is_dir("./files/pdfs/"))
        {
            $filename = "ReglamentoInterno-".$rut.".pdf";
            $route = base_url("files/pdfs/ReglamentoInterno-".$rut.".pdf");
            if(file_exists("./files/pdfs/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


