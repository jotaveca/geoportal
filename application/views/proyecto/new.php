<style>
    .required label:after {
    color: #e32;
    content: ' *';
    display:inline;

     .fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
}
    
</style>

<!-- Modal ELIMINAR SHAPE -->
  <div class="modal fade" id="modal-eliminar-shp" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar Shapefile</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_shp_eliminar" type="hidden"> 
              <p>¿Está seguro que desea eliminar el shapefile seleccionado?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnEliminarShp" class="btn btn-primary">Eliminar</button> 
        </div>
      </div>
    </div>
  </div>
  
  
<!-- Modal IR A MAPA -->
  <div class="modal fade" id="modal-ver-shp" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ir a Mapa</h4>
        </div>
        <div class="modal-body">                           
             
              <p>¿Está seguro que desea ver el shapefile seleccionado en el mapa?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnVerProyecto" class="btn btn-primary">Aceptar</button> 
        </div>
      </div>
    </div>
  </div>
  

<!-- Modal ELIMINAR IMAGEN -->
  <div class="modal fade" id="modal-eliminar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar imagen</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_imagen_eliminar" type="hidden"> 
              <p>¿Está seguro que desea eliminar la imagen seleccionada?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnEliminarImg" class="btn btn-primary">Eliminar</button> 
        </div>
      </div>
    </div>
  </div>


  <!-- Modal NUEVO SHAPE -->
 <div class="modal fade" id="modal-nueva-shape" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Shapefile</h4>
        </div>
        <div class="modal-body">        
                                 
	
        <form method="post" id="upload_form_shp" name="upload_form_shp" enctype="multipart/form-data">

        <div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo">Nombre del archivo</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre del archivo">
				</div>
                          <input type="hidden" id="val_id_proyecto_gal" name="val_id_proyecto_gal" value="0">
			</div>

		</div>

		<div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="imagen">Seleccione un archivo comprimido zip (shapefile)</label>
					<input type="file" name="image_file" id="image_file" />
				</div>
			</div>

		</div>

           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="upload" name="upload" class="btn btn-primary"  >Guardar</button> 
        </div>

     </form>

      </div>
    </div>
  </div>
  
  
  

 <div class="modal fade" id="modal-nueva-imagen" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva imagen</h4>
        </div>
        <div class="modal-body">          
                           
       
	<?php //echo form_open_multipart('proyecto/do_upload');?>

        <form method="post" id="upload_form" name="upload_form" enctype="multipart/form-data">

        <div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo">Titulo de la imagen</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre de la imagen">
				</div>
                          <input type="hidden" id="val_id_proyecto_gal" name="val_id_proyecto_gal" value="0">
			</div>

		</div>

		<div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="image_file" id="image_file" />
				</div>
			</div>

		</div>




           

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="upload" name="upload" class="btn btn-primary"  >Guardar</button> 
        </div>

</form>


      </div>
    </div>
  </div>



<!-- Modal -->
  <div class="modal fade" id="modal-guardar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Proyecto guardado</h4>
        </div>
        <div class="modal-body">   

              <p>Proyecto guardado satisfactoriamente. Por favor agregue los resultados alcanzados en el proyecto.</p>

        </div>
        <div class="modal-footer">
          <button id="btnCerrarGuardar" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
 
  <!-- Modal -->
  <div class="modal fade" id="modal-guardar-resultados" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Proyecto guardado</h4>
        </div>
        <div class="modal-body">   

              <p>Resultados guardados satisfactoriamente. Por favor agregue las actividades del proyecto.</p>

        </div>
        <div class="modal-footer">
          <button id="btnCerrarGuardar" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
  
