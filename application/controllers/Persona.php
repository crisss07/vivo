<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper("url");
		$this->load->helper('form');
		$this->load->library('cart');
	}

	public function ajax_verifica(){
		$ci = $this->input->get("param1");
		// $verifica = $this->db->get_where('beneficiario', array('ci' => $ci))->row();
		$verifica = $this->db->query("SELECT be.*, fa.*
										FROM beneficiario be, familiar fa
										WHERE be.ci = '$ci' 
										OR fa.ci = '$ci'")->row();

		if ($verifica) {
			$respuesta = array('ci'=>$ci, 'mensaje'=>'Usted ya esta registrado', 'estado'=>'registrado');
			echo json_encode($respuesta);
		}
		else
		{
				
				$TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhNzAzYTlhZjcxZDY0NDMzOWJiNDM3ODEyYjIwODY0MyJ9.KAXS_8G3BznwFBR0dLZHfVQc2LkZI5fiTK6TN-meAZ4';
				$CURL = curl_init('https://ws.agetic.gob.bo/segip/v2/personas/'.$ci);
				
				curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
				
				curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
				    'Content-Type: application/json',
				    'Authorization: Bearer '.$TOKEN
				));
				
				$dataSEGIP = curl_exec($CURL);
				// Obtener información sobre la solicitud
				$infoSEGIP = curl_getinfo($CURL);
				// Cierre el recurso curl para liberar recursos del sistema
				curl_close($CURL);

				$arraySEGIPN0 = json_decode($dataSEGIP, true);
				$arraySEGIPN1 = $arraySEGIPN0['ConsultaDatoPersonaEnJsonResult'];
				$arraySEGIPN2 = $arraySEGIPN1['DatosPersonaEnFormatoJson'];
				$datos_persona = json_decode($arraySEGIPN2, true);
				$caso = $arraySEGIPN1['CodigoRespuesta'];

				

				// fecha de nacimiento
				$minimo = '18';
				$maximo = '29';

				$fecha = $datos_persona['FechaNacimiento'];
				$partes_c = explode("/", $fecha); 
				$dia_c = $partes_c[0];
				$mes_c = $partes_c[1];
				$ano_c = $partes_c[2];
				$fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;

				// $fecha = $datos_persona['FechaNacimiento'];
				// $dia_c = substr($fec_naci_c, 0, -8);  // devuelve "cde"
				// $mes_c = substr($fec_naci_c, 3, -5);  // devuelve "cde"
				// $ano_c = substr($fec_naci_c, 6);
				// // $fec_nacimiento = $ano.'-'.$mes.'-'.$dia;
				// $fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;


				$fec = $this->db->query("SELECT tmp.*
										FROM (SELECT TIMESTAMPDIFF(YEAR,'$fec_nacimiento_c',CURDATE()) AS edad)tmp
										WHERE tmp.edad BETWEEN '$minimo' AND '$maximo'")->row();

				if ($fec) {
					$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
							echo json_encode($respuesta);
				}
				else{
					$respuesta = array('ci'=>$ci, 'fecha'=>$fecha, 'mensaje'=>'Usted ya esta registrado', 'estado'=>'noEdad');
					echo json_encode($respuesta);
				}
		
		}

		
				
	}

	public function ajax_veri(){
		$ci = $this->input->get("param1");
		// $verifica = $this->db->get_where('beneficiario', array('ci' => $ci))->row();
			
		$TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhNzAzYTlhZjcxZDY0NDMzOWJiNDM3ODEyYjIwODY0MyJ9.KAXS_8G3BznwFBR0dLZHfVQc2LkZI5fiTK6TN-meAZ4';
		$CURL = curl_init('https://ws.agetic.gob.bo/segip/v2/personas/'.$ci);
		
		curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
		
		curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Authorization: Bearer '.$TOKEN
		));
		
		$dataSEGIP = curl_exec($CURL);
		// Obtener información sobre la solicitud
		$infoSEGIP = curl_getinfo($CURL);
		// Cierre el recurso curl para liberar recursos del sistema
		curl_close($CURL);

		$arraySEGIPN0 = json_decode($dataSEGIP, true);
		$arraySEGIPN1 = $arraySEGIPN0['ConsultaDatoPersonaEnJsonResult'];
		$arraySEGIPN2 = $arraySEGIPN1['DatosPersonaEnFormatoJson'];
		$datos_persona = json_decode($arraySEGIPN2, true);
		$caso = $arraySEGIPN1['CodigoRespuesta'];

		

		// fecha de nacimiento
		$minimo = '18';
		$maximo = '29';

		$fecha = $datos_persona['FechaNacimiento'];
		$partes_c = explode("/", $fecha); 
		$dia_c = $partes_c[0];
		$mes_c = $partes_c[1];
		$ano_c = $partes_c[2];
		$fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;


		// $fecha = $datos_persona['FechaNacimiento'];
		// $dia_c = substr($fec_naci_c, 0, -8);  // devuelve "cde"
		// $mes_c = substr($fec_naci_c, 3, -5);  // devuelve "cde"
		// $ano_c = substr($fec_naci_c, 6);
		// // $fec_nacimiento = $ano.'-'.$mes.'-'.$dia;
		// $fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;

		if ($fecha) {
			$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
					echo json_encode($respuesta);
		}
		else{
			$respuesta = array('ci'=>$ci, 'fecha'=>$fecha, 'mensaje'=>'Usted ya esta registrado', 'estado'=>'noEdad');
			echo json_encode($respuesta);
		}


		
				
	}
	

	public function insertar()
	{
			$datos = $this->input->post();
			// var_dump($fec_nacimiento);
			$departamento = $datos['departamento'];
			$condominio_id = $datos['condominio_id'];

			if ($condominio_id == 'otro') {
				// INSERTAR EL condominio
				$precio = $this->input->post('valor');
				$montos_cuota = $this->calcula_cuota_mes($precio, 0.0045, 300);
				$a=$montos_cuota['cuota_total'];
				$b=$montos_cuota['sueldo_ideal'];				
				$data = array(            
	            'descripcion' => $this->input->post('descripcion'), //input
		    	'direccion' => $this->input->post('direccion_c'),
		   		'privado' => 'Si',			
	            'ciudad' => $departamento, //crear
	            'valor' => $this->input->post('valor'),
	            'disponible' => 1,
	            'superficie' => $this->input->post('superficie'),
	            'cuota_mensual' =>$a ,
	            'sueldo_prom' => $b,
	      		  );
				$this->db->insert('condominio', $data);

				$id = $this->db->query("SELECT MAX(id) as max
									FROM condominio")->row();
				$con_id = $id->max;
				// HASTA AQUI
			}

			if(isset($datos))
			{

				if ($condominio_id == 'otro') {
					$id_condominio = $con_id;
				}
				else
				{
					$id_condominio = $datos['condominio_id'];
				}

				$fec_naci = $datos['fec_nacimiento'];
				
				$dia = substr($fec_naci, 0, -8);  // devuelve "cde"
				$mes = substr($fec_naci, 3, -5);  // devuelve "cde"
				$ano = substr($fec_naci, 6);
				$fec_nacimiento = $ano.'-'.$mes.'-'.$dia;
				
				// DATOS DEL BENEFICIARIO
				$ci = $datos['ci'];
				$nombres = $datos['nombres'];
				$paterno = $datos['paterno'];
				$materno = $datos['materno'];
				$direccion = $datos['direccion'];
				// $departamento = $datos['departamento'];
				$telefono_celular = $datos['telefono_celular'];
				$email = $datos['email'];

				$array = array(
					'condominio_id' =>$id_condominio,
					'fec_nacimiento' =>$fec_nacimiento,
					'ci' => $ci,
					'nombres' =>$nombres,
					'paterno' =>$paterno,
					'materno' =>$materno,
					'direccion' =>$direccion,
					'departamento' =>$departamento,
					'telefono_celular' =>$telefono_celular,
					'email' =>$email
					
					);
				$this->db->insert('beneficiario', $array);

				$verifica = $this->db->get_where('beneficiario', array('ci' => $ci))->row();
				// DATOS DEL CONYUGUE
				$fec_naci_c = $datos['fec_nacimiento_c'];
				$dia_c = substr($fec_naci_c, 0, -8);  // devuelve "cde"
				$mes_c = substr($fec_naci_c, 3, -5);  // devuelve "cde"
				$ano_c = substr($fec_naci_c, 6);
				// $fec_nacimiento = $ano.'-'.$mes.'-'.$dia;
				$fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;
				$beneficiario_id = $verifica->id;
				$relacion = 'conyugue';
				$ci_c = $datos['ci_c'];
				$nombres_c = $datos['nombres_c'];
				$paterno_c = $datos['paterno_c'];
				$materno_c = $datos['materno_c'];
				$telefono_celular_c = $datos['telefono_celular_c'];
				$email_c = $datos['email_c'];

				$array1 = array(
					'beneficiario_id' =>$beneficiario_id,
					'relacion' =>$relacion,
					'fec_nacimiento' =>$fec_nacimiento_c,
					'ci' => $ci_c,
					'nombres' =>$nombres_c,
					'paterno' =>$paterno_c,
					'materno' =>$materno_c,
					'telefono_celular' =>$telefono_celular_c,
					'email' =>$email_c
					
					);
				if ($ci_c) {
					$this->db->insert('familiar', $array1);
				}

				redirect('Calculo/nuevo/'.$beneficiario_id);
			}

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
		$cuota_total = round(($monto_redondeado + $seguro_incendio), 2);

		$sueldo_ideal = round($cuota_total/0.4, 2);

		$resultados['cuota'] = $monto_redondeado;
		$resultados['seguro'] = $seguro_incendio;
		$resultados['cuota_total'] = $cuota_total;
		$resultados['sueldo_ideal'] = $sueldo_ideal;
		// vdebug($sueldo_ideal, true, false, true);
		return $resultados;
	}


}

