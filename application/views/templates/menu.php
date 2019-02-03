 
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- IMAGEN USUARIO AUTENTICADO -->
     <?php 
      if ( $this->session->userdata('autenticado') == '1') { ?>
      
      <div class="user-panel">
        <div class="pull-left image">    
          <?php 

             		$src =$this->session->userdata("picture_url");         

              ?>	
                     
        <img src="<?php echo $src ?>" class="img-circle" alt="User Image"> 
        </div>
        <div class="pull-left info">
          <p> <?php echo $this->session->userdata('nombreApellido') ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>
     
     <?php  }
      ?>

     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú principal</li>      

          
         
          <li><a  href="<?php echo base_url(); ?>index.php/escritorio/index" ><i class="fa fa-home"></i> <span>Escritorio</span></a></li>     
          
           
         
          
          <li class="<?php echo @$geoportal ?> treeview menu-open"><a href=""><i class="fa fa-map-o"></i> <span>Geoportal</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu" >
            
           <li class="<?php echo @$geoindex ?>">
                <a href="<?php echo base_url(); ?>index.php/geo/index"><i class="fa fa-circle-o"></i> Geoportal</a>
            </li> 
            
              

          </ul>
          </li>          
             
          
       <?php

          if (
                  ($this->session->userdata('id_rol') == '1' ||
                  $this->session->userdata('id_rol') == '3' )
                  && $this->session->userdata('autenticado') == '1') { ?>
                  
                   <!-- <li class="<?php echo @$proyecto ?> treeview menu-open">
                   <a href=""><i class="fa fa-folder-o"></i> <span>Proyectos</span>

                      <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>

                   </a>

                   <ul class="treeview-menu" >
                    
                     <li class="<?php echo @$proyecto_listar ?>"><a href="<?php echo base_url(); ?>index.php/proyecto/list"><i class="fa fa-circle-o"></i> Mis proyectos </a>		 
                  </li>            
                   </ul>
                   </li> -->
        
            
            
            <li class="<?php echo @$asociacion ?> treeview menu-open">
                   <a href=""><i class="fa fa-folder-o"></i> <span>Asociación / Cooperativa</span>

                      <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>

                   </a>

                   <ul class="treeview-menu" >
                    
                     <li class="<?php echo @$asociacion_listar ?>"><a href="<?php echo base_url(); ?>index.php/asociacion/list"><i class="fa fa-circle-o"></i> Mi Asociación / Cooperativa </a>		 
                  </li>            
                   </ul>
                   </li>
       
       
       
       
       <?php }
       if ($this->session->userdata('id_rol') == '3'  && $this->session->userdata('autenticado') == '1') {  ?>

          <li class="<?php echo @$admin ?> treeview menu-open"><a href=""><i class="fa fa-gears"></i> <span>Administración</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu" >
            
            <li class="<?php echo @$adm_usuarios ?>">
                <a href="<?php echo base_url(); ?>index.php/admin/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a>
            </li> 
            <li class="<?php echo @$adm_descargas ?>">
                <a href="<?php echo base_url(); ?>index.php/descargas/list"><i class="fa fa-circle-o"></i> Descargas</a>
            </li> 
         
          </ul>
          </li>
       
       
       <?php  } ?>

      <li><a  href="<?php echo base_url(); ?>index.php/contacto/index" ><i class="fa fa-info-circle"></i> <span>Contáctenos</span></a></li>    

       
     <?php
     if ( $this->session->userdata('autenticado') == '1') {        
       ?>             
            
        <li class="header">Acciones</li>        
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/cerrarsesion"><i class="fa fa-circle-o text-red"></i> <span>Cerrar sesión</span></a>
        </li>
       <?php } 
       else{
        ?>
           <li class="header">Acciones</li>        
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/index"><i class="fa fa-circle-o text-red"></i> <span>Iniciar sesión</span></a>
        </li>
       <?php 
       
       }
       
       ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>