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
                        Tentang Sistem
                        <small>Monitoring Laporan INATEK</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="panel-heading">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                            <li class="active">Tentang Sistem</li>
                        </ol>
                    </div>
                    <div class="panel-body">
                        <div align="justify">
                            <?PHP
                                $query = $this->model_admin_tentang_kami->view();
                                foreach($query->result() as $row) :
                            ?>
                            <p><?php echo $row->konten;?></p>
                            <?PHP endforeach; ?>
           				</div>
                    </div>
        			</br>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>CK Editor <small>Advanced and full of features</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="row">
                                <div class="col-md-12">
                                    <?PHP if(!empty($status)){ ?>
                            			<?php if($status == "success"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-success alert-dismissable">
                                            	<i class="fa fa-check-square-o"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	<b>Selamat ! Data yang anda masukan berhasil</b>
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                </div>
                            </div>
                                <div class='box-body pad'>
                                    <form action="<?PHP echo base_url(); ?>admin/update_tentang_kami" id="form_ubah" method="POST">
                                        <?PHP
                                            $query = $this->model_admin_tentang_kami->view();
                                            foreach($query->result() as $row) :
                                        ?>
                                        <textarea class="ckeditor" id="konten" name="konten" rows="10" cols="80">
                                            <?php echo $row->konten;?>
                                        </textarea>
                                        <?PHP endforeach; ?>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button class="btn btn-success btn-sm" form="form_ubah">
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
                $('.alert').fadeOut(9000);
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
                
                $('.alert').fadeOut(9000);
            });
        </script>

    </body>
</html>
