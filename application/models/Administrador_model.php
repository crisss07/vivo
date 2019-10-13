<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {

	
	
	public function __construct()
	{
		parent::__construct();
	}


	function getData() {
        
        $query = $this->db->get('condominio');
        return $query->result();
    }

    
}
