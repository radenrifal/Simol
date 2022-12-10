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
            <i class="fa fa-envelope"></i> &nbsp;&nbsp;Pesan
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
                                            <li>
                                            	<a href="<?php echo site_url();?>beranda">
                                            	<span class="glyphicon glyphicon-home"></span>&nbsp; Beranda
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url();?>pesan">
                                            	<span class="fa fa-envelope"></span>&nbsp; Pesan
                                                </a>
                                            </li>
                                            <li>&nbsp; Buat Pesan Baru</li>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?PHP if(!empty($status)){ ?>
                            			<?php if($status == "error"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-danger alert-dismissable">
                                            	<i class="fa fa-ban"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	<b>Maaf !! Data pesan yang anda masukan salah atau belum lengkap. Lakukan kembali kirim pesan.</b>
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <!-- BOXES are complex enough to move the .box-header around.
                                         This is an example of having the box header within the box body -->
                                    <div class="box-header">
                                        <i class="fa fa-inbox"></i>
                                        <h3 class="box-title">Buat Pesan Baru</h3>
                                    </div>
                                    <div style="margin-top: 15px;">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="header">Folders</li>
                                            <li class="active"><a href="<?php echo base_url(); ?>pesan"><i class="fa fa-inbox">
                                                <?php
                                                    $query = $this->model_pesan->jumlah_pesan_baru_per_username($this->session->userdata('username_staff'));	// mysql_query("");
                                        		?>
                                            	</i> Pesan Masuk (<?php echo $query->num_rows(); ?>)</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>pesan/pesan_keluar">
                                                <i class="fa fa-mail-forward"></i> Pesan Keluar</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- /.col (LEFT) -->
                                <div class="col-md-9 col-sm-8">
                                    <div class="box-body">
                                        <form action="<?php echo base_url();?>pesan/insert_pesan" method="post">
                                            <div class="modal-body">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Nama Tujuan</label>
                                                    <select class="form-control" name="nama_tujuan[]" id="nama_tujuan" 
                                                    data-url="<?php echo base_url('admin/ambil_email'); ?>" multiple="multiple">
                                                    <?PHP
                                               	        $query = $this->model_admin_pengguna->view_pengguna_per_pengguna($this->session->userdata('username_staff'));
                                       					foreach($query->result() as $row):
                                    				?>
                                                        <option value="<?php echo $row->nip?>"><?php echo $row->nama?></option>
                                                    <?PHP
                                               	        endforeach;
                                    				?>
                                                    </select>
                                                </div>
                                                <input name="pengirim" id="pengirim" type="hidden" class="form-control" value="<?php echo $this->session->userdata('username_staff');?>">
                                                <!--
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                        <input name="email" id="email_tujuan" type="email" class="form-control" placeholder="Email Tujuan" readonly="hidden">
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
                                                    <textarea name="pesan" class="form-control ckeditor" placeholder="Pesan" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer clearfix">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal </button>
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
    </div><!-- /.content-wrapper -->
      

    
    <?php
        $this->load->view('view_admin_modal_edit_dokumen');
        $this->load->view('view_admin_modal_export');
        $this->load->view('view_admin_modal_confirm_delete');
        $this->load->view('view_admin_modal_confirm_baca_belum');
        $this->load->view('user/view_staff_modal_tambah_dokumen');
        $this->load->view('user/view_staff_modal_masukkan_nip');
    ?>
    <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <address>
                            <p>
                                <strong>
                                    <font color="#333333"><i class="glyphicon glyphicon-map-marker"></i>Alamat</font>
                                </strong><br />
                                Jl. Raya Jakarta - Bogor KM 47 Cibinong, Indonesia
                            </p>
                            <p>
                                <strong>
                                    <font color="#333333"><i class="glyphicon glyphicon-phone-alt"></i> Telepon</font>
                                </strong><br />
                                +62 21 8791 7216</p>
                            <p><font color="#333333">
                                <span class="glyphicon glyphicon-envelope"></span> &nbsp; <b>Email</b></font><br /> 
                                www.inovasi.lipi.go.id
                                
                            </p>
                        </address>
                    </div>
                    <div class="col-md-4">
                        <address>
                            <p>
                                <b><font color="#333333">Situs Terkait</font></b><br />
                                <a href="http://lipi.go.id/">Lembaga Ilmu Pengetahuan Indonesia</a><br />
                                <a href="http://pusinov.lipi.go.id/">Pusat Inovasi LIPI</a><br />
                                <a href="http://intra.lipi.go.id/">Intra LIPI</a><br /><br />
                                
                                <b><font color="#333333">Situs Pendukung</font></b><br />
                                <a href="https://www.google.com/">Google</a><br />
                                <a href="https://mail.google.com/">Gmail</a><br />
                                <a href="https://www.yahoo.com/">Yahoo</a><br />
                            </p>
                        </address>
                    </div>
                    <div class="col-md-4">
                        <address>
                            <p>
                                <b><font color="#333333">Media Social</font></b><br />
                                <font color="#333333"><i class="fa fa-facebook"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://id-id.facebook.com/inovasiLIPI/">Facebook
                                    </a>
                                <br />
                                <font color="#333333"><i class="fa fa-twitter"></i></font>&nbsp;&nbsp;
                                    <a href="http://twitter.com/inovasiLIPI/">Twitter
                                    </a>
                                <br />
                                <font color="#333333"><i class="fa  fa-linkedin"></i></font>&nbsp;&nbsp;&nbsp;
                                    <a href="http://linkedin.lipi.go.id/">Linked In
                                    </a>
                                <br />
                                <font color="#333333"><i class="fa fa-rss"></i></font>&nbsp;&nbsp;&nbsp;
                                    <a href="http://www.inovasi.lipi.go.id/feed.rss">RSS
                                    </a>
                                <br />
                                <font color="#333333"><i class="fa fa-sitemap"></i></font>&nbsp;&nbsp;
                                    <a href="http://www.inovasi.lipi.go.id/sitemap.xml">Site Map
                                    </a>
                                <br />
                                <font color="#333333"><i class="fa fa-search"></i></font>&nbsp;&nbsp;
                                    <a href="http://www.inovasi.lipi.go.id/en/#page-search">Page Search
                                    </a>
                                <br />
                            </p>
                        </address>
                    </div>
                    <!--
                    <div class="col-md-3">
                        <?php
                            //if($this->session->userdata('nip_staff') != ""){
                        ?>
                        <address>
                            <p>
                                <b><font color="#333333">Dokumen</font></b><br />
                                <font color="#333333"><i class="fa  fa-external-link"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a data-toggle="modal" data-target="#compose-modal">Upload Dokumen</a>
                                <br />
                            </p>
                        </address>
                        <?php// } ?>
                    </div>
                    -->
                </div>
            </div>
        </footer>
          
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Pusat Inovasi LIPI bidang&nbsp;<b>INATEK</b>
            </div>
            <strong>Hak Cipta &copy; 2015 <a href="https://www.facebook.com/rd.ardiansyah">Raden Rifal Ardiansyah</a>
        </footer>
    </div><!-- ./wrapper -->
      
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
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>assets/js/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url();?>assets/js/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <!-- Fusion Chart-->
    <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/fusioncharts.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/themes/fusioncharts.theme.ocean.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js" type="text/javascript"></script>-->
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- multi-select -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/multi-select/jquery.multiple.select.js" type="text/javascript"></script>
    <!-- User Defined -->
    <script src="<?php echo base_url();?>assets/js/userdefined.js" type="text/javascript"></script>
    <!-- User Defined -->
    <script src="<?php echo base_url();?>assets/js/userdefined1.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    </body>
</html>
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function(){
			$('#nama_tujuan').multipleSelect({
				placeholder: "Pilih Tujuan Pesan",
				filter:true
			});
		});
        $(function() {
            
            $(".baca").click(function(){
                var id = this.id.substr(5);
              	window.location = "<?PHP echo base_url(); ?>admin/pesan_baca_staff/" + id;     
        	});
            
            //button delete
            $(".delete").click(function() {
        		$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        	});
        
            $('#delete').click(function(){
        		$('#form_delete').attr('action','<?php echo site_url();?>pesan/delete_id_pesan');
        	});
            
            $("#dibaca").hide();
            $("#belum_dibaca").hide();
            $(".dibaca").click(function() {
                $("#dibaca").show();
        		$("#confirm_str").html("Apakah Anda yakin ubah status pesan menjadi Dibaca ?");
        	});
            $('#dibaca').click(function(){
        		$('#form_delete').attr('action','<?php echo site_url();?>pesan/dibaca');
        	});
            
            $(".belum_dibaca").click(function() {
                $("#belum_dibaca").show();
        		$("#confirm_str").html("Apakah Anda yakin ubah status pesan menjadi Belum Dibaca ?");
        	});
            
            $('#belum_dibaca').click(function(){
        		$('#form_delete').attr('action','<?php echo site_url();?>pesan/belum_dibaca');
        	});
        });
    </script>

    