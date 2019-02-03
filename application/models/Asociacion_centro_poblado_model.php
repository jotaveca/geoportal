<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asociacion_centro_poblado_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t013_asociacion_centro_poblado')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
        public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
         
         
        $query = $this->db->select('*')->from('t013_asociacion_centro_poblado')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
    
        public function buscar_x_asociacion($id_asociacion){       
       
	  $parametros = array('id_asociacion' => $id_asociacion);
         
         
        $query = $this->db->select('*')->from('v004_centro_poblado_asociacion')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
      
   /*
 * Guarda 
 */
    public function guardar($datos)
    {
        
            $this->db->insert('t013_asociacion_centro_poblado', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
       

    } 
    
     public function eliminar ($id_asociacion){

      $this->db->where('id_asociacion', $id_asociacion);
      $this->db->delete('t013_asociacion_centro_poblado');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }

     

    
}