<!-- Modal -->
  <div class="modal fade" id="modal-guardar-actividades" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Proyecto guardado</h4>
        </div>
        <div class="modal-body">   

              <p>Actividad guardada satisfactoriamente.</p>

        </div>
        <div class="modal-footer">
          <button id="btnCerrarGuardar" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  


  

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proyecto
        <small>Nuevo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li class="active">Proyecto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
       
         <!-- Default box -->
       <div class="box box-danger">
      
       
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
              
        <div class="col-md-12">  
                            
                            <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li  id="li_tab_3" class="active"><a href="#tab_3" data-toggle="tab">General</a></li>
               <li id="li_tab_4" ><a href="#tab_4" data-toggle="tab">Componentes</a></li>
               <li id="li_tab_5" ><a href="#tab_5" data-toggle="tab">Actividades</a></li>
               <li id="li_tab_6" ><a href="#tab_6" data-toggle="tab">Galería</a></li>
               <li id="li_tab_7" ><a href="#tab_7" data-toggle="tab">Shapefile</a></li>
            </ul>
            <div class="tab-content ">
   
     
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3">
                  
                  <input type="hidden" id="val_id_proyecto" value="0">
                  
                   <!-- Default box -->
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Información institucional de la Entidad Ejecutora</h3>
                </div>
               
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                      
                    <form id="formProyecto" >  
                    <div class="col-md-6">
                  
                     
                      
                      <div class="form-group required">
                          <label>Razón Social</label>
                          <input id="tx_nombre_ejec" type="text" class="form-control" placeholder="Ingrese ..." required >
                        </div>
                        
                        
                        <div class="form-group required">
                          <label>RUC</label>
                          <input id="tx_ruc_ejec" type="text" class="form-control" placeholder="Ingrese ..."  required >
                        </div>
                      
                       <div class="form-group required">
                        <label>País</label>
                        <select id="id_pais_ejec" class="form-control select2" style="width: 100%;"  required >
                          <option value="1" selected="selected">Peru</option>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                       <div class="form-group required">
                        <label>Región</label>
                        <select id="id_region_ejec" class="form-control select2" style="width: 100%;"  required >
                          <option value="" selected="selected">Seleccione</option>
                          <?php for ($i = 0; $i < count($regiones); $i++) { 
        
                            echo "<option value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
        
                          } ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                        <div class="form-group required">
                        <label>Provincia</label>
                        <select id="id_provincia_ejec" class="form-control select2" style="width: 100%;"  required >
                          <option value="" selected="selected">Seleccione</option>
                         
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                       <div class="form-group required">
                        <label>Distrito</label>
                        <select id="id_distrito_ejec" class="form-control select2" style="width: 100%;"  required >
                          <option value="" selected="selected">Seleccione</option>
                        
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                   
                     <div class="form-group required">
                          <label>Dirección</label>
                           <input id="tx_direccion_ejec" type="text" class="form-control" placeholder="Ingrese ..."  required >
                        </div>
                        
                     <div class="form-group required ">
                          <label>Teléfono movil</label>
                          <input id="tx_telefono_ejec" type="tel" class="form-control" placeholder="Ingrese ..."  required >
                        </div>  
                    
                     <div class="form-group ">
                          <label>Página web</label>
                           <input id="tx_pagina_web_ejec" type="text" class="form-control" placeholder="Ingrese ...">
                        </div>
                    
                    
                     <div class="form-group ">
                          <label>Correo electrónico</label>
                           <input id="tx_correo_electronico_ejec" type="email" class="form-control" placeholder="Ingrese ...">
                        </div>
                        
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" id="btnGuardarEjecutora" class="btn btn-success pull-right" >
                    <i class="fa fa-download"></i> Guardar </button> -->
                </div>
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->
              
              
                <!-- Default box -->
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Información institucional de la Entidad Financiera (Si aplica) </h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                      
                        <div class="col-md-6">
                          
                          <div class="form-group">
                              <label>Razón Social</label>
                              <input id="tx_nombre_finan" type="text" class="form-control" placeholder="Ingrese ..."   >
                            </div>
                            
                            
                            <div class="form-group">
                              <label>RUC</label>
                              <input id="tx_ruc_finan" type="text" class="form-control" placeholder="Ingrese ..."   >
                            </div>
                          
                           <div class="form-group ">
                            <label>País</label>
                            <select id="id_pais_finan" class="form-control select2" style="width: 100%;"   >
                              <option value="1" selected="selected">Peru</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group ">
                            <label>Región</label>
                            <select id="id_region_finan" class="form-control select2" style="width: 100%;"   >
                              <option value="" selected="selected">Seleccione</option>
                              <?php for ($i = 0; $i < count($regiones); $i++) { 
            
                                echo "<option value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
            
                              } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                            <div class="form-group ">
                            <label>Provincia</label>
                            <select id="id_provincia_finan" class="form-control select2" style="width: 100%;"   >
                              <option value="" selected="selected">Seleccione</option>
                             
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group ">
                            <label>Distrito</label>
                            <select id="id_distrito_finan" class="form-control select2" style="width: 100%;"   >
                              <option value="" selected="selected">Seleccione</option>
                            
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                       
                         <div class="form-group ">
                              <label>Dirección</label>
                               <input id="tx_direccion_finan" type="text" class="form-control" placeholder="Ingrese ..."   >
                            </div>
                            
                         <div class="form-group  ">
                              <label>Teléfono movil</label>
                              <input id="tx_telefono_finan" type="tel" class="form-control" placeholder="Ingrese ..."   >
                            </div>  
                        
                         <div class="form-group ">
                              <label>Página web</label>
                               <input id="tx_pagina_web_finan" type="text" class="form-control" placeholder="Ingrese ...">
                            </div>
                        
                        
                         <div class="form-group ">
                              <label>Correo electrónico</label>
                               <input id="tx_correo_electronico_finan" type="email" class="form-control" placeholder="Ingrese ...">
                            </div>
                            
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <!-- <button type="submit" id="btnGuardarFinanciera" class="btn btn-success pull-right" >
                        <i class="fa fa-download"></i> Guardar </button>  -->
                    </div>
                    <!-- /.box-footer-->
                  </div>
                  <!-- /.box -->
             
                    
                   <!-- Default box -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Información del residente / coordinador</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                        
                          
                          <div class="form-group required">
                              <label>Coordinador/Residente</label>
                              <input id="tx_nom_ape_residente" type="text" class="form-control" placeholder="Ingrese ..." required >
                            </div>
                            
                              
                         <div class="form-group ">
                              <label>Correo electrónico</label>
                               <input id="tx_email_residente" type="email" class="form-control" placeholder="Ingrese ...">
                            </div>
                          
                           <div class="form-group required ">
                              <label>Profesión</label>
                              <input id="tx_profesion_residente" type="tel" class="form-control" placeholder="Ingrese ..."  required >
                            </div>  
                   
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                       
                         <div class="form-group required">
                              <label>Número DNI</label>
                              <input id="tx_dni_residente" type="tel" class="form-control" placeholder="Ingrese ..."  required >
                            </div>
                            
                         <div class="form-group required ">
                              <label>Teléfono movil</label>
                              <input id="tx_telefono_residente" type="tel" class="form-control" placeholder="Ingrese ..."  required >
                            </div>  
                   
                      
                            
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  
                    <!-- /.box-body -->
                    <div class="box-footer">
                     <!--   <button type="submit" id="btnGuardarEjecutora" class="btn btn-primary pull-right" >
                        <i class="fa fa-download"></i> Guardar </button> -->
                    </div>
                    <!-- /.box-footer-->
                  </div>
                  <!-- /.box -->
                  
             
             
                             <!-- Default box -->
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Identificación</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                            
                       
                       
                          
                          <div class="form-group required">
                              <label> Nombre completo de la intervención  </label>
                              <input id="tx_nombre" type="text" class="form-control" placeholder="Ingrese máximo 300 caracteres" required>
                            </div>
                            
                            
                     <div class="form-group required">
                            <label>Intervención</label>
                            <select id="tx_intervencion" class="form-control select2" style="width: 100%;" required>
                              <option value="" selected="selected">Seleccione</option>
                              <option>Distrital</option>
                              <option>Provincial</option>
                              <option>Regional</option>
                              <option>Nacional</option>
                              <option>Cooperación</option>
                              
                            </select>
                          </div>
                          <!-- /.form-group -->
                            
                            
                        <div class="form-group required">
                            <label>Tipo de Intervención</label>
                            <select id="tx_tipo_intervencion" class="form-control select2" style="width: 100%;" required>
                              <option value="" selected="selected">Seleccione</option>                              
                              <option>Programa</option>    
                              <option>Proyecto</option>
                              <option>Actividad</option>                             
                              
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                          <div class="form-group">
                            <label>Fecha Inicio:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_inicio" class="form-control pull-right" id="fe_inicio" type="text" required>
                            </div>
                            <!-- /.input group -->
                          </div>
                          
                          <div class="form-group ">
                              <label>Código Invierte.Pe (si corresponde)</label>
                              <input id="tx_co_snip" type="text" class="form-control" placeholder="Ingrese ...">
                            </div>
                            
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            
                         <div class="form-group required">
                              <label>Siglas de la intervención</label>
                              <input id="tx_siglas" type="text" class="form-control" placeholder="Ingrese ..." required>
                            </div>
                            
                           <div class="form-group required">
                            <label>Sector</label>
                            <select id="tx_rubro" class="form-control select2" style="width: 100%;" required>
                              <option value="" selected="selected">Seleccione</option>
                              <option>Transporte y comunicación</option>
                              <option>Salud</option>
                              <option>Vivienda y saneamiento</option>
                              <option>Educación</option>
                              <option>Interior</option>
                              <option>Defensa</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                            
                            
                        <div class="form-group required">
                            <label>Situación de Intervención</label>
                            <select id="tx_situacion_intervencion" class="form-control select2" style="width: 100%;" required>
                              <option value="" selected="selected">Seleccione</option>
                              <option>En ejecución</option>    
                              <option>Paralizado</option> 
                              <option>Judicializado</option> 
                              <option>Ejecutado</option>
                            </select>
                          </div>
                          
                         <div class="form-group">
                            <label>Fecha Fin:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_fin" class="form-control pull-right" id="fe_fin" type="text" required>
                            </div>
                            <!-- /.input group -->
                          </div> 
                          
                           <div class="form-group ">
                              <label>Número de beneficiarios</label>
                              <input id="nu_beneficiarios" type="number" class="form-control" placeholder="Ingrese ...">
                            </div>
                            
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                      
                  
                    <!-- /.box-body -->
                    <div class="box-footer">
                     <!--  <button type="submit" id="btnGuardarInfo" class="btn btn-primary pull-right" >
                        <i class="fa fa-download"></i> Guardar </button> -->
                    </div>
                    <!-- /.box-footer-->
                  </div>
                  <!-- /.box -->
                  
                  
             
             
             
             
                            <!-- Default box -->
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title"> Centros poblados/CN beneficiarias</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                            
                       
                           <div class="form-group required">
                            <label>País</label>
                            <select id="id_pais" class="form-control select2" style="width: 100%;"  required >
                              <option value="1" selected="selected">Peru</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group required">
                            <label>Región</label>
                            <select id="id_region" class="form-control select2" style="width: 100%;"  required >
                              <option value="" selected="selected">Seleccione</option>
                              <?php for ($i = 0; $i < count($regiones); $i++) { 
            
                                echo "<option value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
            
                              } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group required">
                            <label>Provincia</label>
                            <select id="id_provincia" class="form-control select2" style="width: 100%;"  required >
                              <option value="" selected="selected">Seleccione</option>
                             
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
            
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            
                        
                          
                           <div class="form-group required">
                            <label>Distrito</label>
                            <select id="id_distrito" class="form-control select2" style="width: 100%;"  required >
                              <option value="" selected="selected">Seleccione</option>
                            
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group required">
                            <label>Centros poblados</label>
                          </div>
                          <!-- /.form-group -->
                          
                             <div class="input-group input-group-sm">
                            <select id="id_centro_poblado" class="form-control select2" style="width: 100%;">
                              <option value="" selected="selected">Seleccione</option>
                            </select>
                                <span class="input-group-btn">
                                   <button  id="addrowCP"  type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>   </button>
                                </span>
                          </div>
                          <!-- /input-group -->
                          
                           <table id="myTableCP" class=" table order-list" >
                                   
                                    <tbody>
                                        <tr>
                                            <td class="col-sm-10">
                                               <div class="form-group ">
                                                 
                                                </div>
                                            </td>
                                             <td class="col-sm-2" > </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                 
                 <div class="form-group ">
                              <label>Otro centro poblado</label>
                              <input id="tx_otro_centro_poblado" type="text" class="form-control" placeholder="Ingrese un centro poblado que no esté en la lista">
                            </div>
                            
                            
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                      
                  
                    <!-- /.box-body -->
                    <div class="box-footer">
                     <!--  <button type="submit" id="btnGuardarInfo" class="btn btn-primary pull-right" >
                        <i class="fa fa-download"></i> Guardar </button> -->
                    </div>
                    <!-- /.box-footer-->
                  </div>
                  <!-- /.box -->
                  
                  

      
           <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Costos y financiamiento</h3>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              
             
                     <div class="form-group required">
                <label>Tipo de moneda</label>
                <select id="tx_tipo_moneda" class="form-control select2" style="width: 100%;" required>
                  <option selected="selected">Seleccione</option>
                  <option value="sol">Soles</option>
                  <option value="euro">Euros</option>
                  <option value="usd">Dolares americanos</option>
                </select>
              </div>
              <!-- /.form-group -->
              
              
                 <div class="form-group required">
                  <label>Presupuesto total</label>
                  <input id="nu_presupuesto_total"  value="0" type="number" class="form-control"  required disabled>
                </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                
             <div class="form-group ">
                  <label>Monto financiado</label>
                  <input id="nu_monto_financiado" value="0" type="number" class="form-control" placeholder="Ingrese ..."  step="0.01">
                </div>
                
             <div class="form-group ">
                  <label>Monto de contrapartida (monetaria/valorizado)</label>
                  <input id="nu_monto_contrapartida" value="0" type="number" class="form-control" placeholder="Ingrese ..." step="0.01">
                </div>
                
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
                <!-- /.box-body -->
        <div class="box-footer">
          <!-- Paso 1 -->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      
      
                <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Evaluación Ex Post y/o Monitoreo</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              
            
             <div class="form-group required">
                <label>Evaluación</label>
                <select id="tx_evaluacion" class="form-control select2" style="width: 100%;" required>
                  <option selected="selected">Seleccione</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </div>
              <!-- /.form-group -->
              
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                
       <div class="form-group">
                  <label>Gestiones propias realizadas por los beneficiarios y/o asociación</label>
                 <textarea id="tx_gestiones" class="form-control" rows="5" placeholder="Ingrese ..." ></textarea>
                </div>
                
                
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-xs-12">
         
          <!-- <button type="button" class="btn btn-default "><i  class="fa fa-print"></i> Imprimir
          </button> -->
          <button id="btnGuardar" type="submit" class="btn btn-success pull-right	" >
            <i class="fa fa-download"></i> Guardar     </button>
        </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      
 
 </form>
    
        
               
              </div>
              <!-- /.tab-pane -->
              
              
               <div class="tab-pane" id="tab_4">
                   
            <!-- Default box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Componentes </h3> <button  id="addrowRes"  type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>   </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                        
              <table id="myTableRes" class=" table order-list" >
                <tbody>
                    
                </tbody>
            </table>
                        
            </div>
            <!-- /.col -->
       
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
                   <button type="button" id="btnGuardarResul" class="btn btn-success pull-right" disabled >
                        <i class="fa fa-download"></i> Guardar </button> 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
                   
                </div>
              <!-- /.tab-pane -->
              
              
                          
               <div class="tab-pane" id="tab_5">
                   
            <!-- Default box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Actividades </h3> <button  id="addrowAct"  type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>   </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                        
              <table id="myTableAct" class=" table order-list" >
                <tbody>
                     <!--
                    <tr>
                    <td> 
                        <div class="form-group">
                        <label>Componentes</label> 
                        <select id="tx_evaluaciones" class="form-control select2" style="width: 100%;">  </select>
                        </div>
                    </td>
                <td> <textarea  class="form-control txtActividad" rows="3" placeholder="Ingrese ..."  required ></textarea> </td>
                <td>   <button   type="button" class="ibtnDelAct btn btn-danger pull-right"><i class="fa fa-close"></i>   </button> </td>
               </tr>     --> 
                </tbody>
            </table>
                        
            </div>
            <!-- /.col -->
       
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Paso 4 -->
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
                   
                
         </div>
              <!-- /.tab-pane -->


         <div class="tab-pane" id="tab_6">
                   
          
         <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Galería de fotos.</h3>
             <button type="button" id="addImg" name="addImg" class="btn btn-primary pull-right" disabled ><i class="fa fa-plus"></i> Nuevo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
          
        <div id="uploaded_image">


             <div class="row">
                   
                 

      <?php foreach ($galerias as $galeria): ?>

      <div class="col-sm-4 col-md-4" id="img_<?php echo $galeria->id ?>" >
        <div class="thumbnail">

          <a class="fancybox-effects-a" href="<?php echo base_url('upload/'.$galeria->imagen); ?>" data-fancybox-group="gallery" title="<?php echo $galeria->titulo; ?>" >
            <img  src="<?php echo base_url('upload/tumb_'.$galeria->imagen); ?>" class="img img-responsive" />
          </a>

          <div class="caption">
            
            <p class="text-center"><?php echo $galeria->titulo; ?></p>
           
 
