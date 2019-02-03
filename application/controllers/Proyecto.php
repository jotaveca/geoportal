<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	function __construct(){

		parent::__construct();     
                $this->load->library('session');
                $this->load->model('galerias_model');
                $this->load->model('shapefile_model');
                // Load form validation library
        	$this->load->library('form_validation');
        	$this->load->helper(array('form', 'url', 'html'));
                
            if(empty($this->session->userdata("id")))
            {
                   redirect(site_url().'/login/index','refresh');
            }             
           
                
                		
		
        }



      //ELIMINAR IMAGEN
      public function eliminar_imagen(){

          $id_imagen =  $this->input->get('id_imagen');

           $this->load->model('Galerias_model');      
	   $this->Galerias_model->delete($id_imagen) ;

      }
     
     
      //ELIMINAR IMAGEN
      public function eliminar_shp(){

          $id_shp =  $this->input->get('id_shp');
              
	  $this->shapefile_model->delete($id_shp) ;

      }
     
     
          // SUBIR SHAPEFILE
	public function ajax_upload_shp()
	{
		$config['upload_path']          = './shapefile/';
		$config['allowed_types']        = 'zip';  
		$config['max_size']             = 4000;
		//$config['max_width']            = 5000;
		//$config['max_height']           = 5000;

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
			
			$id_shp = $this->shapefile_model->save($imagen, $id_usuario);			
			 
			
			echo "<div class='row'>               

      <div class='col-sm-4 col-md-4' id='img_".$id_shp."' >
        <div class='thumbnail'>
          
            <img height='128' width='128' src='".base_url('shapefile/shapefiles.png')."' class='img img-responsive' />
         

          <div class='caption'>            
            <p class='text-center'>".$titulo."</p>    
            <button type='button' data-shp-id='".$id_shp."' data-toggle='modal' data-target='#modal-eliminar-shp' class='btn btn-danger'><i class='fa fa-close'></i> Eliminar</button>
            
            <button type='button' data-shp-id='".$id_shp."' data-toggle='modal' data-target='#modal-ver-shp' class='btn btn-primary'> <i class='fa fa-map-marker'></i> Mapa</button> 

           
          </div>

        </div>
      </div> 
 </div>
<!-- /.fin row -->
";
	
			
		}
	}



     
     // SUBIR IMAGEN
	public function ajax_upload()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|jpeg|png|gif';  
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
            <button type='button' data-imagen-id='".$id_imagen."' data-toggle='modal' data-target='#modal-eliminar' class='btn btn-danger'><i class='fa fa-close'></i> Eliminar</button>           
          </div>

        </div>
      </div> 
 </div>
