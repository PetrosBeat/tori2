<?php
class Proveedor extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


		$this->layout->title('Proveedor');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "Proveedor";
		$this->layout->js('assets/custom/proveedor.js');
		//$this->output->cache(60);
		$this->layout->view('RRHH/Proveedor',$contenido);
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

				$response = $this->Proveedor_Model->getClientes();
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
	public function preciosproveedor()
	{

			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {

						$response = $this->Proveedor_Model->getPreciosProveedor($this->input->post("rut"));
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
	public function verificarproveedor()
	{


			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
				 		$dato                 = $this->input->post("rut_proveedor");
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
				$datos_proveedor =(array($xml));

				if($xml != '0')
						{
							//var_dump($ddd['error']);
							echo json_encode(array('status'=>'success','data'=>($datos_proveedor)));
						}
						else
						{
							echo json_encode(array('status'=>'error','data'=>($datos_proveedor)));
						}

			}

	}
	public function crear_proveedor()
	{


			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {

							$id_proveedor           = $this->security->sanitize_filename($this->input->input_stream('id_proveedor',TRUE));
							$dato                 = $this->security->sanitize_filename($this->input->input_stream('rut_proveedor',TRUE));
							$rut              = str_replace(".", "", $dato);
							$tipo   			=$this->input->post("tipo");
							$nombre               = $this->input->post("nombre_proveedor");
							$direccion            = $this->input->post("direccion_proveedor");
							$correo               = $this->input->post("correo_proveedor");
							$giro                 = $this->input->post("giro_proveedor");
							$cdgSIISucur          = $this->input->post("cdgSIISucur");
							$telefono             = $this->input->post("telefono_proveedor");
							$comuna               = $this->input->post("comuna_proveedor");

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
													'tipo'              => $tipo,
													'comuna'            => $comuna,
													'mostrar'           => 0,
													'cdgSIISucur'    => $cdgSIISucur,
												  );



						$this->Proveedor_Model->crear_proveedor($data_insert);
						echo json_encode(array('status'=>'success'));


			}

	}
	public function datosproveedor()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
						$id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
						$response = $this->Proveedor_Model->ver_proveedor($id);
						$response2 = $this->Proveedor_Model->getPreciosProveedor($response['rut']);
						if($response != 0)
						{
							echo json_encode(array('status'=>'success','data'=>$response,'data2' =>$response2));
						}
						else
						{
							echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
						}



				}

	}
	public function datosproveedor2()
	{

			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
						$rut        = $this->security->sanitize_filename($this->input->input_stream('rut',TRUE));
						$response = $this->Proveedor_Model->ver_proveedor_rut($rut);
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

	public function ocultarproveedor()
	{

			if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
					$id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
					$dato        = $this->security->sanitize_filename($this->input->input_stream('dato',TRUE));
					$data_update = array('mostrar' => $dato);
					$this->Proveedor_Model->update_proveedor($data_update,$id);
						//$this->Productos_Model->delete_producto($id);
						echo json_encode(array('status'=>'success'));
				}


	}
	public function editar_proveedor()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
							$id_proveedor                 = $this->security->sanitize_filename($this->input->input_stream('id_proveedor',TRUE));
							$dato                 = $this->security->sanitize_filename($this->input->input_stream('rut_proveedor',TRUE));
							$rut              = str_replace(".", "", $dato);

							$data_update          = array(
													//'rut'               => $rut,
													'razonSocial'       => $this->input->post("nombre_proveedor"),
													'giro'              => $this->input->post("giro_proveedor"),
													'telefono'          => $this->input->post("telefono_proveedor"),
													'email'             => $this->input->post("correo_proveedor"),
													'direccion'         => $this->input->post("direccion_proveedor"),
													'comuna'            => $this->input->post("comuna_proveedor"),

												  );
							for ($i=1; $i <= $this->input->post("cantidad_precios_proveedor"); $i++) {
								$data_precio = array(
														'precio'  => $this->Informacion_Model->ConvertirDinero($this->input->post("precio_proveedor".$i)),
														'proveedor' => $rut,
														'fecha'   => $this->input->post("fecha_precio".$i)
													);
									$this->Proveedor_Model->insertar_precios($data_precio);
							}
						$this->Proveedor_Model->update_proveedor($data_update,$id_proveedor);
						echo json_encode(array('status'=>'success'));


				}


	}




}
