<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoletaDespacho extends CI_Controller {


    public function index()
    {

                   $NumeroDespacho = $this->uri->segment(2);
                   $dato           = $this->Despachos_Model->getDespacho($NumeroDespacho);
                   $RutVenta       = $dato['rut_cliente'];


//establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->crearFolderBoletas();

        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/Despachos/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename($NumeroDespacho.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');

        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
              'Empresa'             => $this->Informacion_Model->getApp(),
              'NumeroComprobante'   => $NumeroDespacho,
              'Datos_Venta'         => $this->Despachos_Model->getDespacho($NumeroDespacho),
              'Datos_Cliente'       => $this->Cliente_Model->ver_cliente_rut($RutVenta),
              'Datos_Detalle_Venta' => $this->Despachos_Model->getDetalleDespacho($NumeroDespacho),
              'Datos_Ventas'        => $this->Ventas_Model->ver_ventas($NumeroDespacho)
        );


        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla
        $this->html2pdf->html(utf8_decode($this->load->view('Pdf/BoletaDespacho', $data, TRUE)));

      if($this->html2pdf->crear('save'))
        {
            $this->show($NumeroDespacho);
        }

    }
     private function crearFolderBoletas()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs/Despachos/", 0777);
        }
    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show($NumeroDespacho)
    {
        if(is_dir("./files/pdfs/Despachos/"))
        {
            $filename = $NumeroDespacho.".pdf";
            $route = base_url("files/pdfs/Despachos/".$NumeroDespacho.".pdf");
            if(file_exists("./files/pdfs/Despachos/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


