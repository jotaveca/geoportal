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
  <div class="modal fade" id="modal-eliminar-img" role="dialog">
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
  
  
<!-- Modal ELIMINAR PDF -->
  <div class="modal fade" id="modal-eliminar-pdf" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar PDF</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_pdf_eliminar" type="hidden"> 
              <p>¿Está seguro que desea eliminar el PDF seleccionado?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnEliminarPdf" class="btn btn-primary">Eliminar</button> 
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
                                 
	
        <form method="post" id="upload_form_img" name="upload_form_img" enctype="multipart/form-data">

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
  
  



 <div class="modal fade" id="modal-nuevo-pdf" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo documento</h4>
        </div>
        <div class="modal-body">          
                           
       
	<?php //echo form_open_multipart('proyecto/do_upload');?>

        <form method="post" id="upload_form_pdf" name="upload_form_pdf" enctype="multipart/form-data">

        <div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo">Titulo del PDF</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre del documento">
				</div>
                          <input type="hidden" id="val_id_proyecto_adj" name="val_id_proyecto_adj" value="0">
			</div>

		</div>

		<div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="imagen">PDF</label>
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
<div class="modal fade" id="modal-nuevo-proyecto-asociacion">  
  <div class="modal-dialog modal-default ">      
      <div class="modal-content">  
        <div class="modal-body">                        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Registrar Proyecto</h4>
          </div>

          <form id="formNuevo"> 
            <div class="form-group required">
              <label>Nombre del proyecto</label>
              <input id="tx_nombre_proyecto" type="text" class="form-control" placeholder="Ingrese ..." required >
            </div>                          
            <div class="form-group required">
              <label>Entidad Ejecutora</label>
              <input id="tx_entidad_ejecutora" type="text" class="form-control" placeholder="Ingrese ..." required >
            </div>
            <div class="form-group required">
              <label>Presupuesto</label>
              <input id="nu_presupuesto" type="text" class="form-control" placeholder="Ingrese ..." required pattern="[0-9]*" >
            </div>
              <div class="form-group required">
                <label>Fecha Inicio</label>
                <input id="fe_inicio" type="text" class="form-control" placeholder="Ingrese ..." required >
            </div>
              <div class="form-group required">
                <label>Fecha Fin</label>
                <input id="fe_fin" type="text" class="form-control" placeholder="Ingrese ..." required >
            </div>
            <div class="form-group required">
                <label>Actividades</label>
              <textarea class="form-control" id="tx_actividades" placeholder="Ingrese ..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnGuardar_proyecto_asociacion" class="btn btn-primary">Guardar</button>
            </div>
          </form>                                            
        </div>
      </div>         
  </div>
</div> 


<!-- Modal -->
<div class="modal fade" id="modal-modificar-proyecto-asociacion">  
  <div class="modal-dialog modal-default ">      
      <div class="modal-content">  
        <div class="modal-body">                        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Modificar Proyecto</h4>
          </div>

          <form id="formModificar">                       
          <input type="hidden" id="id_modificar_proyecto" value="0">                
            <div class="form-group required">
              <label>Nombre del proyecto</label>
              <input id="tx_nombre_proyecto_m" type="text" class="form-control" required >
            </div>                          
            <div class="form-group required">
              <label>Entidad Ejecutora</label>
              <input id="tx_entidad_ejecutora_m" type="text" class="form-control" required >
            </div>
            <div class="form-group required">
              <label>Presupuesto</label>
              <input id="nu_presupuesto_m" type="text" class="form-control" required pattern="[0-9]*" >
            </div>
              <div class="form-group required">
                <label>Fecha Inicio</label>
                <input id="fe_inicio_m" type="text" class="form-control" required >
            </div>
              <div class="form-group required">
                <label>Fecha Fin</label>
                <input id="fe_fin_m" type="text" class="form-control" required >
            </div>
           <div class="form-group required">
                <label>Actividades</label>
              <textarea class="form-control" id="tx_actividades_m" placeholder="Ingrese ..."></textarea>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnModificar_proyecto_asociacion" class="btn btn-primary">Modificar</button>
            </div>
          </form>                                            
        </div>
      </div>         
  </div>
</div> 


  

<!-- Modal ELIMINAR -->
  <div class="modal fade" id="modal-eliminar-proyecto-asociacion" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar proyecto</h4>
        </div>
        <div class="modal-body">          
              <input id="id_proyecto_eliminar" type="hidden"> 
              <p>¿Está seguro que desea eliminar el proyecto <span id="tx_proyecto_eliminar"></span>?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnEliminarProyecto" class="btn btn-primary">Eliminar</button> 
        </div>
      </div>
    </div>
  </div>



<!-- formulario modal de informacion -->
            <!-- Modal -->
              <div class="modal fade" id="modal-informacion" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 id = "titulo" class="modal-title">Información</h4>
                    </div>
                    <div class="modal-body">
                          <p id ="informacion">Welcome</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>                     
                    </div>
                  </div>
                </div>
              </div>



  

