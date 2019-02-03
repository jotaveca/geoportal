<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Descarga_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t009_usuario_descarga')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
     public function listar_monitor(){  
            
            $query = $this->db->select('*')->from('v002_monitor_descarga')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
    public function buscar_x_id($id){       
       
	  $parametros = array('id' => $id);
        $query = $this->db->select('*')->from('t009_usuario_descarga')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
        
    }
    
     public function existe($id_usuario){

            $parametros = array('id_usuario' => $id_usuario);

            $query = $this->db->select('id_usuario')->from('t009_usuario_descarga')
                    ->where($parametros)                    
                    ->get();
           
            return $query->num_rows();
           
    }
      
      public function eliminar ($id_proyecto){

      $this->db->where('id', $id_proyecto);
      $this->db->delete('t009_usuario_descarga');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }
    
    
    public function getRealIP(){

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    } 
        
      
   /*
  * Guarda 
 */
    public function guardar($datos)
    {
         
            $datos['ip_descarga']=  $this->getRealIP();  
            
            $this->db->insert('t009_usuario_descarga', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
       
    } 

 

    
}

