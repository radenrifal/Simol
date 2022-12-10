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
                <section class="content-header no-margin">
                    <h1>
                        Pesan
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- MAILBOX BEGIN -->
                    <div class="mailbox row">
                        <div class="col-xs-12">
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li><a href="<?php echo site_url();?>admin/pesan">Pesan</a></li>
                                    <li class="active">Baca Pesan Masuk</li>
                                </ol>
                            </div>
                            <div class="box box-solid">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4">
                                            <!-- BOXES are complex enough to move the .box-header around.
                                                 This is an example of having the box header within the box body -->
                                            <div class="box-header">
                                                <i class="fa fa-inbox"></i>
                                                <h3 class="box-title">Baca Pesan Masuk</h3>
                                            </div>
                                            <!-- compose message btn -->
                                            <a class="btn btn-block btn-primary" 
                                            href="<?php echo base_url(); ?>admin/buat_pesan"><i class="fa fa-pencil"></i> Buat Pesan</a>
                                            <!-- Navigation - folders-->
                                            <div style="margin-top: 15px;">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="header">Dokumen Pesan</li>
                                                    <li class="active"><a href="<?php echo base_url(); ?>admin/pesan"><i class="fa fa-inbox">
                                                        <?php
                        								    $query = $this->model_pesan->jumlah_pesan_baru_per_username($this->session->userdata('username'));	// mysql_query("");
                        								?>
                                                    	</i> Pesan Masuk (<?php echo $query->num_rows(); ?>)</a>
                                                    </li>
                                                    <li><a href="<?php echo base_url(); ?>admin/pesan_keluar"><i class="fa fa-mail-forward"></i> Pesan Keluar</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- /.col (LEFT) -->
                                        <div class="col-md-9">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <div class="box-tools pull-right">
                                                        <a href="<?php echo base_url();?>admin/pesan" class="btn btn-box-tool" data-toggle="tooltip" title="Kembali">
                                                            <i class="glyphicon glyphicon-arrow-left"></i>
                                                        </a>
                                                    </div>
                                                </div><!-- /.box-header -->
                                                <div class="box-body no-padding">
                                                    <?PHP
                                                        if(!empty($detail_pesan)){
                                                        $query  = $this->model_pesan->view_pesan_baca($detail_pesan);
                                                        $row    = $query->row();
                                                        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                                						"Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                	 
                                                			$tahun = substr($row->waktu, 0, 4);
                                                			$bulan = substr($row->waktu, 5, 2);
                                                			$tgl   = substr($row->waktu, 8, 2);
                                                            $jam   = substr($row->waktu, 11, 8);
                                                	 
                                                	    $waktu = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun . " " . $jam;
                                                    ?>
                                                    <div class="mailbox-read-info">
                                                    <div class="box-body">
                                                        <h3><?php echo $row->subjek; ?></h3>
                                                        <h5>Dari  &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row->pengirim;?></h5>
                                                        <h5>Untuk &nbsp;: <?php echo $row->nama;?></h5>
                                                        <span class="mailbox-read-time pull-right"><?php echo $waktu;?></span>
                                                    </div>
                                                    </div><!-- /.mailbox-read-info -->
                                                    <!--
                                                    <div class="mailbox-controls with-border text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></button>
                                                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                                                        </div><!-- /.btn-group 
                                                        <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><!--<i class="fa fa-print"></i></button>
                                                    </div><!-- /.mailbox-controls -->
                                                    <div class="mailbox-read-message">
                                                    <div class="box-body">
                                                        <p align="justify"><?php echo $row->pesan;?></p>
                                                    </div>
                                                    </div><!-- /.mailbox-read-message -->
                                                    <?php } ?>
                                                </div><!-- /.box-body -->
                                                <!--
                                                <div class="box-footer">
                                                    <div class="pull-right">
                                                        <button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                                                        <button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                                                    </div>
                                                        <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                                                        <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                                                </div><!-- /.box-footer -->
                                            </div><!-- /. box -->
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col (MAIN) -->
                    </div>
                    <!-- MAILBOX END -->
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<?PHP
    $this->load->view('view_admin_modal_pesan.php');
    $this->load->view('view_admin_modal_export');
    $this->load->view('view_admin_modal_confirm_delete');
    $this->load->view('view_admin_modal_confirm_baca_belum');
?>

        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- jQuery 2.1.1 -->
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes 
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- CK Editor -->
        <script src="<?php echo base_url();?>assets/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- User Defined -->
        <script src="<?php echo base_url(); ?>assets/js/userdefined1.js" type="text/javascript"></script>
        <!-- Page script -->
        <script type="text/javascript">
            $(function() {
                $(function() {
                    $("#example1").dataTable();
                    $("#example2").dataTable();
                    $('#example3').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": false,
                        "bSort": true,
                        "bInfo": true,
                        "bAutoWidth": false
                    });
                });
                
                "use strict";

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });

                //When unchecking the checkbox
                $("#check-all").on('ifUnchecked', function(event) {
                    //Uncheck all checkboxes
                    $("input[type='checkbox']", ".table-striped").iCheck("uncheck");
                });
                //When checking the checkbox
                $("#check-all").on('ifChecked', function(event) {
                    //Check all checkboxes
                    $("input[type='checkbox']", ".table-striped").iCheck("check");
                });
                //Handle starring for glyphicon and font awesome
                $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
                    e.preventDefault();
                    //detect type
                    var glyph = $(this).hasClass("glyphicon");
                    var fa = $(this).hasClass("fa");

                    //Switch states
                    if (glyph) {
                        $(this).toggleClass("glyphicon-star");
                        $(this).toggleClass("glyphicon-star-empty");
                    }

                    if (fa) {
                        $(this).toggleClass("fa-star");
                        $(this).toggleClass("fa-star-o");
                    }
                });

                //Initialize WYSIHTML5 - text editor
                $("#pesan").wysihtml5();
                
                $(".baca").click(function(){
                    var id = this.id.substr(5);
    		      	window.location = "<?PHP echo base_url(); ?>admin/pesan_baca/" + id;     
        		});
                
                //button delete
                $(".delete").click(function() {
        			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        		});
    		
                $('#delete').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/delete_id_pesan');
        		});
                
                $("#dibaca").hide();
                $("#belum_dibaca").hide();
                $(".dibaca").click(function() {
                    $("#dibaca").show();
        			$("#confirm_str").html("Apakah Anda yakin ubah status pesan menjadi Dibaca ?");
        		});
                $('#dibaca').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/dibaca');
        		});
                
                $(".belum_dibaca").click(function() {
                    $("#belum_dibaca").show();
        			$("#confirm_str").html("Apakah Anda yakin ubah status pesan menjadi Belum Dibaca ?");
        		});
                
                $('#belum_dibaca').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/belum_dibaca');
        		});
            });
            
            
        </script>
        

    </body>
</html>
