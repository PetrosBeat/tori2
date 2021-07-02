<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Informacion_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
                    /**
                     * [getApp F01]
                     * Obtenemos los datos perteneciente a la empresa.
                     * @date     13-03-2017
                     * @author Pedro Garcias Aravena
                     * @version [3.0]
                     * @param  {[rut]}
                     * @param  {[nombre_empresa]}
                     * @param  {[giro]}
                     * @param  {[direccion]}
                     * @param  {[telefono]}
                     * @param  {[rut]}
                     * @param  {[cuidad]}
                     * @param  {[numero_comprobante_venta]}
                     * @param  {[numero_cotizacion]}
                     * @return {[array]}
                     */
                    function formateo_rut($rut){

     return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
 function formateo_rut2($rut){

     return number_format( substr ( $rut, 0 , -1 ) , 0, "", "") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
           public function getApp()
           {
                $query = $this->db->query("SELECT * FROM empresa");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
           public function RepresentantesEmpresa()
           {
                $query = $this->db->query("SELECT * FROM representantes");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
            public function area_empresa()
           {
                $query = $this->db->query("SELECT * FROM area");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
            public function Get_area_empresa($area)
           {
                $query = $this->db->query("SELECT * FROM area WHERE id ='$area'");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
           public function getMes($mes)
           {
                $query = $this->db->query("SELECT MONTHNAME(STR_TO_DATE('$mes', '%m'));");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
                   /**
                     * [getDatos_Usuario F02]
                     *  Obtenemos los datos el usuario que intenta ingresar al sistema
                     * @date     13-03-2017
                     * @author Pedro Garcias Aravena
                     * @version [3.0]
                     * @param  {[rut]}
                     * @param  {[clave]}
                     * @param  {[nombres]}
                     * @param  {[apellidos]}
                     * @param  {[rango]}
                     * @return {[Array]}
                           *
                     */
           public function getDatos_Usuario($correo)
           {
                $query = $this->db->query("SELECT * FROM usuarios WHERE correo = '$correo'");

                $resultado = $query->row_array();
                return $resultado;
           }
           /**
                     * [getDatos_Formulario F03]
                     *  Funcion para obtener el usuario y contraseña de la bd y compararla con los ingresados en el inicio
                     * @date     13-03-2017
                     * @author Pedro Garcias Aravena
                     * @version [3.0]
                     * @param  {[rut]}
                     * @param  {[clave]}
                     * @param  {[nombres]}
                     * @param  {[apellidos]}
                     * @param  {[rango]}
                     * @return {[Boolean]}
                     */
           public function getDatos_Formulario($correo,$pass)
           {
                $query = $this->db->query("SELECT * FROM usuarios WHERE correo = '$correo' AND clave='$pass' ");

                $resultado = $query->num_rows();
                if($resultado == 0)
                {
                  return FALSE;
                }
                else
                {
                  return TRUE;
                }
            }
             public function nacionalidad()
           {
                $query = $this->db->query("SELECT * FROM nacionalidad ");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
            public function provincias()
           {
                $query = $this->db->query("SELECT * FROM provincias ");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
           public function comunas($id)
           {
                $query = $this->db->query("SELECT * FROM comunas WHERE comuna='$id' ");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
           public function afp()
           {
                $query = $this->db->query("SELECT * FROM afp  ");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
            }
             public function getAfp($dato)
           {
                $query = $this->db->query("SELECT * FROM afp  WHERE id='$dato' ");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
            }
            public function isapres()
           {
                $query = $this->db->query("SELECT * FROM isapres  ");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
            }
            public function getIsapres($id)
           {
                $query = $this->db->query("SELECT * FROM isapres WHERE id='$id'  ");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
            }
public function ver_cheque_venta($numero_venta)
           {
                $query = $this->db->query("SELECT * FROM pago_cheque WHERE numero_venta = '$numero_venta'");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
           function UpdateUser($id,$data)
          {
            $this->db->where('id',$id);
            return $this->db->update('usuarios', $data);
          }
           public function getUser($rut)
           {
                $query = $this->db->query("SELECT * FROM usuarios WHERE rut = '$rut'");

                $resultado = $query->row_array();
                return $resultado;
           }
                   public function ConvertirDinero($valor)
                  {
                       $finalprecio =     str_replace(",", "", $valor);
                       $finalprecio2 = str_replace("$", "", $finalprecio);
                       return $finalprecio2;
                  }

                  function Update_Empresa($Data_Empresa)
                  {
                      return $this->db->update('empresa', $Data_Empresa);
                  }

                 //Método con str_shuffle()
                public function generateRandomString($length = 20) {
                    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                }

                 //Creamos el cheque
            public function add_cheque($data)
           {
               return $this->db->insert('pago_cheque', $data);
           }
            public function add_evento($data)
           {
               return $this->db->insert('eventos', $data);
           }
           public function login($username,$password)
          {
            $query = $this->db->query("SELECT * FROM usuarios WHERE rut = '$username' AND clave='$password'");

                $resultado = $query->row_array();
                if($resultado == NULL)
                {
                  return 0;
                }
                else
                {
                    return $resultado;
                }
           }
           function diferenciaDias($inicio, $fin)
          {
              $inicio = strtotime($inicio);
              $fin = strtotime($fin);
              $dif = $fin - $inicio;
              $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
              return ceil($diasFalt);
          }
           public function getServicios()
           {
                $query = $this->db->query("SELECT * FROM servicios");

                $resultado = $query->result_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }
           }
            public function Numero_Boleta($Numero_Boleta)
              {
                $cantidad_digitos = strlen($Numero_Boleta);
                if($cantidad_digitos == 1)
                {
                  $Numero_Boleta_Final = '000000000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 2)
                {
                  $Numero_Boleta_Final = '00000000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 3)
                {
                  $Numero_Boleta_Final = '0000000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 4)
                {
                  $Numero_Boleta_Final = '000000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 5)
                {
                  $Numero_Boleta_Final = '00000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 6)
                {
                  $Numero_Boleta_Final = '0000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 7)
                {
                  $Numero_Boleta_Final = '000'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 8)
                {
                  $Numero_Boleta_Final = '00'.$Numero_Boleta;
                }
                elseif($cantidad_digitos == 9)
                {
                  $Numero_Boleta_Final = '0'.$Numero_Boleta;
                }

                return $Numero_Boleta_Final;
              }
      }