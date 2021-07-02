<?php
class Calendario extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Calendario');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
     $contenido['empresa']      = $this->Informacion_Model->getApp();
    $contenido['sub_titulo']     = "Calendario";
    $this->layout->js('assets/custom/calendario.js');
    //$this->output->cache(60);
    $this->layout->view('Gestion/Calendario',$contenido);
  }
  else
  {
    redirect('Conectar');
  }
  }

        function getCalendario()
    {
      if(!$this->input->is_ajax_request())
      {
        show_404();
      }else
      {
         echo  json_encode($this->Calendario_Model->getCaledario());
      }

    }

        public function ver_datos_calendario_id()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Calendario_Model->ver_calendario_id($this->input->post("id"));
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

	    public function crear_evento()

  {

        if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {


                     $data = array(
                                    'fecha'       => $this->input->post("fecha"),
                                    'hora'        => $this->input->post("hora"),
                                    'descripcion' => $this->input->post("descripcion"),
                                    'color'       => $this->input->post("color"),
                                    'titulo'      => $this->input->post("titulo")

                                  );
                     $this->Calendario_Model->crear_evento($data);

            echo json_encode(array('status'=>'success'));

      }
    }
        public function editar_evento()

  {

        if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {


                     $data = array(
                                    'fecha'       => $this->input->post("fecha"),
                                    'hora'        => $this->input->post("hora"),
                                    'descripcion' => $this->input->post("descripcion"),
                                    'color'       => $this->input->post("color"),
                                    'titulo'      => $this->input->post("titulo")

                                  );
                     $this->Calendario_Model->editar_evento($data,$this->input->post("id_evento"));

            echo json_encode(array('status'=>'success'));

      }
  }
         public function eliminar_evento()

  {

        if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {
                     $this->Calendario_Model->eliminar_evento($this->input->post("id"));

            echo json_encode(array('status'=>'success'));

      }
  }
 }