<!-- Content Wrapper. Contenido de la página -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Asociación / Cooperativa <small>Registro</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li class="active">Asociación / Cooperativa</li>
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
               <li id="li_tab_3" class="active">  <a href="#tab_3" data-toggle="tab">General</a></li>
               <li id="li_tab_4" >                <a href="#tab_4" data-toggle="tab">Estructura Orgánica</a></li>
               <li id="li_tab_5" >                <a href="#tab_5" data-toggle="tab">Producción Actual</a></li>
               <li id="li_tab_6" >                <a href="#tab_6" data-toggle="tab">Servicios</a></li>
               <li id="li_tab_7" >                <a href="#tab_7" data-toggle="tab">Proyectos</a></li>               
               <li id="li_tab_8" >                <a href="#tab_8" data-toggle="tab">Documentos</a></li>               
               <li id="li_tab_9" >                <a href="#tab_9" data-toggle="tab">Imágenes</a></li>               
                                        
            </ul>
            <div class="tab-content ">     
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3">
                  
                  <input type="hidden" id="id" value="1">
                  
                   <!-- Default box -->
               <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Presentación de la Asociación / Cooperativa</h3>
                </div>
               
                <!-- /.box-header -->
                <div class="box-body">              
                      
                    <form id="formGeneral" >                               
                      
                      <div class="form-group required">
                          <label>Misión</label>
                         <textarea class="form-control" id="tx_mision" placeholder="Ingrese ..."></textarea>
                        </div>
                        
                        
                        <div class="form-group required">
                          <label>Visión</label>
                           <textarea class="form-control" id="tx_vision" placeholder="Ingrese ..."></textarea>
                        </div>          
                      
                   <div class="row">
                    <!-- /.col -->
                    <div class="col-md-6">
                   
                        <div class="form-group">
                            <label>Fecha Registro:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_registro" class="form-control pull-right" id="fe_registro" type="text" required>
                            </div>
                            <!-- /.input group -->
                          </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                            <label>Fecha Actualización:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_actualizacion" class="form-control pull-right" id="fe_actualizacion" type="text" required>
                            </div>
                            <!-- /.input group -->
                          </div> 
                        
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              
              
              </div>
              <!-- /.box -->
              
              
                <!-- Default box -->
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Datos Generales</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                      
                        <div class="col-md-6">
                          
                          <div class="form-group">
                              <label>Razón Social</label>
                              <input id="tx_razon" type="text" class="form-control" placeholder="Ingrese ..."   >
                            </div>
                            
                            
                            <div class="form-group">
                              <label>RUC</label>
                              <input id="tx_ruc" type="text" class="form-control" placeholder="Ingrese ..."   >
                            </div>
                          
                          <div class="form-group ">
                              <label>Nombre Comercial</label>
                               <input id="tx_nombre" type="text" class="form-control" placeholder="Ingrese ..."   >
                            </div>

                          <div class="form-group">
                            <label>Fecha de inicio de actividades:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input id="fe_inicio_actividades" class="form-control pull-right" type="text" required>
                            </div>
                            <!-- /.input group -->
                          </div>  

                           <div class="form-group  ">
                              <label>Teléfono móvil</label>
                              <input id="tx_telefono" type="tel" class="form-control" placeholder="Ingrese ..."   >
                          </div>   

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                        
                         <div class="form-group ">
                              <label>Página web</label>
                               <input id="tx_pagina" type="text" class="form-control" placeholder="Ingrese ...">
                         </div>
                        
                        
                         <div class="form-group ">
                              <label>Correo electrónico</label>
                               <input id="tx_correo" type="email" class="form-control" placeholder="Ingrese ...">
                         </div>
                           

                          <div class="form-group  ">
                              <label>Número de socios colonos</label>
                              <input id="nu_socios_colonos" value="0" type="number" class="form-control" placeholder="Ingrese ..."   >
                          </div>  

                          <div class="form-group  ">
                              <label>Número de socios indígenas</label>
                              <input id="nu_socios_indigenas" value="0" type="number" class="form-control" placeholder="Ingrese ..."   >
                          </div>  

                          <div class="form-group  ">
                              <label>Número total de socios</label>
                              <input id="nu_socios_total" value="0" type="number" class="form-control" disabled >
                          </div>


                         



                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  
                    <!-- /.box-body -->
                    
                  </div>
                  <!-- /.box -->
             





                            <!-- Default box -->
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Dirección Oficina Central</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">                           
                       
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
                          
                          </div>


                          <div class="col-md-6">     
                 
                           <div class="form-group required">
                            <label>Centro poblado</label>
                            <select id="id_centro_poblado_ejec" class="form-control select2" style="width: 100%;"  required >
                              <option value="" selected="selected">Seleccione</option>
                            
                            </select>
                          </div>
                        
                            <div class="form-group ">
                              <label>Otro centro poblado</label>
                              <input id="tx_centro_poblado_direccion" type="text" class="form-control" placeholder="Ingrese un centro poblado que no esté en la lista">
                            </div>

                             <div class="form-group required">
                              <label>Dirección</label>
                             <textarea class="form-control" id="tx_direccion" placeholder="Ingrese ..."></textarea>
                            </div>
                            
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                      
                  
                    
                  </div>
                  <!-- /.box -->



                            <!-- Default box -->
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title"> Ámbito de acción</h3>
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

                        </div>

                          <div class="col-md-6">   
                          

                           <div class="form-group required">
                            <label>Distrito</label>
                            <select id="id_distrito" class="form-control select2" style="width: 100%;"  required >
                              <option value="" selected="selected">Seleccione</option>
                            
                            </select>
                          </div>                 
               
                          
                           <div class="form-group required">
                            <label>Centros poblados</label>
                          </div>                         
                          
                          <div class="input-group input-group-sm">
                            <select id="id_centro_poblado" class="form-control select2" style="width: 100%;">
                              <option value="" selected="selected">Seleccione</option>
                            </select>
                                <span class="input-group-btn">
                                   <button  id="addrowCP"  type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>   </button>
                                </span>
                          </div>
                         
                                             
                          
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



                           <button id="btnGuardar_General" type="submit" class="btn btn-success pull-right  " >
                          <i class="fa fa-download"></i> Guardar </button>
                         </form>    


                            
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                      
                  
                    
                  </div>
                  <!-- /.box -->



              </div>
              <!-- /.tab-pane -->
              
              




               <div class="tab-pane" id="tab_4">                   
                   <form id="formEstructura">
                    <div class="box box-danger">
                      <div class="form-group ">
                            <label>Tipo</label>
                            <select id="tx_tipo" class="form-control select2" style="width: 100%;">
                              <option value="" selected="selected">Seleccione</option>
                              <option>Asociación</option>                              
                              <option>Cooperativa</option>                              
                            </select>
                      </div>
                    </div>

                           
              <!-- Default box -->
                  <div class="box box-danger" id="box_cooperativa">
                    <div class="box-header with-border">
                      <h3 class="box-title">Estructura Orgánica (Cooperativa)</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      
                      

                      <div class="row">
                        <div class="col-md-6">          
                           
                          <h4 class="box-title">Consejo de Administracion</h4>                            
                              
                         <div class="form-group ">
                              <label>Presidente</label>
                              <input id="tx_presidente_ca" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                           <div class="form-group ">
                              <label>Vicepresidente</label>
                              <input id="tx_vicepresidente_ca" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                           <div class="form-group ">
                              <label>Secretario</label>
                              <input id="tx_secretario_ca" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                          <div class="form-group ">
                              <label>Vocal #1</label>
                              <input id="tx_vocal_1_ca" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                          <div class="form-group ">
                              <label>Vocal #2</label>
                              <input id="tx_vocal_2_ca" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          <br>
                           <h4 class="box-title">Comite de Educación</h4>
                          <div class="form-group ">
                              <label>Presidente</label>
                              <input id="tx_presidente_ceduc" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                           <div class="form-group ">
                              <label>Vicepresidente</label>
                              <input id="tx_vicepresidente_ceduc" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                           <div class="form-group ">
                              <label>Secretario</label>
                              <input id="tx_secretario_ceduc" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                       
                         <h4 class="box-title">Comité Electoral</h4>                            
                              
                         <div class="form-group ">
                              <label>Presidente</label>
                              <input id="tx_presidente_celect" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                           <div class="form-group ">
                              <label>Vicepresidente</label>
                              <input id="tx_vicepresidente_celect" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                           <div class="form-group ">
                              <label>Secretario</label>
                              <input id="tx_secretario_celect" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          <br>
                          <h4 class="box-title">Gerente General</h4>                            
                              
                         <div class="form-group ">
                              <label>Nombres y Apellidos</label>
                              <input id="tx_nombre_gerente" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                           <div class="form-group ">
                              <label>Número de celular</label>
                              <input id="tx_telefono_gerente" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                           <div class="form-group ">
                              <label>Correo Electrónico</label>
                              <input id="tx_correo_gerente" type="email" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                      
                            
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>                  
                   
                  </div>
                  <!-- /.box -->
     
                             <!-- Default box -->
                   <div class="box box-danger" id="box_asociacion">
                    <div class="box-header with-border">
                      <h3 class="box-title">Estructura Orgánica (Asociación)</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">                                     
                            
                            <div class="form-group ">
                              <label>Presidente</label>
                              <input id="tx_presidente_asociacion" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                           <div class="form-group ">
                              <label>Vicepresidente</label>
                              <input id="tx_vicepresidente_asociacion" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                           <div class="form-group ">
                              <label>Secretario</label>
                              <input id="tx_secretario_asociacion" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">                           
                      
                          <div class="form-group ">
                              <label>Tesorero</label>
                              <input id="tx_tesorero_asociacion" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                          <div class="form-group ">
                              <label>Vocal #1</label>
                              <input id="tx_vocal_1_asociacion" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                          <div class="form-group ">
                              <label>Vocal #2</label>
                              <input id="tx_vocal_2_asociacion" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>                         
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>    
                   
                    <!-- /.box-footer-->
                  </div>


                  <div class="box box-body">
                     <button id="btnGuardar_Estructura" type="submit" class="btn btn-success pull-right  " >
                     <i class="fa fa-download"></i> Guardar </button>
                   </form>                             
                  </div>              
                  
                  <!-- /.box -->

                </div>
              <!-- /.tab-pane -->
              
              
                          
              <div class="tab-pane" id="tab_5">
                   
                <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Café</h3>
                  </div>               
                    
                    <!-- /.box-body -->
                    <div class="box-body">
                    
                     <form id="formProduccion">

                      <div class="row">
                        <div class="col-md-6">                                     
                            
                            <div class="form-group ">
                              <label>Oferta Exportable</label>
                              <input id="tx_oferta_cafe" type="text" class="form-control" placeholder="Ingrese ...">
                          </div>
                          
                           <div class="form-group ">
                              <label>Época de cosecha</label>
                              <input id="tx_cosecha_cafe" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                           <div class="form-group ">
                              <label>Calidad en taza</label>
                              <input id="tx_calidad_cafe" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                          <div class="form-group ">
                              <label>Has en producción</label>
                              <input id="tx_produccion_cafe" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">                           
                      
                        

                          <div class="form-group ">
                              <label>Variedades</label>
                              <input id="tx_variedades_cafe" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                                                  <div class="form-group required">
                              <label>Certificaciones</label>                              
                          </div>

                          <div class="col-md-6"> 
                          
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert1_cafe" value="Fairtrade-Comercio Justo">Fairtrade-Comercio Justo</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert2_cafe" value="Rainforest Alliance">Rainforest Alliance</label>
                         </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert3_cafe" value="USDA ORGANIC">USDA ORGANIC</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert4_cafe" value="UTZ Certified">UTZ Certified</label>
                          </div>  
                           <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert5_cafe" value="JAS (Sistema Agrícola del Japón)">JAS (Sistema Agrícola del Japón)</label>
                          </div>               
                          </div> 

                          <div class="col-md-6"> 

                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert6_cafe" value="BIO SUISSE">BIO SUISSE</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert7_cafe" value="Asociación 4C">Asociación 4C</label>
                         </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert8_cafe" value="Smith Sonian Migratory Bird Center-Centro de Aves Migratorias">Smith Sonian Migratory Bird Center-Centro de Aves Migratorias</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert9_cafe" value="Naturland">Naturland</label>
                          </div>  
                           <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert10_cafe" value="Unión Europea">Unión Europea</label>
                          </div>               
                          </div> 






                            
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                  </div>

            
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Cacao </h3>                 
              </div>
                   <!-- /.box-body -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">                                     
                            
                          <div class="form-group ">
                              <label>Oferta Exportable</label>
                              <input id="tx_oferta_cacao" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                          
                           <div class="form-group ">
                              <label>Época de cosecha</label>
                              <input id="tx_cosecha_cacao" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>
                            
                            <div class="form-group ">
                              <label>Has en producción</label>
                              <input id="tx_produccion_cacao" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>                          
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">

                          <div class="form-group ">
                              <label>Variedades</label>
                              <input id="tx_variedades_cacao" type="text" class="form-control" placeholder="Ingrese ..."  >
                          </div>

                         

                          <div class="form-group required">
                              <label>Certificaciones</label>                              
                          </div>

                          <div class="col-md-6"> 
                          
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert1_cacao" value="Fairtrade-Comercio Justo">Fairtrade-Comercio Justo</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert2_cacao" value="Rainforest Alliance">Rainforest Alliance</label>
                         </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert3_cacao" value="USDA ORGANIC">USDA ORGANIC</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert4_cacao" value="UTZ Certified">UTZ Certified </label>
                          </div>  
                           <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert5_cacao" value="JAS (Sistema Agrícola del Japón)">JAS (Sistema Agrícola del Japón) </label>
                          </div>               
                          </div> 

                          <div class="col-md-6"> 

                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert6_cacao" value="BIO SUISSE">BIO SUISSE</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert7_cacao" value="Asociación 4C">Asociación 4C</label>
                         </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert8_cacao" value="Smith Sonian Migratory Bird Center-Centro de Aves Migratorias">Smith Sonian Migratory Bird Center-Centro de Aves Migratorias</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert9_cacao" value="Naturland">Naturland</label>
                          </div>  
                           <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert10_cacao" value="Unión Europea">Unión Europea</label>
                          </div>               
                          </div> 
                            
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    </div>



              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Otro </h3>                 
              </div>
                   <!-- /.box-body -->
                    <div class="box-body">                     

                      <div class="row">
                        <div class="col-md-6">  

                        <div class="form-group required">
                              <label>Nombre del rublo</label>
                              <input id="tx_otro" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>                                   
                            
                            <div class="form-group required">
                              <label>Oferta Exportable</label>
                              <input id="tx_oferta_otro" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>
                          
                           <div class="form-group required">
                              <label>Época de cosecha</label>
                              <input id="tx_cosecha_otro" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>

                          <div class="form-group required">
                              <label>Has en producción</label>
                              <input id="tx_produccion_otro" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>  
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6"> 
                                                 

                          <div class="form-group required">
                              <label>Variedades</label>
                              <input id="tx_variedades_otro" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>

                          <div class="form-group required">
                              <label>Certificaciones</label>                              
                          </div>

                          <div class="col-md-6"> 
                          
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert1_otro" value="Fairtrade-Comercio Justo">Fairtrade-Comercio Justo</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert2_otro" value="Rainforest Alliance">Rainforest Alliance</label>
                         </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert3_otro" value="USDA ORGANIC">USDA ORGANIC</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert4_otro" value="UTZ Certified ">UTZ Certified </label>
                          </div>  
                           <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert5_otro" value="JAS (Sistema Agrícola del Japón)">JAS (Sistema Agrícola del Japón) </label>
                          </div>               
                          </div> 

                          <div class="col-md-6"> 

                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert6_otro" value="BIO SUISSE">BIO SUISSE</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert7_otro" value="Asociación 4C">Asociación 4C</label>
                         </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert8_otro" value="Smith Sonian Migratory Bird Center-Centro de Aves Migratorias">Smith Sonian Migratory Bird Center-Centro de Aves Migratorias</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert9_otro" value="Naturland">Naturland</label>
                          </div>  
                           <div class="checkbox">
                            <label><input type="checkbox" id="tx_cert10_otro" value="Unión Europea">Unión Europea</label>
                          </div>               
                          </div>                           
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    </div>

                    <div class="box-body">                     
                          <button id="btnGuardar_Produccion" type="submit" class="btn btn-success pull-right  " >
                          <i class="fa fa-download"></i> Guardar </button>
                    </div>

              </form>         

          
          </div>
              <!-- /.tab-pane -->



         
         <div class="tab-pane" id="tab_6">                   
             
             <form id="formOtros">
                <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Servicios actuales de la organización</h3>
                  </div>                
                    
                    <!-- /.box-body -->
                    <div class="box-body">
                      
                    
                      
                      <div class="row">
                        <div class="col-md-6">                                     
                            
                            <div class="form-group required">
                              <label>Captación/Asistencia Técnica</label>
                              <input id="tx_capacitacion" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>
                          
                           <div class="form-group required">
                              <label>Acopio</label>
                              <input id="tx_acopio" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            
                      
                        <div class="form-group required">
                              <label>Comercialización</label>
                              <input id="tx_comercializacion" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>                            
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                  </div>  




                <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Negocios Relacionados</h3>
                  </div>
                
                    
                    <!-- /.box-body -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">                                     
                            
                            <div class="form-group required">
                              <label>Productos</label>
                              <input id="tx_productos" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>       
                     
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">                           
                      
                          <div class="form-group required">
                              <label>Servicios</label>
                              <input id="tx_servicios" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>                         
                           
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                  </div>     
            


                <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Logros y Reconocimientos</h3>
                  </div>                
                    
                   <div class="box-body">      
                    <div class="form-group required">
                          <label>Descripción</label>
                         <textarea class="form-control" id="tx_descripcion_logros" placeholder="Ingrese ..."></textarea>
                    </div>

                    </div>
                    <!-- /.box-body -->
                  </div>            



                  <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Clientes</h3>
                  </div>                
                    
                    <!-- /.box-body -->
                    <div class="box-body">                     
                            <div class="form-group required">
                              <label>Descripcion</label>
                              <textarea class="form-control" id="tx_descripcion_clientes" placeholder="Ingrese ..."></textarea>
                          </div>
                      
                    </div>
                    <!-- /.box-body -->
                  </div>  

                   <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Alianzas</h3>
                  </div>                
                    
                    <!-- /.box-body -->
                    <div class="box-body">                     
                            <div class="form-group required">
                              <label>Descripcion</label>
                               <textarea class="form-control" id="tx_descripcion_alianzas" placeholder="Ingrese ..."></textarea>
                          </div>
                      
                    </div>                    
                    <!-- /.box-body -->
                  </div> 

                  <div class="box box-danger">
                  <div class="box-header with-border">
                      <h3 class="box-title">Síguenos</h3>
                  </div>                
                    
                    <!-- /.box-body -->
                    <div class="box-body">                     
                            <div class="form-group required">
                              <label>Facebook</label>
                              <input id="tx_descripcion_siguenos" type="text" class="form-control" placeholder="Ingrese ..." required >
                          </div>
                      
                    </div>

                     <div class="box-body">                     
                            
                      <button id="btnGuardar_Otros" type="submit" class="btn btn-success pull-right  " >
                      <i class="fa fa-download"></i> Guardar     </button>
                      
                    </div>
                    
                    <!-- /.box-body -->
                  </div>               

                     </form>       
                         </div>
                         
                         


                  <div class="tab-pane" id="tab_7">         
           
                  <!-- Default box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Proyecto </h3> 
                  <button  id="btnNuevo"  type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>  </button>
                </div>
              </div>          


                <table id="proyectos_asociaciones" class=" table order-list" >
                     
                      <tbody>
                          <tr>
                              <td class="col-sm-10">
                                 <div class="form-group ">
                                   
                                  </div>
                              </td>
                              <td class="col-sm-2" >
                                
                              </td>
                          </tr>
                      </tbody>
                  </table>

          </div>
        
       
           <div class="tab-pane" id="tab_8">
                   
          
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Documentos PDF</h3>
             <button type="button" id="addPdf" name="addPdf" class="btn btn-primary pull-right" disabled ><i class="fa fa-plus"></i> Nuevo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
          
        <div id="uploaded_pdf">
      
	
	 </div>
	<!-- /.fin uploaded_image -->


             </div>

              <div class="box-footer">
                                
              </div>
           
          </div>
                   
                
         </div>
         <!-- /.tab-pane 8 -->
       
       
         
         <div class="tab-pane" id="tab_9">
                   
          
         <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Galería de fotos.</h3>
             <button type="button" id="addImg" name="addImg" class="btn btn-primary pull-right" disabled ><i class="fa fa-plus"></i> Nuevo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
          
        <div id="uploaded_image">


             <div class="row">
                   
                 

     
	 
	 </div>
	<!-- /.fin row -->
	
	 </div>
	<!-- /.fin uploaded_image -->


             </div>

              <div class="box-footer">
                                
              </div>
           
          </div>
                   
                
         </div>
         <!-- /.tab-pane 9 -->
         
         
         
                  
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        
          </div>
  
  
          </div>
          <!-- /.row -->
        </div>
      
       
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
    $('#fe_registro').datepicker("setDate", currentDate);
    $('#fe_actualizacion').datepicker("setDate", currentDate);
    $('#fe_inicio').datepicker("setDate", currentDate);
    $('#fe_fin').datepicker("setDate", currentDate);
    $('#fe_inicio_actividades').datepicker("setDate", currentDate);  


    $("#box_cooperativa").hide();
    $("#box_asociacion").hide();    
    
    //$("#btnGuardar_Estructura").hide();

    $("#btnGuardar_Estructura").prop('disabled', true); 
    $("#btnGuardar_Produccion").prop('disabled', true); 
    $("#btnGuardar_Otros").prop('disabled', true); 
    $("#btnNuevo").prop('disabled', true); 
    

    $( "#nu_socios_colonos " ).change(function() {
          
          var a = parseFloat($("#nu_socios_colonos").val());
          var b = parseFloat($("#nu_socios_indigenas").val());
          var c = a + b ;
          
          $( "#nu_socios_total" ).val(c);
        });

    $( "#nu_socios_indigenas " ).change(function() {
          
          var a = parseFloat($("#nu_socios_colonos").val());
          var b = parseFloat($("#nu_socios_indigenas").val());
          var c = a + b ;
          
          $( "#nu_socios_total" ).val(c);
    });





   
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
      
      


      $("#id_distrito_ejec").change(function(){
       var base_url = '<?php echo site_url() ?>';
       $( "#id_centro_poblado_ejec").empty();

          $.ajax({
                url: base_url+'/proyecto/buscar_centro_poblado',                               
                data: {
                    nb_region: $( "#id_region_ejec option:selected" ).html(),                                           
                    nb_provincia: $( "#id_provincia_ejec option:selected" ).html(),  
                    nb_distrito: $( "#id_distrito_ejec option:selected" ).html(),  
                                        
                },                  
                success: function (result) {                    
                    
                     var centro_poblado = $.parseJSON(result);
                     $( "#id_centro_poblado_ejec").append("<option value=''> Seleccione </option>");
                   
                     $.each(centro_poblado, function(key,value) {

                      $( "#id_centro_poblado_ejec").append("<option value='"+value.codcp+"' >"+value.nomcp+"</option>");

                     }); 

                }
            });

      });
      



   
