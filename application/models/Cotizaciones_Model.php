<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cotizaciones_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la cotizacion
            public function crear_cotizacion($data)
           {
               return $this->db->insert('cotizaciones', $data);
           }
           //Creamos la cotizacion
            public function crear_detalle_cotizacion($data)
           {
               return $this->db->insert('detalle_cotizaciones', $data);
           }
           //Obtenemos todas las cotizaciones
           public function getCotizaciones()
           {
                $query = $this->db->query("SELECT * FROM cotizaciones");

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
 //obtenemos los datos de la cotizacion segun el numero de cotizacion
           public function ver_cotizacion($numero)
           {
                $query = $this->db->query("SELECT * FROM cotizaciones WHERE numero_cotizacion='$numero'");

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
           //obtenemos los datos del detalle de la cotizacion segun el numero de cotizacion
           public function ver_detalle_cotizacion($numero)
           {
                $query = $this->db->query("SELECT * FROM detalle_cotizaciones WHERE numero_cotizacion='$numero'");

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