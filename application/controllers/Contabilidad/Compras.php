<?php
class Compras extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Compras');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
    $contenido['sub_titulo']     = "Compras";
    $this->layout->js('assets/custom/compras.js');
    //$this->output->cache(60);
    $this->layout->view('Contabilidad/Compras',$contenido);
  }
  else
  {
    redirect('Conectar');
  }
  }
         public function find()
        {

          $method = $_SERVER['REQUEST_METHOD'];

            if($method != 'GET'){
              $this->response(array('error' =>"No tienes permisos para acceder aqui"),400);
            } else {

              $response = $this->Caja_Model->ver_caja($numero_caja);
                echo json_encode(array('status'=>'success'));
            }



        }
        public function crearcompra()
        {


            $method = $_SERVER['REQUEST_METHOD'];

            if($method != 'POST'){
              $this->response(array('error' =>"No tienes permisos para acceder aqui"),400);
            } else {
                     $datos_empresa       = $this->Informacion_Model->getApp();
                     $numero_compra       = $datos_empresa['numero_compra'];
                     $numero_compra2      = $datos_empresa['numero_compra'] + 1;
                     $fecha               =  date('Y-m-d H:i:s');
                     $proveedor           = $this->input->post("select_proveedores");
                     $total_metros_compra = $this->input->post("t_metros");
                     $tipo_metro          = $this->input->post("tipo_metro");
                     $venta_iva           = $this->input->post("venta_iva");
                     $numero_comprobante  = $this->input->post("numero_comprobante");
                     $cant_compra         = $this->input->post("cant_compra");
                     $precio_compra       = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('precio_compra',TRUE)));
                     $rut_vendedor        = $this->session->userdata('id');
                     if($venta_iva == 0)
                     {
                      $saldo_pendiente = $precio_compra * $total_metros_compra;
                       $total_final           = ($precio_compra * $total_metros_compra);
                     }
                     else
                     {
                      $total           = ($precio_compra * $total_metros_compra);
                      $neto            = round($total * (1.19),0);
                      $iva             = round((($neto * (0.19))),0);
                      $saldo_pendiente = (int)(round(($neto +$iva),0));
                      $total_final = (int)(round(($neto +$iva),0));

                     }
                     if( $this->input->post("forma_pago") == 'CONTADO' OR $this->input->post("forma_pago") == 'TRANSFERENCIA')
                     {
                      $saldo_pendiente = 0;
                      $pagado = 1;
                     }
                     else
                     {
                      $pagado = 0;
                     }

                   $Data_Compra     = array(
                                  'numero_compra'       => $numero_compra,
                                  'numero_pago'         => 0,
                                  'fecha'               => $fecha,
                                  'rut'                 => $proveedor,
                                  'pagado'              => $pagado,
                                  'precio_compra'       =>(int) $precio_compra,
                                  'comprobante_empresa' => $numero_comprobante,
                                  'quemado'             => $tipo_metro,
                                  'total_metros'        => $total_metros_compra,
                                  'saldo_pendiente'     => $saldo_pendiente,
                                  'pago_iva'            => $venta_iva,

                                  'forma_pago'          => $this->input->post("forma_pago"),
                                  'total_final'         =>  $total_final

                        );

                     $this->Compras_Model->crear_compra($Data_Compra);
                      //Insert detalle ventas

                  for ($i=1; $i <= $cant_compra ; $i++)
                  {
                    $diametro     = $this->input->post("diametro".$i);
                    $cantidad     = $this->input->post("cantidad".$i);
                     $total_cubico     = $this->input->post("total_cubico".$i);
                    $totalmetros  = $this->input->post("totalmetros".$i);



                    $data_detalle = array(
                                'numero_compra' => (int)$numero_compra,
                                'fecha'         => $fecha,
                                'diametro'      =>(int) $diametro,
                                'cantidad'      =>(double) $cantidad,
                                'cubico'        => (double)$total_cubico,
                               // 'total'  => (double)$totalmetros
                              );
                    $this->Compras_Model->crear_detalle_compra($data_detalle);
                  }


                 // $this->Impresiones_Model->print_compra($numero_compra);
                  // $this->Impresiones_Model->print_compra2($numero_compra);
                    file_get_contents(base_url().'ComprobanteCompra/'.$numero_compra);
                    $Data_Empresa = array('numero_compra' => $numero_compra2);
                    $this->Informacion_Model->Update_Empresa($Data_Empresa);
                     echo json_encode(array('status'=>'success','numero_compra'=>$numero_compra));
            }
        }


 }
