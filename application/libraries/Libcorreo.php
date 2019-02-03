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


class Libcorreo {
   protected $CI;   
   
    public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                $this->CI->load->library('milogging');      
                $this->CI->load->library('session');  
                
        }
    /*
     * Método para enviar correo en para y cc
     */    
    public function enviarCorreoElectronicoMultiple($param){
        $this->CI->load->library('socorreo'); 
        $clave = '054eccf7310f4987a827df52d7c760bf';
        $asunto = 'Notificación SI-SALUD';
        $correo =  $param['correo'];
        $cc  = $param['cc'];
        $cco  = '';
        $mensaje = $param['mensaje'];
        $this->CI->socorreo->enviarCorreoElectronicoMultiple($clave,$asunto, $correo, $cc ,$cco,$mensaje);
    }
    
    /*
     * Método genérico para enviar correo
     */
    public function enviarCorreoElectronico($param){ 
        $this->CI->load->library('socorreo'); 
        $clave = '054eccf7310f4987a827df52d7c760bf';
        $asunto = 'SI-SALUD: Notificación';
        if(!empty($param['asunto'])){
            $asunto = 'SI-SALUD: '.$param['asunto'];
        }
        
        $correo =  $param['correo'];        
        $mensaje = $param['mensaje'];
        
        $resultado = true;
        
        try{        
            //$return = $this->CI->socorreo->enviarCorreoElectronico($clave, $asunto, $correo, $mensaje);            
            $cc = 'osunaw@pdvsa.com;cisnerose@pdvsa.com';
            $cco = '';
            $return = $this->CI->socorreo->enviarCorreoElectronicoMultiple($clave,$asunto, $correo, $cc ,$cco,$mensaje);
            $this->CI->milogging->info('LOCAL','CRON',$return->descripcion);
            
        }
        catch (Exception $e){                        
            $this->CI->milogging->error('LOCAL','CRON',  $e->getMessage() );
            $resultado = false;
        }
        finally {
            return $resultado;
        }
        
    }
    
    /*
     * Envia el correo de recordatorio a un paciente
     */
    public function enviarCorreoRecordatorioPaciente($param){            
        
        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_recordatorio_paciente($param);
        $correo['correo'] = $param['dir_correo'].'@pdvsa.com';//'cisnerose@pdvsa.com';//   //
        $correo['asunto'] = 'Recordatorio';
        return $this->enviarCorreoElectronico($correo);        
    }
    
    /*
     * Envia el correo inicial a un paciente
     */
    public function enviarCorreoInicialPaciente($param){            
        
        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_inicial_paciente($param);
        $correo['correo'] = $param['dir_correo'].'@pdvsa.com';//'cisnerose@pdvsa.com';//     
        $correo['asunto'] = 'Cita agendada';
        return $this->enviarCorreoElectronico($correo);        
    }
    
    /*
     * Envia el correo final a un paciente
     */
    public function enviarCorreoFinalPaciente($param){            
        
        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_final_paciente($param);
        $correo['correo'] = $param['dir_correo'].'@pdvsa.com';//'cisnerose@pdvsa.com';//
        $correo['asunto'] = 'Seguimiento de cita';
        return $this->enviarCorreoElectronico($correo);        
    }
    
    /*
     * Envia el correo al supervisor con la Cita del supervisado
     */
    public function enviarCorreoSupervisor($param){            
        
        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_supervisor($param);
        $correo['correo'] = $param['tx_ind_supervisor']; //'cisnerose@pdvsa.com';       
        return $this->enviarCorreoElectronico($correo);        
    }
    
    /*
     * Envia el correo al supervisor cuando el el supervisado asiste a la cita
     */
    public function enviarCorreoSupervisorAsistencia($param){            
        
        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_supervisor_asistencia($param);
        $correo['correo'] = $param['tx_ind_supervisor'];//'cisnerose@pdvsa.com';//        
        return $this->enviarCorreoElectronico($correo);        
    }
   



   /* funcion que sirve para validar los correos de los pacientes
       valida si un indicador tiene el @pdvsa  

   */ 

  public function validarCorreo($param){            

                  
        if (substr_count($param, '@') == 1) { 
         
        $correo['correo'] = $param;//'cisnerose@pdvsa.com';//     
     
        return $correo['correo'];
     

       } else{ 
                     
        $correo['correo'] = $param.'@pdvsa.com';//'cisnerose@pdvsa.com';//     

       
        return $correo['correo'];


         }
          
    }
       

   


   /*                                Correo de reposo        *******************************************************************************************
     * Osuna :Envia el correo al paciente al asignarle un reposo
     */
        
       public function enviarCorreoInicialPacienteReposo($param){     

        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_reposo_paciente($param);
        $correo['correo'] = $this->validarCorreo($param['dir_correo']);          
         $correo['cc'] = '';
         $correo['asunto'] = 'Reposo';
         return $this->enviarCorreoElectronicoExtendido($correo);
          

    }


    // funcion que sirve para enviar correos de reposos  al supervisor 
    public function enviarCorreoInicialSupervisorReposo($param){    
        
         $this->CI->load->library('libplantillas'); 
         $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_reposo_supervisor($param);
         $correo['correo'] = $this->validarCorreo($param['dir_correo']);          
         $correo['cc'] = '';
         $correo['asunto'] = 'Reposo';
         return $this->enviarCorreoElectronicoExtendido($correo);

    }

  // osuna : funcion que envia el correo al trabajador por haber cumplido un año en la empresa

      public function enviarCorreoAnualidadTrabajador($param){    
         $this->CI->load->library('libplantillas'); 
         $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_anualidad_trabajador($param);
         $correo['correo'] = $this->validarCorreo($param['tx_indicador']);
         $correo['cc'] = '';
         $correo['asunto'] = '¿Ya agendó su próximo examen médico anual (ECOR)?';
         return $this->enviarCorreoElectronicoExtendido($correo);


         
 
    }


      // osuna : funcion que envia el correo al supervisor por haber cumplido un año en la empresa

      public function enviarCorreoAnualidadSupervisor($param){    
        $this->CI->load->library('libplantillas'); 
        $correo['mensaje'] = $this->CI->libplantillas->plantilla_correo_anualidad_supervisor($param);

         $correo['correo'] = $this->validarCorreo($param['tx_indicador']);
         $correo['cc'] = '';       

         $correo['asunto'] = 'Seguimiento de ECOR de su supervisado';
         return $this->enviarCorreoElectronicoExtendido($correo);
    }
    /*

    */
    public function enviarCorreoElectronicoExtendido($param){ 

        $this->CI->load->library('socorreo'); 
        
        $asunto = 'Notificación SI-SALUD: '.$param['asunto'];
        $correo =  $param['correo'];
        $cc     =  $param['cc'];
        $cco    = "osunaw@pdvsa.com";
        $mensaje= $param['mensaje'];


        $parametros = array ('aplicacion' => '054eccf7310f4987a827df52d7c760bf',
                      'ip' => 0,
                      'asunto' => $asunto,
                      'para' => $correo,
                     'cc' => $cc,                                                
                     'cco' => $cco,
                     'mensaje' => $mensaje );       

        $resultado = true;
        
        try{       
            
            $return = $this->CI->socorreo->enviarCorreoElectronicoExt($parametros); 
            var_dump($return);
            $this->CI->milogging->info('LOCAL','CRON',$return->descripcion);
            
        }
        catch (Exception $e){                        
            $this->CI->milogging->error('LOCAL','CRON',  $e->getMessage() );
            $resultado = false;
        }
        finally {
            return $resultado;
        }              
        
        
  }


    

}
