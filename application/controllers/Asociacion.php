<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asociacion extends CI_Controller {

	function __construct(){

		parent::__construct();     
                $this->load->library('session');
                $this->load->model('galerias_model');
                $this->load->model('Pdf_model');
                
                // Load form validation library
        	$this->load->library('form_validation');
        	$this->load->helper(array('form', 'url', 'html'));
                
            if(empty($this->session->userdata("id")))
            {
                   redirect(site_url().'/login/index','refresh');
            }                		
		
        }
        
          //ELIMINAR IMAGEN
      public function eliminar_pdf(){

          $id_pdf =  $this->input->get('id_pdf');
              
	  $this->Pdf_model->delete($id_pdf) ;

      }
      
        //ELIMINAR IMAGEN
      public function eliminar_imagen(){

          $id_imagen =  $this->input->get('id_imagen');

           $this->load->model('Galerias_model');      
	   $this->Galerias_model->delete($id_imagen) ;

      }
      
      

	public function new()	{

        $menu['asociacion']='active';
        $menu['asociacion_listar']='active';
            
        $this->load->model('Region_model');   
        $datos['regiones'] = $this->Region_model->listar();
                 
        $id_usuario = $this->session->userdata("id");	             		

	$datos['galerias'] = array();	
		
		
        $this->load->view('templates/header');
        $this->load->view('templates/menu', $menu);
        $this->load->view('asociacion/new', $datos);
        $this->load->view('templates/footer');        	
        	
	}

       
            // SUBIR IMAGEN
	public function ajax_upload_img()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|jpeg|png';  
		$config['max_size']             = 4000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;

            $menu['admin']='active';
            $menu['adm_galeria']='active'; 

		$this->load->library('upload', $config);
                 


		if ( ! $this->upload->do_upload('image_file'))
		{
			$error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                       
                        //echo $this->upload->display_errors(); 
               

              echo " <div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-warning'></i>Advertencia</h4>
                ".$this->upload->display_errors()."</div> ";

			
		}
		else
		{
			$data = $this->upload->data();
			$imagen = $data['file_name'];
			$id_usuario = $this->session->userdata("id");
                        $titulo = $this->input->post('titulo');
			
			$id_imagen = $this->galerias_model->save($imagen, $id_usuario);

			$config['image_library'] = 'gd2';
			$config['source_image'] = './upload/'.$imagen;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['new_image'] = './upload/tumb_'.$imagen;
			$config['width']         = 300;
			$config['height']       = 300;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			
			//echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />'; 
			
			echo "<div class='row'>               

      <div class='col-sm-4 col-md-4' id='img_".$id_imagen."' >
        <div class='thumbnail'>
          
            <img  src='".base_url('upload/tumb_'.$data["file_name"])."' class='img img-responsive' />
         

          <div class='caption'>            
            <p class='text-center'>".$titulo."</p>    
            <button type='button' data-imagen-id='".$id_imagen."' data-toggle='modal' data-target='#modal-eliminar-img' class='btn btn-danger'><i class='fa fa-close'></i> Eliminar</button>           
          </div>

        </div>
      </div> 
 </div>
<!-- /.fin row -->
";
	
			
		}
	}
	
	
	
       
       
       // SUBIR PDF
	public function ajax_upload_pdf()
	{
		$config['upload_path']          = './pdf/';
		$config['allowed_types']        = 'pdf';  
		$config['max_size']             = 6000;	
           

		$this->load->library('upload', $config);
                 


		if ( ! $this->upload->do_upload('image_file'))
		{
			$error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                       
                        //echo $this->upload->display_errors(); 
               

              echo " <div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-warning'></i>Advertencia</h4>
                ".$this->upload->display_errors()."</div> ";

			
		}
		else
		{
			$data = $this->upload->data();
			$imagen = $data['file_name'];
			$id_usuario = $this->session->userdata("id");
                        $titulo = $this->input->post('titulo');
			
			$id_pdf = $this->Pdf_model->save($imagen, $id_usuario);			
			 
			
			echo "<div class='row'>               

      <div class='col-sm-4 col-md-4' id='img_".$id_pdf."' >
        <div class='thumbnail'>
          
            <img height='128' width='128' src='".base_url('pdf/pdf.png')."' class='img img-responsive' />
         

          <div class='caption'>            
            <p class='text-center'><a target='_blank' href=".base_url('pdf/'.$data["file_name"]).">Descargar (".$titulo.")</a></p>    
            <button type='button' data-pdf-id='".$id_pdf."' data-toggle='modal' data-target='#modal-eliminar-pdf' class='btn btn-danger'><i class='fa fa-close'></i> Eliminar</button>          
          

           
          </div>

        </div>
      </div> 
 </div>
<!-- /.fin row -->
";
	
			
		}
	}




	public function edit()	{			
            
        $menu['asociacion']='active';
        $menu['asociacion_listar']='active';

        $this->load->model('Region_model');   
        $datos['regiones'] = $this->Region_model->listar();
        
        $this->load->model('Provincia_model');   
        $datos['provincias'] = $this->Provincia_model->listar();
        
        $this->load->model('Distrito_model');   
        $datos['distritos'] = $this->Distrito_model->listar();        
        

        $id =  $this->input->get('id_proyecto');
        $id_usuario = $this->session->userdata("id");	
        
        $datos['pdfs'] = $this->Pdf_model->get_pdf_usuario_proyecto($id_usuario, $id);	
        $datos['galerias'] = $this->galerias_model->get_galerias_usuario_proyecto($id_usuario, $id);
         
         
        
        $this->load->model('Asociacion_model');      
	    $datos['asociaciones'] = $this->Asociacion_model->listar_x_id($id) ;
	    $datos['centros_poblados_proyecto'] =  $this->Asociacion_model->listar_centro_poblado_x_proyectos($id);		


	    $datos['asociaciones'][0]['tx_certificacion_cacao'] = explode(",", $datos['asociaciones'][0]['tx_certificacion_cacao']);
	    $datos['asociaciones'][0]['tx_certificacion_cafe'] = explode(",", $datos['asociaciones'][0]['tx_certificacion_cafe']);
	    $datos['asociaciones'][0]['tx_certificacion_otro'] = explode(",", $datos['asociaciones'][0]['tx_certificacion_otro']);
	    //Array con la ubicación
		$this->load->model('Region_model');
		$nb_region_ejec = $this->Region_model->buscar_x_id($datos['asociaciones'][0]['id_region_ejec']);	    
	    
		$this->load->model('Provincia_model');
	    $nb_provincia_ejec = $this->Provincia_model->buscar_x_id($datos['asociaciones'][0]['id_provincia_ejec']);	    
	    
	    $this->load->model('Distrito_model');
	    $nb_distrito_ejec = $this->Distrito_model->buscar_x_id($datos['asociaciones'][0]['id_distrito_ejec']);
	   	
	   	$this->load->model('Poblacion_model');    	
        $datos['centros_poblados_ejec'] = $this->Poblacion_model->listar_x_region_provincia_distrito($nb_region_ejec[0]['name'], $nb_provincia_ejec[0]['name'], $nb_distrito_ejec[0]['name']);
		      
        $nb_region = $datos['asociaciones'][0]['nb_region'];
	    $nb_provincia = $datos['asociaciones'][0]['nb_provincia'];
	    $nb_distrito = $datos['asociaciones'][0]['nb_distrito'];

	    //Array con el ámbito de acción
        $datos['centros_poblados'] = $this->Poblacion_model->listar_x_region_provincia_distrito($nb_region, $nb_provincia, $nb_distrito);     

        $this->load->view('templates/header');
    	$this->load->view('templates/menu', $menu);
    	$this->load->view('asociacion/edit', $datos);
    	$this->load->view('templates/footer');      

    	
	}
	
	public function guardarDescargaUsuario(){
	
		$id_usuario = $this->session->userdata("id");
		$id_rol = $this->session->userdata("id_rol");
		$hoy = date("Y-m-d H:i:s"); 
		
		$datos['id_usuario']=  $id_usuario;      
		$datos['id_rol']=  $id_rol;      
		$datos['nu_descargas']=  1;      
		$datos['fecha_ult_descarga	']=  $hoy;      
		
		$this->load->model('Descarga_model');      
	    	$insert = $this->Descarga_model->guardar($datos) ;
	
	
	}
	
	public function validarDescarga(){
	
		$id_usuario = $this->session->userdata("id");	
		$this->load->model('Descarga_model');      
	    	return  $this->Descarga_model->existe($id_usuario) ;
	
	
	}
	
	
	
	
	public function exportar_excel()	{
		
 		$nu_descargas_usuario = $this->validarDescarga();         
 		
 		//echo "nu_descargas_usuario". $nu_descargas_usuario;
 		
 		if($this->session->userdata("id_rol") == 2 && $nu_descargas_usuario > 1) // Visitante
	        {
	                redirect(site_url().'?msg=1','refresh');
	               	                
            	}  
            	
            	$this->guardarDescargaUsuario();             	          	            	
		

			$id_proyecto =  $this->input->get('id_proyecto');
		    
		$this->load->model('Asociacion_model');      
	    	$datos['proyectos'] = $this->Asociacion_model->listar_x_id($id_proyecto) ;
	    	$id_usuario = $this->session->userdata("id");
	    	
	    	$this->load->model('Region_model');  
	    	$this->load->model('Provincia_model');   
	    	$this->load->model('Distrito_model'); 
	    	$this->load->model('Poblacion_model'); 
	    	$this->load->model('Asociacion_centro_poblado_model'); 
	    	   		    	
            
	    	
	    	$id_centro_poblado_ejec = $datos['proyectos'][0]['id_centro_poblado_ejec'];
	    	
	       
                $datos['centros_poblados_ejec'] = $this->Poblacion_model->buscar_x_cod($id_centro_poblado_ejec);
                $datos['centros_poblados_ambito'] = $this->Asociacion_centro_poblado_model->buscar_x_asociacion($id_proyecto); 
                $datos['galerias'] = $this->galerias_model->get_galerias_usuario_proyecto_excel($id_usuario, $id_proyecto);
                
                $datos['proyecto_asociacion'] = $this->Asociacion_model->listar_proyecto_asociacion($id_proyecto);              
                
   

        	$this->load->view('asociacion/excel', $datos);
        	
        	
	}
	
	
	public function buscar_provincia(){


		$id_region =  $this->input->get('id_region');
		$this->load->model('Provincia_model');                
	    $provincia = $this->Provincia_model->listar_x_region($id_region);
	    echo json_encode($provincia);

	}
	
	public function buscar_distrito(){


		$id_region =  $this->input->get('id_region');
		$id_provincia =  $this->input->get('id_provincia');
		$this->load->model('Distrito_model');                
    	$distrito = $this->Distrito_model->listar_x_provincia_region($id_region, $id_provincia);
    	echo json_encode($distrito);

	}
	
		
	public function buscar_centro_poblado(){

		$nb_region =  $this->input->get('nb_region');
		$nb_provincia =  $this->input->get('nb_provincia');
		$nb_distrito =  $this->input->get('nb_distrito');        
        $this->load->model('Poblacion_model');   
        $centros_poblados = $this->Poblacion_model->listar_x_region_provincia_distrito($nb_region, $nb_provincia, $nb_distrito);
    	echo json_encode($centros_poblados);

	}
	
	
	
	public function eliminar_proyecto_asociacion(){
		
		$id =  $this->input->get('id');
		$this->load->model('Asociacion_model');      
	    $resultado = $this->Asociacion_model->eliminar_proyecto_asociacion($id);    	
	    echo json_encode($resultado);
		
	}

	public function eliminar(){
		
		$id =  $this->input->get('id_proyecto');
		$this->load->model('Asociacion_model');      
	    $resultado = $this->Asociacion_model->eliminar_asociacion($id);    	
	    echo json_encode($resultado);
		
	}
	
	
	public function list()	{


            $menu['asociacion']='active';
            $menu['asociacion_listar']='active';            
            $this->load->model('Asociacion_model'); 
            
            $id_usuario = $this->session->userdata("id");
            $id_rol = $this->session->userdata("id_rol");            
            
            if($id_rol == 3){ //administrador
            
            	$datos['proyectos'] = $this->Asociacion_model->listar();
            
            }else{
             	$datos['proyectos'] = $this->Asociacion_model->listar_x_usuario($id_usuario);
            
            }              

            $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('asociacion/list', $datos);
        	$this->load->view('templates/footer');
	}
	



	
	public function guardar_general(){
		
        $datos['id_usuario'] = $this->session->userdata("id");     	    	    
	    $datos['tx_mision'] =  $this->input->get('tx_mision');
	    $datos['tx_vision'] =  $this->input->get('tx_vision');
	    
	    $fe_registro= $this->input->get('fe_registro');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_registro);
        $fe_registro = $date->format('Y/m/d');
        $datos['fe_registro']= $fe_registro;
	    
        $fe_actualizacion= $this->input->get('fe_actualizacion');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_actualizacion);
        $fe_actualizacion = $date->format('Y/m/d');
        $datos['fe_actualizacion']= $fe_actualizacion;	   
	    
	    $datos['tx_razon'] =  $this->input->get('tx_razon');
	    $datos['tx_ruc'] =  $this->input->get('tx_ruc');	    
	    $datos['tx_nombre'] =  $this->input->get('tx_nombre');
	   
	    
	    $fe_inicio_actividades = $this->input->get('fe_inicio_actividades');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_inicio_actividades);
        $fe_inicio_actividades = $date->format('Y/m/d');
        $datos['fe_inicio_actividades']= $fe_inicio_actividades;        

        $datos['tx_pagina'] =  $this->input->get('tx_pagina'); 
        $datos['tx_correo'] =  $this->input->get('tx_correo');
        $datos['nu_socios_colonos'] =  $this->input->get('nu_socios_colonos');
        $datos['nu_socios_indigenas'] =  $this->input->get('nu_socios_indigenas');
        $datos['nu_socios_total'] =  $this->input->get('nu_socios_total');
        $datos['tx_telefono'] =  $this->input->get('tx_telefono'); 	

        $datos['id_pais_ejec   '] =  $this->input->get('id_pais_ejec'); 
		$datos['id_region_ejec   '] =  $this->input->get('id_region_ejec'); 
		$datos['id_provincia_ejec   '] =  $this->input->get('id_provincia_ejec'); 
		$datos['id_distrito_ejec   '] =  $this->input->get('id_distrito_ejec'); 
		$datos['id_centro_poblado_ejec   '] =  $this->input->get('id_centro_poblado_ejec'); 
		$datos['tx_centro_poblado_direccion   '] =  $this->input->get('tx_centro_poblado_direccion'); 
		$datos['tx_direccion   '] =  $this->input->get('tx_direccion');		
		
		$datos['id_pais'] =  $this->input->get('id_pais'); 
		$datos['id_distrito'] =  $this->input->get('id_distrito'); 
		$datos['id_provincia'] =  $this->input->get('id_provincia'); 
		$datos['id_region'] =  $this->input->get('id_region'); 
		
		$this->load->model('Asociacion_model');               
	    $id_asociacion = $this->Asociacion_model->guardar($datos);    
		
		//GUARDAR CENTRO POBLADO
        $this->load->model('Asociacion_centro_poblado_model');  
        $array_centro_poblado = utf8_encode($this->input->get('array_centro_poblado')); // Don't forget the encoding
        $json_centro_poblado = json_decode($array_centro_poblado);
        
        foreach ($json_centro_poblado as $key => $value){
            
            //echo "<br> Valor: $value";
            $input_centro_poblado ["id_asociacion"] = $id_asociacion;
            $input_centro_poblado ["id_centro_poblado"] = $value;
            $data_centro_poblado = $this->Asociacion_centro_poblado_model->guardar($input_centro_poblado);
        
        }
		
	    echo json_encode($id_asociacion);
	
	}


	public function guardar_estructura(){        
       
       	$id =  $this->input->get('id');   
       	$datos['tx_tipo'] =  $this->input->get('tx_tipo');                     
	    $datos['tx_presidente_ca'] =  $this->input->get('tx_presidente_ca');
        $datos['tx_vicepresidente_ca   '] =  $this->input->get('tx_vicepresidente_ca');        
        $datos['tx_secretario_ca   '] =  $this->input->get('tx_secretario_ca');
        $datos['tx_vocal_1_ca'] =  $this->input->get('tx_vocal_1_ca');
        $datos['tx_vocal_2_ca'] =  $this->input->get('tx_vocal_2_ca');
        $datos['tx_presidente_ceduc'] =  $this->input->get('tx_presidente_ceduc');
        $datos['tx_vicepresidente_ceduc'] =  $this->input->get('tx_vicepresidente_ceduc');
        $datos['tx_secretario_ceduc   '] =  $this->input->get('tx_secretario_ceduc');
        $datos['tx_presidente_celect   '] =  $this->input->get('tx_presidente_celect');        
        $datos['tx_vicepresidente_celect   '] =  $this->input->get('tx_vicepresidente_celect');
        $datos['tx_secretario_celect   '] =  $this->input->get('tx_secretario_celect');
        $datos['tx_nombre_gerente   '] =  $this->input->get('tx_nombre_gerente');
        $datos['tx_telefono_gerente   '] =  $this->input->get('tx_telefono_gerente');
        $datos['tx_correo_gerente   '] =  $this->input->get('tx_correo_gerente');
        $datos['tx_presidente_asociacion   '] =  $this->input->get('tx_presidente_asociacion');
        $datos['tx_vicepresidente_asociacion   '] =  $this->input->get('tx_vicepresidente_asociacion');
        $datos['tx_secretario_asociacion   '] =  $this->input->get('tx_secretario_asociacion');
        $datos['tx_tesorero_asociacion   '] =  $this->input->get('tx_tesorero_asociacion');
        $datos['tx_vocal_1_asociacion   '] =  $this->input->get('tx_vocal_1_asociacion');
		$datos['tx_vocal_2_asociacion   '] =  $this->input->get('tx_vocal_2_asociacion');
		
		$this->load->model('Asociacion_model');	    
	    $this->Asociacion_model->modificar($id, $datos);	    
	
	}


	public function guardar_produccion(){

        $id =  $this->input->get('id');   	    
	    $datos['tx_oferta_cafe'] =  $this->input->get('tx_oferta_cafe');
        $datos['tx_cosecha_cafe'] =  $this->input->get('tx_cosecha_cafe');
        $datos['tx_calidad_cafe'] =  $this->input->get('tx_calidad_cafe');
        $datos['tx_produccion_cafe'] =  $this->input->get('tx_produccion_cafe');
        $datos['tx_variedades_cafe'] =  $this->input->get('tx_variedades_cafe');
        $datos['tx_certificacion_cafe'] =  $this->input->get('tx_certificacion_cafe');   
        $datos['tx_oferta_cacao'] =  $this->input->get('tx_oferta_cacao');   
        $datos['tx_cosecha_cacao'] =  $this->input->get('tx_cosecha_cacao');   
        $datos['tx_produccion_cacao'] =  $this->input->get('tx_produccion_cacao');   
        $datos['tx_variedades_cacao'] =  $this->input->get('tx_variedades_cacao');   
        $datos['tx_certificacion_cacao'] =  $this->input->get('tx_certificacion_cacao');   
        $datos['tx_otro'] =  $this->input->get('tx_otro');   
        $datos['tx_oferta_otro'] =  $this->input->get('tx_oferta_otro');   
        $datos['tx_cosecha_otro'] =  $this->input->get('tx_cosecha_otro');
        $datos['tx_produccion_otro'] =  $this->input->get('tx_produccion_otro');  
        $datos['tx_variedades_otro'] =  $this->input->get('tx_variedades_otro'); 
        $datos['tx_certificacion_otro'] =  $this->input->get('tx_certificacion_otro'); 
            
	   	$this->load->model('Asociacion_model');	    
	    $this->Asociacion_model->modificar($id, $datos);	
	
	}


	public function guardar_otros(){

		$id =  $this->input->get('id');  
  		$datos['tx_capacitacion'] =  $this->input->get('tx_capacitacion'); 
		$datos['tx_acopio'] =  $this->input->get('tx_acopio'); 
		$datos['tx_comercializacion'] =  $this->input->get('tx_comercializacion'); 
        $datos['tx_productos'] =  $this->input->get('tx_productos'); 
        $datos['tx_servicios'] =  $this->input->get('tx_servicios'); 
        $datos['tx_descripcion_logros'] =  $this->input->get('tx_descripcion_logros');
        $datos['tx_descripcion_clientes'] =  $this->input->get('tx_descripcion_clientes');
        $datos['tx_descripcion_alianzas'] =  $this->input->get('tx_descripcion_alianzas');
        $datos['tx_descripcion_siguenos'] =  $this->input->get('tx_descripcion_siguenos');
            
	   	$this->load->model('Asociacion_model');	    
	    $this->Asociacion_model->modificar($id, $datos);	
	
	}
	

	public function guardar_proyecto(){
  		
		$datos['id_asociacion'] =  $this->input->get('id');  
		$datos['tx_nombre_proyecto'] =  $this->input->get('tx_nombre_proyecto');
		$datos['tx_entidad_ejecutora'] =  $this->input->get('tx_entidad_ejecutora');
		$datos['nu_presupuesto'] =  $this->input->get('nu_presupuesto');	 

		$fe_inicio= $this->input->get('fe_inicio');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_inicio);
        $fe_inicio = $date->format('Y/m/d');
        $datos['fe_inicio']= $fe_inicio;	

        $fe_fin= $this->input->get('fe_fin');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_fin);
        $fe_fin = $date->format('Y/m/d');
        $datos['fe_fin']= $fe_fin;	  

		$datos['tx_actividades'] =  $this->input->get('tx_actividades');         
        $this->load->model('Asociacion_model');	     
	    $id_proyectos_asociacion = $this->Asociacion_model->guardar_proyecto_asociacion($datos);	    
	    $proyectos_asociacion_lista=$this->Asociacion_model->listar_proyecto_asociacion($datos['id_asociacion']);
	    echo json_encode($proyectos_asociacion_lista);

	}

	public function modificar_proyecto_asociacion(){

		$id_asociacion =  $this->input->get('id');    		
  		$id_proyecto =  $this->input->get('id_modificar_proyecto');    	
  		
  		$datos['tx_nombre_proyecto'] =  $this->input->get('tx_nombre_proyecto'); 
		$datos['tx_entidad_ejecutora'] =  $this->input->get('tx_entidad_ejecutora'); 
		$datos['nu_presupuesto'] =  $this->input->get('nu_presupuesto'); 
        $datos['fe_inicio'] =  $this->input->get('fe_inicio'); 
        $datos['fe_fin'] =  $this->input->get('fe_fin'); 
        $datos['tx_actividades'] =  $this->input->get('tx_actividades');
       
       	$this->load->model('Asociacion_model');	    
	    $this->Asociacion_model->modificar_proyecto_asociacion($id_proyecto, $datos);	
	    
	    $proyectos_asociacion_lista=$this->Asociacion_model->listar_proyecto_asociacion($id_asociacion);	    
	    echo json_encode($proyectos_asociacion_lista);
	
	
	}

	public function listar_proyecto_asociacion(){

		$id_asociacion =  $this->input->get('id_asociacion');   			    
	    $proyectos_asociacion_lista=1;
	    $this->load->model('Asociacion_model');	 
	    $resultado=$this->Asociacion_model->listar_proyecto_asociacion($id_asociacion);	    
	    echo json_encode($resultado);
	
	
	}



	public function listar_proyecto_asociacion_id(){

		$id =  $this->input->get('id');             
        $this->load->model('Asociacion_model');   
        $resultado = $this->Asociacion_model->listar_proyecto_asociacion_id($id);
     	echo json_encode($resultado);

	}

	public function modificar_general(){

		$id =  $this->input->get('id');
        $datos['id_usuario'] = $this->session->userdata("id");     	    	    
	    $datos['tx_mision'] =  $this->input->get('tx_mision');
	    $datos['tx_vision'] =  $this->input->get('tx_vision');
	    
	    $fe_registro= $this->input->get('fe_registro');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_registro);
        $fe_registro = $date->format('Y/m/d');
        $datos['fe_registro']= $fe_registro;
	    
        $fe_actualizacion= $this->input->get('fe_actualizacion');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_actualizacion);
        $fe_actualizacion = $date->format('Y/m/d');
        $datos['fe_actualizacion']= $fe_actualizacion;	   
	    
	    $datos['tx_razon'] =  $this->input->get('tx_razon');
	    $datos['tx_ruc'] =  $this->input->get('tx_ruc');	    
	    $datos['tx_nombre'] =  $this->input->get('tx_nombre');
	   
	    
	    $fe_inicio_actividades = $this->input->get('fe_inicio_actividades');
	    $date = DateTime::createFromFormat('d/m/Y', $fe_inicio_actividades);
        $fe_inicio_actividades = $date->format('Y/m/d');
        $datos['fe_inicio_actividades']= $fe_inicio_actividades;        

        $datos['tx_pagina'] =  $this->input->get('tx_pagina'); 
        $datos['tx_correo'] =  $this->input->get('tx_correo');
        $datos['nu_socios_colonos'] =  $this->input->get('nu_socios_colonos');
        $datos['nu_socios_indigenas'] =  $this->input->get('nu_socios_indigenas');
        $datos['tx_telefono'] =  $this->input->get('tx_telefono'); 	

        $datos['id_pais_ejec   '] =  $this->input->get('id_pais_ejec'); 
		$datos['id_region_ejec   '] =  $this->input->get('id_region_ejec'); 
		$datos['id_provincia_ejec   '] =  $this->input->get('id_provincia_ejec'); 
		$datos['id_distrito_ejec   '] =  $this->input->get('id_distrito_ejec'); 
		$datos['id_centro_poblado_ejec   '] =  $this->input->get('id_centro_poblado_ejec'); 
		$datos['tx_centro_poblado_direccion   '] =  $this->input->get('tx_centro_poblado_direccion'); 
		$datos['tx_direccion   '] =  $this->input->get('tx_direccion');		
		
		$datos['id_pais'] =  $this->input->get('id_pais'); 
		$datos['id_distrito'] =  $this->input->get('id_distrito'); 
		$datos['id_provincia'] =  $this->input->get('id_provincia'); 
		$datos['id_region'] =  $this->input->get('id_region'); 
		
		$this->load->model('Asociacion_model');               
	    $resultado=$this->Asociacion_model->modificar($id, $datos);    
		
		//GUARDAR CENTRO POBLADO
        $this->load->model('Asociacion_centro_poblado_model'); 
        $this->Asociacion_centro_poblado_model->eliminar($id);
        $array_centro_poblado = utf8_encode($this->input->get('array_centro_poblado')); // Don't forget the encoding
        $json_centro_poblado = json_decode($array_centro_poblado);
        
        foreach ($json_centro_poblado as $key => $value){
            
            //echo "<br> Valor: $value";
            $input_centro_poblado ["id_asociacion"] = $id;
            $input_centro_poblado ["id_centro_poblado"] = $value;
            $data_centro_poblado = $this->Asociacion_centro_poblado_model->guardar($input_centro_poblado);
        
        }
		
	
	}


	
	
	

    
}