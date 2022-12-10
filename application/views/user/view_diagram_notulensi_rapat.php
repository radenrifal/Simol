<?PHP
	$this->load->view('user/view_header');
	$this->load->view('user/view_menu');
?>
          

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php
            if($this->session->userdata('nip_staff') != ""){
        ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="glyphicon glyphicon-stats"></i> &nbsp;&nbsp;Diagram Notulensi Rapat
          </h1>
        </section>
        <?php } ?>
        <!-- Main content -->
        <section class="content">
            <!-- MAILBOX BEGIN -->
            <div class="mailbox row">
                <div class="col-xs-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <ol class="breadcrumb" style="margin-bottom: 0;">
                                            <?php if($this->uri->segment(3) != ""){ ?>
                                                <li><a href="<?php echo site_url();?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
                                                <li><a href="<?php echo site_url();?>kegiatan/diagram_notulensi_rapat">Diagram Notulensi Rapat</a></li>
                                                <li class="active"><?php echo $this->uri->segment(3); ?></li>
                                            <?php }else{ ?>
                                                <li><a href="<?php echo site_url();?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
                                                <li class="active">Diagram Notulensi Rapat</li>
                                            <?php }?>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <!-- Primary box -->
                                    <div class="box box-solid box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Diagram Dokumen Berdasarkan Kegiatan</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    Menu <i>Filterisasi</i>&nbsp; <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                <?php 
                                                    $query      = $this->model_diagram->view_tbl_notulensi_rapat();
                                                    foreach($query->result() as $row): 
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>kegiatan/diagram_notulensi_rapat/<?php echo substr($row->year, 0, 4); ?>">
                                                            <?php echo substr($row->year, 0, 4); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div id="diagram_content"></div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (MAIN) -->
            </div>
            <!-- MAILBOX END -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php
    $this->load->view('user/view_footer');
    $this->load->view('user/view_staff_modal_tambah_dokumen');
    $this->load->view('user/view_staff_modal_masukkan_nip');
    $this->load->view('view_admin_modal_edit_dokumen');
    $this->load->view('view_admin_modal_export');
    $this->load->view('view_admin_modal_confirm');
    $this->load->view('view_modal_edit_notulensi');
    $this->load->view('user/view_staff_modal_tambah_notulensi');
    $this->load->view('user/view_staff_modal_edit_profil');
    $this->load->view('user/view_staff_modal_edit_username');
?>

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url();?>assets/js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url();?>assets/js/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url();?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>assets/js/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url();?>assets/js/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <!-- Fusion Chart-->
    <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/fusioncharts.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/themes/fusioncharts.theme.ocean.js" type="text/javascript"></script>
    
    <!-- page script -->
    <script type="text/javascript">
        FusionCharts.ready(function(){
        var chart = new FusionCharts({
            type:'line', // column2d, column3d, bar2d, bar3d, pie2d, pie3d, doughnut2d, doughnut3d, line, area2d
            renderAt : 'diagram_content',
            margin : 'auto',
            width : '100%',
            height : '350',
            dataFormat : 'json',
            dataSource : {
                    'chart' : {
                        <?php if($this->uri->segment(3) != ""){?>
                        'caption' : 'Perolehan Jumlah Dokumen Notulensi Rapat pada Tahun <?php echo $this->uri->segment(3);?>',
                        <?php }else{ ?>
                        'caption' : 'Perolehan Jumlah Dokumen Notulensi Rapat',
                        <?php }?>
                        'xAxisName'	: 'Bulan',
                        'yAxisName' : 'Jumlah Dokumen Notulensi Rapat',
                        'theme' : 'ocean'
                    },
                    'data' : [
                    
                        <?php
                            if($this->uri->segment(3) != ""){
                                $query    = $this->model_diagram->view_diagram_notulensi_rapat_filter($this->uri->segment(3));
                                $i        = 0;
                                foreach($query->result() as $row) :
                                    if($i++)
                                    echo ",";
                        ?>
                            {'label':'<?php echo $row->bulan;?>', 'value':'<?php echo $row->jumlah;?>'}
                        <?php
                                endforeach;
                            }else{
                                $query    = $this->model_diagram->view_diagram_notulensi_rapat();
                                $i        = 0;
                                foreach($query->result() as $row) :
                                    if($i++)
                                    echo ",";
                        ?>		
                                {'label':'<?php echo $row->bulan;?>', 'value':'<?php echo $row->jumlah;?>'}
                        <?php
                                endforeach;
                            }
                        ?>			
                             ]
                }
        });
        chart.render('diagram_content');
    });
        
    </script>
    </body>
</html>