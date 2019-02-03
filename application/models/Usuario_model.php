<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
   
  public $id;  
  public $tx_indicador;
  public $fecha_ult_acceso;
  public $tx_nombre_apellido;
  public $nu_ci;
    
    
   
    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
   public function listar(){  
            
            $query = $this->db->select('*')->from('v001_usuarios_roles')->get();    
             $result = $query->result_array();                     
            return $result;
    }

     

    public function buscar_perfil_usuario($tx_indicador){       
                
        $query = $this->db->select('nb_perfil')->from('v001_lista_usuarios_perfil')
                    ->where('tx_indicador', $tx_indicador)                    
                    ->get();
        return $query->result_array();
        
    }

    
       
      
    public function existe($cuenta){

            $parametros = array('cuenta' => $cuenta);

            $query = $this->db->select('id')->from('t001_usuarios')
                    ->where($parametros)                    
                    ->get();
            if ($query->num_rows() > 0)
                 return TRUE;
            else
                 return FALSE;
    }
/*
 * Método para validar si existe una cuenta de usuario basado en el nombre de la cuenta
 */
    public function existe_guardar($cuenta){

            $query = $this->db->select('id')->from('t001_usuarios')
                    ->where('cuenta', $cuenta)                    
                    ->get();
              

            if ($query->num_rows() > 0)
                 return TRUE;
            else
                 return FALSE;
    }

    public function modificar($id, $datos){

                

          $this->db->where('id', $id);                                    
          $this->db->update('t001_usuario', $datos);
          //echo $this->db->last_query();

           return ($this->db->affected_rows() != 1) ? false : true; 

    }

    public function modificar_x_id($id, $datos){

                

          $this->db->where('id', $id);                                    
          $this->db->update('t001_usuarios', $datos);
          //echo $this->db->last_query();

           return ($this->db->affected_rows() != 1) ? false : true; 

    }

  

    public function buscar_usuario_x_indicador($tx_indicador){       
       
        $parametros = array('cuenta' => $tx_indicador);       
         
        $query = $this->db->select('*')->from('v001_usuarios_roles')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();
       
        
    }
    
    
     public function buscar_no_ldap_usuario_x_indicador($cuenta){        
    
	  $parametros = array('cuenta' => $cuenta);         
         
        $query = $this->db->select('*')->from('v001_usuarios_roles')
                    ->where($parametros)                    
                    ->get();
        return $query->result_array();       
     
    }
    /*
     * método para otorgar acceso a la aplicación
     */
     public function validar_credenciales($cuenta, $contrasenia){        
    
	  $parametros = array('cuenta' => $cuenta);         
         
        $query = $this->db->select('*')->from('t001_usuarios')
                    ->where($parametros)                    
                    ->get();
        $contrasenia_bd = current($query->result_array())['contrasenia'];       
        
        $this->load->helper('security');
        $contrasenia_hash = do_hash($contrasenia,'384');
        //var_dump($contrasenia_hash);
        //var_dump($contrasenia_bd);
        
        if($contrasenia_bd == $contrasenia_hash){
            return true;
        }
        else{
            return false;
        }
        
     
    }

    public function buscar_usuario_x_id($id_usuario){       
                
        $query = $this->db->select('*')->from('v001_usuarios_roles')
                    ->where('id', $id_usuario)                    
                    ->get();
        return $query->result_array();
        
    }


    public function eliminar ($id_usuario){     

      $this->db->where('id', $id_usuario);
      $this->db->delete('t001_usuarios');

      return ($this->db->affected_rows() != 1) ? false : true;
    }
   
/*
 * Guarda una usuario
 */
    public function guardar($datos)
    {

      $cuenta = $datos['cuenta'];
        if($this->existe_guardar($cuenta) == TRUE){   
                return false;
        }else{
            $this->db->insert('t001_usuarios', $datos);
            $lastid = $this->db->insert_id();
            return $lastid;
        }

    }
    
    public function buscar($param){
         $query = $this->db->select('*')->from('v001_usuarios_roles')
                    ->where($param)                    
                    ->get();
        return $query->row();
    }


    
}