//IMAGENES

   $('#upload_form_pdf').on('submit', function(e){  
           e.preventDefault();  
            
                $.ajax({  
                     url:"<?php echo site_url(); ?>/asociacion/ajax_upload_pdf",  
                   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_pdf').append(data);  
                     }  
                });  
            
      $("#modal-nuevo-pdf").modal('toggle');
 
      }); 

   $('#upload_form_img').on('submit', function(e){  
           e.preventDefault();  
            
                $.ajax({  
                     url:"<?php echo site_url(); ?>/asociacion/ajax_upload_img",                    
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
      
      
      
     
    $('#modal-eliminar-pdf').on('show.bs.modal', function(e) {
        var id_pdf = $(e.relatedTarget).data('pdf-id');        
        $('#id_pdf_eliminar').val(id_pdf);

        //alert(id_shp);         

   }); 
   
     $('#modal-eliminar-img').on('show.bs.modal', function(e) {
        var id_imagen = $(e.relatedTarget).data('imagen-id');        
        $('#id_imagen_eliminar').val(id_imagen);

        //alert(id_imagen);         

   }); 
      

     $('#btnEliminarPdf').click(function(){
        
          var id_pdf_eliminar =  $("#id_pdf_eliminar").val();

           $.ajax({
                url: "<?php echo site_url(); ?>/asociacion/eliminar_pdf",                               
                data: {
                    id_pdf: id_pdf_eliminar                                           
                                        
                },                  
                success: function (result) {                    
                    
                    $("#img_"+id_pdf_eliminar).fadeOut( "slow" );  
                                        

                }
            });

             $("#modal-eliminar-pdf").modal('toggle');

        });

        
       
       
       
        $('#btnEliminarImg').click(function(){
        
          var id_imagen_eliminar =  $("#id_imagen_eliminar").val();

           $.ajax({
                url: "<?php echo site_url(); ?>/asociacion/eliminar_imagen",                               
                data: {
                    id_imagen: id_imagen_eliminar                                           
                                        
                },                  
                success: function (result) {                    
                    
                    $("#img_"+id_imagen_eliminar).fadeOut( "slow" );  
                                        

                }
            });

             $("#modal-eliminar-img").modal('toggle');

        });  




      
      
      $("#tx_tipo").change(function(){
        
        if ($('#tx_tipo').val()=="Asociación") {
          $('#box_cooperativa').hide();  
          $('#box_asociacion').show();
          estado_asociacion=true;
          estado_cooperativa=false;  
          
        }
        else if($('#tx_tipo').val()=="Cooperativa"){

          $('#box_cooperativa').show();  
          $('#box_asociacion').hide();  
          estado_asociacion=false;
          estado_cooperativa=true;        
          
        }
        else{
          $("#box_cooperativa").hide();
          $("#box_asociacion").hide();
          estado_asociacion=false;
          estado_cooperativa=false;  
        }

      });


           
       
        $('#formGeneral').submit(function(e){
       // $('#btnGuardar').click(function(e){
            
          var base_url = '<?php echo site_url() ?>';
          var dataCP = [];
          $( ".txtCentroPoblado" ).each(function( index ) {                     
              dataCP.push(  $( this ).attr("id") );
          });
          
          var data_centro_poblado = JSON.stringify( dataCP );  

            $.ajax({
                url: base_url+'/asociacion/guardar_general',                               
                data: {
                    
                    tx_mision: $('#tx_mision').val(),
                    tx_vision: $('#tx_vision').val(),  
                    fe_registro: $('#fe_registro').val(),  
                    fe_actualizacion: $('#fe_actualizacion').val(),
                    tx_razon: $('#tx_razon').val(),
                    tx_ruc: $('#tx_ruc').val(),
                    tx_nombre: $('#tx_nombre').val(),                   
                    fe_inicio_actividades: $('#fe_inicio_actividades').val(),
                    tx_pagina: $('#tx_pagina').val(),
                    tx_correo: $('#tx_correo').val(),
                    nu_socios_colonos: $('#nu_socios_colonos').val(),
                    nu_socios_indigenas: $('#nu_socios_indigenas').val(),
                    nu_socios_total: $('#nu_socios_total').val(),
                    tx_telefono: $('#tx_telefono').val(),
                    

                    //Direccion Oficina Principal                   
                    id_pais_ejec: $('#id_pais_ejec option:selected').val(),
                    id_region_ejec: $('#id_region_ejec option:selected').val(),
                    id_provincia_ejec: $('#id_provincia_ejec option:selected').val(),
                    id_distrito_ejec: $('#id_distrito_ejec option:selected').val(),
                    id_centro_poblado_ejec: $('#id_centro_poblado_ejec option:selected').val(),
                    tx_centro_poblado_direccion: $('#tx_centro_poblado_direccion').val(),
                    tx_direccion: $('#tx_direccion').val(),
                    
                    //Ámbito de acción       

                    id_pais: $('#id_pais_ejec option:selected').val(),
                    id_distrito: $('#id_distrito_ejec option:selected').val(),
                    id_provincia: $('#id_provincia_ejec option:selected').val(),
                    id_region: $('#id_region_ejec option:selected').val(),                    
                    array_centro_poblado: data_centro_poblado,
                    
                    
                    
                },                  
                
                success: function (result) {                    
                   
                    var valor = $.parseJSON(result);
                   
                    $('#id').val(valor);  
                  
                    $("#val_id_proyecto_adj").val(valor);
                    $("#val_id_proyecto_gal").val(valor);
                                     
                    activar_mensaje("Información", "Registro agregado correctamente");                 
                    $('#li_tab_3').removeClass( "active" );
                    $('#tab_3').removeClass( "active" );                     
                    $('#li_tab_4').addClass('active');                   
                    $('#tab_4').addClass('active');                    
                    $('#btnGuardar_General').prop('disabled', true);                     
                    $('#btnGuardar_Estructura').prop('disabled', false);   
                    
                    
                    $('#addImg').prop('disabled', false);
                    $('#addImg').removeClass('disabled');                 
                    
                    $('#addPdf').prop('disabled', false);
                    $('#addPdf').removeClass('disabled');      
                    
                }
            }); 

          return false;
        
        
       
       });

         $('#addPdf').click(function(){
        
        
                              $("#modal-nuevo-pdf").modal('toggle');

        });
        
        $('#addImg').click(function(){
        
        
                              $("#modal-nueva-imagen").modal('toggle');

        });
        




       $('#formEstructura').submit(function(e){
       //$('#btnGuardar_Estructura').click(function(e){
          
          //Validaciones manuales, porque el required de html 5 no funciona si se ocultan los objetos con js
          if (estado_asociacion==true) {
          
            var a = $('#tx_presidente_asociacion').val()
            var b = $('#tx_vicepresidente_asociacion').val()
            var c = $('#tx_secretario_asociacion').val()  
            var d = $('#tx_tesorero_asociacion').val()
            var e = $('#tx_vocal_1_asociacion').val() 
            var f = $('#tx_vocal_2_asociacion').val()
            
              if( a == null || a.length == 0 || /^\s+$/.test(a) || b == null || b.length == 0 || /^\s+$/.test(b) || c == null || c.length == 0 || /^\s+$/.test(c) || d == null || d.length == 0 || /^\s+$/.test(d) || e == null || e.length == 0 || /^\s+$/.test(e) || f == null || f.length == 0 || /^\s+$/.test(f) ) {            
                
                activar_mensaje("Error", "Existen campos vacíos");          
            
                return false;        
              }
              else{               
                     
                var base_url = '<?php echo site_url() ?>';

                  $.ajax({
                        url: base_url+'/asociacion/guardar_estructura',                               
                        data: {
                        id: $('#id').val(),   
                        tx_tipo: $('#tx_tipo option:selected').val(),                                                            
                        tx_presidente_asociacion: $('#tx_presidente_asociacion').val(), 
                        tx_vicepresidente_asociacion: $('#tx_vicepresidente_asociacion').val(), 
                        tx_secretario_asociacion: $('#tx_secretario_asociacion').val(), 
                        tx_tesorero_asociacion: $('#tx_tesorero_asociacion').val(), 
                        tx_vocal_1_asociacion: $('#tx_vocal_1_asociacion').val(), 
                        tx_vocal_2_asociacion: $('#tx_vocal_2_asociacion').val(), 
                        
                    },                  
                    
                    success: function (result) {                    
                       
                       activar_mensaje("Información", "Registro agregado correctamente");
                        
                        $('#li_tab_4').removeClass( "active" );
                        $('#tab_4').removeClass( "active" );                   
                        $('#li_tab_5').addClass('active');                   
                        $('#tab_5').addClass('active');
                        $('#btnGuardar_Estructura').prop('disabled', true);      
                        $('#btnGuardar_Produccion').prop('disabled', false);  
                        
                    }

            }); 
          return false;  
              

              }
          }  
          else if (estado_cooperativa==true){
            
             var a = $('#tx_presidente_ca').val();
             var b= $('#tx_vicepresidente_ca').val()
             var c= $('#tx_secretario_ca').val()
             var d= $('#tx_vocal_1_ca').val()
             var e= $('#tx_vocal_2_ca').val()
             var f= $('#tx_presidente_ceduc').val()
             var g= $('#tx_vicepresidente_ceduc').val()
             var h= $('#tx_secretario_ceduc').val() 
             var i= $('#tx_presidente_celect').val() 
             var j= $('#tx_vicepresidente_celect').val() 
             var k= $('#tx_secretario_celect').val()
             var m= $('#tx_nombre_gerente').val()
             var n= $('#tx_telefono_gerente').val()
             var o= $('#tx_correo_gerente').val()
            
              if( a == null || a.length == 0 || /^\s+$/.test(a)  || b == null || b.length == 0 || /^\s+$/.test(b) 
                || c == null || c.length == 0 || /^\s+$/.test(c) || d == null || d.length == 0 || /^\s+$/.test(d) 
                || e == null || e.length == 0 || /^\s+$/.test(e) || f == null || f.length == 0 || /^\s+$/.test(f)  
                || g == null || g.length == 0 || /^\s+$/.test(g) || h == null || h.length == 0 || /^\s+$/.test(h) 
                || i == null || i.length == 0 || /^\s+$/.test(i) || j == null || j.length == 0 || /^\s+$/.test(j) 
                || k == null || k.length == 0 || /^\s+$/.test(k) || m == null || m.length == 0 || /^\s+$/.test(m) 
                || n == null || n.length == 0 || /^\s+$/.test(n) || o == null || o.length == 0 || /^\s+$/.test(o)) {            
                
                activar_mensaje("Error", "Existen campos vacíos");     
            
                return false;        
              }
              else{
                
                      var base_url = '<?php echo site_url() ?>';

          $.ajax({
                url: base_url+'/asociacion/guardar_estructura',                               
                data: {
                    tx_tipo: $('#tx_tipo option:selected').val(), 
                    id: $('#id').val(),
                    tx_presidente_ca: $('#tx_presidente_ca').val(),
                    tx_vicepresidente_ca: $('#tx_vicepresidente_ca').val(),
                    tx_secretario_ca: $('#tx_secretario_ca').val(),
                    tx_vocal_1_ca: $('#tx_vocal_1_ca').val(),
                    tx_vocal_2_ca: $('#tx_vocal_2_ca').val(),   
                    tx_presidente_ceduc: $('#tx_presidente_ceduc').val(),   
                    tx_vicepresidente_ceduc: $('#tx_vicepresidente_ceduc').val(),   
                    tx_secretario_ceduc: $('#tx_secretario_ceduc').val(),   
                    tx_presidente_celect: $('#tx_presidente_celect').val(),   
                    tx_vicepresidente_celect: $('#tx_vicepresidente_celect').val(),   
                    tx_secretario_celect: $('#tx_secretario_celect').val(),   
                    tx_nombre_gerente: $('#tx_nombre_gerente').val(),   
                    tx_telefono_gerente: $('#tx_telefono_gerente').val(),   
                    tx_correo_gerente: $('#tx_correo_gerente').val(), 
                    
                },                  
                
                success: function (result) {                    
                   
                   activar_mensaje("Información", "Registro agregado correctamente");
                    
                    $('#li_tab_4').removeClass( "active" );
                    $('#tab_4').removeClass( "active" );                   
                    $('#li_tab_5').addClass('active');                   
                    $('#tab_5').addClass('active');
                    $('#btnGuardar_Estructura').prop('disabled', true);      
                    $('#btnGuardar_Produccion').prop('disabled', false);  
                        
                    
                }

            }); 
          return false;
               
              }

            }
        
       });


       $('#formProduccion').submit(function(e){
       // $('#btnGuardar').click(function(e){          


  var tx_certificacion_cafe=" ";
  for (var i = 1; i < 10; i++) {
    if ($('#tx_cert'+i+'_cafe:checked').val()!=undefined) {tx_certificacion_cafe =tx_certificacion_cafe+$('#tx_cert'+i+'_cafe:checked').val()+', '} else{tx_certificacion_cafe =tx_certificacion_cafe+'NO, '}
  }
  if ($('#tx_cert10_cafe:checked').val()!=undefined) {tx_certificacion_cafe =tx_certificacion_cafe+$('#tx_cert10_cafe:checked').val()}

  var  tx_certificacion_cacao=" ";
  for (var i = 1; i < 10; i++) {
    if ($('#tx_cert'+i+'_cacao:checked').val()!=undefined) {tx_certificacion_cacao =tx_certificacion_cacao+$('#tx_cert'+i+'_cacao:checked').val()+', '} else{tx_certificacion_cacao =tx_certificacion_cacao+'NO, '}
  }
  if ($('#tx_cert10_cacao:checked').val()!=undefined) {tx_certificacion_cacao =tx_certificacion_cacao+$('#tx_cert10_cacao:checked').val()}

  var tx_certificacion_otro=" ";
   for (var i = 1; i < 10; i++) {
    if ($('#tx_cert'+i+'_otro:checked').val()!=undefined) {tx_certificacion_otro =tx_certificacion_otro+$('#tx_cert'+i+'_otro:checked').val()+', '} else{tx_certificacion_otro =tx_certificacion_otro+'NO, '}
  }
  if ($('#tx_cert10_otro:checked').val()!=undefined) {tx_certificacion_otro =tx_certificacion_otro+$('#tx_cert10_otro:checked').val()}
    
   

   var base_url = '<?php echo site_url() ?>';

          $.ajax({
                url: base_url+'/asociacion/guardar_produccion',                               
                data: {          
                    
                    id: $('#id').val(),
                    tx_oferta_cafe: $('#tx_oferta_cafe').val(), 
                    tx_cosecha_cafe: $('#tx_cosecha_cafe').val(),
                    tx_calidad_cafe: $('#tx_calidad_cafe').val(),
                    tx_produccion_cafe: $('#tx_produccion_cafe').val(),
                    tx_variedades_cafe: $('#tx_variedades_cafe').val(),                    
                    tx_certificacion_cafe: tx_certificacion_cafe,
                    tx_oferta_cacao: $('#tx_oferta_cacao').val(),
                    tx_cosecha_cacao: $('#tx_cosecha_cacao').val(),
                    tx_produccion_cacao: $('#tx_produccion_cacao').val(),
                    tx_variedades_cacao: $('#tx_variedades_cacao').val(),
                    tx_certificacion_cacao: tx_certificacion_cacao,                    
                    tx_otro: $('#tx_otro').val(),
                    tx_oferta_otro: $('#tx_oferta_otro').val(),
                    tx_cosecha_otro: $('#tx_cosecha_otro').val(),
                    tx_produccion_otro: $('#tx_produccion_otro').val(),
                    tx_variedades_otro: $('#tx_variedades_otro').val(),
                    tx_certificacion_otro: tx_certificacion_otro,
                    
                },                  
                success: function (result) {                       

                    activar_mensaje("Información", "Registro agregado correctamente");
                    
                    $('#li_tab_5').removeClass( "active" );
                    $('#tab_5').removeClass( "active" );                    
                    
                    $('#li_tab_6').addClass('active');                   
                    $('#tab_6').addClass('active');
                    
                    $('#btnGuardar_Produccion').prop('disabled', true);      
                    $('#btnGuardar_Otros').prop('disabled', false);  
                        
                }
            }); 

          return false;        
     
       });




        $('#formOtros').submit(function(e){
       // $('#btnGuardar').click(function(e){
                
          var base_url = '<?php echo site_url() ?>';

          $.ajax({
                url: base_url+'/asociacion/guardar_otros',                               
                data: {
                    
                    id: $('#id').val(),
                    tx_capacitacion: $('#tx_capacitacion').val(),                    
                    tx_acopio: $('#tx_acopio').val(),
                    tx_comercializacion: $('#tx_comercializacion').val(),                   
                    tx_productos: $('#tx_productos').val(),                   
                    tx_servicios: $('#tx_servicios').val(),
                    tx_descripcion_logros: $('#tx_descripcion_logros').val(),
                    tx_descripcion_clientes: $('#tx_descripcion_clientes').val(),
                    tx_descripcion_alianzas: $('#tx_descripcion_alianzas').val(),
                    tx_descripcion_siguenos: $('#tx_descripcion_siguenos').val(),
                    
                },                  
                
                success: function (result) {                    
                  
                   activar_mensaje("Información", "Registro agregado correctamente");           
                    $('#li_tab_6').removeClass( "active" );
                    $('#tab_6').removeClass( "active" );                                        
                    $('#li_tab_7').addClass('active');                   
                    $('#tab_7').addClass('active');                    
                    $('#btnGuardar_Otros').prop('disabled', true); 
                    $('#btnNuevo').prop('disabled', false); 
                                        
                }
            }); 

          return false;        
     
       });
    
    
})   




 

        $('#btnNuevo').click(function(){       
               
          $('#formNuevo').trigger("reset");                               
          $("#modal-nuevo-proyecto-asociacion").modal('toggle');
        
        }); 


        $('#btnGuardar_proyecto_asociacion').click(function(){ 
           
            var base_url = '<?php echo site_url() ?>';

            $.ajax({
                  url: base_url+'/asociacion/guardar_proyecto',                               
                  data: {
                      
                      id: $('#id').val(),
                      tx_nombre_proyecto: $('#tx_nombre_proyecto').val(),
                      tx_entidad_ejecutora: $('#tx_entidad_ejecutora').val(),                    
                      nu_presupuesto: $('#nu_presupuesto').val(),
                      fe_inicio: $('#fe_inicio').val(),
                      fe_fin: $('#fe_fin').val(),
                      tx_actividades: $('#tx_actividades').val(),        

                  },                  
                  
                  success: function (result) {                    
                     
                      var valor = $.parseJSON(result);                    
                     
                      $("#modal-nuevo-proyecto-asociacion").modal('hide');                         
                    
                        consultar_tabla_proyecto();
                      
                  }
              
              }); 

            return false;

        });




        $('#btnModificar_proyecto_asociacion').click(function(){ 
           
            var base_url = '<?php echo site_url() ?>';

            $.ajax({
                  url: base_url+'/asociacion/modificar_proyecto_asociacion',                               
                  data: {
                      
                      id: $('#id').val(),
                      id_modificar_proyecto: $('#id_modificar_proyecto').val(),
                      tx_nombre_proyecto: $('#tx_nombre_proyecto_m').val(),
                      tx_entidad_ejecutora: $('#tx_entidad_ejecutora_m').val(),                    
                      nu_presupuesto: $('#nu_presupuesto_m').val(),
                      fe_inicio: $('#fe_inicio_m').val(),
                      fe_fin: $('#fe_fin_m').val(),
                      tx_actividades: $('#tx_actividades_m').val(),        

                  },                  
                  
                  success: function (result) {                    
                     
                      var valor = $.parseJSON(result);                                     
                     
                      $("#modal-modificar-proyecto-asociacion").modal('hide');                         
                    
                      consultar_tabla_proyecto ();
                      
                  }
              }); 

            return false;

        });




   
    function consultar_tabla_proyecto (){

       var base_url = '<?php echo site_url() ?>';

            $.ajax({
                  url: base_url+'/asociacion/listar_proyecto_asociacion',                               
                  data: {
                      
                      id_asociacion: $('#id').val(),        

                  },             
                success: function (result) {                                                           
                      
                        var valor = $.parseJSON(result);          
                        
                        var tabla = '<table cellpadding="0" cellspacing="0" border="1" class="display" id="proyectos_asociaciones" class="table table-bordered table-striped">';
                        tabla += '<caption>Proyectos Registrados</caption>';
                        tabla += '<thead>';
                        tabla += '<tr>';
                        tabla += '<th>ID</th><th>Nombre del proyecto</th><th>Entidad Ejecutora</th><th>Presupuesto</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Actividades</th><th>Acciones</th>';
                        tabla += '</tr>';
                        tabla += '</thead>';
                        tabla += '<tbody>';
                        tr = '';
         
                        for (i = 0; i < valor.length; i++){
                            tr += '<tr>';
                            tr += '<td>'+valor[i].id+'</td><td>'
                            +valor[i].tx_nombre_proyecto+'</td><td>'
                            +valor[i].tx_entidad_ejecutora+'</td><td>'
                            +valor[i].nu_presupuesto+'</td><td>'
                            +valor[i].fe_inicio+'</td><td>'+valor[i].fe_fin
                            +'</td><td>'+valor[i].tx_actividades
                           +'</td><td><div class="btn-group"><button type="button" onclick="modificar_proyecto_asociacion ('+valor[i].id+')" class="btn btn-primary"><i class="fa fa-edit"></i></button>'
                            +'<button type="button" onclick="eliminar_proyecto_asociacion ('+valor[i].id+',\u0027'+valor[i].tx_nombre_proyecto+'\u0027)" class="btn btn-danger"><i class="fa fa-remove"></i></button> </div>';
                            tr += '</td></tr>';
                         }
         
                        tabla += tr;
                        tabla += '</tbody></table>';
         
                        $('#proyectos_asociaciones').html( tabla );
                        
                                              
            }

        }); 
      return false;
      }







    function modificar_proyecto_asociacion (id){
        
        var base_url = '<?php echo site_url() ?>';
        
        $.ajax({                               
                url: base_url+'/asociacion/listar_proyecto_asociacion_id',                  
                data: {                      
                    id: id,                                         
                },                
                success: function (result) {  
                  
                  var datos = $.parseJSON(result); 
                  var datos=datos[0];
                  $('#tx_nombre_proyecto_m').val(datos.tx_nombre_proyecto);
                  $('#tx_entidad_ejecutora_m').val(datos.tx_entidad_ejecutora);                               
                  $('#nu_presupuesto_m').val(datos.nu_presupuesto);  
                  $('#fe_inicio_m').val(datos.fe_inicio);  
                  $('#fe_fin_m').val(datos.fe_fin);                   
                  $('#tx_actividades_m').val(datos.tx_actividades); 
                  $('#id_modificar_proyecto').val(datos.id); 
                  $("#modal-modificar-proyecto-asociacion").modal('toggle');   
                                              
            }

        }); 
      return false;
      }


  function eliminar_proyecto_asociacion (id, tx_nombre_proyecto){
    
    $("#id_proyecto_eliminar").val(id);     
    $("#tx_proyecto_eliminar").val(tx_nombre_proyecto);    
    $("#modal-eliminar-proyecto-asociacion").modal('toggle');

  }


    $('#btnEliminarProyecto').click(function(){ 
           
            var base_url = '<?php echo site_url() ?>';

            $.ajax({
                   url: base_url+'/asociacion/eliminar_proyecto_asociacion',                           
                  data: {
                      
                       id:  $("#id_proyecto_eliminar").val(),    

                  },                  
                  
                  success: function (result) {                                    
                    
                  $("#modal-eliminar-proyecto-asociacion").modal('hide');  
                   consultar_tabla_proyecto ();     
                      
                  }
              
              }); 

            return false;

        });

    function activar_mensaje(titulo, informacion){         
         
         $("#modal-informacion").trigger("reset");   
         $("#titulo").text(titulo);
         $("#informacion").text(informacion);         
         $("#modal-informacion").modal('toggle');
         
      }
    


 </script> 
  