<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){

            parent::__construct();     
            $this->load->library('session');  
            $this->load->library('form_validation');
            if(empty($this->session->userdata("id")))
            {
                   redirect(site_url(),'refresh');
            }             
            if($this->session->userdata("rol")!= 'Administrador')
            {
                redirect(site_url(),'refresh');
            } 
                		
		
        }
	


	public function listar_perfiles(){

			
		$this->load->model('Perfil_model');               
	    	$perfiles = $this->Perfil_model->listar() ;
	    	

	    	echo json_encode($perfiles);


	}


	public function buscar_usuario_bd(){

            $id_usuario =  $this->input->get('id_usuario');
            $this->load->model('Usuario_model');               
	    $usuario = $this->Usuario_model->buscar_usuario_x_id($id_usuario) ;
            //$usuario[0]['ci'] = str_pad($usuario[0]['ci'], 9, "0", STR_PAD_LEFT);
	    echo json_encode($usuario);

	}
        
        public function buscar_cuenta_usuario(){

            $cuenta =  $this->input->get('cuenta');
            $this->load->model('Usuario_model');               
	    $usuario = $this->Usuario_model->buscar_usuario_x_indicador($cuenta);            
	    if(!empty($usuario)){
                echo json_encode($usuario);
            }
            else{
                echo json_encode(false);
            }
            

	}

	public function usuarios()
	{
                
		$this->load->model('Usuario_model');                
	        $datos['lista_usuarios'] = $this->Usuario_model->listar();    
	        
	        
		$this->load->model('Perfil_model');               
	    	$datos['perfiles'] = $this->Perfil_model->listar() ;    
                
	        $menu['admin']='active';
	    	$menu['adm_usuarios']='active';

	        $this->load->view('templates/header');
        	$this->load->view('templates/menu',$menu);
        	$this->load->view('admin/usuarios',$datos);
        	$this->load->view('templates/footer');
	}

	
/*
 * NUEVO Guarda los datos de un usuario
 */
	public function guardar_usuario(){
            
            $cuenta_usuario =  $this->input->get('cuenta_usuario');
	    $nombre_usuario =  $this->input->get('nombre_usuario');		
            $ape_usuario    =  $this->input->get('ape_usuario');
            $correo         =  $this->input->get('correo');
            $id_rol         =  $this->input->get('id_rol');		
            $contrasenia1    =  $this->input->get('pass1');	
            $contrasenia2    =  $this->input->get('pass2');
            
            //echo json_encode(array("a"=>"b")); 	
                
            $data = array(
                'cuenta_usuario' => $cuenta_usuario,
                'nombre_usuario' => $nombre_usuario,
                'ape_usuario' => $ape_usuario,
                'correo' =>   $correo,
                'id_rol' => $id_rol,
                'contrasenia1' => $contrasenia1,
                'contrasenia2' => $contrasenia2
            );

            $this->form_validation->set_data($data);
            
            
            $this->load->helper('form');
            $this->load->library('form_validation');
           
            $this->form_validation->set_rules('cuenta_usuario', 'Cuenta', 'trim|required|alpha|min_length[4]|max_length[25]');
            $this->form_validation->set_rules('nombre_usuario', 'Nombre', 'required|min_length[2]|max_length[100]|max_length[25]');
            $this->form_validation->set_rules('ape_usuario', 'Apellido', 'required|min_length[2]|max_length[100]|max_length[25]');
            $this->form_validation->set_rules('contrasenia1', 'Password', 'min_length[8]|alpha_numeric');
            $this->form_validation->set_rules('contrasenia2', 'Confirmación de password ', 'matches[contrasenia1]');
            $this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email|max_length[100]');
                       
            $this->form_validation->set_message('trim', 'El campo {field} no debe contener espacios en blanco');
            $this->form_validation->set_message('required', 'El campo {field} es requerido');
            $this->form_validation->set_message('min_length', 'El tamaño mínimo del campo {field} es {param} caracateres');
            $this->form_validation->set_message('max_length', 'El tamaño máximo del campo {field} es {param} caracateres');            
            $this->form_validation->set_message('alpha', 'El campo {field} debe ser alfabético');
            $this->form_validation->set_message('alpha_numeric', 'El campo {field} debe ser alfa-numérico');
            $this->form_validation->set_message('valid_email', 'Formato de correo no válido');
            $this->form_validation->set_message('matches', 'La contraseña y su confirmación deben coincidir');
            
           if ($this->form_validation->run() == FALSE)
            {           
		
               echo json_encode(array(false,$this->form_validation->error_string()));                 
                
            }
            else {               

		$datos['cuenta']    = strtolower($data['cuenta_usuario']);
		$datos['nombre']    = ucwords(strtolower($data['nombre_usuario']));
                $datos['apellido']  = ucwords(strtolower($data['ape_usuario']));
                $datos['correo']    = $data['correo'];
                $datos['id_rol']    = $data['id_rol'];	
		if(!empty($data['contrasenia1'])){                
                    $this->load->helper('security');
                    $datos['contrasenia'] = do_hash($data['contrasenia1'],'384'); // SHA 384            
                }

		$this->load->model('Usuario_model');	
                $id_usuario = $this->Usuario_model->guardar($datos);

                if($id_usuario == false){
                    echo json_encode(array(false,'La cuenta ya se encuentra registrada'));   
                }else{
                    // cisnerose registro de la operacion
                     $this->load->library('liblogging');
                     $msg = 'USUARIO GUARDADO: ID '.$id_usuario;
                     //$this->liblogging->info($this->session->userdata('ip_address'),$this->session->userdata('tx_indicador'),$msg);

                 
                    echo json_encode(array($id_usuario,'Registro exitoso'));
                }
              
            }


	}
