<?php
class Informes extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


		$this->layout->title('Informes');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "Informes";
		$this->layout->js('assets/custom/informes.js');
		//$this->output->cache(60);
		$this->layout->view('Informes/Informes',$contenido);
	}
	else
	{
		redirect('Conectar');
	}
	}


	public function informe_caja()
	{

		if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

				$fecha            = $this->input->post('fecha');

				$response = $this->Informes_Model->Informe_Caja($fecha);
				if($response != 0)
						{
							echo json_encode(array('status'=>'success',$response));
						}
						else
						{
							echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
						}


			}
		}
public function informe_venta_cliente()
	{

		if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

					$rut           = $this->input->post('rutc');
					$fecha_inicio  = $this->input->post("fecha_inicio");
					$fecha_termino = $this->input->post("fecha_termino");


				if(($this->input->post("fecha_inicio") && $this->input->post("fecha_termino")) == '')
				{
					echo json_encode(array('status'=>'success','data'=>$this->Informes_Model->informe_venta_cliente2($rut)));
				}
				else
				{
					echo json_encode(array('status'=>'success','data'=>$this->Informes_Model->informe_venta_cliente($rut,$fecha_inicio,$fecha_termino)));
				}
		}

}
}