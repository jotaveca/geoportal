

<!-- Modal ELIMINAR -->
  <div class="modal fade" id="modal-eliminar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar usuario</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_usuario_eliminar" type="hidden"> 
              <p>¿Está seguro que desea eliminar el usuario <span id="nb_usuario_eliminar"></span>?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btnEliminarusuario" class="btn btn-primary">Eliminar</button> 
        </div>
      </div>
    </div>
  </div>


<!-- Modal MODIFICAR -->
 <div class="modal fade" id="modal-modificar-usuario">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Usuario</h4>
              </div>
              <div class="modal-body">
          
       
    <form id="formModificarUsuario">               
           <input type="hidden" id="id_usuario_modif">    

            <div class="row">
              <div class="col-md-12"> 
              <span id="ci_msj_block" class="help-block">
                  <p id="ci_msj_block_txt_modif" class="text-red"></p>
                  
              </span>
               <div class="form-group">
                  <label>Cuenta </label>                  
                    <input id ="cuenta_m" class="form-control" type="text" readonly>   
               </div>              
              <!-- /.form-group -->   
              
              <div class="form-group">                                                 
                  <label>Nombres</label>
                  <input id="nombre_usuario_modif" class="form-control"   type="text" >
                </div>              
              <!-- /.form-group -->   
              
                <div class="form-group">         
                  <label>Apellidos</label>
                  <input id="ape_usuario_modif" class="form-control"  type="text" >
                 </div>              
              <!-- /.form-group -->   
              
                <div class="form-group">         
                  <label>Correo</label>
                  <input id="correo_modif" class="form-control"  placeholder="Correo electrónico"   type="text" >
                    </div>              
                <!-- /.form-group -->   
              
               <div class="form-group">      
                  <label>Contraseña</label><br>
                        <input id="pass1_m" class="form-control" placeholder="Contraseña"  type="password" >
                        <input id="pass2_m" class="form-control" placeholder="Repita contraseña"  type="password" >
                </div>              
              <!-- /.form-group -->       

             <div class="form-group">
                <label>Rol</label><br>
                <select id="id_rol_m" name="id_rol_m" class="form-control select2" style="width: 100%;" required>
                 <option value="" >Seleccione</option>                                  
                 <?php for ($i = 0; $i < count($perfiles); $i++) {                               
        
                            echo "<option  value='".$perfiles[$i]['id']."'> ".$perfiles[$i]['nombre']."</option>";
        
                          } ?>                                       
                </select>
              </div> 
              <!-- /.form-group -->                
              <!-- /.form-group -->                    
              </div>
              <!-- fin column -->
            </div>
            <!-- /.fin row -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnModificar" class="btn btn-primary">Modificar</button> 
              </div>
            </div>
            <!-- /.modal-content -->
    </form>     


          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
        
        

