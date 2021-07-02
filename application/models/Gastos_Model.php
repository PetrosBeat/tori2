<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Gastos_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la cotizacion
            public function crear_gasto($data)
           {
               return $this->db->insert('gastos', $data);
           }

           //Obtenemos todas las cotizaciones
           public function getGastos()
           {
                $query = $this->db->query("SELECT *,DATE_FORMAT(g.fecha,'%d - %m - %Y ') AS fecha_gasto FROM gastos AS g INNER JOIN proveedores AS p ON g.rut = p.rut WHERE p.tipo = 1");

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

             //Obtenemos los pagos de los clientes por fecha
           public function ver_gastos_dia($fecha)
           {
                $query = $this->db->query("SELECT *  FROM gastos AS g INNER JOIN proveedores AS p ON g.rut = p.rut WHERE   DATE(g.fecha) ='$fecha' ");
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