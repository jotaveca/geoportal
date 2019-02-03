  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Escritorio
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Escritorio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
           <!-- Main row -->
      <div class="row">

      <input type="hidden" id="tx_indicador" value="<?php echo $this->session->userdata('tx_indicador') ?>">


               <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <div class="box box-primary">
                <div class="box-header">
             <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="8000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                  <li data-target="#myCarousel" data-slide-to="4"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                 <div class="item active">
                    <img src="<?php echo base_url(); ?>assets/img/roagro1.jpeg" alt="">

                  </div> 
                    <div class="item">
                    <img src="<?php echo base_url(); ?>assets/img/roagro2.jpeg" alt="">

                  </div> 
                    
                 <div class="item">
                    <img src="<?php echo base_url(); ?>assets/img/roagro3.jpeg" alt="">

                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url(); ?>assets/img/roagro4.jpeg" alt="">

                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url(); ?>assets/img/roagro5.jpeg" alt="">

                  </div>

                                   
                  
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              </div>
           </div>
           
           
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Geoportal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                       
	          
	       
              <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/geo/index">
                <i class="fa fa-map"></i> Ir al mapa
              </a>
          
             
                      
                               
            </div>
            <!-- /.box-body -->
             <div class="box-footer text-center" style="">
             &nbsp;
            </div>
          </div>
           
           
           
        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
         <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
           
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Información</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> ¿Qué es ROAGRO?</strong>

              <p class="text-muted" align="justify">
               Es un sistema web online de registro de organizaciones agropecuarias <b>(ROAGRO)</b>, de potente interfaz visual que nos permite geolocalizar y almacenar información importante de las organizaciones agropecuarias a nivel nacional.
               <br>
               <br>
<b>ROAGRO</b> es respaldado por una potente base de datos, los cuales almacenan información de libre acceso de las organizaciones agropecuarias y mediante el uso de tecnología OpenStreetMap es posible geolocalizar su ámbito de acción en el territorio peruano; esto nos permite poner a disposición información importante para la toma de decisiones. 
               <br>
               <br>
<b>ROAGRO</b> dispone su uso gratuito a organizaciones de productores agropecuarios a fin de poder generar una plataforma de información, la misma que pueden ser utilizados por instituciones públicas, privadas y organismos de cooperación internacional.



                
                <?php //print_r($google); ?>
              </p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          

          
          
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Noticias recientes</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>assets/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nuevos centros poblados <span class="label label-warning pull-right">Nuevo</span></a>
                    <span class="product-description">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>assets/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nueva asociación <span class="label label-info pull-right">Nuevo</span></a>
                    <span class="product-description">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>assets/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nuevas cooperativa <span class="label label-danger pull-right">Nuevo</span></a>
                    <span class="product-description">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url(); ?>assets/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nuevo usuario  <span class="label label-success pull-right">Nuevo</span></a>
                    <span class="product-description">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center" style="">
              <a href="javascript:void(0)" class="uppercase">Ver todas las noticias</a>
            </div>
            <!-- /.box-footer -->
          </div>
          
          
          
           
           
        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- ChartJS 2.0.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/Chart.js-2.0/dist/Chart.bundle.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>





