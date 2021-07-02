<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Ingredientes_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos el ingrediente
            public function create_product($data)
           {
               return $this->db->insert('ingredientes', $data);
           }
           //Editamos el ingrediente
            public function update_ingrediente($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('ingredientes', $data_update);
           }

           //Obtenemos todos los ingredientes
           public function IngredientesTodos()
           {
                $query = $this->db->query(" SELECT *  FROM ingredientes");

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
           public function IngredientesProducto($numero_producto)
           {
                $query = $this->db->query(" SELECT p.id AS id_producto,p.nombre AS nombre_producto,p.barra,p.stock,p.imagen,p.categoria,p.informacion,p.mostrar,p.mostrar_pagina,p.hora_inicio_hh
                  ,p.hora_termino_hh,p.promo_bebestible,p.promo_comida,p.codigo_producto,p.para_delivery,dpi.valor,i.nombre AS nombre_ingrediente
                  ,c.nombre AS nombre_categoria

                   FROM productos AS p
                  INNER JOIN detalle_productos AS dp
                  ON dp.numero_producto = p.numero_producto
                  LEFT JOIN detalle_producto_ingrediente AS dpi
                  ON dpi.numero_producto = p.numero_producto
                  INNER JOIN categorias AS c
                  ON c.id = p.categoria
                  INNER JOIN ingredientes AS i
                  ON i.id = dpi.ingrediente WHERE p.numero_producto = '$numero_producto'
                  GROUP BY dpi.id
                  ");

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