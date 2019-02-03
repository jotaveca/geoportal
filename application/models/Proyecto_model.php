<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto_model extends CI_Model{
   

   
    function  __construct(){
        parent::__construct(); 
        
        $this->load->database();
        
         
         
    }
    
   public function listar(){  
            
            $query = $this->db->select('*')->from('v003_lista_proyecto')->get();    
             $result = $query->result_array();                     
            return $result;
    }
    
       public function listar_x_usuario($id_usuario){  
            
             $parametros = array('id_usuario' => $id_usuario);    
             $query = $this->db->select('*')->from('v003_lista_proyecto')
                    ->where($parametros)                    
                    ->get();
             $result = $query->result_array();                     
            return $result;
    }

    public function modificar($id, $datos){
 
                

          $this->db->where('id', $id);                                    
          $this->db->update('t005_proyectos', $datos);
          //echo $this->db->last_query();

           return ($this->db->affected_rows() != 1) ? false : true; 

    }
     
     public function listar_x_id($id_proyecto){  
         
      
         $parametros = array('id_proyecto' => $id_proyecto);    
                
        $query = $this->db->select('*')->from('v006_proyectos_detalle')
                    ->where($parametros)                    
                    ->get();

     
    //echo $this->db->last_query();
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
      
      if($parametros['tx_rubro'] != "Seleccione"){
        $where['tx_rubro']= $parametros['tx_rubro'];
      }
      
      if($parametros['tx_intervencion'] != "Seleccione"){
        $where['tx_intervencion']= $parametros['tx_intervencion'];
      }
      
      if($parametros['tx_tipo_intervencion'] != "Seleccione"){
        $where['tx_tipo_intervencion']= $parametros['tx_tipo_intervencion'];
      }
      
      /*if($parametros['tx_tipo_moneda'] != "0"){
        $where['tx_tipo_moneda']= $parametros['tx_tipo_moneda'];
      }*/
      
     
      
        $query = $this->db->select('*')->from('v005_proyectos')
                    ->where($where)                    
                    ->get();

     
       //echo $this->db->last_query();
      return $query->result_array();
        
    }
    
    public function listar_proyectos_x_mapa($id_proyecto){  
         
              if($id_proyecto == 0){
                  
               //$this->db->select('codcp, tx_nombre,tx_rubro, xgd, ygd')->from('v005_proyectos')->db->order_by("codcp", "asc")
                $query = $this->db->select('id_proyecto, codcp,nomcp, tx_nombre,tx_rubro, xgd, ygd, nu_presupuesto_total, tx_tipo_moneda, tx_razon_social_ejec')->from('v005_proyectos')->order_by("codcp", "asc")
                    ->get();
                  
              }else{
                  
                   $parametros = array('id_proyecto' => $id_proyecto);    
                
                $query = $this->db->select('*')->from('v005_proyectos')
                    ->where($parametros)                    
                    ->get();
                  
              }
              

          return $query->result_array();
        
    }
    
    public function listar_resultados_x_proyectos($id_proyecto){  
           $parametros = array('id_proyecto' => $id_proyecto);    
                
        $query = $this->db->select('*')->from('t006_resultados')
                    ->where($parametros)                    
                    ->get();

          return $query->result_array();
        
    }
    
      public function listar_actividades_x_proyectos($id_proyecto){  
           $parametros = array('id_proyecto' => $id_proyecto);    
                
        $query = $this->db->select('*')->from('v007_actividad_proyecto')
                    ->where($parametros)                    
                    ->get();

          return $query->result_array();
        
    }
    
    
    
    
    
       public function listar_centro_poblado_x_proyectos($id_proyecto){  
           $parametros = array('id_proyecto' => $id_proyecto);    
                
        $query = $this->db->select('nomcp, codcp')->from('v005_proyectos')
                    ->where($parametros)                    
                    ->get();

          return $query->result_array();
        
    }
    

 
    public function existe($tx_siglas){

            $parametros = array('tx_siglas' => $tx_siglas);

            $query = $this->db->select('id')->from('t005_proyectos')
                    ->where($parametros)                    
                    ->get();
              

            if ($query->num_rows() > 0)
                 return TRUE;
            else
                 return FALSE;
    }

    



    public function eliminar ($id_proyecto){

      $this->db->where('id', $id_proyecto);
      $this->db->delete('t005_proyectos');
      //echo $this->db->last_query();

      return ($this->db->affected_rows() != 1) ? false : true;
   

    }
    
       public function eliminar_resultados ($id_proyecto){

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
 
        $tx_siglas = $datos['tx_siglas'];
        //if($this->existe($tx_siglas) == TRUE){   
        //        return false;
        //}else{
            $this->db->insert('t005_proyectos', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
        //}

    }


    
}

