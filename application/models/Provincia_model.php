<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('provinces')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
        public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
         
         
        $query = $this->db->select('*')->from('provinces')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
    
      public function listar_x_region($region_id){  
         
      $parametros = array('region_id' => $region_id);
        
      $this->db->select('provinces.id, provinces.name');
      $this->db->from('provinces'); 
      $this->db->where($parametros);
      $this->db->order_by("provinces.name", "ASC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result_array();
        
    }

     

 

    
}

