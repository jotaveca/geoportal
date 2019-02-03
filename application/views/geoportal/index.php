<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Geoportal
        <small>ROAGRO</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li class="active">Geoportal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    
    <?php if ($txt_msg != '' ){ ?>
    <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i>Advertencia</h4>
               <?php echo $txt_msg ?>
              </div>
    <?php } ?>

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
         
          <div class="box-header">
              <h3 class="box-title"></h3> <button id="printBtn" type="button" class="btn btn-success pull-right" >  <i class="fa fa-print"></i> Imprimir Mapa </button>
            </div>
         
         
        
        <div class="box-body">
          
          

<div class="col-md-3">
          <div class="box box-solid">
           
            <div class="box-body">
                
            <?php echo form_open('geo/buscar_cp/'); ?>
            
            <h4> ¿Poblados que desea visualizar? </h4>
                
              <div class="form-group ">
                            <label>País</label>
                            <select id="id_pais"  name="id_pais" class="form-control select2" style="width: 100%;"   >
                              <option value="1" selected="selected">Peru</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group ">
                            <label>Región</label>
                            <select id="id_region" name="id_region" class="form-control select2" style="width: 100%;"  required >
                              <option value="" >Seleccione</option>
                             <?php for ($i = 0; $i < count($regiones); $i++) { 
                              
                              $selected = '';
                              if($regiones[$i]['id'] == $data_id_region ) $selected = 'selected';
        
                            echo "<option $selected value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
        
                          } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group ">
                            <label>Provincia</label>
                            <select id="id_provincia" name="id_provincia" class="form-control select2" style="width: 100%;"  required >
                              <option value="" >Seleccione</option>
                               <?php for ($i = 0; $i < count($provincias); $i++) { 
                              
                              $selected = '';
                              if($provincias[$i]['id'] == $data_id_provincia ) $selected = 'selected';
        
                            echo "<option $selected value='".$provincias[$i]['id']."'> ".$provincias[$i]['name']."</option>";
        
                          } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
            
                          
                
                          
                     
                            
                          
                      <!-- /.box-body -->
          	   <div class="box-footer">
                      
                       <div class="row">
                       <!-- /.col -->
                       <div class="col-md-4">  <!-- <button id="btnReiniciar" type="button"  class="btn btn-default" >
                        <i class="fa fa-rotate-left"></i> Reiniciar </button>  --> </div>
                       <div class="col-md-4"> 
                        </div>
                       <div class="col-md-4"> <button type="submit" id="btnBuscar" class="btn btn-primary" >
                        <i class="fa fa-search"></i> Mostrar </button></div>                              
        
                        </div>                                                                  
                       
                    </div>
                    <!-- /.box-footer-->
                        
            
                 <?php echo form_close(); ?>  
                           
               








       <?php echo form_open('geo/buscar/'); ?>

           <br>
               <h4> Criterios de búsqueda </h4>
          <p>
            
            <?php 
            
            if (!empty($filtros)) echo "";
            
            foreach($filtros as $fi => $col) echo "&nbsp;&nbsp;". $col."<br>";  ?>               
       
       </p>

                    <div class="form-group ">
                            <label>Distrito</label>
                            <select id="id_distrito" name="id_distrito" class="form-control select2" style="width: 100%;"  >
                              <option value="" >Seleccione</option>
                             <?php for ($i = 0; $i < count($distritos); $i++) { 
                      
                              $selected = '';
                              if($distritos[$i]['id'] == $data_id_distrito ) $selected = 'selected';
        
                            echo "<option $selected value='".$distritos[$i]['id']."'> ".$distritos[$i]['name']."</option>";
        
                          } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->  
                          



                   <?php   $tx_tipo = array('Seleccione', 'Cooperativa', 'Asociación'); ?> 

          
                           <div class="form-group ">
                            <label>Tipo</label>
                            <select id="tx_tipo"  name="tx_tipo" class="form-control select2" style="width: 100%;" >
                             <?php for ($i = 0; $i < count($tx_tipo); $i++) { 
            
                                $selected = '';
                                if($tx_tipo[$i] == $data_tx_tipo ) {echo $tx_tipo[$i];   $selected = 'selected';}
                                echo "<option $selected  value='".$tx_tipo[$i]."'> ".$tx_tipo[$i]."</option>";
            
                              } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->

                          
    
                          
            
              
              
      
            </div>
            <!-- /.box-body -->
             <div class="box-footer">
                      
                       <div class="row">
                       <!-- /.col -->
                       <div class="col-md-4"><button type="button" id="btnReiniciar"  class="btn btn-default" >
                        <i class="fa fa-rotate-left"></i> Reiniciar </button></div>
                       <div class="col-md-4"> 
                       <!-- <button id="printBtn" type="button"  class="btn btn-success" >
                        <i class="fa fa-print"></i> Imprimir </button> -->
                        </div>
                       <div class="col-md-4"> <button type="submit" id="btnBuscar" class="btn btn-primary" >
                        <i class="fa fa-search"></i> Buscar </button></div>                              
        
                        </div>
                        
                        
                     
                       
                    
                       
                    </div>
                    <!-- /.box-footer-->
          </div>
          <!-- /. box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            
      
                            
                                   
    <div id="map" ></div>

  	</div>
        <!-- /.col -->



    <?php echo form_close(); ?>

          
          
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Reppat
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/leaflet/leaflet.js"> </script>

	<script type="text/javascript"  src="<?php echo base_url(); ?>assets/plugins/leaflet-plugins-master/layer/vector/KML.js"> </script>
	

	<link rel="stylesheet" 		href="<?php echo base_url(); ?>assets/plugins/leaflet/leaflet.css" >	


	<script src="<?php echo base_url(); ?>assets/geodata/peru_capital_provincia.js" 	type="text/javascript" ></script>   
	<script src="<?php echo base_url(); ?>assets/geodata/departamental.js" 		    type="text/javascript" async></script>
	<script src="<?php echo base_url(); ?>assets/geodata/provincial.js" 		        type="text/javascript"  ></script>
	
	
	
        <!-- Include the loading control -->
        <link rel="stylesheet" href="https://rawgithub.com/ebrelsford/Leaflet.loading/master/src/Control.Loading.css" />
        <script src="https://rawgithub.com/ebrelsford/Leaflet.loading/master/src/Control.Loading.js"></script>
        
        
        
        <!-- Include shapefile 
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/leaflet/shapefile.js"> </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/leaflet/leaflet.shapefile.js"> </script>
        
        -->


   <style>
