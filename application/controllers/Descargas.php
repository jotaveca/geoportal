<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descargas extends CI_Controller {

	function __construct(){

		parent::__construct();     
                $this->load->library('session');
            if(empty($this->session->userdata("id")))
            {
                   redirect(site_url().'/login/index','refresh');
            }             
             		
		
        }
	
	
	
	public function list()
	{

            $menu['admin']='active';
            $menu['adm_descargas']='active'; 
            
            $this->load->model('Descarga_model');      
	    $datos['descargas'] = $this->Descarga_model->listar_monitor() ;        
                           

            $this->load->view('templates/header');
            $this->load->view('templates/menu', $menu);
            $this->load->view('descargas/list', $datos);
            $this->load->view('templates/footer');
	}
	
	
	
	
	

    
}