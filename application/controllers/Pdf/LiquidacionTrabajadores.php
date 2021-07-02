<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiquidacionTrabajadores extends CI_Controller {


    public function index()
    {

            $id                  = $this->uri->segment(2);



        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/liquidaciones/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename($id.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');



   $titulo ="LIQUIDACIONES DE SUELDO ";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(

             'Empresa'                  => $this->Informacion_Model->getApp(),
             'Datos_Liquidacion'         => $this->Remuneraciones_Model->ver_remuneraciones($id)


        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/LiquidacionTrabajadores', $data, true,'UTF-8')));


      if($this->html2pdf->crear('save'))
        {
            $this->show($id);
        }

    }



    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show($id)
    {
        if(is_dir("./files/pdfs/liquidaciones/"))
        {
            $filename = $id.".pdf";
            $route = base_url("files/pdfs/liquidaciones/".$id.".pdf");
            if(file_exists("./files/pdfs/liquidaciones/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


