<?php
class Gastos extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Gastos');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
    $contenido['sub_titulo']     = "Gastos";
    $this->layout->js('assets/custom/gastos.js');
    $this->layout->js('assets/custom/proveedor.js');
    //$this->output->cache(60);
    $this->layout->view('Contabilidad/Gastos',$contenido);
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

              $response = $this->Gastos_Model->getGastos();
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
         public function crear_gastos()
        {


if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {
                  $datos_empresa = $this->Informacion_Model->getApp();
                  $numero_gasto  = $datos_empresa['numero_gasto'];
                  $numero_gasto2 = $datos_empresa['numero_gasto'] + 1;

                  $fecha         = $this->input->post("fecha_gasto"); //date('Y-m-d H:i:s');
                  $proveedor     = $this->security->sanitize_filename($this->input->input_stream('select_proveedores',TRUE));
                  $documento     = $this->security->sanitize_filename($this->input->input_stream('tipo_documento',TRUE));
                  $dinero_caja   = $this->security->sanitize_filename($this->input->input_stream('dinero_caja',TRUE));
                  $forma_pago     = $this->security->sanitize_filename($this->input->input_stream('forma_pago',TRUE));
                   $monto_caja           = $this->Informacion_Model->ConvertirDinero($this->input->post("monto_caja"));
                  $total_gasto   = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('total_gasto',TRUE)));
                  $obs           = $this->input->post("obs");
                    if($documento == "BOLETA")
                    {
                      $numero_documento = $this->security->sanitize_filename($this->input->input_stream('numero_boleta',TRUE));
                    }
                    elseif($documento == "FACTURA")
                    {
                      $numero_documento = $this->security->sanitize_filename($this->input->input_stream('numero_factura',TRUE));
                    }
                    else
                    {
                      $numero_documento = 0;
                    }
                    if($this->input->post("cantidad_cheques") > 1)
                      {
                            for ($k=1; $k <= $this->input->post("cantidad_cheques") ; $k++)
                            {
                              $numero_cheque = $this->security->sanitize_filename($this->input->input_stream('numero_cheque'.$k,TRUE));
                              $fecha_cheque  = $this->security->sanitize_filename($this->input->input_stream('fecha_cheque'.$k,TRUE));
                              $monto_cheque  = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('monto_cheque'.$k,TRUE)));
                              $tipo_banco    = $this->security->sanitize_filename($this->input->input_stream('tipo_banco'.$k,TRUE));


                              $data_cheque = array(
                                        'fecha'         => $fecha,
                                        'numero_venta'  => 0,
                                        'numero_compra' => 0,
                                        'numero_pago'   => 0,
                                        'numero_gasto'  => $numero_gasto,
                                        'rut_titular'   => $this->input->post("select_proveedores"),
                                        'numero_cheque' => $numero_cheque,
                                        'banco'         => $tipo_banco,
                                        'cantidad'      => $monto_cheque,
                                        'tipo'          => "GASTOS"
                                        );
                              $this->Informacion_Model->crear_cheque($data_cheque);
                            }
                      }

                    $Data           = array(
                      'fecha'            => $fecha ,
                      'numero_gasto'     => $numero_gasto ,
                      'rut'              => $this->input->post("select_proveedores"),
                      'documento'        => $documento,
                      'numero_documento' => $numero_documento,
                      'dinero_caja'      => $dinero_caja,
                      'forma_pago'        => $forma_pago,
                      'total_caja'       => $monto_caja,
                      'total'            => $total_gasto,
                      'obs'              => $obs
                                        );
                    $this->Gastos_Model->crear_gasto($Data);
                    $Data_Empresa = array('numero_gasto' => $numero_gasto2);
                    $this->Informacion_Model->Update_Empresa($Data_Empresa);
                    echo json_encode(array('status'=>'success','numero_gasto'=>$numero_gasto));

            }
        }

 }
