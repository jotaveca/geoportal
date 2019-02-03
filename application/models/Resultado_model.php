<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Resultado_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t006_resultados')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
    public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
        $query = $this->db->select('*')->from('t006_resultados')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
        
    }
    
      public function buscar_x_id_proyecto($id_proyecto){       
       
	  $parametros = array('id_proyecto' => $id_proyecto);
        $query = $this->db->select('*')->from('t006_resultados')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
        
    }
    
      public function eliminar ($id_proyecto){

      $this->db->where('id_proyecto', $id_proyecto);
      $this->db->delete('t006_resultados');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }
    
    
      
   /*
 * Guarda una usuario
 */
    public function guardar($datos)
    {
        
            $this->db->insert('t006_resultados', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
       

    } 

 

    
}

