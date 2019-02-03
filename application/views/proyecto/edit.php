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



<!-- Modal NUEVA IMAGEN -->
 <div class="modal fade" id="modal-nueva-imagen" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva imagen</h4>
        </div>
        <div class="modal-body">        
                                 
	
        <form method="post" id="upload_form" name="upload_form" enctype="multipart/form-data">

        <div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo">Titulo de la imagen</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre de la imagen">
				</div>
                          <input type="hidden" id="val_id_proyecto_gal" name="val_id_proyecto_gal" value="<?php echo $proyectos[0]['id_proyecto'] ?>">
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
                          <input type="hidden" id="val_id_proyecto_gal" name="val_id_proyecto_gal" value="<?php echo $proyectos[0]['id_proyecto'] ?>">
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
  
  
  
  
  
  

<!-- Modal -->
  <div class="modal fade" id="modal-guardar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Proyecto guardado</h4>
        </div>
        <div class="modal-body">   

              <p>Proyecto guardado satisfactoriamente</p>

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

              <p>Actividad guardada satisfactoriamente</p>

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
        <small>Editar</small>
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
                      
                      <input  id="val_id_proyecto"    name="val_id_proyecto"     type="hidden"      value="<?php echo $proyectos[0]['id_proyecto'] ?>">
                   <input id="id_proyecto"        name="id_proyecto"       type="hidden"     value="<?php echo $proyectos[0]['id_proyecto'] ?>">
                   <input id="id_entidad_ejecutora"    name="id_entidad_ejecutora"  type="hidden"     value="<?php echo $proyectos[0]['id_entidad_ejecutora'] ?>">
                    <input id="id_entidad_financiera"   namr="id_entidad_financiera" type="hidden"     value="<?php echo $proyectos[0]['id_entidad_financiera'] ?>">
                    
                    
                          <label>Razón Social</label>
                          <input id="tx_nombre_ejec" type="text" class="form-control" placeholder="Ingrese ..." required value="<?php echo $proyectos[0]['tx_razon_social_ejec'] ?>" >
                        </div>
                        
                        
                        <div class="form-group required">
                          <label>RUC</label>
                          <input id="tx_ruc_ejec" type="text" class="form-control" placeholder="Ingrese ..."  required value="<?php echo $proyectos[0]['tx_ruc_ejec'] ?>" >
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
                 
                          <?php for ($i = 0; $i < count($regiones); $i++) { 
                              
                              $selected = '';
                              if($regiones[$i]['id'] == $proyectos[0]['id_region_ejec'] ) $selected = 'selected';
        
                            echo "<option $selected value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
        
                          } ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                        <div class="form-group required">
                        <label>Provincia</label>
                            <select id="id_provincia_ejec" class="form-control select2" style="width: 100%;"  required >
                  
                          <?php for ($i = 0; $i < count($provincias); $i++) { 
                              
                              $selected = '';
                              if($provincias[$i]['id'] == $proyectos[0]['id_provincia_ejec'] ) $selected = 'selected';
        
                            echo "<option $selected value='".$provincias[$i]['id']."'> ".$provincias[$i]['name']."</option>";
        
                          } ?>
                         
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                       <div class="form-group required">
                        <label>Distrito</label>
                        <select id="id_distrito_ejec" class="form-control select2" style="width: 100%;"  required >
                           <?php for ($i = 0; $i < count($distritos); $i++) { 
                      
                              $selected = '';
                              if($distritos[$i]['id'] == $proyectos[0]['id_distrito_ejec'] ) $selected = 'selected';
        
                            echo "<option $selected value='".$distritos[$i]['id']."'> ".$distritos[$i]['name']."</option>";
        
                          } ?>
                        
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                   
                     <div class="form-group required">
                          <label>Dirección</label>
                          <input id="tx_direccion_ejec" class="form-control" placeholder="Ingrese ..."  required  value="<?php echo trim($proyectos[0]['tx_direccion_ejec']) ?>" >  
                        </div>
                        
                     <div class="form-group required ">
                          <label>Teléfono movil</label>
                          <input id="tx_telefono_ejec" type="tel" class="form-control" placeholder="Ingrese ..."  required  value="<?php echo $proyectos[0]['tx_telefono_ejec'] ?>" >
                        </div>  
                    
                     <div class="form-group ">
                          <label>Página web</label>
                           <input id="tx_pagina_web_ejec" type="text" class="form-control" placeholder="Ingrese ..." value="<?php echo $proyectos[0]['tx_pagina_web_ejec'] ?>" >
                        </div>
                    
                    
                     <div class="form-group ">
                          <label>Correo electrónico</label>
                           <input id="tx_correo_electronico_ejec" type="email" class="form-control" placeholder="Ingrese ..." value="<?php echo $proyectos[0]['tx_correo_electronico_ejec'] ?>" >
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
                          
                          <div class="form-group ">
                              <label>Razón Social</label>
                              <input id="tx_nombre_finan" type="text" class="form-control" placeholder="Ingrese ..."   value="<?php echo $proyectos[0]['tx_razon_social_finan'] ?>" >
                            </div>
                            
                            
                            <div class="form-group ">
                              <label>RUC</label>
                              <input id="tx_ruc_finan" type="text" class="form-control" placeholder="Ingrese ..."   value="<?php echo $proyectos[0]['tx_ruc_finan'] ?>" >
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
                               <?php for ($i = 0; $i < count($regiones); $i++) { 
                      
                                      $selected = '';
                                      if($regiones[$i]['id'] == $proyectos[0]['id_region_finan'] ) $selected = 'selected';
                
                                    echo "<option $selected value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
                
                                  } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                            <div class="form-group ">
                            <label>Provincia</label>
                            <select id="id_provincia_finan" class="form-control select2" style="width: 100%;"   >
                              <?php for ($i = 0; $i < count($provincias); $i++) { 
                      
                                      $selected = '';
                                      if($provincias[$i]['id'] == $proyectos[0]['id_provincia_finan'] ) $selected = 'selected';
                
                                    echo "<option $selected value='".$provincias[$i]['id']."'> ".$provincias[$i]['name']."</option>";
                
                                  } ?>
                             
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group ">
                            <label>Distrito</label>
                            <select id="id_distrito_finan" class="form-control select2" style="width: 100%;"   >
                               <?php for ($i = 0; $i < count($distritos); $i++) { 
                      
                              $selected = '';
                              if($distritos[$i]['id'] == $proyectos[0]['id_distrito_finan'] ) $selected = 'selected';
        
                            echo "<option $selected value='".$distritos[$i]['id']."'> ".$distritos[$i]['name']."</option>";
        
                          } ?>
                            
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                       
                         <div class="form-group ">
                              <label>Dirección</label>
                              <input id="tx_direccion_finan" class="form-control"  placeholder="Ingrese ..." value="<?php echo trim($proyectos[0]['tx_direccion_finan']) ?>"  >   
                            </div>
                            
                         <div class="form-group  ">
                              <label>Teléfono movil</label>
                              <input id="tx_telefono_finan" type="tel" class="form-control" placeholder="Ingrese ..."   value="<?php echo $proyectos[0]['tx_telefono_finan'] ?>" >
                            </div>  
                        
                         <div class="form-group ">
                              <label>Página web</label>
                               <input id="tx_pagina_web_finan" type="text" class="form-control" placeholder="Ingrese ..." value="<?php echo $proyectos[0]['tx_pagina_web_finan'] ?>" >
                            </div>
                        
                        
                         <div class="form-group ">
                              <label>Correo electrónico</label>
                               <input id="tx_correo_electronico_finan" type="email" class="form-control" placeholder="Ingrese ... " value="<?php echo $proyectos[0]['tx_correo_electronico_finan'] ?>">
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
                              <input id="tx_nom_ape_residente" type="text" class="form-control" placeholder="Ingrese ..." required value="<?php echo $proyectos[0]['tx_nom_ape_residente'] ?>" >
                            </div>
                            
                              
                         <div class="form-group ">
                              <label>Correo electrónico</label>
                               <input id="tx_email_residente" type="email" class="form-control" placeholder="Ingrese ..." value="<?php echo $proyectos[0]['tx_email_residente'] ?>">
                            </div>
                          
                           <div class="form-group required ">
                              <label>Profesión</label>
                              <input id="tx_profesion_residente" type="tel" class="form-control" placeholder="Ingrese ..."  required value="<?php echo $proyectos[0]['tx_profesion_residente'] ?>" >
                            </div>  
                   
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                       
                         <div class="form-group required">
                              <label>Número DNI</label>
                              <input id="tx_dni_residente" type="tel" class="form-control" placeholder="Ingrese ..."  required value="<?php echo $proyectos[0]['tx_dni_residente'] ?>" >
                            </div>
                            
                         <div class="form-group required ">
                              <label>Teléfono movil</label>
                              <input id="tx_telefono_residente" type="tel" class="form-control" placeholder="Ingrese ..."  required value="<?php echo $proyectos[0]['tx_telefono_residente'] ?>" >
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
                              <label>Nombre completo de la intervención </label>
                              <input id="tx_nombre" type="text" class="form-control" placeholder="Ingrese máximo 150 caracteres" required value="<?php echo $proyectos[0]['tx_nombre'] ?>" > 
                            </div>
                            
                    
                    <?php   $tx_intervencion = array('Distrital',  'Provincial', 'Regional', 'Nacional', 'Cooperación' ); ?> 
                     <div class="form-group required">
                            <label>Intervención</label>
                            <select id="tx_intervencion" class="form-control select2" style="width: 100%;" required>
                             <?php for ($i = 0; $i < count($tx_intervencion); $i++) { 

                                $selected = '';
                                if($tx_intervencion[$i] == $proyectos[0]['tx_intervencion'] ) $selected = 'selected';
                                echo "<option $selected  value='".$tx_intervencion[$i]."'> ".$tx_intervencion[$i]."</option>";
            
                              } ?>
                              
                            </select>
                          </div>
                          <!-- /.form-group -->
                           
                            <?php   $tx_tipo_intervencion = array('Programa', 'Proyecto', 'Actividad' ); ?> 
                
                            
                        <div class="form-group required">
                            <label>Tipo de Intervención</label>
                            <select id="tx_tipo_intervencion" class="form-control select2" style="width: 100%;" required>
                             <?php for ($i = 0; $i < count($tx_tipo_intervencion); $i++) { 

                                $selected = '';
                                if($tx_tipo_intervencion[$i] == $proyectos[0]['tx_tipo_intervencion'] ) $selected = 'selected';
                                echo "<option $selected value='".$tx_tipo_intervencion[$i]."'> ".$tx_tipo_intervencion[$i]."</option>";
            
                              } ?>
                              
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <?php $fe_inicio = DateTime::createFromFormat("Y-m-d", $proyectos[0]['fe_inicio'])->format('d/m/Y');  ?>
                          <div class="form-group">
                            <label>Fecha Inicio:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_inicio" class="form-control pull-right" id="fe_inicio" type="text" required required value="<?php echo $fe_inicio  ?>">
                            </div>
                            <!-- /.input group -->
                          </div>
                          
                          <div class="form-group ">
                              <label>Código Invierte.Pe (si corresponde)</label>
                              <input id="tx_co_snip" type="text" class="form-control" placeholder="Ingrese ... " value="<?php echo $proyectos[0]['tx_co_snip'] ?>" >
                            </div>
                            
                          
                          
                          
                            
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            
                         <div class="form-group required">
                              <label>Siglas del proyecto / actividad</label>
                              <input id="tx_siglas" type="text" class="form-control" placeholder="Ingrese ..." required  value="<?php echo $proyectos[0]['tx_siglas'] ?>">
                            </div>
                            
                             <?php   $tx_rubro = array('Transporte y comunicación',  'Salud', 'Vivienda y saneamiento','Educación','Interior','Defensa' ); ?> 
                             
                           <div class="form-group required">
                            <label>Sector</label>
                            <select id="tx_rubro" class="form-control select2" style="width: 100%;" required>
                             <?php for ($i = 0; $i < count($tx_rubro); $i++) { 
            
                                $selected = '';
                                if($tx_rubro[$i] == $proyectos[0]['tx_rubro'] ) $selected = 'selected';
                                echo "<option $selected  value='".$tx_rubro[$i]."'> ".$tx_rubro[$i]."</option>";
            
                              } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                            
                         <?php   $tx_situacion_intervencion = array('En ejecución', 'Paralizado','Judicializado',  'Ejecutado'); ?>     
                        <div class="form-group required">
                            <label>Situación de Intervención</label>
                            <select id="tx_situacion_intervencion" class="form-control select2" style="width: 100%;" required>
                                <?php for ($i = 0; $i < count($tx_situacion_intervencion); $i++) { 

                                $selected = '';
                                if($tx_situacion_intervencion[$i] == $proyectos[0]['tx_situacion_intervencion'] ) $selected = 'selected';
                                echo "<option $selected  value='".$tx_situacion_intervencion[$i]."'> ".$tx_situacion_intervencion[$i]."</option>";
            
                              } ?>
                            </select>
                          </div>
                          
                          
                           <?php $fe_fin = DateTime::createFromFormat("Y-m-d", $proyectos[0]['fe_fin'])->format('d/m/Y');  ?>
                         <div class="form-group">
                            <label>Fecha Fin:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_fin" class="form-control pull-right" id="fe_fin" type="text" required value="<?php echo $fe_fin ?>">
                            </div>
                            <!-- /.input group -->
                          </div> 
                          
                           <div class="form-group ">
                              <label>Número de beneficiarios</label>
                              <input id="nu_beneficiarios" type="number" class="form-control" placeholder="Ingrese ..." value="<?php echo $proyectos[0]['nu_beneficiarios'] ?>">
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
                              <?php for ($i = 0; $i < count($regiones); $i++) { 
                      
                                  $selected = '';
                                  if($regiones[$i]['id'] == $proyectos[0]['id_region'] ) $selected = 'selected';
            
                                echo "<option $selected value='".$regiones[$i]['id']."'> ".$regiones[$i]['name']."</option>";
            
                              } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group required">
                            <label>Provincia</label>
                            <select id="id_provincia" class="form-control select2" style="width: 100%;"  required >
                              <?php for ($i = 0; $i < count($provincias); $i++) { 
                      
                                  $selected = '';
                                  if($provincias[$i]['id'] == $proyectos[0]['id_provincia'] ) $selected = 'selected';
            
                                echo "<option $selected value='".$provincias[$i]['id']."'> ".$provincias[$i]['name']."</option>";
            
                              } ?>
                             
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
            
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            
                        
                          
                      
                          <div class="form-group required">
                            <label>Distrito</label>
                            <select id="id_distrito" class="form-control select2" style="width: 100%;"  required >
                               <?php for ($i = 0; $i < count($distritos); $i++) { 
                      
                                  $selected = '';
                                  if($distritos[$i]['id'] == $proyectos[0]['id_distrito'] ) $selected = 'selected';
            
                                echo "<option $selected value='".$distritos[$i]['id']."'> ".$distritos[$i]['name']."</option>";
            
                              } ?>
                            
                            </select>
                          </div>
                          <!-- /.form-group -->
                          
                           <div class="form-group required">
                            <label>Centros poblados</label>
                          </div>
                          <!-- /.form-group -->
                          
                             <div class="input-group input-group-sm">
                            <select id="id_centro_poblado" class="form-control select2" style="width: 100%;">
                               <?php for ($i = 0; $i < count($centros_poblados); $i++) { 
                      
                                  //$selected = '';
                                  //if($centros_poblados[$i]['codcp'] == $proyectos[0]['id_centro_poblado'] ) $selected = 'selected';
            
                                echo "<option value='".$centros_poblados[$i]['codcp']."'> ".$centros_poblados[$i]['nomcp']."</option>";
            
                              } ?>
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
                                         <?php for($i=0;$i<count($centros_poblados_proyecto);$i++){?>
                                           <tr> 
                                            <td><input type='text' class='form-control txtCentroPoblado' id="<?php echo $centros_poblados_proyecto[$i]['codcp'] ?>" value="<?php echo $centros_poblados_proyecto[$i]['nomcp'] ?>" disabled> </td>
                                            <td>   <button   type="button" class="ibtnDelCP btn btn-danger pull-right"><i class="fa fa-close"></i>   </button>   </td>
                        
                                           </tr>
                                         
                                         <?php } ?>
                                    </tbody>
                                </table>
                                
                                 <div class="form-group ">
                              <label>Otro centro poblado</label>
                              <input id="tx_otro_centro_poblado" type="text" value="<?php echo $proyectos[0]['tx_otro_centro_poblado'] ?>" class="form-control" placeholder="Ingrese un centro poblado que no esté en la lista">
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
              
              <?php   $tx_tipo_moneda = array('sol' => 'Soles',  'euro' => 'Euros', 'usd' => 'Dolares americanos'); ?> 
                     <div class="form-group required">
                <label>Tipo de moneda</label>
                <select id="tx_tipo_moneda" class="form-control select2" style="width: 100%;" required>
                    <?php foreach ($tx_tipo_moneda as $clave => $valor ) { 

                    $selected = '';
                    if($clave == $proyectos[0]['tx_tipo_moneda'] ) $selected = 'selected';
                    echo "<option $selected  value='".$clave."'> ".$valor ."</option>";

                  } ?>
                </select>
              </div>
              <!-- /.form-group -->
              
              
                 <div class="form-group required">
                  <label>Presupuesto total</label>
                  <input id="nu_presupuesto_total" type="number" class="form-control" placeholder="Ingrese ..." required value="<?php echo $proyectos[0]['nu_presupuesto_total'] ?>">
                </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                
             <div class="form-group ">
                  <label>Monto financiado</label>
                  <input id="nu_monto_financiado"  type="number" class="form-control" placeholder="Ingrese ... "  value="<?php echo $proyectos[0]['nu_monto_financiado'] ?>">
                </div>
                
             <div class="form-group ">
                  <label>Monto de contrapartida (monetaria/valorizado)</label>
                  <input id="nu_monto_contrapartida" type="number" class="form-control" placeholder="Ingrese ..."  value="<?php echo $proyectos[0]['nu_monto_contrapartida'] ?>">
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
              
            <?php   $tx_evaluacion = array('si' => 'Si',  'no' => 'No'); ?> 
             <div class="form-group required">
                <label>Evaluación</label>
                 <select id="tx_evaluacion" class="form-control select2" style="width: 100%;" required>
                <?php foreach ($tx_evaluacion as $clave => $valor ) { 

                    $selected = '';
                    if($clave == $proyectos[0]['tx_evaluacion'] ) $selected = 'selected';
                    echo "<option $selected  value='".$clave."'> ".$valor ."</option>";

                  } ?>
                </select>
              </div>
              <!-- /.form-group -->
              
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                
       <div class="form-group ">
                  <label>Gestiones propias realizadas por los beneficiarios y/o asociación</label>
                 <textarea id="tx_gestiones" class="form-control" rows="5" placeholder="Ingrese ..."  >  <?php echo trim($proyectos[0]["tx_gestiones"])?> </textarea>
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
                     <?php 
                     
                     for($i=0;$i<count($resultados_proyecto);$i++){
               ?>
                <tr> 
                <td class="col-sm-10">
                   <div class="form-group ">
                      <textarea id="tx_resultado_<?php echo $i?>" class="form-control txtResultado" rows="3" placeholder="Ingrese ..."  required > <?php echo $resultados_proyecto[$i]["tx_resultado"]?></textarea>
                    </div>
                </td>
                 <td>   <button   type="button" class="ibtnDelRes btn btn-danger pull-right"><i class="fa fa-close"></i>   </button>   </td>
            </tr>
            <?php } ?>
                </tbody>
            </table>
                        
            </div>
            <!-- /.col -->
       
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
                   <button type="button" id="btnGuardarResul" class="btn btn-success pull-right" >
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
                <?php for($i=0;$i<count($actividades_proyecto);$i++){?>
                <tr>
        
                    <td class="col-xs-3"> <input value="<?php echo $actividades_proyecto[$i]['id_actividad'] ?>" type="hidden" id="id_actividad_<?php echo $i ?>"> <div class="form-group">
                <label>Componentes</label>
                    <select id="tx_evaluaciones_<?php echo $i ?>" class="form-control select2" style="width: 100%;">
                       <?php
                       
                       for($y=0;$y<count($resultados_proyecto);$y++){
                         
                         $selected = '';
                         
                         if($resultados_proyecto[$y]['id'] == $actividades_proyecto[$i]['id_resultado'] ) {  $selected = 'selected'; }
                     
                         echo  "<option $selected value='".$resultados_proyecto[$y]['id']."' >".$resultados_proyecto[$y]['tx_resultado']."</option>";
                         
                       }
               ?>
                    </select>
                </div>
                </td>
                    <td  class="col-xs-7"> <textarea  id="tx_actividades_<?php echo $i ?>" class="form-control txtActividad" rows="3" placeholder="Ingrese ..."  required > <?php echo $actividades_proyecto[$i]['tx_actividad'] ?> </textarea> </td>

                    <td  class="col-xs-2">   <button   type="button" class="ibtnDelAct btn btn-danger pull-right"><i class="fa fa-close"></i> Eliminar  </button>
                         <button data-toggle="modal" id="btnAct_<?php echo $i ?>" data-target="#modal-guardar-actividades" data-id-objeto="<?php echo $i ?>"  type="button" class="btn btn-success pull-right"><i class="fa fa-check"></i> Guardar  </button>   
                         </td>
                </tr>
          
            <?php } ?>
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
          <!-- /.tab-pane 5 -->
          
                  <div class="tab-pane" id="tab_6">
                   
          
         <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Galería de fotos.</h3>
             <button type="button" id="addImg" name="addImg" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Nuevo</button>
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
         <!-- /.tab-pane 6 -->
         
         
           <div class="tab-pane" id="tab_7">
                   
          
         <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Shapefile</h3>
             <button type="button" id="addShp" name="addShp" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Nuevo</button>
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

