<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SIMOL INATEK PUSAT INOVASI LIPI">
    <meta name="author" content="Raden Rifal Ardiansyah">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>Pusat Inovasi LIPI | Monitoring Inatek</title>
    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">
    
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Ionicons -->
    <link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar 2.2.5-->
    <link href="<?php echo base_url();?>assets/js/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/js/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    <!-- Daterange picker -->
    <link href="<?php echo base_url();?>assets/js/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?php echo base_url();?>assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi-select -->
    <link href="<?php echo base_url();?>assets/js/plugins/multi-select/multiple-select.css" rel="stylesheet" media="screen" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker CI -->
    <link href="<?php echo base_url();?>assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
       
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- date picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css" />
  </head>
  <body class="skin-blue fixed">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
            <span>
                <img src="<?php echo base_url();?>assets/images/logo-lipi3.png" />
            </span>
            <span>
                <img src="<?php echo base_url();?>assets/images/Lampu Pusinov.png" />
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title="Geser Menu">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <a href="<?php echo base_url(); ?>beranda" class="navbar-brand pull-left">
            <center>Sistem Informasi <i>Monitoring</i> Laporan</center>
          </a>
          
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <?php
                if($this->session->userdata('nip_staff') != ""){
                    $this->load->view('user/view_header_pesan');
                    $this->load->view('user/view_header_dokumen');
                    $this->load->view('user/view_header_notulensi_rapat');
                }
                ?>
              
              <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown">
                    <div class="navbar-right">
                        <?php
                            if($this->session->userdata('nip_staff') == ""){
                        ?>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#" name="masukan_nip" id="masukan_nip"
                                    data-toggle="modal" data-target="#compose-modal-masukkan_nip">
                                    <span class="glyphicon glyphicon-log-in"></span>&nbsp;
                                    Masuk Sistem
                                </a>
                            </li>
                        </ul>
                        <?php  
                            }else
                            if($this->session->userdata('nip_staff') != ""){
                        ?>
                        <ul class="nav navbar-nav">
                            <li class="btn-group">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>
                                    <?php echo $this->session->userdata('username_staff'); ?><i class="caret"></i></span>&nbsp;
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li<?PHP if($this->uri->segment(1) == 'profil') echo ' class="active"'; ?>>
                                        <a href="<?php echo site_url();?>profil">
                                            <i class="glyphicon glyphicon-user"></i>&nbsp;Profil
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url();?>beranda/logout_staff"><i class="glyphicon glyphicon-off"></i>&nbsp;Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                            }
                        ?>
                    </div>
                    
                </li>
                
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php
                if($this->session->userdata('nip_staff') != ""){
            ?>
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="Gambar Pengguna" />-->
            </div>
            <div class="pull-left info">
            
              <p><?php echo $this->session->userdata('nama_staff') ?></p>
            
              <a href="#"><i class="fa fa-circle text-green"></i> Aktif</a>
            </div>
          </div>
            <?php } ?>