<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	function __construct(){

		parent::__construct();     
                $this->load->library('session');                      
             	// Load form validation library
        	$this->load->library('form_validation');
        	$this->load->helper(array('form', 'url'));
		
        }
	
	
       
	
	public function index(){
        $data = $formData = array();        
    
        
        // Pass POST data to view
        $data['postData'] = $formData;
        
        $menu['admin']='active';
        $menu['adm_descargas']='active'; 
       
       // Pass the data to view
       $this->load->view('templates/header');
       $this->load->view('templates/menu', $menu);
        $this->load->view('contacto/index', $data);
        $this->load->view('templates/footer');
    }
    
    
    
    public function enviar(){
    
 
        $data = $formData = array();
         
       //$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
       $recaptchaResponse = trim($this->input->post('captcha')); 
        $userIp=$this->input->ip_address();     
        $secret = $this->config->item('google_secret');         
       
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
        
       //  echo  " $url  <br>";
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
        
       // print_r($status);
 
        if ($status['success']) { // Google Ok
           
          /* $data['status'] = array(
                        'type' => 'success',
                        'msg' => 'Google Ok'
                    );*/
                    
                  // Get the form data
            $formData = $this->input->post();
            
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Asunto', 'required');
            $this->form_validation->set_rules('message', 'Mensaje', 'required');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                
                // Define email data
                $mailData = array(
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'subject' => $formData['subject'],
                    'message' => $formData['message']
                );
                
                // Send an email to the site admin
                $send = $this->sendEmail($mailData);
                
                // Check email sending status
                if($send){
                    // Unset form data
                    $formData = array();
                    
                    $data['status'] = array(
                        'type' => 'success',
                        'msg' => 'Su mensaje ha sido enviado satisfactoriamente, pronto nos estaremos comunicando con usted.'
                    );
                }else{
                    $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Ha ocurrido un problema en el envio del mensaje, por favor verifique e intente nuevamente.'
                    );
                }
            }
    
        
        // Pass POST data to view
        $data['postData'] = $formData;       
           
           
        }else{
        	
        	 $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Usted no puede enviar este mensaje, Por favor haga un nuevo intento con ReCaptcha de Google.'
                    );                        
                  
        }
      
       
       
       
        
      
            
               

        
        $menu['admin']='active';
        $menu['adm_descargas']='active'; 
       
       // Pass the data to view
       $this->load->view('templates/header');
       $this->load->view('templates/menu', $menu);
        $this->load->view('contacto/index', $data);
        $this->load->view('templates/footer');
        
        
    }
    
    
    
    
    private function sendEmail($mailData){
        // Load the email library
        $this->load->library('email');
        
        // Mail config
        ///$to = 'juanv.cisneros@gmail.com';
       $to = 'jordanfloresmolina@gmail.com';       
        $from = 'reppat@gmail.com';
        $fromName = 'REPPAT';
        $mailSubject = 'Solicitud de contacto de '.$mailData['name'];
        
        // Mail content
        $mailContent = '
            <h2>Solicitud de contacto</h2>
            <p><b>Nombre: </b>'.$mailData['name'].'</p>
            <p><b>Correo electrónico: </b>'.$mailData['email'].'</p>
            <p><b>Asunto: </b>'.$mailData['subject'].'</p>
            <p><b>Mensaje: </b>'.$mailData['message'].'</p>
        ';
            
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        
        // Send email & return status
        return $this->email->send()?true:false;
    }
	
	
	
	
	
	

    
}