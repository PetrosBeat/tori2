<?php
class Cliente extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


		$this->layout->title('Cliente');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "Cliente";
		$this->layout->js('assets/custom/clientes.js');
		//$this->output->cache(60);
		$this->layout->view('RRHH/Cliente',$contenido);
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

				$response = $this->Cliente_Model->getClientes();
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

	public function verificarcliente()
	{


			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
				 		$dato                 = $this->input->post("rut_cliente");
							$rut              = str_replace(".", "", $dato);

						/*	$response = $this->Cliente_Model->ClientExist($rut);
							if($response != 0)
						{
							echo json_encode(array('status'=>'success','data'=>$response));
						}
						else
						{
							echo json_encode(array('status' =>"error",'message'=>"El rut ".$dato." ya existe en la base de datos"));
						}
						*/
			$this->load->library('rest', array('server' => 'https://dev-api.haulmer.com/v2/dte/taxpayer'));

				$xml = $this->rest->get($this->Informacion_Model->formateo_rut2($rut));
				//$this->rest->debug();
				$datos_cliente =(array($xml));

				if($xml != '0')
						{
							//var_dump($ddd['error']);
							echo json_encode(array('status'=>'success','data'=>($datos_cliente)));
						}
						else
						{
							echo json_encode(array('status'=>'error','data'=>($datos_cliente)));
						}

			}

	}
	public function crear_cliente()
	{


			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {







							$id_cliente           = $this->security->sanitize_filename($this->input->input_stream('id_cliente',TRUE));
							$dato                 = $this->security->sanitize_filename($this->input->input_stream('rut_cliente',TRUE));
							$rut                  = str_replace(".", "", $dato);
							if(strlen($rut) == 0)
							{
								return false;
								echo json_encode(array('status'=>'error','message' =>"INGRESE UN RUT"));
							}
							$nombre               = $this->security->sanitize_filename($this->input->input_stream('nombre_cliente',TRUE));
							$direccion            = $this->input->post("direccion_cliente");
							$correo               = $this->input->post("correo_cliente");
							$giro                 = $this->input->post("giro_cliente");
							$telefono             = $this->security->sanitize_filename($this->input->input_stream('telefono_cliente',TRUE));
							$cdgSIISucur                 = $this->input->post("cdgSIISucur");
							$comuna               = $this->security->sanitize_filename($this->input->input_stream('comuna_cliente',TRUE));
							$credito_maximo       = $this->Informacion_Model->ConvertirDinero($this->input->post("credito_maximo_cliente"));
							if(strlen($giro) == 0)
							{
								$giro = "SIN GIRO";
							}
							$data_insert          = array(
													'rut'               => $rut,
													'razonSocial'       => $nombre,
													'giro'              => $giro,
													'telefono'          => $telefono,
													'email'             => $correo,
													'direccion'         => $direccion,

													'comuna'            => $comuna,
													'mostrar'           => 0,
													'cdgSIISucur'         => $cdgSIISucur,
												  );



						$this->Cliente_Model->crear_cliente($data_insert);
						echo json_encode(array('status'=>'success'));


			}

	}
	public function datoscliente()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
						$id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
						$response = $this->Cliente_Model->ver_cliente($id);
						$response2 = $this->Cliente_Model->getPreciosCliente($response['rut']);
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
	public function datoscliente2()
	{

			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {

						$response = $this->Cliente_Model->ver_cliente_rut($this->input->post("rut"));
						$response2 = $this->Cliente_Model->getPreciosClienteVenta($this->input->post("rut"));
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
	public function precioscliente()
	{

			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {

						$response = $this->Cliente_Model->getPreciosCliente($this->input->post("rut"));
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

	public function ocultarcliente()
	{

			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
					$id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
					$dato        = $this->security->sanitize_filename($this->input->input_stream('dato',TRUE));
					$data_update = array('mostrar' => $dato);
					$this->Cliente_Model->actualizar_cliente($data_update,$id);
						//$this->Productos_Model->delete_producto($id);
						echo json_encode(array('status'=>'success'));
				}


	}
	public function editar_cliente()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
							$id_cliente                 = $this->security->sanitize_filename($this->input->input_stream('id_cliente',TRUE));
							$dato                 = $this->security->sanitize_filename($this->input->input_stream('rut_cliente',TRUE));
							$rut              = str_replace(".", "", $dato);

							$nombre               = $this->security->sanitize_filename($this->input->input_stream('nombre_cliente',TRUE));
							$direccion            = $this->input->post("direccion_cliente");
							$correo               = $this->input->post("correo_cliente");
							$giro                 = $this->input->post("giro_cliente");
							$telefono             = $this->security->sanitize_filename($this->input->input_stream('telefono_cliente',TRUE));
							$comuna               = $this->security->sanitize_filename($this->input->input_stream('comuna_cliente',TRUE));

							//$cdgSIISucur                 = $this->input->post("cdgSIISucur");
							if(strlen($giro) == 0)
							{
								$giro = "PARTICULAR";
							}
							$data_update          = array(
													//'rut'               => $rut,
													'razonSocial'       => $nombre,
													'giro'              => $giro,
													'telefono'          => $telefono,
													'email'             => $correo,
													'direccion'         => $direccion,
													//'credito_maximo'    => $credito_maximo,
													//'credito_utilizado' => 0,
													'comuna'            => $comuna,
													//'cdgSIISucur'         => $cdgSIISucur,
												//	'mostrar'           => 0
												  );

						$this->Cliente_Model->actualizar_cliente($data_update,$id_cliente);
						echo json_encode(array('status'=>'success'));


				}


	}




}
