<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Distrito_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('districts')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
        public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
         
         
        $query = $this->db->select('*')->from('districts')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
      public function listar_x_provincia_region($region_id, $province_id){  
         
      $parametros = array('districts.region_id' => $region_id, 'districts.province_id' => $province_id);
        
      $this->db->select('districts.id, districts.name');
      $this->db->from('districts'); 
      $this->db->where($parametros);
      $this->db->order_by("districts.name", "ASC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result_array();
        
    }

     

 

    
}