<button type='button' data-shp-id="<?php echo $shp->id; ?>" data-toggle='modal' data-target='#modal-ver-shp'  class='btn btn-primary'>
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
         <!-- /.tab-pane 7 -->
              
              
              
              
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
            <!-- <button type="submit" id="btnGuardarEjecutora" class="btn btn-primary pull-right" >
            <i class="fa fa-download"></i> Guardar </button> -->
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
   
   
   
//IMAGENES

   $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
            
                $.ajax({  
                     url:"<?php echo site_url(); ?>/proyecto/ajax_upload",                    
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

//SHAPEFILE

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
    
    
    
   // -------------------------------------
   
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
        <button data-toggle="modal" id="btnAct_' + counterAct + '" data-target="#modal-guardar-actividades" data-id-objeto="' + counterAct + '"  type="button" class="btn btn-success pull-right"><i class="fa fa-check"></i>  Guardar </button>   </td>';
        newRow.append(cols);
        $("#myTableAct").append(newRow);
       
        
        
        var base_url = '<?php echo site_url() ?>';
           $("#tx_evaluaciones_"+counterAct+"").empty();
        
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
        
        
    });
    
    $('#modal-guardar-actividades').on('show.bs.modal', function(e) {
        
        var id_objeto = $(e.relatedTarget).data('id-objeto');
       /* var id_proyecto: $("#val_id_proyecto").val();
        var tx_evaluaciones = $( "#tx_evaluaciones_"+id_objeto+" option:selected" ).val(), 
        var tx_actividades = $("#tx_actividades_"+id_objeto).val();*/
       
        var base_url = '<?php echo site_url() ?>';

          $.ajax({
                url: base_url+'/proyecto/guardar_actividad',                               
                data: {
                     id_proyecto: $("#val_id_proyecto").val(),
                     id_actividad:  $("#id_actividad_"+id_objeto).val(),
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
      
      $('#btnCerrarGuardar').click(function(e){
          
          //location.href= "http://geo.cienciaconciencia.org.ve/coffee/index.php/proyecto/list";
          
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
                     $("#modal-guardar").modal('toggle'); 
                     
                     
                  
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
                url: base_url+'/proyecto/edit_id',                               
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
                    //CENTRO POBLADO
                    array_centro_poblado: data_centro_poblado,
                    
                    //EJECUTORA
                    id_entidad_ejecutora: $('#id_entidad_ejecutora').val(),
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
                    id_entidad_financiera: $('#id_entidad_financiera').val(),
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
                   
                     
                     //Activar/Desactivar tab y botton
                    //$('#btnGuardar').prop('disabled', true);
                    //$('#btnGuardar').addClass('disabled');
                    //$('#btnGuardar').html('Guardado');
                    $('#li_tab_3').removeClass( "active" );
                    $('#li_tab_4').addClass('active');
                    $('#tab_3').removeClass( "active" );
                    $('#tab_4').addClass('active');
                     
                  
            
                    }
                    
                   


                }
            }); 

          return false;
        
     
       });
    
    
})   

 </script> 
  