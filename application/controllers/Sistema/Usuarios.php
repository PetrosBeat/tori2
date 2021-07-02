<?php
class Usuarios extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


		$this->layout->title('Usuarios');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "Usuarios";
		$this->layout->js('assets/custom/usuarios.js');
		//$this->output->cache(60);
		$this->layout->view('Sistema/Usuarios',$contenido);
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

				$response = $this->Usuarios_Model->getUsuarios();
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

	public function crearusuario()

	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {

		        	$dato     =$this->input->post("rut_usuario");
								$replace  = str_replace(".", "", $dato);
								$rut      = str_replace("-", "", $replace);
					$data_insert   = array(
												'rut'       =>  $rut,
												'clave'     =>  $this->bcrypt->hash_password( $this->input->post("clave_usuario")),
												'nombres'   =>  $this->input->post("nombres_usuario"),
												'apellidos' =>  $this->input->post("apellidos_usuario"),
												'rango'     =>  $this->input->post("rango_usuario"),
												'mostrar'   => 0
 										  );
						$this->Usuarios_Model->crear_usuario($data_insert);

							echo json_encode(array('status'=>'success'));



			}

	}
	public function datosusuario()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {

								$response =$this->Usuarios_Model->ver_usuario( $this->input->post("id"));
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
	public function comprobarusuario()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
								$dato     =$this->input->post("rut");
								$replace  = str_replace(".", "", $dato);
								$rut      = str_replace("-", "", $replace);
								$response =$this->Usuarios_Model->comprobar_usuario($rut);
								if($response == 0)
								{
									echo json_encode(array('status'=>'success'));
								}
								else
								{
									echo json_encode(array('status' =>"error",'message'=>"EL USUARIO YA EXISTE EN LA BASE DE DATOS"));
								}
				}

	}
	public function editarusuario()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
					$id        =  $this->input->post("id_usuario");

					$datos_usuario = $this->Usuarios_Model->ver_usuario($id);




		        	$dato     =$this->input->post("rut_usuario");
								$replace  = str_replace(".", "", $dato);
								$rut      = str_replace("-", "", $replace);

					 $data_update   = array(

											'rut'       =>  $rut,
											'nombres'   =>  $this->input->post("nombres_usuario"),
											'apellidos' =>  $this->input->post("apellidos_usuario"),
											'rango'     =>  $this->input->post("rango_usuario")

										  );

					 $this->Usuarios_Model->update_usuario($data_update,$id);
					 echo json_encode(array('status'=>'success'));
				}


	}
	public function editarclave()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
					$id            = $this->input->post("id_usuario");
					$clave_antigua = $this->input->post("clave_antigua_usuario");
					$clave_nueva   = $this->input->post("clave_nueva_usuario");
					$datos_usuario = $this->Usuarios_Model->ver_usuario($id);
					$clave_bd      = $datos_usuario['clave'];
					$error 		   = 0;
					 if($this->bcrypt->check_password($clave_antigua,$clave_bd ) == FALSE)
                        {
                          echo json_encode(array('status'=>'error','message' =>"La contraseña no coincide con la cuenta"));
                          return false;
                            $error = 1;
                        }
					 elseif($error == 0)
					 {
						 $data_update   = array(
												'clave'     => $this->bcrypt->hash_password( $this->input->post("clave_nueva_usuario"))
											  );

						  $this->Usuarios_Model->update_usuario($data_update,$id);

						 echo json_encode(array('status'=>'success'));
					 }
				}


	}
	public function eliminarusuario()
	{

				if(!$this->input->is_ajax_request())
		        {
		            show_404();
		        }else
		        {
					$id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
					$dato        = $this->security->sanitize_filename($this->input->input_stream('dato',TRUE));
					$datos_usuario = $this->Usuarios_Model->ver_usuario($id);

					$data = array('mostrar' => 2);


					             $this->Usuarios_Model->update_usuario($data,$id);

						echo json_encode(array('status'=>'success'));
				}


	}



}
