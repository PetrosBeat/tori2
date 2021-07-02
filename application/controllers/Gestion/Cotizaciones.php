<?php
class Cotizaciones extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


		$this->layout->title('Cotizaciones');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "Cotizaciones";
		$this->layout->js('assets/custom/cotizacion.js');
		//$this->output->cache(60);
		$this->layout->view('Gestion/Cotizaciones',$contenido);
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

							$response = $this->Cotizaciones_Model->getCotizaciones();
								if($response != 0)
									{
										 echo json_encode(array('status'=>'success','data'=>$response));

									}
									else
									{
										 echo json_encode(array('status'=>'error','message',"No hay datos en la base de datos"));
									}
						}



				}
				public function datoscotizacion()
				{

							$method = $_SERVER['REQUEST_METHOD'];

							if($method != 'POST'){
								$this->response(array('error' =>"No tienes permisos para acceder aqui"),400);
							} else {
									$numero_cotizacion        = $this->security->sanitize_filename($this->input->input_stream('numero_cotizacion',TRUE));


									  echo json_encode(array('status'=>'success','cotizacion'=>$this->Cotizaciones_Model->ver_cotizacion($numero_cotizacion),'detalle_cotizacion'=>$this->Cotizaciones_Model->ver_detalle_cotizacion($numero_cotizacion)));
							}

				}
			public function crearcotizacion()
			{


					$method = $_SERVER['REQUEST_METHOD'];

					if($method != 'POST'){
						$this->response(array('error' =>"No tienes permisos para acceder aqui"),400);
					} else {
									$datos_empresa        = $this->Informacion_Model->getApp();
									$numero_cotizacion    = $datos_empresa['numero_cotizacion'];
									$fecha                = date('Y-m-d H:i:s');
									$cliente              = $this->security->sanitize_filename($this->input->input_stream('select_clientes',TRUE));
									$total_venta          = $this->security->sanitize_filename($this->input->input_stream('pago_total',TRUE));
									$cantidad_productoo    = $this->security->sanitize_filename($this->input->input_stream('cant_prod',TRUE));
									$rut_vendedor         = $this->session->userdata('id');
									$ValidezCotizacion    = $this->security->sanitize_filename($this->input->input_stream('validez_cotizacion',TRUE));
									$tipo_pago_cotizacion = $this->security->sanitize_filename($this->input->input_stream('tipo_pago_cotizacion',TRUE));
									$documento_cotizacion = $this->security->sanitize_filename($this->input->input_stream('documento_cotizacion',TRUE));
									$total 				  = $this->input->post("total_pagado");
									$forma_pago  = "-";

									if($ValidezCotizacion == 1)
									{
										$Validez 			= "+1 day";
									}
									elseif($ValidezCotizacion == 7)
									{
										$Validez 			= "+7 day";
									}
									elseif($ValidezCotizacion == 15)
									{
										$Validez 			= "+15 day";
									}
									elseif($ValidezCotizacion == 21)
									{
										$Validez 			= "+21 day";
									}
									elseif($ValidezCotizacion == 30)
									{
										$Validez 			= "+30 day";
									}

								$nuevafecha2   = strtotime ( $Validez , strtotime ( $fecha ) ) ;
								$fecha_validez = date ( 'Y-m-d H:i:s' , $nuevafecha2);
									$data_insert          = array(
															'numero_cotizacion' => $numero_cotizacion,
															'numero_venta'      => 0,
															'cliente'               => $cliente,
															'fecha_emision'     => $fecha,
															'fecha_expiracion'  => $fecha_validez,
															'tipo_documento'    => $documento_cotizacion,
															'tipo_pago'         => $tipo_pago_cotizacion,
															'estado'            => 0,
															'forma_pago' 	  => $forma_pago,
															'vendedor'          => $rut_vendedor,
															'total'            => $total
														  );
									$this->Cotizaciones_Model->crear_cotizacion($data_insert);

								//Insert detalle cotizaciones
										for ($j=1; $j <= $cantidad_productoo ; $j++)
									{
										$codigo          = $this->input->post("codigo".$j);
										$nombre          = $this->input->post("nombre".$j);
										$cantidad        = $this->input->post("cantidad".$j);
										$select_servicio = $this->input->post("select_servicio".$j);
										$tipo_venta      = $this->input->post("tipo_venta".$j);
										$total_pulgadas  = $this->input->post("total_pulgadas".$j);
										$medida          = $this->input->post("medida".$j);
										$precio          = $this->Informacion_Model->ConvertirDinero($this->input->post("precio".$j));
										$totales         = $this->Informacion_Model->ConvertirDinero($this->input->post("total".$j));
										$productoo        = $this->Productos_Model->ver_producto_codigo($codigo);

										if($productoo <> 0)
										{
											if($select_servicio == 1)
											{
												//Descontamos del Stock
												$stock      = $productoo['stock'] - $total_pulgadas;
												$data_stock = array("stock" => $stock);
												$this->Productos_Model->update_producto($data_stock,$productoo['id']);
											}
											elseif($select_servicio == 2 OR $select_servicio == 3)
											{
												//Descontamos del Stock
												$stock      = $productoo['stock_prestacion'] - $total_pulgadas;
												$data_stock = array("stock_prestacion" => $stock);
												$this->Productos_Model->update_producto($data_stock,$productoo['id']);
											}
										}
										$total = $total + $totales;
										$neto = 0;
										if($tipo_venta == '0')
										{
											$UnmdItem = "PULG";
										}
										else
										{
											$UnmdItem = "UND";
										}
										if($documento_cotizacion == '33' OR $documento_cotizacion == '52')
										{

											if($codigo == '1000' OR $codigo =='404' OR $codigo == '303')
											{
												$total_pulgadas = $cantidad;
											}
											if($codigo == '1000' AND $tipo_venta == '0')
											{
												$total_pulgadas = $cantidad * $productoo['cantidad_palos'];
												//$precio = $productoo['precio_venta_unidad'];
											}
											else if($tipo_venta == '1' OR $tipo_venta == '2')
											{
													$total_pulgadas = $cantidad;
											}

											$neto =$neto + ($precio * $total_pulgadas);

										}
										else
										{

											if($codigo == '1000' AND $tipo_venta == 0)
											{
												$total_pulgadas = $cantidad * $productoo['cantidad_palos'];
												//$precio = $productoo['precio_venta_unidad'];
											}
											if(($codigo != '1000'  OR $codigo  != '404' OR $codigo != '303') AND $tipo_venta == '0')
											{
												$cantidad = $total_pulgadas;
												//$precio = $productoo['precio_venta_unidad'];
											}
											else if($tipo_venta == '1' OR $tipo_venta == '2')
											{
													$cantidad = $cantidad;
											}
										}
										$data_detalle = array(
																'numero_cotizacion'         => $numero_cotizacion,
																'fecha'                => $fecha,
																'codigo'               => $codigo,
																'nombre'               => $nombre,
																'cantidad'             => $cantidad,
																'valor_unitario'       => $precio,
																'total_pulgadas'       => round($total_pulgadas,2),
																'tipo_venta'             => $tipo_venta
															);
															$this->Cotizaciones_Model->crear_detalle_cotizacion($data_detalle);


									}




								$Data_Empresa = array('numero_cotizacion' => $numero_cotizacion + 1);
					    		$this->Informacion_Model->Update_Empresa($Data_Empresa);
					    		file_get_contents(base_url().'ComprobanteCotizacion/'.$numero_cotizacion);
					    		//$this->Impresiones_Model->print_cotizacion($numero_cotizacion);


					    		echo json_encode(array('status'=>'success','cotizacion'=>$numero_cotizacion));



					}
				}

	}