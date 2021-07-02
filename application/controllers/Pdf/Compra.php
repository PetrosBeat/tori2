<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Controller {


    public function index()
    {

                   $numero_compra = $this->uri->segment(2);
                   $dato         = $this->Compras_Model->ver_compra($numero_compra);
                   $proveedor = $dato['rut'];


                   //establecemos la carpeta en la que queremos guardar los pdfs,
                   //si no existen las creamos y damos permisos
                   $this->html2pdf->folder('./files/pdfs/');

                   //establecemos el nombre del archivo
                   $this->html2pdf->filename("Compra-".$numero_compra.'.pdf');

                   //establecemos el tipo de papel
                   $this->html2pdf->paper('LETTER', 'P');



                   $titulo       = "Compra N° $numero_compra";
                   //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
             'titulo'               => $titulo,
             'Empresa'              => $this->Informacion_Model->getApp(),
             'Datos_Compra'         => $this->Compras_Model->ver_compra($numero_compra),
             'Datos_Comprador'      => $this->Proveedor_Model->ver_proveedor_rut($proveedor),
             'Datos_Detalle_Compra' => $this->Compras_Model->ver_detalle_compra($numero_compra),
             'NumeroComprobante'    => $numero_compra
        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/Compra', $data, true,'UTF-8')));

 if($this->html2pdf->crear('save'))
        {
            $this->show($numero_compra);
        }

    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
   public function show($numero_compra)
    {
        if(is_dir("./files/pdfs/"))
        {
                $route    = base_url("files/pdfs/Compra-".$numero_compra.".pdf");
                if(file_exists("./files/pdfs/Compra-".$numero_compra.".pdf"))
                {
                        header('Content-type: application/pdf');
                        readfile($route);
                }
        }
    }

}


