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
		// $this->db->where()
		//$this->db->where('ci', $ci);
		// print_r($ci);
		//  print_r($verifica_cod->result());die;
		// if (count($verifica_cod) > 0) {
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
		if ($caso == 2) {
			$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
			echo json_encode($respuesta);
		}else{
			$respuesta = array('ci'=>$ci, 'estado'=>'no');
			echo json_encode($respuesta);
		}	
	}

	public function update(){   
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $persona_id = $this->input->post('persona_id');
	    $nombres = $this->input->post('nombres');
	    $paterno = $this->input->post('paterno');
	    $materno = $this->input->post('materno');
	    $ci = $this->input->post('ci');
	    $fec_nacimiento = $this->input->post('fec_nacimiento');
	   // var_dump($zonaurb_id);
	    $actualizar = $this->Persona_model->actualizar($persona_id, $nombres, $paterno, $materno, $ci, $fec_nacimiento);
	  	redirect();
	}

	public function ajax_verifica_cedula(){
		$ci = $this->input->get("param1");
		$verifica_cod = $this->Persona_model->buscaci($ci);
		if ($verifica_cod) {
			$respuesta = array('ci'=>$ci, 'nombres' => $verifica_cod->nombres, 'paterno' => $verifica_cod->paterno, 'materno' => $verifica_cod->materno, 'estado'=>'si', 'solicitante_id'=>$verifica_cod->persona_id);
			echo json_encode($respuesta);
		}else{
			$TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhNzAzYTlhZjcxZDY0NDMzOWJiNDM3ODEyYjIwODY0MyJ9.KAXS_8G3BznwFBR0dLZHfVQc2LkZI5fiTK6TN-meAZ4';
			$CURL = curl_init('https://ws.agetic.gob.bo/segip/v2/personas/'.$ci);
			// nuevo URL
			//$CURL = curl_init('https://ws.agetic.gob.bo/segip/v3/personas/'.$paramnumero.'?fechaNacimiento='.$paramfecha);
			// Devuelve los datos / resultados como una cadena en lugar de datos sin procesar
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
			// Una buena práctica para que la gente sepa quién está accediendo a sus servidores. Ver https://en.wikipedia.org/wiki/User_agent
			//curl_setopt($CURL, CURLOPT_USERAGENT, 'YourScript/0.1 (contact@email)');
			// Establezca sus encabezados de autenticación
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
			    'Content-Type: application/json',
			    'Authorization: Bearer '.$TOKEN
			));
			
			// Obtener datos / resultados codificados Ver CURLOPT_RETURNTRANSFER
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
			if ($caso == 2) {
				$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
				echo json_encode($respuesta);
			}else{
				$respuesta = array('ci'=>$ci, 'estado'=>'no');
				echo json_encode($respuesta);
			}	
		}	
	}

	
}

