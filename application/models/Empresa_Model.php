<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Empresa_Model extends CI_Model
    {
           public function __construct()
           {
                parent::__construct();
           }
             function InsertDatosEmpresa($Data)
	 {
	 return $this->db->insert('empresa', $Data);
	 }
	  function UpdateDatosEmpresa($Data)
	 {
	 return $this->db->update('empresa', $Data);
	 }
      }