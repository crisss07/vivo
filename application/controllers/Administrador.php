<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

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
		$this->load->view('crud/header');	
		$data['datos'] = $this->Administrador_model->getData();	
		$this->load->view('crud/Administracion',$data);		
		$this->load->view('crud/footer');
	}

	public function nuevo($id=null)
	{
		
	}

	public function create()
	{
		$datos = $this->input->post();
		if(isset($datos))
		{
			$data = array(

            //'codcatas' => $this->input->post('cod_catastral'), //input
            'descripcion' => $this->input->post('descripcion'), //input
            'ciudad' => $this->input->post('ciudad'), //crear
            'valor' => $this->input->post('valor'),
        );
			$this->db->insert('condominio', $data);
			redirect(base_url() . 'Administrador');

		}
		else {
            redirect(base_url());
        }
	}
}
