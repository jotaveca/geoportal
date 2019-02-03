<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t007_actividades')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
    public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
        $query = $this->db->select('*')->from('t007_actividades')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
        
    }
    
      public function buscar_x_id_proyecto($id_proyecto){       
       
	  $parametros = array('id_proyecto' => $id_proyecto);
        $query = $this->db->select('*')->from('t007_actividades')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
        
    }
    
      public function eliminar ($id_actividad){

      $this->db->where('id', $id_actividad);
      $this->db->delete('t007_actividades');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }
    
   /*
 * Método para validar si existe una registro en la BD
 */
    public function existe_guardar($id){

            $query = $this->db->select('id')->from('t007_actividades')
                    ->where('id', $id)                    
                    ->get();
              

            if ($query->num_rows() > 0)
                 return TRUE;
            else
                 return FALSE;
    } 
    
    
    
      
   /*
 * Guarda una usuario
 */
    public function guardar($datos)
    {
        
                  $this->db->insert('t007_actividades', $datos);
                 $lastid = $this->db->insert_id();
                 return $lastid;
                
        

    } 

 

    
}

