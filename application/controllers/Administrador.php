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
		$precio = $this->input->post('valor');

		if(isset($datos))
		{
			$montos_cuota = $this->calcula_cuota_mes($precio, 0.0045, 300);
			//var_dump($montos_cuota);
			//exit;

			
				$a=$montos_cuota['cuota'];
				$b=$montos_cuota['sueldo_ideal'];				
		

			$data = array(            
            'descripcion' => $this->input->post('descripcion'), //input
            'ciudad' => $this->input->post('ciudad'), //crear
            'valor' => $this->input->post('valor'),
            'disponible' => $this->input->post('disponible'),
            'superficie' => $this->input->post('superficie'),
            'cuota_mensual' =>$a ,
            'sueldo_prom' => $b,
        );
			$this->db->insert('condominio', $data);
			redirect(base_url() . 'Administrador');
		}
		else {
			redirect(base_url());
		}
	}
	public function update()
	{
		$datos = $this->input->post();
		if(isset($datos))
		{
			$precio = $this->input->post('valor_e');
			$montos_cuota = $this->calcula_cuota_mes($precio, 0.0045, 300);
			//var_dump($montos_cuota);
			//exit;

			
				$a=$montos_cuota['cuota'];
				$b=$montos_cuota['sueldo_ideal'];	
			$id = $this->input->post('id_e'); //input
			$data = array(            
            'descripcion' => $this->input->post('descripcion_e'), //input
            'ciudad' => $this->input->post('ciudad_e'), //crear
            'valor' => $this->input->post('valor_e'),
            'disponible' => $this->input->post('disponible_e'),
            'superficie' => $this->input->post('superficie_e'),
            'cuota_mensual' =>$a ,
            'sueldo_prom' => $b,
        );

			$this->db->where('id', $id);
			$this->db->update('condominio', $data);

			redirect(base_url() . 'Administrador');

		}
		else {
			redirect(base_url());
		}
	}

	public function delete($id=null)
	{
		$this->db->delete('condominio', array('id' => $id));
		redirect(base_url() . 'Administrador');
	}
	function calcula_cuota_mes($monto_prestamo = null, $porcentaje = null, $cuotas = null)
	{
		// $montos_cuota = $this->calcula_cuota_mes(208800, 0.0045, 300);
		// $valor = 208800*((0,0045*(1+0,0045)^300)/((1+0,0045)^300-1))
		$cuota_mensual = $monto_prestamo * (($porcentaje * pow((1 + $porcentaje), $cuotas)) / (pow((1 + $porcentaje), $cuotas) - 1));
		$porcentaje_ajuste = $cuota_mensual*0.01;
		$monto_ajustado = $cuota_mensual + $porcentaje_ajuste;
		$monto_redondeado = round($monto_ajustado, 2);

		$seguro_incendio = $monto_prestamo*0.00015;
		$cuota_total = $monto_redondeado + $seguro_incendio;//insertar

		$sueldo_ideal = round($cuota_total/0.4, 2);

		$resultados['cuota'] = $monto_redondeado;
		$resultados['seguro'] = $seguro_incendio;
		$resultados['cuota_total'] = $cuota_total;
		$resultados['sueldo_ideal'] = $sueldo_ideal;
		// vdebug($sueldo_ideal, true, false, true);
		return $resultados;
	}
}
