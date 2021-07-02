<?php
class Conectar extends CI_Controller {

    public function __construct() {
        parent::__construct();


    }
  public function index()
  {
    $this->layout->title('Ingreso al sistema');
      $contenido['sub_titulo'] = "Ingreso al sistema";
    $this->layout->view('Conectar',$contenido);

  }

     public function login()
    {

        if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

                    $correo        = $this->input->post("emailaddress");
                    $pass          = $this->input->post('password');

                    $datos_usuario = $this->Informacion_Model->getDatos_Usuario($correo);

                    $datos_cuenta  = $datos_usuario['correo'];
                    $datos_pass    = $datos_usuario['clave'];
                    $rango         = $datos_usuario['rango'];
                    $error         = 0;
                    $id            = $datos_usuario['id'];
                    $token         = md5(uniqid(rand(),true));
                          if(!isset($datos_usuario))
                        {
                          echo json_encode(array('status'=>'error','message' =>"El usuario no existe en la base de datos"));
                            $error = 1;
                        }
                       elseif($this->bcrypt->check_password($pass, $datos_pass) == FALSE)
                        {
                          echo json_encode(array('status'=>'error','message' =>"La contraseña no coincide con la cuenta"));

                            $error = 1;
                        }
                        else
                        {

                             $last_login = date("Y-m-d H:i:s");
                              //creamos la fecha de expiracion del token para evitar posibles problemas de autentificacion
                               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                               //Cramos el array para luego updatear los datos del usuario ingresado
                              $data =  array('token' =>$token,'ultimo_login' =>$last_login,'expiracion_login' => $expired_at,'conectado' => 1);

                              $this->Informacion_Model->UpdateUser($id,$data);


                                    if($rango == 0 )
                                    {
                                        //ADMINISTRADOR
                                        $usuario_data = array
                                        (
                                             'id'            => $this->input->post("emailaddress"),
                                             'Administrador' => TRUE,
                                             'Vendedor'      => FALSE,
                                             'Cajero'        => FALSE,
                                             'Conectado'     => TRUE,
                                             'Cocina'        => FALSE,
                                             'Barra'         => FALSE,
                                             'Dueno'         => FALSE,
                                             'Repartidor'    => FALSE,
                                             'token'         => $token
                                        );
                                          $this->session->set_userdata($usuario_data);
                                         echo json_encode(array('status'=>'success','permiso' => $rango));


                                    }
                                    elseif($rango == 1)
                                    {
                                        //DUEÑO
                                        $usuario_data = array
                                        (
                                             'id'            => $this->input->post("emailaddress"),
                                             'Administrador' => FALSE,
                                             'Vendedor'      => FALSE,
                                             'Cajero'        => FALSE,
                                             'Conectado'     => TRUE,
                                             'Cocina'        => FALSE,
                                             'Barra'         => FALSE,
                                             'Dueno'         => TRUE,
                                             'Repartidor'    => FALSE,
                                             'token'         => $token
                                        );
                                          $this->session->set_userdata($usuario_data);
                                         echo json_encode(array('status'=>'success','permiso' => $rango));

                                    }
                                        elseif($rango == 2)

                                    {
                                        //CAJERO
                                        $usuario_data = array
                                        (
                                             'id'            => $this->input->post("emailaddress"),
                                             'Administrador' => FALSE,
                                             'Vendedor'      => FALSE,
                                             'Cajero'        => TRUE,
                                             'Conectado'     => TRUE,
                                             'Cocina'        => FALSE,
                                             'Barra'         => FALSE,
                                             'Dueno'         => FALSE,
                                             'Repartidor'    => FALSE,
                                             'token'         => $token
                                        );
                                          $this->session->set_userdata($usuario_data);
                                         echo json_encode(array('status'=>'success','permiso' => $rango));

                                    }
                                      elseif($rango == 3)

                                    {
                                        //COCINERO
                                        $usuario_data = array
                                        (
                                            'id'            => $this->input->post("emailaddress"),
                                             'Administrador' => FALSE,
                                             'Vendedor'      => FALSE,
                                             'Cajero'        => FALSE,
                                             'Conectado'     => TRUE,
                                             'Cocina'        => TRUE,
                                             'Barra'         => FALSE,
                                             'Dueno'         => FALSE,
                                             'Repartidor'    => FALSE,
                                             'token'         => $token
                                        );
                                          $this->session->set_userdata($usuario_data);
                                         echo json_encode(array('status'=>'success','permiso' => $rango));
                                    }
                                     elseif($rango == 4)

                                    {
                                        //REPARTIDOR
                                        $usuario_data = array
                                        (
                                            'id'            => $this->input->post("emailaddress"),
                                             'Administrador' => FALSE,
                                             'Vendedor'      => FALSE,
                                             'Cajero'        => FALSE,
                                             'Conectado'     => TRUE,
                                             'Cocina'        => FALSE,
                                             'Barra'         => FALSE,
                                             'Dueno'         => FALSE,
                                             'Repartidor'    => TRUE,
                                             'token'         => $token
                                        );
                                          $this->session->set_userdata($usuario_data);
                                         echo json_encode(array('status'=>'success','permiso' => $rango));
                                    }

                        }
            }
    }

    public function F__Salir()
     {
        $usuario_data   = array(
                                     'id'            => FALSE,
                                     'Administrador' => FALSE,
                                     'Vendedor'      => FALSE,
                                     'Cajero'        => FALSE,
                                     'Conectado'     => FALSE,
                                     'Cocina'        => FALSE,
                                     'Barra'         => FALSE,
                                     'Dueno'         => FALSE,
                                     'Repartidor'    => FALSE,
                                     'token'         => FALSE
        );

        $this->session->set_userdata($usuario_data);
         echo "<script>location='Home'</script>";
     }
  public function empresa()
  {
   if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

        $response = $this->Informacion_Model->getApp();
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
  public function comprobacion()
  {
    if(!$this->input->is_ajax_request())
        {
            show_404();
        }else
        {

        $response = $this->Caja_Model->comprobacion();
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


}