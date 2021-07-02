<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {


	public function index()
	{
        if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE OR $this->session->userdata('Dueno') == TRUE)
        {
          $this->layout->title('Configuracion Sistema');
          $contenido['home_indicador'] = false;
          $contenido['conectado'] = true;
         $contenido['sub_titulo']     = "Configuracion Sistema";
           $contenido['empresa'] = $datos_empresa =$this->Informacion_Model->getApp();
          // $this->output->cache(60);
        // $this->layout->js("assets/custom/empresa.js");
          $this->layout->view('Sistema/Configuracion',$contenido);
        }
        else
        {
          redirect('Conectar');
        }

	}
	public function DatosPanel()
	{
    if(!$this->input->is_ajax_request())
    {
      show_404();
    }else
    {
             $nombre              = $this->input->post("nombre");
             $rut                 = $this->input->post("rut");
             $giro                = $this->input->post("giro");
             $direccion           = $this->input->post("direccion");
             $telefono            = $this->input->post("telefono");
             $correo              = $this->input->post("correo");
             $ciudad              = $this->input->post("ciudad");
             $tipo_sistema        = $this->input->post("tipo_sistema");
             $impresion_barra     = $this->input->post("impresion_barra");
             $impresion_cocina    = $this->input->post("impresion_cocina");
             $impresion_venta     = $this->input->post("impresion_venta");
             $impresion_precuenta = $this->input->post("impresion_precuenta");
             $iva                 = $this->input->post("iva");
             $propina             = $this->input->post("propina");
             $delivery            = $this->input->post("delivery");
             $tipo_impresora      = $this->input->post("tipo_impresora");
             $ip_impresora        = $this->input->post("ip_impresora");
             $nombre_impresora    = $this->input->post("nombre_impresora");
              $clave_descuento    = $this->input->post("clave_descuento");
             $datos_empresa       =$this->Informacion_Model->getApp();

           if($datos_empresa == 0)
           {
           	  $Data             = array(
                                            'nombre'              => $nombre ,
                                            'rut'                 => $rut ,
                                            'giro'                => $giro ,
                                            'direccion'           => $direccion ,
                                            'telefono'            => $telefono ,
                                            'correo'              => $correo ,
                                            'ciudad'              => $ciudad ,
                                            'tipo_sistema'        => (int)$tipo_sistema ,
                                            'impresion_barra'     => (int)$impresion_barra ,
                                            'impresion_cocina'    => (int)$impresion_cocina ,
                                            'impresion_venta'     => (int)$impresion_venta ,
                                            'impresion_precuenta' => (int)$impresion_precuenta ,
                                            'iva'                 => (int)$iva,
                                            'propina'             => (int)$propina,
                                            'delivery'            => (int)$delivery,
                                            'impresora_red'      => (int)$tipo_impresora,
                                            'ip_impresora'        => $ip_impresora,
                                            'nombre_impresora'    => $nombre_impresora,
                                            'clave_autorizacion'    => $clave_descuento


                                                    );
               $this->Informacion_Model->InsertDatosEmpresa($Data);
           }
           else
           {
           	 $Data             = array(
                                            'nombre'              => $nombre ,
                                            'rut'                 => $rut ,
                                            'giro'                => $giro ,
                                            'direccion'           => $direccion ,
                                            'telefono'            => $telefono ,
                                            'correo'              => $correo ,
                                            'ciudad'              => $ciudad ,
                                            'tipo_sistema'        => (int)$tipo_sistema ,
                                            'impresion_barra'     => (int)$impresion_barra ,
                                            'impresion_cocina'    => (int)$impresion_cocina ,
                                            'impresion_venta'     => (int)$impresion_venta ,
                                            'impresion_precuenta' => (int)$impresion_precuenta ,
                                            'iva'                 => (int)$iva,
                                            'propina'             => (int)$propina,
                                            'delivery'            => (int)$delivery,
                                            'impresora_red'      => (int)$tipo_impresora,
                                            'ip_impresora'        => $ip_impresora,
                                            'nombre_impresora'    => $nombre_impresora,
                                            'clave_autorizacion'    => $clave_descuento

                                                    );

              $this->Informacion_Model->Update_Empresa($Data);

           }
           echo json_encode(array('status'=>'success'));

	}
}
}
