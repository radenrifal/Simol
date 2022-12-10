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
                        <i class="fa fa-tasks"></i>&nbsp;Kegiatan & Kategori
                        <small>semua kegiatan inkubasi teknologi dan alih teknologi</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12"><!-- col-md-12 -->
                        <div class="panel-heading">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                <li class="active">Kegiatan</li>
                            </ol>
                        </div>
                        <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <!--<li class="active"><a href="#tab_1" data-toggle="tab">Jadwal Kegiatan</a></li>-->
                                    <li class="active"><a href="#tab_2" data-toggle="tab">Kegiatan</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Kategori</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_2">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-xs-12"><!-- col-md-12 -->
                                                <div class="box-header" data-toggle="tooltip">
                                                    <div class="box-tools">
                                                        <div class="btn-group btn-sm">
                                                            <button type="button" class="btn btn-default btn-sm">Menu Aksi</button>
                                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a class="tambah" data-toggle="modal" data-target="#modal_admin_tambah_kegiatan">
                                                                    <i class="glyphicon glyphicon-plus"></i> Tambah Kegiatan</a>
                                                                </li>
                                                                <li><a class="delete_all" data-toggle="modal" data-target="#modal_confirm">
                                                                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua Kegiatan</a>
                                                                </li>
                                                            </ul>
                                                            <ul></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-heading">
                                                    
                                                </div>
                                                <div class="box-body table-responsive">
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th><center>No.</center></th>
                                                                <th><center>Nama Kegiatan</center></th>
                                                                <th><center>Kategori</center></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?PHP
                                                        	$query = $this->model_kegiatan->view_kegiatan();
                                                            $no    = 1;
                                        					foreach($query->result() as $row):
                                        				?>
                                                            <tr>
                                                                <td><center><?php echo $no++?></center></td>
                                                                <input type="hidden" id="id_kegiatan_<?php echo $row->id_kegiatan?>" 
                                                                value="<?php echo $row->id_kegiatan?>"/>
                                                                <td><?php echo $row->jenis_kegiatan?></td>
                                                                <input type="hidden" id="jenis_kegiatan_<?php echo $row->id_kegiatan?>" 
                                                                value="<?php echo $row->jenis_kegiatan?>"/>
                                                                <td><center><?php echo $row->id_kategori?></center></td>
                                                                <input type="hidden" id="id_kategori_<?php echo $row->id_kategori?>" 
                                                                value="<?php echo $row->id_kategori?>"/>
                                                                <td>
                                                                    <button class="btn btn-warning btn-sm edit" title="Ubah Kegiatan" 
                                                                        data-toggle="modal" data-target="#modal_admin_edit_kegiatan" 
                                                                        id="edit_<?php echo $row->id_kegiatan; ?>">
                                                                        <i class="glyphicon glyphicon-edit"></i>
                                                                    </button>
                                                                    <button class="btn btn-danger btn-sm delete" title="Hapus" 
                                                                        data-toggle="modal" data-target="#modal_confirm" 
                                                                        id="delete_<?php echo $row->id_kegiatan; ?>" >
                                                                        <i class="glyphicon glyphicon-trash"></i>
                                                                    </button> 
                                                                </td>
                                                            </tr>
                                                        <?PHP
                                                        	endforeach;
                                        				?>
                                                        </tbody>
                                                    </table>
                                                </div><!-- /.box-body -->
                                                </div><!-- /.col-md-12 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.box-body -->
                                    </div><!-- /.tab-pane -->
                                
                                    <div class="tab-pane" id="tab_3">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-xs-12"><!-- col-md-12 -->
                                                    <div class="box-header" data-toggle="tooltip">
                                                        <div class="box-tools">
                                                            <div class="btn-group btn-sm">
                                                                <button type="button" class="btn btn-default btn-sm">Menu Aksi</button>
                                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                    <span class="caret"></span>
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a class="tambah_kategori" data-toggle="modal" data-target="#modal_admin_tambah_kategori">
                                                                        <i class="glyphicon glyphicon-plus"></i> Tambah Kategori</a>
                                                                    </li>
                                                                    <li><a class="delete_all_kategori" data-toggle="modal" data-target="#modal_confirm_kategori">
                                                                        <i class="glyphicon glyphicon-trash"></i> Hapus Semua Kategori</a>
                                                                    </li>
                                                                </ul>
                                                                <ul></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-body table-responsive">
                                                        <table id="example2" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th><center>No.</center></th>
                                                                    <th><center>ID Kategori</center></th>
                                                                    <th><center>Nama Kategori</center></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?PHP
                                                            	$query = $this->model_kegiatan->view_kategori();
                                                                $no    = 1;
                                            					foreach($query->result() as $row):
                                            				?>
                                                                <tr>
                                                                    <td><center><?php echo $no++;?></center></td>
                                                                    <td><?php echo $row->id_kategori?></td>
                                                                    <input type="hidden" id="id_kategori_<?php echo $row->id_kategori?>" 
                                                                    value="<?php echo $row->id_kategori?>"/>
                                                                    <td><center><?php echo $row->nama_kategori?></center></td>
                                                                    <input type="hidden" id="nama_kategori_<?php echo $row->id_kategori?>" 
                                                                    value="<?php echo $row->nama_kategori?>"/>
                                                                    <td>
                                                                        <button class="btn btn-warning btn-sm edit_kategori" title="Ubah Kategori" 
                                                                            data-toggle="modal" data-target="#modal_admin_edit_kategori" 
                                                                            id="edit_<?php echo $row->id_kategori; ?>">
                                                                            <i class="glyphicon glyphicon-edit"></i>
                                                                        </button>
                                                                        <button class="btn btn-danger btn-sm delete_kategori" title="Hapus" 
                                                                            data-toggle="modal" data-target="#modal_confirm_kategori" 
                                                                            id="delete_<?php echo $row->id_kategori; ?>" >
                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                        </button> 
                                                                    </td>
                                                                </tr>
                                                            <?PHP
                                                            	endforeach;
                                            				?>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- /.box-body -->
                                                </div><!-- /.col-md-12 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.box-body -->
                                    </div><!-- /.tab-pane -->
                                </div>
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col-md-12 -->
                    </div>
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->

        <?PHP
            $this->load->view('view_admin_modal_tambah_kegiatan');
            $this->load->view('view_admin_modal_tambah_kategori');
            $this->load->view('view_admin_modal_edit_kegiatan');
            $this->load->view('view_admin_modal_edit_kategori');
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_pengguna');
            $this->load->view('view_admin_modal_export');
            $this->load->view('view_admin_modal_confirm');
            $this->load->view('view_admin_modal_confirm_kategori');
        ?>
        
        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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
        
        
        
        <!-- page script -->
        <script type="text/javascript">
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
            
            //button edit
            $(".edit").click(function(){
    			var id = this.id.substr(5);
    			$('#id_kegiatan').val(id);
    			$('#jenis_kegiatan_admin').val($('#jenis_kegiatan_'+ id).val());
    					
    		});
            
            //button edit
            $(".edit_kategori").click(function(){
    			var id = this.id.substr(5);
    			$('#id_kategori_admin').val(id);
    			$('#nama_kategori_admin').val($('#nama_kategori_'+ id).val());
    					
    		});
            
            
            //button delete
            $(".delete").click(function() {
    			$("#delete_all_dokumen").hide();
                $("#delete_dokumen").show();
    			
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    			var id = this.id.substr(7);
    			$('#id_kegiatan').val(id);
    		});
            
            $(".delete_all").click(function() {
                $("#delete_all_dokumen").show();
                $("#delete_dokumen").hide();
    			$("#confirm_str").html("<b>Peringatan!.</b> Apakah anda yakin ingin menghapus semua data. Data yang sudah dihapus tidak dapat dikembalikan seperti semula ?");
    		});
            //button delete
            $(".delete_kategori").click(function() {
    			$("#delete_all_kategori").hide();
                $("#delete_kategori").show();
    			
    			$("#confirm_str_kategori").html("Apakah Anda yakin akan menghapus data ?");
    			var id = this.id.substr(7);
    			$('#id_kategori').val(id);
    		});
            
            $(".delete_all_kategori").click(function() {
                $("#delete_all_kategori").show();
                $("#delete_kategori").hide();
    			$("#confirm_str_kategori").html("<b>Peringatan!.</b> Apakah anda yakin ingin menghapus semua data. Data yang sudah dihapus tidak dapat dikembalikan seperti semula ?");
    		});
		
            //button ok
            $(".ok").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_kegiatan/", {id_kegiatan: $("#id_kegiatan").val() }, 
    				function() {
    					window.location = '<?PHP echo base_url(); ?>admin/kegiatan';
    				}
    			);
    		});
    		$(".ok_all").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_all_kegiatan", {}, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>admin/kegiatan";
    				}
    			);
    		});
            
            //button ok
            $(".ok_kategori").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_kategori/", {id_kategori: $("#id_kategori").val() }, 
    				function() {
    					window.location = '<?PHP echo base_url(); ?>admin/kegiatan';
    				}
    			);
    		});
    		$(".ok_all_kategori").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_all_kategori", {}, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>admin/kegiatan";
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
