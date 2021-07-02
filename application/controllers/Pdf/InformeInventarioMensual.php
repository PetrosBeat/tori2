<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeInventarioMensual extends CI_Controller {


    public function index()
    {

                  $Fecha_informe                  = $this->input->post('mes');
                  if($Fecha_informe == "")
                  {
                    $Fecha_informe = date('n');
                  }


//establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->crearFolderVentas();

        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename("InformeMensual".'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('LETTER', 'P');



        $titulo ="Informe Inventario Mensual";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
              'titulo'                   => $titulo,
              'Empresa'                  => $this->Informacion_Model->getApp(),
              'Datos_Inventario'         => $this->Inventarios_Model->ver_inventario_mes($Fecha_informe),
              'Datos_Detalle_Inventario' => $this->Inventarios_Model->ver_detalle_inventario_mes($Fecha_informe),

              'Fecha'                    => $Fecha_informe
        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla

         $this->html2pdf->html(utf8_decode($this->load->view('Pdf/InformeInventarioMensual', $data, true,'UTF-8')));


      if($this->html2pdf->crear('save'))
        {
            $this->show();
        }

    }
     private function crearFolderVentas()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs/", 0777);
        }
    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show()
    {
        if(is_dir("./files/pdfs/"))
        {
            $filename = "InformeMensual.pdf";
            $route = base_url("files/pdfs/"."InformeMensual.pdf");
            if(file_exists("./files/pdfs/"."InformeMensual.pdf")){
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


