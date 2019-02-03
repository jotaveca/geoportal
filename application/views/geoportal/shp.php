<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Geoportal
        <small>Repaat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li class="active">Geoportal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    
   
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
                            
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group ">
                            <label>Provincia</label>
                            <select id="id_provincia" name="id_provincia" class="form-control select2" style="width: 100%;"  required >
                              <option value="" >Seleccione</option>
                               
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
            
                        
       
       </p>

                    <div class="form-group ">
                            <label>Distrito</label>
                            <select id="id_distrito" name="id_distrito" class="form-control select2" style="width: 100%;"  >
                              <option value="" >Seleccione</option>
                           
                            </select>
                          </div>
                          <!-- /.form-group -->  
                          



                   <?php   $tx_rubro = array('Seleccione', 'Transporte y comunicación', 'Salud', 'Vivienda y saneamiento', 'Educación', 'Interior', 'Defensa' ); ?> 

          
                           <div class="form-group ">
                            <label>Sector</label>
                            <select id="tx_rubro"  name="tx_rubro" class="form-control select2" style="width: 100%;" >
                           
                            </select>
                          </div>
                          <!-- /.form-group -->
            
             <?php   $tx_intervencion = array('Seleccione','Distrital',  'Provincial', 'Regional', 'Nacional', 'Cooperación' ); ?> 
                     <div class="form-group ">
                            <label>Intervención</label>
                            <select id="tx_intervencion" name="tx_intervencion" class="form-control select2" style="width: 100%;" >
                             
                              
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                          
               <?php   $tx_tipo_intervencion = array('Seleccione', 'Programa',  'Proyecto', 'Actividad' ); ?> 
                
                            
                        <div class="form-group ">
                            <label>Tipo de Intervención</label>
                            <select id="tx_tipo_intervencion" name="tx_tipo_intervencion" class="form-control select2" style="width: 100%;" >
                            
                              
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
             <?php   //$tx_tipo_moneda = array("0"=> 'Seleccione','sol' => 'Soles',  'euro' => 'Euros', 'usd' => 'Dolares americanos'); ?> 
                    
                   <!-- <div class="form-group required">
                <label>Tipo de moneda</label>
                <select id="tx_tipo_moneda" name="tx_tipo_moneda"  class="form-control select2" style="width: 100%;" >
                    <?php /*foreach ($tx_tipo_moneda as $clave => $valor ) { 

                    $selected = '';
                    if($clave == $data_tx_tipo_moneda ) $selected = 'selected';
                    echo "<option $selected  value='".$clave."'> ".$valor ."</option>";

                  } */?>
                </select>
              </div> 
              -->
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


	
	
	
	
        <!-- Include the loading control -->
        <link rel="stylesheet" href="https://rawgithub.com/ebrelsford/Leaflet.loading/master/src/Control.Loading.css" />
        <script src="https://rawgithub.com/ebrelsford/Leaflet.loading/master/src/Control.Loading.js"></script>
        
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/leaflet/shapefile.js"> </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/leaflet/leaflet.shapefile.js"> </script>
        


   <style>
#map{ 
    height: 800px;
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
	
	


map.addLayer(grayscale);
	



   
    

    //Al finalizar la carga de la pagina
    $(window).on('load', function () {
      
      //alert("Window Loaded");
                 
    
   	var control = L.control.layers(baseLayers);
   	control.addTo(map);
   	
   	
   	shp("<?php echo base_url(); ?>shapefile/shp_satipo.zip").then(function(geojson) { //More info: https://github.com/calvinmetcalf/shapefile-js
        var layer = L.shapefile(geojson).addTo(map); //More info: https://github.com/calvinmetcalf/leaflet.shapefile
        console.log(layer);
        });
        
        alert("<?php echo base_url(); ?>shapefile/shp_satipo.zip");
   	
 		    	
    });// fin on load

 
</script>