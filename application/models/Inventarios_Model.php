<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Inventarios_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la inventarios
            public function crear_inventario($data)
           {
               return $this->db->insert('inventarios', $data);
           }
           //Creamos la inventarios
            public function crear_detalle_inventario($data)
           {
               return $this->db->insert('detalle_inventarios', $data);
           }
           //Actualizamos la inventarios
            public function update_inventario($data,$numero_inventario)
           {
                  $this->db->where('numero_inventario', $numero_inventario);
               return $this->db->update('inventarios', $data);
           }
           //Obtenemos todas las inventarios
           public function getCompras()
           {
                $query = $this->db->query("SELECT * FROM inventarios");

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
 //obtenemos los datos de la inventarios segun el numero de inventarios
           public function ver_inventario($numero)
           {
                $query = $this->db->query("SELECT * FROM inventarios WHERE numero_inventario='$numero'");

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
           //obtenemos los datos del detalle de la inventarios segun el numero de inventarios
           public function ver_detalle_inventario($numero)
           {
                $query = $this->db->query("SELECT * FROM detalle_inventarios WHERE numero_inventario='$numero'");

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
             public function ver_inventario_mes($mes)
           {
                $query = $this->db->query("SELECT * FROM inventarios WHERE MONTH(fecha)='$mes'");

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
           //obtenemos los datos del detalle de la inventarios segun el numero de inventarios
           public function ver_detalle_inventario_mes($mes)
           {
                $query = $this->db->query("SELECT * FROM detalle_inventarios WHERE MONTH(fecha)='$mes' ");

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
           //obtenemos los datos de la inventarios segun el numero de inventarios
           public function ver_inventario_dia($fecha)
           {
                $query = $this->db->query("SELECT i.fecha,di.nombre,di.cantidad,di.unidades,di.paquetes,di.total_pulgadas,di.medida FROM inventarios AS  i INNER JOIN detalle_inventarios AS di ON i.numero_inventario
                 = di.numero_inventario  WHERE DATE(i.fecha)='$fecha' ");

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