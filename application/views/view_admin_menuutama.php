<?PHP
    $this->load->view('view_admin_header');
?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <?php
                    $this->load->view('view_admin_menu');  
                ?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Menu Utama
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="<?php echo base_url(); ?>assets/img/slider/slider1.jpg" alt="First slide">
                                                <div class="carousel-caption">
                                                    <h2><center>Sistem Informasi Monitoring Laporan</center></h2>
                                                    <center><p>Bidang Inkubasi dan Alih Teknologi (INATEK)</p></center>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="<?php echo base_url(); ?>assets/img/slider/slider2.jpg" alt="First slide">
                                            </div>
                                            <div class="item">
                                                <img src="<?php echo base_url(); ?>assets/img/slider/slider3.jpg" alt="First slide">
                                            </div>
                                            <div class="item">
                                                <img src="<?php echo base_url(); ?>assets/img/slider/slider4.jpg" alt="First slide">
                                                <div class="carousel-caption">
                                                    <h2><center>Sistem Informasi Monitoring Laporan</center></h2>
                                                    <center><p>Bidang Inkubasi dan Alih Teknologi (INATEK)</p></center>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        1
                                    </h3>
                                    <p>
                                        PENGGUNA
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?PHP echo site_url(); ?>admin/pengguna" class="small-box-footer">
                                    Lihat Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        2
                                    </h3>
                                    <p>
                                        LAPORAN KEGIATAN
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <a href="<?PHP echo site_url(); ?>admin/laporan_kegiatan" class="small-box-footer">
                                    Lihat Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        3
                                    </h3>
                                    <p>
                                        NOTULENSI RAPAT
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <a href="<?PHP echo site_url(); ?>admin/notulensi_rapat" class="small-box-footer">
                                    Lihat Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        4
                                    </h3>
                                    <p>
                                        PESAN
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <a href="<?PHP echo site_url(); ?>admin/pesan"" class="small-box-footer">
                                    Lihat Lengkap <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                    
                    
                    
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- jQuery 2.1.1 -->
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes 
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script> -->
    </body>
</html>
