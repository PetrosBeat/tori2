<?php
class ResumenCaja extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){
					if($_GET['fecha'] == NULL)
                		{
                			$fecha = NULL;
                		}
                		else
                		{
                			$fecha = $_GET['fecha'];
                		}
                		 $contenido['fecha']     =$fecha;

		$this->layout->title('ResumenCaja');
		$contenido['home_indicador'] = false;
		$contenido['conectado']      = true;
		$contenido['sub_titulo']     = "ResumenCaja";
		$this->layout->js('assets/custom/informes.js');
		//$this->output->cache(60);
		$this->layout->view('Informes/ResumenCaja',$contenido);
	}
	else
	{
		redirect('Conectar');
	}
	}
}