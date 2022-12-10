<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="SIMOL INATEK PUSAT INOVASI LIPI">
        <meta name="author" content="Raden Rifal Ardiansyah">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>Admin | Pusat Inovasi LIPI | Monitoring Inatek</title>
        <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">

        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?php echo base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <!-- <link href="<?php //echo base_url();?>assets/css/morris/morris.css" rel="stylesheet" type="text/css" /> -->
        <!-- jvectormap -->
        <!-- <link href="<?php //echo base_url();?>assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/> -->
        
        <!-- Daterange picker -->
        <link href="<?php echo base_url();?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url();?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" 
        type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="<?php echo base_url();?>assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="<?php echo base_url();?>assets/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="<?php echo base_url();?>assets/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        
        <!-- fullCalendar -->
        <link href="<?php echo base_url();?>assets/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
        
        <!-- Theme style -->
        <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker CI -->
        <link href="<?php echo base_url();?>assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" />
        <!-- Multi-select -->
        <link href="<?php echo base_url();?>assets/js/plugins/multi-select/multiple-select.css" rel="stylesheet" media="screen" />
        
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- Validasi Angka -->
    	<script type="text/javascript" charset="utf-8">
    		function angka(e) {
    		   if (!/^[0-9]+$/.test(e.value)) {
    			  e.value = e.value.substring(0,e.value.length-1);
    		   }
    		}
    	</script>
        
        <!-- Membuat Jam -->
        <script type="text/javascript">
            function startTime(){
        		var today = new Date()
        		var h =today.getHours()
        		var m =today.getMinutes()
        		var s =today.getSeconds()
        		m=checkTime(m)
        		s=checkTime(s)
        		document.getElementById('jam').innerHTML=h+":"+m+":"+s
        		t=setTimeout('startTime()',10)
        	}
        	
        	function checkTime(i){
        		if (i<10)
        		{i="0"+i}
        		return i
        	}
    	</script>
            
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>admin/menu_utama" class="logo">
                <span>
                    <img src="<?php echo base_url();?>assets/images/logo-lipi3.png" />
                </span>
                <span>
                    <img src="<?php echo base_url();?>assets/images/Lampu Pusinov.png" />
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-default" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button" title="Geser Menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a href="<?php echo base_url(); ?>beranda" class="navbar-brand pull-left">
                    <center><font color="white">Sistem Informasi <i>Monitoring</i> Laporan</font></center>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <?php
                            $this->load->view('view_admin_header_pesan');
                            $this->load->view('view_admin_header_dokumen');
                            $this->load->view('view_admin_header_notulensi_rapat');
                        ?>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown">
                            <div class="navbar-right">
                            <li class="btn-group">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>
                                    <?php echo $this->session->userdata('username'); ?><i class="caret"></i></span>&nbsp;
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li<?PHP if($this->uri->segment(2) == 'profil') echo ' class="active"'; ?>>
                                        <a href="<?php echo site_url();?>admin/profil">
                                            <i class="glyphicon glyphicon-user"></i>&nbsp;Profil
                                        </a>
                                    </li>
                                    <!--
                                    <li<?PHP //if($this->uri->segment(2) == 'pengaturan') echo ' class="active"'; ?>>
                                        <a href="<?php //echo site_url();?>admin/pengaturan">
                                            <i class="glyphicon glyphicon-wrench"></i>&nbsp;Pengaturan
                                        </a>
                                    </li>
                                    -->
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url();?>admin/logout"><i class="glyphicon glyphicon-off"></i>&nbsp;Keluar</a></li>
                                </ul>
                            </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>