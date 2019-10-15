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

    function getConteo($dep) {
    	$this->db->select('Count(*) as x');
        $query = $this->db->get_where('beneficiario',array('departamento' => $dep));
        return $query->row();
    }

    
}
