<?php
class Pagos extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Pagos');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
    $contenido['sub_titulo']     = "Pagos";
    $this->layout->js('assets/custom/pagos.js');
    //$this->output->cache(60);
    $this->layout->view('Contabilidad/Pagos',$contenido);
  }
  else
  {
    redirect('Conectar');
  }
  }
		public function pagos_proveedores()
	{
		if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

							$response = $this->Pagos_Model->getDeudasProveedores();
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

	public function deuda_proveedores()
	{
		if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {
							 $rut    = $this->input->post("rut");
							$response = $this->Pagos_Model->getDetalleDeudasProveedores($rut);
							$response2 = $this->Pagos_Model->getDetalleDeudasProveedores2($rut);

									if($response != 0)
                {
                  echo json_encode(array('status'=>'success','data'=>$response,'detalle_compra' =>$response2));
                }
                else
                {
                  echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
                }
						}
	}
	public function pagos_clientes()
	{
		if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

							$response = $this->Pagos_Model->getDeudasClientes();
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
	public function deuda_cliente()
	{
		if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {
							 $rut    = $this->input->post("rut");
							$response = $this->Pagos_Model->getDetalleDeudasClientes($rut);
							$response2 = $this->Pagos_Model->getDetalleDeudasClientes2($rut);

								if($response != 0)
                {
                  echo json_encode(array('status'=>'success','data'=>$response,'detalle_venta' =>$response2));
                }
                else
                {
                  echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
                }

						}
	}
	public function crear_pago()
	{


			if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {
							$datos_empresa     = $this->Informacion_Model->getApp();
							$numero_pago       = $datos_empresa['numero_pago'];
							$numero_pago2      = $datos_empresa['numero_pago'] + 1;
							$fecha             = date('Y-m-d H:i:s');
							$rut_vendedor      = $this->session->userdata('id');

							$rut               = $this->security->sanitize_filename($this->input->input_stream('rut_pago',TRUE));
							$dinero_recibido   = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('dinero_recibido_pago',TRUE)));
							$deuda_final       = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('deuda_final',TRUE)));
							$cantidad_cheques  = $this->security->sanitize_filename($this->input->input_stream('cantidad_cheques',TRUE));
							$tipo_pago_deuda   = $this->security->sanitize_filename($this->input->input_stream('tipo_pago_deuda',TRUE));
							$totalpago         = $dinero_recibido;
							$ventas_cliente    = $this->Pagos_Model->getDetalleDeudasClientes($rut);
							$compras_proveedor = $this->Pagos_Model->getDetalleDeudasProveedores($rut);
							$tipo_pago         = $this->input->post("tipo_pago");

							$DataPagos = array(
																			'fecha'           => $fecha,
																			'numero_pago'     => $numero_pago,
																			'numero_venta'    => 0,
																			'numero_compra'   => 0,
																			'rut'             => $rut,
																			'forma_pago'       => strtoupper($tipo_pago_deuda),
																			'dinero_recibido' => $dinero_recibido,
																			'deuda_final'     => $deuda_final,
																			'tipo'            => $tipo_pago
																			);

							                                    $this->Pagos_Model->crear_pago($DataPagos);
							//pago ventas
							if($tipo_pago == 0)
							{

										 foreach ($ventas_cliente as $row)
							              {
													$saldo_pendiente = $row['saldo_pendiente'];
													$numero_venta    = $row['numero_venta'];
													$totalpago       = $totalpago - $saldo_pendiente;

							                       if($totalpago < 0)
							                       {
							                        $totalpago =$totalpago*-1;
							                        $deuda_final = $totalpago;
															$Data             = array(
																						'pagado'          =>0 ,
																						'saldo_pendiente' =>$totalpago
							                                                        );
															$totalpago =0;
							                       }
							                       else
							                       {
							                       	$deuda_final = 0;
																$Data             = array(
																						'pagado'          =>1 ,
																						'saldo_pendiente' =>0
							                                                            );
							                       }

							                        $this->Ventas_Model->update_venta($Data,$numero_venta);

							                                                $DataDetallePagos = array(
																			//'fecha'           => $fecha,
																			'numero_pago'     => $numero_pago,
																			'numero_venta'    => $numero_venta,
																			'numero_compra'   => 0,
																			'total' => $dinero_recibido
																			);

							                                    $this->Pagos_Model->crear_detalle_pago($DataDetallePagos);


							              }


							}
							//pago compras
							else
							{
										 foreach ($compras_proveedor as $row)
							              {
													$saldo_pendiente = $row['saldo_pendiente'];
													$numero_compra    = $row['numero_compra'];
													$totalpago       = $totalpago - $saldo_pendiente;

							                       if($totalpago < 0)
							                       {
							                        $totalpago =$totalpago*-1;
							                        $deuda_final = $totalpago;
															$Data             = array(  'pagado'          =>0 ,
																						'saldo_pendiente' =>$totalpago,
																						'numero_pago'     =>$numero_pago
							                                                        );
															$totalpago =0;

							                       }
							                       else
							                       {
							                       	$deuda_final = 0;
															$Data             = array(  'pagado'          =>1 ,
																						'saldo_pendiente' =>0,
																						'numero_pago'     =>$numero_pago
							                                                            );
							                       }

							                        $this->Compras_Model->update_compra($Data,$numero_compra);

							                                     $DataDetallePagos = array(
																			//'fecha'           => $fecha,
																			'numero_pago'     => $numero_pago,
																			'numero_venta'    => 0,
																			'numero_compra'   => $numero_compra,
																			'total' => $dinero_recibido
																			);

							                                    $this->Pagos_Model->crear_detalle_pago($DataDetallePagos);

							              }


							}

									//Insert Cheque
						if($cantidad_cheques > 1)
						{
									for ($k=1; $k < $cantidad_cheques ; $k++)
									{
										$numero_cheque = $this->security->sanitize_filename($this->input->input_stream('numero_cheque'.$k,TRUE));
										$fecha_cheque  = $this->security->sanitize_filename($this->input->input_stream('fecha_cheque'.$k,TRUE));
										$monto_cheque  = $this->Informacion_Model->ConvertirDinero($this->security->sanitize_filename($this->input->input_stream('monto_cheque'.$k,TRUE)));
										$tipo_banco    = $this->security->sanitize_filename($this->input->input_stream('tipo_banco'.$k,TRUE));

										$data_cheque = array(
															'fecha'         => $fecha,
															'numero_pago'   => $numero_pago,
															'numero_compra' => 0,
															'numero_venta'  => 0,
															'rut_titular'   => $rut,
															'numero_cheque' => $numero_cheque,
															'banco'         => $tipo_banco,
															'cantidad'      => $monto_cheque,
															'tipo'          => "PAGOS"
															);
										$this->Informacion_Model->crear_cheque($data_cheque);
									}
						}
						//file_contents(base_url().'ComprobantePagoCliente/'.$numero_pago);
						$Data_Empresa = array('numero_pago' => $numero_pago2);
					    $this->Informacion_Model->Update_Empresa($Data_Empresa);
					    echo json_encode(array('status'=>'success',"numero_pago" =>$numero_pago));



			}
		}
}