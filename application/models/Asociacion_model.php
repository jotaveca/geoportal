<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asociacion_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct(); 
        
        $this->load->database();
        
         
         
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('t011_asociacion')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
    public function listar_x_usuario($id_usuario){  
            
             $parametros = array('id_usuario' => $id_usuario);    
             $query = $this->db->select('*')->from('t011_asociacion')
                    ->where($parametros)                    
                    ->get();
             $result = $query->result_array();                     
            return $result;
    }

    
	public function listar_asociaciones_x_mapa($id_asociacion){  
         
              if($id_asociacion == 0){
                  
               //$this->db->select('codcp, tx_nombre,tx_rubro, xgd, ygd')->from('v005_proyectos')->db->order_by("codcp", "asc")
                $query = $this->db->select('*')->from('v002_asociaciones')->order_by("codcp", "asc")
                ->get();
                  
              }else{
                  
                   $parametros = array('id_asociacion' => $id_asociacion);    
                
                $query = $this->db->select('*')->from('v002_asociaciones')
                    ->where($parametros)                    
                    ->get();                  
              }              

          return $query->result_array();
        
    	}
    	
    	public function listar_asociaciones_ofic_central_x_mapa($id_asociacion){  
         
              if($id_asociacion == 0){
                  
               //$this->db->select('codcp, tx_nombre,tx_rubro, xgd, ygd')->from('v005_proyectos')->db->order_by("codcp", "asc")
                $query = $this->db->select('*')->from('v010_asocioaciones_ofic_central')->order_by("codcp", "asc")
                ->get();
                  
              }else{
                  
                   $parametros = array('id_asociacion' => $id_asociacion);    
                
                $query = $this->db->select('*')->from('v010_asocioaciones_ofic_central')
                    ->where($parametros)                    
                    ->get();                  
              }              

          return $query->result_array();
        
    	}
    
    
       public function busqueda_x_detalle( $parametros){  
         
       $where = array();
      
       if($parametros['id_region'] != "" ){
        $where['id_region']= $parametros['id_region'];
      }
      
       if($parametros['id_provincia'] != ""){
        $where['id_provincia']= $parametros['id_provincia'];
      }
       if($parametros['id_distrito'] != ""){
        $where['id_distrito']= $parametros['id_distrito'];
      }
      
      if($parametros['tx_tipo'] != "Seleccione"){
        $where['tx_tipo']= $parametros['tx_tipo'];
      }
      
           
      
        $query = $this->db->select('*')->from('v002_asociaciones')
                    ->where($where)                    
                    ->get();

     
       //echo $this->db->last_query();
      return $query->result_array();
        
    }
    
    public function busqueda_x_detalle_ofic_central( $parametros){  
         
       $where = array();
      
       if($parametros['id_region'] != "" ){
        $where['id_region']= $parametros['id_region'];
      }
      
       if($parametros['id_provincia'] != ""){
        $where['id_provincia']= $parametros['id_provincia'];
      }
       if($parametros['id_distrito'] != ""){
        $where['id_distrito']= $parametros['id_distrito'];
      }
      
      if($parametros['tx_tipo'] != "Seleccione"){
        $where['tx_tipo']= $parametros['tx_tipo'];
      }
      
           
      
        $query = $this->db->select('*')->from('v010_asocioaciones_ofic_central')
                    ->where($where)                    
                    ->get();

     
       //echo $this->db->last_query();
      return $query->result_array();
        
    }
    
    

    

    public function modificar($id, $datos){                

          $this->db->where('id', $id);
          $this->db->update('t011_asociacion', $datos);
          //echo $this->db->last_query();

          return ($this->db->affected_rows() != 1) ? false : true; 

    }



    public function listar_x_id($id){  
         
      
         $parametros = array('id' => $id);    
                
        $query = $this->db->select('*')->from('v008_asociacion_detalle')
                    ->where($parametros)                    
                    ->get();
     
    //echo $this->db->last_query();
      return $query->result_array();
        
    }




    public function listar_centro_poblado_x_proyectos($id){  
           $parametros = array('id' => $id);    
                
        $query = $this->db->select('nomcp, codcp')->from('v009_asociaciones')
                    ->where($parametros)                    
                    ->get();

          return $query->result_array();
        
    }
    



    public function modificar_proyecto_asociacion($id, $datos){                

          $this->db->where('id', $id);                                    
          $this->db->update('t012_proyectos_asociacion', $datos);
          //echo $this->db->last_query();

          return ($this->db->affected_rows() != 1) ? false : true; 

    }
     

 
    public function existe($tx_siglas){

            $parametros = array('tx_siglas' => $tx_siglas);

            $query = $this->db->select('id')->from('t011_asociacion')
                    ->where($parametros)                    
                    ->get();
              

            if ($query->num_rows() > 0)
                 return TRUE;
            else
                 return FALSE;
    }

    


    public function eliminar_proyecto_asociacion ($id){

      $this->db->where('id', $id);
      $this->db->delete('t012_proyectos_asociacion');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }

    public function eliminar_asociacion ($id){

      $this->db->where('id', $id);
      $this->db->delete('t011_asociacion');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }
    
       
   
/*
 * Guarda una usuario
 */
    public function guardar($datos)
    {
 
        //$tx_siglas = $datos['tx_siglas'];
        //if($this->existe($tx_siglas) == TRUE){   
        //        return false;
        //}else{
            $this->db->insert('t011_asociacion', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
        //}

    }

    public function guardar_proyecto_asociacion($datos)
    {
 
        //$tx_siglas = $datos['tx_siglas'];
        //if($this->existe($tx_siglas) == TRUE){   
        //        return false;
        //}else{
            $this->db->insert('t012_proyectos_asociacion', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
        //}

    }

    public function listar_proyecto_asociacion($id_asociacion){  
           
             $parametros = array('id_asociacion' => $id_asociacion);    
             $query = $this->db->select('*')->from('t012_proyectos_asociacion')
                    ->where($parametros)                    
                    ->get();
             $result = $query->result_array();                     
            return $result;
            
    
    }

    public function listar_proyecto_asociacion_id($id){  
            
             $parametros = array('id' => $id);    
             $query = $this->db->select('*')->from('t012_proyectos_asociacion')
                    ->where($parametros)                    
                    ->get();
             $result = $query->result_array();                     
            return $result;
    
    }

   

    
}

