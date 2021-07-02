<?php
class Remuneraciones extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Remuneraciones');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
     $contenido['empresa']      = $this->Informacion_Model->getApp();
    $contenido['sub_titulo']     = "Remuneraciones";
    $this->layout->js('assets/custom/remuneraciones.js');
    //$this->output->cache(60);
    $this->layout->view('Gestion/Remuneraciones',$contenido);
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
	    public function crearremuneracion()

  {

        if(!$this->input->is_ajax_request())
        {
          show_404();
        }else
        {
           $datos_empresa       = $this->Informacion_Model->getApp();
           $numero_remuneracion = $datos_empresa['numero_remuneracion'];
           $solo_month          = $this->input->post("solo_month");
           $sueldo_base         = $this->Informacion_Model->ConvertirDinero($this->input->post("sueldo_base"));
           $sueldo_base2        = $this->Informacion_Model->ConvertirDinero($this->input->post("sueldo_base"));

           $carga_fam           = $this->Informacion_Model->ConvertirDinero($this->input->post("carga_familiar"));
           $colacion            = $this->Informacion_Model->ConvertirDinero($this->input->post("colacion"));
           $movilizacion        = $this->Informacion_Model->ConvertirDinero($this->input->post("movilizacion"));

           $cant_trab           = $this->Informacion_Model->ConvertirDinero($this->input->post("cant_trab"));
           for ($i=1; $i <= $cant_trab; $i++)
           {
                   $trabajador          = $this->input->post("rut_trabajador".$i);

                   $dias_trabajados    = $this->input->post("dias_trabajados".$i);
                   $dias_licencia      = $this->input->post("dias_licencia".$i);
                   $dias_vacaciones    = $this->input->post("dias_vacaciones".$i);
                   $dia_valor          = round(($sueldo_base / 30),2);
                   if($dias_trabajados != '30')
                   {
                     $sueldo_base        = round($dia_valor * $dias_trabajados);
                    // var_dump($dia_valor." ".$dias_trabajados);
                   }
                   $gratificacion      = $sueldo_base * 0.25;
                   $datos_trabajador   = $this->Trabajadores_Model->ver_trabajador_rut($trabajador);
                   $carga_familiar     = ($carga_fam * $datos_trabajador['numero_cargas']);
                   $imponible          = $sueldo_base + $gratificacion +$colacion +$movilizacion;
                   $datos_afp          = $this->Informacion_Model->getAfp($datos_trabajador['afp']);
                   $descuento_afp      = round($imponible * ($datos_afp['tasa_afp'] / 100),0);
                   $total_haber        = $imponible + $carga_familiar;
                   $inp_isapre         = round(($imponible * 0.07),0);
                   $sc_empleador       = round(($imponible * 0.024),0);
                   $sc_trabajador      = round(($imponible * 0.006),0);

                   $total_imposiciones = $descuento_afp + $inp_isapre + $sc_trabajador;
                   $total_descuentos   = $total_imposiciones;

                   $sueldo_liquido     = $total_haber - $total_descuentos;
                   $anticipos          = $this->Anticipos_Model->ver_anticipos($trabajador,$solo_month);
                   $total_anticipos    = $anticipos['totales'];

                   if($datos_trabajador['tipo_salud'] == '1')
                   {
                    $tipo_salud = "FONASA";
                   }
                   else
                   {
                    $tipo_salud = "ISAPRE";
                   }
                   $data_insert   = array(
                        'numero_remuneracion'  => $numero_remuneracion,
                        'fecha'                => date('Y-m-d h:i:s'),
                        'cantidad_turnos'      => 0,
                        'horas_extras'         => 0,
                        'sueldo_base'          => $sueldo_base,
                        'gratificacion'        => $gratificacion,
                        'bono_turno'           => 0,
                        'total_imponible'      => $imponible,
                        'carga_familiar'       => $carga_familiar,
                        'colacion'             => 0,
                        'otras_asignaciones'   => 0,
                        'movilizacion'         => 0,
                        'total_asignacion'     => $carga_familiar,
                        'total_haber'          => $total_haber,
                        'afp'                  => $datos_trabajador['afp'],
                        'total_afp'            => $descuento_afp,
                        'tipo_salud'           => $tipo_salud,
                        'total_salud'          => $inp_isapre,
                        'cesantia_funcionario' => $sc_trabajador,
                        'cesantia_empresa'     => $sc_empleador,
                        'sueldo_liquido'       => $sueldo_liquido,
                        'rut_trabajador'       => $trabajador,
                        'anticipo'             => $total_anticipos,
                        'dias_trabajados'      => $dias_trabajados,
                        'dias_licencia'        => $dias_licencia,
                        'dias_vacaciones'      => $dias_vacaciones
                      );
            $this->Remuneraciones_Model->crear_remuneracion($data_insert);
           }
            $Data_Empresa = array('numero_remuneracion' => $datos_empresa['numero_remuneracion'] + 1);
            $this->Informacion_Model->Update_Empresa($Data_Empresa);
            echo json_encode(array('status'=>'success'));

      }
  }

 }
