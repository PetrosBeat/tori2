<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Turnos_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }

            public function crear_turno($data)
           {
               return $this->db->insert('turnos', $data);
           }
           public function EditarHoraTrabajador($data_update,$id)
           {
              $this->db->where("id",$id);
             // $this->db->where("trabajador",$trabajador);
               return $this->db->update('turnos', $data_update);
           }
           public function ActualizarColacionTurno($data_update,$dia,$trabajador,$hora)
           {
              $this->db->where("dia",$dia);
              $this->db->where("trabajador",$trabajador);
               $this->db->where("hora",$hora);
               return $this->db->update('turnos', $data_update);
           }
            public function ActualizarTurnoFecha($data_update,$trabajador,$fecha)
           {
              $this->db->where("fecha",$fecha);
              $this->db->where("trabajador",$trabajador);

               return $this->db->update('turnos', $data_update);
           }
            //Obtenemos todos los turno gastos
           public function getTurnos()
           {
                $query = $this->db->query("SELECT * FROM turnos  WHERE tipo = 1");

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

           //obtenemos los datos del turno segun el id
           public function Ver_Turno_Area($area)
           {
                $query = $this->db->query("SELECT DATE_FORMAT(t.hora,'%H:%i') AS hora,tr.nombres,tr.apellidos,tr.area,t.dia,t.opcion_trabajador,t.semana,t.id AS id_turno,tr.id AS id_trabajador,tr.rut,t.valor_id
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area' ");

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
           public function Ver_Turno_Area_Total($area,$trabajador,$semana)
           {
                $query = $this->db->query("SELECT DATE_FORMAT(t.hora,'%H:%i') AS hora,tr.nombres,tr.apellidos,tr.area,t.dia,t.opcion_trabajador,t.semana,t.id AS id_turno,tr.id AS id_trabajador,tr.rut,t.valor_id
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area'  AND t.semana = '$semana' AND t.trabajador = '$trabajador' ");

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
           public function Ver_Turno_Area_Total_Semana($area,$trabajador,$semana)
           {
                $query = $this->db->query("SELECT COUNT( IF(t.opcion_trabajador ='T', t.opcion_trabajador , NULL)) AS horas_trabajadas,
                            COUNT( IF(t.opcion_trabajador ='E', t.opcion_trabajador , NULL)) AS horas_extras,
                            COUNT( IF(t.opcion_trabajador ='C', t.opcion_trabajador , NULL)) AS horas_colacion,
                            COUNT( IF(t.opcion_trabajador ='L', t.opcion_trabajador , NULL)) AS horas_libres,tr.id AS id_trabajador
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area'  AND t.semana = '$semana' AND tr.id = '$trabajador' ");

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
            public function Ver_Turno_Area_Total_Dia($area,$trabajador,$semana,$dia)
           {
                $query = $this->db->query("SELECT COUNT( IF(t.opcion_trabajador ='T', t.opcion_trabajador , NULL)) AS horas_trabajadas,
                            COUNT( IF(t.opcion_trabajador ='E', t.opcion_trabajador , NULL)) AS horas_extras,
                            COUNT( IF(t.opcion_trabajador ='C', t.opcion_trabajador , NULL)) AS horas_colacion,
                            COUNT( IF(t.opcion_trabajador ='L', t.opcion_trabajador , NULL)) AS horas_libres,tr.id AS id_trabajador,t.id AS id_turno
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area'  AND t.semana = '$semana' AND tr.id = '$trabajador' AND t.dia = '$dia' ");

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
            public function Get_Valor_Id_Trabajador($area,$trabajador,$semana,$dia)
           {
                $query = $this->db->query("SELECT t.valor_id
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area'  AND t.semana = '$semana' AND tr.rut = '$trabajador' AND t.dia = '$dia'  ORDER BY t.valor_id DESC");

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
           public function GetHorasT($area,$trabajador,$semana,$dia,$hora)
           {
                $query = $this->db->query("SELECT t.valor_id
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area'  AND t.semana = '$semana' AND tr.rut = '$trabajador' AND t.dia = '$dia' AND HOUR(t.hora) = '$hora'  ORDER BY t.valor_id DESC");

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
            public function Ver_Turno_Area_Dia($area,$dia,$semana)
           {
                $query = $this->db->query("SELECT tr.nombres,tr.apellidos,tr.area,t.dia,DATE_FORMAT(t.hora,'%H:%i') AS hora,t.opcion_trabajador,t.semana,t.id AS id_turno,tr.id AS id_trabajador,tr.rut,t.valor_id,DATE_FORMAT(t.fecha,'%d-%c-%Y') AS fecha
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area' AND t.dia = '$dia' AND t.semana = '$semana' ");

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
            public function get_turno_area_semana($area,$semana)
           {
                $query = $this->db->query("SELECT t.dia,DATE_FORMAT(t.fecha,'%d - %b - %Y') AS fecha,DATE_FORMAT(t.fecha,'%Y/%c/%e') AS fecha2
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area' AND t.semana = '$semana' GROUP BY t.fecha  ");

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
           public function Ver_Turno_Area_Dia2($area,$dia)
           {
                $query = $this->db->query("SELECT tr.nombres,tr.apellidos,tr.area,t.dia,DATE_FORMAT(t.hora,'%H:%i') AS hora,t.opcion_trabajador,t.semana,t.id AS id_turno,tr.id AS id_trabajador,tr.rut,t.valor_id,DATE_FORMAT(t.fecha,'%d-%c-%Y') AS fecha
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area' AND t.dia = '$dia'  ");

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
           //obtenemos los datos del turno segun el rut
           public function ver_turno_rut($rut)
           {
                $query = $this->db->query("SELECT * FROM turnos WHERE rut='$rut'");

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
           public function cantidad_trabajando_area($area,$dia,$semana)
           {
                $query = $this->db->query("SELECT count(*) AS total_trabajadores,DATE_FORMAT(t.hora,'%H:%i') AS hora,t.valor_id
                  FROM turnos AS t
                  INNER JOIN trabajadores AS tr
                  ON t.trabajador = tr.rut
                  WHERE tr.area='$area' AND t.dia = '$dia' AND t.semana = '$semana' AND t.opcion_trabajador IN('T','E') GROUP BY t.hora ");

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