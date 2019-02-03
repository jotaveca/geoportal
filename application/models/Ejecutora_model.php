<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ejecutora_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t003_entidad_ejecutora')->get();    
             $result = $query->result_array();                     
            return $result;
    }

     
    public function modificar($id, $datos){
 
                

          $this->db->where('id', $id);                                    
          $this->db->update('t003_entidad_ejecutora', $datos);
          //echo $this->db->last_query();

           return ($this->db->affected_rows() != 1) ? false : true; 

    } 
    
 
    public function existe($tx_ruc){

            $parametros = array('tx_ruc' => $tx_ruc);

            $query = $this->db->select('id')->from('t003_entidad_ejecutora')
                    ->where($parametros)                    
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
 
        //if($this->existe($tx_siglas) == TRUE){   
        //        return false;
        //}else{
            $this->db->insert('t003_entidad_ejecutora', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
        //}

    }


    
}

