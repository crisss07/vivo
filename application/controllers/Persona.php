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
	

	public function insertar()
	{
			$datos = $this->input->post();
			
			// var_dump($fec_nacimiento);
			
			if(isset($datos))
			{
				$fec_naci = $datos['fec_nacimiento'];
				$partes = explode("/", $fec_naci); 
				$dia = $partes[0];
				$mes = $partes[1];
				$ano = $partes[2];
				$fec_nacimiento = $ano.'-'.$mes.'-'.$dia;
				// DATOS DEL BENEFICIARIO
				$condominio_id = $datos['condominio_id'];
				$ci = $datos['ci'];
				$nombres = $datos['nombres'];
				$paterno = $datos['paterno'];
				$materno = $datos['materno'];
				$direccion = $datos['direccion'];
				$departamento = $datos['departamento'];
				$telefono_celular = $datos['telefono_celular'];
				$email = $datos['email'];

				$array = array(
					'condominio_id' =>$condominio_id,
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
				$partes_c = explode("/", $fec_naci_c); 
				$dia_c = $partes_c[0];
				$mes_c = $partes_c[1];
				$ano_c = $partes_c[2];
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
				$this->db->insert('familiar', $array1);


				redirect('inicio');
			}

	}
}

