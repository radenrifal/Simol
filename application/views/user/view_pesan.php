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
                                            	<span class="fa fa-envelope"></span>&nbsp; Pesan
                                            </li>
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
                                        <h3 class="box-title">Pesan Masuk</h3>
                                    </div>
                                    <!-- compose message btn -->
                                    <a class="btn btn-block btn-primary" 
                                    href="<?php echo base_url(); ?>pesan/buat_pesan"><i class="fa fa-pencil"></i> Buat Pesan</a>
                                    <!-- Navigation - folders-->
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
                                    <div class="row pad">
                                        <div class="col-sm-6">
                                            <!-- Action button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                    Menu Aksi &nbsp; <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="" class="dibaca" data-toggle="modal" data-target="#modal_confirm_baca_belum">Pilih menjadi Dibaca</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="belum_dibaca" data-toggle="modal" data-target="#modal_confirm_baca_belum">Pilih menjadi Belum Dibaca</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="" class="delete" data-toggle="modal" data-target="#modal_confirm_delete">Hapus</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div><!-- /.row -->

                                    <div class="box-body table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label style="margin-right: 10px;">
                                                            <input type="checkbox" id="check-all"/>
                                                        </label>
                                                    </th>
                                                    <th><center>No.</center></th>
                                                    <th><center>Nama Pengirim</center></th>
                                                    <th><center>Subjek</center></th>
                                                    <th><center>Status Pesan</center></th>
                                                    <th><center>Waktu</center></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?PHP
                                                $query  = $this->model_pesan->view_pesan_per_username($this->session->userdata('username_staff'));
                                                $no     = 1;
                                                foreach($query->result() as $row) :
                                                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                        						"Juli", "Agustus", "September", "Oktober", "November", "Desember");
                        	 
                                        			$tahun = substr($row->waktu, 0, 4);
                                        			$bulan = substr($row->waktu, 5, 2);
                                        			$tgl   = substr($row->waktu, 8, 2);
                                                    $jam   = substr($row->waktu, 11, 8);
                                        	 
                                        	    $waktu = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun . " " . $jam;
                                            ?>
                                                <tr>
                                                    <form method="POST" id="form_delete">
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <input type="checkbox" name="checkbox[]" id="checkbox" form="form_delete" 
                                                        value="<?php echo $row->id_pesan; ?>"/>
                                                    </td>
                                                    </form>
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <center><?php echo $no++?></center>
                                                    </td>
                                                        <input type="hidden" id="nip_<?php echo $row->id_pesan?>" 
                                                        value="<?php echo $row->nip?>"/>
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <?php echo $row->pengirim;?>
                                                    </td>
                                                        <input type="hidden" id="pengirim_<?php echo $row->id_pesan?>" 
                                                        value="<?php echo $row->pengirim;?>"/>
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <?php echo $row->subjek;?>
                                                    </td>
                                                        <input type="hidden" id="subjek_<?php echo $row->id_pesan?>" 
                                                        value="<?php echo $row->subjek;?>"/>
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <center>
                                                        <?php if($row->status == 'Dibaca'){
                                                        ?>
                                                        <span class="label1 label-success label-sm"><?php echo $row->status?></span>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <span class="label1 label-warning label-sm"><?php echo $row->status?></span>
                                                        <?php } ?>
                                                        </center>
                                                    </td>
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <?php echo $waktu?>
                                                    </td>
                                                    <td<?php if($row->status == 'Belum Dibaca') echo ' style="color:#4B646F;"';?>>
                                                        <a href="<?php echo base_url();?>pesan/detail_pesan/<?php echo $row->id_pesan;?>">
                                                        <button class="btn btn-info btn-sm baca" id="baca_<?php echo $row->id_pesan;?>"
                                                        title="Lihat Pesan">
                                                            <i class="glyphicon glyphicon-zoom-in"></i>
                                                        </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?PHP
                                            	endforeach;
                            				?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.col (RIGHT) -->
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (MAIN) -->
            </div>
            <!-- MAILBOX END -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
      
    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal_pesan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Buat Pesan Baru</h4>
                </div>
                <form action="<?php echo base_url();?>pesan/insert_pesan" method="post">
                    <div class="modal-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>Nama Tujuan</label>
                            <select class="form-control" name="nama_tujuan" id="nama_tujuan" 
                            data-url="<?php echo base_url('admin/ambil_email'); ?>">
                                <option>-- Pilih Nama Tujuan --</option>
                            <?PHP
                       	        $query = $this->model_admin_pengguna->view_pengguna();
               					foreach($query->result() as $row):
            				?>
                                <option value="<?php echo $row->nip?>"><?php echo $row->nama?></option>
                            <?PHP
                       	        endforeach;
            				?>
                            </select>
                        </div>
                        <input name="pengirim" id="pengirim" type="hidden" class="form-control" value="<?php echo $this->session->userdata('username_staff');?>">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" id="email_tujuan" type="email" class="form-control" placeholder="Email Tujuan" readonly="hidden">
                            </div>
                        </div>
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
                        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Kirim Pesan </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <?php
        $this->load->view('view_admin_modal_edit_dokumen');
        $this->load->view('view_admin_modal_export');
        $this->load->view('view_admin_modal_confirm_delete');
        $this->load->view('view_admin_modal_confirm_baca_belum');
        $this->load->view('user/view_staff_modal_tambah_dokumen');
        $this->load->view('user/view_staff_modal_masukkan_nip');
        $this->load->view('user/view_footer');
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
    
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $("#example2").dataTable();
            
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
            //$("#pesan").wysihtml5();
            
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
        		$("#belum_dibaca").hide();
                
                $("#confirm_str1").html("Apakah Anda yakin ubah status pesan menjadi Dibaca ?");
        	});
            $('#dibaca').click(function(){
        		$('#form_delete').attr('action','<?php echo site_url();?>pesan/dibaca');
        	});
            
            $(".belum_dibaca").click(function() {
                $("#belum_dibaca").show();
        		$("#dibaca").hide();
                
                $("#confirm_str1").html("Apakah Anda yakin ubah status pesan menjadi Belum Dibaca ?");
        	});
            
            $('#belum_dibaca').click(function(){
        		$('#form_delete').attr('action','<?php echo site_url();?>pesan/belum_dibaca');
        	});
        });
    </script>
    </body>
</html>

    