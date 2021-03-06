<?php
  $iglesias_array = [];
  $iglesias_array = $iglesias;
	
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
  IEANJESUS v2.0
  </title>
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />


  
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/chosen.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    #map {
      height: 400px;
      
    }
    .zoom:hover {
        transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
    
    .small-box .datos_iglesia{
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        /* transition: all .3s linear; */
        position: absolute;
        top: 11px;
        right: 80px;
        z-index: 0;
        font-size: 90px;

}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <input type="hidden" name="baseurl" id="baseurl" class="form-control" value="<?php echo base_url(); ?>">
<div class="wrapper">

  <?php echo $menu_superior;?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>uploads/foto_pastor/<?php echo $infouser['foto']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($infouser['nombre_completo'])  ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>dashboard/users"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
                <li><a href="<?php echo base_url();?>dashboard/pastores"><i class="fa fa-users"></i> <span>Pastores</span></a></li>
                <li><a href="<?php echo base_url();?>dashboard/congregaciones"><i class="fa fa-university"></i> <span>Congregaciones</span></a></li>
                <li><a href="<?php echo base_url();?>dashboard/actas"><i class="fa fa-book"></i> <span>Actas</span></a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Iglesia local</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Opciones de diseño</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>/dashboard/echart1"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Panel control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_congregacion->total;?></h3>
              <p>Total general</p>
            </div>
            <div class="datos_iglesia">
                <h6><b>Hombres:</b> <?php echo $total_congregacion_hombres->total;?></h6>
                <h6><b>Mujeres:</b> <?php echo $total_congregacion_mujeres->total;?></h6>
               </div>
              

                       
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>dashboard/echart_membresia" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $porcentaje; ?><sup style="font-size: 20px">%</sup></h3>

              <p><?php echo $nombre_iglesia; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>dashboard/echart" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count($users->result_array()); ?></h3>
              
              
              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/dashboard/users" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($pastores->result_array()); ?></h3>

              <p>Pastores Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url(); ?>dashboard/pastores" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
	  
       <?php echo  $page;?>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 IEANJESUS.</strong> Derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Actividad reciente</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a >
			<?php 
			echo  '<i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Hoy cumplen años</h4>';
			foreach ($cumpleaneros as $row) 
			{ 
			    $foto_pastor = explode("/", $row->foto_pastor);
			    $foto_pastor_parse = end($foto_pastor);
			    $img = "<img src='".base_url()."uploads/foto_pastor/".$foto_pastor_parse."' width='90px;'/>";
				echo '<p data-toggle="tooltip" title="'.$img.'">' .$row->nombres_completos . '</p>';
			
			
			} 
		
			echo '</div>' ; ?>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading"><?php echo $infouser['nombre_completo'] ; ?> actualizó su perfil</h4>

                <p>Nuevo teléfono +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora fue agregada a la lista de mails</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Se ejecutaron 254 tareas</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Barra de progreso</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Diseño personalizable
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Actualizar resumen
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Integración Laravel 
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Tabla contenido estadístico</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configuración general</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Panel de reporte
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Alguna información de configuración de opciones.
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
             Otras opciones disponibles
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
             Exposición nombre de autor en post
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
             Permitir al usuario mostrar su nombre en post
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Mostrarme en línea
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Desactivar notificaciones
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Eliminar historial del chat
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  <script src="<?php echo base_url(); ?>vendor/dist/js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/js//chosen.jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/js//prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/js/init.js" type="text/javascript" charset="utf-8"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>vendor/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>vendor/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>vendor/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->


<!-- Sparkline -->

<script src="<?php echo base_url(); ?>vendor/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->

<script src="<?php echo base_url(); ?>vendor/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="<?php echo base_url(); ?>vendor/bower_components/moment/min/moment.min.js"></script>

<script src="<?php echo base_url(); ?>vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->

<script src="<?php echo base_url(); ?>vendor/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>



<!-- Slimscroll -->

<script src="<?php echo base_url(); ?>vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<script src="<?php echo base_url(); ?>vendor/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>vendor/dist/js/adminlte.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?php echo base_url(); ?>vendor/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>vendor/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url(); ?>vendor/dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

<!-- Notificaciones -->
<script src="<?php echo base_url(); ?>vendor/dist/js/notifications.js"></script>

<script>
function initMap(){
  
  var base = $('#baseurl').val(); 
  console.log(base);
  loc = [];

  $.ajax({
    url: base + "ajax/iglesias",
    type: 'get',
    dataType: 'json',
    success: function(data){
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: new google.maps.LatLng(-2.0000000, -77.5000000),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      var infowindow = new google.maps.InfoWindow();

      var marker, i;

      for (var i = 0; i < data.iglesias.length; i++) {
        
        loc[i]= [data.iglesias[i]['direccion'], parseFloat(data.iglesias[i]['latitud']), parseFloat(data.iglesias[i]['longitud']), i+1 ];
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(parseFloat(data.iglesias[i]['latitud']), parseFloat(data.iglesias[i]['longitud'])),
          map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent("<b>"+data.iglesias[i]['congregacion']+"</b><br><small>"+data.iglesias[i]['direccion']+"</small>");
            infowindow.open(map, marker);
          }
        })(marker, i));
      }

     

    }
  });
   
  
  
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL2EQGNcyxUPgYgV4y9wxinlZuz7zL2Ms&callback=initMap" async defer></script>
<script>


  var base = $('#baseurl').val();
