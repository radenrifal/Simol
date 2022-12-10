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
                        <span class="glyphicon glyphicon-user"></span>&nbsp;Profil Admin
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li class="active">Pengaturan</li>
                                </ol>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                <div class="col-md-8">
                                <!-- Primary box -->
                                    <div class="box box-solid box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Data Diri Admin</h3>
                                            <div class="box-tools pull-right">
                                            <?PHP
                                                if($this->session->userdata('username')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username'));
                        						$row = $query->row();
                                            ?>
                                                <button class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#modal_admin_edit_profil"
                                                id="edit_<?php echo $row->id_datadiri; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                                </button>
                                            <?php }?>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <?PHP
                                    			if(!empty($status)){
                                    				if($status == "success"){
                                    		?>
                                            	<div class="box-body">
                                                	<div class="alert alert-succes alert-dismissable">
                                                    	<i class="fa fa-ban"></i>
                                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                           	<b>Maaf !! Segera ulangi nama pengguna dan kata sandi anda </b>
                                    				</div>
                                    			</div><!-- /.box-body -->
                                            <?PHP
                                    				}
                                    			}else
                                    			if(!empty($status)){
                                    				if($status == "error"){
                                    		?>
                                            	<div class="box-body">
                                                	<div class="alert alert-danger alert-dismissable">
                                                    	<i class="fa fa-ban"></i>
                                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                           	<b>Maaf !! Segera ulangi nama pengguna dan kata sandi anda </b>
                                    				</div>
                                    			</div><!-- /.box-body -->
                                            <?PHP
                                    				}
                                    			}
                                    		?>
                                            <table class="table table-hover table-striped table-condensed" id="table">
                                            <?PHP
                                                if($this->session->userdata('username')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username'));
                        						$row = $query->row();
                                                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	 
                                            	$tahun = substr($row->tanggal_lahir, 0, 4);
                                            	$bulan = substr($row->tanggal_lahir, 5, 2);
                                            	$tgl   = substr($row->tanggal_lahir, 8, 2);
                                            	 
                                            	$tanggal_lahir = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
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
                                                    <td><?php echo $tanggal_lahir; ?></td>
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
                                            <h3 class="box-title">Profil Admin</h3>
                                            <?PHP
                                                if($this->session->userdata('username')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username'));
                        						$row = $query->row();
                                            ?>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-success btn-sm edit_username" data-toggle="modal" data-target="#modal_admin_edit_username"
                                                id="edit_username<?php echo $row->nip; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                                </button>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="box-body">
                                            <table class="table table-hover table-striped table-condensed" id="table">
                                            <?PHP
                                                if($this->session->userdata('username')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username'));
                        						$row = $query->row();
                                            ?>  
                                                <tr>
                                                    <input type="hidden" id="nip_<?php echo $row->nip?>" value="<?php echo $row->nip?>"/>    
                                                    <th width="200">Username</th>
                                                    <td><?php echo $this->session->userdata('username') ?></td>
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
                        </div>
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?PHP
            $this->load->view('view_admin_modal_tambah_pengguna');
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_pengguna');
            $this->load->view('view_admin_modal_export');
            $this->load->view('view_admin_modal_confirm');
            $this->load->view('view_admin_modal_edit_profil');
            $this->load->view('view_admin_modal_edit_username');
            
            $this->load->view('user/view_staff_modal_tambah_dokumen');
            $this->load->view('user/view_staff_modal_masukkan_nip');
            $this->load->view('view_admin_modal_edit_dokumen');
            $this->load->view('view_admin_modal_export');
            $this->load->view('view_admin_modal_confirm');
        ?>
        
        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes 
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
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
    			$('#id_datadiri_tmp_admin').val(id);
                $('#nip_admin').val($('#nip_' + id).val());
                $('#nama_admin').val($('#nama_' + id).val());
                $('#jenis_kelamin_admin').val($('#jenis_kelamin_' + id).val());
    			$('#jabatan_admin').val($('#jabatan_' + id).val());
    			$('#alamat_admin').val($('#alamat_' + id).val());
    			$('#tempat_lahir_admin').val($('#tempat_lahir_' + id).val());
    			$('#tanggal_lahir_admin').val($('#tanggal_lahir_' + id).val());
    			$('#agama_admin').val($('#agama_' + id).val());
    			$('#status_perkawinan_admin').val($('#status_perkawinan_' + id).val());
    			$('#no_hp_admin').val($('#no_hp_' + id).val());
    			$('#email_admin').val($('#email_' + id).val());
                $('#jabatan_admin').attr('readonly',true);
    					
    		});
            
            $(".edit_username").click(function(){
    			var id = this.id.substr(13);
    			
    			$('#nip_tmp_admin').val(id);
                $('#username_admin').val($('#username_' + id).val());
    					
    		});
            
            //button modal
            $('#password_baru_admin').attr('readonly',true);
            $('#ulangi_admin').attr('readonly',true);
            
            $("#password_admin").click(function() {
                $('#password_baru_admin').attr('readonly',false);
    		});
            
            $("#password_baru_admin").click(function() {
                $('#ulangi_admin').attr('readonly',false);
    		});
            
            $("#batal").click(function() {
                $('#password_baru_admin').attr('readonly',true);
                $('#ulangi_admin').attr('readonly',true);
    		});
            
            $("#simpan").click(function() {
                $('#password_baru_admin').attr('readonly',true);
                $('#ulangi_admin').attr('readonly',true);
    		});
            
            //button delete
            $(".delete").click(function() {
    			$("#delete_all_dokumen").hide();
                $("#delete_dokumen").show();
    			
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    			var id = this.id.substr(7);
    			$('#nip').val(id);
    		});
            
            $(".delete_all").click(function() {
                $("#delete_all_dokumen").show();
                $("#delete_dokumen").hide();
    			$("#confirm_str").html("<b>Peringatan!.</b> Apakah anda yakin ingin menghapus semua data. Data yang sudah dihapus tidak dapat dikembalikan seperti semula ?");
    		});
		
            //button ok
            $(".ok").click(function() {
                
    			$.post("<?PHP echo base_url(); ?>admin/delete_pengguna/", {nip: $("#nip").val() }, 
    				function() {
    					window.location = '<?PHP echo base_url(); ?>admin/pengguna';
    				}
    			);
    		});
    		$(".ok_all").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_all_pengguna", {}, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>admin/pengguna";
    				}
    			);
    		});
            
            $("#detail").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/detail_pengguna", {}, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>admin/pengguna";
    				}
    			);
    		});
    
            //button export to excel
    		$('.excel').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_excel/excel_pengguna';
    		});
    
            //button export to pdf
    		$('.pdf').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_pdf/pdf_pengguna';
    		});
           
            /* 
            $('.pdf').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_pdf/pdf_detail_pengguna';
    		});
            */
        </script>
        
    </body>
</html>
