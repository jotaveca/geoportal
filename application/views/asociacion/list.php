<!-- Modal ELIMINAR -->
  <div class="modal fade" id="modal-exportar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Exportar proyecto</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_proyecto_exportar" type="hidden"> 
              <p>¿Está seguro que desea exportar el proyecto <span id="nb_proyecto_exportar"></span> a formato Excel?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnExportarProyecto" class="btn btn-primary">Exportar</button> 
        </div>
      </div>
    </div>
  </div>
  
  

<!-- Modal ELIMINAR -->
  <div class="modal fade" id="modal-eliminar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar proyecto</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_proyecto_eliminar" type="hidden"> 
              <p>¿Está seguro que desea eliminar el proyecto <span id="nb_proyecto_eliminar"></span>?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnEliminarProyecto" class="btn btn-primary">Eliminar</button> 
        </div>
      </div>
    </div>
  </div>


<!-- Modal EDITAR -->
  <div class="modal fade" id="modal-editar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar proyecto</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_proyecto_editar" type="hidden"> 
              <p>¿Está seguro que desea editar el proyecto <span id="nb_proyecto_editar"></span>?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnEditarProyecto" class="btn btn-primary">Editar</button> 
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal EDITAR -->
  <div class="modal fade" id="modal-ver" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ver proyecto en el mapa</h4>
        </div>
        <div class="modal-body">          
                           
              <input id="id_proyecto_ver" type="hidden"> 
              <p>¿Está seguro que desea ver el proyecto <span id="nb_proyecto_ver"></span> en el mapa?</p>                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnVerProyecto" class="btn btn-primary">Ir al mapa</button> 
        </div>
      </div>
    </div>
  </div>




  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de sociedades / cooperativas
        <small>Nueva</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-stethoscope"></i> Escritorio</a></li>
        <li class="active">Sociedades / Cooperativas</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php //var_dump($centros_poblados); ?>

    <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Sociedades / Cooperativas </h3> <button id="btnNuevo"  type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo  </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tbl_usuarios" class="table table-bordered table-striped"> 
                <thead>
                <tr>
                  <th>#</th>
                  <th>Razón Social</th>
                  <th>Nombre Comercial</th>                                                
                  <th>Tipo</th>                                                                          
                  <th>Fecha registro</th>                  
                  <th>Acción</th>
                </tr>
                </thead>
               <tbody>
             <?php for($i=0;$i<count($proyectos);$i++){ 

              $fe_registro = Date_create($proyectos[$i]['fe_registro']);
              $fe_registro_n = Date_format($fe_registro, "d/m/Y");

              ?>
             <tr id="tr_<?php echo  $proyectos[$i]['id'] ?>">
             <td><?php echo $i+1 ?></td>
             <td><?php echo $proyectos[$i]['tx_razon'] ?></td>
             <td><?php echo $proyectos[$i]['tx_nombre'] ?></td>
             <td><?php echo $proyectos[$i]['tx_tipo'] ?></td>
             <td><?php echo $fe_registro_n ?></td>             
             
             <td>  
                <div class='btn-group'>                  
                  
                   <button type='button' data-nombre="<?php echo  $proyectos[$i]['tx_nombre'] ?>" data-proyecto-id="<?php echo  $proyectos[$i]['id'] ?>" data-toggle="modal" data-target="#modal-ver" class='btn btn-dafault'><i class='fa fa-eye'></i></button>                     
                   <button type='button' data-nombre="<?php echo  $proyectos[$i]['tx_nombre'] ?>" data-proyecto-id="<?php echo  $proyectos[$i]['id'] ?>" data-toggle="modal" data-target="#modal-editar" class='btn btn-primary'><i class='fa fa-edit'></i></button>                     
                   <button type='button' data-nombre="<?php echo  $proyectos[$i]['tx_nombre'] ?>" data-proyecto-id="<?php echo  $proyectos[$i]['id'] ?>" data-toggle="modal" data-target="#modal-exportar" class='btn btn-success'><i class='fa fa-file-excel-o'></i></button>                     
                   <button type='button' data-nombre="<?php echo  $proyectos[$i]['tx_nombre'] ?>" data-proyecto-id="<?php echo  $proyectos[$i]['id'] ?>" data-toggle="modal" data-target="#modal-eliminar" class='btn btn-danger'><i class='fa fa-remove'></i></button>                     
                </div>
              </td>
             </tr>

             <?php } ?>
             </tbody>
                <tfoot>
                <tr>
                <th>#</th>
                  <th>Razón Social</th>
                  <th>Nombre Comercial</th>                                                
                  <th>Tipo</th>                                                                          
                  <th>Fecha registro</th>                  
                  <th>Acción</th>                                                        
                  
                </tr>
                </tfoot>
              </table>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
            { width: '5%', targets: 0, width: '15%', targets: 5 }
        ],
        fixedColumns: true,
        "language": {
            "url": "<?php echo base_url(); ?>assets/plugins/datatables.net-bs/datatables_spanish.json"
        }
    });

    $('#modal-eliminar').on('show.bs.modal', function(e) {
        var id_proyecto = $(e.relatedTarget).data('proyecto-id');
        var nb_proyecto = $(e.relatedTarget).data('nombre');
        //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
        $('#id_proyecto_eliminar').val(id_proyecto);
        $('#nb_proyecto_eliminar').html("<b>"+nb_proyecto+"</b>");

});

    $('#modal-editar').on('show.bs.modal', function(e) {
        var id_proyecto = $(e.relatedTarget).data('proyecto-id');
        var nb_proyecto = $(e.relatedTarget).data('nombre');
        //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
        $('#id_proyecto_editar').val(id_proyecto);
        $('#nb_proyecto_editar').html("<b>"+nb_proyecto+"</b>");

  });
  
      $('#modal-ver').on('show.bs.modal', function(e) {
        var id_proyecto = $(e.relatedTarget).data('proyecto-id');
        var nb_proyecto = $(e.relatedTarget).data('nombre');
        //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
        $('#id_proyecto_ver').val(id_proyecto);
        $('#nb_proyecto_ver').html("<b>"+nb_proyecto+"</b>");

  });
  
   $('#modal-exportar').on('show.bs.modal', function(e) {
        var id_proyecto = $(e.relatedTarget).data('proyecto-id');
        var nb_proyecto = $(e.relatedTarget).data('nombre');
        //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
        $('#id_proyecto_exportar').val(id_proyecto);
        $('#nb_proyecto_exportar').html("<b>"+nb_proyecto+"</b>");

  });


     

 /*
 * ELIMINAR USUARIO
  */

    $('#btnEliminarProyecto').click(function(){

        var base_url = '<?php echo site_url() ?>'; 
        var id_proyecto= $( "#id_proyecto_eliminar").val();

          $.ajax({
                url: base_url+'/asociacion/eliminar',                   
                data: {
                    id_proyecto: id_proyecto,                                           
                                        
                },                  
                success: function (result) {                    
                    
                     var respuesta = $.parseJSON(result);

                     $("#tr_"+id_proyecto).fadeOut( "slow" );  

                     //alert(respuesta);
                     //$("#div_especialidad").fadeOut( "slow" );  

                     $("#modal-eliminar").modal('toggle');



                                       

              }
            });
               

      });
      
       /*
 * EDITAR USUARIO
  */

    
    
    $('#btnVerProyecto').click(function(){

        
        var id_proyecto= $( "#id_proyecto_ver").val();
        //location.href= base_url+'/proyecto/edit?id_proyecto=id_proyecto";  
        location.href= "<?php echo base_url(); ?>index.php/geo/ver?id_asociacion="+id_proyecto;

      }); 
      
    $('#btnEditarProyecto').click(function(){

        
        var id_proyecto= $( "#id_proyecto_editar").val();
        //location.href= base_url+'/proyecto/edit?id_proyecto=id_proyecto";  
        location.href= "<?php echo base_url(); ?>index.php/asociacion/edit?id_proyecto="+id_proyecto;

      }); 
      
    $('#btnExportarProyecto').click(function(){

        
        var id_proyecto= $( "#id_proyecto_exportar").val();
        //location.href= base_url+'/proyecto/edit?id_proyecto=id_proyecto";  
        location.href= "<?php echo base_url(); ?>index.php/asociacion/exportar_excel?id_proyecto="+id_proyecto;
        $("#modal-exportar").modal('toggle');

      }); 



    $('#btnNuevo').click(function(){
                
               
            
            location.href= "<?php echo base_url(); ?>index.php/asociacion/new";


        
     
       });


 


 });




</script>


</body>
</html>