var appMap = new Vue({
    el:'#app-map',
    data:{
      searchWord:"",
      arrayIglesias: [],
      arraySearch: [],
      showItemMapOfServer: true,
      styleShowItemMap:"",
     
    },
    created: function(){
      
      this.ajaxGetIglesias();
    },
    methods:{
      ajaxGetIglesias: function(){
        $.ajax({
          url: base + "ajax/iglesias",
          type: 'get',
          dataType: 'json',
          success: function(data){
            appMap.arrayIglesias = data.iglesias;
          }
        });
      },
      onKeyupSearch: function(){
        this.arraySearch = [];
        if(this.searchWord!=""){
          
          this.showItemMapOfServer = false;
          this.styleShowItemMap = "display:block";

          for(var i=0; i<appMap.arrayIglesias.length; i++){
            var palabra1=appMap.arrayIglesias[i]['congregacion'].toLowerCase();
            var palabra2=this.searchWord.toLowerCase();
            if(palabra1.search(palabra2) != -1){
              this.arraySearch.push(appMap.arrayIglesias[i]);
            }
          }

          
        }
        else{
          this.showItemMapOfServer = true;
          this.styleShowItemMap = "display:none";
        }
        
      },
      onClickShowMapa: function(id){
        

        for (var i = 0; i < appMap.arrayIglesias.length; i++) {
          if(appMap.arrayIglesias[i]['id']==id){
            var array = [];
            array = appMap.arrayIglesias[i];
          }
          
        }

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(array['latitud'], array['longitud']),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

        marker = new google.maps.Marker({
              position: new google.maps.LatLng(array['latitud'], array['longitud']),
              map: map
            });
        
        var infowindow = new google.maps.InfoWindow()

          infowindow.setContent('<b>'+array['congregacion']+'</b><br><small>'+array['direccion']+'</small>');
          infowindow.open(map, marker);
        
      }
    }
  });
</script>
<script language="JavaScript"  type="text/javascript">