<!-- Modal NUEVO -->
  <div class="modal fade" id="modal-nuevo-usuario">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo usuario</h4>
              </div>
              <div class="modal-body">
               
            <div class="row">
              <div class="col-md-12">

              <form id="formCi" >
                  <label>Cuenta </label>
                  <div class="input-group input-group-sm">
                    <input id ="cuenta_usuario" class="form-control" type="text" required placeholder="Cuenta">   
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat">Validar cuenta</button>
                  </span>
                  </div>
                  <input type="hidden" id="id_usuario">  
                  
              </form>                  
              <span id="ci_msj_block" class="help-block">
                  <p id="ci_msj_block_txt" class="text-red"></p>
                  <p id="ci_msj_block_txt_exitoso" class="text-green"></p>
              </span>
              
              
         
              </div>
         
            </div>
            <!-- /.fin row -->          
         
            <form id="formNuevoUsuario" > 
            <div class="row">
              <div class="col-md-12">             
               <div class="form-group">
                  <label>Nombres</label>
                  <span id="nombre_msj" class="label label-danger"></span>
                  <input id="nombre_usuario" class="form-control" placeholder="Nombre del usuario"  type="text" required>
               </div>  
               <div class="form-group"> 
                  <label>Apellidos</label>
                  <span id="ape_msj" class="label label-danger"></span>
                  <input id="ape_usuario" class="form-control" placeholder="Apellido del usuario"  type="text" required>
                </div> 
                <div class="form-group">  
                  <label>Correo</label>
                  <span id="correo_msj" class="label label-danger"></span>
                  <input id="correo" class="form-control" placeholder="Correo electrónico"  type="text" required>
                </div>
                
                 <div class="form-group">
	                <label>Contraseña</label><br>
	                <span id="pass1_msj" class="label label-danger"></span>
	                <input id="pass1" class="form-control" placeholder="Contraseña"  type="password" required>
	                <span id="pass2_msj" class="label label-danger"></span>
	                <input id="pass2" class="form-control" placeholder="Repita contraseña"  type="password" required>
                </div> 
                <div class="form-group">
                <label>Perfil</label><br>
                <select id="rol" name="rol" class="form-control select2" style="width: 100%;" required>
                 <option value="" >Seleccione</option>                                  
                 <?php for ($i = 0; $i < count($perfiles); $i++) {                            
                              
        
                            echo "<option  value='".$perfiles[$i]['id']."'> ".$perfiles[$i]['nombre']."</option>";
        
                          } ?>                               
                </select>
              </div> 
              <!-- /.form-group -->                
               
              </div>
              <!-- fin column -->             

            </div>
            <!-- /.fin row -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button> 
              </div>
            </div>
            <!-- /.modal-content -->

            </form>


          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        



  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de usuarios
        <small>Nueva</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-stethoscope"></i> Escritorio</a></li>
        <li class="active">Usuarios</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <form action="" method="POST" id="formUsuarios">

      <div class="box box-danger">
            <div class="box-header with-border">
          <h3 class="box-title">Administración de usuarios</h3> <button id="btnNuevo"  type="button" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i>  </button>
         
        </div>

         <br>         

        
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <table class="table table-hover" id="tbl_pacientes">  -->
              <table id="tbl_usuarios" class="table table-bordered table-striped"> 
                <thead>                
                <tr>                   
                  <th>#</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th >Cuenta</th>                                  
                  <th>Correo</th>                                                                          
                  <th>Rol</th>                                                                    
                  <th>Acción</th>
                </tr>  
              </thead>
             <tbody>
             <?php for($i=0;$i<count($lista_usuarios);$i++){        
       

              ?>
             <tr id="tr_<?php echo  $lista_usuarios[$i]['id'] ?>">
             <td><?php echo $i+1 ?></td>
             <td><?php echo $lista_usuarios[$i]['nombre'] ?></td>
             <td><?php echo $lista_usuarios[$i]['apellido'] ?></td>
             <td><?php echo $lista_usuarios[$i]['cuenta'] ?></td>
             <td><?php echo $lista_usuarios[$i]['correo'] ?></td>             
             <td><?php echo $lista_usuarios[$i]['rol'] ?></td>             
             
             <td>  
                <div class='btn-group'>                  
                  <button type='button' onclick="editarUsuario('<?php echo  $lista_usuarios[$i]['id'] ?>')" class='btn btn-primary'><i class='fa fa-edit'></i></button>                 
                   <button type='button' data-nombre="<?php echo  $lista_usuarios[$i]['nombre'] ?>" data-usuario-id="<?php echo  $lista_usuarios[$i]['id'] ?>" data-toggle="modal" data-target="#modal-eliminar" class='btn btn-danger'><i class='fa fa-remove'></i></button>                     
                </div>
              </td>
             </tr>

             <?php } ?>
             </tbody>
                     
        <tfoot>
            <tr>
                  <th>#</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th >Cuenta</th>                                  
                  <th>Correo</th>                                                                          
                  <th>Rol</th>                                                                    
                  <th>Acción</th>
            </tr>
        </tfoot>
             

              </table>
            </div>
            <!-- /.box-body -->
          </div>


      </form>

  
 

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>


