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
		if($this->session->userdata('is_logged'))
		{	
		$persona = $this->db->get('beneficiario')->result();
		$data['persona']=$persona;
		$this->load->view('crud/headerp');	
		$this->load->view('crud/adminitrar_personas',$data);		
		$this->load->view('crud/footer');
		}
		else{
			redirect(base_url() . 'Login');	
		}



		
	}


	public function delete($id=null)
	{
			if($this->session->userdata('is_logged'))
		{	
			$this->db->delete('familiar', array('beneficiario_id' => $id));
		$this->db->delete('beneficiario', array('id' => $id));
		redirect(base_url() . 'Administrador_Persona');
		}
		else{
			redirect(base_url() . 'Login');	
		}
		
	}

	public function consulta()
	{
			$ci = $this->input->get("param1");
			$be = $this->db->get_where('solicitudes', array('beneficiario_id' => $ci))->row();
			$con = $this->db->get_where('condominio', array('id' => $be->condominio_id))->row();

			$respuesta = array('ci'=>$ci, 'ingreso_beneficiario'=>$be->ingreso_beneficiario, 'ingreso_conyugue'=>$be->ingreso_conyugue, 'ipb'=>$be->ipb, 'imb'=>$be->imb, 'ipc'=>$be->ipc, 'imc'=>$be->imc, 'monto_total'=>$be->monto_total, 'descripcion'=>$con->descripcion, 'ciudad'=>$con->ciudad, 'valor'=>$con->valor, 'cuota_mensual'=>$con->cuota_mensual, 'sueldo_prom'=>$con->sueldo_prom);
			echo json_encode($respuesta);

		
	}
}
