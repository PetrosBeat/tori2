<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Pedidos_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Editamos la pedido
            public function update_pedido($data_update,$numero_pedido)
           {
              $this->db->where('numero_pedido',$numero_pedido);
               return $this->db->update('pedidos', $data_update);
            }
            //Editamos el detalle de la pedido
            public function update_detalle_pedido($data_update,$numero_pedido)
           {
              $this->db->where('numero_pedido',$numero_pedido);
               return $this->db->update('detalle_pedidos', $data_update);
            }
            //Creamos la pedido
            public function crear_pedido($data)
           {
               return $this->db->insert('pedidos', $data);
           }
            //Creamos el detalle de la pedido
            public function crear_detalle_pedido($data)
           {
               return $this->db->insert('detalle_pedidos', $data);
           }
           //obtenemos los datos de la pedido segun el numero de pedido
           public function ver_pedidos($numero)
           {
                $query = $this->db->query("SELECT * FROM pedidos WHERE numero_pedido='$numero'");

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
           //obtenemos los datos de la pedido segun la fecha
           public function ver_pedidos_dia($fecha)
           {
                $query = $this->db->query("SELECT * FROM pedidos AS v INNER JOIN clientes AS c ON c.rut = v.rut_cliente WHERE DATE(v.fecha)='$fecha'");

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
           //obtenemos la Cantidad de Pedidos y su resultado
           public function pedidos_count($numero)
           {
                $query = $this->db->query("SELECT count(*) AS TotalPedidos FROM pedidos WHERE numero_pedido='$numero'");

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
           //obtenemos el resultado de las pedidos multiples
           public function ver_pedidos_multiples($numero)
           {
                $query = $this->db->query("SELECT * FROM pedidos WHERE numero_pedido='$numero'");

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
           //obtenemos los datos del detalle de la pedido segun el numero de pedido
           public function ver_detalle_pedidos($numero)
           {
                $query = $this->db->query("SELECT * FROM detalle_pedidos WHERE numero_pedido='$numero'");

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
            public function ver_pedidos_mes($mes)
           {
                $query = $this->db->query("SELECT * FROM pedidos AS v INNER JOIN clientes AS c ON v.rut_cliente = c.rut WHERE MONTH(fecha)='$mes' ");

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

