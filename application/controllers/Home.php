<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE  OR $this->session->userdata('Vendedor') == TRUE OR $this->session->userdata('Cajero')){


		$this->layout->title('Home');
		$contenido['home_indicador'] = true;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "Home";
    //$this->layout->js('assets/custom/home.js');


		//$this->output->cache(60);
		$this->layout->view('Home',$contenido);
	}
	else
	{
		redirect('Conectar');
	}
	}

	  function cargar_archivo() {

			        $mi_archivo = 'mi_archivo';
			        $config['upload_path'] = "articulos/";
			        $config['file_name'] = "nombre_archivo";
			        $config['allowed_types'] = "*";
			        $config['max_size'] = "50000";
			        $config['max_width'] = "2000";
			        $config['max_height'] = "2000";
			        $config['encrypt_name'] = true;
			         $config['remove_spaces'] = true;


			        $this->load->library('upload', $config);

			        if (!$this->upload->do_upload($mi_archivo)) {
			            //*** ocurrio un error
			            $data['uploadError'] = $this->upload->display_errors();
			            echo $this->upload->display_errors();
			            return;
			        }

			        $data['uploadSuccess'] = $this->upload->data();
    }
    public function area_empresa()
  {

      if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

        $response = $this->Informacion_Model->area_empresa();
        if($response != 0)
            {
              echo json_encode(array('status'=>'success','data'=>$response));
            }
            else
            {
              echo json_encode(array('status' =>"error",'message'=>"No hay datos"));
            }

      }

  }
    function getApp()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
        echo  json_encode($this->Informacion_Model->getApp());
      }

    }
    function nacionalidad()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
        echo  json_encode($this->Informacion_Model->nacionalidad());
      }

    }
     function provincias()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
        echo  json_encode($this->Informacion_Model->provincias());
      }

    }
     function comunas()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
        echo  json_encode($this->Informacion_Model->comunas($this->input->post("ciudad")));
      }

    }
     function isapres()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
        echo  json_encode($this->Informacion_Model->isapres());
      }

    }

    function afp()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
        echo  json_encode($this->Informacion_Model->afp());
      }

    }
     public function grafico_venta_mensuales()
        {

          if(!$this->input->is_ajax_request())
      {
        show_404();
      }else{

              $response = $this->Informes_Model->grafico_venta_mensuales($this->input->post('year'));
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

         public function grafico_dia_forma_pago()
        {

          if(!$this->input->is_ajax_request())
      {
        show_404();
      }else{

              $response = $this->Informes_Model->grafico_dia_forma_pago($this->input->post('year'));
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
         public function estadisticas_generales()
        {

          if(!$this->input->is_ajax_request())
      {
        show_404();
      }else{

              $response = $this->Informes_Model->estadisticas_generales($this->input->post('fecha'));
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


}
