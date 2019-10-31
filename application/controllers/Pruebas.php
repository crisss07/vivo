<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper("url");
		$this->load->helper('form');
		$this->load->library('cart');
	}

	public function segip(){
		$ci = '9112739';
				
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

		$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
		// echo json_encode($respuesta);
		var_dump($respuesta);
	}

	


}

