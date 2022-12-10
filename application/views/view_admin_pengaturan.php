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
                        <span class="glyphicon glyphicon-wrench"></span>&nbsp;Pengaturan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                        <li class="active">Pengaturan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="box box-info">
                                        <div class="box-header">
                                            <i class="fa fa-bullhorn"></i>
                                            <h3 class="box-title">Pemberitahuan</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="callout callout-info">
                                                <h4>I am an info callout!</h4>
                                                <p>Follow the steps to continue to payment.</p>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                                <div class="col-md-7">
                                    <!-- Edit Datadiri -->
                                    <div class="box box-solid box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Data Diri Admin</h3>
                                            <div class="box-tools pull-right">
                                            <?PHP
                                                if($this->session->userdata('username_staff')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                        						$row = $query->row();
                                            ?>
                                                
                                                <input type="hidden" id="id_datadiri_<?php echo $row->id_datadiri?>" value="<?php echo $row->id_datadiri?>"/>
                                                <input type="hidden" id="nip_<?php echo $row->id_datadiri?>" value="<?php echo $row->nip?>"/>
                                                <input type="hidden" id="nama_<?php echo $row->id_datadiri?>" value="<?php echo $row->nama?>"/>
                                                <input type="hidden" id="jenis_kelamin_<?php echo $row->id_datadiri?>" value="<?php echo $row->jenis_kelamin?>"/>
                                                <input type="hidden" id="jabatan_<?php echo $row->id_datadiri?>" value="<?php echo $row->jabatan?>"/>
                                                <input type="hidden" id="alamat_<?php echo $row->id_datadiri?>" value="<?php echo $row->alamat?>"/>
                                                <input type="hidden" id="tempat_lahir_<?php echo $row->id_datadiri?>" value="<?php echo $row->tempat_lahir?>"/>
                                                <input type="hidden" id="tanggal_lahir_<?php echo $row->id_datadiri?>" value="<?php echo $row->tanggal_lahir?>"/>
                                                <input type="hidden" id="agama_<?php echo $row->id_datadiri?>" value="<?php echo $row->agama?>"/>
                                                <input type="hidden" id="status_perkawinan_<?php echo $row->id_datadiri?>" value="<?php echo $row->status_perkawinan?>"/>
                                                <input type="hidden" id="no_hp_<?php echo $row->id_datadiri?>" value="<?php echo $row->no_hp?>"/>
                                                <input type="hidden" id="email_<?php echo $row->id_datadiri?>" value="<?php echo $row->email?>"/>
                                                
                                                <button class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#modal_edit_profil"
                                                id="edit_<?php echo $row->id_datadiri; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                                </button>
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div><!-- /.box -->
                                    
                                    <!-- Edit Profil Pengguna -->
                                    <div class="box box-solid box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Profil Admin</h3>
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
                                    </div><!-- /.box -->
                                    
                                    <!-- Tambah Pengguna -->
                                    <div class="box box-solid box-info">
                                        <div class="box-header">
                                            <h3 class="box-title">Tambah Pengguna</h3>
                                            <?PHP
                                                if($this->session->userdata('username_staff')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                        						$row = $query->row();
                                            ?>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-info btn-sm edit_username" data-toggle="modal" data-target="#modal_edit_username"
                                                id="edit_username<?php echo $row->nip; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                                </button>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div><!-- /.box -->
                                    
                                    <!-- Tambah Kegiatan -->
                                    <div class="box box-solid box-danger">
                                        <div class="box-header">
                                            <h3 class="box-title">Tambah Kegiatan</h3>
                                            <?PHP
                                                if($this->session->userdata('username_staff')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                        						$row = $query->row();
                                            ?>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-danger btn-sm edit_username" data-toggle="modal" data-target="#modal_edit_username"
                                                id="edit_username<?php echo $row->nip; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                                </button>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div><!-- /.box -->
                                    <!-- Tambah Kegiatan -->
                                    <div class="box box-solid box-warning">
                                        <div class="box-header">
                                            <h3 class="box-title">Tambah Kegiatan</h3>
                                            <?PHP
                                                if($this->session->userdata('username_staff')){
                                                $query = $this->model_profil->view_profil($this->session->userdata('username_staff'));
                        						$row = $query->row();
                                            ?>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-warning btn-sm edit_username" data-toggle="modal" data-target="#modal_edit_username"
                                                id="edit_username<?php echo $row->nip; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>&nbsp;Ubah
                                                </button>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-md-1"></div>
                                
                                
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                        </div>
                    </div><!-- /.row -->
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?PHP
            $this->load->view('view_modal_tambah_pengguna');
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_pengguna');
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
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        
        
        
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
            
            //button edit
            $(".edit").click(function(){
    			var id = this.id.substr(5);
    			$('#edit_nip').val(id);
    			$('#nip_tmp').val(id);
    			$('#nama').val($('#nama_'+ id).val());
    			$('#jabatan').val($('#jabatan_'+ id).val());
    			$('#alamat').val($('#alamat_'+ id).val());
    			$('#tempat_lahir').val($('#tempat_lahir_'+ id).val());
    			$('#tanggal_lahir').val($('#tanggal_lahir_'+ id).val());
    			$('#agama').val($('#agama_'+ id).val());
    			$('#status_perkawinan').val($('#status_perkawinan_'+ id).val());
    			$('#no_hp').val($('#no_hp_'+ id).val());
    			$('#email').val($('#email_'+ id).val());
    			$('#status_pengguna').val($('#status_pengguna_'+ id).val());
                
                $('#edit_nip').attr('readonly',true);
                
    			$('#form_edit_pengguna').attr('action','<?PHP echo base_url(); ?>admin/update_pengguna');
    					
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
            
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask3").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker
               // $('#reservation1').datepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        
    </body>
</html>
