<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Libnotificaciones
 *
 * @author eliasc
 */
class Libnotificaciones {
       protected $CI;
       
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();                
        }
        /*
         * cisnerose: Envia una notificación al momento de crear una cita, Estado Agendado
         mod 04/04/18 osunaw: se elimina parámetro id_condicion = 1
         */
        public function notificarInicialPacientes(){
            //$this->CI->load->library('Libseguridad');             
            $this->CI->load->model('Notificacion_model');
            $param= "nu_estado = 0 and id_tiponotificacion = 1 and nu_fasenotificacion = 1 and tx_indicador is not NULL and tx_indicador <> 'No registrado'";
            $notificaciones_pacientes = $this->CI->Notificacion_model->buscarVistaNotificaciones($param);           
            //var_dump($pacientes);
            $this->CI->load->library('libcorreo'); 
            
            foreach ($notificaciones_pacientes as $notificacion):
                $correo['dir_correo']       = $notificacion->tx_indicador;
                $correo['tx_nom_ape']       = $notificacion->tx_nom_ape;
                $correo['nb_centro_salud']  = $notificacion->nb_centro_salud;
                $correo['fe_cita']          = $notificacion->fe_cita;
                $correo['hr_cita']          = $notificacion->hr_cita;
                $correo['nb_estudio_paciente']= $notificacion->nb_estudio_paciente;
                $correo['nb_especialidad']  = $notificacion->nb_especialidad;
                $correo['nb_procedimiento'] = $notificacion->nb_procedimiento;                
                $correo['id']               = $notificacion->id;
                $result = $this->CI->libcorreo->enviarCorreoInicialPaciente($correo);                
                if($result)
                {
                        $recordatorio['id'] = $notificacion->id;
                        $this->CI->Notificacion_model->porRecordarPaciente($recordatorio);                                               
                }
                
            endforeach;            
        }
        /*
         * cisnerose: Notifica a los supervisores las Citas Agendadas
         mod 04/04/18 osunaw: se elimina parámetro id_condicion = 1
         */
        public function notificarSupervisor(){
            
            $param= "nu_estado = 0 and id_tiponotificacion = 3 and nu_fasenotificacion = 1 and tx_ind_supervisor is not null";
            $not_pacientes = $this->CI->Notificacion_model->buscarVistaNotificaciones($param);           
            foreach ($not_pacientes as $notificacion):
                $correo['tx_nom_ape']       = $notificacion->tx_nom_ape;
                $correo['nb_centro_salud']  = $notificacion->nb_centro_salud;
                $correo['fe_cita']          = $notificacion->fe_cita;
                $correo['hr_cita']          = $notificacion->hr_cita; 
                $correo['tx_ind_supervisor']= $notificacion->tx_ind_supervisor;
                
                $result= $this->CI->libcorreo->enviarCorreoSupervisor($correo);
                   
                if($result){                    
                    $aux['id'] = $notificacion->id;
                    $this->CI->Notificacion_model->porRecordarSupervisor($aux);
                }
                
            endforeach;
            
        }
        
        /*
         * cisnerose: Notifica a los supervisores la Asistencia: NO SE USA ACTUALMENTE
         mod 04/04/18 osunaw: se elimina parámetro id_condicion = 1
         */
        public function notificarSupervisorFinal(){
            
            $param= "nu_estado = 0 and id_tiponotificacion = 3 and nu_fasenotificacion = 3 and tx_ind_supervisor is not null and (tx_estado = 'En espera' or tx_estado = 'Atendiendo')";
            $not_pacientes = $this->CI->Notificacion_model->buscarVistaNotificaciones($param);           
            foreach ($not_pacientes as $notificacion):
                $correo['tx_nom_ape']       = $notificacion->tx_nom_ape;
                $correo['nb_centro_salud']  = $notificacion->nb_centro_salud;
                $correo['fe_cita']          = $notificacion->fe_cita;
                $correo['hr_cita']          = $notificacion->hr_cita; 
                $correo['tx_ind_supervisor']= $notificacion->tx_ind_supervisor;
                
                $result= $this->CI->libcorreo->enviarCorreoSupervisorAsistencia($correo);
                   
                if($result){                    
                    $aux['id'] = $notificacion->id;
                    $this->CI->Notificacion_model->notificadoSupervisorTrabajadorAsistio($aux);
                }
                
            endforeach;
            
        }
        
        /*
         * cisnerose: Realiza un recordatorio a un paciente
           mod 04/04/18 osunaw: se elimina parámetro id_condicion = 1
         */
        public function recordatorioPacientes(){
            
            $this->CI->load->model('Notificacion_model');
            $param= " nu_estado = 0 and id_tiponotificacion = 1  and nu_fasenotificacion = 2 and tx_indicador is not NULL and tx_indicador <> 'No registrado' and (fe_cita::date  -  NOW()::date) = 1 ";
            $not_pacientes = $this->CI->Notificacion_model->buscarVistaNotificaciones($param);           
            //var_dump($pacientes);
            $this->CI->load->library('libcorreo'); 
            
            foreach ($not_pacientes as $notificacion):
                $correo['dir_correo']       = $notificacion->tx_indicador;
                $correo['tx_nom_ape']       = $notificacion->tx_nom_ape;
                $correo['nb_centro_salud']  = $notificacion->nb_centro_salud;
                $correo['fe_cita']          = $notificacion->fe_cita;
                $correo['hr_cita']          = $notificacion->hr_cita;
                $correo['nb_estudio_paciente']= $notificacion->nb_estudio_paciente;
                $correo['nb_especialidad']  = $notificacion->nb_especialidad;
                $correo['nb_procedimiento'] = $notificacion->nb_procedimiento;
                $result = $this->CI->libcorreo->enviarCorreoRecordatorioPaciente($correo);
                if($result)
                {       $recordatorio['id'] = $notificacion->id;
                        $this->CI->Notificacion_model->recordadoPaciente($recordatorio);
                }                      
            endforeach;    
            
        }
        /*
         * cisnerose: Notificación cuando el paciente ya está presente en la clínica
         mod 04/04/18 osunaw: se elimina parámetro id_condicion = 1
         */
        public function notificarFinalPaciente(){
            $this->CI->load->library('Libseguridad');             
            $this->CI->load->model('Notificacion_model');
            $param= "nu_estado = 0 and id_tiponotificacion = 1  and nu_fasenotificacion = 3 and tx_indicador is not NULL and tx_indicador <> 'No registrado' and (tx_estado = 'En espera' or tx_estado = 'Atendiendo')";
            $not_pacientes = $this->CI->Notificacion_model->buscarVistaNotificaciones($param);           
            var_dump($not_pacientes);
            $this->CI->load->library('libcorreo'); 
            
            foreach ($not_pacientes as $notificacion):
                $correo['dir_correo']       = $notificacion->tx_indicador;
                $correo['tx_nom_ape']       = $notificacion->tx_nom_ape;
                $correo['nb_centro_salud']  = $notificacion->nb_centro_salud;
                $correo['fe_cita']          = $notificacion->fe_cita;
                $correo['hr_cita']          = $notificacion->hr_cita;
                $correo['nb_estudio_paciente']= $notificacion->nb_estudio_paciente;
                $correo['nb_especialidad']  = $notificacion->nb_especialidad;
                $correo['nb_procedimiento'] = $notificacion->nb_procedimiento;
                
                $token['id_centro']     = $notificacion->id_centro_salud;
                $fecha_aux = new DateTime($correo['fe_cita']);
                $token['dia']   = date_format($fecha_aux,'j');
                $token['mes']   = date_format($fecha_aux,'n');
                $token['anio']  = date_format($fecha_aux,'Y');
                $correo['hash_centro']  = $this->CI->libseguridad->buscartokencentro($token);                 
                var_dump($correo['hash_centro']);
                if($correo['hash_centro'] != NULL){                
                    $result = $this->CI->libcorreo->enviarCorreoFinalPaciente($correo);
                    var_dump($result);
                    if($result){
                        $recordatorio['id'] = $notificacion->id;
                        $this->CI->Notificacion_model->finalizadoPaciente($recordatorio);
                    }
                }
            endforeach;
        }
        
     /*
     * cisnerose: Desactivar notificacion
     */
    public function eliminarNotificacionesCompletadas(){
        $this->CI->load->model('Notificacion_model');
        $this->CI->Notificacion_model->eliminarNotificacionesCompletadas();
    }





         /*                           Notificacion de Reposos
         *********************************************************************************
           Osuna: Envia una notificación al correo del paciente al momento de crear un reposo
         */

    public function notificar_reposo_paciente(){
        
            $this->CI->load->library('milogging');   
            $this->CI->milogging->info('','','notificar_reposo_paciente');
            $this->CI->load->model('Notificacion_model');
            $param= "nu_estado = 0 and id_tiponotificacion = 2 and nu_fasenotificacion = 1 and nu_ci is not NULL";
            $reposo_pacientes = $this->CI->Notificacion_model->buscar_reposos($param);           
            
            $this->CI->load->library('libcorreo'); 
            
            foreach ($reposo_pacientes as $reposo):
                $i = 1;
                $correo['dir_correo']               = $reposo->tx_indicador;

                $correo['nu_dias_reposo']           = $reposo->nu_dias_reposo;
                $correo['fe_inicio_reposo']         = $reposo->fe_inicio_reposo;
                $correo['nu_ci']                    = $reposo->nu_ci;
                $correo['nu_ci_beneficiario']       = $reposo->nu_ci_beneficiario;
                $correo['tx_nom_ape']               = $reposo->tx_nom_ape;
                $correo['id_usuario']               = $reposo->id_usuario;
                $correo['tx_nb']                    = $reposo->tx_nb;

                
                $result = $this->CI->libcorreo->enviarCorreoInicialPacienteReposo($correo);                
                $msj = "Estatus envío $i: $result";
                $this->CI->milogging->info('','',$msj);
                $i++;
                if($result)
                {
                    $where['nu_estado'] = $reposo->nu_estado;
                    $where['id_referencia'] = $reposo->id_reposo;
                    $where['id_tiponotificacion'] = 2;
                    $this->CI->Notificacion_model->actualizar_estado($where);
                   return $result;          
                                             
                }
            endforeach;  

        }


        /*            
           Osuna: Envia una notificación al correo del supervisor al momento de crear un reposo para el paciente
           mod 04/04/18 osunaw: se elimina parámetro id_condicion = 1
         */

        public function notificar_reposo_supervisor(){
        
            $this->CI->load->library('milogging');   
            $this->CI->milogging->info('','','notificar_reposo_supervisor');
            $this->CI->load->model('Notificacion_model');
            $param= "nu_estado = 0 and id_tiponotificacion = 5 and nu_fasenotificacion = 1 and nu_ci is not NULL ";
            $reposo_pacientes = $this->CI->Notificacion_model->buscar_reposos($param);           
            //var_dump($pacientes);
            $this->CI->load->library('libcorreo');
            
            foreach ($reposo_pacientes as $reposo):
                $i = 1;
                $correo['dir_correo']               = $reposo->tx_ind_supervisor;
                $correo['nu_dias_reposo']           = $reposo->nu_dias_reposo;
                $correo['fe_inicio_reposo']         = $reposo->fe_inicio_reposo;
                $correo['nu_ci']                    = $reposo->nu_ci;
                $correo['nu_ci_beneficiario']       = $reposo->nu_ci_beneficiario;
                $correo['tx_nom_ape']               = $reposo->tx_nom_ape;
                $correo['id_usuario']               = $reposo->id_usuario;
                $correo['tx_nb']                    = $reposo->tx_nb;
                $result = $this->CI->libcorreo->enviarCorreoInicialSupervisorReposo($correo);    
                $msj = "Estatus envío $i: $result";
                $this->CI->milogging->info('','',$msj);
                $i++;
                if($result)
                {            
                    $where['nu_estado'] = $reposo->nu_estado;
                    $where['id_tiponotificacion'] = 5;
                     $where['id_referencia'] = $reposo->id_reposo;
                     $this->CI->Notificacion_model->actualizar_estado($where);
                     return $result;       

                }
                
            endforeach;            
        }

                      


   // osuna: notifica a los trabajadores si han cumplido un año en la empresa

      public function notificarFechaAnualTrabajador(){
        $this->CI->load->model('Notificacion_model');
        $this->CI->load->model('Paciente_model');
        $this->CI->load->library('libcorreo');        
       
        $param= "nu_estado = 0 and id_tiponotificacion = 6 and nu_fasenotificacion = 1 and nu_ci is not NULL ";
        $pacientes = $this->CI->Paciente_model->listar_paciente_fecha(); 
 
     
       foreach ($pacientes as $paciente):

            $correo['id']                   = $paciente['id'];
            $correo['tx_indicador']         = $paciente['tx_indicador'];
            $correo['tx_ind_supervisor']    = $paciente['tx_ind_supervisor'];
            $correo['nu_ci_titular']        = $paciente['nu_ci_titular'];

            $correo['tx_nom_ape']           = $paciente['tx_nom_ape'];        
            $correo['fecha_actual']         = $paciente['fecha_actual']; 

             $result = $this->CI->libcorreo->enviarCorreoAnualidadTrabajador($correo);                      
                if($result)
                {            
                    
                    $where['nu_estado'] = 1;
                    $where['id_referencia'] = $paciente['id'];
                    $where['id_tiponotificacion'] = 6;
                 $this->CI->Notificacion_model->insertar_trabajador_anual($where);
                     
                }else 
                {   
                   $where['nu_estado'] = 0;
                    $where['id_referencia'] = $paciente['id'];
                    $where['id_tiponotificacion'] = 6;
                 $this->CI->Notificacion_model->insertar_trabajador_anual($where);

                 }         
                
                
              endforeach;
    
        }
          

    
   // osuna: notifica a los supervisores que sus trabajadores han cumplido un año en la empresa


      public function notificarFechaAnualSupervisor(){
        $this->CI->load->model('Notificacion_model');
        $this->CI->load->model('Paciente_model');
        $this->CI->load->library('libcorreo');
         
        $param= "nu_estado = 0 and id_tiponotificacion = 7 and nu_fasenotificacion = 1 and nu_ci is not NULL ";       

        $pacientes = $this->CI->Paciente_model->listar_paciente_fecha(); 
 
     
       foreach ($pacientes as $paciente):
        $correo['id']                   = $paciente['id'];
        $correo['tx_indicador']         = $paciente['tx_indicador'];
        $correo['tx_ind_supervisor']    = $paciente['tx_ind_supervisor'];
        $correo['nu_ci_titular']        = $paciente['nu_ci_titular'];
        $correo['tx_nom_ape']           = $paciente['tx_nom_ape'];
        
        $correo['fecha_actual']         = $paciente['fecha_actual']; 
               
        $result = $this->CI->libcorreo->enviarCorreoAnualidadSupervisor($correo);        

                if($result)
                {           
                    $where['nu_estado'] = 1;
                    $where['id_referencia'] = $paciente['id'];
                    $where['id_tiponotificacion'] = 7;
                     $this->CI->Notificacion_model->insertar_trabajador_anual($where);
                           

                }else 
                {   
                   $where['nu_estado'] = 0;
                    $where['id_referencia'] = $paciente['id'];
                    $where['id_tiponotificacion'] = 7;
                 $this->CI->Notificacion_model->insertar_trabajador_anual($where);

                 }  
                
                 endforeach;          

    
}
   
        



}
