
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de proyectos
        <small>Nueva</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-stethoscope"></i> Escritorio</a></li>
        <li class="active">Descargas</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php //var_dump($centros_poblados); ?>

    <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Monitor de descargas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tbl_descargas" class="table table-bordered table-striped"> 
                <thead>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>N° Descargas</th>                                  
                 
                </tr>
                </thead>
               <tbody>
             <?php for($i=0;$i<count($descargas);$i++){ 

              ?>
             <tr >
             <td><?php echo $i+1 ?></td>
             <td><?php echo $descargas[$i]['nb_usuario'] ?></td>
             <td><?php echo $descargas[$i]['nb_rol'] ?></td>
             <td><?php echo $descargas[$i]['total_descargas'] ?></td>                      
             
            
             </tr>

             <?php } ?>
             </tbody>
                <tfoot>
                <tr>
                 <th>#</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>N° Descargas</th>  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    
    
    
 </section>
 

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

    $('#tbl_descargas').DataTable({
        /* columnDefs: [
            { width: '5%', targets: 0, width: '20%', targets: 6 }
        ],*/
        fixedColumns: true,
        "language": {
            "url": "<?php echo base_url(); ?>assets/plugins/datatables.net-bs/datatables_spanish.json"
        }
    });








 


 });




</script>


</body>
</html>
