<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja extends CI_Controller {
     public function __construct() {
        parent::__construct();
    }
      public function index()
  {
        if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE )
        {
          $this->layout->title('Caja');
          $contenido['home_indicador'] = false;
          $contenido['conectado'] = true;
          $contenido['sub_titulo'] = "Caja";
          // $this->output->cache(60);
          $this->layout->css('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');
          $this->layout->js("assets/custom/caja.js");
          $this->layout->view('Contabilidad/Caja',$contenido);
        }
        else
        {
          redirect('Conectar');
        }
  }


         public function find()
        {


            if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
                $datos_empresa = $this->Informacion_Model->getApp();
                $numero_caja   = $datos_empresa['numero_caja'] - 1;
              $response = $this->Caja_Model->ver_caja($numero_caja);
              if($response != 0)
            {
              echo json_encode(array('status'=>'success','data'=>$response));
            }
            else
            {
              echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
            }
            }



        }


        public function crear_caja_inicio()
        {


                if(!$this->input->is_ajax_request())
          {
            show_404();
          }else
          {
                    $datos_empresa    = $this->Informacion_Model->getApp();
                    $numero_caja      = $datos_empresa['numero_caja'];
                    $numero_caja2     = $datos_empresa['numero_caja'] + 1;
                    $MontoApertura = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('monto_apertura',TRUE)));
                    $Fecha         =  date('Y-m-d H:i:s');
                    $rut_vendedor  = $this->session->userdata('id');
                    $Data           = array(
                                          'fecha'         => $Fecha ,
                                          'monto_inicial' => $MontoApertura ,
                                          'estado'        => 0,
                                          'numero_caja'   => $numero_caja,
                                          'rut_vendedor'        => $rut_vendedor,
                                          'fecha_cierre'  => "0000-00-00 00:00:00"

                                        );
                    $this->Caja_Model->crear_caja($Data);
                    $Data_Empresa = array('numero_caja' => $numero_caja2);
                    $this->Informacion_Model->Update_Empresa($Data_Empresa);
                    echo json_encode(array('status'=>'success','numero_caja'=>$numero_caja));

            }
        }
         public function detalle_caja()
        {


                if(!$this->input->is_ajax_request())
          {
            show_404();
          }else
          {

                    $response = $this->Caja_Model->CajaAserradero();
                    echo json_encode(array('status'=>'success','data'=>$response));

            }
        }
        public function crear_caja_fin()
        {


              if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {
                    $datos_empresa    = $this->Informacion_Model->getApp();
                    $numero_caja     = $datos_empresa['numero_caja'] - 1;

                    $fecha         =  date('Y-m-d H:i:s');
                    $rut_vendedor  = $this->session->userdata('id');
                    $Data           = array(
                                          'estado'        => 1,
                                          'fecha_cierre'  => $fecha
                                        );
                    $this->Caja_Model->update_caja($Data,$numero_caja);
                     echo json_encode(array('status'=>'success','numero_caja'=>$numero_caja));
            }
        }


}