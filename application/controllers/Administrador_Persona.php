<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_Persona extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Administrador_model");
        //$this->load->library('session');
        
        
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        
        
    }

	public function index()
	{
		$persona = $this->db->get('beneficiario')->result();
		$data['persona']=$persona;
		$this->load->view('crud/header');	
		$this->load->view('crud/adminitrar_personas',$data);		
		$this->load->view('crud/footer');
	}


	public function delete($id=null)
	{
		$this->db->delete('familiar', array('beneficiario_id' => $id));
		$this->db->delete('beneficiario', array('id' => $id));
		redirect(base_url() . 'Administrador_Persona');
	}
}