$(document).ready(function (){
    var table = $('#users').DataTable({
        language: {
            "emptyTable":     "No hay datos disponibles en esta tabla.",
            "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ registros.",
            "infoEmpty":      "Mostrando 0 a 0 de 0 registros.",
            "lengthMenu":     "Muestra _MENU_ registros.",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar: ",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
            
        },
        ajax: {
            url:"http://test.ieanjesusoficial.org/api/get_users",
            type:"GET"},
        deferRender: true,
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
        "targets": 0,
        "data": null,
        "defaultContent": "<button type='button' id='edituser' class='btn btn-warning btn-flat btn-xs'> <span class='fa fa-edit'></span> </button><button type='button'  id='deleteuser' class='btn btn-danger btn-flat btn-xs'> <span class='fa fa-trash-o'></span></button>"
    } ],
        order: [ 1, 'asc' ],
        lengthMenu: [ 5,10, 25, 50, 75, 100 ],
        pageLength: 5
 
    });

 $('#users tbody').on( 'click', '#edituser',
 
        function () {
        var data = table.row( $(this).parents('tr') ).data();
        post('/dashboard/modificar_usuario/', {id: data[ 1 ]});

    } );
 $('#users tbody').on( 'click', '#deleteuser',
 
        function () {
        var data = table.row( $(this).parents('tr') ).data();
        var txt;
        if (confirm("¿Seguro desea eliminar a "+data[2]+ "?")) {
             window.location.replace("/api/eliminar_usuario/"+data[ 1 ]);
        } else {
           
        }
        
    } );
    
    
   function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

});
</script>
<script language="JavaScript"  type="text/javascript">
$(document).ready(function (){
    var table = $('#pastores').DataTable({
        language: {
            "emptyTable":     "No hay datos disponibles en esta tabla.",
            "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ registros.",
            "infoEmpty":      "Mostrando 0 a 0 de 0 registros.",
            "lengthMenu":     "Muestra _MENU_ registros.",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar: ",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
            
        },
        ajax: {
            url:"http://test.ieanjesusoficial.org/api/get_pastores",
            type:"GET"},
        deferRender: true,
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
        "targets": 0,
        "data": null,
        "defaultContent": '<div class="dropdown"><button class="btn btn-warning btn-sm btn-flat dropdown-toggle" type="button" data-toggle="dropdown">Opciones<span class="caret"></span></button><ul class="dropdown-menu"> <li><a href="#"  id="editar_pastor"  data-toggle="modal" data-target="#editar_pastor"  title="Pastor"><i class="fa fa-edit"></i>Ver/Editar</a></li>     <li><a href="#"  data-toggle="modal" data-target="#estado_pastor" id="estado_pastor" title="Pastor"><i class="fa fa-trash"></i> Cambiar estado</a></li> <li><a href="#" data-toggle="modal"  id="cambiar_foto_pastor" data-target="#cambiar_foto_pastor" title="Pastor"><i class="glyphicon glyphicon-picture"></i>Cambiar foto</a> </li><li><a href="#"data-toggle="modal" data-target="#congregacion_pastor"  id="asignar_congregacion_pastor" title="Pastor"><i class="fa fa-exchange"></i>Asignar congregación</a></li> <li><a href="#" data-toggle="modal" data-target="#historial_pastor" title="Pastor"><i class="fa fa-vcard-o"></i>Historial</a></li> </ul></div>'
        }
            
          ],
        order: [ 1, 'asc' ],
        lengthMenu: [ 5,10, 25, 50, 75, 100 ],
        pageLength: 5
    });
    
    
 $('#pastores tbody').on( 'click', '#estado_pastor',
 
        function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("id_pastor").value =  data[1];
    } );  
    
 $('#pastores tbody').on( 'click', '#cambiar_foto_pastor',
 
        function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("id_pastor_foto").value =  data[1];
    } );   
 $('#pastores tbody').on( 'click', '#asignar_congregacion_pastor',
 
        function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("id_pastor_congregacion").value =  data[1];
    } );    
    
