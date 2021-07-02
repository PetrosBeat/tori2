<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Categoria_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
           //Creamos la categoria
            public function crear_categoria($data)
           {
               return $this->db->insert('categorias', $data);
           }
           //Editamos la categoria
            public function update_categoria($data_update,$id)
           {
              $this->db->where('id',$id);
               return $this->db->update('categorias', $data_update);
           }
            //Editamos la categoria de los productos
            public function update_categoria_productoo($data_update,$id)
           {
              $this->db->where('categoria',$id);
               return $this->db->update('productos', $data_update);
           }
           public function update_categoria_insumo($data_update,$id)
           {
              $this->db->where('categoria',$id);
               return $this->db->update('insumos', $data_update);
           }

           //Eliminamos la categoria
            public function delete_categoria($id)
           {
              $this->db->where('id',$id);
               return $this->db->delete('categorias');
           }
           //Obtenemos todos los categorias
           public function getCategorias()
           {
                $query = $this->db->query("SELECT * FROM categorias ORDER BY nombre asc");

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

           //obtenemos los datos dla categoria segun el id
           public function ver_categoria_codigo($id)
           {
                $query = $this->db->query("SELECT * FROM categorias WHERE id='$id' ORDER BY nombre asc");

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
           public function ver_categoria_nombre($nombre)
           {
                $query = $this->db->query("SELECT * FROM categorias WHERE nombre='$nombre' ORDER BY nombre asc");

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
             public function CategoriasLocal()
              {
                  $query = $this->db->query("SELECT * FROM categorias WHERE tipo=2 ORDER BY nombre DESC");
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