/*
 * MODIFICAR un usuario existente
 */
	public function modificar_usuario(){	
		
            $id_usuario     = $this->input->get('id_usuario');
            $cuenta_usuario =  $this->input->get('cuenta_m');
	    $nombre_usuario =  $this->input->get('nombre_usuario_modif');		
            $ape_usuario    =  $this->input->get('ape_usuario_modif');
            $correo         =  $this->input->get('correo_modif');
            $id_rol         =  $this->input->get('id_rol_m');		
            $contrasenia1    =  $this->input->get('pass1_m');	
            $contrasenia2    =  $this->input->get('pass2_m');	
                
            $data = array(
                'cuenta_usuario' => $cuenta_usuario,
                'nombre_usuario' => $nombre_usuario,
                'ape_usuario' => $ape_usuario,
                'correo' =>   $correo,
                'id_rol' => $id_rol,
                'contrasenia1' => $contrasenia1,
                'contrasenia2' => $contrasenia2
            );

            $this->form_validation->set_data($data);
            
            
            $this->load->helper('form');
            $this->load->library('form_validation');
           
            
            
            //var_dump($nombre_usuario );
            
            
            $this->form_validation->set_rules('nombre_usuario', 'Nombre', 'required|min_length[2]|max_length[100]|max_length[25]');
            $this->form_validation->set_rules('ape_usuario', 'Apellido', 'required|min_length[2]|max_length[100]|max_length[25]');                        
            $this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email|max_length[100]');
                       
            $this->form_validation->set_message('trim', 'El campo {field} no debe contener espacios en blanco');
            $this->form_validation->set_message('required', 'El campo {field} es requerido');
            $this->form_validation->set_message('min_length', 'El tamaño mínimo del campo {field} es {param} caracateres');
            $this->form_validation->set_message('max_length', 'El tamaño máximo del campo {field} es {param} caracateres');            
            $this->form_validation->set_message('alpha', 'El campo {field} debe ser alfabético');
            $this->form_validation->set_message('alpha_numeric', 'El campo {field} debe ser alfa-numérico');
            $this->form_validation->set_message('valid_email', 'Formato de correo no válido');
            $this->form_validation->set_message('matches', 'La contraseña y su confirmación deben coincidir');
            if ($this->form_validation->run() == FALSE)
            {           
		
               echo json_encode(array(false,$this->form_validation->error_string()));                 
                
            }
            else {
		
                $datos['cuenta']    = strtolower($data['cuenta_usuario']);
		$datos['nombre']    = ucwords(strtolower($data['nombre_usuario']));
                $datos['apellido']  = ucwords(strtolower($data['ape_usuario']));
                $datos['correo']    = $data['correo'];
                $datos['id_rol']    = $data['id_rol'];	
		if(!empty($data['contrasenia1']) && !empty($data['contrasenia2'])   && $data['contrasenia2'] == $data['contrasenia1'] ){                
                    $this->load->helper('security');
                    $datos['contrasenia'] = do_hash($data['contrasenia1'],'384'); // SHA 384            
                }/*else if($data['contrasenia2'] != $data['contrasenia1']){
                    echo json_encode(array(false,'Las contraseñas deben coincidir'));
                }  */              
                
                $this->load->model('Usuario_model');	
                $usuario_modif = $this->Usuario_model->modificar_x_id($id_usuario,$datos) ;

	    
                if($usuario_modif == false){
                    echo json_encode(array(false,'No se pudo actualizar la cuenta'));
                }else{
                    echo json_encode(array($id_usuario,'Actualización exitosa'));

                }

            }


	}

	public function eliminar_usuario(){
	
            $id_usuario =  $this->input->get('id_usuario');
            $this->load->model('Usuario_model');     
	    $usuario = $this->Usuario_model->buscar_usuario_x_id($id_usuario) ;		
	    $tx_indicador = current($usuario)['cuenta'];
            $tx_nombre = current($usuario)['nombre'];        
            $tx_apellido = current($usuario)['apellido'];        
            $resultado = $this->Usuario_model->eliminar($id_usuario) ;
				
		if ($resultado == true) {       	
                
                 $this->load->library('liblogging');
                 //$msg = 'USUARIO ELIMINADO: ID '.$id_usuario.' Indicador: '.$tx_indicador.' Nombre: '.$tx_nombre_apellido;
                 //$this->liblogging->info($this->session->userdata('ip_address'),$this->session->userdata('tx_indicador'),$msg);
	    }
	   

	    echo json_encode(array('status'=>$resultado));


	}


	public function activar_usuario(){

	
		$id_usuario =  $this->input->get('id_usuario');
		$nu_activo =  $this->input->get('nu_activo');


		$this->load->model('Usuario_model');                
		
		if($nu_activo == 0){
			$datos['nu_activo'] = 1;	
		}else{
			$datos['nu_activo'] = 0;
		}
		
	    $resultado = $this->Usuario_model->modificar($id_usuario, $datos) ;
				
		//print_r($usuario);
		echo json_encode($resultado);


	}

	
       

    
}