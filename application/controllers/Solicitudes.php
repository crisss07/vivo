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
	
	function calcula_cuota_mes($monto_prestamo = null, $porcentaje = null, $cuotas = null)
	{
		// $montos_cuota = $this->calcula_cuota_mes(208800, 0.0045, 300);
		// $valor = 208800*((0,0045*(1+0,0045)^300)/((1+0,0045)^300-1));
		$cuota_mensual = $monto_prestamo * (($porcentaje * pow((1 + $porcentaje), $cuotas)) / (pow((1 + $porcentaje), $cuotas) - 1));
		$porcentaje_ajuste = $cuota_mensual*0.01;
		$monto_ajustado = $cuota_mensual + $porcentaje_ajuste;
		$monto_redondeado = round($monto_ajustado, 2);

		$seguro_incendio = $monto_prestamo*0.00015;
		$cuota_total = $monto_redondeado + $seguro_incendio;

		$sueldo_ideal = round($cuota_total/0.4, 2);

		$resultados['cuota'] = $monto_redondeado;
		$resultados['seguro'] = $seguro_incendio;
		$resultados['cuota_total'] = $cuota_total;
		$resultados['sueldo_ideal'] = $sueldo_ideal;
	
		// vdebug($sueldo_ideal, true, false, true);
		return $resultados;
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
		$montos_cuota = $this->calcula_cuota_mes(208800, 0.0045, 300);
		// vdebug($cuota, true, false, true);
		$datos_credito = $this->db->get_where('credito', array('id'=>$idCredito))->row_array();
		$condominios = $this->db->get('condominio')->result_array();

		$data['datos_credito']=$datos_credito;
		$data['condominios']=$condominios;
		$data['cuota']=$montos_cuota;
		// $condominios = $this->db->get('condominio')->result();
		// $data['condominios']=$condominios;
		$this->load->view('admin/header');
		$this->load->view('solicitudes/inicia', $data);
		$this->load->view('admin/footer');


	}

}
