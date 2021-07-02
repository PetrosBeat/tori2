<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Calendario_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
            public function getCaledario(){
         $this->db->select('id id, color color, titulo title, CONCAT(fecha," ",hora) start, CONCAT(fecha," ",hora) end, hora hora, descripcion descripcion ');
         $this->db->from('calendario');
        // $this->db->where('rut_paciente=','');
             return $this->db->get()->result();


       }

            public function crear_evento($data)
           {
               return $this->db->insert('calendario', $data);
           }

            public function editar_evento($data,$id)
           {
              $this->db->where("id",$id);
               return $this->db->update('calendario', $data);
           }
            public function eliminar_evento($id)
           {
              $this->db->where("id",$id);
               return $this->db->delete('calendario');
           }

           public function getDatosCalendario()
           {
                $query = $this->db->query("SELECT * FROM calendario");

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

           public function ver_calendario_id($id)
           {
                $query = $this->db->query("SELECT * FROM calendario WHERE id='$id'");

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