<!-- /.fin row -->
";
	
			
		}
	}
	
	 
        
        
	
      public function ajax_upload_origen()  
      {  
           if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
                     $data = $this->upload->data();  
                     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
                }  
           }  
      }  
	
	
	
	

	public function new()
	{


            $menu['proyecto']='active';
            $menu['proyecto_nuevo']='active';
            
            $this->load->model('Region_model');   
            $datos['regiones'] = $this->Region_model->listar();
            $datos['shapefiles'] = array();

            $id_proyecto = 0;
            
            $inicio = 0;
	    $limite = 6; // Numero de registros por listado
	    $id_usuario = $this->session->userdata("id");		

		$datos['galerias'] = $this->galerias_model->get_galerias_usuario_proyecto($id_usuario, $id_proyecto);
            
            
            
            $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('proyecto/new', $datos);
        	$this->load->view('templates/footer');
        	
        	
	}
	
	public function edit()
	{

		$menu['proyecto']='active';
            $menu['proyecto_listar']='active';
            
            $this->load->model('Region_model');   
            $datos['regiones'] = $this->Region_model->listar();
            
            $this->load->model('Provincia_model');   
            $datos['provincias'] = $this->Provincia_model->listar();
            
            $this->load->model('Distrito_model');   
            $datos['distritos'] = $this->Distrito_model->listar();
            
         
	    $id_proyecto =  $this->input->get('id_proyecto');

            
            $inicio = 0;
	    $limite = 6; // Numero de registros por listado
	    $id_usuario = $this->session->userdata("id");		

	    $datos['galerias'] = $this->galerias_model->get_galerias_usuario_proyecto($id_usuario, $id_proyecto);
	    $datos['shapefiles'] = $this->shapefile_model->get_shapefiles_usuario_proyecto($id_usuario, $id_proyecto);


		$this->load->model('Proyecto_model');      
	    	$datos['proyectos'] = $this->Proyecto_model->listar_x_id($id_proyecto) ;
	    	
	    	//"AMAZONAS", "BAGUA", "IMAZA"
	    	$nb_region_proy = $datos['proyectos'][0]['nb_region_proy'];
	    	$nb_provincia_proy = $datos['proyectos'][0]['nb_provincia_proy'];
	    	$nb_distrito_proy = $datos['proyectos'][0]['nb_distrito_proy'];
	    	
            $this->load->model('Poblacion_model');  
            $datos['centros_poblados'] = $this->Poblacion_model->listar_x_region_provincia_distrito($nb_region_proy, $nb_provincia_proy, $nb_distrito_proy);
            
            $datos['resultados_proyecto'] =  $this->Proyecto_model->listar_resultados_x_proyectos($id_proyecto);
            $datos['actividades_proyecto'] =  $this->Proyecto_model->listar_actividades_x_proyectos($id_proyecto);
            
            $datos['centros_poblados_proyecto'] =  $this->Proyecto_model->listar_centro_poblado_x_proyectos($id_proyecto);
            
            
            
            
	    	
	    	  // var_dump($datos['proyectos']);
	    	
            $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('proyecto/edit', $datos);
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
	
	
	
	
	public function exportar_excel()
	{

 		$nu_descargas_usuario = $this->validarDescarga();         
 		
 		//echo "nu_descargas_usuario". $nu_descargas_usuario;
 		
 		if($this->session->userdata("id_rol") == 2 && $nu_descargas_usuario > 1) // Visitante
	        {
	                redirect(site_url().'?msg=1','refresh');
	                //redirect(base_url("login/index/123").'?m=1','refresh');
	                
            	}  
            	
            	$this->guardarDescargaUsuario();             	          	            	


		$id_proyecto =  $this->input->get('id_proyecto');
		    $this->load->model('Proyecto_model');      
	    	$datos['proyectos'] = $this->Proyecto_model->listar_x_id($id_proyecto) ;
	    	
	    	$this->load->model('Region_model');  
	    	$this->load->model('Provincia_model');   
	    	$this->load->model('Distrito_model'); 
	    	
            
	    	$id_region_ejec = $datos['proyectos'][0]['id_region_ejec'];
	    	$id_provincia_ejec = $datos['proyectos'][0]['id_provincia_ejec'];
	    	$id_distrito_ejec = $datos['proyectos'][0]['id_distrito_ejec'];
	    	
	        $id_region_finan = $datos['proyectos'][0]['id_region_finan'];
	    	$id_provincia_finan = $datos['proyectos'][0]['id_provincia_finan'];
	    	$id_distrito_finan = $datos['proyectos'][0]['id_distrito_finan'];
	    	
            
            $regiones_ejec = $this->Region_model->buscar_x_id($id_region_ejec);
            $provincia_ejec = $this->Provincia_model->buscar_x_id($id_provincia_ejec);
            $distritos_ejec = $this->Distrito_model->buscar_x_id($id_distrito_ejec);
            
            $regiones_finan = $this->Region_model->buscar_x_id($id_region_finan);
            $provincia_finan = $this->Provincia_model->buscar_x_id($id_provincia_finan);
            $distritos_finan = $this->Distrito_model->buscar_x_id($id_distrito_finan);            
                                
            
            
            $datos['proyectos'][0]['nb_region_ejec'] = $regiones_ejec[0]['name'];
            $datos['proyectos'][0]['nb_provincia_ejec'] = $provincia_ejec[0]['name'];
            $datos['proyectos'][0]['nb_distritos_ejec'] = $distritos_ejec[0]['name'];
            
            //No todos los proyectos tienen entidad financiera. 
            
            $datos['proyectos'][0]['nb_region_finan']    = @$regiones_finan[0]['name'];
            $datos['proyectos'][0]['nb_provincia_finan'] = @$provincia_finan[0]['name'];
            $datos['proyectos'][0]['nb_distritos_finan'] = @$distritos_finan[0]['name'];
            
            $datos['centros_poblados_proyecto'] =  $this->Proyecto_model->listar_centro_poblado_x_proyectos($id_proyecto);
            //Resultados Actividades
            
            $datos['actividades_proyecto'] =  $this->Proyecto_model->listar_actividades_x_proyectos($id_proyecto);
             
            $id_usuario = $this->session->userdata("id");
            $datos['galerias'] = $this->galerias_model->get_galerias_usuario_proyecto_excel($id_usuario, $id_proyecto);
        
        	$this->load->view('proyecto/excel', $datos);
        	
        	
	}
	
	
	public function edit_id(){


			$id_proyecto =  $this->input->get('id_proyecto');
			$id_entidad_ejecutora =  $this->input->get('id_entidad_ejecutora');
			$id_entidad_financiera =  $this->input->get('id_entidad_financiera');
	
	
	//GUARDAR EJECUTORA
        
        $datos2['tx_razon_social'] =  $this->input->get('tx_nombre_ejec');
	    $datos2['tx_ruc'] =  $this->input->get('tx_ruc_ejec');
	    $datos2['tx_direccion'] =  $this->input->get('tx_direccion_ejec');
	    $datos2['id_pais'] =  $this->input->get('id_pais_ejec');
	    $datos2['id_region'] =  $this->input->get('id_region_ejec');
	    $datos2['id_provincia'] =  $this->input->get('id_provincia_ejec');
	    $datos2['id_distrito'] =  $this->input->get('id_distrito_ejec');
	    $datos2['tx_telefono'] =  $this->input->get('tx_telefono_ejec');
	    $datos2['tx_pagina_web'] =  $this->input->get('tx_pagina_web_ejec');
	    $datos2['tx_correo_electronico'] =  $this->input->get('tx_correo_electronico_ejec');
            

		$this->load->model('Ejecutora_model');   
        $ejecutora = $this->Ejecutora_model->modificar($id_entidad_ejecutora, $datos2) ;
        
        //GUARDAR FINANCIERA
        
        $datos3['tx_razon_social'] =  $this->input->get('tx_nombre_finan');
	    $datos3['tx_ruc'] =  $this->input->get('tx_ruc_finan');
	    $datos3['tx_direccion'] =  $this->input->get('tx_direccion_finan');
	    $datos3['id_pais'] =  $this->input->get('id_pais_finan');
	    $datos3['id_region'] =  $this->input->get('id_region_finan');
	    $datos3['id_provincia'] =  $this->input->get('id_provincia_finan');
	    $datos3['id_distrito'] =  $this->input->get('id_distrito_finan');
	    $datos3['tx_telefono'] =  $this->input->get('tx_telefono_finan');
	    $datos3['tx_pagina_web'] =  $this->input->get('tx_pagina_web_finan');
	    $datos3['tx_correo_electronico'] =  $this->input->get('tx_correo_electronico_finan');
            

		$this->load->model('Financiera_model');   
        $financiera = $this->Financiera_model->modificar($id_entidad_financiera, $datos3) ;
        
        
        	    //GUARDAR IDENTIFICACIÓN
	   
	    $datos['tx_nombre'] =  $this->input->get('tx_nombre');
	    $datos['tx_siglas'] =  $this->input->get('tx_siglas');
	    $datos['tx_intervencion'] =  $this->input->get('tx_intervencion');
	    $datos['tx_rubro'] =  $this->input->get('tx_rubro');
	    
	    $datos['tx_tipo_intervencion'] =  $this->input->get('tx_tipo_intervencion');
	    $datos['tx_situacion_intervencion'] =  $this->input->get('tx_situacion_intervencion');
	    
	    $datos['tx_co_snip'] =  $this->input->get('tx_co_snip');
	    $datos['nu_beneficiarios'] =  $this->input->get('nu_beneficiarios');
	    $datos['id_pais'] =  $this->input->get('id_pais');
	    $datos['id_region'] =  $this->input->get('id_region');
	    $datos['id_provincia'] =  $this->input->get('id_provincia');
	    $datos['id_distrito'] =  $this->input->get('id_distrito');
	    $datos['tx_otro_centro_poblado'] =  $this->input->get('tx_otro_centro_poblado');
	    //$datos['id_centro_poblado'] =  $this->input->get('id_centro_poblado');
	    
	    //COSTOS
	    $datos['tx_tipo_moneda'] =  $this->input->get('tx_tipo_moneda');
	    $datos['nu_presupuesto_total'] =  $this->input->get('nu_presupuesto_total');
	    $datos['nu_monto_financiado'] =  $this->input->get('nu_monto_financiado');
	    $datos['nu_monto_contrapartida'] =  $this->input->get('nu_monto_contrapartida');
	     
	    
	   $fe_inicio= $this->input->get('fe_inicio');
	   $date = DateTime::createFromFormat('d/m/Y', $fe_inicio);
       $fe_inicio = $date->format('Y/m/d');
       $datos['fe_inicio']= $fe_inicio;
       
       $fe_fin = $this->input->get('fe_fin');
	   $date = DateTime::createFromFormat('d/m/Y', $fe_fin);
       $fe_fin = $date->format('Y/m/d');
       $datos['fe_fin']= $fe_fin;
       
       //GUARDAR RESIDENTE
       $datos['tx_nom_ape_residente'] =  $this->input->get('tx_nom_ape_residente');
       $datos['tx_dni_residente'] =  $this->input->get('tx_dni_residente');
       $datos['tx_email_residente'] =  $this->input->get('tx_email_residente');
       $datos['tx_telefono_residente'] =  $this->input->get('tx_telefono_residente');
       $datos['tx_profesion_residente'] =  $this->input->get('tx_profesion_residente');
       
       

	    
       //GUARDAR EVALUACION
       $datos['tx_gestiones'] =  $this->input->get('tx_gestiones');
       $datos['tx_evaluacion'] =  $this->input->get('tx_evaluacion');
       
       
	    $this->load->model('Proyecto_model');      
	     $resultado = $this->Proyecto_model->modificar($id_proyecto, $datos) ;
	     
	     
	    
        //GUARDAR CENTRO POBLADO
        $this->load->model('CentroPobladoProyecto_model');  
        $this->CentroPobladoProyecto_model->eliminar($id_proyecto);
        $array_centro_poblado = utf8_encode($this->input->get('array_centro_poblado')); // Don't forget the encoding
        $json_centro_poblado = json_decode($array_centro_poblado);
        foreach ($json_centro_poblado as $key => $value){
            
            //echo "<br> Valor: $value";
            $input_centro_poblado ["id_proyecto"] = $id_proyecto;
            $input_centro_poblado ["id_centro_poblado"] = $value;
            $data_centro_poblado = $this->CentroPobladoProyecto_model->guardar($input_centro_poblado);
        }
	    	
	    	

	    echo json_encode($resultado);
			
			

		  


	}
	
	
	public function buscar_resultado(){
	    
	     $id_proyecto =  $this->input->get('id_proyecto');
	     $this->load->model('Resultado_model'); 
	     $resultado = $this->Resultado_model->buscar_x_id_proyecto($id_proyecto); 
	     
	     echo json_encode($resultado);
        
        
	}
	
	public function buscar_provincia(){


			$id_region =  $this->input->get('id_region');

			$this->load->model('Provincia_model');                
	    	$provincia = $this->Provincia_model->listar_x_region($id_region) ;

	    	echo json_encode($provincia);


	}
	
	public function buscar_distrito(){


			$id_region =  $this->input->get('id_region');
			$id_provincia =  $this->input->get('id_provincia');

			$this->load->model('Distrito_model');                
	    	$distrito = $this->Distrito_model->listar_x_provincia_region($id_region, $id_provincia) ;

	    	echo json_encode($distrito);


	}
	
		
	public function buscar_centro_poblado(){


			$nb_region =  $this->input->get('nb_region');
			$nb_provincia =  $this->input->get('nb_provincia');
			$nb_distrito =  $this->input->get('nb_distrito');

            //"AMAZONAS", "BAGUA", "IMAZA"
            $this->load->model('Poblacion_model');   
            $centros_poblados = $this->Poblacion_model->listar_x_region_provincia_distrito($nb_region, $nb_provincia, $nb_distrito);

	    	echo json_encode($centros_poblados);


	}
	
	
	
	
		public function eliminar(){


			$id_proyecto =  $this->input->get('id_proyecto');

		    $this->load->model('Proyecto_model');      
	    	$resultado = $this->Proyecto_model->eliminar($id_proyecto) ;
	    	
	    	

	    	echo json_encode($resultado);


	}
	
	
		public function list()
	{


            $menu['proyecto']='active';
            $menu['proyecto_listar']='active';
            
            $this->load->model('Proyecto_model'); 
            
            $id_usuario = $this->session->userdata("id");
            $id_rol = $this->session->userdata("id_rol");
            
            
            if($id_rol == 3){ //administrador
            
            	 $datos['proyectos'] = $this->Proyecto_model->listar();
            
            }else{
             	$datos['proyectos'] = $this->Proyecto_model->listar_x_usuario($id_usuario);
            
            }
            
           
            

            $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('proyecto/list', $datos);
        	$this->load->view('templates/footer');
	}
	
	
	public function guardar_resultado(){
	    
        //GUARDAR USUARIO CREADOR
        $id_proyecto =  $this->input->get('id_proyecto');
            
        //GUARDAR RESULTADOS
        $this->load->model('Resultado_model');  
        $array_resultados = utf8_encode($this->input->get('array_resultados')); // Don't forget the encoding
        $json_resultados = json_decode($array_resultados);
        
        //print_r($json_resultados);
        
       $this->Resultado_model->eliminar($id_proyecto); 
        
        foreach ($json_resultados as $key => $value){
            
            //echo "<br> Valor: $value";
            $input_resultado ["id_proyecto"] = $id_proyecto;
            $input_resultado ["tx_resultado"] = $value;
            $data_resultado = $this->Resultado_model->guardar($input_resultado);
        }
        
      
            
	    echo json_encode($id_proyecto);
	}
	
		public function guardar_actividad(){
	    
        //GUARDAR USUARIO CREADOR
        $id_proyecto =  $this->input->get('id_proyecto');
        $id_resultado =  $this->input->get('id_resultado');
        $tx_actividad =  $this->input->get('tx_actividades');
        $id_actividad =  $this->input->get('id_actividad');
        
        $this->load->model('Actividad_model');  
        
            $input_resultado ["id_proyecto"] = $id_proyecto;
            //$input_resultado ["id_actividad"] = $id_actividad;
            $input_resultado ["id_resultado"] = $id_resultado;
            $input_resultado ["tx_actividad"] = $tx_actividad;
            
            $data_actividad = $this->Actividad_model->eliminar($id_actividad);
            $data_actividad = $this->Actividad_model->guardar($input_resultado);
      
            
	    echo json_encode($data_actividad);
	}
	
		public function eliminar_actividad(){
	    
        //GUARDAR USUARIO CREADOR
        $id_actividad =  $this->input->get('id_actividad');

        
        $this->load->model('Actividad_model');  
        $data_actividad = $this->Actividad_model->eliminar($id_actividad);
      
            
	    echo json_encode($data_actividad);
	}
	
	
	
	public function guardar(){
	    
        //GUARDAR USUARIO CREADOR
        $datos['id_usuario'] = $this->session->userdata("id");
       $id_proyecto =  $this->input->get('id_proyecto');
        
        
        //GUARDAR EJECUTORA
        
        $datos2['tx_razon_social'] =  $this->input->get('tx_nombre_ejec');
	    $datos2['tx_ruc'] =  $this->input->get('tx_ruc_ejec');
	    $datos2['tx_direccion'] =  $this->input->get('tx_direccion_ejec');
	    $datos2['id_pais'] =  $this->input->get('id_pais_ejec');
	    $datos2['id_region'] =  $this->input->get('id_region_ejec');
	    $datos2['id_provincia'] =  $this->input->get('id_provincia_ejec');
	    $datos2['id_distrito'] =  $this->input->get('id_distrito_ejec');
	    $datos2['tx_telefono'] =  $this->input->get('tx_telefono_ejec');
	    $datos2['tx_pagina_web'] =  $this->input->get('tx_pagina_web_ejec');
	    $datos2['tx_correo_electronico'] =  $this->input->get('tx_correo_electronico_ejec');
            

		$this->load->model('Ejecutora_model');   
        $ejecutora = $this->Ejecutora_model->guardar($datos2);
        
        //GUARDAR FINANCIERA
        
                        
            $datos3['tx_razon_social'] =  $this->input->get('tx_nombre_finan');
	    $datos3['tx_ruc'] =  $this->input->get('tx_ruc_finan');
	    $datos3['tx_direccion'] =  $this->input->get('tx_direccion_finan');
	    $datos3['id_pais'] =  $this->input->get('id_pais_finan');
	    $datos3['id_region'] =  $this->input->get('id_region_finan');
	    $datos3['id_provincia'] =  $this->input->get('id_provincia_finan');
	    $datos3['id_distrito'] =  $this->input->get('id_distrito_finan');
	    $datos3['tx_telefono'] =  $this->input->get('tx_telefono_finan');
	    $datos3['tx_pagina_web'] =  $this->input->get('tx_pagina_web_finan');
	    $datos3['tx_correo_electronico'] =  $this->input->get('tx_correo_electronico_finan');
	    
	    if ( $this->input->get('tx_nombre_finan') == '') $datos3['tx_razon_social'] = "NA";
            

		$this->load->model('Financiera_model');   
        $financiera = $this->Financiera_model->guardar($datos3);
        
        
        	    //GUARDAR IDENTIFICACIÓN
	    
	    $datos['tx_nombre'] =  $this->input->get('tx_nombre');
	    $datos['tx_siglas'] =  $this->input->get('tx_siglas');
	    $datos['tx_intervencion'] =  $this->input->get('tx_intervencion');
	    $datos['tx_rubro'] =  $this->input->get('tx_rubro');
	    
	    $datos['tx_tipo_intervencion'] =  $this->input->get('tx_tipo_intervencion');
	    $datos['tx_situacion_intervencion'] =  $this->input->get('tx_situacion_intervencion');
	    
	    $datos['tx_co_snip'] =  $this->input->get('tx_co_snip');
	    $datos['nu_beneficiarios'] =  $this->input->get('nu_beneficiarios');
	    $datos['id_pais'] =  $this->input->get('id_pais');
	    $datos['id_region'] =  $this->input->get('id_region');
	    $datos['id_provincia'] =  $this->input->get('id_provincia');
	    $datos['id_distrito'] =  $this->input->get('id_distrito');
	    $datos['tx_otro_centro_poblado'] =  $this->input->get('tx_otro_centro_poblado');
	    //$datos['id_centro_poblado'] =  $this->input->get('id_centro_poblado');
	    
	    //COSTOS
	    $datos['tx_tipo_moneda'] =  $this->input->get('tx_tipo_moneda');
	    $datos['nu_presupuesto_total'] =  $this->input->get('nu_presupuesto_total');
	    $datos['nu_monto_financiado'] =  $this->input->get('nu_monto_financiado');
	    $datos['nu_monto_contrapartida'] =  $this->input->get('nu_monto_contrapartida');
	    
	    
	   $fe_inicio= $this->input->get('fe_inicio');
	   $date = DateTime::createFromFormat('d/m/Y', $fe_inicio);
       $fe_inicio = $date->format('Y/m/d');
       $datos['fe_inicio']= $fe_inicio;
       
       $fe_fin = $this->input->get('fe_fin');
	   $date = DateTime::createFromFormat('d/m/Y', $fe_fin);
       $fe_fin = $date->format('Y/m/d');
       $datos['fe_fin']= $fe_fin;
       
       //GUARDAR RESIDENTE
       $datos['tx_nom_ape_residente'] =  $this->input->get('tx_nom_ape_residente');
       $datos['tx_dni_residente'] =  $this->input->get('tx_dni_residente');
       $datos['tx_email_residente'] =  $this->input->get('tx_email_residente');
       $datos['tx_telefono_residente'] =  $this->input->get('tx_telefono_residente');
       $datos['tx_profesion_residente'] =  $this->input->get('tx_profesion_residente');
       
       
       //GUARDAR EVALUACION
       $datos['tx_gestiones'] =  $this->input->get('tx_gestiones');
       $datos['tx_evaluacion'] =  $this->input->get('tx_evaluacion');
       

       $datos['id_entidad_ejecutora'] = $ejecutora;
	   $datos['id_entidad_financiera'] =  $financiera;
       
       
		if($id_proyecto == 0){
		    
		    	$this->load->model('Proyecto_model');   
                $id_proyecto = $this->Proyecto_model->guardar($datos);
		    
		}else{
		    
		        $this->load->model('Proyecto_model');      
	            $resultado = $this->Proyecto_model->modificar($id_proyecto, $datos) ;
		    
		}
		
	
      
        
        //GUARDAR CENTRO POBLADO
        $this->load->model('CentroPobladoProyecto_model');  
        $array_centro_poblado = utf8_encode($this->input->get('array_centro_poblado')); // Don't forget the encoding
        $json_centro_poblado = json_decode($array_centro_poblado);
        foreach ($json_centro_poblado as $key => $value){
            
            //echo "<br> Valor: $value";
            $input_centro_poblado ["id_proyecto"] = $id_proyecto;
            $input_centro_poblado ["id_centro_poblado"] = $value;
            $data_centro_poblado = $this->CentroPobladoProyecto_model->guardar($input_centro_poblado);
        }
        
     
            
	    echo json_encode($id_proyecto);
	}
	
	

    
}