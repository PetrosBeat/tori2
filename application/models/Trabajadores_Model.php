<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Trabajadores_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el trabajador
            public function crear_trabajador($data)
           {
               return $this->db->insert('trabajadores', $data);
           }
            public function crear_licencias($data)
           {
               return $this->db->insert('licencias', $data);
           }
           public function crear_vacaciones($data)
           {
               return $this->db->insert('vacaciones', $data);
           }
            public function crear_ausencias($data)
           {
               return $this->db->insert('ausencias', $data);
           }
            public function crear_horario_trabajador($data)
           {
               return $this->db->insert('horario_trabajadores', $data);
           }
            public function crear_colaciones_trabajador($data)
           {
               return $this->db->insert('colaciones_trabajadores', $data);
           }
            public function crear_horas_extras_trabajador($data)
           {
               return $this->db->insert('horas_extras_trabajadores', $data);
           }
            public function crear_turno($data)
           {
               return $this->db->insert('turnos', $data);
           }
            public function insert_documentacion_trabajador($data)
           {
               return $this->db->insert('documentos_trabajadores', $data);
           }
            public function delete_horario_trabajador($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('documentos_trabajadores');
           }
            public function DeleteDocumentosTrabajador($trabajador)
           {
              $this->db->where('trabajador',$trabajador);
               return $this->db->delete('horario_trabajadores');
           }
           //Editamos el trabajador
            public function actualizar_trabajador($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('trabajadores', $data_update);
           }
           public function actualizar_colaciones_trabajador($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('colaciones_trabajadores', $data_update);
           }
           public function actualizar_horas_extras_trabajador($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('horas_extras_trabajadores', $data_update);
           }
           public function actualizar_horario_trabajador($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('horario_trabajadores', $data_update);
           }
           public function actualizar_licencias($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('licencias', $data_update);
           }
           public function actualizar_ausencias($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('auscencias', $data_update);
           }
           public function actualizar_vacaciones($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('vacaciones', $data_update);
           }
            //Editamos el trabajador segun el rut
            public function actualizar_trabajador_2($data_update,$rut)
           {
              $this->db->where('rut',$rut);
               return $this->db->update('trabajadores', $data_update);
           }
           //Eliminamos el trabajador
            public function delete_trabajador($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('trabajadores');
           }
            public function delete_licencias($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('licencias');
           }
            public function delete_ausencias($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('ausencias');
           }
            public function delete_colaciones($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('colaciones_trabajadores');
           }
            public function delete_horas_extras($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('horas_extras_trabajadores');
           }
            public function delete_vacaciones($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('vacaciones');
           }
           //Obtenemos todos los trabajador madera
           public function getTrabajadores()
           {
                $query = $this->db->query("SELECT *,DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') AS fecha_nacimiento FROM trabajadores ");

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
            //Obtenemos todos los trabajador gastos
           public function getTrabajador2()
           {
                $query = $this->db->query("SELECT * FROM trabajadores  WHERE tipo = 1");

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
           public function getDocumentosTrabajador($rut)
           {
                $query = $this->db->query("SELECT * FROM documentos_trabajadores  WHERE trabajador = '$rut'");

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
           public function getLicenciasTrabajador($rut)
           {
                $query = $this->db->query("SELECT * FROM licencias  WHERE trabajador = '$rut'");

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
           public function getVacacionesTrabajador($rut)
           {
                $query = $this->db->query("SELECT * FROM vacaciones  WHERE trabajador = '$rut'");

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
           public function getAusenciasTrabajador($rut)
           {
                $query = $this->db->query("SELECT * FROM ausencias  WHERE trabajador = '$rut'");

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
           public function getDocumentosTrabajadorID($id)
           {
                $query = $this->db->query("SELECT * FROM documentos_trabajadores  WHERE id = '$id'");

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
           //Verificamos si el trabajador existe o no en la base de datos
           public function TrabajadorExist($rut)
           {
                $query = $this->db->query("SELECT * FROM trabajadores WHERE rut = '$rut'");

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
           //obtenemos los datos del trabajador segun el id
           public function ver_trabajador($id)
           {
                $query = $this->db->query("SELECT * FROM trabajadores WHERE id='$id' ");

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
           //obtenemos los datos del trabajador segun el rut
           public function ver_trabajador_rut($rut)
           {
                $query = $this->db->query("SELECT * FROM trabajadores WHERE rut='$rut'");

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
           public function ver_horario_trabajador($rut)
           {
                $query = $this->db->query("SELECT * FROM horario_trabajadores WHERE trabajador='$rut'");

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
           public function ver_trabajadores_area($area)
           {
                $query = $this->db->query("SELECT * FROM trabajadores WHERE area='$area'");

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

           public function ver_colaciones_trabajador($trabajador)
           {
                $query = $this->db->query("SELECT * FROM colaciones_trabajadores WHERE trabajador='$trabajador'");

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
           public function ver_horas_extras_trabajador($trabajador)
           {
                $query = $this->db->query("SELECT * FROM horas_extras_trabajadores WHERE trabajador='$trabajador' ORDER BY hora");

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