var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
};    
 $('#pastores tbody').on( 'click', '#editar_pastor',
 
        function () {
        var data = table.row( $(this).parents('tr') ).data();
        getJSON('/api/get_pastor/'+data[1],
        function(err, data) {
          if (err !== null) {
            alert('Hubo un error al obtener los datos del pastor: ' + err);
          } else {
             document.getElementById('modificar_id_pastor').value=data[0].id;
            document.getElementById('modificar_cedula_pastor').value=data[0].cedula;
            document.getElementById('modificar_nombre_pastor').value=data[0].nombre_pastor;
            document.getElementById('modificar_apellido_pastor').value=data[0].apellido_pastor;
            document.getElementById('modificar_fecha_nacimiento_pastor').value=data[0].fecha_nacimiento;
            document.getElementById('modificar_celular_pastor').value=data[0].celular;
            document.getElementById('modificar_titulo_pastor').value=data[0].titulo;
            if (typeof data[0].cargo != 'undefined'){
                document.getElementById('modificar_cargo_pastor').value=data[0].cargo;
                document.getElementById('modificar_cargo_pastor').text=data[0].cargo;
            }
            if (typeof data[0].licencia != 'undefined'){
                document.getElementById('modificar_licencia_pastor').value=data[0].licencia;
                document.getElementById('modificar_licencia_pastor').text=data[0].licencia;
            }
            if (typeof data[0].zona != 'undefined'){
                document.getElementById('modificar_zona_pastor').value=data[0].zona;
                document.getElementById('modificar_zona_pastor').text=data[0].zona;
            }
            if (typeof data[0].aporte_iess != 'undefined'){
            document.getElementById('modificar_aporte_iess_pastor').value=data[0].aporte_iess;
            document.getElementById('modificar_aporte_iess_pastor').text=data[0].aporte_iess;
            }
            document.getElementById('modificar_valor_iess_pastor').value=data[0].valor_iess;
            if (typeof data[0].aporte_cambia != 'undefined'){
            document.getElementById('modificar_aporte_cambia_pastor').value=data[0].aporte_cambia;
            document.getElementById('modificar_aporte_cambia_pastor').text=data[0].aporte_cambia;
            }
            document.getElementById('modificar_valor_cambia_pastor').value=data[0].valor_cambia;
            document.getElementById('modificar_observacion_pastor').value=data[0].observacion;
          }
        });
    } );        


});
</script>
<script language="JavaScript"  type="text/javascript">
$(document).ready(function (){
    var table = $('#congregaciones').DataTable({
        language: {
            "emptyTable":     "No hay datos disponibles en esta tabla.",
            "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ registros.",
            "infoEmpty":      "Mostrando 0 a 0 de 0 registros.",
            "lengthMenu":     "Muestra _MENU_ registros.",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar: ",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
            
        },
        ajax: {
            url:"http://test.ieanjesusoficial.org/api/get_congregaciones_datatable",
            type:"GET"},
        deferRender: true,
        responsive: {
            details: {
                type: 'column'
            }
        },
         columnDefs: [ {
        "targets": 0,
        "data": null,
        "defaultContent": "<button type='button' id='editcongregacion' class='btn btn-warning btn-flat btn-xs'> <span class='fa fa-edit'></span> </button><button type='button'  id='deletecongregacion' class='btn btn-danger btn-flat btn-xs'> <span class='fa fa-trash-o'></span></button>"
    } ],
        order: [ 1, 'asc' ],
        lengthMenu: [ 5,10, 25, 50, 75, 100 ],
        pageLength: 5
    });

});
</script>
<script>
  $(function () {
    $('#actas').DataTable({
        "language": {
            "emptyTable":     "No hay datos disponibles en esta tabla.",
            "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ registros.",
            "infoEmpty":      "Mostrando 0 a 0 de 0 registros.",
            "lengthMenu":     "Muestra _MENU_ registros.",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar: ",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
            
        }
    })

  })
</script>
<script  language="JavaScript"  type="text/javascript" >

$(function() {

    $( "#id_provincia" ).on( "change", function() {
        var intId=$(this).val();
        var datos = { id_provincia: intId };
        var url='http://test.ieanjesusoficial.org/api/get_canton';

        var request = $.ajax
        ({
            url: url,
            method: 'POST',
            data: datos,
            dataType: 'json'
        });

        request.done(function( respuesta ) 
        {
            if(!respuesta.hasOwnProperty('error')){
              document.getElementById('idcanton').innerHTML = "";
                $.each(respuesta, function(k, v) {
                    $('#idcanton').append('<option value="' + v.canton + '">' + v.canton + '</option>');
                    });
            }else{

             
            }
        });

        request.fail(function( jqXHR, textStatus ) 
        {
            alert( "Hubo un error: " + textStatus );
        });

    });

});

</script>
<script src="/vendor/dist/ckeditor/ckeditor.js"></script>
<script src="/vendor/dist/ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url(); ?>vendor/echarts/dist/echarts-en.js"></script>
<script>
    $('p[data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'left',
    html: true
});
    </script>
<script src="<?php echo base_url(); ?>vendor/echarts/dist/echarts-en.js"></script>
<script type="text/javascript">
var base = $('#baseurl').val(); 

$.get( base + "ajax/ajaxGetTotalMiembros", { id_congregacion: $('#idc').val() }, function(data ) {
  var myChart = echarts.init(document.getElementById('main'));
  var categorias = new Array();
  var serie = new Array();
  $.each(data, function(i, item) {
    //console.log(item.fcha_bautizo);
    //console.log(item.total);
    categorias.push(item.fcha_bautizo);
    serie.push(item.total);
  });

  option = {
    title: {
        text: $('#nombreIglesia').val(),
        subtext: 'Cantidad de miembros nuevos por año',
        x:'center'
    },
    backgroundColor: '#eee',
    // legend: {
    //     data: categorias,
    //     align: 'left',
    //     left: 10
    // },
    // toolbox: {
    //     feature: {
    //         magicType: {
    //             type: ['stack', 'tiled']
    //         },
    //         dataView: {}
    //     }
    // },
    tooltip: {},
    xAxis: {
        type: 'category',
        //data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        data: categorias
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        //data: [120, 200, 150, 80, 70, 110, 130],
        label: {
                normal: {
                    show: true,
                    position: 'inside'
                }
            },
        data: serie,
        type: 'bar'
    }]
};

        // use configuration item and data specified to show chart
        myChart.setOption(option);

}, "json" );


