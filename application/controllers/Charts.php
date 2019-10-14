<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Administrador_model");
		$this->load->library('session');
		$this->load->helper('url_helper');
		$this->load->helper('vayes_helper');


	}
	public function index()
	{			
		if($this->session->userdata())
		{	
			$this->load->view('charts/headerp');	
			$data['datos'] = $this->Administrador_model->getData();	
			//$this->load->view('crud/menu');
			$this->load->view('charts/charts',$data);		
			$this->load->view('charts/footer');			
		}
		else{
			redirect(base_url() . 'Login');		
		}

	}	
}
