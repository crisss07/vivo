<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculo extends CI_Controller {

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
	public function index()
	{
		redirect(base_url() . 'inicio');
	}
	public function nuevo($id=null)
	{
		$this->load->view('form_calculo/header');
		$data['beneficiario_id'] = $id;
		$this->load->view('form_calculo/calculo', $data);
		
		$this->load->view('form_calculo/footer');
	}
	public function create()
	{
		$datos = $this->input->post();
		if(isset($datos))
		{
			$data = array(

            //'codcatas' => $this->input->post('cod_catastral'), //input
            'beneficiario_id' => $this->input->post('beneficiario_id'), //input
            'ingreso_mensual' => $this->input->post('ingreso_mensual'), //crear
            'ingreso_conyugue' => $this->input->post('ingreso_conyugue'),
            'deuda' => $this->input->post('deuda'),
            'deuda_banco' => $this->input->post('deuda_banco'),
            'alquiler' => $this->input->post('alquiler'),
            'pago_alquiler' => $this->input->post('pago_alquiler'),
            'miembros' => $this->input->post('miembros'), //validar
            'aporte' => $this->input->post('aporte'),
            'aporte_beneficiario' => $this->input->post('aporte_beneficiario'),
            'casado' => $this->input->post('casado'),
            'prestamo' => 0,
            'cuota_mensual' => 0,
            //'activo' => '1',
        );
			$this->db->insert('credito', $data);
			redirect(base_url() . 'Calculo/nuevo/' . $this->input->post('beneficiario_id'));

		}
		else {
            redirect(base_url());
        }
	}
}
