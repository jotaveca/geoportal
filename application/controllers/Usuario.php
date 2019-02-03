<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){

		parent::__construct();     
            $this->load->library('session');  
            $this->load->library('form_validation');
            if(empty($this->session->userdata("id")))
            {
                   redirect(site_url(),'refresh');
            }             
            if($this->session->userdata("rol")!= 'Administrador')
            {
                redirect(site_url(),'refresh');
            }      
                		
		
        }
	
	
	public function modificar_usuario_profesion(){

	
		
		$id_profesion =  $this->input->get('id_profesion');
		$tx_indicador =  $this->input->get('tx_indicador');

		$datos['id_profesion'] = $id_profesion;


		$this->load->model('Usuario_model');	
	    $resultado = $this->Usuario_model->modificar_x_indicador($tx_indicador,$datos) ;

				
		//print_r($perfiles);
		echo json_encode($resultado);

	    

	    


	}

    
}