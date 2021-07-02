<?php
class VentasPorCliente extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('VentasPorCliente');
    if($_GET['cliente'] == NULL)
                    {
                      $cliente = NULL;
                    }
                    else
                    {
                      $cliente = $_GET['cliente'];
                    }
                      if($_GET['inicio'] == NULL)
                    {
                      $inicio = NULL;
                    }
                    else
                    {
                      $inicio = $_GET['inicio'];
                    }
                      if($_GET['fin'] == NULL)
                    {
                      $fin = NULL;
                    }
                    else
                    {
                      $fin = $_GET['fin'];
                    }
                             $contenido['cliente']        = $cliente;
                                     $contenido['inicio']         = $inicio;
                                     $contenido['fin']            = $fin;

    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
    $contenido['sub_titulo']     = "VentasPorCliente";
    $this->layout->js('assets/custom/informes.js');
    //$this->output->cache(60);
    $this->layout->view('Informes/VentasPorCliente',$contenido);
  }
  else
  {
    redirect('Conectar');
  }
  }



}