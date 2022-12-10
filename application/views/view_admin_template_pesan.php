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
                        Template Pesan
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="panel-heading">
                        <ol class="breadcrumb">
                            <li><a href="<?php site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                            <li class="active">Template Pesan</li>
                        </ol>
                    </div>
                    <div class="panel-body">
                        <div align="justify">
                            <?PHP
                                $query = $this->model_pesan->view();
                                foreach($query->result() as $row) :
                            ?>
                            <p><?php echo $row->konten_pesan;?></p>
                            <?PHP endforeach; ?>
                        </div></br>
                    </div>
        			<div class='row'>
                        <div class='col-md-12'>
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Ubah Data Template</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                    <form action="<?PHP echo base_url(); ?>admin/update_template_pesan" id="form_ubah" method="POST">
                                        <?PHP
                                            $query = $this->model_pesan->view();
                                            foreach($query->result() as $row) :
                                        ?>
                                        <textarea class="ckeditor" id="konten_pesan" name="konten_pesan">
                                            <?php echo $row->konten_pesan;?>
                                        </textarea>
                                        <?PHP endforeach; ?>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button class="btn btn-success" form="form_ubah">
                                        <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                    </button>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col-->
                    </div><!-- ./row -->
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes 
        <script src="<?php echo base_url();?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>        
        <!-- CK Editor -->
        <script src="<?php echo base_url();?>assets/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>

    </body>
</html>
