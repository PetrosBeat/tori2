<?php
class Turnos extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Turnos');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
     $contenido['empresa']      = $this->Informacion_Model->getApp();
    $contenido['sub_titulo']     = "Turnos";
    $this->layout->js('assets/custom/turnos.js');
    //$this->output->cache(60);

    $this->layout->view('Gestion/Turnos',$contenido);

  }
  else
  {
    redirect('Conectar');
  }
  }
         public function ver_turno_area_dia()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Turnos_Model->Ver_Turno_Area_Dia($this->input->post("area"),$this->input->post("dia"),$this->input->post("semana"));


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
         public function ver_turno_area_dia2()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Turnos_Model->Ver_Turno_Area_Dia2($this->input->post("area"),$this->input->post("dia"));


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
        public function ver_turno_area()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Turnos_Model->Ver_Turno_Area($this->input->post("area"));
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
        public function editar_hora_trabajador()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {
          if($this->input->post("id") == 0)
          {
            $data = $this->Turnos_Model->Get_Valor_Id_Trabajador($this->input->post("area"),$this->input->post("trabajador"),$this->input->post("semana"),$this->input->post("dia"));
             $valor_id = $data['valor_id'] + 1;

              $semana           = str_replace("-W", " ", $this->input->post("semana"));
                    $semana2          = explode(" ",$semana);
                    $week_number      = $semana2[1];
                    $year             = $semana2[0];

              $data = array(
                                              'dia'              => $this->input->post("dia"),
                                              'hora'              => $this->input->post("hora"),
                                              'trabajador'        => $this->input->post("trabajador"),
                                              'opcion_trabajador' => $this->input->post("opcion"),
                                              'semana'            => $this->input->post("semana"),
                                              'valor_id'          => $valor_id,
                                              'fecha'             => date('Y-m-d', strtotime($year."W".$week_number.$this->input->post("dia")))
                                            );
                                      $response =   $this->Trabajadores_Model->crear_turno($data);
          }
          else
          {
               $data_update = array('opcion_trabajador' =>$this->input->post("opcion") );
              $response = $this->Turnos_Model->EditarHoraTrabajador($data_update,$this->input->post("id"));
          }

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
        public function contar_horas_trabajador()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {
              $area       = $this->input->post("area");
              $trabajador = $this->input->post("trabajador");
              $semana     = $this->input->post("semana");
              $dia        = $this->input->post("dia");

              $response = $this->Turnos_Model->Ver_Turno_Area_Total_Dia($area,$trabajador,$semana,$dia);
             $response2 = $this->Turnos_Model->Ver_Turno_Area_Total_Semana($area,$trabajador,$semana);


            if($response != 0)
            {
              echo json_encode(array('status'=>'success','data'=>$response,'data2'=>$response2));
            }
            else
            {
              echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
            }
            }

        }
         public function cantidad_trabajando_area()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Turnos_Model->cantidad_trabajando_area($this->input->post("area"),$this->input->post("dia"),$this->input->post("semana"));
             //  var_dump($response);

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
         public function get_turno_area()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Turnos_Model->get_turno_area_semana($this->input->post("area"),$this->input->post("semana"));
             //  var_dump($response);

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
        public function generar_turno_area()
         {
              if(!$this->input->is_ajax_request())
              {
                show_404();
              }else
              {

                    $semana           = str_replace("-W", " ", $this->input->post("semana"));
                    $semana2          = explode(" ",$semana);
                    $week_number      = $semana2[1];
                    $year             = $semana2[0];
                    if($this->Turnos_Model->get_turno_area_semana($this->input->post("area"),$this->input->post("semana")) != '0')
                    {
                        echo json_encode(array('status'=>'success'));
                        return false;
                    }

                    foreach ($this->Trabajadores_Model->ver_trabajadores_area($this->input->post("area")) as $row) {


                      $horario_trabajador = $this->Trabajadores_Model->ver_horario_trabajador($row['rut']);
                      $colaciones_trabajador = $this->Trabajadores_Model->ver_colaciones_trabajador($row['rut']);
                       $he_trabajador = $this->Trabajadores_Model->ver_horas_extras_trabajador($row['rut']);
                      if($horario_trabajador != 0)
                      {
                       //   $colaciones =  explode(" ",$colaciones_trabajador);
                       //   $cantidad_colaciones = count($colaciones);
                          foreach ($horario_trabajador as $row2)
                          {

                            if($row['rut'] === $row2['trabajador'])
                            {

                                  $hora_inicio        = date("H:i", strtotime( $row2['hora_inicio']));
                                  $hora_termino       = date("H:i", strtotime( $row2['hora_termino']));
                                  $valor_id           = 1;
                                while ($hora_inicio <= $hora_termino) {

                                       $data = array(
                                              'dia'              => $row2['dia'],
                                              'hora'              => $hora_inicio,
                                              'trabajador'        => $row['rut'],
                                              'opcion_trabajador' => "T",
                                              'semana'            => $this->input->post("semana"),
                                              'valor_id'          => $valor_id,
                                              'fecha'             => date('Y-m-d', strtotime($year."W".$week_number.$row2['dia']))
                                            );




                                    $hora_inicio       =  date("H:i", strtotime('+30 minutes', strtotime($hora_inicio)));
                                     $view = $this->Turnos_Model->GetHorasT($this->input->post("area"),$row['rut'],$this->input->post("semana"),$row2['dia'],$hora_inicio);
                                     if($view == 0)
                                        {
                                          $this->Trabajadores_Model->crear_turno($data);
                                           $valor_id = $valor_id + 1;
                                        }

                                 }//while
                             }//if
                          }//foreach horario
                    }//if horario
                    //aca cambio el horario de las colaciones
                    if($colaciones_trabajador != 0)
                    {
                        foreach ($colaciones_trabajador as $row) {
                          $data = array('opcion_trabajador' => "C" );
                          $this->Turnos_Model->ActualizarColacionTurno($data,$row['dia'],$row['trabajador'],$row['hora']);
                        }
                    }
                     if($he_trabajador != 0)
                    {

                        foreach ($he_trabajador as $row) {
                           $data     = $this->Turnos_Model->Get_Valor_Id_Trabajador($this->input->post("area"),$row['trabajador'],$this->input->post("semana"),$row['dia']);
                           $valor_id = $data['valor_id'] + 1;
                           $data = array(
                                              'dia'              => $row['dia'],
                                              'hora'              => $row['hora'],
                                              'trabajador'        => $row['trabajador'],
                                              'opcion_trabajador' => "E",
                                              'semana'            => $this->input->post("semana"),
                                              'valor_id'          => $valor_id,
                                              'fecha'             => date('Y-m-d', strtotime($year."W".$week_number.$row['dia']))
                                            );

                           $this->Trabajadores_Model->crear_turno($data);

                        }
                    }
              }//foreach trabajadores
               echo json_encode(array('status'=>'success'));
         }
      }


 }
