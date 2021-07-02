<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {


    public function index()
    {

                  $numero_inventario                  = $this->uri->segment(2);


        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename('Inventario.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');



        $titulo ="Inventario N° $numero_inventario";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
              'titulo'                   => $titulo,
              'Empresa'                  => $this->Informacion_Model->getApp(),
              'Datos_Inventario'         => $this->Inventarios_Model->ver_inventario($numero_inventario),

              'Datos_Detalle_Inventario' => $this->Inventarios_Model->ver_detalle_inventario($numero_inventario),
              'NumeroComprobante'        => $numero_inventario
        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/Inventario', $data, true,'UTF-8')));


      if($this->html2pdf->crear('save'))
        {
            $this->show();
        }

    }



    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show()
    {
        if(is_dir("./files/pdfs/"))
        {
                $route    = base_url("files/pdfs/Inventario.pdf");
                if(file_exists("./files/pdfs/Inventario.pdf"))
                {
                        header('Content-type: application/pdf');
                        readfile($route);
                }
        }
    }

}


