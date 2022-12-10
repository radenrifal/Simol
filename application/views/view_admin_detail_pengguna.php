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
                        Detail Pengguna
                        <small>biodata lengkap pengguna</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                <li><a href="<?PHP echo site_url(); ?>admin/pengguna">Pengguna</a></li>
                                <?php
                                    if(!empty($detail_pengguna)){
                                    $query  = $this->model_admin_pengguna->view_detail_pengguna($detail_pengguna);
                                    $row    = $query->row();	
                                ?>
                                <li class="active">
                                    </i><?php echo $row->nama?>
                                </li>
                                <?php }?>
                            </ol>
                        </div>          
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-xs-12"><!-- col-md-12 -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <div class="box-tools pull-right">
                                        <a href="<?php echo base_url();?>admin/pengguna" class="btn btn-box-tool" data-toggle="tooltip" title="Kembali">
                                            <i class="glyphicon glyphicon-arrow-left"></i>
                                        </a>
                                    </div>
                                    <h4 class="box-title" align="center">
                                        <?PHP
                                            if(!empty($detail_pengguna)){
                                            $query  = $this->model_admin_pengguna->view_detail_pengguna($detail_pengguna);
                                            $row    = $query->row();

                                        ?>
                                        <h3 align="center">" Biodata&nbsp;<b><?php echo $row->nama?></b>"</h3>
                                        <?PHP  
                                            }
                                        ?>
                                    </h4>
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <tbody>
                                        <?PHP
                                            if(!empty($detail_pengguna)){
                                            $query  = $this->model_admin_pengguna->view_detail_pengguna($detail_pengguna);
                                            $row    = $query->row();
                                            
                                           	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	 
                                        	$tahun = substr($row->tanggal_lahir, 0, 4);
                                        	$bulan = substr($row->tanggal_lahir, 5, 2);
                                        	$tgl   = substr($row->tanggal_lahir, 8, 2);
                                        	 
                                        	$tanggallahir = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;	
                                        ?>
                                            <tr color="white">
                                                <th align="center"><b>Nomor Induk Pegawai</b><br /></th>
                                                <td><?php echo $row->nip?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Nama Lengkap</b><br /></th>
                                                <td><?php echo $row->nama?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Jabatan</b><br /></th>
                                                <td><?php echo $row->jabatan?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Alamat</b><br /></th>
                                                <td><?php echo $row->alamat?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Tempat Tanggal Lahir</b><br /></th>
                                                <td><?php echo $row->tempat_lahir.', '.$tanggallahir;?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Agama</b><br /></th>
                                                <td><?php echo $row->agama?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Status Perkawinan</b><br /></th>
                                                <td><?php echo $row->status_perkawinan?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Nomor HP</b><br /></th>
                                                <td><?php echo $row->no_hp?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Email</b><br /></th>
                                                <td><?php echo $row->email?></td>  
                                            </tr>
                                            <tr color="white">
                                                <th align="center"><b>Status Pengguna</b><br /></th>
                                                <td><?php echo $row->status_pengguna?></td>  
                                            </tr>
                                        </thead>
                                        <?PHP  
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
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
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- User Defined -->
        <script src="<?php echo base_url(); ?>assets/js/userdefined.js" type="text/javascript"></script>
        
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
            $(".edit_detail").click(function(){
    			$('#nip').val('<?php echo $row->nip; ?>');
    			$('#nip_tmp').val('<?php echo $row->nip; ?>');
    			$('#nama').val('<?php echo $row->nama; ?>');
    			$('#jabatan').val('<?php echo $row->jabatan; ?>');
    			$('#alamat').val('<?php echo $row->alamat; ?>');
    			$('#tempat_lahir').val('<?php echo $row->tempat_lahir; ?>');
    			$('#tanggal_lahir').val('<?php echo $row->tanggal_lahir; ?>');
    			$('#agama').val('<?php echo $row->agama; ?>');
    			$('#status_perkawinan').val('<?php echo $row->status_perkawinan; ?>');
    			$('#no_hp').val('<?php echo $row->no_hp; ?>');
    			$('#email').val('<?php echo $row->email; ?>');
    			$('#status_pengguna').val('<?php echo $row->status_pengguna; ?>');
                
                $('#nip').attr('disabled',true);    
    		    $('#status_pengguna').attr('readonly',true);
                
            	$('#form_edit_pengguna').attr('action','<?PHP echo base_url(); ?>admin/update_pengguna');
    		});
            
                
            //button export to excel
    		$('.excel').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_excel/excel_detail';
    		});
    
            //button export to pdf
    		$('.pdf').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_pdf/pdf_detail_dokumen';
    		});
            
            
    		
        </script>
    </body>
</html>
