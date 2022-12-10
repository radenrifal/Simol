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
                                    <li class="active">Buat Pesan Baru</li>
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
                                                <h3 class="box-title">Pesan Baru</h3>
                                            </div>
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
                                        <div class="col-md-9 col-sm-8">
                                            <div class="box-body">
                                                <form action="<?php echo base_url();?>admin/insert_pesan" method="post">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Nama Tujuan</label>
                                                        <select class="form-control" name="nama_tujuan[]" id="nama_tujuan" 
                                                        data-url="<?php echo base_url('admin/ambil_email'); ?>" multiple="multiple" style="width:97%">
                                                            
                                                        <?PHP
                                                   	        $query = $this->model_admin_pengguna->view_pengguna_per_pengguna($this->session->userdata('username'));
                                           					foreach($query->result() as $row):
                                        				?>
                                                            <option value="<?php echo $row->nip?>"><?php echo $row->nama?></option>
                                                        <?PHP
                                                   	        endforeach;
                                        				?>
                                                        </select>
                                                    </div>
                                                    <input name="pengirim" id="pengirim" type="hidden" class="form-control" value="<?php echo $this->session->userdata('username');?>">
                                                    <!--
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input name="email" id="email_tujuan" type="email" class="form-control" placeholder="Email Tujuan">
                                                        </div>
                                                    </div>
                                                    -->
                                                    <div class="form-group">
                                                        <label>Subjek</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input name="subjek" id="subjek" type="text" class="form-control" placeholder="Subjek">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Masukan Pesan Anda</label>
                                                        <?PHP
                                                            $query = $this->model_pesan->view();
                                                            foreach($query->result() as $row) :
                                                        ?>
                                                        <textarea name="pesan" class="form-control ckeditor" placeholder="Pesan" style="height: 120px;">
                                                            <?php echo $row->konten_pesan;?>
                                                        </textarea>
                                                        <?PHP endforeach; ?>
                                                    </div>
                                                    <div class="modal-footer clearfix">
                                                        <a href="<?php echo site_url(); ?>admin/pesan">
                                                            <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Batal </button>
                                                        </a>
                                                        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-location-arrow"></i> Kirim Pesan </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.col (RIGHT) -->
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
        <!-- multi-select -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/multi-select/jquery.multiple.select.js" type="text/javascript"></script>
        
        
        <!-- User Defined -->
        <script src="<?php echo base_url(); ?>assets/js/userdefined1.js" type="text/javascript"></script>
        <!-- Page script -->
        <script type="text/javascript">
            $(document).ready(function(){
				$('#nama_tujuan').multipleSelect({
					placeholder: "Pilih Tujuan Pesan",
					filter:true
				});
			});
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
