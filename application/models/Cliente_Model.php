<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cliente_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el cliente
            public function crear_cliente($data)
           {
               return $this->db->insert('clientes', $data);
           }
           public function insertar_precios($data)
           {
               return $this->db->insert('precios_clientes', $data);
           }
           //Editamos el cliente
            public function actualizar_cliente($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('clientes', $data_update);
           }
            //Editamos el cliente segun el rut
            public function actualizar_cliente_2($data_update,$rut)
           {
              $this->db->where('rut',$rut);
               return $this->db->update('clientes', $data_update);
           }
           //Eliminamos el cliente
            public function borrar_cliente($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('clientes');
           }


           //Obtenemos todos los clientes
           public function getClientes()
           {
                $query = $this->db->query("SELECT * FROM clientes");

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
           public function getPreciosCliente($rut)
           {
                $query = $this->db->query("SELECT DATE_FORMAT(fecha,'%d/%c/%Y') AS fecha,precio,tipo,id FROM precios_clientes WHERE cliente='$rut'");

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
           public function getPreciosClienteVenta($rut)
           {
                $query = $this->db->query("SELECT DATE_FORMAT(fecha,'%d/%c/%Y') AS fecha,precio,tipo,id FROM precios_clientes WHERE cliente='$rut'  ORDER BY fecha DESC");

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
           //Verificamos si el cliente existe o no en la base de datos
           public function ClientExist($rut)
           {
                $query = $this->db->query("SELECT * FROM clientes WHERE rut = '$rut'");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 1;
                     }
                     else
                     {
                       return 0;
                     }
           }
           //obtenemos los datos del cliente segun el id
           public function ver_cliente($id)
           {
                $query = $this->db->query("SELECT * FROM clientes WHERE id='$id'  AND mostrar = 0");

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
           //obtenemos los datos del cliente segun el rut
           public function ver_cliente_rut($rut)
           {
                $query = $this->db->query("SELECT *  FROM clientes AS c  WHERE c.rut='$rut' AND c.mostrar = 0");

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



 }