<button type='button' data-imagen-id="<?php echo $galeria->id; ?>" data-toggle='modal' data-target='#modal-eliminar' class='btn btn-danger'>
<i class="fa fa-close"></i> Eliminar</button>  
     
          </div>

        </div>

      </div>
    <?php endforeach; ?>
 
 </div>
<!-- /.fin row -->

 </div>
<!-- /.fin uploaded_image -->


             </div>

              <div class="box-footer">
                                
              </div>
           
          </div>
                   
                
         </div>
         <!-- /.tab-pane -->
              
      

         <div class="tab-pane" id="tab_7">
                   
          
         <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Shapefile</h3>
             <button type="button" id="addShp" name="addShp" class="btn btn-primary pull-right" disabled ><i class="fa fa-plus"></i> Nuevo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
          
        <div id="uploaded_image_shp">


             <div class="row">
                   
                 
    <?php foreach ($shapefiles as $shp): ?>

      <div class="col-sm-4 col-md-4" id="img_<?php echo $shp->id ?>" >
        <div class="thumbnail">

          <a class="fancybox-effects-a" href="<?php echo base_url('shapefile/shapefiles.png'); ?>" data-fancybox-group="gallery" title="<?php echo $shp->titulo; ?>" >
            <img height="128" width="128" src="<?php echo base_url('shapefile/shapefiles.png'); ?>" class="img img-responsive" />
          </a>

          <div class="caption">
            
            <p class="text-center"><?php echo $shp->titulo; ?></p>           
 
		<button type='button' data-shp-id="<?php echo $shp->id; ?>" data-toggle='modal' data-target='#modal-eliminar-shp' class='btn btn-danger'>
		<i class="fa fa-close"></i> Eliminar</button>  
		
		<button type='button' data-shp-id="<?php echo $shp->id; ?>"  class='btn btn-primary'>
		<i class="fa fa-map-marker"></i> Mapa</button>  
     
          </div>

        </div>

      </div>
    <?php endforeach; ?>
     
 
            </div>
            <!-- /.fin row -->

        </div>
        <!-- /.fin uploaded_image -->


             </div>

              <div class="box-footer">
                                
              </div>
           
          </div>
                   
                
         </div>
         <!-- /.tab-pane -->
        
              
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        
          </div>
  
  
          </div>
          <!-- /.row -->
        </div>
      
        <!-- /.box-body -->
        <div class="box-footer">
            <button  id="btnIrProy"  type="button" class="btn btn-primary pull-left"><i class="fa fa-map-marker"></i> Ir a mis proyectos  </button>
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