#map{ 
    height: 700px;
}


/* tooltip-class*/

.leaflet-tooltip.class-tooltip {
    background-color: none;
    border-color: none;
    background: none;
    border: none;
    box-shadow: none;
}

.leaflet-tooltip-left.class-tooltip::before {
  border-left-color: none;
}

.leaflet-tooltip-right.class-tooltip::before {
  border-right-color: none;
}


   </style>



	<script>
	
	
	
$("#printBtn").click(function(){

         var base_url = '<?php echo site_url() ?>'; 
         var url = base_url+'/geo/buscar?imp=1';
         
         window.open(url,'ROAGRO', 'width=800, height=600');

 
});

$("#btnReiniciar").click(function(){

        
		$( "#id_region" ).val("").change();
		$( "#id_provincia" ).val("").change();
		$( "#id_distrito" ).val("").change();
		$( "#tx_rubro" ).val("Seleccione").change();
		$( "#tx_intervencion" ).val("Seleccione").change();
		$( "#tx_tipo_intervencion" ).val("Seleccione").change();
		
		console.log("#btnReiniciar");
 
});



 
	  
	
  $("#id_region").change(function(){

       var base_url = '<?php echo site_url() ?>';
       $( "#id_provincia").empty();

          $.ajax({
                url: base_url+'/geo/buscar_provincia',                               
                data: {
                    id_region: $( "#id_region option:selected" ).val(),                                           
                                        
                },                  
                success: function (result) {                    
                    
                     var provincia = $.parseJSON(result);
                     $( "#id_provincia").append("<option value=''> Seleccione </option>");
                   
                     $.each(provincia, function(key,value) {

                      $( "#id_provincia").append("<option value='"+value.id+"' >"+value.name+"</option>");

                     }); 

                }
            });

      });	
	
      