// $.get( base + "ajax/ajaxGetTotalMiembros", { id_congregacion: $('#idc').val() }, function(data ) {
//   var myChart = echarts.init(document.getElementById('main1'));
//   var categorias = new Array();
//   var serie = new Array();
//   $.each(data, function(i, item) {
//     //console.log(item.fcha_bautizo);
//     //console.log(item.total);
//     categorias.push(item.fcha_bautizo);
//     serie.push(item.total);
//   });
//    console.log('La longitud: '+ serie.length);
//    var porcentaje = new Array();
//   for (var i=0; i < serie.length; i++){
//     console.log(serie[i]);
//     porcentaje.push(((serie[i])/serie[i-1]).toFixed(1));
//   }
//   for (var i=0; i < porcentaje.length; i++){
//     console.log(porcentaje[i]);
//   }


//   option = {
//     title: {
//         text: $('#nombreIglesia').val(),
//         subtext: 'Crecimiento de miembros de la iglesia - Expresado en Porcentaje',
//         x:'center'
//     },
//     backgroundColor: '#eee',
//     legend: {
//         data: categorias,
//         align: 'left',
//         left: 10
//     },
//     // toolbox: {
//     //     show: true,
//     //     feature: {
//     //         dataView: {readOnly: false},
//     //         restore: {},
//     //         saveAsImage: {}
//     //     }
//     // },
//     tooltip: {},
//     xAxis: {
//         type: 'category',
//         //data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
//         data: categorias
//     },
//     yAxis: {
//         type: 'value'
//     },
//     series: [{
//         //data: [120, 200, 150, 80, 70, 110, 130],
//         label: {
//                 normal: {
//                     show: true,
//                     position: 'inside'
//               }
//             },
//         data: porcentaje,
//         type: 'bar'
//     }]
// };

//         // use configuration item and data specified to show chart
//         myChart.setOption(option);

// }, "json" );



$.get( base + "ajax/paraGraficaTotalMiembrosPorcentaje", { id_congregacion: $('#idc').val() }, function(data ) {

  var categorias = new Array();
  var serie = new Array();
  $.each(data, function(i, item) {
    categorias.push(item.name);
    serie.push(item.value);
  });
   //console.log('La longitud: '+ serie.length);
   var porcentaje = new Array();
  for (var i=0; i < serie.length; i++){
    //console.log(serie[i]);
    porcentaje.push(((serie[i])/serie[i-1]).toFixed(2));
  }


  var jsonArray = JSON.parse(JSON.stringify(categorias));
  option = {
    
    title: {
        text: $('#nombreIglesia').val(),
        subtext: 'Cantidad de miembros nuevos por año en porcentaje',
        x:'center'
    },
    backgroundColor: '#eee',
    tooltip: {},
    xAxis: {
        type: 'category',
        data: categorias
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        label: {
                normal: {
                    show: true,
                    position: 'inside'
                }
            },
        data: porcentaje,
        type: 'line'
    }]
};
var myChart = echarts.init(document.getElementById('main1'));
myChart.setOption(option);

}, "json" );


