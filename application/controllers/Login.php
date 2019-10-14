<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('session');
        // load url helper
		$this->load->helper('url');
			$this->load->helper('url_helper');
		$this->load->helper('vayes_helper');
		$this->load->model("usuario_model");
		//$this->load->model("logacceso_model");
	}

	public function index()
	{	
		$this->load->view('login/header');		
		$this->load->view('login/login');		
		$this->load->view('login/footer');		
	}

	public function login()
	{	
		$usuario = $this->input->post("usuario");
		$contrasena = $this->input->post("contrasenia");

		$contrasenia = md5($contrasena);
		//var_dump($contrasenia);
		//exit;
		
		$res = $this->usuario_model->login($usuario, $contrasenia);
		if (!$res) {
			redirect(base_url().'Login');
		}
		else{		
			$data = array(	
				'Login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url().'Administrador');
		}		
	}


	public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url().'Login');
	}

	

}

