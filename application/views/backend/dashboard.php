<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bendung Sidapurna</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/plugins/font-awesome/css/font-awesome.min.css') ;?>" >
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/css/style_login.css') ;?>" >
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/css/ionicons.min.css') ;?>" >
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/css/adminlte.min.css') ;?>" >
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/plugins/iCheck/flat/blue.css') ;?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/plugins/morris/morris.css') ;?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ;?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/plugins/datepicker/datepicker3.css') ;?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/admin/plugins/datatables/dataTables.bootstrap4.min.css') ;?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/admin/plugins/daterangepicker/daterangepicker-bs3.css') ;?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ;?>">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/datatable/bootstrap.css') ;?>" >
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="<?php echo base_url  ('assets/template/admin/plugins/jquery/jquery.min.js') ;?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ;?>"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url ('assets/template/admin/dist/js/raphael-min.js') ;?>"></script>
  <script src="<?php echo base_url ('assets/template/admin/plugins/morris/morris.min.js') ;?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/sparkline/jquery.sparkline.min.js') ;?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ;?>"></script>
  <script src="<?php echo base_url ('assets/template/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ;?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/knob/jquery.knob.js') ;?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url ('assets/template/admin/dist/js/moment.min.js') ;?>"></script>
  <script src="<?php echo base_url ('assets/template/admin/plugins/daterangepicker/daterangepicker.js') ;?>"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/datepicker/bootstrap-datepicker.js') ;?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ;?>"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/slimScroll/jquery.slimscroll.min.js') ;?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url ('assets/template/admin/plugins/fastclick/fastclick.js') ;?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url ('assets/template/admin/dist/js/adminlte.js') ;?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url ('assets/template/admin/dist/js/pages/dashboard.js') ;?>"></script>
  <script src="<?php echo base_url ('assets/template/admin/dist/js/jquery.js') ;?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url ('assets/template/admin/dist/js/demo.js') ;?>"></script>
  
  <!-- datatable -->
  <script src="<?php echo base_url ('assets/template/admin/dist/datatable/jquery.dataTables.min.js') ;?>"></script>
  <script src="<?php echo base_url ('assets/template/admin/dist/datatable/dataTables.bootstrap4.min.js') ;?>"></script>
  
  <script>
    $(document).ready(function() {
      $('#example1').DataTable();
  } );
  </script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
      <form class="form-inline col-sm-3" role="form" method="post" action="<?php echo base_url('Dashboard/search');?>" enctype="multipart/form-data">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
        </div>
      </form>
    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light"><center>Bendung Sidapurna</center></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('uploads/'.$this->session->userdata('foto').'');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('Dashboard/user_view?id=').$this->session->userdata('log_id') ;?>" class="d-block"><?php echo $this->session->userdata('log_nama');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	              <i class="nav-icon fa fa-table"></i>
	              <p>
	                Data Rekap
	                <i class="right fa fa-angle-left"></i>
	              </p>
	            </a>
            	<ul class="nav nav-treeview">
	            	<li class="nav-item">
		                <a href="<?php echo base_url('Dashboard/user')?>" class="nav-link">
		                  <i class="fa fa-circle-o nav-icon"></i>
		                  <p>User</p>
		                </a>
		            </li>
		            <li class="nav-item">
		                <a href="<?php echo base_url('Dashboard/data_rekap')?>" class="nav-link">
		                  <i class="fa fa-circle-o nav-icon"></i>
		                  <p>Rekap Bendung Sidapurna</p>
		                </a>
		            </li>
		            <li class="nav-item">
		                <a href="<?php echo base_url('Dashboard/rekap_pintu_air')?>" class="nav-link">
		                	<i class="fa fa-circle-o nav-icon"></i>
		                	<p>Rekap Pintu Air</p>
		                </a>
		            </li>
		            <li class="nav-item">
                    <a href="<?php echo base_url('Dashboard/rekap_pintu_kontrol')?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Rekap Pintu Air Kontrol</p>
                    </a>
                </li>
	            </ul>
          	</li>
            <li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	            	<i class="nav-icon fa fa-pie-chart"></i>
	              	<p>
	                Grafik
	                <i class="right fa fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	                <li class="nav-item">
	                	<a href="<?php echo base_url('Dashboard/grafik')?>" class="nav-link">
	                  		<i class="fa fa-circle-o nav-icon"></i>
	                  		<p>Ketinggian Air Realtime</p>
	                	</a>
	              	</li>
	              	<li class="nav-item">
	                	<a href="<?php echo base_url('Dashboard/rekap')?>" class="nav-link">
	                  		<i class="fa fa-circle-o nav-icon"></i>
	                	  	<p>Rekap Ketinggian Air</p>
	                	</a>
	              	</li>
	            </ul>
          	</li>
          	<li class="nav-item has-treeview">
            	<a href="#" class="nav-link">
              		<i class="nav-icon fa fa-eye"></i>
              		<p>
                		Pintu Air
                		<i class="right fa fa-angle-left"></i>
              		</p>
            	</a>
            	<ul class="nav nav-treeview">
	              	<li class="nav-item">
	                	<a href="<?php echo base_url('Dashboard/status_pintu')?>" class="nav-link">
	                  		<i class="fa fa-circle-o nav-icon"></i>
	                  		<p>Status Pintu Air</p>
	                	</a>
	                	<a href="<?php echo base_url('Dashboard/kontrol_pintu')?>" class="nav-link">
	                  		<i class="fa fa-circle-o nav-icon"></i>
	                  		<p>Kontroling Pintu Air</p>
	                	</a>
	              	</li>
            	</ul>
        	</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard');?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('Login/logout');?>" onclick="return confirm('Anda yakin ingin Keluar ?')">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php $this->load->view($page);?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>&copy; 2019 <a href="http://sidapurnabendung.com" target="_blank" tittle="Bendung Sidapurna">sidapurnabendung.com</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>