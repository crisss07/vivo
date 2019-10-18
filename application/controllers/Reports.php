<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        //$this->load->model("Prueba_model");
     
        $this->load->helper('url');
  

    }

    public function index()
    {
        redirect(base_url() );        
    }

    public function pdf($id=null)    
    {
              
        date_default_timezone_set('America/La_Paz');
        // Define key-value array
        $days_dias = array(
        'Monday'=>'Lunes',
        'Tuesday'=>'Martes',
        'Wednesday'=>'Miércoles',
        'Thursday'=>'Jueves',
        'Friday'=>'Viernes',
        'Saturday'=>'Sábado',
        'Sunday'=>'Domingo'
        );
        $mes=date('F');

        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";

      
      

        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');   

        $data['datos_certificado']=$this->db->query("SELECT * from beneficiario WHERE id=$id")->row();



        /*la fecha del informe*/
     


        /*dia literal*/
       /* $fecha_inf= $this->db->query("SELECT fecha_informe FROM tramite.informe_tecnico 
            WHERE informe_tecnico_id=$id")->row();
        $fecha=$fecha_inf->fecha_informe;
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia_infor = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
        $data['dia_linf']=$nombredia;*/


        $this->load->view('reports/reporte',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

            
     


        
    }     


   
    


    function valorEnLetras($x)
    {
    if ($x<0) { $signo = "menos ";}
    else      { $signo = "";}
    $x = abs ($x);
    $C1 = $x;

    $G6 = floor($x/(1000000));  // 7 y mas

    $E7 = floor($x/(100000));
    $G7 = $E7-$G6*10;   // 6

    $E8 = floor($x/1000);
    $G8 = $E8-$E7*100;   // 5 y 4

    $E9 = floor($x/100);
    $G9 = $E9-$E8*10;  //  3

    $E10 = floor($x);
    $G10 = $E10-$E9*100;  // 2 y 1


    $G11 = round(($x-$E10)*100,0);  // Decimales
    //////////////////////
    $H6 = $this->Prueba_model->unidades($G6);

    if($G7==1 AND $G8==0) { $H7 = "Cien "; }
    else {    $H7 = $this->Prueba_model->decenas($G7); }

    $H8 = $this->Prueba_model->unidades($G8);

    if($G9==1 AND $G10==0) { $H9 = "Cien "; }
    else {    $H9 = $this->Prueba_model->decenas($G9); }

    $H10 = $this->Prueba_model->unidades($G10);

    if($G11 < 10) { $H11 = "0".$G11; }
    else { $H11 = $G11; }

    /////////////////////////////
        if($G6==0) { $I6=" "; }
    elseif($G6==1) { $I6="Millón "; }
             else { $I6="Millones "; }
             
    if ($G8==0 AND $G7==0) { $I8=" "; }
             else { $I8="Mil "; }
             
    $I10 = "Pesos ";
    $I11 = "/100 BOLIVIANOS ";
    // $C3 = $signo.$H6.$I6.$H7.$H8.$I8.$H9.$H10.$I10.$H11.$I11;
    $C3 = $signo.$H6.$I6.$H7.$H8.$I8.$H9.$H10.$H11.$I11;
    $str = strtoupper($C3);
    // echo $str;
    return $str; //Retornar el resultado

    }
 



}
