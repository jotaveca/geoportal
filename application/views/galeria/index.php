  <!-- Modal ELIMINAR -->
  <div class="modal fade" id="modal-nueva-imagen" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva imagen</h4>
        </div>
        <div class="modal-body">          
                           
       
	<?php echo form_open_multipart('galeria/do_upload');?>

        <div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo">Titulo de la imagen</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre de la imagen">
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-sm-12">
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="userfile" />
				</div>
			</div>

		</div>




           

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btnGuardarImg" class="btn btn-primary" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Enviando datos..." >Guardar</button> 
        </div>

</form>


      </div>
    </div>
  </div>






<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Galería de fotos        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-stethoscope"></i> Escritorio</a></li>
        <li class="active">Galería</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       

    <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Galería de fotos.</h3>
             <button type="button" id="addImg" name="addImg" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
           <?php if ($this->session->flashdata('error') ){ ?>
    <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i>Advertencia</h4>
                <?php echo $this->session->flashdata('error'); ?>
              </div>
    <?php } ?>






                   <div class="row">

      <?php foreach ($galerias as $galeria): ?>

      <div class="col-sm-4 col-md-4">
        <div class="thumbnail">

          <a class="fancybox-effects-a" href="<?php echo base_url('upload/'.$galeria->imagen); ?>" data-fancybox-group="gallery" title="<?php echo $galeria->titulo; ?>" >
            <img src="<?php echo base_url('upload/tumb_'.$galeria->imagen); ?>" class="img img-responsive" />
          </a>

          <div class="caption">
            
            <p class="text-center"><?php echo $galeria->titulo; ?></p>
            <?php echo form_open('galeria/delete');?>
<input type="hidden" name="id_imagen" value="<?php echo $galeria->id; ?>">

 
<button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> Eliminar</button>
 </form>        
          </div>

        </div>

      </div>
    <?php endforeach; ?>
  </div>

       
              

             </div>

              <div class="box-footer">
                                
              </div>
           
          </div>
          
          
                      
              
              
        
    
    
    
 </section>
 

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>


	<?php echo link_tag('assets/font-awesome/css/font-awesome.min.css'); ?>

	<script src="<?php echo base_url("assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"); ?>"></script>

	<script src="<?php echo base_url("assets/fancybox/source/jquery.fancybox.js?v=2.1.5"); ?>"></script>
	<?php echo link_tag('assets/fancybox/source/jquery.fancybox.css?v=2.1.5'); ?>

	<script src="<?php echo base_url("assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"); ?>"></script>
	<?php echo link_tag('assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5'); ?>

	<script src="<?php echo base_url("assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"); ?>"></script>
	<?php echo link_tag('assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7'); ?>

	<script src="<?php echo base_url("assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"); ?>"></script>



<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>



<script type="text/javascript">
		$(document).ready(function() {

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






		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>




</body>
</html>
