<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escritorio extends CI_Controller {

	function __construct(){

		parent::__construct();     
                $this->load->library('session');
                            
                		
		
        }
	
	
	public function index()
	{

		$menu['escritorio']='active';
                $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('escritorio/index');
        	$this->load->view('templates/footer');
	}
        
 

    
}