<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>


<?php echo link_tag('assets/font-awesome/css/font-awesome.min.css'); ?>

	<script src="<?php echo base_url("assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"); ?>"></script>

	<script src="<?php echo base_url("assets/fancybox/source/jquery.fancybox.js?v=2.1.5"); ?>"></script>
	<?php echo link_tag('assets/fancybox/source/jquery.fancybox.css?v=2.1.5'); ?>

	<script src="<?php echo base_url("assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"); ?>"></script>
	<?php echo link_tag('assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5'); ?>

	<script src="<?php echo base_url("assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"); ?>"></script>
	<?php echo link_tag('assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7'); ?>

	<script src="<?php echo base_url("assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"); ?>"></script>



<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>


<script>
$(function () {
    //Initialize Select2 Elements
   $('.select2').select2();
   
   var currentDate = new Date();
    $('#fe_inicio').datepicker("setDate", currentDate);
    $('#fe_fin').datepicker("setDate", currentDate);
    
      var array_resultado_actividad = new Object(); 
    
    
   
    var counteCP = 0;
    $("#addrowCP").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

       
        var id_cp = $( "#id_centro_poblado option:selected" ).val();
        var nb_cp = $( "#id_centro_poblado option:selected" ).html();
        
         if(id_cp != "") {
               
              cols += "<td><input type='text' class='form-control txtCentroPoblado' id='"+id_cp+"' value='"+nb_cp+"' disabled> </td>"; 
              //cols += "<td><span class='label label-success'  id='cp_"+id_cp+"' > "+nb_cp+" </span> </td>";
              cols += '<td>   <button   type="button" class="ibtnDelCP btn btn-danger pull-right"><i class="fa fa-close"></i>   </button>   </td>';
            newRow.append(cols);
            $("#myTableCP").append(newRow);
            counteCP++;
             
         }
      
    });

    $("#myTableCP").on("click", ".ibtnDelCP", function (event) {
        $(this).closest("tr").remove();       
        counteCP -= 1
    });

   