$.get( base + "ajax/paraGraficaNacionalidad", { id_congregacion: $('#idc').val() }, function(data ) {
  var myChart = echarts.init(document.getElementById('main2'));
  var categorias = new Array();
  $.each(data, function(i, item) {
    categorias.push(item.value);
  });
option = {
    title : {
        text: $('#nombreIglesia').val(),
        subtext: 'Miembros por Nacionalidad',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: categorias
    },
    series : [
        {
            name: 'Nacionalidad',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:data,           
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

        myChart.setOption(option);

}, "json" );
        //Practica


$.get( base + "ajax/paraGraficaPorEdad", { id_congregacion: $('#idc').val() }, function(data) {
  var myChart = echarts.init(document.getElementById('main3'));
  var categorias = new Array();
  var serie = new Array();
  console.log(data);
  $.each(data, function(i, item) {
    categorias.push(item.anios);
    serie.push(item.total);
  });
  console.log(categorias);
  option = {
    title: {
        text: $('#nombreIglesia').val(),
        subtext: 'Cantidad de miembros por Edad',
        x:'center'
    },
    backgroundColor: '#eee',
    // legend: {
    //     data: categorias,
    //     align: 'left',
    //     left: 10
    // },
    // toolbox: {
    //     feature: {
    //         magicType: {
    //             type: ['stack', 'tiled']
    //         },
    //         dataView: {}
    //     }
    // },
    tooltip: {},
    xAxis: {
        type: 'category',
        //data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        data: categorias
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        //data: [120, 200, 150, 80, 70, 110, 130],
        label: {
                normal: {
                    show: true,
                    position: 'inside'
                }
            },
        data: serie,
        type: 'bar'
    }]
};

        // use configuration item and data specified to show chart
        myChart.setOption(option);

}, "json" );



$.get( base + "ajax/paraGraficaGenero", { id_congregacion: $('#idc').val() }, function(data ) {
  var myChart = echarts.init(document.getElementById('main4'));
  var categorias = new Array();
  $.each(data, function(i, item) {
    categorias.push(item.value);
  });
option = {
    title : {
        text: $('#nombreIglesia').val(),
        subtext: 'Cantidad de Miembros por Genero',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: categorias
    },
    series : [
        {
            name: 'Genero',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:data,           
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

        myChart.setOption(option);

}, "json" );


$.get( base + "ajax/paraGraficaEtnia", { id_congregacion: $('#idc').val() }, function(data ) {
  var myChart = echarts.init(document.getElementById('main5'));
  var categorias = new Array();
  $.each(data, function(i, item) {
    categorias.push(item.value);
  });
option = {
    title : {
        text: $('#nombreIglesia').val(),
        subtext: 'Cantidad de Miembros por Etnia',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: categorias
    },
    series : [
        {
            name: 'Etnia',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:data,           
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

        myChart.setOption(option);

}, "json" );










$.get( base + "ajax/ajaxGetTotalMiembrosGlobal", { id_congregacion: $('#idc').val() }, function(data ) {
  var myChart = echarts.init(document.getElementById('main10'));
  var categorias = new Array();
  var serie = new Array();
  $.each(data, function(i, item) {
    //console.log(item.fcha_bautizo);
    //console.log(item.total);
    categorias.push(item.fcha_bautizo);
    serie.push(item.total);
  });

  option = {
    title: {
        text: 'IEANJESUS - ECUADOR',
        subtext: 'Cantidad de miembros nuevos por año',
        x:'center'
    },
    backgroundColor: '#eee',
    // legend: {
    //     data: categorias,
    //     align: 'left',
    //     left: 10
    // },
    // toolbox: {
    //     feature: {
    //         magicType: {
    //             type: ['stack', 'tiled']
    //         },
    //         dataView: {}
    //     }
    // },
    tooltip: {},
    xAxis: {
        type: 'category',
        //data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        data: categorias
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        //data: [120, 200, 150, 80, 70, 110, 130],
        label: {
                normal: {
                    show: true,
                    position: 'inside'
                }
            },
        data: serie,
        type: 'bar'
    }]
};

        // use configuration item and data specified to show chart
        myChart.setOption(option);

}, "json" );




$.get( base + "ajax/paraGraficaTotalMiembrosPorcentajeGlobal", { id_congregacion: $('#idc').val() }, function(data ) {

var categorias = new Array();
var serie = new Array();
$.each(data, function(i, item) {
  categorias.push(item.name);
  serie.push(item.value);
});
 //console.log('La longitud: '+ serie.length);
 var porcentaje = new Array();
for (var i=0; i < serie.length; i++){
  //console.log(serie[i]);
  porcentaje.push(((serie[i])/serie[i-1]).toFixed(2));
}


var jsonArray = JSON.parse(JSON.stringify(categorias));
option = {
  
  title: {
      text: 'IEANJESUS - ECUADOR',
      subtext: 'Cantidad de miembros nuevos por año en porcentaje',
      x:'center'
  },
  backgroundColor: '#eee',
  tooltip: {},
  xAxis: {
      type: 'category',
      data: categorias
  },
  yAxis: {
      type: 'value'
  },
  series: [{
      label: {
              normal: {
                  show: true,
                  position: 'inside'
              }
          },
      data: porcentaje,
      type: 'line'
  }]
};
var myChart = echarts.init(document.getElementById('main11'));
myChart.setOption(option);

}, "json" );
    </script>    
<script type="text/javascript">
    $(document).ready(function () {
        window.setInterval(function () {
            notificationStream(3);
        }, 1000);
    });
</script>
    
</body>
</html>
