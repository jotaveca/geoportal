<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Financiera_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t004_entidad_financiera')->get();    
             $result = $query->result_array();                     
            return $result;
    }

     
   public function modificar($id, $datos){
 
                

          $this->db->where('id', $id);                                    
          $this->db->update('t004_entidad_financiera', $datos);
          //echo $this->db->last_query();

           return ($this->db->affected_rows() != 1) ? false : true; 

    } 
 
    public function existe($tx_ruc){

            $parametros = array('tx_ruc' => $tx_ruc);

            $query = $this->db->select('id')->from('t004_entidad_financiera')
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
            $this->db->insert('t004_entidad_financiera', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
        //}

    }


    
}

