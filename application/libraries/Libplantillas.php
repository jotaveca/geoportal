<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Plantillas de correos electrónicos
 *
 * @author eliasc
 */   


class Libplantillas {
   protected $CI;   
   
    public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                
        }
    /*
     * cisnerose: Retorna un texto  del correo del paciente cuando se presenta al centro
     */    
    public function plantilla_correo_paciente($param){
        $tx_nom_ape         = $param['tx_nom_ape'];
        $nb_centro_salud    = $param['nb_centro_salud'];
        $fe_cita            = $param['fe_cita'];
        $hr_cita            = $param['hr_cita'];
        $nb_estudio_paciente= $param['nb_estudio_paciente'];
        //$id_centro_salud    = $param['id_centro'];
        $nb_especialidad    = $param['nb_especialidad'];
        $nb_procedimiento   = $param['nb_procedimiento'];
        $hash_centro        = $param['hash_centro'];
                $ruta = base_url().'index.php/videocartelera/videocartelera/?hash='.$hash_centro;
                $url_encuesta = 'http://sigeait2.pdvsa.com/index.php/816264?lang=es';
		$mensaje = "Estimado(a) <b>$tx_nom_ape</b>. 
			<br>
			<br>
			Hemos registrado una solicitud para ser atendido el día <b>$fe_cita, $hr_cita</b>, en el centro de salud de PDVSA: <b>$nb_centro_salud</b> para la actividad de <b>$nb_estudio_paciente $nb_especialidad $nb_procedimiento</b>.
			<br>
			<br>
			Agradecemos hacer seguimiento a su solicitud a través del sistema de <a href='$ruta'>SiSalud de PDVSA</a>. Se recomienda usar el navegador web Mozilla Firefox.
			<br>
			<br>
                        En el marco del desarrollo del Plan Estratégico Socialista (PES 2016-2026) y del Golpe de Timón, una vez atendido, por favor ingrese su opinión del servicio sobre el centro de Salud PDVSA, a través del siguiente enlace: <a href='$url_encuesta'>Medición del servicio de Salud PDVSA</a>, con el propósito de fortalecer las acciones que se vienen desarrollando y las que están por ejecutarse.
			La Dirección DE Enlace / Dirección Ejecutiva de Salud agradece su opinión para mejorar nuestros procesos y que su satisfacción sea nuestro primer objetivo.
			<br><br>
			Saludos.
			<br>
                        <br>Golpe de Timón en Salud
                        <br>
			<br>Dirección Ejecutiva de Salud.
			<br>Dirección de Enlace de JD de Salud.
			<br>Equipo Tecnológico del PES/ AIT.
			";
			return $mensaje;
	}
    
     /*
     * cisnerose: Retorna un texto  del correo del paciente cuando se presenta al centro
     */    
    public function plantilla_correo_final_paciente($param){
        
        $param = $this->formatearParametros($param);
        
        $tx_nom_ape         = $param['tx_nom_ape'];
        $nb_centro_salud    = $param['nb_centro_salud'];
        $fe_cita            = $param['fe_cita'];
        
        $nb_estudio_paciente= $param['nb_estudio_paciente'];        
        $nb_especialidad    = $param['nb_especialidad'];
        $nb_procedimiento   = $param['nb_procedimiento'];
        $hash_centro        = $param['hash_centro'];
                $ruta = base_url().'index.php/videocartelera/videocartelerausr/?hash='.$hash_centro;
                $url_encuesta = 'http://sigeait2.pdvsa.com/index.php/816264?lang=es';
		$mensaje = "Estimado(a) <b>$tx_nom_ape</b>. 
			<br>
			<br>
			Hemos registrado su asistencia a la cita del día de hoy, $fe_cita, en el centro de salud de PDVSA: <b>$nb_centro_salud</b> para la actividad de <b>$nb_estudio_paciente $nb_especialidad $nb_procedimiento</b>.
			<br>
			<br>
			Usted puede hacer seguimiento desde la comodidad de su oficina a través del sistema <a href='$ruta'>SiSalud de PDVSA</a>. Se recomienda usar el navegador web Mozilla Firefox.
			<br>
			<br>
                        Así mismo, en el marco de los lineamientos de eficiencia del Plan Estratégico Socialista (PES 2016-2026) y del Golpe de Timón, por favor ingrese su opinión del servicio del centro de Salud PDVSA a través del siguiente enlace: <a href='$url_encuesta'>Medición del servicio de Salud PDVSA</a>.
			La Dirección de Enlace de Salud y la Dirección Ejecutiva de Salud agradecen su opinión para mejorar nuestros procesos.
			<br><br>
			Saludos.
			<br>
                        <br>Golpe de Timón en Salud
                        <br>
			<br>Dirección Ejecutiva de Salud.
			<br>Dirección de Enlace de JD de Salud.
			<br>Equipo Tecnológico del PES/ AIT.
			";
			return $mensaje;
	}   
        
        
        /*
     * cisnerose: Retorna un texto  del correo del paciente cuando se presenta al centro
     */    
    public function plantilla_correo_inicial_paciente($param){
        
        $param = $this->formatearParametros($param);
        
        $tx_nom_ape         = $param['tx_nom_ape'];
        $nb_centro_salud    = $param['nb_centro_salud'];
        $fe_cita            = $param['fe_cita'];
        $hr_cita            = $param['hr_cita'];
        $nb_estudio_paciente= $param['nb_estudio_paciente'];        
        $nb_especialidad    = $param['nb_especialidad'];
        $nb_procedimiento   = $param['nb_procedimiento'];
        
                
		$mensaje = "Estimado(a) <b>$tx_nom_ape</b>. 
			<br>
			<br>
			Hemos agendado una cita para el día <b>$fe_cita, $hr_cita</b>, en el centro de salud de PDVSA: <b>$nb_centro_salud</b> para la actividad de <b>$nb_estudio_paciente $nb_especialidad $nb_procedimiento</b>.
			<br>
			<br>
                        Por favor no falte a su cita.
                        <br>
			<br>			                        
			Saludos.
			<br>
                        <br>Golpe de Timón en Salud
                        <br>
			<br>Dirección Ejecutiva de Salud.
			<br>Dirección de Enlace de JD de Salud.
			<br>Equipo Tecnológico del PES/ AIT.
			";
			return $mensaje;
	}
        
        
     /*
     * cisnerose: Retorna un texto del correo dirijido al supervisor con la cita planificada
     */    
    public function plantilla_correo_supervisor($param){
        
        $param = $this->formatearParametros($param);
        
        $tx_nom_ape             = $param['tx_nom_ape'];
        //$tx_nom_ape_supervisor  = $param['tx_nom_ape_supervisor'];
        $nb_centro_salud        = $param['nb_centro_salud'];
        $fe_cita                = $param['fe_cita'];
        $hr_cita                = $param['hr_cita'];                       
        
	$mensaje = "Hola
			<br>
			<br>
			Su supervisado(a) <b> $tx_nom_ape </b> ha registrado una cita el día <b>$fe_cita, $hr_cita</b>, en el centro de salud de PDVSA: <b>$nb_centro_salud</b>.
			<br>
			<br>
			Saludos.
			<br>
                        <br>Golpe de Timón en Salud
                        <br>
			<br>Dirección Ejecutiva de Salud.
			<br>Dirección de Enlace de JD de Salud.
			<br>Equipo Tecnológico del PES/ AIT.
			";
			return $mensaje;
	}
        
     /*
     * cisnerose: Retorna un texto del correo dirijido al supervisor de asistencia a su supervisado
     */    
    public function plantilla_correo_supervisor_asistencia($param){
        
        $param = $this->formatearParametros($param);
        
        $tx_nom_ape             = $param['tx_nom_ape'];
        //$tx_nom_ape_supervisor  = $param['tx_nom_ape_supervisor'];
        $nb_centro_salud        = $param['nb_centro_salud'];
        $fe_cita                = $param['fe_cita'];
        $hr_cita                = $param['hr_cita'];                       
        
	$mensaje = "Hola
			<br>
			<br>
			Su supervisado <b> $tx_nom_ape </b> se presentó a la cita del día <b>$fe_cita, $hr_cita</b>, en el centro de salud de PDVSA: <b>$nb_centro_salud</b>.
			<br>
			<br>
			Saludos.
			<br>
                        <br>Golpe de Timón en Salud
                        <br>
			<br>Dirección Ejecutiva de Salud.
			<br>Dirección de Enlace de JD de Salud.
			<br>Equipo Tecnológico del PES/ AIT.
			";
			return $mensaje;
	}
        
     /*
     * cisnerose: Retorna un texto con el mensaje de recordatorio al paciente
     */    
    public function plantilla_correo_recordatorio_paciente($param){
        
        $param = $this->formatearParametros($param);
        
        $tx_nom_ape         = $param['tx_nom_ape'];
        $nb_centro_salud    = $param['nb_centro_salud'];
        $fe_cita            = $param['fe_cita'];
        $hr_cita            = $param['hr_cita'];
        $nb_estudio_paciente= $param['nb_estudio_paciente'];        
        $nb_especialidad    = $param['nb_especialidad'];
        $nb_procedimiento   = $param['nb_procedimiento'];                
		$mensaje = "Estimado(a) <b>$tx_nom_ape</b>. 
			<br>
			<br>
			Esto es un <b>recordatorio</b> de la cita del día <b>$fe_cita $hr_cita</b>, en el centro de salud de PDVSA: <b>$nb_centro_salud</b> para la actividad de <b>$nb_estudio_paciente $nb_especialidad $nb_procedimiento</b>.						
			<br>
                        <br>
                        Por favor no falte a su cita.
                        <br>
			<br>			                        
			Saludos.
			<br>
                        <br>Golpe de Timón en Salud
                        <br>
			<br>Dirección Ejecutiva de Salud.
			<br>Dirección de Enlace de JD de Salud.
			<br>Equipo Tecnológico del PES/AIT.
			";
			return $mensaje;
	}
        /*
         * cisnerose: formatea los parámetros
         */
    private function formatearParametros($param){            
            
            $param['fe_cita'] = date_format(new DateTime($param['fe_cita']),'d-m-Y');
            
            if(!empty($param['nb_especialidad'])){
                if( $param['nb_especialidad'] == 'No Aplica'){
                    $param['nb_especialidad'] = "";
                }
            }
            if(!empty($param['nb_procedimiento'])){
                if( $param['nb_procedimiento'] == 'No Aplica'){
                    $param['nb_procedimiento'] = "";
                }
            }
            
            return $param;  
        }



   
        /*
     * osuna [ Retorna un texto al correo sobre el reposo del paciente]
     */    
    public function plantilla_correo_reposo_paciente($param){
        
        //$param = $this->formatearParametros($param);
        
          $tx_nom_ape         = $param['tx_nom_ape'];
          $nu_ci              = number_format ($param['nu_ci'], 0, "," , ".");
          
          $fe_inicio_reposo   = $param['fe_inicio_reposo'];
          $nu_dias_reposo     = $param['nu_dias_reposo']; 
          $nb_centro_salud    = $param['tx_nb'];  

          $fe_inicio_reposo = date("d-m-Y", strtotime($fe_inicio_reposo));      
          //echo date_format($fe_inicio_reposo,"d/m/Y");
                
          $mensaje =  "Estimado(a) usuario <b>$tx_nom_ape</b>, cédula <b>$nu_ci</b> . 

            <br>
            <br>
            Se le ha otorgrado un reposo médico desde el <b>$fe_inicio_reposo</b> por <b>$nu_dias_reposo</b> días, y fue atendido en el centro de salud de PDVSA: <b>$nb_centro_salud</b>. 
            <br>
            <br>                      
            <br>
            <br>                                    
            Saludos.
            <br>
            <br>Golpe de Timón en Salud
            <br>
            <br>Dirección Ejecutiva de Salud.
            <br>Dirección de Enlace de JD de Salud.
            <br>Equipo Tecnológico del PES/ AIT.
            ";
            return $mensaje;
    }


      /*
     * osuna: Retorna un texto del correo dirijido al supervisor  indicando que el paciente       tiene   un reposo
     */    
    public function plantilla_correo_reposo_supervisor($param){
        
         //$param = $this->formatearParametros($param);
        
          $tx_nom_ape         = $param['tx_nom_ape'];
          $nu_ci              = number_format ($param['nu_ci'], 0, "," , ".");
          $fe_inicio_reposo   = $param['fe_inicio_reposo'];
          $nu_dias_reposo     = $param['nu_dias_reposo'];                     
          $nb_centro_salud    = $param['tx_nb']; 
          
          $fe_inicio_reposo = date("d-m-Y", strtotime($fe_inicio_reposo));      

          $mensaje = "
              Estimado(a) supervisor(a)
           
            <br>
            <br>
            Su supervisado(a) <b> $tx_nom_ape </b> titular de la cédula <b>$nu_ci</b> se le ha otorgado un reposo médico desde el <b>$fe_inicio_reposo</b> por <b>$nu_dias_reposo</b> días, y fue atendido en el centro de salud de PDVSA: <b>$nb_centro_salud</b>.
            <br>
            <br>
            Saludos.
            <br>
            <br>Golpe de Timón en Salud
            <br>
            <br>Dirección Ejecutiva de Salud.
            <br>Dirección de Enlace de JD de Salud.
            <br>Equipo Tecnológico del PES/ AIT.
            ";
            return $mensaje;
    }
    
     //osuna : Retorna un texto notificando al trabajador que cumplio un año en la empresa

        public function plantilla_correo_anualidad_trabajador($param){        
         //$param = $this->formatearParametros($param);
        
          $tx_nom_ape         = $param['tx_nom_ape'];                           
          $nu_ci_titular      = number_format ($param['nu_ci_titular'], 0, "," , ".");                     
          $mensaje = "
           <br>          
           Respetado(a) <b> $tx_nom_ape </b> , CI <b> $nu_ci_titular </b>,<br>  <br>
           Según su información personal usted está próximo a cumplir un nuevo año en la empresa, estamos muy atentos a su bienestar de salud, es por ello que le invitamos a agendar su próxima evaluación médica en la clínica de PDVSA más cercana a su localidad.<br> <br>
           Si usted ya lo hizo por favor omitir este mensaje.  <br>
           <br>Golpe de Timón en Salud
            <br>
            <br>Dirección Ejecutiva de Salud.
            <br>Dirección de Enlace de JD de Salud.
            <br>Equipo Tecnológico del PES/ AIT.
            ";
            return $mensaje;
            
    }
    
    
    //osuna : Retorna un texto notificando al Supervisor que cumplio un año en la empresa

        public function plantilla_correo_anualidad_supervisor($param){        
         //$param = $this->formatearParametros($param);        
          $tx_nom_ape         = $param['tx_nom_ape'];          
          $nu_ci_titular      = number_format ($param['nu_ci_titular'], 0, "," , ".");                     
          
          $mensaje = "           
            <br>
            Respetado supervisor<br> <br>
            Según el registro de su supervisado(a) <b> $tx_nom_ape </b> , CI <b> $nu_ci_titular </b>,   este se encuentra próximo a cumplir un nuevo año en la empresa, le invitamos a hacer seguimiento al cumplimiento del control médico anual del personal bajo su responsabilidad.<br> <br>

            Si usted ya lo hizo por favor omitir este mensaje.  <br>              
            <br>Golpe de Timón en Salud
            <br>
            <br>Dirección Ejecutiva de Salud.
            <br>Dirección de Enlace de JD de Salud.
            <br>Equipo Tecnológico del PES/ AIT.
            ";
            return $mensaje;
            
    }






}


    
   
        

