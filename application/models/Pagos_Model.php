<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Pagos_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el pagos
            public function crear_pago($data)
           {
               return $this->db->insert('pagos', $data);
           }
            public function crear_detalle_pago($data)
           {
               return $this->db->insert('detalle_pagos', $data);
           }

           //Editamos el pagos
            public function update_pago($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('pagos', $data_update);
           }
            //Editamos el pagos segun el rut
            public function update_pago_2($data_update,$rut)
           {
              $this->db->where('rut',$rut);
               return $this->db->update('pagos', $data_update);
           }
           //Eliminamos el pagos
            public function delete_pago($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('pagos');
           }

           //Obtenemos todos la deuda de clientes
           public function getDeudasClientes()
           {
                $query = $this->db->query("SELECT SUM(dv.total_final) AS deuda,v.rut_cliente,c.razonSocial,v.saldo_pendiente
                         FROM ventas AS v
                         INNER JOIN clientes AS c
                         ON v.rut_cliente = c.rut
                         INNER JOIN detalle_ventas AS dv
                         ON dv.numero_venta = v.numero_venta
                         WHERE v.forma_pago='CREDITO'  AND v.saldo_pendiente <> 0
                          GROUP BY v.rut_cliente ");

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
           //Obtenemos todos la deuda de clientes
           public function getDetalleDeudasClientes($rut)
           {
                $query = $this->db->query("SELECT SUM(dv.total_final) AS deuda,v.rut_cliente,c.razonSocial,c.credito_utilizado,v.pagado,v.numero_venta,v.saldo_pendiente,v.numero_venta
                         FROM ventas AS v
                         INNER JOIN clientes AS c
                         ON v.rut_cliente = c.rut
                         INNER JOIN detalle_ventas AS dv
                         ON dv.numero_venta = v.numero_venta
                         WHERE v.forma_pago='CREDITO'  AND v.saldo_pendiente <> 0 AND c.rut = '$rut' ORDER BY v.numero_venta  ");

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
           //Obtenemos todos la deuda de clientes
           public function getDetalleDeudasClientes2($rut)
           {
                $query = $this->db->query("SELECT *  FROM ventas AS v INNER JOIN detalle_ventas AS dv ON v.numero_venta = dv.numero_venta WHERE v.forma_pago='CREDITO' AND  v.saldo_pendiente <> 0 AND v.rut_cliente = '$rut' ");

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
            //Obtenemos todos la deuda de proveedor
           public function getDeudasProveedores()
           {
                $query = $this->db->query("SELECT SUM(c.saldo_pendiente) AS deuda,p.rut,p.razonSocial,c.saldo_pendiente FROM compras AS c INNER JOIN proveedores AS p ON c.rut = p.rut WHERE c.pagado <> 1 AND c.forma_pago IN('CREDITO','TRANSFERENCIA') GROUP BY p.rut ");

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
           //Obtenemos todos la deuda de proveedor
           public function getDetalleDeudasProveedores($rut)
           {
                $query = $this->db->query("SELECT *  FROM compras AS c INNER JOIN proveedores AS p ON p.rut = c.rut WHERE   c.saldo_pendiente <> 0 AND p.rut = '$rut' AND c.forma_pago IN('CREDITO','TRANSFERENCIA') ");

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
           public function ver_pagos_dia($fecha)
           {
                $query = $this->db->query("SELECT *  FROM pagos AS v INNER JOIN clientes AS c ON v.rut = c.rut WHERE   DATE(fecha) ='$fecha' AND v.tipo = 0 ");
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
             //Obtenemos los pagos de los provedoores por fecha
           public function ver_pagos_dia2($fecha)
           {
                $query = $this->db->query("SELECT *  FROM pagos AS v INNER JOIN proveedores AS c ON v.rut = c.rut WHERE   DATE(fecha) ='$fecha' AND v.tipo = 1 ");
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
           //Obtenemos todos la deuda de proveedor
           public function getDetalleDeudasProveedores2($rut)
           {
                $query = $this->db->query("SELECT *  FROM compras AS v INNER JOIN detalle_compras AS dv ON v.numero_compra = dv.numero_compra WHERE   v.saldo_pendiente <> 0 AND v.rut = '$rut' ");

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