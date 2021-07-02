<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Ventas_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Editamos la venta
            public function update_venta($data_update,$numero_venta)
           {
              $this->db->where('numero_venta',$numero_venta);
               return $this->db->update('ventas', $data_update);
            }
            //Editamos el detalle de la venta
            public function update_detalle_venta($data_update,$numero_venta)
           {
              $this->db->where('numero_venta',$numero_venta);
               return $this->db->update('detalle_ventas', $data_update);
            }
            //Creamos la venta
            public function crear_venta($data)
           {
               return $this->db->insert('ventas', $data);
           }
            //Creamos el detalle de la venta
            public function crear_detalle_venta($data)
           {
               return $this->db->insert('detalle_ventas', $data);
           }
           //obtenemos los datos de la venta segun el numero de venta
           public function ver_ventas($numero)
           {
                $query = $this->db->query("SELECT * FROM ventas WHERE numero_venta='$numero'");

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
           //obtenemos los datos de la venta segun la fecha
           public function ver_ventas_dia($fecha)
           {
                $query = $this->db->query("SELECT * FROM ventas AS v INNER JOIN clientes AS c ON c.rut = v.rut_cliente WHERE DATE(v.fecha)='$fecha'");

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
           //obtenemos la Cantidad de Ventas y su resultado
           public function ventas_count($numero)
           {
                $query = $this->db->query("SELECT count(*) AS TotalVentas FROM ventas WHERE numero_venta='$numero'");

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
           //obtenemos el resultado de las ventas multiples
           public function ver_ventas_multiples($numero)
           {
                $query = $this->db->query("SELECT * FROM ventas WHERE numero_venta='$numero'");

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
           //obtenemos los datos del detalle de la venta segun el numero de venta
           public function ver_detalle_ventas($numero)
           {
                $query = $this->db->query("SELECT * FROM detalle_ventas WHERE numero_venta='$numero'");

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
           //Infome Mes
            public function ver_ventas_mes($mes)
           {
                $query = $this->db->query("SELECT * FROM ventas AS v INNER JOIN clientes AS c ON v.rut_cliente = c.rut WHERE MONTH(fecha)='$mes' ");

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

