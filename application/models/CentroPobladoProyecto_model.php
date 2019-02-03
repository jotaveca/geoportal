<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CentroPobladoProyecto_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t008_proyecto_centro_poblado')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
        public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
         
         
        $query = $this->db->select('*')->from('t008_proyecto_centro_poblado')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
      
   /*
 * Guarda 
 */
    public function guardar($datos)
    {
        
            $this->db->insert('t008_proyecto_centro_poblado', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
       

    } 
    
     public function eliminar ($id_proyecto){

      $this->db->where('id_proyecto', $id_proyecto);
      $this->db->delete('t008_proyecto_centro_poblado');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }

 

    
}

