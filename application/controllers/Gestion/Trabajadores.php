<?php
class Trabajadores extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Trabajadores');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
    $contenido['sub_titulo']     = "Trabajadores";
    $this->layout->js('assets/custom/trabajadores.js');
    //$this->output->cache(60);
    $this->layout->view('Gestion/Trabajadores',$contenido);
  }
  else
  {
    redirect('Conectar');
  }
  }
  public function verificartrabajador()
  {

      if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {
              $dato                 = $this->input->post("rut_proveedor");
              $replace              = str_replace(".", "", $dato);
              $rut                  = str_replace("-", "", $replace);
        $response = $this->Trabajadores_Model->ver_trabajador($rut);
        if($response != 0)
            {
              echo json_encode(array('status'=>'success','data'=>true));
            }
            else
            {
              echo json_encode(array('status' =>"error",'message'=>"El rut ".$dato." ya existe en la base de datos"));
            }

      }

  }
  public function datostrabajador()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {
            $id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
            $response = $this->Trabajadores_Model->ver_trabajador($id);
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
    public function borrar_documentos_trabajador()
  {

       if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{


                    $id   = $this->input->post("id");
                    $data = $this->Trabajadores_Model->getDocumentosTrabajadorID($id);
                    $trim = trim($data['documento']);
                    unlink("files/trabajadores/documentos/".$trim);
                   $this->Trabajadores_Model->DeleteDocumentosTrabajador($id);
                   echo json_encode(array('status' => 'success'));

        }

  }
   public function borrar_licencias_trabajador()
  {

       if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{


                    $id   = $this->input->post("id");
                   $this->Trabajadores_Model->delete_licencias($id);
                   echo json_encode(array('status' => 'success'));

        }

  }
     public function borrar_vacaciones_trabajador()
  {

       if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{


                    $id   = $this->input->post("id");
                   $this->Trabajadores_Model->delete_vacaciones($id);
                   echo json_encode(array('status' => 'success'));

        }

  }
     public function borrar_ausencias_trabajador()
  {

       if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{


                    $id   = $this->input->post("id");
                   $this->Trabajadores_Model->delete_ausencias($id);
                   echo json_encode(array('status' => 'success'));

        }

  }
   public function borrar_colacion_trabajador()
  {

       if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{


                    $id   = $this->input->post("id");
                   $this->Trabajadores_Model->delete_colaciones($id);
                   echo json_encode(array('status' => 'success'));

        }

  }
    public function borrar_hora_extra_trabajador()
  {

       if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{


                    $id   = $this->input->post("id");
                   $this->Trabajadores_Model->delete_horas_extras($id);
                   echo json_encode(array('status' => 'success'));

        }

  }
  public function get_documentos_trabajador()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

            $response = $this->Trabajadores_Model->getDocumentosTrabajador($this->input->post("trabajador"));
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
   public function get_licencias_trabajador()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

            $response = $this->Trabajadores_Model->getLicenciasTrabajador($this->input->post("trabajador"));
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
   public function get_vacaciones_trabajador()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

            $response = $this->Trabajadores_Model->getVacacionesTrabajador($this->input->post("trabajador"));
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
   public function get_ausencias_trabajador()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

            $response = $this->Trabajadores_Model->getAusenciasTrabajador($this->input->post("trabajador"));
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
  public function get_horario_trabajador()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

            $response = $this->Trabajadores_Model->ver_horario_trabajador($this->input->post("trabajador"));
             $response2 = $this->Trabajadores_Model->ver_colaciones_trabajador($this->input->post("trabajador"));
             $response3 = $this->Trabajadores_Model->ver_horas_extras_trabajador($this->input->post("trabajador"));
            if($response != 0)
            {
              echo json_encode(array('status'=>'success','data'=>$response,'data2'=>$response2,'data3'=>$response3));
            }
            else
            {
              echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
            }
        }

  }
    public function get_trabajadores_area()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {

            $response = $this->Trabajadores_Model->ver_trabajadores_area($this->input->post("area"));
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
  public function datostrabajador3()
  {

        if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {
            $id        = $this->security->sanitize_filename($this->input->input_stream('rut',TRUE));
            $response = $this->Trabajadores_Model->ver_trabajador_rut($id);
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

    public function find()
        {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

              $response = $this->Trabajadores_Model->getTrabajadores();
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
	    public function creartrabajador()

  {

        if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {
            $dato           = $this->input->post("rut_trabajador");
            $rut_trabajador = str_replace(".", "", $dato);

            $nombres                  = $this->input->post("nombres");
            $apellidos                = $this->input->post("apellidos");
            $fecha_ingreso            = $this->input->post("fecha_ingreso");
            $nacionalidad             = $this->input->post("nacionalidad");
            $fecha_nacimiento         = $this->input->post("fecha_nacimiento");
            $estado_civil             = $this->input->post("estado_civil");
            $ciudad                   = $this->input->post("ciudad");
            $cargo                    = $this->input->post("cargo");
            $sueldo                   = $this->Informacion_Model->ConvertirDinero($this->input->post("sueldo"));
            $numero_cargas            = $this->input->post("numero_cargas");
            $afp                      = $this->input->post("afp");
            $tipo_contrato            = $this->input->post("tipo_contrato");
            $carga_familiar           = $this->input->post("carga_familiar");

            $duracion_contrato        = $this->input->post("duracion_contrato");
            $correo                   = $this->input->post("correo");
            $telefono                 = $this->input->post("telefono");
            $direccion                = $this->input->post("direccion");
            $tipo_salud               = $this->input->post("tipo_salud");
            $isapre                   = $this->input->post("isapre");

            $select_area              = $this->input->post("select_area");
             $modalidad_trabajo = $this->input->post("modalidad_trabajo");
            $trabaja_hora_extras   = $this->input->post("trabaja_hora_extras");
            $fecha_pacto   = $this->input->post("fecha_pacto");
           if($tipo_contrato == '1')
           {
              $contrato_indefinido = 1;
           }
           else
           {
             $contrato_indefinido = 0;
           }

          $data_insert   = array(
                        'rut'                   => $rut_trabajador,
                        'nombres'               => $nombres,
                        'apellidos'             => $apellidos,
                        'fecha_ingreso'         => $fecha_ingreso,
                        'nacionalidad'          => $nacionalidad,
                        'fecha_nacimiento'      => $fecha_nacimiento,
                        'estado_civil'          => $estado_civil,
                        'ciudad'                => $ciudad,
                        'correo'                => $correo,
                        'telefono'              => $telefono,
                        'direccion'             => $direccion,
                        'cargo'                 => $cargo,
                        'tipo_salud'            => $tipo_salud,
                        'isapre'                => $isapre,
                        'sueldo'                => $sueldo,
                        'afp'                   => $afp,
                        'tipo_contrato'         => $tipo_contrato,
                        'carga_familiar'        => $carga_familiar,
                        'contrato_indefinido'   => $contrato_indefinido,
                        'duracion_contrato'     => $duracion_contrato,

                        'numero_cargas'         => $numero_cargas,

                        'area'                  => $select_area,
                        'modalidad_trabajo'         => $modalidad_trabajo,
                        'trabaja_hora_extras' => $trabaja_hora_extras,
                        'fecha_pacto' => $fecha_pacto,
                        'sexo' => $this->input->post("sexo"),
                        'colacion'                => $this->Informacion_Model->ConvertirDinero($this->input->post("colacion")),
                        'movilizacion'                => $this->Informacion_Model->ConvertirDinero($this->input->post("movilizacion"))
                      );
            $this->Trabajadores_Model->crear_trabajador($data_insert);
             echo json_encode(array('status'=>'success'));


      }

  }
   function cargar_archivo($archivo) {

        $mi_archivo = $archivo;
        $config['upload_path'] = "uploads/";
        $config['file_name'] = $this->Informacion_Model->generateRandomString();
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
    }
    function displayDates($date1, $date2, $format = 'Y-m-d' ) {
      $dates = array();
      $current = strtotime($date1);
      $date2 = strtotime($date2);
      $stepVal = '+1 day';
      while( $current <= $date2 ) {
         $dates[] = date($format, $current);
         $current = strtotime($stepVal, $current);
      }
      return $dates;
   }
   public function  crear_turno($area,$trabajador,$year,$week_number)
   {
                    $semana           = $year."-W".$week_number;

                    if($this->Turnos_Model->get_turno_area_semana($area,$semana) != '0')
                    {

                        return false;
                    }

                    foreach ($this->Trabajadores_Model->ver_trabajadores_area($area) as $row) {


                      $horario_trabajador = $this->Trabajadores_Model->ver_horario_trabajador($trabajador);
                      $colaciones_trabajador = $this->Trabajadores_Model->ver_colaciones_trabajador($trabajador);
                       $he_trabajador = $this->Trabajadores_Model->ver_horas_extras_trabajador($trabajador);
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
                                              'semana'            => $semana,
                                              'valor_id'          => $valor_id,
                                              'fecha'             => date('Y-m-d', strtotime($year."W".$week_number.$row2['dia']))
                                            );




                                    $hora_inicio       =  date("H:i", strtotime('+30 minutes', strtotime($hora_inicio)));
                                     $view = $this->Turnos_Model->GetHorasT($area,$row['rut'],$semana,$row2['dia'],$hora_inicio);
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
                           $data     = $this->Turnos_Model->Get_Valor_Id_Trabajador($area,$row['trabajador'],$semana,$row['dia']);
                           $valor_id = $data['valor_id'] + 1;
                           $data = array(
                                              'dia'              => $row['dia'],
                                              'hora'              => $row['hora'],
                                              'trabajador'        => $row['trabajador'],
                                              'opcion_trabajador' => "E",
                                              'semana'            => $semana,
                                              'valor_id'          => $valor_id,
                                              'fecha'             => date('Y-m-d', strtotime($year."W".$week_number.$row['dia']))
                                            );

                           $this->Trabajadores_Model->crear_turno($data);

                        }
                    }
   }

}
 public function editartrabajador()

  {

        if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {
            $id                       = $this->input->post("id_trabajador");
            $rut_trabajador           = $this->input->post("rut_trabajador");
            $nombres                  = $this->input->post("nombres");
            $apellidos                = $this->input->post("apellidos");
            $fecha_ingreso            = $this->input->post("fecha_ingreso");
            $nacionalidad             = $this->input->post("nacionalidad");
            $fecha_nacimiento         = $this->input->post("fecha_nacimiento");
            $estado_civil             = $this->input->post("estado_civil");
            $ciudad                   = $this->input->post("ciudad");
            $cargo                    = $this->input->post("cargo");
            $sueldo                   = $this->Informacion_Model->ConvertirDinero($this->input->post("sueldo"));
            $afp                      = $this->input->post("afp");
            $tipo_contrato            = $this->input->post("tipo_contrato");
            $carga_familiar           = $this->input->post("carga_familiar");
            $select_area              = $this->input->post("select_area");
            $duracion_contrato        = $this->input->post("duracion_contrato");
            $correo                   = $this->input->post("correo");
            $telefono                 = $this->input->post("telefono");
            $direccion                = $this->input->post("direccion");
            $tipo_salud               = $this->input->post("tipo_salud");
            $isapre                   = $this->input->post("isapre");
            $numero_cargas            = $this->input->post("numero_cargas");

             $modalidad_trabajo = $this->input->post("modalidad_trabajo");
            $trabaja_hora_extras   = $this->input->post("trabaja_hora_extras");
            $fecha_pacto   = $this->input->post("fecha_pacto");
           if($tipo_contrato == '1')
           {
              $contrato_indefinido = 1;
           }
           else
           {
             $contrato_indefinido = 0;
           }

          $data_update   = array(
                        //'rut'                 => $rut_trabajador,
                        'nombres'             => $nombres,
                        'apellidos'           => $apellidos,
                        'fecha_ingreso'       => $fecha_ingreso,
                        'nacionalidad'        => $nacionalidad,
                        'fecha_nacimiento'    => $fecha_nacimiento,
                        'estado_civil'        => $estado_civil,
                        'ciudad'              => $ciudad,
                        'correo'              => $correo,
                        'telefono'            => $telefono,
                        'direccion'           => $direccion,
                        'cargo'               => $cargo,
                        'tipo_salud'          => $tipo_salud,
                        'isapre'              => $isapre,
                        'sueldo'              => $sueldo,
                        'afp'                 => $afp,
                        'tipo_contrato'       => $tipo_contrato,
                        'carga_familiar'      => $carga_familiar,
                        'contrato_indefinido' => $contrato_indefinido,
                        'duracion_contrato'   => $duracion_contrato,
                        'numero_cargas'       => $numero_cargas,
                        'area'                => $select_area,
                        'modalidad_trabajo'   => $modalidad_trabajo,
                        'trabaja_hora_extras' => $trabaja_hora_extras,
                        'fecha_pacto'         => $fecha_pacto,
                        'sexo'                => $this->input->post("sexo"),
                          'colacion'                => $this->Informacion_Model->ConvertirDinero($this->input->post("colacion")),
                        'movilizacion'                => $this->Informacion_Model->ConvertirDinero($this->input->post("movilizacion"))
                      );

            //LICENCIA
             for ($i=1; $i <= $this->input->post("licencias") ; $i++) {
                    if(strlen($this->input->post("id_licencias".$i)) != '0')
                     {
                      //ACTUALIZA
                      $data_update = array(
                        'numero_licencia' => $this->input->post("numero_licencia".$i),
                        'fecha_inicio'    => $this->input->post("fecha_inicio_licencia".$i),
                        'fecha_termino'   => $this->input->post("fecha_termino_licencia".$i)
                      );
                      $this->Trabajadores_Model->actualizar_licencias($data_update,$this->input->post("id_licencias".$i));
                     }
                     else
                     {
                      //INSERTA
                      $data_insert = array(
                        'numero_licencia' => $this->input->post("numero_licencia".$i),
                        'fecha_inicio'    => $this->input->post("fecha_inicio_licencia".$i),
                        'fecha_termino'   => $this->input->post("fecha_termino_licencia".$i),
                        'trabajador'      => $rut_trabajador
                      );
                      $this->Trabajadores_Model->crear_licencias($data_insert);
                     }
                              $datetime1     = new DateTime($this->input->post("fecha_inicio_licencia".$i));
                              $datetime2     = new DateTime($this->input->post("fecha_termino_licencia".$i));
                              $interval      = $datetime1->diff($datetime2);
                              $cantidad_dias = $interval->format('%a');

                              $tiempo1       = $this->input->post("fecha_inicio_licencia".$i);
                              $tiempo2       = $this->input->post("fecha_termino_licencia".$i);

                              $date          = $this->displayDates($tiempo1, $tiempo2);
                              //CREAMOS EL TURNO SI NO EXISTE PARA CREAR LA LICENCIA


                              $timestamp     = strtotime($this->input->post("fecha_inicio_licencia".$i));
                              $day           = date('d', $timestamp);
                              $week_number   = date('W', $timestamp);
                              $year          = date('Y', $timestamp);
                              $data          = $this->crear_turno($select_area,$rut_trabajador,$year,$week_number);
                              for ($i=0; $i <= $cantidad_dias; $i++) {
                                             $data_update = array('opcion_trabajador' => "L" );
                                             $this->Turnos_Model->ActualizarTurnoFecha($data_update,$rut_trabajador,$date[$i]);

                                       }

                }
              //VACACIONES
             for ($i=1; $i <= $this->input->post("vacaciones") ; $i++) {
                    if(strlen($this->input->post("id_vacaciones".$i)) != '0')
                     {
                      //ACTUALIZA
                      $data_update = array(

                        'fecha_inicio'    => $this->input->post("fecha_inicio_vacaciones".$i),
                        'fecha_termino'   => $this->input->post("fecha_termino_vacaciones".$i)
                      );
                      $this->Trabajadores_Model->actualizar_vacaciones($data_update,$this->input->post("id_vacaciones".$i));
                     }
                     else
                     {
                      //INSERTA
                      $data_insert = array(

                        'fecha_inicio'    => $this->input->post("fecha_inicio_vacaciones".$i),
                        'fecha_termino'   => $this->input->post("fecha_termino_vacaciones".$i),
                        'trabajador'      => $rut_trabajador
                      );
                      $this->Trabajadores_Model->crear_vacaciones($data_insert);
                     }
                              $datetime1     = new DateTime($this->input->post("fecha_inicio_vacaciones".$i));
                              $datetime2     = new DateTime($this->input->post("fecha_termino_vacaciones".$i));
                              $interval      = $datetime1->diff($datetime2);
                              $cantidad_dias = $interval->format('%a');

                              $tiempo1       = $this->input->post("fecha_inicio_vacaciones".$i);
                              $tiempo2       = $this->input->post("fecha_termino_vacaciones".$i);

                              $date          = $this->displayDates($tiempo1, $tiempo2);
                              $timestamp     = strtotime($this->input->post("fecha_inicio_vacaciones".$i));
                              $day           = date('d', $timestamp);
                              $week_number   = date('W', $timestamp);
                              $year          = date('Y', $timestamp);
                              $data          = $this->crear_turno($select_area,$rut_trabajador,$year,$week_number);
                           for ($i=0; $i <= $cantidad_dias; $i++) {
                                 $data_update = array('opcion_trabajador' => "V" );
                                 $this->Turnos_Model->ActualizarTurnoFecha($data_update,$rut_trabajador,$date[$i]);

                           }
             }
               //AUSENCIAS
             for ($i=1; $i <= $this->input->post("ausencias") ; $i++) {
                    if(strlen($this->input->post("id_ausencias".$i)) != '0')
                     {
                      //ACTUALIZA
                      $data_update = array(

                        'fecha'    => $this->input->post("fecha_ausencia".$i),
                        'motivo'   => $this->input->post("motivo_ausencia".$i)
                      );
                      $this->Trabajadores_Model->actualizar_ausencias($data_update,$this->input->post("id_ausencias".$i));
                     }
                     else
                     {
                      //INSERTA
                      $data_insert = array(

                        'fecha'      => $this->input->post("fecha_ausencia".$i),
                        'motivo'     => $this->input->post("motivo_ausencia".$i),
                        'trabajador' => $rut_trabajador
                      );
                      $this->Trabajadores_Model->crear_ausencias($data_insert);
                     }
                              $datetime1     = new DateTime($this->input->post("fecha_ausencia".$i));
                              $datetime2     = new DateTime($this->input->post("fecha_ausencia".$i));
                              $interval      = $datetime1->diff($datetime2);
                              $cantidad_dias = $interval->format('%a');

                              $tiempo1       = $this->input->post("fecha_ausencia".$i);
                              $tiempo2       = $this->input->post("fecha_ausencia".$i);

                              $date          = $this->displayDates($tiempo1, $tiempo2);
                              $timestamp     = strtotime($this->input->post("fecha_ausencia".$i));
                              $day           = date('d', $timestamp);
                              $week_number   = date('W', $timestamp);
                              $year          = date('Y', $timestamp);
                              $data          = $this->crear_turno($select_area,$rut_trabajador,$year,$week_number);
                           for ($i=0; $i <= $cantidad_dias; $i++) {
                                 $data_update = array('opcion_trabajador' => "A" );
                                 $this->Turnos_Model->ActualizarTurnoFecha($data_update,$rut_trabajador,$date[$i]);

                           }
             }
             //HORARIO

             $lunes         = array(
                                   'trabajador'   => $rut_trabajador,
                               'dia'          => 1,
                               'hora_inicio'  => $this->input->post("hora_inicio_lunes"),
                               'hora_termino' => $this->input->post("hora_termino_lunes"),
                               'colacion'     => $this->input->post("colacion1_lunes")
                               );

         $martes         = array(
                               'trabajador'   => $rut_trabajador,
                               'dia'          => 2,
                               'hora_inicio'  => $this->input->post("hora_inicio_martes"),
                               'hora_termino' => $this->input->post("hora_termino_martes"),
                               'colacion'     => $this->input->post("colacion1_martes")
                               );
         $miercoles         = array(
                               'trabajador'   => $rut_trabajador,
                               'dia'          => 3,
                               'hora_inicio'  => $this->input->post("hora_inicio_miercoles"),
                               'hora_termino' => $this->input->post("hora_termino_miercoles"),
                               'colacion'     => $this->input->post("colacion1_miercoles")
                               );
         $jueves         = array(
                               'trabajador'   => $rut_trabajador,
                               'dia'          => 4,
                               'hora_inicio'  => $this->input->post("hora_inicio_jueves"),
                               'hora_termino' => $this->input->post("hora_termino_jueves"),
                               'colacion'     => $this->input->post("colacion1_jueves")
                               );
          $viernes         = array(
                               'trabajador'   => $rut_trabajador,
                               'dia'          => 5,
                               'hora_inicio'  => $this->input->post("hora_inicio_viernes"),
                               'hora_termino' => $this->input->post("hora_termino_viernes"),
                               'colacion'     => $this->input->post("colacion1_viernes")
                               );
          $sabado         = array(
                               'trabajador'   => $rut_trabajador,
                               'dia'          => 6,
                               'hora_inicio'  => $this->input->post("hora_inicio_sabado"),
                               'hora_termino' => $this->input->post("hora_termino_sabado"),
                               'colacion'     => $this->input->post("colacion1_sabado")
                               );
          $domingo         = array(
                               'trabajador'   => $rut_trabajador,
                               'dia'          => 7,
                               'hora_inicio'  => $this->input->post("hora_inicio_domingo"),
                               'hora_termino' => $this->input->post("hora_termino_domingo"),
                               'colacion'     => $this->input->post("colacion1_domingo")
                               );
                 $this->Trabajadores_Model->delete_horario_trabajador($rut_trabajador);
                      if(strlen($this->input->post("id_horario_1")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($lunes);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($lunes,$this->input->post("id_horario_1"));
                      }

                         if(strlen($this->input->post("id_horario_2")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($martes);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($martes,$this->input->post("id_horario_2"));
                      }
                         if(strlen($this->input->post("id_horario_3")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($miercoles);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($miercoles,$this->input->post("id_horario_3"));
                      }
                         if(strlen($this->input->post("id_horario_4")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($jueves);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($jueves,$this->input->post("id_horario_4"));
                      }
                         if(strlen($this->input->post("id_horario_5")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($viernes);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($viernes,$this->input->post("id_horario_5"));
                      }
                         if(strlen($this->input->post("id_horario_6")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($sabado);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($sabado,$this->input->post("id_horario_6"));
                      }
                         if(strlen($this->input->post("id_horario_7")) == 0 )
                      {
                            $this->Trabajadores_Model->crear_horario_trabajador($domingo);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horario_trabajador($domingo,$this->input->post("id_horario_7"));
                      }

                 //COLACIONES
                 for ($i=1; $i <= $this->input->post("colaciones1"); $i++) {
                      $lunes_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 1,
                                'hora'       => $this->input->post("colaciones_1".$i)

                               );
                      if(strlen($this->input->post("id_colacion_1".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($lunes_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($lunes_c,$this->input->post("id_colacion_1".$i));
                      }

                 }

                 for ($i=1; $i <= $this->input->post("colaciones2"); $i++) {
                    $martes_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 2,
                                'hora'       => $this->input->post("colaciones_2".$i)

                               );
                   if(strlen($this->input->post("id_colacion_2".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($martes_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($martes_c,$this->input->post("id_colacion_2".$i));
                      }
                 }

                  for ($i=1; $i <= $this->input->post("colaciones3"); $i++) {
                     $miercoles_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 3,
                                'hora'       => $this->input->post("colaciones_3".$i)

                               );
                     if(strlen($this->input->post("id_colacion_3".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($miercoles_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($miercoles_c,$this->input->post("id_colacion_3".$i));
                      }
                 }

                   for ($i=1; $i <= $this->input->post("colaciones4"); $i++) {
                     $jueves_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 4,
                                'hora'       => $this->input->post("colaciones_4".$i)

                               );
                    if(strlen($this->input->post("id_colacion_4".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($jueves_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($jueves_c,$this->input->post("id_colacion_4".$i));
                      }
                 }

                    for ($i=1; $i <= $this->input->post("colaciones5"); $i++) {
                     $viernes_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 5,
                                'hora'       => $this->input->post("colaciones_5".$i)

                               );
                     if(strlen($this->input->post("id_colacion_5".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($viernes_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($viernes_c,$this->input->post("id_colacion_5".$i));
                      }
                 }

                     for ($i=1; $i <= $this->input->post("colaciones6"); $i++) {
                     $sabado_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 6,
                                'hora'       => $this->input->post("colaciones_6".$i)

                               );
                     if(strlen($this->input->post("id_colacion_6".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($sabado_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($sabado_c,$this->input->post("id_colacion_6".$i));
                      }
                 }

                      for ($i=1; $i <= $this->input->post("colaciones7"); $i++) {
                      $domingo_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 7,
                                'hora'       => $this->input->post("colaciones_7".$i)

                               );
                     if(strlen($this->input->post("id_colacion_7".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_colaciones_trabajador($domingo_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_colaciones_trabajador($domingo_c,$this->input->post("id_colacion_7".$i));
                      }
                 }
                 //HORAS EXTRAS
for ($i=1; $i <= $this->input->post("horas_extras1"); $i++) {
                      $lunes_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 1,
                                'hora'       => $this->input->post("horas_extras_1".$i)

                               );
                      if(strlen($this->input->post("id_hora_extra_1".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($lunes_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($lunes_c,$this->input->post("id_hora_extra_1".$i));
                      }

                 }

                 for ($i=1; $i <= $this->input->post("horas_extras2"); $i++) {
                    $martes_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 2,
                                'hora'       => $this->input->post("horas_extras_2".$i)

                               );
                   if(strlen($this->input->post("id_hora_extra_2".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($martes_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($martes_c,$this->input->post("id_hora_extra_2".$i));
                      }
                 }

                  for ($i=1; $i <= $this->input->post("horas_extras3"); $i++) {
                     $miercoles_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 3,
                                'hora'       => $this->input->post("horas_extras_3".$i)

                               );
                     if(strlen($this->input->post("id_hora_extra_3".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($miercoles_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($miercoles_c,$this->input->post("id_hora_extra_3".$i));
                      }
                 }

                   for ($i=1; $i <= $this->input->post("horas_extras4"); $i++) {
                     $jueves_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 4,
                                'hora'       => $this->input->post("horas_extras_4".$i)

                               );
                    if(strlen($this->input->post("id_hora_extra_4".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($jueves_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($jueves_c,$this->input->post("id_hora_extra_4".$i));
                      }
                 }

                    for ($i=1; $i <= $this->input->post("horas_extras5"); $i++) {
                     $viernes_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 5,
                                'hora'       => $this->input->post("horas_extras_5".$i)

                               );
                     if(strlen($this->input->post("id_hora_extra_5".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($viernes_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($viernes_c,$this->input->post("id_hora_extra_5".$i));
                      }
                 }

                     for ($i=1; $i <= $this->input->post("horas_extras6"); $i++) {
                     $sabado_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 6,
                                'hora'       => $this->input->post("horas_extras_6".$i)

                               );
                     if(strlen($this->input->post("id_hora_extra_6".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($sabado_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($sabado_c,$this->input->post("id_hora_extra_6".$i));
                      }
                 }

                      for ($i=1; $i <= $this->input->post("horas_extras7"); $i++) {
                      $domingo_c         = array(
                                'trabajador' => $rut_trabajador,
                                'dia'        => 7,
                                'hora'       => $this->input->post("horas_extras_7".$i)

                               );
                     if(strlen($this->input->post("id_hora_extra_7".$i)) == 0 )
                      {
                             $this->Trabajadores_Model->crear_horas_extras_trabajador($domingo_c);
                      }
                      else
                      {
                         $this->Trabajadores_Model->actualizar_horas_extras_trabajador($domingo_c,$this->input->post("id_hora_extra_7".$i));
                      }
                 }







            $this->Trabajadores_Model->actualizar_trabajador($data_update,$id);
             echo json_encode(array('status'=>'success'));


      }

  }
  public function subir_archivos_trabajador()
    {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else{
            $data = array();
              $carpetaAdjunta="files/trabajadores/documentos/";
              if(!empty($_FILES['file']['name']) ){

                                    $dato                    = $this->input->post("trabajador");
                                    $rut_trabajador          = str_replace(".", "", $dato);
                                    $Nombres                 = $this->Informacion_Model->generateRandomString();
                                    $config['upload_path']   = $carpetaAdjunta;
                                    $config['allowed_types'] = '*';
                                    $config['max_size']      = '10024'; // max_size in kb
                                    $config['file_name']     = $rut_trabajador."-".$Nombres;


                                    //Load upload library


                        if (isset($_FILES['file']['name'])) {
                                $archivo   = $_FILES['file']['name'];


                                $extension = explode(".",$archivo);
                                $ext       = $extension[1];//AQUI LA EXTENSION
                                 $Nombre    = $rut_trabajador."-".$Nombres.".".$ext;



                            if (0 < $_FILES['file']['error']) {
                                echo 'Error al subir el archivo' . $_FILES['file']['error'];
                            } else {
                                if (file_exists('articulos/' . $Nombre)) {
                                    echo 'El archivo Existe : files/trabajadores/documentos/' . $Nombre;
                                } else {
                                     $this->load->library('upload', $config);
                                     $this->upload->initialize($config);

                                    if (!$this->upload->do_upload('file')) {
                                        echo $this->upload->display_errors();
                                    } else {

                                         $data_insert = array(
                                                                'documento'  => $Nombre,
                                                                'tipo'       => $this->input->post("tipo"),
                                                                'trabajador' => $rut_trabajador
                                        );
                                                 $this->Trabajadores_Model->insert_documentacion_trabajador($data_insert);
                                        echo json_encode(array('status' => 'success'));



                                    }
                                }
                            }
                        } else {
                            echo 'Eligue un archivo';
                        }
        }

        }

    }
  public function deletetrabajador()
  {

      if(!$this->input->is_ajax_request())
            {
                show_404();
            }else
            {
          $id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));

          $data_update = array('mostrar' => 2);
          $this->Trabajadores_Model->actualizar_trabajador($data_update,$id);
            //$this->Productos_Model->delete_producto($id);
            echo json_encode(array('status'=>'success'));
        }


  }
 }
