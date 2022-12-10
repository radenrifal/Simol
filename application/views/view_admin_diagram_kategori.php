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
                                    <li><a href="<?php site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li class="active">Diagram</li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                <div class="col-md-12">
                                <!-- Primary box -->
                                    <div class="box box-solid box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Diagram Kegiatan Berdasarkan Kategori</h3>
                                            <div class="box-tools pull-right">
                                            </div>
                                        </div>
                                        <div class="box-body"><!-- /.box-body -->
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
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min"></script>
        
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
            type:'doughnut3d', // column2d, column3d, bar2d, bar3d, pie2d, pie3d, doughnut2d, doughnut3d, line, area2d
            renderAt : 'diagram_content',
            width : '100%',
            height : '350',
            dataFormat : 'json',
            dataSource : {
                    'chart' : {
                        'caption' : 'Perolehan Jumlah Kegiatan Berdasarkan Kategori',
                        'xAxisName'	: 'Jenis Kategori',
                        'yAxisName' : 'Jumlah Kegiatan',
                        'theme' : 'ocean'
                    },
                    'data' : [
                        <?php
                            $query    = $this->model_diagram->view_diagram_kategori();
                            $i        = 0;
                            foreach($query->result() as $row) :
                                if($i++)
                                echo ",";
                        ?>		
                                {'label':'<?php echo $row->nama_kategori;?>', 'value':'<?php echo $row->jumlah;?>'}
                        <?php
                            endforeach;
                        ?>			
                             ]
                }
        });
        chart.render('diagram_content');
    });
            
</script>