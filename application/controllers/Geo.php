<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geo extends CI_Controller {

	function __construct(){

		parent::__construct();     
                $this->load->library('session');

                /*if($this->session->has_userdata('param_buscar')){
                     redirect(site_url(),'refresh');
                } */   
                
                		
		
        }
        
       	

	public function index()
	{
             $filtros_activos = array();
             $datos['filtros'] = array();
             $datos['shapefile']= array();
             
            $menu['geoportal']='active';
            $menu['geoindex']='active';
            
            $datos['data_id_region'] = 0;
            $datos['data_id_provincia'] = 0;
            $datos['data_id_distrito'] = 0;
            $datos['data_tx_tipo'] = 'Seleccione';
           
          
            
            $datos['txt_msg'] = '';
            $msg = $this->input->get('msg'); 
            
            $link_contacto = "<a href=".site_url('contacto/index').">Contáctenos</a>";
            
            if(isset($msg) && $msg == 1) $datos['txt_msg'] = "Como usuario 'Visitante' solo puede realizar dos (2) descarga de ficha técnica. Para acceder a más descargas de fichas de proyectos debe ser un usuario 'Colaborador'. Por favor $link_contacto para más información sobre el <b>REPPAT</b> .";
            
            $this->load->model('Asociacion_model');      
	    $proyectos = $this->Asociacion_model->listar_asociaciones_x_mapa(0) ;
	    	
	    	//$datos['proyectos'] = $this->geojson($proyectos) ;
	    	$datos['proyectos'] = $this->geojson_ampliado($proyectos) ;
	    	
	    	$proyectos_ofic_central = $this->Asociacion_model->listar_asociaciones_ofic_central_x_mapa(0) ;
	    	$datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
	    	    
	        		 
    	    $centros_poblados = array();
    	    $datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ;   	   
	    	
	    	 $this->load->model('Region_model');   
            $datos['regiones'] = $this->Region_model->listar();
            $datos['provincias'] = array();
            $datos['distritos'] = array();
            
            

                $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('geoportal/index',$datos);
        	$this->load->view('templates/footer');
	}

        
        public function buscar()
	{
           
            $filtros_activos = array();
             $datos['filtros'] = array();
             
            $datos['txt_msg'] = '';
            $link_contacto = "<a href=".site_url('contacto/index').">Contáctenos</a>";
            
            
            $msg = $this->input->get('msg'); 
           if(isset($msg) && $msg == 1) $datos['txt_msg'] = "Como usuario 'Visitante' solo puede realizar dos (2) descarga de ficha técnica. Para acceder a más descargas de fichas de proyectos debe ser un usuario 'Colaborador'. Por favor $link_contacto para más información sobre el <b>REPPAT</b> .";
          
          //Impresion en PDF
          if($this->input->get('imp')){
                	
                //print_r($this->session->flashdata('parametros'));
                //$this->session->has_userdata('param_buscar')
                 $this->load->model('Asociacion_model');  
                
                if($this->session->has_userdata('param_buscar')){
                
                    $parametros = 	$this->session->userdata('param_buscar');  
                    $id_region = $parametros['id_region'];
    	    	    $id_provincia = $parametros['id_provincia'];
                    $id_asociacion = @$parametros['id_asociacion'];
    	    	   // print_r($this->session->userdata('param_buscar'));

                    if($id_asociacion != ''){ // proyecto por id function ver()

                       $proyectos = $this->Asociacion_model->listar_asociaciones_x_mapa($id_asociacion) ;
	    	        $datos['proyectos'] = $this->geojson_ampliado($proyectos) ;
	    	        
	    	        $proyectos_ofic_central = $this->Asociacion_model->listar_asociaciones_ofic_central_x_mapa($id_asociacion) ;
	    	        $datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
	    	
	    	
                    
                    }else{

                    $proyectos = $this->Asociacion_model->busqueda_x_detalle($parametros) ;
    	    	    $datos['proyectos'] = $this->geojson_ampliado($proyectos) ;
    	    	    
    	    	    $proyectos_ofic_central = $this->Asociacion_model->busqueda_x_detalle_ofic_central($parametros) ;
	    	    $datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;


                    }    	
	    	
    	    	    
    	    	    if($id_provincia != 0){    	    	   	    		
    	    		
    	    		$this->load->model('Region_model');                
                	$this->load->model('Provincia_model'); 
    	    		$region_select 		= $this->Region_model->buscar_x_id($id_region);
    	    		$provincia_select 	= $this->Provincia_model->buscar_x_id( $id_provincia);
    	    		
    	    		$nb_region = $region_select[0]['name'];
    	    		$nb_provincia = $provincia_select[0]['name'];
    	    		
    	    		$this->load->model('Poblacion_model');     	    		 
    	    		$centros_poblados = $this->Poblacion_model->listar_x_region_provincia($nb_region , $nb_provincia);
    	    		//print_r($centros_poblados);
    	    		$datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ; 
    	    		//print_r($datos['centros_poblados']);  	    		
    	    		        	
    	    		}
    	    	
    	    	
    	    	    //$centros_poblados = array();
    	    	    //$datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ; 
    	    	
    	    	    
                        
                }else{
                    
                    
                    $proyectos = $this->Asociacion_model->listar_asociaciones_x_mapa(0) ;
	    	    $datos['proyectos'] = $this->geojson_ampliado($proyectos) ;	
	    	    
	    	    
	    	    $proyectos_ofic_central = $this->Asociacion_model->listar_asociaciones_ofic_central_x_mapa(0) ;
	    	    $datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
	    	    
	    	        	     		 
    	    	    $centros_poblados = array();
    	    	    $datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ;  
    	    	    
    	    	    //print_r($datos);
                    
                }               
                
	    	    
	    	    $this->load->view('geoportal/print', $datos);
                
            }else{ //boton buscar
                
                $menu['geoportal']='active';
                $menu['geoindex']='active';
                
              // $datos = 0;
                
                     
               $tx_tipo = $this->input->post('tx_tipo');               
               $id_distrito = $this->input->post('id_distrito'); 
               
               //var_dump( $tx_rubro);
                
		
               if ( $tx_tipo != 'Seleccione') array_push($filtros_activos, '<span class="badge bg-blue">Tipo</span>') ; 
               
               $datos['filtros'] = $filtros_activos;
                
                
                if($this->session->has_userdata('param_buscar')){
                
                   $parametros = $this->session->userdata('param_buscar');  
                    
                   $parametros['id_proyecto'] = '';
                   $parametros['id_distrito'] = $id_distrito;
                   $parametros['tx_tipo'] = $tx_tipo;
                   
                   
                   $this->session->set_userdata('param_buscar', $parametros);
                   
                    // print_r($parametros);                

                  $id_region = $datos['data_id_region'] =    $parametros['id_region'];
                  $id_provincia = $datos['data_id_provincia'] = $parametros['id_provincia'];
                  
                  
                   
                
                }else{

  
                   $parametros = array(
                   'id_region' => "",
                   'id_provincia' => "",
                   'id_distrito' => $id_distrito,
                   'tx_tipo' => $tx_tipo                   
                   );
               
                    $this->session->set_userdata('param_buscar', $parametros);
                    
                    $id_region = 0;
                    $id_provincia = 0;
                  
                
                
                }


             
                                        
     		$datos['data_id_distrito'] = $id_distrito;
                $datos['data_tx_tipo'] = $tx_tipo;
                
                
                //$datos['data_tx_tipo_moneda'] = $tx_tipo_moneda;
                
                $this->load->model('Asociacion_model');      
    	    	
    	    	$proyectos = $this->Asociacion_model->busqueda_x_detalle($parametros) ;
    	    	$datos['proyectos'] = $this->geojson_ampliado($proyectos) ;
    	    	
    	    	$proyectos_ofic_central = $this->Asociacion_model->busqueda_x_detalle_ofic_central($parametros) ;
	    	$datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
    	    	
    	    
    	    	
    	    	
    	    	
    	    	$this->load->model('Region_model');   
                $datos['regiones'] = $this->Region_model->listar();
                
                $this->load->model('Provincia_model'); 
                $datos['provincias'] = $this->Provincia_model->listar_x_region($id_region) ;
                
                $this->load->model('Distrito_model'); 
                $datos['distritos'] =  $this->Distrito_model->listar_x_provincia_region($id_region, $id_provincia) ;
               
                if($id_provincia != 0){
    	    	
    	    		$region_select 		= $this->Region_model->buscar_x_id( $id_region);
    	    		$provincia_select 	= $this->Provincia_model->buscar_x_id( $id_provincia);
    	    		
    	    		$nb_region = $region_select[0]['name'];
    	    		$nb_provincia = $provincia_select[0]['name'];
    	    		
    	    		$this->load->model('Poblacion_model');     	    		 
    	    		$centros_poblados = $this->Poblacion_model->listar_x_region_provincia($nb_region , $nb_provincia);
    	    		//print_r($centros_poblados);
    	    		$datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ;
    	    		//print_r($datos['centros_poblados']);  	
    	    		
    	    		//echo "<br>".$region_select[0]['name'];
    	    		//echo "<br>".$provincia_select[0]['name'];
    	    		
    	    	
    	    	}else{
    	    	
    	    	    $proyectos = $this->Asociacion_model->listar_asociaciones_x_mapa(0) ;
	    	    $datos['proyectos'] = $this->geojson_ampliado($proyectos) ;	 
	    	    
	    	    $proyectos_ofic_central = $this->Asociacion_model->listar_asociaciones_ofic_central_x_mapa(0) ;
	    	    $datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
	    	    
	    	       	     		 
    	    	    $centros_poblados = array();
    	    	    $datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ;  
    	    	
    	    	}
    	    	
    	    	//$centros_poblados = array();
    	    	//    $datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ; 
    	    	
    	    	
    	    	
                
               // die();
    
                $this->load->view('templates/header');
            	$this->load->view('templates/menu', $menu);
            	$this->load->view('geoportal/index',$datos);
            	$this->load->view('templates/footer');
                
                
            }
            
            
         
	}
	
	
	public function buscar_cp()
	{
           
            $filtros_activos = array();
             $datos['filtros'] = array();
             
            $datos['txt_msg'] = '';
            $link_contacto = "<a href=".site_url('contacto/index').">Contáctenos</a>";
            
            
            $msg = $this->input->get('msg'); 
           if(isset($msg) && $msg == 1) $datos['txt_msg'] = "Como usuario 'Visitante' solo puede realizar dos (2) descarga de ficha técnica. Para acceder a más descargas de fichas de proyectos debe ser un usuario 'Colaborador'. Por favor $link_contacto para más información sobre el <b>REPPAT</b> .";
          
                          
                $menu['geoportal']='active';
                $menu['geoindex']='active';
                
              // $datos = 0;
                
               $id_region = $this->input->post('id_region');
               $id_provincia = $this->input->post('id_provincia');
               //$id_distrito = $this->input->post('id_distrito');              
               
                              
               
               $parametros = array(
                   'id_region' => $id_region,
                   'id_provincia' => $id_provincia,
                   'id_distrito' => "",
                   'tx_tipo' => "Seleccione"                   
               );
               
              $this->session->set_userdata('param_buscar', $parametros);
              
              // print_r($parametros);
              
              //print_r( $this->session->userdata('param_buscar') ) ;
              
                $datos['data_id_region'] = $id_region;
                $datos['data_id_provincia'] = $id_provincia;
                $datos['data_id_distrito'] = 0;
                $datos['data_tx_tipo'] = 'Seleccione';
                
             
                 $this->load->model('Asociacion_model');      
    	    	$proyectos = $this->Asociacion_model->busqueda_x_detalle($parametros) ;
    	    	$datos['proyectos'] = $this->geojson_ampliado($proyectos) ;
    	    	
    	    	$proyectos_ofic_central = $this->Asociacion_model->busqueda_x_detalle_ofic_central($parametros) ;
	    	$datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
    	    	
    	    	// print_r($datos['proyectos']);
    	    	
    	    	
    	    	
    	    	$this->load->model('Region_model');   
                $datos['regiones'] = $this->Region_model->listar();
                
                $this->load->model('Provincia_model'); 
                $datos['provincias'] = $this->Provincia_model->listar_x_region($id_region) ;
                
                $this->load->model('Distrito_model'); 
                $datos['distritos'] =  $this->Distrito_model->listar_x_provincia_region($id_region, $id_provincia) ;
                
                if($id_provincia != 0){
    	    	
    	    		$region_select 		= $this->Region_model->buscar_x_id( $id_region);
    	    		$provincia_select 	= $this->Provincia_model->buscar_x_id( $id_provincia);
    	    		
    	    		$nb_region = $region_select[0]['name'];
    	    		$nb_provincia = $provincia_select[0]['name'];
    	    		
    	    		$this->load->model('Poblacion_model');     	    		 
    	    		$centros_poblados = $this->Poblacion_model->listar_x_region_provincia($nb_region , $nb_provincia);
    	    		$datos['data_nb_provincia'] = strtoupper(trim($nb_provincia));
    	    		
    	    		//print_r($centros_poblados);
    	    		$datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ;
    	    		//print_r($datos['centros_poblados']);  	
    	    		
    	    		    	    	
    	    	}
    	    	
                
               // die();
    
                $this->load->view('templates/header');
            	$this->load->view('templates/menu', $menu);
            	$this->load->view('geoportal/index',$datos);
            	$this->load->view('templates/footer');
                
                
            
            
            
         
	}












	
	public function ver()
	{
            $id_asociacion =  $this->input->get('id_asociacion');
             $datos['txt_msg'] = '';
             
             $datos['data_id_region'] = 0;
            $datos['data_id_provincia'] = 0;
            $datos['data_id_distrito'] = 0;
            $datos['data_tx_tipo'] = 'Seleccione';
          
             
             $filtros_activos = array();
             $datos['filtros'] = array();
            
            $menu['geoportal']='active';
            $menu['geoindex']='active';
            
            $this->load->model('Asociacion_model');      
	    	$proyectos = $this->Asociacion_model->listar_asociaciones_x_mapa($id_asociacion) ;
	    	$datos['proyectos'] = $this->geojson_ampliado($proyectos) ;
	    	
	    	$proyectos_ofic_central = $this->Asociacion_model->listar_asociaciones_ofic_central_x_mapa($id_asociacion) ;
	    	$datos['proyectos_ofic_central'] = $this->geojson_ampliado($proyectos_ofic_central) ;
	    	
	   //  $this->load->model('Shapefile_model');      
	   //  $datos['shapefile'] =$this->Shapefile_model->get_shapefiles_proyecto($id_proyecto);
	     
	     

            $id_region = $proyectos[0]['id_region'];
            $id_provincia = $proyectos[0]['id_provincia'];
            $id_distrito = $proyectos[0]['id_distrito'];
            
            $parametros = array(
                   'id_asociacion' =>  $id_asociacion,
                   'id_region' =>  $id_region,
                   'id_provincia' =>  $id_provincia,
                   'id_distrito' => $id_distrito,
                   'tx_tipo' => 'Seleccione',                                  
                   );
               
            $this->session->set_userdata('param_buscar', $parametros);
            
            $datos['data_id_region'] = $id_region;
            $datos['data_id_provincia'] = $id_provincia;

           // print_r($parametros);
            
            
           
	    	
	    $this->load->model('Region_model');   
            $datos['regiones'] = $this->Region_model->listar();
            $datos['provincias'] = array();
            $datos['distritos'] = array();
            
           $this->load->model('Provincia_model'); 
            $datos['provincias'] = $this->Provincia_model->listar_x_region($id_region) ;
                
             $this->load->model('Distrito_model'); 
           $datos['distritos'] =  $this->Distrito_model->listar_x_provincia_region($id_region, $id_provincia) ;
                
            
           

            if($id_provincia != 0){
                                  
    	    	
    	    		$region_select 		= $this->Region_model->buscar_x_id( $id_region);
    	    		$provincia_select 	= $this->Provincia_model->buscar_x_id( $id_provincia);
    	    		  
    	    		
    	    		$nb_region = $region_select[0]['name'];
    	    		$nb_provincia = $provincia_select[0]['name'];
    	    		
    	    		$this->load->model('Poblacion_model');     	    		 
    	    		$centros_poblados = $this->Poblacion_model->listar_x_region_provincia($nb_region , $nb_provincia);
    	    		//print_r($centros_poblados);
    	    		$datos['centros_poblados'] = $this->geojson_centros_poblados($centros_poblados) ;
    	    		//print_r($datos['centros_poblados']);  	
    	    		
    	    		    	    	
    	    	}


            //$centros_poblados = array();
    	    //$datos['centros_poblados'] = $this->geojson_centros_poblados() ; 

            $this->load->view('templates/header');
        	$this->load->view('templates/menu', $menu);
        	$this->load->view('geoportal/index',$datos);
        	$this->load->view('templates/footer');
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
	
	
	public function geojson_centros_poblados($centros_poblados){
	    
   
	    $geojson = array( 'type' => 'FeatureCollection', 'features' => array() );
	
	   	    	
		    	
	    foreach($centros_poblados as $row)
	    {
	        $feature = array( 'type' => 'Feature', 
	                          'geometry' => array(
	                                              'type' => 'Point',
	                                              'coordinates' => array( (float)$row['xgd'], (float)$row['ygd'] )),
	                                              'properties' => array(
	                                                                    'nb_centro_poblado' => $row['nomcp'])
	        );
	
	        array_push($geojson['features'], $feature);
	    }
	
	       return json_encode($geojson);
	
	    
	}
	
	
	
	
	public function geojson($proyectos){
	    
   
	    $geojson = array( 'type' => 'FeatureCollection', 'features' => array() );
	
	   //$this->load->model('Proyecto_model');      
	   //$proyectos = $this->Proyecto_model->listar_proyectos_x_mapa() ;
		    	
		    	
	    foreach($proyectos as $row)
	    {
	        $feature = array( 'type' => 'Feature', 
	                          'geometry' => array(
	                                              'type' => 'Point',
	                                              'coordinates' => array( (float)$row['xgd'], (float)$row['ygd'] )),
	                                              'properties' => array(
	                                                                    'name_proy' => $row['tx_nombre'],  'rubro_proy' => $row['tx_rubro'], 'codcp' =>  $row['codcp'])
	        );
	
	        array_push($geojson['features'], $feature);
	    }
	
	       return json_encode($geojson);
	
	    
	}
	
		
  public function geojson_ampliado($proyectos){
	    
    $centros_poblados = array();
    $nu_proyectos = array();
    $geojson = array( 'type' => 'FeatureCollection', 'features' => array() );
    
    
    
    

    foreach($proyectos as $row)
    {
        $url_ficha = site_url()."/asociacion/exportar_excel?id_proyecto=".$row['id_asociacion'];
        $url_proy_cp = site_url()."/geo/ver?id_asociacion=".$row['id_asociacion'];
        
         

          $codcp = @$row['codcp'];
          $nu_previo  = @$centros_poblados[$codcp]["nu_proyectos"];
       	  $nu_proyectos[$codcp] =  $nu_previo + 1 ;
        
          $cabecera_cp = (!array_key_exists($codcp,$centros_poblados)) ? "<h4>".$row['nomcp']."</h4>" : " ";
        
        $nu_socios = $row['nu_socios_colonos'] + $row['nu_socios_indigenas'];
        $detalle = $cabecera_cp."<p><b> Nombre del Proyecto:</b>". $row['tx_nombre']
       ."<br><b>Tipo: </b>".$row['tx_tipo']
       ."<br><b>Socios: </b>".$nu_socios
       ."<br><b>Ficha:</b> <a href='$url_ficha'>Descargar</a>"
       ."<br><b>Centros poblados:</b> <a target='_blank' href='$url_proy_cp'>Mostrar</a>"
       ."<br><br>";
                             
                 
       
          $previo  = @$centros_poblados[$codcp]["centro_poblado"];
          $centros_poblados[$codcp]= array("centro_poblado" => $previo. $detalle,"nu_proyectos" => $nu_proyectos[$codcp] , 'xgd'=>  (float)$row['xgd'], 'ygd' => (float)$row['ygd']);
      
     

    }
    
    foreach($centros_poblados as $r)
    {
       
        $feature = array( 'type' => 'Feature', 
                          'geometry' => array(
                                              'type' => 'Point',
                                              'coordinates' => array( (float)$r['xgd'], (float)$r['ygd'] )),
                                              'properties' => array(
                                                                    'centro_poblado' =>  $r['centro_poblado'] , "nu_proyectos" => $r['nu_proyectos'] )
        );

        array_push($geojson['features'], $feature);
    }

       //print_r($centros_poblados);
       return json_encode($geojson);

	    
	}
        
        

    
}