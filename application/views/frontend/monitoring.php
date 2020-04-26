<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
      <title>Bendung Sidapurna</title>
    <!-- BOOTSTRAP CORE STYLE  -->
      <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/css/style.css') ;?>" >
      <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/css/bootstrap.css') ;?>" >
      <link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/dist/css/font-awesome.css') ;?>" >
      <link rel="stylesheet" href="<?php echo base_url('assets/template/admin//plugins/datatables/dataTables.bootstrap4.min.css') ;?>">

      <!--  -->
</head>
<body>
  <header style="background-color: #696969; padding: 10px;">
        <div class="container">
            <div class="container">
              <div class="navbar-header">
                  <h2 style="color: white; font-style: italic;">Monitoring Bendung Sidapurna</h2>
              </div>
          </div>
        </div>
    </header>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <div class="tombol-icon-bar">
                          <span class="icon-bar" style="background-color: white"></span>
                          <span class="icon-bar" style="background-color: white"></span>
                          <span class="icon-bar" style="background-color: white"></span>
                          <span class="icon-bar" style="background-color: white"></span>
                        </div>
                      </button>
                    </div>
                    <div class="navbar-collapse collapse" id="myNavbar">
                        <ul id="menu-top" class="nav navbar-nav">
                            <li><a href="<?php echo base_url('Monitoring')?>">Home</a></li>
                            <li><a class="sub-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Rekap <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color: #696969">
                                    <li><a href="<?php echo base_url('Monitoring/data_rekap')?>">Rekap Bendung Sidapurna</a></li>
                                    <li><a href="<?php echo base_url('Monitoring/rekap_pintu_air')?>">Rekap Pintu Air</a></li>
                                    <li><a href="<?php echo base_url('Monitoring/kontrol_pintu')?>">Data Kontrolling Pintu Air</a></li>
                                    <li><a href="<?php echo base_url('Monitoring/rekap_pintu_kontrol')?>">Rekap Pintu Air Kontrol</a></li>
                                </ul>
                            </li><li><a class="sub-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Grafik <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color: #696969">
                                    <li><a href="<?php echo base_url('Monitoring/grafik')?>">Ketinggian Air Realtime</a></li>
                                    <li><a href="<?php echo base_url('Monitoring/rekap')?>">Rekap Ketinggian Air</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('Monitoring/status_pintu')?>">Status Pintu Air</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <?php $this->load->view($page);?>
    
    <?php $this->load->view($footer);?>

    <script src="<?php echo base_url ('assets/template/admin/dist/js/jquery-1.11.1.js') ;?>"></script>
    <script src="<?php echo base_url ('assets/template/admin/dist/js/bootstrap.js') ;?>"></script>
    <script src="<?php echo base_url ('assets/template/admin/dist/js/jquery.js') ;?>"></script>
    <!-- datatable -->
    <script src="<?php echo base_url ('assets/template/admin/dist/datatable/jquery.dataTables.min.js') ;?>"></script>
    <script src="<?php echo base_url ('assets/template/admin/dist/datatable/dataTables.bootstrap4.min.js') ;?>"></script>
    <script>
    $(document).ready(function() {
      $('#example1').DataTable();
    } );
    </script>
</body>
</html>