$("#id_provincia").change(function(){
       var base_url = '<?php echo site_url() ?>';
       $( "#id_distrito").empty();

          $.ajax({
                url: base_url+'/geo/buscar_distrito',                               
                data: {
                    id_region: $( "#id_region option:selected" ).val(),                                           
                    id_provincia: $( "#id_provincia option:selected" ).val(),    
                                        
                },                  
                success: function (result) {                    
                    
                     var distrito = $.parseJSON(result);
                     $( "#id_distrito").append("<option value=''> Seleccione </option>");
                   
                     $.each(distrito, function(key,value) {

                      $( "#id_distrito").append("<option value='"+value.id+"' >"+value.name+"</option>");

                     }); 

                }
            });

      });	
	
	
var map = new L.Map('map', {center: new L.LatLng(-11.316005300971307, -74.63170274984738), zoom: 6, loadingControl: true});


var mbAttr = 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
	'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
	'Imagery © <a href="http://mapbox.com">Mapbox</a>',
mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';




var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr});
var streets  	= L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
var osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');



var baseLayers = {
"OSM": osm,
"Escala de grises": grayscale,
"Relieve": streets
};
	
	
	var estiloRojo = {
    "color": "#ff4c4c",
    "weight": 1,
    "fillOpacity": 0
    };
	
	var estiloAzul = { // Azul
	    "color": "#0094ff",
	    "weight": 1,
	    "fillOpacity": 0
	};
	
	var estiloVerde = { //Verde
	    /*"color": "#2EFE2E",*/
	    "color": "#7E7E7E",
	    "weight": 1,
	    "fillOpacity": 0
	};
	

	map.addLayer(grayscale);
	
	// replace Leaflet's default blue marker with a custom icon
function createCapitalIcon (feature, latlng) {
  let myIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/icon_capitales.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  })
  return L.marker(latlng, { icon: myIcon })
}


	// replace Leaflet's default blue marker with a custom icon
function createSinProyectoIcon (feature, latlng) {
  let myIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/greyedot.png",
    iconSize:     [8, 8] // width and height of the image in pixels
   
  })
  return L.marker(latlng, { icon: myIcon })
}

	// replace Leaflet's default blue marker with a custom icon
function createIcon (feature, latlng) {
  
  let bIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/bluedot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
  let rIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/reddot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
   let gIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/greendot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
   let pIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/purpledot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
   let blackIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/blackdot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
   let oIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/orangedot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
   let greyIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/greyedot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
    let yellowIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/yellowdot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
  
 /* if( feature.properties.nu_proyectos >= 2){
      
      return L.marker(latlng, { icon: rIcon })      
  }*/
  
  return L.marker(latlng, { icon: gIcon })
  
  /*if( feature.properties.rubro_proy == 'Transporte y comunicación'){
      
      return L.marker(latlng, { icon: bIcon })
      
  }else if ( feature.properties.rubro_proy == 'Salud'){
      
      return L.marker(latlng, { icon: yellowIcon })
      
  }else if ( feature.properties.rubro_proy == 'Vivienda y saneamiento'){
      
      return L.marker(latlng, { icon: gIcon })
      
  }else if ( feature.properties.rubro_proy == 'Educación'){
      
      return L.marker(latlng, { icon: pIcon })
      
  }else if ( feature.properties.rubro_proy == 'Interior'){
      
      return L.marker(latlng, { icon: blackIcon })
      
  }else if ( feature.properties.rubro_proy == 'Defensa'){
      
      return L.marker(latlng, { icon: oIcon })
      
  }
*/
   
  
}


	// replace Leaflet's default blue marker with a custom icon
