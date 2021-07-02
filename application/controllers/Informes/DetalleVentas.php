<?php
class DetalleVentas extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


		$this->layout->title('DetalleVentas');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "DetalleVentas";
		$this->layout->js('assets/custom/informes.js');
		//$this->output->cache(60);
		$this->layout->view('Informes/DetalleVentas',$contenido);
	}
	else
	{
		redirect('Conectar');
	}
	}
}