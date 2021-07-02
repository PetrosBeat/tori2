<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagosClientes extends CI_Controller {


    public function index()
    {
            $NumeroPago                  = $this->uri->segment(2);
            $dato = $this->Pagos_Model->getPagosCliente($NumeroPago);

//establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->crearFolderPagos();

        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/PagosClientes/');

        //establecemos el nombre del archivo
        $this->html2pdf->filename($NumeroPago.'.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('A4', 'P');


         $rutcliente = $dato['rut'];

   $titulo ="Comprobante de Pago Numero $NumeroPago";
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
               'titulo'            =>$titulo,
               'CPago'             =>$this->Pagos_Model->getDatosComprobantePagoClienteObject($NumeroPago),
               'Cliente'           =>$this->Clientes_Model->getClienteseSugunRut($rutcliente),
               'Empresa'           =>$this->Informacion_Model->getDatos_Empresa(),
               'Guia'              =>$this->Pagos_Model->getDatosComprobantePagoCliente($NumeroPago),
               'NumeroComprobante' =>$NumeroPago,
               'GuiaImpaga'        =>$this->Pagos_Model->getGuia_ImpagasCliente($rutcliente),
               'Pago'              =>$this->Pagos_Model->getPagosCliente($NumeroPago),
               'DetallePago'       =>$this->Pagos_Model->getPagosCliente2($NumeroPago)
        );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        //si el pdf se guarda correctamente lo mostramos en pantalla


        $this->html2pdf->html(utf8_decode($this->load->view('Pdf/PagosClientes', $data, true)));

      if($this->html2pdf->crear('save'))
        {
            $this->show($NumeroPago);
        }

    }

     private function crearFolderPagos()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs/PagosClientes/", 0777);
        }
    }


    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show($NumeroPago)
    {
        if(is_dir("./files/pdfs/PagosClientes/"))
        {
            $filename = $NumeroPago.".pdf";
            $route = base_url("files/pdfs/PagosClientes/".$NumeroPago.".pdf");
            if(file_exists("./files/pdfs/PagosClientes/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

}


