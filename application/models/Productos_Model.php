<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Productos_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el producto
            public function crear_producto($data)
           {
               return $this->db->insert('productos', $data);
           }
            public function crear_detalle_producto($data)
           {
               $this->db->insert('detalle_productos', $data);
               return $this->db->insert_id('detalle_productos', $data);
           }
            public function crear_detalle_ingrediente_producto($data)
           {
               return $this->db->insert('detalle_producto_ingrediente', $data);

           }
           //Editamos el producto
            public function actualizar_producto($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('productos', $data_update);
           }
           public function actualizar_detalle_producto($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('detalle_productos', $data_update);
           }

             public function borrar_detalle_producto($data_update,$id)
           {
              $this->db->where('numero_producto',$id);
               return $this->db->update('detalle_productos', $data_update);
           }
            public function actualizar_producto_np($data_update,$numero_producto)
           {
              $this->db->where('numero_producto',$numero_producto);
               return $this->db->update('productos', $data_update);
           }
           public function ver_producto_codigo($codigo)
           {
                $query = $this->db->query("SELECT * FROM productos WHERE codigo='$codigo'");

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
           public function VerificarCodigo($codigo)
           {
                $query = $this->db->query(" SELECT *  FROM productos WHERE codigo_producto = '$codigo' ");

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
           //Obtenemos todos los productos
           public function ProductosTodos()
           {
                $query = $this->db->query(" SELECT p.nombre AS nombre_producto,p.barra,p.stock,p.precio_venta,p.id,c.nombre,p.imagen,c.nombre AS nombre_categoria,p.numero_producto  FROM productos AS p LEFT JOIN categorias AS c ON p.categoria = c.id ");

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
           //Obtenemos todos los productos segun categoria
           public function TablaProductosCategoria($categoria)
           {
                if($categoria == 0)
                {
                  $query = $this->db->query(" SELECT p.nombre,p.barra,p.stock,p.precio_venta,p.id,c.nombre AS nombre_categoria,p.numero_producto  FROM productos AS p LEFT JOIN categorias AS c ON p.categoria = c.id  GROUP BY p.numero_producto ");
                }
                else
                {
                    $query = $this->db->query(" SELECT p.nombre,p.barra,p.stock,p.precio_venta,p.id,c.nombre AS nombre_categoria,p.numero_producto  FROM productos AS p LEFT JOIN categorias AS c ON p.categoria = c.id WHERE c.id = '$categoria' GROUP BY p.numero_producto ");
                }


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
           //obtenemos los datos del producto segun el id
           public function VerProductoId($id)
           {
                $query = $this->db->query("SELECT * FROM productos AS p LEFT JOIN categorias AS c ON p.categoria = c.id WHERE p.id='$id' ");

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
           public function VerDetalleProductoNumero($numero)
           {
                $query = $this->db->query("SELECT dp.nombre AS nombre_categoria_ingrediente,dp.repetible,dp.obligatorio,dp.minimo,dp.maximo,p.id AS id_producto,dp.id AS id_detalle_producto
                  FROM detalle_productos AS dp
                  INNER JOIN productos AS p
                  ON dp.numero_producto = p.numero_producto WHERE p.numero_producto = '$numero' ");

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
           public function VerProductoIngredienteNumero($numero)
           {
                $query = $this->db->query("SELECT dpi.numero_producto, i.nombre AS nombre_ingrediente,dpi.numero_detalle_producto,dpi.ingrediente,dpi.id AS id_detalle_producto_ingrediente,dpi.valor FROM detalle_producto_ingrediente AS dpi
                  INNER JOIN productos AS p
                  ON p.numero_producto = dpi.numero_producto
                  INNER JOIN ingredientes AS i
                  ON i.id = dpi.ingrediente  WHERE dpi.numero_producto  ='$numero' ");

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

           public function VerProductoNumero($numero_producto)
           {
               $query = $this->db->query("SELECT p.nombre,p.barra,p.stock,p.precio_venta,p.id,c.nombre AS nombre_categoria,p.numero_producto,c.id AS id_categoria,p.informacion,p.mostrar,p.es_happy,p.hora_inicio_hh,p.hora_termino_hh,p.precio_venta_hh,p.codigo_producto,p.para_delivery,p.mostrar_pagina,p.imagen,p.barra,p.numero_producto  FROM productos AS p LEFT JOIN categorias AS c ON p.categoria = c.id WHERE p.numero_producto='$numero_producto' ");
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