//IMAGENES

   $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
            
                $.ajax({  
                     url:"<?php echo site_url(); ?>/proyecto/ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').append(data);  
                     }  
                });  
            
      $("#modal-nueva-imagen").modal('toggle');
 
      }); 


       $('#upload_form_shp').on('submit', function(e){  
           e.preventDefault();  
            
                $.ajax({  
                     url:"<?php echo site_url(); ?>/proyecto/ajax_upload_shp",                    
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image_shp').append(data);  
                     }  
                });  
            
      $("#modal-nueva-shape").modal('toggle');
 
      }); 




    $('#modal-eliminar').on('show.bs.modal', function(e) {
        var id_imagen = $(e.relatedTarget).data('imagen-id');        
        $('#id_imagen_eliminar').val(id_imagen);

        //alert(id_imagen);        
        
   });

   $('#modal-eliminar-shp').on('show.bs.modal', function(e) {
        var id_shp = $(e.relatedTarget).data('shp-id');        
        $('#id_shp_eliminar').val(id_shp);

        //alert(id_shp);         

   });
   
      $('#btnVerProyecto').click(function(){

        
        var id_proyecto= $("#val_id_proyecto").val();
        //location.href= base_url+'/proyecto/edit?id_proyecto=id_proyecto";  
        location.href= "<?php echo base_url(); ?>index.php/geo/ver?id_proyecto="+id_proyecto;

      });
      
      

    $('#btnEliminarImg').click(function(){
        
          var id_imagen_eliminar =  $("#id_imagen_eliminar").val();

           $.ajax({
                url: "<?php echo site_url(); ?>/proyecto/eliminar_imagen",                               
                data: {
                    id_imagen: id_imagen_eliminar                                           
                                        
                },                  
                success: function (result) {                    
                    
                    $("#img_"+id_imagen_eliminar).fadeOut( "slow" );  
                                        

                }
            });

             $("#modal-eliminar").modal('toggle');

        });


        $('#btnEliminarShp').click(function(){
        
          var id_shp_eliminar =  $("#id_shp_eliminar").val();

           $.ajax({
                url: "<?php echo site_url(); ?>/proyecto/eliminar_shp",                               
                data: {
                    id_shp: id_shp_eliminar                                           
                                        
                },                  
                success: function (result) {                    
                    
                    $("#img_"+id_shp_eliminar).fadeOut( "slow" );  
                                        

                }
            });

             $("#modal-eliminar-shp").modal('toggle');

        });




    $('.fancybox').fancybox();

    $(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
	});



       $('#addImg').click(function(){
        
        
                              $("#modal-nueva-imagen").modal('toggle');

        });

       
