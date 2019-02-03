<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t002_roles')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
       
    
     
 

    
}

