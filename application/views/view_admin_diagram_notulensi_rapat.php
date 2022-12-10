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
                        <i class="glyphicon glyphicon-stats"></i>&nbsp;&nbsp;Diagram
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <?php if($this->uri->segment(3) != ""){ ?>
                                        <li><a href="<?php echo site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                        <li><a href="<?php echo site_url();?>admin/diagram_notulensi_rapat">Diagram Notulensi Rapat</a></li>
                                        <li class="active"><?php echo $this->uri->segment(3); ?></li>
                                    <?php }else{ ?>
                                        <li><a href="<?php echo site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                        <li class="active">Diagram Notulensi Rapat</li>
                                    <?php }?>
                                </ol>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                <div class="col-md-12">
                                <!-- Primary box -->
                                    <div class="box box-solid box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Diagram Dokumen Berdasarkan Kegiatan</h3>
                                        </div>
                                        <div class="box-body"><!-- /.box-body -->
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
                                                        <a href="<?php echo base_url(); ?>admin/diagram_notulensi_rapat/<?php echo substr($row->year, 0, 4); ?>">
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
                        </div>
                    
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
        
        <!-- Fusion Chart-->
        <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/fusioncharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/themes/fusioncharts.theme.ocean.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes 
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script> -->
    </body>
</html>


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