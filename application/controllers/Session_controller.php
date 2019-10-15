<?php 
   class Session_controller extends CI_Controller {
	
      public function index() { 
         //loading session library 
         $this->load->library('session');
			
         //adding data to session 
         $this->session->set_userdata('logued_in',TRUE);
         var_dump($this->session->userdata('logued_in'));
         exit;
			
         $this->load->view('session_view'); 
      } 
		
      public function unset_session_data() { 
         //loading session library
         $this->load->library('session');
			
         //removing session data 
         $this->session->unset_userdata('name'); 
         $this->load->view('session_view'); 
      } 
		
   } 
?>