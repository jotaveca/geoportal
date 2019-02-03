<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Acceder ROAGRO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css"> 

<style>
body {
background: url("<?php echo base_url(); ?>assets/img/img-trigo-peru.jpg");
background-size:100%;
background-repeat: no-repeat;
width: 100%;
height: auto;
}
</style>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body scroll="no" style="overflow: hidden; top:0px;
padding-top:0;
margin:auto; position:relative;
width:50%;
height:100%;" >
<div class="login-box">
  <div class="login-logo">
    <b>Inicio</b> de Sesión
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    
      <p class="login-box-msg"> <br>&nbsp; <?php echo @$mensaje ?></p>

    <?php echo form_open('login/validar');  ?>
      <div class="form-group has-feedback">
        <input id="tx_indicador" name="tx_indicador" type="text" class="form-control" placeholder="Cuenta" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="tx_contrasena" name="tx_contrasena" type="password" class="form-control" placeholder="Contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
     <?php echo form_close();   ?>  

    <div class="social-auth-links text-center">
      <p>- O -</p>      
      <a href="<?php echo $authUrl;?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Ingrese usando Google+</a>
    </div>
    <!--   <div class="social-auth-links text-left">                   
            <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/geo/index">
                <i class="fa fa-map"></i> Ir al mapa
            </a>
        </div>
    -->  
     <div class="social-auth-links text-center">     
      <a href="<?php echo base_url(); ?>index.php/geo/index" class="btn btn-block btn-social btn-dropbox"><i class="fa fa-map"></i> Volver al mapa</a>
    </div>
      
       
    <!-- /.social-auth-links -->    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>