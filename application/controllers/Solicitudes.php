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

	function verifica_codigo()
	{
		
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
		$cuota_total = round(($monto_redondeado + $seguro_incendio), 2);

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
		$datos_credito = $this->db->get_where('credito', array('id'=>$idCredito))->row_array();
		$condominios = $this->db->get('condominio')->result_array();
		$condominio = $this->db->get_where('condominio', array('id'=>$datos_credito['condominio_id']))->row_array();
		$montos_cuota = $this->calcula_cuota_mes($condominio['valor'], 0.0045, 300);
		// vdebug($montos_cuota, true, false, true);
		
		$data['datos_credito']=$datos_credito;
		$data['condominios']=$condominios;
		$data['condominio']=$condominio;
		$data['cuota']=$montos_cuota;
		// $condominios = $this->db->get('condominio')->result();
		// $data['condominios']=$condominios;

		//alerta correo de usuario y nro de tramite
		$this->db->select("email");
		$email=$this->db->get_where('beneficiario', array('id'=>$datos_credito['beneficiario_id']))->row();
		$data['email']=$email->email;
		$data['nro_tramite']=$datos_credito['nro_tramite'];
		//fin alertas 
		
		$this->load->view('solicitudes/header');
		$this->load->view('solicitudes/inicia', $data);
		$this->load->view('admin/footer');
	}

	
	public function guarda()
	{
		$datos = $this->input->post();
		var_dump($datos);
		exit();
		$beneficiario_id = $datos['beneficiario_id'];
		$condominio_id = $datos['condominio_id'];

		// Sacar el id del Conyugue si es que lo tiene
		$conyu = $this->db->get_where('familiar', array('beneficiario_id' => $beneficiario_id, 'relacion' => 'conyugue'))->row();
		if ($conyu) {
			$conyuge_id = $conyu->id;
		}
		else{
			$conyuge_id = $datos['conyuge_id'];	
		}
		
		// Guardar los datos del padre 1 en la tabla Familiar
		$ci_padre_1 = $datos['padre_beneficiario_carnet_1'];
		if ($ci_padre_1) {
			$nombre_padre_1 = $datos['padre_beneficiario_nombre_1'];
			$ci_padre_1 = $datos['padre_beneficiario_carnet_1'];
			$array_padre1 = array(
				'beneficiario_id' => $beneficiario_id,
				'relacion' => 'padres beneficiario',
				'nombres' => $nombre_padre_1,
				'ci' => $ci_padre_1,
				'fec_nacimiento' => '1980-01-01'
			);
			$this->db->insert('familiar', $array_padre1);
			$id_padre_1 = $this->db->get_where('familiar', array('ci' => $ci_padre_1))->row();
			$papabeneficiario_id = $id_padre_1->id;
		}
		else{
			$papabeneficiario_id = $datos['papabeneficiario_id'];
		}

		// Guardar los datos del padre 2 en la tabla Familiar
		$ci_madre_2 = $datos['madre_beneficiario_carnet_2'];
		if ($ci_madre_2) {
			$nombre_madre_2 = $datos['madre_beneficiario_nombre_2'];
			$ci_madre_2 = $datos['madre_beneficiario_carnet_2'];
			$array_padre2 = array(
				'beneficiario_id' => $beneficiario_id,
				'relacion' => 'padres beneficiario',
				'nombres' => $nombre_madre_2,
				'ci' => $ci_madre_2,
				'fec_nacimiento' => '1980-01-01'
			);
			$this->db->insert('familiar', $array_padre2);
			$id_madre_2 = $this->db->get_where('familiar', array('ci' => $ci_madre_2))->row();
			$mamabeneficiario_id = $id_madre_2->id;
		}
		else{
			$mamabeneficiario_id = $datos['mamabeneficiario_id'];
		}

		// Guardar los datos del padre 3 en la tabla Familiar
		$ci_padre_3 = $datos['padre_beneficiario_carnet_3'];
		if ($ci_padre_3) {
			$nombre_padre_3 = $datos['padre_beneficiario_nombre_3'];
			$ci_padre_3 = $datos['padre_beneficiario_carnet_3'];
			$array_padre_3 = array(
				'beneficiario_id' => $beneficiario_id,
				'relacion' => 'padres conyugue',
				'nombres' => $nombre_padre_3,
				'ci' => $ci_padre_3,
				'fec_nacimiento' => '1980-01-01'
			);
			$this->db->insert('familiar', $array_padre_3);
			$id_padre_3 = $this->db->get_where('familiar', array('ci' => $ci_padre_3))->row();
			$papaconyugue_id = $id_padre_3->id;
		}
		else{
			$papaconyugue_id = $datos['papaconyugue_id'];
		}

		// Guardar los datos del padre 3 en la tabla Familiar
		$ci_madre_4 = $datos['madre_beneficiario_carnet_4'];
		if ($ci_madre_4) {
			$nombre_madre_4 = $datos['madre_beneficiario_nombre_4'];
			$ci_madre_4 = $datos['madre_beneficiario_carnet_4'];
			$array_madre_4 = array(
				'beneficiario_id' => $beneficiario_id,
				'relacion' => 'padres conyugue',
				'nombres' => $nombre_madre_4,
				'ci' => $ci_madre_4,
				'fec_nacimiento' => '1980-01-01'
			);
			$this->db->insert('familiar', $array_madre_4);
			$id_madre_4 = $this->db->get_where('familiar', array('ci' => $ci_madre_4))->row();
			$mamaconyugue_id = $id_madre_4->id;
		}
		else{
			$mamaconyugue_id = $datos['mamaconyugue_id'];
		}
			$cred = $this->db->get_where('credito', array('beneficiario_id' => $beneficiario_id))->row();
			$ingreso_beneficiario = $cred->ingreso_mensual;
			$ingreso_conyugue = $cred->ingreso_conyugue;

			if ($datos['combo_1']) {
				$ipb = $datos['ingreso_bruto_1'];
				$tpb = $datos['combo_1'];
				$gpb = $datos['gastos_1'];
			}
			else{
				$ipb = $datos['monto_depedientes_1'];
				$tpb = 'Dependientes';
				$gpb = $datos['gastos_1'];
			}

			if ($datos['combo_2']) {
				$imb = $datos['ingreso_bruto_2'];
				$tmb = $datos['combo_2'];
				$gmb = $datos['gastos_2'];
			}
			else{
				$imb = $datos['monto_depedientes_2'];
				$tmb = 'Dependientes';
				$gmb = $datos['gastos_2'];
			}

			if ($datos['combo_3']) {
				$ipc = $datos['ingreso_bruto_3'];
				$tpc = $datos['combo_3'];
				$gpc = $datos['gastos_3'];
			}
			else{
				$ipc = $datos['monto_depedientes_3'];
				$tpc = 'Dependientes';
				$gpc = $datos['gastos_3'];
			}

			if ($datos['combo_4']) {
				$imc = $datos['ingreso_bruto_4'];
				$tmc = $datos['combo_4'];
				$gmc = $datos['gastos_4'];
			}
			else{
				$imc = $datos['monto_depedientes_4'];
				$tmc = 'Dependientes';
				$gmc = $datos['gastos_4'];
			}
			
			$interes = '5,5';
			$meses = '300';
			$montoss = $this->db->get_where('condominio', array('id' => $condominio_id))->row();
			$monto = $montoss->sueldo_prom;
			$fecha = date("Y-m-d");

			$array_total = array(
				'beneficiario_id' => $beneficiario_id,
				'condominio_id' => $condominio_id,
				'conyuge_id' => $conyuge_id,
				'papabeneficiario_id' => $papabeneficiario_id,
				'mamabeneficiario_id' => $mamabeneficiario_id,
				'papaconyugue_id' => $papaconyugue_id,
				'mamaconyugue_id' => $mamaconyugue_id,
				'ingreso_beneficiario' => $ingreso_beneficiario,
				'ingreso_conyugue' => $ingreso_conyugue,
				'ipb' => $ipb,
				'imb' => $imb,
				'ipc' => $ipc,
				'imc' => $imc,
				'tpb' => $tpb,
				'tmb' => $tmb,
				'tpc' => $tpc,
				'tmc' => $tmc,
				'gpb' => $gpb,
				'gmb' => $gmb,
				'gpc' => $gpc,
				'gmc' => $gmc,
				'interes' => $interes,
				'meses' => $meses,
				'monto' => $monto,
				'fecha' => $fecha
			);

		$this->db->insert('Solicitudes', $array_total);
		redirect(base_url() . 'Inicio');		

	}

}
