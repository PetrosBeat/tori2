<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {


	public function index()
	{
				if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE OR $this->session->userdata('Dueno') == TRUE)
				{
					$this->layout->title('Categorias');
					$contenido['home_indicador'] = false;
					$contenido['conectado'] = true;
					$contenido['sub_titulo'] = "Categorias";
					// $this->output->cache(60);
					$this->layout->js("assets/custom/categorias.js");
					$this->layout->view('Sistema/Categorias',$contenido);
				}
				else
				{
					redirect('Conectar');
				}
	}

	public function tabla_categorias()
	{
				if(!$this->input->is_ajax_request())
				{
					show_404();
				}else
				{
					$response = $this->Categoria_Model->getCategorias($this->input->post("tipo"));
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

	public function crear_categoria()

	{

				if(!$this->input->is_ajax_request())
				{
					show_404();
				}else
				{
					$nombre_categoria   = $this->security->sanitize_filename($this->input->input_stream('nombre_categoria',TRUE));
					$imagen_upcategoria = $this->security->sanitize_filename($this->input->input_stream('imagen_upcategoria',TRUE));
					$tipo_categoria = $this->security->sanitize_filename($this->input->input_stream('tipo_categoria',TRUE));

					$data_insert   = array(
											'nombre' => $nombre_categoria,
											'imagen' => $imagen_upcategoria,
											'tipo'   =>$tipo_categoria,
											'orden' => $this->input->post('orden_categoria'),
											'descripcion' => $this->input->post('descripcion_categoria'),
										  );
						$this->Categoria_Model->create_categoria($data_insert);
						 echo json_encode(array('status'=>'success'));


			}

	}
	public function datoscategoria()
	{

			 	if(!$this->input->is_ajax_request())
				{
					show_404();
				}else
				{
						$id        = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
						$response = $this->Categoria_Model->view_categoria_codigo($id);
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

	public function datos_categoria_nombre()
	{

			 	if(!$this->input->is_ajax_request())
				{
					show_404();
				}else
				{
						$Categoria        = $this->security->sanitize_filename($this->input->input_stream('Categoria',TRUE));
						$response = $this->Categoria_Model->view_categoria_nombre($Categoria);
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

	public function editarcategoria()
	{

				if(!$this->input->is_ajax_request())
				{
					show_404();
				}else
				{
					$id                 = $this->security->sanitize_filename($this->input->input_stream('id_categoria',TRUE));
					$nombre_categoria   = $this->security->sanitize_filename($this->input->input_stream('nombre_categoria',TRUE));
					$imagen_upcategoria = $this->security->sanitize_filename($this->input->input_stream('imagen_upcategoria',TRUE));
					$tipo_categoria = $this->security->sanitize_filename($this->input->input_stream('tipo_categoria',TRUE));
					$datos_categoria    = $this->Categoria_Model->view_categoria_codigo($id);
					if($datos_categoria['imagen'] != $imagen_upcategoria)
					{
						 $file=".assets/imagenes/categorias/".$datos_categoria['imagen'];
					             unlink($file);

					}


					$data_update   = array(
											'nombre' => $nombre_categoria,
											'imagen' => $imagen_upcategoria,
											'tipo'   =>$tipo_categoria,
												'orden' => $this->input->post('orden_categoria'),
											'descripcion' => $this->input->post('descripcion_categoria'),
										  );
					 $data_updatei = array("categoria" =>$id);

					 if($tipo_categoria == 0)
					 {
					 	$data_updatep = array("categoria_carta" =>$id);
					 	$this->Categoria_Model->update_categoria_producto($data_updatep,$id);
					 }
					  $this->Categoria_Model->update_categoria_insumo($data_updatei,$id);
					 $this->Categoria_Model->update_categoria($data_update,$id);
					 echo json_encode(array('status'=>'success'));
				}


	}
	public function eliminarcategoria()
	{

				if(!$this->input->is_ajax_request())
				{
					show_404();
				}else
				{
					$id              = $this->security->sanitize_filename($this->input->input_stream('id',TRUE));
					$dato            = $this->security->sanitize_filename($this->input->input_stream('dato',TRUE));
					$datos_categoria = $this->Categoria_Model->view_categoria_codigo($id);

					$data = array('estado' => $dato);

			      //	 $file="./files/categorias/".$datos_categoria['imagen'];
					            // unlink($file);
					             $this->Categoria_Model->update_categoria($data,$id);
					//	$this->Categoria_Model->delete_categoria($id);
						 echo json_encode(array('status'=>'success'));
				}


	}


}