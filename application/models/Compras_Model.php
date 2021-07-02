<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Compras_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la compras
            public function crear_compra($data)
           {
               return $this->db->insert('compras', $data);
           }
            public function update_compra($data_update,$numero_compra)
           {
              $this->db->where('numero_compra',$numero_compra);
               return $this->db->update('compras', $data_update);
            }
           //Creamos la compras
            public function crear_detalle_compra($data)
           {
               return $this->db->insert('detalle_compras', $data);
           }
           //Obtenemos todas las compras
           public function getCompras()
           {
                $query = $this->db->query("SELECT * FROM compras");

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
 //obtenemos los datos de la compras segun el numero de compras
           public function ver_compra($numero)
           {
                $query = $this->db->query("SELECT * FROM compras WHERE numero_compra='$numero'");

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
            //obtenemos los datos de la compras segun la fecha
           public function ver_compras_dia($fecha)
           {
                $query = $this->db->query("SELECT * FROM compras as c INNER JOIN proveedores AS p ON c.rut = p.rut WHERE DATE(c.fecha)='$fecha'");
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
           //obtenemos los datos del detalle de la compras segun el numero de compras
           public function ver_detalle_compra($numero)
           {
                $query = $this->db->query("SELECT * FROM detalle_compras WHERE numero_compra='$numero'");

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
  }