$('#addShp').click(function(){
        
        
                              $("#modal-nueva-shape").modal('toggle');

        });
    
    
    
   // --------RESULTADOS-----------------
   
   var counterRes = 1;
    $("#addrowRes").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        
        cols += '<td class="col-sm-10"> <textarea  id="tx_resultado_' + counterRes + '" class="form-control txtResultado" rows="3" placeholder="Ingrese ..."  required ></textarea> </td>';
        cols += '<td class="col-sm-2">  ';
        cols += ' <button   type="button" class="ibtnDelRes btn btn-danger pull-right"><i class="fa fa-close"></i>   </button>   </td>';
        newRow.append(cols);
        $("#myTableRes").append(newRow);
        counterRes++;
        
        
    });
    
   
    $("#myTableRes").on("click", ".ibtnDelRes", function (event) {
        $(this).closest("tr").remove();      
        
        //var obj = $(this).parents("tr").find('.txtResultado').attr("id");
        //$("."+obj).closest("tr").remove(); 
        //console.log("Eliminar R: "+ obj);
        //delete array_resultado_actividad[obj];
        
        counterRes -= 1
    });
    
    
    ///--------------------------------------
    
    var counterAct = 1;
    $("#addrowAct").on("click", function () {
      
        
        var newRow = $("<tr>");
        var cols = "";
       
        
        cols += '<td class="col-xs-3"> <input type="hidden" id="id_actividad_' + counterAct +'"> <div class="form-group">\
                <label>Componentes</label>\
                <select id="tx_evaluaciones_' + counterAct + '" class="form-control select2" style="width: 100%;">\
                </select>\
              </div>\
            </td>';
            
        cols += '<td  class="col-xs-7"> <textarea  id="tx_actividades_' + counterAct +'" class="form-control txtActividad" rows="3" placeholder="Ingrese ..."  required ></textarea> </td>';

        cols += '<td  class="col-xs-2">   <button   type="button" class="ibtnDelAct btn btn-danger pull-right"><i class="fa fa-close"></i> Eliminar  </button>\
        <button data-toggle="modal" id="btnAct_' + counterAct + '" data-target="#modal-guardar-actividades" data-id-objeto="' + counterAct + '"  type="button" class="btn btn-success pull-right"><i class="fa fa-check"></i> Guardar   </button>   </td>';
        newRow.append(cols);
        $("#myTableAct").append(newRow);
       
        
        
           var base_url = '<?php echo site_url() ?>';
           $("#tx_evaluaciones_"+counterAct+"").empty();
           
           if($("#val_id_proyecto").val() != 0){
        
           $.ajax({
                url: base_url+'/proyecto/buscar_resultado',                               
                data: {
                    
                    //IDENTIFICACION
                    id_proyecto: $("#val_id_proyecto").val()
                },                  
                success: function (result) {
                    
                    //alert(result);
                    var resultado = $.parseJSON(result);

                    
                    if(resultado == false){
                        

                    }else{     
                        
                        //counterAct = 1 ;
                        console.log(counterAct);
                        $( "#tx_evaluaciones_"+counterAct).append("<option value=''> Seleccione </option>");
                   
                        $.each(resultado, function(key,value) {

                            $("#tx_evaluaciones_"+counterAct).append("<option value='"+value.id+"' >"+value.tx_resultado+"</option>");
                           

                        });
                         counterAct++;
                  
                    }
                    
                }
            }); 
            
           }//fin if
            
        
        
    });
    
    $('#modal-guardar-actividades').on('show.bs.modal', function(e) {
        
        var id_objeto = $(e.relatedTarget).data('id-objeto');
       /* var id_proyecto: $("#val_id_proyecto").val();
        var tx_evaluaciones = $( "#tx_evaluaciones_"+id_objeto+" option:selected" ).val(), 
        var tx_actividades = $("#tx_actividades_"+id_objeto).val();*/
       
        var base_url = '<?php echo site_url() ?>';
        
        if($("#val_id_proyecto").val() != 0){

          $.ajax({
                url: base_url+'/proyecto/guardar_actividad',                               
                data: {
                     id_proyecto: $("#val_id_proyecto").val(),
                     id_resultado: $( "#tx_evaluaciones_"+id_objeto+" option:selected" ).val(),
                     tx_actividades:$("#tx_actividades_"+id_objeto).val()
                                        
                },                  
                success: function (result) {                    
                    
                     var data = $.parseJSON(result);
                     
                    // console.log(data);
                     $("#id_actividad_"+id_objeto).val(data);
                    
                        $('#btnAct_'+id_objeto).prop('disabled', true);
                        $('#btnAct_'+id_objeto).addClass('disabled');
                       
                     

                }
            });
            
        }//fin if

      });
        

  



    $("#myTableAct").on("click", ".ibtnDelAct", function (event) {
        
        $(this).closest("tr").remove();     
        //console.log($(this).closest("tr").find('input').val());
        //var id_actividad = $(this).closest("tr").find('input').val();
        
         var base_url = '<?php echo site_url() ?>';

          $.ajax({
                url: base_url+'/proyecto/eliminar_actividad',                               
                data: {
                     id_actividad: $(this).closest("tr").find('input').val()
                },                  
                success: function (result) {                    
                    
                     var data = $.parseJSON(result);
                     
                     console.log(data);
                    // $("#id_actividad_"+id_objeto).val(data);
                     

                }
            });

        
        //var obj = $(this).parents("tr").find('.txtActividad').attr("id");
        //console.log("Eliminar A: "+ obj);
        //delete array_resultado_actividad[obj];
        counterAct -= 1
    });
    
    
    
      $("#id_region").change(function(){

       var base_url = '<?php echo site_url() ?>';
       $( "#id_provincia").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_provincia',                               
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
      
      
      
      $("#id_region_ejec").change(function(){

       var base_url = '<?php echo site_url() ?>';
       $( "#id_provincia_ejec").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_provincia',                               
                data: {
                    id_region: $( "#id_region_ejec option:selected" ).val(),                                           
                                        
                },                  
                success: function (result) {                    
                    
                     var provincia = $.parseJSON(result);
                     $( "#id_provincia_ejec").append("<option value=''> Seleccione </option>");
                   
                     $.each(provincia, function(key,value) {

                      $( "#id_provincia_ejec").append("<option value='"+value.id+"' >"+value.name+"</option>");

                     }); 

                }
            });

      });
      
      $("#id_region_finan").change(function(){

       var base_url = '<?php echo site_url() ?>';
       $( "#id_provincia_finan").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_provincia',                               
                data: {
                    id_region: $( "#id_region_finan option:selected" ).val(),                                           
                                        
                },                  
                success: function (result) {                    
                    
                     var provincia = $.parseJSON(result);
                     $( "#id_provincia_finan").append("<option value=''> Seleccione </option>");
                   
                     $.each(provincia, function(key,value) {

                      $( "#id_provincia_finan").append("<option value='"+value.id+"' >"+value.name+"</option>");

                     }); 

                }
            });

      });
      
      
          $("#id_provincia").change(function(){
       var base_url = '<?php echo site_url() ?>';
       $( "#id_distrito").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_distrito',                               
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
      
      
      
      $("#id_provincia_ejec").change(function(){
       var base_url = '<?php echo site_url() ?>';
       $( "#id_distrito_ejec").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_distrito',                               
                data: {
                    id_region: $( "#id_region_ejec option:selected" ).val(),                                           
                    id_provincia: $( "#id_provincia_ejec option:selected" ).val(),    
                                        
                },                  
                success: function (result) {                    
                    
                     var distrito = $.parseJSON(result);
                     $( "#id_distrito_ejec").append("<option value=''> Seleccione </option>");
                   
                     $.each(distrito, function(key,value) {

                      $( "#id_distrito_ejec").append("<option value='"+value.id+"' >"+value.name+"</option>");

                     }); 

                }
            });

      });
      
      
    $("#id_provincia_finan").change(function(){

       var base_url = '<?php echo site_url() ?>';
       $( "#id_distrito_finan").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_distrito',                               
                data: {
                    id_region: $( "#id_region_finan option:selected" ).val(),                                           
                    id_provincia: $( "#id_provincia_finan option:selected" ).val(),    
                                        
                },                  
                success: function (result) {                    
                    
                     var distrito = $.parseJSON(result);
                     $( "#id_distrito_finan").append("<option value=''> Seleccione </option>");
                   
                     $.each(distrito, function(key,value) {

                      $( "#id_distrito_finan").append("<option value='"+value.id+"' >"+value.name+"</option>");

                     }); 

                }
            });

      }); 
      
      
      
      
            
      $("#id_distrito").change(function(){
       var base_url = '<?php echo site_url() ?>';
       $( "#id_centro_poblado").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_centro_poblado',                               
                data: {
                    nb_region: $( "#id_region option:selected" ).html(),                                           
                    nb_provincia: $( "#id_provincia option:selected" ).html(),  
                    nb_distrito: $( "#id_distrito option:selected" ).html(),  
                                        
                },                  
                success: function (result) {                    
                    
                     var centro_poblado = $.parseJSON(result);
                     $( "#id_centro_poblado").append("<option value=''> Seleccione </option>");
                   
                     $.each(centro_poblado, function(key,value) {

                      $( "#id_centro_poblado").append("<option value='"+value.codcp+"' >"+value.nomcp+"</option>");

                     }); 

                }
            });

      });
      
      $('#btnIrProy').click(function(e){
          
          var base_url = '<?php echo site_url() ?>';
          location.href= base_url+"/proyecto/list";
          
      });
      
      
      
      $( "#nu_monto_financiado " ).change(function() {
          
          var nu_monto_financiado = parseFloat($( "#nu_monto_financiado" ).val());
          var nu_monto_contrapartida = parseFloat($( "#nu_monto_contrapartida" ).val());
          var nu_presupuesto_total = nu_monto_financiado + nu_monto_contrapartida ;
          
          $( "#nu_presupuesto_total" ).val(nu_presupuesto_total);
        });
        
           $( "#nu_monto_contrapartida " ).change(function() {
          
          var nu_monto_financiado = parseFloat($( "#nu_monto_financiado" ).val());
          var nu_monto_contrapartida = parseFloat($( "#nu_monto_contrapartida" ).val());
          var nu_presupuesto_total = nu_monto_financiado + nu_monto_contrapartida ;
          
          $( "#nu_presupuesto_total" ).val(nu_presupuesto_total);
        });
      
      

       
             //$('#formProyecto').submit(function(e){
        $('#btnGuardarResul').click(function(e){
                
                var base_url = '<?php echo site_url() ?>';

                  var dataR = [];
                  // var dataAct = [];
                  
                    
                  $( ".txtResultado" ).each(function( index ) {
                      //data = {index : $( this ).val() }
                      console.log("txtResultado "+  index + ": " + $( this ).val());
                     
                      dataR.push(  $( this ).val());
                   });
                  
                  
                   
                  var data_resultado                   = JSON.stringify( dataR );
                  //return true;
                   

                $.ajax({
                url: base_url+'/proyecto/guardar_resultado',                               
                data: {
                    
                    //IDENTIFICACION
                    id_proyecto: $("#val_id_proyecto").val(),
                    //RESULTADOS
                    array_resultados:data_resultado
                },                  
                success: function (result) {
                    
                    //alert(result);
                    var valor = $.parseJSON(result);

                    
                    if(valor == false){
                        

                    }else{     

                     $('#btnGuardarResul').prop('disabled', true);
                        $('#btnGuardarResul').addClass('disabled');
                        $('#btnGuardarResul').html('Guardado');
                        $('#li_tab_4').removeClass( "active" );
                        $('#li_tab_5').addClass('active');
                        $('#tab_4').removeClass( "active" );
                        $('#tab_5').addClass('active');
                     $("#modal-guardar-resultados").modal('toggle'); 
                     
                     
                  
                    }
                    
                }
            }); 

          return false;
        
     
       });
       
        
       
       
        $('#formProyecto').submit(function(e){
       // $('#btnGuardar').click(function(e){
                
                var base_url = '<?php echo site_url() ?>';

                  //var dataR = [];
                  // var dataAct = [];
                  var dataCP = [];
                    
                    
                   $( ".txtCentroPoblado" ).each(function( index ) {
                      //data = {index : $( this ).val() }
                      //console.log("txtCentroPoblado "+ index + ": " + $( this ).attr("id") );
                      dataCP.push(  $( this ).attr("id") );
                   }); 
                   
               
                /* // console.log("DATA:"+ );
                  $.each(array_resultado_actividad, function( index, value ) {
                       console.log( index + ": " + value );
                    });*/
                   
                 // return true;
                   
                  
                   var data_centro_poblado              = JSON.stringify( dataCP );
                  
               
               
               
                $.ajax({
                url: base_url+'/proyecto/guardar',                               
                data: {
                    
                    //IDENTIFICACION
                    tx_nombre: $('#tx_nombre').val(),
                    tx_siglas: $('#tx_siglas').val(),  
                    tx_intervencion: $('#tx_intervencion option:selected').val(),
                    tx_rubro: $('#tx_rubro option:selected').val(),
                    tx_tipo_intervencion: $('#tx_tipo_intervencion option:selected').val(),
                    tx_situacion_intervencion: $('#tx_situacion_intervencion option:selected').val(),
                    fe_inicio: $('#fe_inicio').val(), 
                    fe_fin: $('#fe_fin').val(),
                    tx_co_snip: $('#tx_co_snip').val(),
                    nu_beneficiarios: $('#nu_beneficiarios').val(),
                    id_pais: $('#id_pais option:selected').val(),
                    id_region: $('#id_region option:selected').val(),
                    id_provincia: $('#id_provincia option:selected').val(),
                    id_distrito: $('#id_distrito option:selected').val(),
                    id_proyecto: $("#val_id_proyecto").val(),
                    tx_otro_centro_poblado: $("#tx_otro_centro_poblado").val(), 
                    //COSTOS
                    tx_tipo_moneda: $('#tx_tipo_moneda option:selected').val(),
                    nu_presupuesto_total: $('#nu_presupuesto_total').val(),  
                    nu_monto_financiado: $('#nu_monto_financiado').val(),  
                    nu_monto_contrapartida: $('#nu_monto_contrapartida').val(),  
                    //RESULTADOS
                    //array_resultados:data_array_resultado_actividad,
                    //CENTRO POBLADO
                    array_centro_poblado: data_centro_poblado,
                    
                    //EJECUTORA
                    tx_nombre_ejec: $('#tx_nombre_ejec').val(),
                    tx_ruc_ejec: $('#tx_ruc_ejec').val(),  
                    tx_direccion_ejec: $('#tx_direccion_ejec').val(),
                    id_pais_ejec: $('#id_pais_ejec option:selected').val(),
                    id_region_ejec: $('#id_region_ejec option:selected').val(),
                    id_provincia_ejec: $('#id_provincia_ejec option:selected').val(),
                    id_distrito_ejec: $('#id_distrito_ejec option:selected').val(),
                    tx_telefono_ejec: $('#tx_telefono_ejec').val(), 
                    tx_pagina_web_ejec: $('#tx_pagina_web_ejec').val(),
                    tx_correo_electronico_ejec: $('#tx_correo_electronico_ejec').val(),
                    //FINANCIERA
                    tx_nombre_finan: $('#tx_nombre_finan').val(),
                    tx_ruc_finan: $('#tx_ruc_finan').val(),  
                    tx_direccion_finan: $('#tx_direccion_finan').val(),
                    id_pais_finan: $('#id_pais_finan option:selected').val(),
                    id_region_finan: $('#id_region_finan option:selected').val(),
                    id_provincia_finan: $('#id_provincia_finan option:selected').val(),
                    id_distrito_finan: $('#id_distrito_finan option:selected').val(),
                    tx_telefono_finan: $('#tx_telefono_finan').val(), 
                    tx_pagina_web_finan: $('#tx_pagina_web_finan').val(),
                    tx_correo_electronico_finan: $('#tx_correo_electronico_finan').val(),
                    //RESIDENTE
                    tx_nom_ape_residente: $('#tx_nom_ape_residente').val(),
                    tx_dni_residente: $('#tx_dni_residente').val(),
                    tx_email_residente: $('#tx_email_residente').val(),
                    tx_telefono_residente: $('#tx_telefono_residente').val(),
                    tx_profesion_residente: $('#tx_profesion_residente').val(),
                    //Evaluación Ex Post y/o Monitoreo
                    tx_gestiones: $('#tx_gestiones').val(),
                    tx_evaluacion: $('#tx_evaluacion option:selected').val(),
                    
                },                  
                success: function (result) {
                    
                    //alert(result);
                    var valor = $.parseJSON(result);

                    
                    if(valor == false){
                        

                    }else{     

                     $("#modal-guardar").modal('toggle'); 
                     $("#val_id_proyecto").val(valor);
                     $("#val_id_proyecto_gal").val(valor);
                     
                     //Activar/Desactivar tab y botton
                    //$('#btnGuardar').prop('disabled', true);
                    //$('#btnGuardar').addClass('disabled');
                    //$('#btnGuardar').html('Guardado');
                    $('#li_tab_3').removeClass( "active" );
                    $('#li_tab_4').addClass('active');
                    $('#tab_3').removeClass( "active" );
                    $('#tab_4').addClass('active');
                    
                    $('#btnGuardarResul').prop('disabled', false);
                    $('#btnGuardarResul').removeClass('disabled');

                    $('#addImg').prop('disabled', false);
                    $('#addImg').removeClass('disabled'); 

                    $('#addShp').prop('disabled', false);
                    $('#addShp').removeClass('disabled'); 

                    
                    
                     
                  
            
                    }
                    
                   


                }
            }); 

          return false;
        
     
       });
    
    
})   

 </script> 
  