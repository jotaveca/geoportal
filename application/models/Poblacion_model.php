<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Poblacion_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('centros_poblados')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
        public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
         
         
        $query = $this->db->select('*')->from('centros_poblados')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
    public function buscar_x_cod($codcp){       
       
	  $parametros = array('codcp' => $codcp);
         
         
        $query = $this->db->select('*')->from('centros_poblados')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
      public function listar_x_region_provincia_distrito($region, $provincia, $distrito){  
         
      
       $array = array('dep' => trim($region), 'prov' => trim($provincia), 'dist' => trim($distrito));
       $this->db->select('codcp, nomcp');
       $this->db->from('centros_poblados');
       $this->db->like($array);
       $query = $this->db->get();
       //echo $this->db->last_query();
       return $query->result_array();
        
    }
    
      public function listar_x_region_provincia($region, $provincia){  
         
      
       $array = array('dep' => trim($region), 'prov' => trim($provincia));
       $this->db->select('codcp, nomcp, xgd, ygd');
       $this->db->from('centros_poblados');
       $this->db->like($array);
       $query = $this->db->get();
       //echo $this->db->last_query();
       return $query->result_array();
        
    }

     

 

    
}

