<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

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
        $this->load->helper('vayes_helper');
    }

	public function index()
	{
		$condominios = $this->db->get('condominio')->result();
		$data['condominios']=$condominios;
		$this->load->view('admin/header');
		$this->load->view('principal', $data);
		
		// $this->load->view('admin/menu');
		$this->load->view('admin/footer');
       
	}

	public function inicia($idCredito = null)
	{
		// echo 'Holas desde php';
		$datos_credito = $this->db->get_where('credito', array('id'=>$idCredito))->row_array();
		// vdebug($datos_credito, false, false, true);
		$data['datos_credito']=$datos_credito;
		// $condominios = $this->db->get('condominio')->result();
		// $data['condominios']=$condominios;
		$this->load->view('admin/header');
		$this->load->view('solicitudes/principal', $data);

	}

}