function createIconOfic (feature, latlng) {
 
  
  
    let yellowIcon = L.icon({
    iconUrl: "<?php echo base_url(); ?>assets/geodata/yellowdot.png",
    iconSize:     [24, 24] // width and height of the image in pixels
   
  });
  
  
  return L.marker(latlng, { icon: yellowIcon })
   
  
}


  
  <?php //var_dump($proyectos); ?>
	
  <?php //echo "var proyectos = ".json_encode( array_values($proyectos)) .";"; ?>
   <?php echo "var proyectos = [$proyectos] ;"; ?>
   <?php echo "var proyectos_ofic_central = [$proyectos_ofic_central] ;"; ?>
   <?php echo "var centros_poblados_select = [$centros_poblados] ;"; ?>
   
    		
	
	
   var proyectos_peru = new L.geoJson(proyectos, {
     pointToLayer: createIcon, onEachFeature: onEachFeature
    }).on('click', function (e) {
    
    }).addTo(map);
    
    
     
    var asociacion_peru = new L.geoJson(proyectos_ofic_central, {
     pointToLayer: createIconOfic, onEachFeature: onEachFeature
    }).on('click', function (e) {
    
    }).addTo(map);
    

    //Al finalizar la carga de la pagina
    $(window).on('load', function () {
      
      //alert("Window Loaded");
      
         
	    
	    
         <?php echo "var url_distrital = '".base_url()."assets/geodata/distrital_ajax.js';" ?>
    	var distrito = $.ajax({
    	   type: "POST",
          url: url_distrital,
          dataType: "json",
          error: function (xhr) {
            //alert(xhr.statusText)
          },
          success: function (response) {
                
                console.log("Distrito success.");
                //console.log(response);
                 var distrito_peru = new L.geoJson(response, {
                  onEachFeature: onEachFeature, style: estiloVerde
                }).on('click', function (e) {
                 
                }).addTo(map);
                
                control.addOverlay(distrito_peru, 'Distrito');
                
                
                var departamentos_peru = new L.geoJson(departamentos, {
                  onEachFeature: onEachFeature, style: estiloRojo
                }).on('click', function (e) {
                 
                }).addTo(map);
                control.addOverlay(departamentos_peru, 'Región');
                
                
          } 
        });
    
        
	  
	var centros_poblados = new L.geoJson(centros_poblados_select, {
             pointToLayer: createSinProyectoIcon, onEachFeature: onEachFeature, style: estiloAzul
            }).on('click', function (e) {
             
            }).addTo(map);
        
          
	  
	   
    	 var provincias_peru = new L.geoJson(provincial, {
          onEachFeature: onEachFeature, style: estiloAzul
        }).on('click', function (e) {
         
        }).addTo(map);
        
         
       
    
    	var capitales_peru = new L.geoJson(capitales, {
          pointToLayer: createCapitalIcon, onEachFeature: onEachFeature, style: estiloAzul
        }).on('click', function (e) {
         
        })/*.addTo(map)*/;
        
    
   	var control = L.control.layers(baseLayers);
   	control.addTo(map);
   	
   	control.addOverlay(proyectos_peru, 'Asociaciones/Cooperativas');
   	control.addOverlay(capitales_peru, 'Capitales');   	
   	control.addOverlay(provincias_peru, 'Provincias');   	
   	
   	//console.log(centros_poblados_select);
   	//console.log(centros_poblados);
   	
   	control.addOverlay(centros_poblados, 'Centros Poblados');
   	
   	
	
   	
   	
   	        
       
   	
   	
   	   /**********************CARGAR MAPAS AL HACER ZOOM **********************/
    
     	/*Zoomin Zoomout cargar capas dinamicamente*/
   
   map.on('zoomend', function() {
        var zoom = map.getZoom();
        console.log('Zoom '+zoom);
        if( map.hasLayer(centros_poblados) ) {
            centros_poblados.eachLayer( function (layer){
                //console.log(layer);
                if ( zoom >= 13 && (!layer.getTooltip()) ) {
                    tooltiptext = '<b>'+layer.feature.properties.nb_centro_poblado+'</b>';
                    layer.bindTooltip(tooltiptext , { permanent: true, direction: 'right', className: 'class-tooltip'} );
                } else if ( zoom < 13 && (layer.getTooltip()) ) {
                    //console.log('remove tooltip');
                    layer.unbindTooltip();
                }
            });
        }
    });
	   	
	   	
	   	
	   	
	  

	    	
    });// fin on load

    var nb_prov = 0;
    
    <?php
     // fillcolor poligono 
     if(isset($data_nb_provincia)) 
     echo " var nb_prov = '".$data_nb_provincia."';";
     
    ?>
      
    
    /********************  CARGAR MARCA DE AGUA ************************/
    
    //Imagen pie de pagina - marca de agua en el mapa
    <?php echo "var img_logo = '".base_url()."assets/img/roagro.png';" ?>
    <?php echo "var img_norte = '".base_url()."assets/img/MNarrow.png';" ?>
    
    
    L.Control.Watermark = L.Control.extend({
		onAdd: function(map) {
			var img = L.DomUtil.create('img');
			img.src = img_logo;
			img.style.width = '200px';
			
			return img;
		},
		
		onRemove: function(map) {
			// Nothing to do here
		}
	});

	L.control.watermark = function(opts) {
		return new L.Control.Watermark(opts);
	}
	L.control.watermark({ position: 'bottomleft' }).addTo(map);

   

    //logo position: bottomright, topright, topleft, bottomleft
    var logo = L.control({position: 'topright'});
    logo.onAdd = function(map){
       
       		 var img = L.DomUtil.create('img');
		img.src = img_norte;
		img.style.width = '35px';			
		return img;
    }
    logo.addTo(map);
    
    
    
    function onEachFeature(feature, layer) {
    
    if (feature.properties) {
        
        if (feature.properties.NOMBDEP) {
        
        		layer.bindPopup("<p><b>Región:</b> " + feature.properties.NOMBDEP  +
        		"<br>"+ "</p>");
        		
        		
        }
        
        if (feature.properties.nb_centro_poblado) {
        
        		layer.bindPopup("<p><b>Centro Poblado:</b> " + feature.properties.nb_centro_poblado  +
        		"<br>"+ "</p>");
        }
        
        if (feature.properties.NOMBPROV) {
        
        		layer.bindPopup("<p><b>Región:</b> " + feature.properties.FIRST_NOMB  +
        		"<br><b>Provincia:</b> "  + feature.properties.NOMBPROV + 
        		"<br>"+ "</p>");
        		
        		
        		console.log(feature.properties.NOMBPROV + "=>" + nb_prov);
        		if (feature.properties.NOMBPROV == nb_prov) {
        			layer.setStyle({fillColor: "#3EFF00", fillOpacity: 0.2});
        			
        		}
        		
        		 
        		
        }
        if (feature.properties.NOMBDIST) {
        
        		layer.bindPopup("<p><b>Región:</b> " + feature.properties.NOMBDEP  +
        		"<br><b>Provincia:</b> "  + feature.properties.NOMBPROV + 
                "<br><b>Distrito:</b> "  + feature.properties.NOMBDIST +               
        		"<br>"+ "</p>");
        }
        if (feature.properties.CAPITAL) {
        
        		layer.bindPopup("<p><b>Región:</b> " + feature.properties.DEPARTAM  +
        		"<br><b>Provincia:</b> "  + feature.properties.PROVINCIA + 
                "<br><b>Distrito:</b> "  + feature.properties.DISTRITO +               
                "<br><b>Capital:</b> "  + feature.properties.CAPITAL +  
        		"<br>"+ "</p>");
        }
        
        if (feature.properties.NOMCP) {
        
        		layer.bindPopup("<p><b>Región:</b> " + feature.properties.DEP  +
        		"<br><b>Provincia:</b> "  + feature.properties.PROV + 
                "<br><b>Distrito:</b> "  + feature.properties.DIST +               
                "<br><b>Centro Poblado:</b> "  + feature.properties.NOMCP +  
        		"<br>"+ "</p>");
        		
        		//layer.bindTooltip(feature.properties.NOMCP, { permanent: true});
        }
        
        if (feature.properties.centro_poblado) {
        
        	    var customOptions =
				        {
				        'maxHeight': '500'
				       
				        };
                
        layer.bindPopup(feature.properties.centro_poblado, customOptions);        	    
        		
        		
        }
        
        
        
        
    }
}


</script>