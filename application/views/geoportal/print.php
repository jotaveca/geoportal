<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>REPPAT</title>




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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> 
    <link id="pp-main" rel="stylesheet" href="https://rawgit.com/MarcChasse/leaflet.PrintPreview/master/leaflet.printpreview.css" disabled>
    <link id="pp-ltr-land" rel="stylesheet" href="https://rawgit.com/MarcChasse/leaflet.PrintPreview/master/leaflet.printpreview.letter.landscape.css" disabled>
    <link id="pp-ltr-port" rel="stylesheet" href="https://rawgit.com/MarcChasse/leaflet.PrintPreview/master/leaflet.printpreview.letter.portrait.css" disabled>
    <script src="https://rawgit.com/MarcChasse/Leaflet.PrintPreview/master/leaflet.printpreview.js"></script>


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
   
</head>
<body>
	<div id="map" ></div>
	
	 	 
	 
<script>
	
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
	
	var estiloVerde = { //Naranja
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
  
  
   return L.marker(latlng, { icon: gIcon })

   
  
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
    

    //Al finalizar la carga de la pagina
    $(window).on('load', function () {
      
      //alert("Window Loaded");
      
      var asociacion_peru = new L.geoJson(proyectos_ofic_central, {
     pointToLayer: createIconOfic, onEachFeature: onEachFeature
    }).on('click', function (e) {
    
    }).addTo(map);
    
         
	    
	    
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
                control.addOverlay(departamentos_peru, 'Departamentos');
                
                
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
         
        }).addTo(map);
        
    
   	var control = L.control.layers(baseLayers);
   	control.addTo(map);
   	
   	control.addOverlay(proyectos_peru, 'Proyectos');
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
	   	
	   	
	   	
	 L.PrintPreview().addTo(map);
	  

	    	
    });// fin on load

 
  
    
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
        
        		layer.bindPopup("<p><b>Departamento:</b> " + feature.properties.NOMBDEP  +
        		"<br>"+ "</p>");
        }
        
        if (feature.properties.nb_centro_poblado) {
        
        		layer.bindPopup("<p><b>Centro Poblado:</b> " + feature.properties.nb_centro_poblado  +
        		"<br>"+ "</p>");
        }
        
        if (feature.properties.NOMBPROV) {
        
        		layer.bindPopup("<p><b>Departamento:</b> " + feature.properties.FIRST_NOMB  +
        		"<br><b>Provincia:</b> "  + feature.properties.NOMBPROV + 
        		"<br>"+ "</p>");
        }
        if (feature.properties.NOMBDIST) {
        
        		layer.bindPopup("<p><b>Departamento:</b> " + feature.properties.NOMBDEP  +
        		"<br><b>Provincia:</b> "  + feature.properties.NOMBPROV + 
                "<br><b>Distrito:</b> "  + feature.properties.NOMBDIST +               
        		"<br>"+ "</p>");
        }
        if (feature.properties.CAPITAL) {
        
        		layer.bindPopup("<p><b>Departamento:</b> " + feature.properties.DEPARTAM  +
        		"<br><b>Provincia:</b> "  + feature.properties.PROVINCIA + 
                "<br><b>Distrito:</b> "  + feature.properties.DISTRITO +               
                "<br><b>Capital:</b> "  + feature.properties.CAPITAL +  
        		"<br>"+ "</p>");
        }
        
        if (feature.properties.NOMCP) {
        
        		layer.bindPopup("<p><b>Departamento:</b> " + feature.properties.DEP  +
        		"<br><b>Provincia:</b> "  + feature.properties.PROV + 
                "<br><b>Distrito:</b> "  + feature.properties.DIST +               
                "<br><b>Centro Poblado:</b> "  + feature.properties.NOMCP +  
        		"<br>"+ "</p>");
        		
        		//layer.bindTooltip(feature.properties.NOMCP, { permanent: true});
        }
        
        if (feature.properties.centro_poblado) {
        
        	    layer.bindPopup(feature.properties.centro_poblado);
        	    
        		
        		//layer.setPopupContent("<strong>Hello</strong> <p> fsdfs fjnsd fksdnk sdf sndfk snfkj s </p> <br><br>  <strong>Hello</strong> <p> fsdfs fjnsd fksdnk sdf  gf dgdg dgd g dsndfk snfkj s </p> ");
        		
        		//$( "#660050" ).append( "<strong>Hello</strong>" ); 
        	
        		/*layer.bindPopup("<p><b>Nombre del Proyecto:</b> " + feature.properties.name_proy  +
        		"<br><b>Rubro del Proyecto:</b> " + feature.properties.rubro_proy  +
        		"<br>"+ "</p>");
        		*/
        }
        
        
        
        
    }
}


</script>
</body>
</html>