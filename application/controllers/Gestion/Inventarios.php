<?php
class Inventarios extends CI_Controller {


  public function index()
  {
    if($this->session->userdata('Conectado') == TRUE AND $this->session->userdata('Administrador') == TRUE ){


    $this->layout->title('Inventarios');
    $contenido['home_indicador'] = false;
    $contenido['conectado']      = true;
    $contenido['sub_titulo']     = "Inventarios";
    $this->layout->js('assets/custom/inventarios.js');
    //$this->output->cache(60);
    $this->layout->view('Gestion/Inventarios',$contenido);
  }
  else
  {
    redirect('Conectar');
  }
  }

	    public function crearinventario()
        {


            $method = $_SERVER['REQUEST_METHOD'];

            if($method != 'POST'){
              $this->response(array('error' =>"No tienes permisos para acceder aqui"),400);
            } else {
						$datos_empresa      = $this->Informacion_Model->getApp();
						$numero_inventario  = $datos_empresa['numero_inventario'];
						$numero_inventario2 = $datos_empresa['numero_inventario'] + 1;
						$fecha              = $this->input->post('fecha');//

						$cant_inv              = $this->input->post("cant_inv");
                   		$Data_Inventario    = array(
												'numero_inventario'           => $numero_inventario,
												'fecha'                       => $fecha,
                        'fecha_ingreso'                 => date('Y-m-d H:i:s')


			                      			  );

                     $this->Inventarios_Model->crear_inventario($Data_Inventario);
                      //Insert detalle inventarios

                  for ($i=1; $i <= $cant_inv ; $i++)
                  {
                        $codigo         = $this->input->post("codigo".$i);
                        $nombre         = $this->input->post("nombre".$i);
                        $cantidad       = $this->input->post("cantidad".$i);
                        $total_pulgadas = $this->input->post("total_pulgadas".$i);
                        $medida         = $this->input->post("medida".$i);
                        $tipo_venta     = $this->input->post("tipo_venta".$i);
                        $productoo       = $this->Productos_Model->ver_producto_codigo($codigo);
                          //UNIDAD
					           if($tipo_venta == 1)
                      {
                        if(($codigo == '1000' OR $codigo =='404' OR $codigo == '303'))
                        {
                            $total_pulgadas =  $cantidad;
                            $unidades       =  $total_pulgadas;
                            $paquetes       =  0;
                            $stock          = $productoo['stock'] + $total_pulgadas;
                            $data_stock     = array("stock" => $stock);
                            $this->Productos_Model->update_productoo_codigo($data_stock,$codigo);
                        }
                        else
                        {
                            $unidades       =  $cantidad;
                            $total_pulgadas =  $medida * $cantidad;
                            $paquetes       =  $cantidad;
                            $stock          = $productoo['stock'] + $total_pulgadas;
                            $data_stock     = array("stock" => $stock);
                            $this->Productos_Model->update_productoo_codigo($data_stock,$codigo);
                        }


                      }
                      else//pULGADAS
                      {
                        if(($codigo == '1000' OR $codigo =='404' OR $codigo == '303'))
                        {

                               $total_pulgadas =  $cantidad * $medida;
                               $unidades       =  $cantidad * $productoo['cantidad_palos'];
                               $paquetes       =  0;
                               $stock          = $productoo['stock'] + ($cantidad * $productoo['cantidad_palos']);
                               $data_stock     = array("stock" => $stock);
                               $this->Productos_Model->update_productoo_codigo($data_stock,$codigo);
                        }
                        else
                        {
                            $total_pulgadas =  $cantidad * $medida;
                            $unidades       =  0;
                            $paquetes       =  $cantidad;
                            $stock          = $productoo['stock'] + $total_pulgadas;
                            $data_stock     = array("stock" => $stock);
                            $this->Productos_Model->update_productoo_codigo($data_stock,$codigo);
                        }
                      }




                    $data_detalle = array(
                                'numero_inventario' => $numero_inventario,
                                'fecha'             => $fecha,
                                'codigo'            => $codigo,
                                'nombre'            => $nombre,
                                'cantidad'          => $cantidad,
                                'unidades'          => $unidades,
                                'paquetes'          => $paquetes,
                                'total_pulgadas'    => round($total_pulgadas,2),
                                'medida'            => $medida,

                              );
                    $this->Inventarios_Model->crear_detalle_inventario($data_detalle);
                  }


                  //  file_get_contents(base_url().'ComprobanteInventario/'.$numero_inventario);
                    $Data_Empresa = array('numero_inventario' => $numero_inventario2);
                    $this->Informacion_Model->Update_Empresa($Data_Empresa);
                    echo json_encode(array('status'=>'success',"numero_inventario" =>$numero_inventario));
            }
        }

 }
