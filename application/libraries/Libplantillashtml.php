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


class Libplantillashtml {
   protected $CI;   
   
    public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                
        }
    /*
     * Retorna un carrusel
     * $param datos, titulos y tiempo del data-interval
     */    
    public function carrusel($param){
        $globales = $param['globales'];
        $servicios = $param['contenido'];
        
        $lementos = "";
        $colores = array('success','danger','warning','info','primary','warning');
        $i=0;
        foreach ($servicios as $servicio):
            $param['texto'] = $servicio[0];
            $param['datos'] = $servicio[1];
            $param['color'] = $colores[$i]; 
            if($i==0){
                $param['active'] = 'active';                
            }else{
                $param['active'] = '';                
            }
            $i++;
            $lementos = $lementos.' '.$this->elementoCarrusel($param);
        endforeach;
        
        $data_interval = $globales['data-interval'];
        
        $carrusel = "<div id='myCarousel' class='carousel slide' data-ride='carousel' data-interval='$data_interval'>
                        <div class='carousel-inner'>
                        
                              $lementos

                        </div>                            

                            <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
                              <span class='glyphicon glyphicon-chevron-left'></span>
                              <span class='sr-only'>Anterior</span>
                            </a>
                            <a class='right carousel-control' href='#myCarousel' data-slide='next'>
                              <span class='glyphicon glyphicon-chevron-right'></span>
                              <span class='sr-only'>Siguiente</span>
                            </a>
                    </div> 
                    ";
        
        return $carrusel;

    }
    /*
     * Retorna un elemento del carrusel
     */
    private function elementoCarrusel($param){
        $texto  = $param['texto'];
        $datos  = $param['datos'];
        $active = $param['active'];
        $color  = $param['color'];
        $elemento =  "<div class='item $active'>
        
                        <div class='carousel-caption'>            
                        </div>         
                        <div class='col-md-12'>
                                <div class='box box-$color'>
                                    <div class='box-header with-border'>
                                        <h1>$texto</h1>
                                        <div class='box-tools pull-right'>                  
                                        </div>
                                        <div class='box-body'>
                                            $datos
                                        </div>
                                    </div>
                                </div>
                            </div>

                      </div>";
        
        return $elemento;
    
    }
    
    /*
    * cisnerose: Se emplea para mostrar el color de una columna con fondo verde, amarillo o rojo
    */
    private function columna_estado_estilo($param){
            $dato = $param;
            $estilo_estado = "";
            switch ($dato){
                case 'En espera':
                {
                    $estilo_estado = "<span class='label label-warning'>".$dato." <i class='fa fa-refresh fa-spin'></i></span>     ";
                    break;
                }
                case 'Atendiendo':
                {
                    $estilo_estado = "<span class='label label-success'>".$dato."</span>";
                    break;
                }
            }
            
            return $estilo_estado;
    }
    
    /*
    * cisnerose: Se emplea para mostrar el color de una columna con fondo verde, amarillo o rojo
    */
    private function columna_estado_estilo_cisco($param){
            $dato = $param;
            $estilo_estado = "";
            switch ($dato){
                case 'En espera':
                {
                    $estilo_estado = "<span class='label label-warning'>".$dato."</span>     ";
                    break;
                }
                case 'Atendiendo':
                {
                    $estilo_estado = "<span class='label label-success'>".$dato."</span>";
                    break;
                }
            }
            
            return $estilo_estado;
    }

        /*
         * cisnerose: Estilo de la tabla
         */
        private function tabla_estilo(){
            $template = array(
            'table_open'            => '<table class="table table-hover">',

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th><h1>',
            'heading_cell_end'      => '</h1></th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td> <h1>',
            'cell_end'              => '</h1>  </td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td> <h1>',
            'cell_alt_end'          => '</h1> </td>',

            'table_close'           => '</table>'
         );

          return $template;
          
        }
        
        /*
         * cisnerose: Estilo de la tabla comun: lista de actividades, lista de espera
         */
        private function tabla_estilo_comun($param=NULL){
            $id = $param['id'];
            $template = array(
            'table_open'            => "<table id='$id' class='table table-bordered table-striped'>",

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',

            'table_close'           => '</table>'
         );

          return $template;
          
        }
        
        /*
         * cisnerose: Estilo de la tabla de la sala de espera
         */
        public function tabla_pacientes_sala_espera($param){            
            $datos      = $param;            
            
            $this->CI->load->library('table');            
            
            $this->CI->table->set_template($this->tabla_estilo());
            
            $this->CI->table->set_heading('Nro','Nombre','Estado','Llamado por');
            $i=1;
            foreach ($datos as $dato):                                
                $estilo_estado = $this->columna_estado_estilo($dato['tx_estado']);                
                $llamado_por = 'Por asignar';
                if(!empty($dato['nb_usuario_reserva'])){
                    $llamado_por = substr($dato['nb_usuario_reserva'],0,15);
                }
                $nombre_corto = substr($dato['tx_nom_ape'],0,20);
                $this->CI->table->add_row($i,$nombre_corto,$estilo_estado,$llamado_por);
                $i++;
            endforeach;                        

            return $this->CI->table->generate();
        }
        
        /*
         * cisnerose: Estilo de la tabla de la sala de espera EQUIPO CISCO
         */
        public function tabla_pacientes_sala_espera_cisco($param){            
            $datos      = $param;
            
            //$this->load->library('libplantillashtml');   
            
            $this->CI->load->library('table');            
            
            $this->CI->table->set_template($this->tabla_estilo());
            
            $this->CI->table->set_heading('Nro','Nombre','Estado','Llamado por');
            $i=1;
            foreach ($datos as $dato):                                
                $estilo_estado = $this->columna_estado_estilo_cisco($dato['tx_estado']);                
                $llamado_por = 'Por asignar';
                if(!empty($dato['nb_usuario_reserva'])){
                    $llamado_por = substr($dato['nb_usuario_reserva'],0,15);
                }
                $nombre_corto = substr($dato['tx_nom_ape'],0,20);
                $this->CI->table->add_row($i,$nombre_corto,$estilo_estado,$llamado_por);
                $i++;
            endforeach;                        

            return $this->CI->table->generate();
        }
        
        /*
         * cisnerose: tabla de multiples actividades
         */
        public function tabla_multiples_actividades_paciente($param){
            $datos      = $param;
            $this->CI->load->library('table'); 
            $param_tabla = array('id'=>'tbl_actividades');
            $this->CI->table->set_template($this->tabla_estilo_comun($param_tabla));            
            $this->CI->table->set_heading('Nro','Actividad','Atendido',' Estado');
            $i=1;
            foreach ($datos as $dato):                                
                $estudio         = $dato['tx_nb_est'];
                $etiqueta_esp = '';
                $etiqueta_proc = '';
                $etiqueta_ama = '';
                if ($dato['tx_nb_esp'] != 'No Aplica'){
                  $etiqueta_esp = $this->plantilla_resaltar_dato_label_default($dato['tx_nb_esp']);
                }                     
                if ($dato['tx_nb_proc'] != 'No Aplica' ){
                    $etiqueta_proc = $this->plantilla_resaltar_dato_label_default($dato['tx_nb_proc']);
                }                     
                if ($dato['tx_nombre_ama'] != 'No Aplica' ){
                    $etiqueta_ama = $this->plantilla_resaltar_dato_label_default($dato['tx_nombre_ama']);
                }                                                   
            
                $estudio = $estudio.$etiqueta_esp.$etiqueta_proc.$etiqueta_ama;
            
                $usuario_reserva = $this->plantilla_resaltar_dato_label_default('Por asignar');
                if(!empty($dato['tx_nombre_apellido_usr_reserva'])){
                    $usuario_reserva = $this->plantilla_resaltar_dato_label_success($dato['tx_nombre_apellido_usr_reserva']);   
                }
                $estado = $this->color_estado_atencion($dato['tx_estado']);
                $this->CI->table->add_row($i,$estudio,$usuario_reserva,$estado);
                $i++;
            endforeach;
            
            return $this->CI->table->generate();
        }
        
        /*
         * cisnerose: Plantillas para resaltar en gris
         */
        public function plantilla_resaltar_dato_label_default($param){
            $plantilla = "<span class='label label-default' >$param</span>";
            return $plantilla;
        }
        
        /*
         * cisnerose: Plantillas para resaltar verde
         */
        public function plantilla_resaltar_dato_label_success($param){
            $plantilla = "<span class='label label-success' >$param</span>";
            return $plantilla;
        }
        
        /*
         * cisnerose: Plantillas para resaltar warning
         */
        public function plantilla_resaltar_dato_label_warning($param){
            $plantilla = "<span class='label label-warning' >$param</span>";
            return $plantilla;
        }
        
        /*
         * cisnerose: Plantillas para resaltar primary
         */
        public function plantilla_resaltar_dato_label_primary($param){
            $plantilla = "<span class='label label-primary' >$param</span>";
            return $plantilla;
        }
        
        /*
         * cisnerose: Plantillas para resaltar danger
         */
        public function plantilla_resaltar_dato_label_danger($param){
            $plantilla = "<span class='label label-danger' >$param</span>";
            return $plantilla;
        }
        
        /*
         * cisnerose: determinar color de la atención
         */
        public function color_estado_atencion($param){
            $etiqueta = "";
            switch ($param):
                case 'En espera':
                    $etiqueta = $this->plantilla_resaltar_dato_label_warning($param);
                    break;
                case 'Atendiendo':
                    $etiqueta = $this->plantilla_resaltar_dato_label_success($param);
                    break;
                case 'Atendido':
                    $etiqueta = $this->plantilla_resaltar_dato_label_primary($param);
                    break;
                case 'Agendado':
                    $etiqueta = $this->plantilla_resaltar_dato_label_warning($param);
                    break;
                case 'No asistio':
                    $etiqueta = $this->plantilla_resaltar_dato_label_danger($param);                    
                    break;
                case 'No atendido':
                    $etiqueta = $this->plantilla_resaltar_dato_label_danger($param);                    
                    break;
                default :
                    $etiqueta = $this->plantilla_resaltar_dato_label_warning($param);
                    break;
                
            endswitch;
            return $etiqueta;
        }
    
}
    
   
        

