<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('regions')->get();    
             $result = $query->result_array();                     
            return $result;
    }

     

    public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
         
         
        $query = $this->db->select('*')->from('regions')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    public function existe($tx_ruc){

            $parametros = array('tx_ruc' => $tx_ruc);

            $query = $this->db->select('id')->from('regions')
                    ->where($parametros)                    
                    ->get();
              

            if ($query->num_rows() > 0)
                 return TRUE;
            else
                 return FALSE;
    }


    
}

