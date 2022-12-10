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
                        Pengguna
                        <small>person in charge</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                        <li class="active">Pengguna</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        <h3 class="box-title"><i class="glyphicon glyphicon-stats"></i>&nbsp;Data Tabel Pengguna</h3>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <!--
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="box">
                                                                <div class="box-header">
                                                                    <div class="panel-heading">
                                                                        <div class="pull-left">
                                                                            <ol class="breadcrumb">
                                                                                <li class="active">
                                                                                    <i class="fa fa-users"></i>&nbsp;Pengguna
                                                                                </li>
                                                                            </ol>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                          	<button class="btn btn-danger btn-sm delete_all" 
                                                                                title="Hapus Semua" data-toggle="modal" 
                                                                                data-target="#modal_confirm">
                                                                                <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                                                                            </button>
                                                                          	<button class="btn btn-info btn-sm add" title="Export" 
                                                                                data-toggle="modal" data-target="#modal_export">
                                                                            <i class="glyphicon glyphicon-export"></i> Export to
                                                                        </button>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div><!-- /.box-header --><!--
                                                                <div class="box-body table-responsive">
                                                                    <table id="example1" class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>NIP</th>
                                                                                <th>Nama Lengkap</th>
                                                                                <th>Jabatan</th>
                                                                                <th>Nomor HP</th>
                                                                                <th>Email</th>
                                                                                <th>Jenis Kelamin</th>
                                                                                <th>Status Pengguna</th>
                                                                                <th>Modifikasi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?PHP
                                                                        	$query = $this->model_admin_pengguna->view_pengguna();
                                                        					foreach($query->result() as $row):
                                                        				?>
                                                                            <tr>
                                                                                <td><?php echo $row->nip?></td>
                                                                                <input type="hidden" id="nip_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->nip?>"/>
                                                                                <td><?php echo $row->nama?></td>
                                                                                <input type="hidden" id="nama_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->nama?>"/>
                                                                                <td><?php echo $row->jabatan?></td>
                                                                                <input type="hidden" id="jabatan_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->jabatan?>"/>
                                                                                <td><?php echo $row->no_hp?></td>
                                                                                <input type="hidden" id="no_hp_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->no_hp?>"/>
                                                                                <td><?php echo $row->email?></td>
                                                                                <input type="hidden" id="email_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->email?>"/>
                                                                                <td><?php echo $row->jenis_kelamin?></td>
                                                                                <input type="hidden" id="jenis_kelamin_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->jenis_kelamin?>"/>
                                                                                <td><?php echo $row->status_pengguna?></td>
                                                                                <input type="hidden" id="status_pengguna_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->status_pengguna?>"/>
                                                                                
                                                                                <input type="hidden" id="alamat_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->alamat?>"/>                                                                                
                                                                                <input type="hidden" id="tempat_lahir_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->tempat_lahir?>"/>
                                                                                <input type="hidden" id="tanggal_lahir_<?php echo $row->nip?>" 
                                                                                value="<?php echo $row->tanggal_lahir?>"/>
                                                                                <td>
                                                                                    <button class="btn btn-warning btn-sm edit" title="Ubah" 
                                                                                        data-toggle="modal" data-target="#edit-modal" 
                                                                                        id="edit_<?php echo $row->nip; ?>">
                                                                                        <i class="glyphicon glyphicon-edit"></i> Ubah
                                                                                    </button>
                                                                                    <button class="btn btn-danger btn-sm delete" title="Hapus" 
                                                                                        data-toggle="modal" data-target="#modal_confirm" 
                                                                                        id="delete_<?php echo $row->nip; ?>" >
                                                                                        <i class="glyphicon glyphicon-trash"></i> Hapus
                                                                                    </button>
                                                                                    <a href="<?php echo base_url();?>admin/detail_pengguna/<?php echo $row->nip;?>">
                                                                                    <button class="btn btn-info btn-sm detail" title="Detail" 
                                                                                        id="detail" >
                                                                                        <i class="glyphicon glyphicon-list-alt"></i> Detail
                                                                                    </button>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        <?PHP
                                                                        	endforeach;
                                                        				?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>NIP</th>
                                                                                <th>Nama Lengkap</th>
                                                                                <th>Jabatan</th>
                                                                                <th>Nomor HP</th>
                                                                                <th>Email</th>
                                                                                <th>Jenis Kelamin</th>
                                                                                <th>Status Pengguna</th>
                                                                                <th>Modifikasi</th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div><!-- /.box-body 
                                                            </div><!-- /.box --><!--
                                                        </div>
                                                    </div>
                                                </div> 
                                                -->
                                            </div>
                                        </div>
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        <h3 class="box-title"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Tambah Pengguna</h3>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <form action="<?php echo base_url();?>admin/tambah_pengguna" enctype="multipart/form-data" 
                                                        id="form_tambah_pengguna" method="POST">
                                                        <div class="col-md-12">
                                                            <!-- Input addon -->
                                                                <div class="col-md-6">
                                                                    <div class="box-body">
                                                                        <label>NIP</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                                                            <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai">
                                                                        </div>
                                                                        <br/>
                                                                        <label>Nama Lengkap</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                                                        </div>
                                                                        <br/>
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label>Jenis Kelamin</label>
                                                                            <select class="form-control" name="jenis_kelamin">
                                                                                <option value="Laki-laki">Laki-laki</option>
                                                                                <option value="Perempuan">Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Jabatan</label>
                                                                            <select class="form-control" name="jabatan">
                                                                                <option value="Kepala Bidang INATEK">Kepala Bidang INATEK</option>
                                                                                <option value="Kepala Subbidang Alih Teknologi">Kepala Subbidang Alih Teknologi</option>
                                                                                <option value="Kepala Subbidang Inkubasi Teknologi">Kepala Subbidang Inkubasi Teknologi</option>
                                                                                <option value="Staff Subbidang Alih Teknologi">Staff Subbidang Alih Teknologi</option>
                                                                                <option value="Staff Subbidang Inkubasi Teknologi">Staff Subbidang Inkubasi Teknologi</option>
                                                                                <option value="Peneliti/Staff Subbidang Alih Teknologi">Peneliti/Staff Subbidang Alih Teknologi</option>
                                                                                <option value="Peneliti/Staff Subbidang Inkubasi Teknologi">Peneliti/Staff Subbidang Inkubasi Teknologi</option>
                                                                                <option value="Perekayasa/Staff Subbidang Alih Teknologi">Perekayasa/Staff Subbidang Alih Teknologi</option>
                                                                                <option value="Perekayasa/Staff Subbidang Inkubasi Teknologi">Perekayasa/Staff Subbidang Inkubasi Teknologi</option>
                                                                            </select>
                                                                        </div>
                                                                        <label>Alamat</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                                                        </div>
                                                                        <br/>
                                                                        <label>Tempat Lahir</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                                                        </div>
                                                                        <br/>
                                                                    </div><!-- /.box-body -->
                                                                </div><!-- /.col-md-6 -->
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="box-body">
                                                                        <!-- Date range -->
                                                                        <div class="form-group">
                                                                            <label>Tanggal Lahir</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                                </div>
                                                                                <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datemask3"/>
                                                                            </div><!-- /.input group -->
                                                                        </div><!-- /.form group -->
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label>Agama</label>
                                                                            <select class="form-control" name="agama" id="agama">
                                                                                <option value="Islam">Islam</option>
                                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                                <option value="Hindu">Hindu</option>
                                                                                <option value="Budha">Budha</option>
                                                                            </select>
                                                                        </div>
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label>Status Perkawinan</label>
                                                                            <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                                                                                <option value="Menikah">Menikah</option>
                                                                                <option value="Belum Menikah">Belum Menikah</option>
                                                                            </select>
                                                                        </div>
                                                                        <!-- phone mask -->
                                                                        <div class="form-group">
                                                                            <label>Nomor HP</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="glyphicon glyphicon-earphone"></i>
                                                                                </div>
                                                                                <input type="text" name="no_hp" class="form-control" />
                                                                            </div><!-- /.input group -->
                                                                        </div><!-- /.form group -->
                                                                        <label>Email</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                            <input type="text" name="email" class="form-control" placeholder="Email">
                                                                        </div>
                                                                        <!-- select -->
                                                                        <br />
                                                                        <div class="form-group">
                                                                            <label>Status Pengguna</label>
                                                                            <select class="form-control" name="status_pengguna">
                                                                                <option value="Staff">Staff</option>
                                                                                <option value="Admin">Admin</option>
                                                                            </select>
                                                                        </div>
                                                                        <br />
                                                                        </br></br></br>
                                                                        <div class="panel-footer">
                                                        					<button type="submit" form="form_tambah_pengguna" 
                                                                            class="btn btn-block btn-success">
                                                        						<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan
                                                        					</button>
                                                        				</div>
                                                                    </div><!-- /.box body -->
                                                                </div><!-- /.box -->
                                                        </div><!-- ./col md 12 -->
                                                        </form><!-- form -->
                                                    </div><!-- /.row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- END ACCORDION & CAROUSEL-->
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?PHP
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
    			$('#nip').val(id);
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
                
                $('#nip').attr('disabled',true);
                
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
