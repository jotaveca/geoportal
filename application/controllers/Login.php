<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
	    
    function __construct(){
		
                parent::__construct();     
                $this->load->library('session'); 
                
		
    }

        /*
         * Se inicializan las variables para el acceso a la aplicación
         */
	public function index()
	{	               
                require_once APPPATH.'third_party/google-api-php-client/vendor/autoload.php';
                
              
               
                $client_id = '117239104808-ca8eqvj07ene8a912ficemqv3m4vc2ne.apps.googleusercontent.com';
                $client_secret = '3gx2E4lMfyNfw5fKGM3h49Q0';
                $redirect_uri = 'https://reppat.com/roagro/index.php/login/index';
               
                // Create Client Request to access Google API
                $client = new Google_Client();
                $client->setApplicationName("ROAGRO");
                $client->setClientId($client_id);
                $client->setClientSecret($client_secret);
                $client->setRedirectUri($redirect_uri);
              
                $client->addScope("email");
                // Send Client Request
                $objOAuthService = new Google_Service_Oauth2($client);

                // GOOGLE: Add Access Token to Session
                if (isset($_GET['code'])) {
                    $client->authenticate($_GET['code']);
                    $_SESSION['access_token'] = $client->getAccessToken();
                    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                }

                // GOOGLE: Set Access Token to make Request
                if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                    $client->setAccessToken($_SESSION['access_token']);
                }

                // GOOGLE: Autenticación Por GOOGLE
                // Get User Data from Google and store them in $data
                $data;
                $data['mensaje'] = '';
                if ($client->getAccessToken()) {
                    $userData = $objOAuthService->userinfo->get();
                    //$data['userData'] = $userData;
                    $_SESSION['access_token'] = $client->getAccessToken();
                    $_SESSION['userData'] = $userData;
                    
                    $data['google'] = $userData;
                    
                     if(empty($userData->given_name)){
                        
                        	$cuenta    = $userData->email ;
                        	$nombre    = 'Nombre Protegido';
	                	$apellido  = 'Apellido Protegido';
	                	$correo    =  $userData->email;
	                	$nombreApellido = 'Nombres y apellidos protegido';
	                	
                        
                       }else{
                        
                        	
                        	$cuenta    = $userData->email ;
                        	$nombre    = $userData->given_name;
	                	$apellido  = $userData->family_name;
	                	$correo    =  $userData->email;
	                	$nombreApellido = $nombre.' '.$apellido;
                        
                      }
                    
                    $this->load->model('Usuario_model');                            
                    $resultado = $this->Usuario_model->buscar(array('correo'=>$userData->email));                    
                                        
                    if($resultado){
                   
                        $this->session->set_userdata('id', $resultado->id);
                        $this->session->set_userdata('cuenta', $resultado->cuenta);
                        $this->session->set_userdata('correo', $userData->email);
                        $this->session->set_userdata('id_rol',$resultado->id_rol );
                        $this->session->set_userdata('rol',$resultado->rol );
                        $this->session->set_userdata('picture_url',$userData->picture );
                        $this->session->set_userdata('oauth_provider',$resultado->oauth_provider);
                        $this->session->set_userdata('modified',$resultado->modified);
                        $this->session->set_userdata('fe_creacion',$resultado->fe_creacion);
                        $this->session->set_userdata('autenticado', 1);
                        $this->session->set_userdata('nombreApellido', $nombreApellido);
                        $this->session->set_userdata('fecha_ult_acceso', $resultado->ult_acceso); 
                        $this->load->view('templates/header');
                        $this->load->view('templates/menu');
                        $this->load->view('escritorio/index', $data);
                        $this->load->view('templates/footer');
                    }
                    else{
                        
                        /*$authUrl = $client->create
                        ();
                        $data['authUrl'] = $authUrl;
                        $data['mensaje'] = 'El usuario no se encuentra registrado en esta aplicación';
                        $this->load->view('login/index',$data);*/
                        
                                           
                                               
                        $datos['cuenta']    = $cuenta;
			$datos['nombre']    = $nombre;
	                $datos['apellido']  = $apellido;
	                $datos['correo']    = $correo;
	                $datos['id_rol']    = 2;	
	                
	                $id_usuario = $this->Usuario_model->guardar($datos);
	                
	                $this->session->set_userdata('id', $id_usuario);
                        $this->session->set_userdata('cuenta', $userData->email);
                        $this->session->set_userdata('correo', $userData->email);
                        $this->session->set_userdata('id_rol', 2 );
                        $this->session->set_userdata('rol', 'Visitante' );
                        $this->session->set_userdata('picture_url', $userData->picture );
                        $this->session->set_userdata('oauth_provider','Google');
                        $this->session->set_userdata('modified', '');
                        $this->session->set_userdata('fe_creacion','');
                        $this->session->set_userdata('autenticado', 1);
                        $this->session->set_userdata('nombreApellido', $nombreApellido);
                        $this->session->set_userdata('fecha_ult_acceso', ''); 
	                
	                $this->load->view('templates/header');
                        $this->load->view('templates/menu');
                        $this->load->view('escritorio/index');
                        $this->load->view('templates/footer');
	                
	                
                    }
                    
                } else { //Formulario de acceso a la aplicación
                    $authUrl = $client->createAuthUrl();
                    $data['authUrl'] = $authUrl;                    
                    $this->load->view('login/index',$data);  
                }
        	//$this->load->view('login/index',$data);        	

	}

    public function cerrarsesion() {  
        
         require_once APPPATH.'third_party/google-api-php-client/vendor/autoload.php';                

                  $client_id = '117239104808-ca8eqvj07ene8a912ficemqv3m4vc2ne.apps.googleusercontent.com';
                $client_secret = '3gx2E4lMfyNfw5fKGM3h49Q0';
               $redirect_uri = 'https://reppat.com/roagro/index.php/login/index';
                
                
                // Create Client Request to access Google API
                $client = new Google_Client();
                $client->setApplicationName("ROAGRO");
                $client->setClientId($client_id);
                $client->setClientSecret($client_secret);
                $client->setRedirectUri($redirect_uri);
                //$client->setDeveloperKey($simple_api_key);
                $client->addScope("email");
                // Send Client Request
                //unset($_SESSION['access_token']);
                unset($_SESSION);
                $this->session->sess_destroy();        
                $authUrl = $client->createAuthUrl();
                $data['authUrl'] = $authUrl;                    
                $this->load->view('login/index',$data);        
    }
    
    /*
     * Validar acceso por el método de autenticación interno
     */
    public function validar()
	{		
            
            $cuenta = strtolower($this->input->post('tx_indicador'));            
            $tx_contrasena = $this->input->post('tx_contrasena');            
            $this->load->model('Usuario_model');                            
            $resultado = $this->Usuario_model->existe($cuenta) ;
            $this->load->library('liblogging');   
            
            require_once APPPATH.'third_party/google-api-php-client/vendor/autoload.php';
                
                $client_id = '117239104808-ca8eqvj07ene8a912ficemqv3m4vc2ne.apps.googleusercontent.com';
                $client_secret = '3gx2E4lMfyNfw5fKGM3h49Q0';
                $redirect_uri = 'https://reppat.com/roagro/index.php/login/index';
                // Create Client Request to access Google API
                                
                // Create Client Request to access Google API
                $client = new Google_Client();
                $client->setApplicationName("ROAGRO");
                $client->setClientId($client_id);
                $client->setClientSecret($client_secret);
                $client->setRedirectUri($redirect_uri);
                //$client->setDeveloperKey($simple_api_key);
                $client->addScope("email");
                
                 $authUrl = $client->createAuthUrl();
                 $data['authUrl'] = $authUrl;  
                
           //var_dump($resultado);
            
                    

            if($resultado == FALSE){
                $msg = "Usuario o contraseña incorrecta. Por favor contacte al administrador del sistema, cod1";                
                $data['mensaje'] = $msg;
                $this->load->view('login/index',$data); 

            }else{               

                    $this->load->library('seguridad');                     
                    //comunica desarrollo
                    $acceso = $this->Usuario_model->validar_credenciales($cuenta, $tx_contrasena);
                    //$acceso = true;
                    if($acceso){

                            $usuarioBd = $this->Usuario_model->buscar_no_ldap_usuario_x_indicador($cuenta);
                            //var_dump($usuarioBd);
                            
                            $this->session->set_userdata('id', $usuarioBd[0]['id']);
                            $this->session->set_userdata('cuenta', $usuarioBd[0]['cuenta']);
                            $this->session->set_userdata('correo', $usuarioBd[0]['correo']);
                            $this->session->set_userdata('id_rol', $usuarioBd[0]['id_rol']);
                             $this->session->set_userdata('rol',$usuarioBd[0]['rol'] );
                            $this->session->set_userdata('picture_url',$usuarioBd[0]['picture_url'] );
                            $this->session->set_userdata('oauth_provider',$usuarioBd[0]['oauth_provider']);
                            $this->session->set_userdata('modified',$usuarioBd[0]['modified']);
                            $this->session->set_userdata('fe_creacion',$usuarioBd[0]['fe_creacion']);
                            $this->session->set_userdata('autenticado', 1);
                            $this->session->set_userdata('nombreApellido', $usuarioBd[0]['nombre'].' '.$usuarioBd[0]['apellido']);
                            $this->session->set_userdata('fecha_ult_acceso', $usuarioBd[0]['ult_acceso']);                      
                            $this->load->view('templates/header');
                            $this->load->view('templates/menu');
                            $this->load->view('escritorio/index');
                            $this->load->view('templates/footer');
                    }
                    else{
                        $msg = "Usuario o contraseña incorrecta. Por favor contacte al administrador del sistema, cod2";
                        //$this->milogging->warning($this->input->ip_address(),$tx_indicador,$msg);
                        $data['mensaje'] = $msg;                       
                       
                    	       
                        $this->load->view('login/index',$data); 
                    }
            }       	   	

	}

     	       
        
             
}