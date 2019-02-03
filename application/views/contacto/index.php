  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contáctenos        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-stethoscope"></i> Escritorio</a></li>
        <li class="active">Contáctenos</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php //var_dump($centros_poblados); ?>

    <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Por favor indique su información personal y nuestro equipo de trabajo lo contactará.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
           
           <div class="box ">
            <div class="box-header ">
            <?php if(!empty($status)){ ?>
    		<div class="status <?php echo $status['type']; ?>"><?php echo $status['msg']; ?></div>
    	    <?php } ?>
    
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
              <div class="row">
              
              <form action="enviar" method="POST" name="FContacto">
              
               <div class="col-md-6">
                         
               
               <div class="form-group">
                  <label >Nombre</label>
                  <input type="text"  name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" class="form-control" placeholder="Ingrese nombre y apellido">
                   <?php echo form_error('name','<p class="field-error">','</p>'); ?>
                </div>
                
                 <div class="form-group">
                  <label >Asunto</label>
                  <input type="text"  name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" class="form-control" placeholder="Ingrese asunto del correo electrónico">
                  <?php echo form_error('email','<p class="field-error">','</p>'); ?>
                </div>
                
              
               </div>
                <div class="col-md-6">
                
                
                <div class="form-group">
                  <label >Correo electrónico</label>
                  <input type="email" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="Ingrese su correo electrónico">
                   <?php echo form_error('subject','<p class="field-error">','</p>'); ?>
                </div>
                
                <div class="form-group">
                  <label>Mensaje</label>
                  <textarea  name="message" class="form-control" rows="3" placeholder="Ingrese mensaje ..."> <?php echo !empty($postData['message'])?$postData['message']:''; ?> </textarea>
                   <?php echo form_error('message','<p class="field-error">','</p>'); ?>
                </div>
                
              
               </div>
              
              
              </div>
              
                            
              <div class="g-recaptcha" data-sitekey="6Le_mGsUAAAAAAdkMXNtNCMy3Cga3fYI9QSLS-D6" data-callback="onSubmit" ></div> 
             
            
	      <INPUT type="hidden" id="captcha" name="captcha" value="">

 
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="contactSubmit" class="btn btn-primary pull-right">Enviar</button>                
              </div>
            </form>
          </div>
          
          
                      
              
              
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


        function onSubmit() {
        
            $('#captcha').val($('#g-recaptcha-response').val() );
            
            
        }
 

</script>


</body>
</html>
