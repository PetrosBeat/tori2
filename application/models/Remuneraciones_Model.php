<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Remuneraciones_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el remuneracion
            public function crear_remuneracion($data)
           {
               return $this->db->insert('remuneraciones', $data);
           }

           //Editamos el remuneracion
            public function update_remuneracion($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('remuneraciones', $data_update);
           }
            //Editamos el remuneracion segun el rut
            public function update_remuneracion_2($data_update,$rut)
           {
              $this->db->where('rut',$rut);
               return $this->db->update('remuneraciones', $data_update);
           }
           //Eliminamos el remuneracion
            public function delete_remuneracion($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('remuneraciones');
           }
           //Obtenemos todos los remuneracion madera
           public function getRemuneraciones()
           {
                $query = $this->db->query("SELECT * FROM remuneraciones ");

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

           //obtenemos los datos del remuneracion segun el id
           public function ver_remuneraciones($numero_remuneracion)
           {
                $query = $this->db->query("SELECT * FROM remuneraciones WHERE numero_remuneracion='$numero_remuneracion' ");

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
           //obtenemos los datos del remuneracion segun el rut
           public function ver_remuneracion_rut($rut)
           {
                $query = $this->db->query("SELECT * FROM remuneraciones WHERE rut_trabajador='$rut' ");

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