<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plantillagraficos
 *
 * @author eliasc
 */   


class Libcomunes {
   protected $CI;   
   
    public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                
        }
    /*
     * Lista el listado de pacientes por centro
     */    
    public function listar_pacientes_x_servicio($param){
        $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
	$servicio = $param['servicio'];


		$date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
		$fecha_solicitud = $date->format('Y/m/d');

		$this->CI->load->model('Asistencia_model');                

		if($servicio == 's1'){
                    $resultado = $this->CI->Asistencia_model->listar_servicio_salud_ocupacional($centro_salud, $fecha_solicitud);			
		}

		if($servicio == 's2'){
                    $resultado = $this->CI->Asistencia_model->listar_servicio_atencion_integral($centro_salud, $fecha_solicitud);
		}

		if($servicio == 's3'){
                    $resultado = $this->CI->Asistencia_model->listar_servicio_procedimiento($centro_salud, $fecha_solicitud);
		}   
	   
	    for($i = 0; $i < count($resultado) ; $i++){

	    	if ($resultado[$i]['id_condicion'] == '1'){// Trabajador

	    		$resultado[$i]['ci_foto'] = str_pad( $resultado[$i]['nu_ci'], 9, "0", STR_PAD_LEFT);

		    }else{
		    	$resultado[$i]['ci_foto'] = 'anonimo';	
		    }
	    }	    
            
            return $resultado;
		
		//echo json_encode($resultado);
    }
    /*
     * cisnerose: Laboratorio Lista los pacientes de un laboratorio
     */
    public function listar_pacientes_laboratorio($param){
        $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
        $date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
        $fecha_solicitud = $date->format('Y/m/d');
        
        $this->CI->load->model('Asistencia_model');                
        $resultado = $this->CI->Asistencia_model->listar_servicio_procedimiento_laboratorio($centro_salud,$fecha_solicitud);
        return $resultado;
        
    }
    
    /*
     * cisnerose: Salud_ocupacional Lista los pacientes 
     */
    public function listar_pacientes_salud_ocupacional($param){
        $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
        $date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
        $fecha_solicitud = $date->format('Y/m/d');
        
        $this->CI->load->model('Asistencia_model');                
        $resultado = $resultado = $this->CI->Asistencia_model->listar_servicio_salud_ocupacional($centro_salud, $fecha_solicitud);			
        return $resultado;
        
    }
    
    
    /*
     * cisnerose: Atencion_integral Lista los pacientes
     */
    public function listar_pacientes_atencion_integral($param){
        $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
        $date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
        $fecha_solicitud = $date->format('Y/m/d');
        
        $this->CI->load->model('Asistencia_model');                
        $resultado = $resultado = $this->CI->Asistencia_model->listar_servicio_atencion_integral($centro_salud, $fecha_solicitud);			
        return $resultado;
        
    }
    
    /*
     * cisnerose: Lista los pacientes de enfermería
     */
    public function listar_servicio_atencion_enfermeria($param){
        $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
        $date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
        $fecha_solicitud = $date->format('Y/m/d');
        
        $this->CI->load->model('Asistencia_model');                
        $resultado = $resultado = $this->CI->Asistencia_model->listar_servicio_atencion_enfermeria($centro_salud, $fecha_solicitud);			
        return $resultado;
        
    }
    
     /*
     * cisnerose: Lista los pacientes que asisten a procedimientos diferentes al laboratorio
     */
    public function listar_servicio_procedimiento_no_laboratorio($param){
        $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
        $date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
        $fecha_solicitud = $date->format('Y/m/d');
        
        $this->CI->load->model('Asistencia_model');                
        $resultado = $resultado = $this->CI->Asistencia_model->listar_servicio_procedimiento_no_laboratorio($centro_salud, $fecha_solicitud);			
        return $resultado;
        
    }
    
    /*
     * cisnerose: Lista los pacientes que asisten a servicios odontológicos
     */
   public function listar_servicio_atencion_odontologia($param){
       $centro_salud = $param['centro_salud'];
        $fecha_solicitud = $param['fecha_solicitud'];
        $date = DateTime::createFromFormat('d/m/Y', $fecha_solicitud);
        $fecha_solicitud = $date->format('Y/m/d');
        
        $this->CI->load->model('Asistencia_model');                
        $resultado = $resultado = $this->CI->Asistencia_model->listar_servicio_atencion_odontologia($centro_salud, $fecha_solicitud);			
        return $resultado;
   }
        
}
