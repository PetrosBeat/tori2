<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Proveedor_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el proveedor
            public function crear_proveedor($data)
           {
               return $this->db->insert('proveedores', $data);
           }
           public function insertar_precios($data)
           {
               return $this->db->insert('precios_proveedores', $data);
           }
           //Editamos el proveedor
            public function update_proveedor($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('proveedores', $data_update);
           }
            //Editamos el proveedor segun el rut
            public function update_proveedor_2($data_update,$rut)
           {
              $this->db->where('rut',$rut);
               return $this->db->update('proveedores', $data_update);
           }
           //Eliminamos el proveedor
            public function delete_proveedor($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('proveedores');
           }
            //Editamos las direcciones segun el id


           //Obtenemos todos los proveedores
           public function getClientes()
           {
                $query = $this->db->query("SELECT * FROM proveedores");

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
           //Verificamos si el proveedor existe o no en la base de datos
           public function ClientExist($rut)
           {
                $query = $this->db->query("SELECT * FROM proveedores WHERE rut = '$rut'");

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
            public function getPreciosProveedor($rut)
           {
                $query = $this->db->query("SELECT DATE_FORMAT(fecha,'%d / %c / %Y') AS fecha,precio,id FROM precios_proveedores WHERE proveedor='$rut'");

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
           //obtenemos los datos del proveedor segun el id
           public function ver_proveedor($id)
           {
                $query = $this->db->query("SELECT * FROM proveedores WHERE id='$id'  AND mostrar = 0");

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
           //obtenemos los datos del proveedor segun el rut
           public function ver_proveedor_rut($rut)
           {
                $query = $this->db->query("SELECT *  FROM proveedores  WHERE rut='$rut' AND mostrar = 0");

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