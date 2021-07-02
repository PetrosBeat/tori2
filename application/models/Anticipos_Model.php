<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Anticipos_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la anticipos
            public function crear_anticipos($data)
           {
               return $this->db->insert('anticipos', $data);
           }
           //Update la anticipos
            public function update_anticipos($data,$numero_anticipos)
           {
              $this->db->where("numero_anticipos",$numero_anticipos);
               return $this->db->update('anticipos', $data);
           }

           //Obtenemos todas las anticipos
           public function getCotizaciones()
           {
                $query = $this->db->query("SELECT * FROM anticipos");

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
          //obtenemos los datos de la anticipos segun el numero de anticipos
           public function ver_anticipos($trabajador,$fecha)
           {
                $query = $this->db->query("SELECT COALESCE(SUM(total),0) AS totales,COALESCE(count(*),0) AS cantidad FROM anticipos WHERE trabajador='$trabajador' AND MONTH(fecha)='$fecha'");

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
           //obtenemos los datos de la anticipos segun el numero de anticipos
           public function ver_anticipos2($fecha)
           {
                $query = $this->db->query("SELECT * FROM anticipos WHERE MONTH(fecha)='$fecha'");

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