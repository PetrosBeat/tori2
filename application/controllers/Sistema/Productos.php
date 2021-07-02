<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {


	public function index()
	{
		 //Revisamos si el token guardado en la bd es igual al de la sesion, si no lo es, manda al usuario al login
		        $correo        = $this->session->userdata('id');
                 $datos_usuario = $this->Informacion_Model->getDatos_Usuario($correo);
                 if($datos_usuario == 0)
                        {
                            $status = 'error';
                            $message = "El usuario no existe en la base de datos";
                            $error = 1;

                        }
                        else
                        {
                            $token            = $datos_usuario['token'];
                            $error            = 0;
                            $ultimo_login     = $datos_usuario['ultimo_login'];
                            $expiracion_login = $datos_usuario['expiracion_login'];
                            $rango            = $datos_usuario['rango'];
                            $conectado        = $datos_usuario['conectado'];

                        }
             $fecha_actual =date("Y-m-d H:i:s");
            if( ($token == $this->session->userdata("token")) AND ($fecha_actual <= $expiracion_login) ) {

                        $this->layout->title('Productos');
                        $contenido['conectado']      = true;
                        $contenido['sub_titulo']     = "Productos";
                         $contenido['rango']     = $rango;
                      $this->layout->js("assets/custom/productos.js");
                      $this->layout->js("assets/custom/ingredientes.js");
                        $this->layout->view('Sistema/Productos',$contenido);
                }
                else
                {
                    redirect('Conectar');
                }
	}
    //VISUALIZA LOS PRODUCTOS SEGUN LA CATEGORIA
    public function ver_productos_categoria()
    {
        if(!$this->input->is_ajax_request())
                {
                    show_404();
                }else
                {

                $response = $this->Productos_Model->TablaProductosCategoria($this->input->post("categoria"));
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
    public function ver_todos_productos()
    {
        if(!$this->input->is_ajax_request())
                {
                    show_404();
                }else
                {

                $response = $this->Productos_Model->ProductosTodos();
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
    //VERIFICAMOS EL CODIGO DEL PRODUCTO
    public function verificar_codigo()
    {
        if(!$this->input->is_ajax_request())
                {
                    show_404();
                }else
                {

                $response = $this->Productos_Model->VerificarCodigo($this->input->post("codigo"));
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
    //SUBIMOS LA IMAGEN DEL PRODUCTO
        public function imagen_producto()
    {

            if(!$this->input->is_ajax_request())
                {
                    show_404();
                }else
                {
                        //upload file
                          $Nombres                 = $this->Informacion_Model->generateRandomString();
                          $config['upload_path']   = 'assets/imagenes/productos/';
                          $config['allowed_types'] = 'gif|jpg|png';
                          $config['max_filename']  = '255';
                          $config['file_name']     =$Nombres;
                          $config['max_size']      = '30024'; //1 MB




                        if (isset($_FILES['file']['name'])) {
                                $archivo=$_FILES['file']['name'];


                           $extension = explode(".",$archivo);
                    $ext = $extension[1];//AQUI LA EXTENSION

                    $Nombre = $Nombres.".".$ext;
                            if (0 < $_FILES['file']['error']) {
                                echo 'Error al subir el archivo' . $_FILES['file']['error'];
                            } else {
                                if (file_exists('assets/imagenes/productos/' . $_FILES['file']['name'])) {
                                    echo 'El archivo Existe : assets/imagenes/productos/' . $_FILES['file']['name'];
                                } else {
                                     $this->load->library('upload', $config);
                                     $this->upload->initialize($config);

                                    if (!$this->upload->do_upload('file')) {
                                        echo $this->upload->display_errors();
                                    } else {

                                        echo ' <div id="borrar"><input type="hidden" id="imagen_upproducto" name="imagen_upproducto" value="'.$Nombre.'"/><b>Archivo subido correctamente al sistema</b></div>';


                                    }
                                }
                            }
                        } else {
                            echo 'Eligue un archivo';
                        }
            }

    }
       public function crear_producto()
    {
        if(!$this->input->is_ajax_request())
                {
                    show_404();
                }else
                {
                                 $datos_empresa   = $this->Informacion_Model->getApp();
                                 $nro_producto    = $datos_empresa['numero_producto'];

                                if(strlen($this->input->post("imagen_upproducto")) == 0)
                                {
                                    $imagen_producto = "nd.jpg";
                                }
                                else
                                {
                                    $imagen_producto = $this->input->post("imagen_upproducto");
                                }



                                $Data_Producto   = array(
                                            'numero_producto' => $nro_producto,
                                            'nombre'          => $this->input->post("nombre_producto"),
                                            'stock'           => 1,
                                            'precio_venta'    => $this->Informacion_Model->ConvertirDinero($this->input->post("precio_venta")),
                                            'imagen'          => $imagen_producto,
                                            'mostrar'         => 1,
                                            'categoria'       => $this->input->post("categoria"),
                                            'informacion'     => $this->input->post("informacion"),
                                            'barra'           => $this->input->post("producto_barra"),
                                            'es_happy'        => $this->input->post("happy_hour"),
                                            'hora_inicio_hh'  => $this->input->post("hora_inicio"),
                                            'hora_termino_hh' => $this->input->post("hora_termino"),
                                            'precio_venta_hh' => $this->Informacion_Model->ConvertirDinero($this->input->post("precio_venta_hh")),
                                            'para_delivery'   => 0,
                                            'mostrar_pagina'  => 0,
                                            'codigo_producto'   => $this->input->post("codigo_producto")
                                    );
                     $this->Productos_Model->crear_producto($Data_Producto);
                    // var_dump($Data_Producto);
                    for ($i=1; $i <= $this->input->post("cant_insumos") ; $i++)
                    {
                            if(is_null($this->input->post("repetible".$i)) == true)
                            {
                                $repetible = 'off';
                            }
                            else
                            {
                               $repetible =  $this->input->post("repetible".$i);
                            }
                            if(is_null($this->input->post("obligatorio".$i)) == true)
                            {
                                $obligatorio = 'off';
                            }
                            else
                            {
                               $obligatorio= $this->input->post("obligatorio".$i);
                            }
                            $Data_DetalleProducto   = array(
                                                            'numero_producto' =>(int) $nro_producto,
                                                            'nombre'          => $this->input->post("nombre_categoria".$i),
                                                            'repetible'       => $repetible,
                                                            'obligatorio'     => $obligatorio,
                                                            'minimo'          => $this->input->post("minimo".$i),
                                                            'maximo'          => $this->input->post("maximo".$i),
                                                        );

                               $id=  $this->Productos_Model->crear_detalle_producto($Data_DetalleProducto);
                               for ($j=1; $j <=$this->input->post("cantidad_ingredientes".$i); $j++) {
                                   $Data_DetalleProductoIngrediente   = array(
                                                                     'numero_producto'         =>(int) $nro_producto,
                                                                     'numero_detalle_producto' => $id,
                                                                     'ingrediente'             => $this->input->post("id_ingrediente".$i."_".$j),
                                                                     'valor'                   => $this->Informacion_Model->ConvertirDinero($this->input->post("valor_ingrediente".$i."_".$j)),
                                                        );
                                   $this->Productos_Model->crear_detalle_ingrediente_producto($Data_DetalleProductoIngrediente);
                               }

                    }


                    $nro_producto2 = $nro_producto + 1;
                    $data_numeracion = array('numero_producto' => $nro_producto2);
                     $this->Informacion_Model->Update_Empresa($data_numeracion);
                    echo json_encode(array('status'=>'success'));
                }


    }
    //TRAEMOS LOS DATOS DEL PRODUCTO SEGUN EL NUMERO DEL PRODUCTO
    public function ver_datos_producto()
    {
        if(!$this->input->is_ajax_request())
                {
                    show_404();
                }else
                {

                $response  = $this->Productos_Model->VerProductoNumero($this->input->post("numero"));
                $response2 = $this->Productos_Model->VerDetalleProductoNumero($this->input->post("numero"));
                $response3 = $this->Productos_Model->VerProductoIngredienteNumero($this->input->post("numero"));


                    if($response != 0)
                        {
                            echo json_encode(array('status'=>'success','data'=>$response,'data2'=>$response2,'data3'=>$response3));
                        }
                        else
                        {
                            echo json_encode(array('status' =>"error",'message'=>"No hay datos en la base de datos"));
                        }
            }

    }

}
