<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Usuarios_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la usuario
            public function crear_usuario($data)
           {
               return $this->db->insert('usuarios', $data);
           }
           //Editamos la usuario
            public function update_usuario($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('usuarios', $data_update);
           }

           //Eliminamos la usuario
            public function delete_usuario($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('usuarios');
           }
           //Obtenemos todos los usuarios
           public function getUsuarios()
           {
                $query = $this->db->query("SELECT * FROM usuarios");

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
           //obtenemos los datos dla usuario segun el id
           public function ver_usuario($id)
           {
                $query = $this->db->query("SELECT * FROM usuarios WHERE id='$id'");

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
           public function ver_usuario2($rut)
           {
                $query = $this->db->query("SELECT * FROM usuarios WHERE rut='$rut'");

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
           public function comprobar_usuario($rut)
           {
                $query = $this->db->query("SELECT * FROM usuarios WHERE rut='$rut'");

                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return FALSE;
                     }
                     else
                     {
                       return TRUE;
                     }
           }



 }