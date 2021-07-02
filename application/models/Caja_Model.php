<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Caja_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la caja
            public function crear_caja($data)
           {
               return $this->db->insert('caja', $data);
           }

           //Update la caja
            public function update_caja($data,$numero_caja)
           {
              $this->db->where("numero_caja",$numero_caja);
               return $this->db->update('caja', $data);
           }

           //Obtenemos todas las caja
           public function getCaja()
           {
                $query = $this->db->query("SELECT * FROM caja");

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
             public function comprobacion()
           {
                $query = $this->db->query("SELECT estado FROM caja WHERE estado = 0 ");

                $resultado = $query->row_array();
                return $resultado;
           }
          //obtenemos los datos de la caja segun el numero de caja
           public function ver_caja($numero)
           {
                $query = $this->db->query("SELECT * FROM caja WHERE numero_caja='$numero'");

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
           //obtenemos los datos de la caja segun el numero de caja
           public function ver_caja2($fecha)
           {
                $query = $this->db->query("SELECT * FROM caja WHERE DATE(fecha)='$fecha'");

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
             public function CajaAserradero()
              {
                      $query = $this->db->query("SELECT c.numero_caja,DATE_FORMAT(c.fecha, '%d-%m-%Y ') AS fecha_apertura,c.estado,
                                              DATE_FORMAT(c.fecha_cierre, '%d-%m-%Y ') AS fecha_cierre,c.vendedor,DATE(c.fecha) AS fecha,
                                              COALESCE(c.monto_inicial,0) AS monto_inicial,COALESCE(c.monto_entrega,0) AS monto_entrega,
                                              c.estado  FROM caja AS c ORDER BY c.fecha DESC LIMIT 30  ");
                       $i = 1;
                       $array_final['datos'] = "";
                                  foreach ($query->result_array() as $row)
                                  {

                                    $fecha = $row['fecha'];
                                    $vendedor = $row['vendedor'];
                                    $monto_inicial = $row['monto_inicial'];
                                         $contado  = $this->db->query("SELECT COALESCE(SUM(v.total),0) AS Total
                                                            FROM ventas AS v
                                                            WHERE v.forma_pago = 'CONTADO' AND date(v.fecha) = '$fecha' ");
                                        $credito  = $this->db->query("SELECT COALESCE(SUM(v.total),0) AS Total
                                                            FROM ventas AS v

                                                            WHERE v.forma_pago = 'CREDITO' AND date(v.fecha) = '$fecha' ");
                                         $cheque  = $this->db->query("SELECT COALESCE(SUM(v.total),0) AS Total
                                                            FROM ventas AS v

                                                            WHERE v.forma_pago = 'CHEQUE' AND date(v.fecha) = '$fecha' ");
                                          $transferencia  = $this->db->query("SELECT COALESCE(SUM(v.total),0) AS Total
                                                            FROM ventas AS v

                                                            WHERE v.forma_pago = 'TRANSFERENCIA' AND date(v.fecha) = '$fecha' ");
                                          $debito  = $this->db->query("SELECT COALESCE(SUM(v.total),0) AS Total
                                                            FROM ventas AS v

                                                            WHERE v.forma_pago = 'TARJETA' AND date(v.fecha) = '$fecha' ");


                                          $gastos_contado_caja  = $this->db->query(" SELECT COALESCE(SUM(total_caja),0) AS Total
                                                           FROM gastos
                                                            WHERE  date(fecha) = '$fecha' AND forma_pago = 'CONTADO' AND dinero_caja = 0");
                                          $gastos_contado  = $this->db->query(" SELECT COALESCE(SUM(total - total_caja),0) AS Total
                                                           FROM gastos
                                                            WHERE  date(fecha) = '$fecha' AND forma_pago = 'CONTADO'");
                                          $gastos_otros  = $this->db->query(" SELECT COALESCE(SUM(total - total_caja),0) AS Total
                                                           FROM gastos
                                                            WHERE  date(fecha) = '$fecha' AND forma_pago != 'CONTADO'");
                                          $pagos_cliente  = $this->db->query(" SELECT COALESCE(SUM(dinero_recibido),0) AS Total
                                                           FROM pagos
                                                            WHERE  date(fecha) = '$fecha' AND tipo = '0'");
                                          $pagos_cliente_contado  = $this->db->query(" SELECT COALESCE(SUM(dinero_recibido),0) AS Total
                                                           FROM pagos
                                                            WHERE  date(fecha) = '$fecha' AND tipo = '0' AND forma_pago ='CONTADO' ");
                                          $pagos_proveedor  =  $this->db->query(" SELECT COALESCE(SUM(dinero_recibido),0) AS Total
                                                           FROM pagos
                                                            WHERE  date(fecha) = '$fecha' AND tipo = '1 '");
                                           $pagos_proveedor_contado  =  $this->db->query(" SELECT COALESCE(SUM(dinero_recibido),0) AS Total
                                                           FROM pagos
                                                            WHERE  date(fecha) = '$fecha' AND tipo = '1' AND forma_pago ='CONTADO'");

                                           $vendedor  =  $this->db->query(" SELECT nombres,apellidos
                                                           FROM usuarios
                                                            WHERE  rut = '$vendedor'");

                                                $g_contado_caja                 =  $gastos_contado_caja->row_array();
                                                $g_contado               =  $gastos_contado->row_array();
                                                $gastos_otros             =  $gastos_otros->row_array();
                                                $r_contado                 =  $contado->row_array();
                                                $r_credito                 =  $credito->row_array();
                                                $r_cheque                  =  $cheque->row_array();
                                                $r_transferencia           =  $transferencia->row_array();
                                                $r_debito                  =  $debito->row_array();
                                                $r_contado                 =  $contado->row_array();

                                                $r_pagos_proveedor         = $pagos_proveedor->row_array();
                                                $r_pagos_cliente           = $pagos_cliente->row_array();
                                                $r_pagos_cliente_contado   = $pagos_cliente_contado->row_array();
                                                $r_pagos_proveedor_contado = $pagos_proveedor_contado->row_array();

               $MontoFinal = ($r_contado['Total'] + $monto_inicial + $r_pagos_cliente_contado['Total']) - ( $r_pagos_proveedor_contado['Total'] + $g_contado_caja['Total']);
                                          $date = date_crear($row['fecha']);
                                          $data_array = array(
                                                                 'fecha_apertura'       => $row['fecha_apertura'],
                                                                 'fecha_cierre'         => $row['fecha_cierre'],
                                                                 'contado'              => $r_contado['Total'],
                                                                 'credito'              => $r_credito['Total'],
                                                                 'cheque'               => $r_cheque['Total'],
                                                                 'debito'               => $r_debito['Total'],
                                                                 'transferencia'        => $r_transferencia['Total'],

                                                                 'pagos_cliente'        => $r_pagos_cliente['Total'],
                                                                 'pagos_proveedor'      => $r_pagos_proveedor['Total'],
                                                                 'vendedor'             => $vendedor->row_array(),
                                                                 'monto_inicial'        => $row['monto_inicial'],
                                                                 'monto_entrega'        => $MontoFinal,
                                                                 'estado'  =>$row['estado']
                                           );

                                          array_push($array_final,$data_array);


                                      $i++;
                                   }
                                   return ($array_final);

              }


  }