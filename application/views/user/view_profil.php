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
            <i class="glyphicon glyphicon-user"></i> &nbsp;&nbsp;Profil
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
                                            	<a href="<?php site_url();?>beranda">
                                            	<span class="glyphicon glyphicon-home"></span>&nbsp; Beranda
                                                </a>
                                            </li>
                                            <li>
                                            	<span class="glyphicon glyphicon-user"></span>&nbsp; Profil
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
                                               	<b>Maaf !! Data ubah profil yang anda masukan salah atau belum lengkap. Lakukan pengisian data kembalui.</b>
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                    
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
                            <div class="row">
                        <div class="col-md-8">
                        <!-- Primary box -->
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Diri Pengguna</h3>
                                    <div class="box-tools pull-right">
                                    <?PHP
                                        if($this->session->userdata('username_staff')){
                                        $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                						$row = $query->row();
                                    ?>
                                        <button class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#modal_edit_profil"
                                        id="edit_<?php echo $row->id_datadiri; ?>">
                                            <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                        </button>
                                    <?php }?>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table class="table table-hover table-striped table-condensed" id="table">
                                    <?PHP
                                        if($this->session->userdata('username_staff')){
                                        $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                						$row = $query->row();
                                    ?>
                                        <tr>
                                            <th width="200">NIP </th>
                                            <td><?php echo $row->nip; ?></td>
                                            <input type="hidden" id="id_datadiri_<?php echo $row->id_datadiri?>" value="<?php echo $row->id_datadiri?>"/>
                                            <input type="hidden" id="nip_<?php echo $row->id_datadiri?>" value="<?php echo $row->nip?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Nama Lengkap</th>
                                            <td><?php echo $row->nama; ?></td>
                                            <input type="hidden" id="nama_<?php echo $row->id_datadiri?>" value="<?php echo $row->nama?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Jenis Kelamin</th>
                                            <td><?php echo $row->jenis_kelamin; ?></td>
                                            <input type="hidden" id="jenis_kelamin_<?php echo $row->id_datadiri?>" value="<?php echo $row->jenis_kelamin?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Jabatan</th>
                                            <td><?php echo $row->jabatan; ?></td>
                                            <input type="hidden" id="jabatan_<?php echo $row->id_datadiri?>" value="<?php echo $row->jabatan?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Alamat</th>
                                            <td><?php echo $row->alamat; ?></td>
                                            <input type="hidden" id="alamat_<?php echo $row->id_datadiri?>" value="<?php echo $row->alamat?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Tempat Lahir</th>
                                            <td><?php echo $row->tempat_lahir; ?></td>
                                            <input type="hidden" id="tempat_lahir_<?php echo $row->id_datadiri?>" value="<?php echo $row->tempat_lahir?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Tanggal Lahir</th>
                                            <td><?php echo $row->tanggal_lahir; ?></td>
                                            <input type="hidden" id="tanggal_lahir_<?php echo $row->id_datadiri?>" value="<?php echo $row->tanggal_lahir?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Agama</th>
                                            <td><?php echo $row->agama; ?></td>
                                            <input type="hidden" id="agama_<?php echo $row->id_datadiri?>" value="<?php echo $row->agama?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Status Perkawinan</th>
                                            <td><?php echo $row->status_perkawinan; ?></td>
                                            <input type="hidden" id="status_perkawinan_<?php echo $row->id_datadiri?>" value="<?php echo $row->status_perkawinan?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Nomor HP</th>
                                            <td><?php echo $row->no_hp; ?></td>
                                            <input type="hidden" id="no_hp_<?php echo $row->id_datadiri?>" value="<?php echo $row->no_hp?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Email</th>
                                            <td><?php echo $row->email; ?></td>
                                            <input type="hidden" id="email_<?php echo $row->id_datadiri?>" value="<?php echo $row->email?>"/>
                                        </tr>
                                    <?PHP
                                        }
                                    ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Primary box -->
                            <div class="box box-solid box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Profil Pengguna</h3>
                                    <?PHP
                                        if($this->session->userdata('username_staff')){
                                        $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                						$row = $query->row();
                                    ?>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-success btn-sm edit_username" data-toggle="modal" data-target="#modal_edit_username"
                                        id="edit_username<?php echo $row->nip; ?>">
                                            <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                        </button>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="box-body">
                                    <table class="table table-hover table-striped table-condensed" id="table">
                                    <?PHP
                                        if($this->session->userdata('username_staff')){
                                        $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                						$row = $query->row();
                                    ?>  
                                        <tr>
                                            <input type="hidden" id="nip_<?php echo $row->nip?>" value="<?php echo $row->nip?>"/>    
                                            <th width="200">Username</th>
                                            <td><?php echo $row->username; ?></td>
                                            <input type="hidden" id="username_<?php echo $row->nip?>" value="<?php echo $row->username?>"/>
                                        </tr>
                                        <tr>
                                            <th width="200">Status Pengguna</th>
                                            <td><?php echo $row->status_pengguna; ?></td>
                                            <input type="hidden" id="status_pengguna_<?php echo $row->nip?>" value="<?php echo $row->status_pengguna?>"/>
                                        </tr>
                                    <?PHP
                                        }
                                    ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
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
    <!-- Date Picker -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
    
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        
        
            $('.datepicker').datetimepicker({
                    language:  'id',
                    weekStart: 1,
                    todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 2,
              minView: 2,
              forceParse: 0
            });
            
            $('.alert').fadeOut(9000);
            
            //button edit
            $(".edit").click(function(){
    			var id = this.id.substr(5);
    			
    			$('#id_datadiri_tmp').val(id);
                $('#nip_edit').val($('#nip_' + id).val());
                $('#nama').val($('#nama_' + id).val());
                $('#jenis_kelamin').val($('#jenis_kelamin_' + id).val());
    			$('#jabatan').val($('#jabatan_' + id).val());
    			$('#alamat').val($('#alamat_' + id).val());
    			$('#tempat_lahir').val($('#tempat_lahir_' + id).val());
    			$('#tanggal_lahir').val($('#tanggal_lahir_' + id).val());
    			$('#agama').val($('#agama_' + id).val());
    			$('#status_perkawinan').val($('#status_perkawinan_' + id).val());
    			$('#no_hp').val($('#no_hp_' + id).val());
    			$('#email').val($('#email_' + id).val());
    					
    		});
            
            $(".edit_username").click(function(){
    			var id = this.id.substr(13);
    			
    			$('#nip_tmp').val(id);
                $('#username_edit').val($('#username_' + id).val());
    					
    		});
            //button delete
            $(".delete").click(function() {
    			$("#delete_all_dokumen").hide();
                $("#delete_dokumen").show();
    			
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    			
    			var id = this.id.substr(7);
    			
    			$('#id_dokumen').val(id);
    		});
            
            $(".delete_all").click(function() {
                $("#delete_all_dokumen").show();
                $("#delete_dokumen").hide();
    			$("#confirm_str").html("<b>Peringatan!.</b> Apakah anda yakin ingin menghapus semua data. Data yang sudah dihapus tidak dapat dikembalikan seperti semula ?");
    		});
    	
            //button ok
            $(".ok").click(function() {
    			$.post("<?PHP echo base_url(); ?>dokumen/delete_per_username", {id_dokumen: $("#id_dokumen").val() }, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>dokumen";
    				}
    			);
    		});
    		$(".ok_all").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_all_identifikasi_teknologi", {}, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>admin/inkubasi_teknologi";
    				}
    			);
    		});
            
            $(".delete").click(function() {
    			$("#delete_all_dokumen").hide();
                $("#delete_dokumen").show();
    			
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    			
    			var id = this.id.substr(7);
    			
    			$('#id_dokumen').val(id);
    		});
        
        });
		
    </script>
    </body>
</html>