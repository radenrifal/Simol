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
                        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Semua Dokumen
                        <small>semua dokumentasi data inatek</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box-body">
                        <div class="row">
                        <div class="col-xs-12"><!-- col-md-12 -->
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li class="active">Semua Dokumen</li>
                                    <li><a href="<?php echo site_url();?>admin/dokumen_per_kegiatan">Dokumen Per Kegiatan</a></li>
                                </ol>
                            </div>
                            <div class="box box-primary">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Menu Aksi &nbsp; <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="" class="export" data-toggle="modal" data-target="#modal_export">
                                                    Cetak Data</a>
                                                </li>
                                                <li>
                                                    <a href="" class="delete" data-toggle="modal" data-target="#modal_confirm_delete">Hapus</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-sm pull-right">
                                        <button class="btn btn-primary btn-sm tambah_dokumen" name="tambah_dokumen" 
                                        data-toggle="modal" data-target="#compose-modal">
                                        <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Unggah Dokumen</button>
                                    </div>                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12">
                                    <?PHP if(!empty($status)){ ?>
                            			<?php if($status == "error"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-danger alert-dismissable">
                                            	<i class="fa fa-ban"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	<b>Maaf !! Data yang anda masukan salah atau belum lengkap. Lakukan browse dokumen dengan benar. Segera ulangi kembali unggah dokumen</b>
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                    
                                    <?PHP if(!empty($status_dokumen_sama)){ ?>
                                        <?php if($status_dokumen_sama == "error_dokumen_sama"){?>
                                    	<div class="box-body">
                                        	<div class="alert alert-danger alert-dismissable">
                                            	<i class="fa fa-ban"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	<b>Maaf !! Dokumen yang anda masukan sudah ada. Ganti nama dokumen anda, dan segera ulangi kembali sesuai format dokumen</b>
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                    
                                    <?PHP if(!empty($status_dokumen)){ ?>
                            			<?php if($status_dokumen == "error_dokumen"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-danger alert-dismissable">
                                            	<i class="fa fa-ban"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	<b>Maaf !! Format dokumen yang anda masukan salah. Segera ulangi kembali sesuai format dokumen</b>
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                    
                                    <?PHP if(!empty($status_proses)){ ?>
                            			<?php if($status_proses == "success_proses"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-info alert-dismissable">
                                            	<i class="icon fa fa-info"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	Dokumen yang anda unggah sedang dalam proses 
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                            		<?php } ?>
                                    
                        			<?php if($this->uri->segment(4) == 'diterima'){
                                        $query  = $this->model_dokumen->view_all_dokumen_per_rows($this->uri->segment(3));
                                        $row    = $query->row();
                                    ?>
                                	<div class="box-body">
                                    	<div class="alert alert-success alert-dismissable">
                                        	<i class="fa fa-check-square-o"></i>
                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           	Selamat ! Data dengan judul dokumen : <b>"<?php echo $row->judul_dokumen; ?>"</b>, pengirim : <b>"<?php echo $row->nama; ?>"</b> telah berhasil diterima
                        				</div>
                        			</div><!-- /.box-body -->
                                    <?PHP } ?>
                                    
                                    <?php if($this->uri->segment(4) == 'pengecekan'){
                                        $query  = $this->model_dokumen->view_all_dokumen_per_rows($this->uri->segment(3));
                                        $row    = $query->row();
                                    ?>
                                	<div class="box-body">
                                    	<div class="alert alert-warning alert-dismissable">
                                        	<i class="icon fa fa-warning"></i>
                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           	Data dengan judul dokumen : <b>"<?php echo $row->judul_dokumen; ?>"</b>, pengirim : <b>"<?php echo $row->nama; ?>"</b> sedang dalam pengecekan
                        				</div>
                        			</div><!-- /.box-body -->
                                    <?PHP } ?>
                                    
                                    <?php if($this->uri->segment(4) == 'gagal'){
                                        $query  = $this->model_dokumen->view_all_dokumen_per_rows($this->uri->segment(3));
                                        $row    = $query->row();
                                    ?>
                                	<div class="box-body">
                                    	<div class="alert alert-danger alert-dismissable">
                                        	<i class="icon fa fa-danger"></i>
                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           	Data dokumen : <b>"<?php echo $row->judul_dokumen; ?>"</b>, pengirim : <b>"<?php echo $row->nama; ?>"</b> gagal diterima
                        				</div>
                        			</div><!-- /.box-body -->
                                    <?PHP } ?>
                                    
                                    <?php if($this->uri->segment(3) == "terhapus"){ ?>
                                	<div class="box-body">
                                    	<div class="alert alert-success alert-dismissable">
                                        	<i class="fa fa-check-square-o"></i>
                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           	Data dokumen telah berhasil dihapus
                                        </div>
                        			</div><!-- /.box-body -->
                                    <?PHP } ?>
                                </div>
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
                                                <th><center>Pengirim</center></th>
                                                <th><center>Nama Kegiatan</center></th>
                                                <th><center>Judul Dokumen</center></th>
                                                <th><center>Waktu</center></th>
                                                <th><center>Status Dokumen</center></th>
                                                <th><center>Ket.</center></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?PHP
                                        	$query = $this->model_dokumen->view_all_dokumen();
                                            $no    = 1;
                                            foreach($query->result() as $row):
                                            
                                            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                    						"Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    	 
                                    			$tahun = substr($row->waktu, 0, 4);
                                    			$bulan = substr($row->waktu, 5, 2);
                                    			$tgl   = substr($row->waktu, 8, 2);
                                                $jam   = substr($row->waktu, 11, 8);
                                        	 
                                    	    $waktu = $tgl . " " . $BulanIndo[(int)$bulan-1] . " " . $tahun . " " . $jam;
                        				?>
                                            <tr>
                                                <form method="POST" id="form_delete">
                                                <td>
                                                    <input type="checkbox" name="checkbox[]" id="checkbox" form="form_delete" 
                                                    value="<?php echo $row->id_dokumen; ?>"/>
                                                </td>
                                                </form>
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <center><?php echo $no++;?></center>
                                                </td>
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->nama?>
                                                </td>
                                                <input type="hidden" id="nama_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->nama; ?>" />
                                                <input type="hidden" id="id_kegiatan_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->id_kegiatan; ?>" />
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->jenis_kegiatan?>
                                                </td>
                                                <input type="hidden" id="id_kegiatan_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->id_kegiatan; ?>" />
                                                <input type="hidden" id="id_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->id_dokumen; ?>" />
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->judul_dokumen?>
                                                </td>
                                                <input type="hidden" id="judul_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->judul_dokumen; ?>" />
                                                <input type="hidden" id="file_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->file_dokumen; ?>" />
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $waktu?>
                                                </td>
                                                <input type="hidden" id="waktu_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->waktu; ?>" />
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php if($row->status_dokumen == 'Diterima'){
                                                    ?>
                                                    <span class="label1 label-success label-sm"><?php echo $row->status_dokumen?></span>
                                                    <?php
                                                        }elseif($row->status_dokumen == 'Proses'){
                                                    ?>
                                                    <span class="label1 label-info label-sm"><?php echo $row->status_dokumen?></span>
                                                    <?php
                                                        }elseif($row->status_dokumen == 'Gagal Diterima'){
                                                    ?>
                                                    <span class="label1 label-danger label-sm"><?php echo $row->status_dokumen?></span>
                                                    <?php
                                                        }elseif($row->status_dokumen == 'Dalam Pengecekan'){
                                                    ?>
                                                    <span class="label1 label-warning label-sm"><?php echo $row->status_dokumen?></span>
                                                    <?php } ?>
                                                </td>
                                                <input type="hidden" id="status_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->status_dokumen; ?>" />
                                                <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                
                                                
                                                <?php if($row->status_dokumen == 'Proses'){?>
                                                <button class="btn btn-info btn-sm proses" title="Terima Proses" id="proses_<?php echo $row->id_dokumen; ?>" >
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                </button>
                                                <?php }?>
                                                <?php if($row->status_dokumen == 'Dalam Pengecekan'){?>
                                                <!-- Action button -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        Aksi &nbsp; <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu1" role="menu">
                                                        <?php if($row->status_dokumen == 'Dalam Pengecekan'){?>
                                                        <button class="btn btn-success btn-sm terima" title="Terima" id="terima_<?php echo $row->id_dokumen; ?>" >
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm batal" title="Batal Terima" id="batal_<?php echo $row->id_dokumen; ?>" >
                                                            <i class="glyphicon glyphicon-remove"></i>
                                                        </button>
                                                        <?php }?>
                                                    </ul>
                                                </div>
                                                <?php }?>
                                                
                                                <?php if($row->status_dokumen == 'Diterima'){?>
                                                Selesai
                                                <?php }?>
                                                <?php if($row->status_dokumen == 'Gagal Diterima'){?>
                                                Perbaiki
                                                <?php }?>
                                                </td>
                                                <td>
                                                <?php if($row->status_dokumen == 'Dalam Pengecekan' || $row->status_dokumen == 'Diterima'){?>
                                                    <a href="<?php echo site_url();?>assets/dokumen/<?php echo $row->file_dokumen; ?>" 
                                                    class="btn btn-default btn-sm download" title="Unduh">
                                                        <span class="glyphicon glyphicon-download"></span>
                                                    </a>
                                                <?php }?>
                                                </td>
                                            </tr>
                                        <?PHP
                                       	    endforeach;
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
            $this->load->view('view_admin_modal_edit_dokumen');
            $this->load->view('view_admin_modal_export_notulensi');
            $this->load->view('view_admin_modal_confirm_delete');
        ?>
        
        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- jQuery 2.1.1 -->
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes 
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- User Defined -->
        <script src="<?php echo base_url(); ?>assets/js/userdefined.js" type="text/javascript"></script>
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable({
                    "iDisplayLength": 5,
                });
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                });
                
                $('.alert').fadeOut(9000);
                
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
            
                //button edit
                $("body").delegate( "button.edit", "click", function( event ) {
                    event.preventDefault();
        			/*
                    $('#save').hide();
        			$('#update').show();
        			*/
        			var id = this.id.substr(5);
        			
        			$('#id_kegiatan').val(id);
                    $('#id_dokumen').val($('#id_dokumen_' + id).val());
        			$('#judul_dokumen').val($('#judul_dokumen_' + id).val());
        			$('#file_dokumen').val($('#file_dokumen_' + id).val());
        			$('#waktu').val($('#waktu_' + id).val());
        			$('#kegiatan').attr('disabled',true);
                    $('#id_dokumen').attr('disabled',true);
                    
        			$('#form_edit_dokumen').attr('action','<?PHP echo base_url(); ?>admin/update_dokumen');	
        		});
                
                //button export to excel
        		$('.excel').click(function() {
                    $('#form_export_excel').attr('action','<?php echo site_url();?>admin/export_excel/excel_detail');
        		});
        
                //button export to pdf
        		$('.pdf').click(function() {
                    $('#form_export').attr('action','<?php echo site_url();?>admin/export_pdf/pdf_detail_dokumen');
        		});
                
                //button Proses
                $("body").delegate( "button.proses", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(7);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_dokumen_proses/" + id;                
        		});
                
                //button Terima
                $("body").delegate( "button.terima", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(7);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_dokumen_terima/" + id;                
        		});
        		
                //button Gagal Terima
                $("body").delegate( "button.batal", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(6);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_dokumen_gagal_terima/" + id;                
        		});
                
                //button delete
                $(".delete").click(function() {
        			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        		});
    		
                $('#delete').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/delete_detail_dokumen');
        		});
                
            });
        </script>
    </body>
</html>
