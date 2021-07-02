<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Informes_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }

    public function Informe_Caja($fecha)
              {

                                 $totales                        = $this->db->query("SELECT count(*) AS TVentas,COALESCE(COALESCE(SUM(total_final),0),0) AS Total FROM detalle_ventas WHERE DATE(fecha) = '$fecha' AND numero_venta !=0");

                                 $totales2                        = $this->db->query("SELECT count(*) AS TVentas,COALESCE(COALESCE(SUM(total_final),0),0) AS Total FROM detalle_ventas WHERE DATE(fecha) = '$fecha' AND numero_venta != 0 ");
                                 $contado                        = $this->db->query("SELECT count(*) AS TVentas,COALESCE(SUM(v.total),0) AS Total FROM ventas AS v  WHERE DATE(v.fecha) = '$fecha' AND v.forma_pago = 'CONTADO' ");
                                 $credito                        = $this->db->query("SELECT count(*) AS TVentas,COALESCE(SUM(v.total),0) AS Total FROM ventas AS v  WHERE DATE(v.fecha) = '$fecha' AND v.forma_pago = 'CREDITO' ");
                                 $transferencia                  = $this->db->query("SELECT count(*) AS TVentas,COALESCE(SUM(v.total),0) AS Total FROM ventas AS v  WHERE DATE(v.fecha) = '$fecha' AND v.forma_pago = 'TRANSFERENCIA' ");
                                 $cheque                         = $this->db->query("SELECT count(*) AS TVentas,COALESCE(SUM(v.total),0) AS Total FROM ventas AS v  WHERE DATE(v.fecha) = '$fecha' AND v.forma_pago = 'CHEQUE' ");
                                 $tarjeta                        = $this->db->query("SELECT count(*) AS TVentas,COALESCE(SUM(v.total),0) AS Total FROM ventas AS v  WHERE DATE(v.fecha) = '$fecha' AND v.forma_pago = 'TARJETA' ");
                                 $pago_clientes                  = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 0 ");
                                 $pago_clientes_contado          = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 0 AND forma_pago='CONTADO'");
                                 $pago_clientes_cheque           = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 0 AND forma_pago='CHEQUE'");
                                 $pago_clientes_transferencia    = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 0 AND forma_pago='TRANSFERENCIA'");
                                 $pago_clientes_tarjeta          = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 0 AND forma_pago='TARJETA'");
                                 $pago_proveedores               = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 1 ");
                                 $pago_proveedores_contado       = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 1 AND forma_pago='CONTADO'");
                                 $pago_proveedores_cheque        = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 1 AND forma_pago='CHEQUE'");
                                 $pago_proveedores_transferencia = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 1 AND forma_pago='TRANSFERENCIA'");
                                 $pago_proveedores_tarjeta       = $this->db->query("SELECT count(*) AS TPago,COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos WHERE DATE(fecha) = '$fecha' AND tipo = 1 AND forma_pago='TARJETA'");

                                 $gastos                         = $this->db->query("SELECT count(*) AS TGasto,SUM(total_caja) AS TotalCaja,COALESCE(SUM(total),0) AS Total FROM gastos WHERE DATE(fecha) = '$fecha' ");
                                 $gastos_contado                 = $this->db->query("SELECT COALESCE(SUM(total - total_caja),0) AS Total FROM gastos WHERE DATE(fecha) = '$fecha' and forma_pago ='CONTADO'   ");
                                 $gastos_caja                    = $this->db->query("SELECT COALESCE(SUM(total_caja),0) AS Total FROM gastos WHERE DATE(fecha) = '$fecha' and total_caja <> 0  ");
                                 $gastos_cheque                  = $this->db->query("SELECT COALESCE(SUM(total),0) AS Total FROM gastos WHERE DATE(fecha) = '$fecha' and forma_pago ='CHEQUE' ");
                                 $gastos_transferencia           = $this->db->query("SELECT COALESCE(SUM(total),0) AS Total FROM gastos WHERE DATE(fecha) = '$fecha' and forma_pago ='TRANSFERENCIA' ");
                                 $caja                           = $this->db->query("SELECT COALESCE(monto_inicial,0) AS monto_inicial,DATE(fecha) AS fecha,estado FROM caja  WHERE DATE(fecha) = '$fecha' ");
                                 $productos_vendidos             = $this->db->query("SELECT SUM(total_final) AS Total,SUM(total_pulgadas) AS cantidad,nombre FROM detalle_ventas WHERE DATE(fecha) = '$fecha' GROUP BY codigo ");
                                 $compras                        = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) = '$fecha'AND forma_pago <> 'CONTADO' ");
                                 $compras_contado                = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) = '$fecha'AND forma_pago='CONTADO' ");
                                 $compras_contado_caja                = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) = '$fecha'AND forma_pago='EFECTIVO CAJA' ");
                                 $compras_credito                = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) = '$fecha'AND forma_pago='CREDITO' ");
                                 $compras_transferencia          = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) = '$fecha'AND forma_pago='TRANSFERENCIA' ");
                                 $compras_cheque                 = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) = '$fecha'AND forma_pago='CHEQUE' ");
                                  $ventas_dia                        = $this->db->query("SELECT * FROM detalle_ventas AS dv INNER JOIN ventas AS v ON dv.numero_venta = v.numero_venta WHERE DATE(v.fecha) = '$fecha' AND v.numero_venta != 0  GROUP BY v.id ORDER BY v.numero_venta DESC");
                                 $arrays                         = array(
                                          "Caja"                       => $caja->row_array(),

                                          "Ventas"                     => $totales->row_array(),
                                          "Ventas2"                    => $totales2->row_array(),
                                          "Compras"                    => $compras->row_array(),
                                          "Gastos"                     => $gastos->row_array(),

                                          "PagosCliente"               => $pago_clientes->row_array(),
                                          "PagosProveedor"             => $pago_proveedores->row_array(),
                                          'Compras_Contado'            => $compras_contado->row_array(),
                                          'Compras_Contado_Caja'             => $compras_contado_caja->row_array(),
                                          'Compras_Credito'            => $compras_credito->row_array(),
                                          'Compras_Transferencia'      => $compras_transferencia->row_array(),
                                          'Compras_Cheque'             => $compras_cheque->row_array(),
                                          "Ventas_Contado"             => $contado->row_array(),
                                          "Ventas_Credito"             => $credito->row_array(),
                                          "Ventas_Transferencia"       => $transferencia->row_array(),
                                          "Ventas_Cheque"              => $cheque->row_array(),
                                          "Ventas_Tarjeta"             => $tarjeta->row_array(),
                                          "PagoC_Contado"              => $pago_clientes_contado->row_array(),
                                          "PagoC_Tarjeta"              => $pago_clientes_tarjeta->row_array(),
                                          "PagoC_Cheque"               => $pago_clientes_cheque->row_array(),
                                          "PagoC_Transferencia"        => $pago_clientes_transferencia->row_array(),
                                          "PagoP_Contado"              => $pago_proveedores_contado->row_array(),
                                          "PagoP_Tarjeta"              => $pago_proveedores_tarjeta->row_array(),
                                          "PagoP_Cheque"               => $pago_proveedores_cheque->row_array(),
                                          "PagoP_Transferencia"        => $pago_proveedores_transferencia->row_array(),
                                          "Gastos"                     => $gastos->row_array(),
                                          "Gastos_Caja"                => $gastos_caja->row_array(),
                                          "Gastos_Contado"             => $gastos_contado->row_array(),
                                          "Gastos_Cheque"              => $gastos_cheque->row_array(),
                                          "Gastos_Transferencia"       => $gastos_transferencia->row_array(),
                                          "Productos_Vendidos"         => $productos_vendidos->result_array(),
                                           "Ventas_Dia"         => $ventas_dia->result_array()
                                  );



                    return $arrays;

              }
               public function informe_venta_cliente($rut,$fecha_inicio,$fecha_termino)
              {

                                 $ventas_total       = $this->db->query("SELECT COALESCE(SUM(total),0) AS Total FROM ventas AS v SELECT COALESCE(SUM(dv.total_final),0) AS Total
                                                                        FROM ventas AS v
                                                                        INNER JOIN detalle_ventas AS dv
                                                                        ON v.numero_venta = dv.numero_venta
                                                                        WHERE v.rut_cliente='$rut'
                                                                        AND DATE(v.fecha) BETWEEN '$fecha_inicio' AND '$fecha_termino'  ");
                                 $ventas             = $this->db->query("SELECT  dv.id,v.numero_venta,v.pagado,v.fecha,v.forma_pago,v.rut_cliente,v.saldo_pendiente,dv.codigo,dv.nombre,dv.cantidad,dv.total_pulgadas,v.forma_pago,v.documento FROM ventas AS v INNER JOIN detalle_ventas AS dv ON v.numero_venta = dv.numero_venta  WHERE v.rut_cliente='$rut' AND v.pagado =0  AND DATE(v.fecha) BETWEEN '$fecha_inicio' AND '$fecha_termino'  ");
                                 $saldo_pendiente    = $this->db->query("SELECT  SUM(saldo_pendiente) AS Total,razonSocial FROM ventas AS v
                                                                                    INNER JOIN clientes AS c
                                                                                    ON c.rut = v.rut_cliente
                                                                                    WHERE v.pagado <> 1 AND v.saldo_pendiente <> 0 AND c.rut='$rut' ");
                                 $ultimo_pago       = $this->db->query("SELECT * FROM pagos  WHERE rut='$rut' ORDER BY id ASC  LIMIT 1");
                                  $total_pagos       = $this->db->query("SELECT SUM(dinero_recibido) AS Total FROM pagos  WHERE rut='$rut' AND tipo = 0");
                                 $arrays             = array(
                                            "Ventas"             => $ventas->result_array(),

                                            "Saldo"              => $saldo_pendiente->row_array(),
                                            "Total_Ventas"       => $ventas_total->row_array(),
                                            "Total_Pagos"        => $total_pagos->row_array(),

                                            'Pagos'              => $ultimo_pago->row_array(),


                                  );

                    return $arrays;

              }
              public function informe_venta_cliente2($rut)
              {
                                $ultimo_pago       = $this->db->query("SELECT * FROM pagos  WHERE rut='$rut' ORDER BY id ASC  LIMIT 1");
                                 $ventas_total       = $this->db->query("SELECT COALESCE(SUM(dv.total_final),0) AS Total
                                                                        FROM ventas AS v
                                                                        INNER JOIN detalle_ventas AS dv
                                                                        ON v.numero_venta = dv.numero_venta
                                                                        WHERE v.rut_cliente='$rut' GROUP BY v.numero_venta
                                                                         ");
                                 $ventas             = $this->db->query("SELECT  dv.total_final,dv.id,v.numero_venta,v.pagado,v.fecha,v.forma_pago,v.rut_cliente,v.saldo_pendiente,dv.codigo,dv.nombre,dv.cantidad,dv.total_pulgadas,v.forma_pago,v.documento,dv.valor_unitario FROM ventas AS v INNER JOIN detalle_ventas AS dv ON v.numero_venta = dv.numero_venta  WHERE v.rut_cliente='$rut' AND v.pagado =0    ");
                                 $saldo_pendiente    = $this->db->query("SELECT  SUM(saldo_pendiente) AS Total,razonSocial FROM ventas AS v
                                                                                    INNER JOIN clientes AS c
                                                                                    ON c.rut = v.rut_cliente
                                                                                    WHERE v.pagado <> 1 AND v.saldo_pendiente <> 0 AND c.rut='$rut' ");
                                  $total_pagos       = $this->db->query("SELECT COALESCE(SUM(dinero_recibido),0) AS Total FROM pagos  WHERE rut='$rut' AND tipo = 0");
                                 $arrays             = array(
                                               "Ventas"             => $ventas->result_array(),

                                               "Saldo"              => $saldo_pendiente->row_array(),
                                               "Total_Ventas"       => $ventas_total->row_array(),

                                               "Total_Pagos"        => $total_pagos->row_array(),
                                               'Pagos'              => $ultimo_pago->row_array()

                                  );

                    return $arrays;

              }
               public function info_total_vendido($fecha_inicio,$fecha_termino)
         {
           $query                        = $this->db->query("SELECT count(*) AS TVentas,COALESCE(COALESCE(SUM(total_final),0),0) AS Total FROM detalle_ventas WHERE DATE(fecha) BETWEEN '$fecha_inicio' AND '$fecha_termino'  ");

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
           public function info_total_compras($fecha_inicio,$fecha_termino)
         {
           $query                         = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) BETWEEN '$fecha_inicio' AND '$fecha_termino'  ");

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
           public function info_total_gastos($fecha_inicio,$fecha_termino)
         {
           $query                         = $this->db->query("SELECT count(*) AS TGasto,SUM(total_caja) AS TotalCaja,COALESCE(SUM(total),0) AS Total FROM gastos WHERE DATE(fecha) BETWEEN '$fecha_inicio' AND '$fecha_termino' ");
                $resultado = $query->row_array();
                if($resultado == NULL)
                     {
                      return 0;
                     }
                     else
                     {
                       return $resultado;
                     }

          }public function grafico_venta_mensuales($year)
              {

                          $contado                        = $this->db->query("SELECT COALESCE(SUM(dv.total_final),0) AS Total,MONTHNAME(v.fecha) AS mes,YEAR(v.fecha) AS year,v.documento,v.fecha
 FROM detalle_ventas AS dv
 INNER JOIN ventas AS v
 ON v.numero_venta = dv.numero_venta
 WHERE  YEAR(v.fecha) ='$year' GROUP BY YEAR(v.fecha),MONTH(v.fecha) ");
                              $contado2                        = $this->db->query("SELECT COALESCE(SUM(dv.total_final),0) AS
                                                                        Total,MONTHNAME(v.fecha) AS mes,YEAR(v.fecha) AS year,
                                                                                  v.documento
                                                                      FROM detalle_ventas AS dv
                                                                      INNER JOIN ventas AS v
                                                                      ON v.numero_venta = dv.numero_venta
                                                                      WHERE  YEAR(v.fecha) ='$year'
                                                                      GROUP BY v.documento
                                                                      ORDER BY YEAR(v.fecha),MONTH(v.fecha) ASC ");


                  $arrays                         = array(
                                         "Ventas"             => $contado->result_array(),

                                           );



                    return $arrays;
              }
               public function grafico_dia_forma_pago($year)
              {


                              $contado2                        = $this->db->query("SELECT COALESCE(SUM(dv.total_final),0) AS
                                                                        Total,MONTHNAME(v.fecha) AS mes,YEAR(v.fecha) AS year,
                                                                                  v.documento
                                                                      FROM detalle_ventas AS dv
                                                                      INNER JOIN ventas AS v
                                                                      ON v.numero_venta = dv.numero_venta
                                                                      WHERE  YEAR(v.fecha) ='$year' AND v.documento != 'NULL'
                                                                      GROUP BY v.documento
                                                                      ORDER BY YEAR(v.fecha),MONTH(v.fecha) ASC ");


                  $arrays                         = array(
                                         "VentasDia"             => $contado2->result_array(),
                                           );



                    return $arrays;
              }
           public function estadisticas_generales($fecha)
              {

                                  $vendido           = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM detalle_ventas WHERE DATE(fecha) ='$fecha' ");
                                  $gastos            = $this->db->query("SELECT COALESCE(SUM(total_caja+total),0) AS Total FROM gastos WHERE DATE(fecha) ='$fecha'  ");
                                  $compras           = $this->db->query("SELECT COALESCE(SUM(total_final),0) AS Total FROM compras WHERE DATE(fecha) ='$fecha'   ");
                                   $metros           = $this->db->query("SELECT COALESCE(SUM(total_metros),0) AS Total FROM compras WHERE DATE(fecha) ='$fecha'   ");
                                  $pago_clientes     = $this->db->query("SELECT COALESCE(COALESCE(SUM(dinero_recibido),0),0) AS Total FROM pagos WHERE  DATE(fecha) ='$fecha' AND tipo=0");
                                  $pago_proveedores  = $this->db->query("SELECT COALESCE(COALESCE(SUM(dinero_recibido),0),0) AS Total FROM pagos WHERE  DATE(fecha) ='$fecha' AND tipo=1");
                                  $mes               = date('m');
                                  $year              = date('Y');
                                   $pulgadas   = $this->db->query("SELECT COALESCE(SUM(total_pulgadas),0) AS Total FROM detalle_inventarios WHERE MONTH(fecha) = '$mes' and YEAR(fecha) = '$year' ");
                                  $acumulado_gasto   = $this->db->query("SELECT COALESCE(SUM(total_caja+total),0) AS Total FROM gastos WHERE MONTH(fecha) = '$mes' and YEAR(fecha) = '$year' ");
                                  $acumulado_ventas  = $this->db->query("SELECT COALESCE(SUM(dv.total_final),0) AS Total FROM detalle_ventas AS dv  WHERE MONTH(dv.fecha) = '$mes' and YEAR(dv.fecha) = '$year'");
                                  $acumulado_compras = $this->db->query("SELECT COALESCE(SUM(c.total_metros),0) AS Total FROM compras AS c  WHERE MONTH(c.fecha) = '$mes' and YEAR(c.fecha) = '$year'  ORDER BY c.numero_compra DESC");

                     $arrays                         = array(
                                                           "pulgadas"           => $pulgadas->row_array(),
                                                             "metros"           => $metros->row_array(),
                                                            "vendido"           => $vendido->row_array(),
                                                            "pago_clientes"     => $pago_clientes->row_array(),
                                                            "pago_proveedores"  => $pago_proveedores->row_array(),
                                                            "gastos"            => $gastos->row_array(),
                                                            "compras"           => $compras->row_array(),
                                                            "acumulado_gasto"   => $acumulado_gasto->row_array(),
                                                            "acumulado_ventas"  => $acumulado_ventas->row_array(),
                                                            "acumulado_compras" => $acumulado_compras->row_array(),
                                                             );



                    return $arrays;
              }

    }