<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2();

    $('#tbl_usuarios').DataTable({
         columnDefs: [
            { width: '5%', targets: 0, width: '20%', targets: 4 }
        ],
        fixedColumns: true,
        "language": {
            "url": "<?php echo base_url(); ?>assets/plugins/datatables.net-bs/datatables_spanish.json"
        }
    });

    $('#modal-eliminar').on('show.bs.modal', function(e) {
        var id_usuario = $(e.relatedTarget).data('usuario-id');
        var nb_usuario = $(e.relatedTarget).data('nombre');
        //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
        $('#id_usuario_eliminar').val(id_usuario);
        $('#nb_usuario_eliminar').html("<b>"+nb_usuario+"</b>");

});


    /*
    * VALIDAR si una cuenta esta disponible
     */
        $('#formCi').submit(function(e){             
                    
                
                $.ajax({
                url: 'buscar_cuenta_usuario',                               
                data: {
                    cuenta: $('#cuenta_usuario').val(),                                        
                    
                },                  
                success: function (result) {                  
                    
                    var usuario = $.parseJSON(result);                   
                    if(usuario == false){
                        $("#ci_msj_block_txt").html(''); 
                        $("#ci_msj_block_txt_exitoso").html('La cuenta se encuentra disponible'); 
                    }
                    else{
                        $("#ci_msj_block_txt_exitoso").html(''); 
                        $("#ci_msj_block_txt").html('La cuenta no se encuentra disponible'); 
                    }

                }
                });

                return false;     
       });
       
       
       /*
       * Nuevo Usuario
       * */
      $('#formNuevoUsuario').submit(function(e){                
                
               // alert("gdgtdfgdf");
                
                $.ajax({
                url: 'guardar_usuario',                               
                data: {                    
                    cuenta_usuario: $('#cuenta_usuario').val(),
                    nombre_usuario: $('#nombre_usuario').val(),                                        
                    ape_usuario: $('#ape_usuario').val(),                                                            
                    correo: $('#correo').val(),
                    pass1: $('#pass1').val(),                      
                    pass2: $('#pass2').val(),                      
                    id_rol: $( "#rol option:selected" ).val(), 
                    id_proyecto: $( "#proyecto option:selected" ).val(),                
                   
                },                  
                success: function (result) {                       
                    var valor = $.parseJSON(result);                                      
                                     
                    if(valor[0] == false){                                                
                        $("#ci_msj_block_txt").html(valor[1]); 

                    }else{                     
                        $('#formUsuarios').submit();         
                    }
                }
            }); 

          return false;        
     
       });
  
 /*
 * ELIMINAR USUARIO
  */

    $('#btnEliminarusuario').click(function(){

        var id_usr = $( "#id_usuario_eliminar").val();

          $.ajax({
                url: 'eliminar_usuario',                               
                data: {
                    id_usuario: id_usr,                                           
                                        
                },                  
                success: function (result) {                    
                    
                     var respuesta = $.parseJSON(result);
                     $("#tr_"+id_usr).fadeOut( "slow" );  
                     //alert(respuesta);
                     //$("#div_especialidad").fadeOut( "slow" ); 
                     $("#modal-eliminar").modal('toggle');
                                       
              }
            });
               

      }); 
/*
* MODIFICAR USUARIO
 */
    $('#formModificarUsuario').submit(function(e){
                
                
                $.ajax({
                url: 'modificar_usuario',                               
                data: {                    

                    cuenta_m: $('#cuenta_m').val(),   
                    nombre_usuario_modif: $('#nombre_usuario_modif').val(),   
                    ape_usuario_modif: $('#ape_usuario_modif').val(),                    
                    correo_modif: $('#correo_modif').val(),                    
                    pass1_m: $( "#pass1_m" ).val(),    
                    pass2_m: $( "#pass2_m" ).val(),    
                    id_rol_m: $( "#id_rol_m option:selected" ).val(),  
                    id_usuario: $( "#id_usuario_modif" ).val()                                                                       
                    
                },                  
                success: function (result) {                    
                    //alert(result);
                     var valor = $.parseJSON(result);
                    if(valor[0]== false){
                        $("#ci_msj_block_txt_modif").html(valor[1]); 
                    }
                    else{                        
                        $('#formUsuarios').submit();                    
                        $("#modal-modificar-usuario").modal('toggle');                   
                    }                  
               }         
                   
                
            }); 

          return false;        
     
       });


    $('#btnNuevo').click(function(){                
                $("#ci_msj_block_txt").text("");  
               
                $("#modal-nuevo-usuario").modal('toggle');       
     
       }); 


 });

  function editarUsuario(id){  

    $("#modal-modificar-usuario").modal('toggle'); 
    $('#formModificarUsuario').trigger("reset");     

    $.ajax({
                url: 'buscar_usuario_bd',                               
                data: {
                    id_usuario: id                    
                },                  
                success: function (result) {                    
                    var res = $.parseJSON(result);

                    var usuario = res[0];                       
                                              
                    $('#cuenta_m').val(usuario.cuenta);
                    $('#id_usuario_modif').val(usuario.id);
                    $('#nombre_usuario_modif').val(usuario.nombre);
                    $('#ape_usuario_modif').val(usuario.apellido);                
                    $('#correo_modif').val(usuario.correo);                
                    $("#id_rol_m").val(usuario.id_rol).change(); 

                }
            });   
  }


</script>


</body>
</html>
