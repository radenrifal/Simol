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
                        <i class="glyphicon glyphicon-list-alt"></i>&nbsp;Notulensi Rapat
                        <small></small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box-body">
                        <div class="row">
                        <div class="col-xs-12"><!-- col-md-12 -->
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php site_url();?>menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li class="active">Notulensi Rapat</li>
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
                                        <button class="btn btn-primary btn-sm"
                                        data-toggle="modal" data-target="#modal_notulensi_rapat">
                                        <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Unggah Notulensi</button>
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
                                            $query  = $this->model_admin_notulensi_rapat->view_all_notulensi_per_rows($this->uri->segment(3));
                                            $row    = $query->row();
                                        ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-success alert-dismissable">
                                            	<i class="fa fa-check-square-o"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	Selamat ! Data dengan pembahasan : <b>"<?php echo $row->pembahasan; ?>"</b>, pengirim : <b>"<?php echo $row->nama; ?>"</b> telah berhasil diterima
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                                        
                                        <?php if($this->uri->segment(4) == 'pengecekan'){
                                            $query  = $this->model_admin_notulensi_rapat->view_all_notulensi_per_rows($this->uri->segment(3));
                                            $row    = $query->row();
                                        ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-warning alert-dismissable">
                                            	<i class="icon fa fa-warning"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	Data dengan pembahasan : <b>"<?php echo $row->pembahasan; ?>"</b>, pengirim : <b>"<?php echo $row->nama; ?>"</b> sedang dalam pengecekan
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                                        
                                        <?php if($this->uri->segment(4) == 'gagal'){
                                            $query  = $this->model_admin_notulensi_rapat->view_all_notulensi_per_rows($this->uri->segment(3));
                                            $row    = $query->row();
                                        ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-danger alert-dismissable">
                                            	<i class="icon fa fa-danger"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	Pembahasan : <b>"<?php echo $row->pembahasan; ?>"</b>, pengirim : <b>"<?php echo $row->nama; ?>"</b> gagal diterima
                            				</div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                                        
                                        <?php if($this->uri->segment(3) == "terhapus"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-success alert-dismissable">
                                            	<i class="fa fa-check-square-o"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	Data notulensi rapat telah berhasil dihapus
                                            </div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                                    </div>
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
                                                <th><center>Tanggal Rapat</center></th>
                                                <th><center>Pembahasan</center></th>
                                                <th><center>Penyelenggara</center></th>
                                                <th><center>Tempat</center></th>
                                                <th><center>Notulis</center></th>
                                                <th><center>Status</center></th>
                                                <th><center>Ket.</center></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?PHP
                                        	$query = $this->model_admin_notulensi_rapat->view_all_notulensi();
                                            $no    = 1;
                                            foreach($query->result() as $row):
                                            $tanggal_rapat = $row->tanggal_rapat;
                                            
                                            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                    						"Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    	 
                                    			$tahun = substr($row->tanggal_rapat, 0, 4);
                                    			$bulan = substr($row->tanggal_rapat, 5, 2);
                                    			$tgl   = substr($row->tanggal_rapat, 8, 2);
                                            
                                    	    $tanggal = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
                        				?>
                                            <tr>
                                                <form method="POST" id="form_delete">
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <input type="checkbox" name="checkbox[]" id="checkbox" form="form_delete" 
                                                    value="<?php echo $row->id_notulensi; ?>"/>
                                                </td>
                                                </form>
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <center><?php echo $no++; ?></center>
                                                </td>
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->nama; ?></td>
                                                <input type="hidden" id="nama_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->nama; ?>" />
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->hari.', '.$tanggal?></td>
                                                <input type="hidden" id="hari_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->hari; ?>" />
                                                <input type="hidden" id="tanggal_rapat_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->tanggal_rapat; ?>" />
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->pembahasan?></td>
                                                <input type="hidden" id="pembahasan_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->pembahasan; ?>" />   
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->penyelenggara?></td>
                                                <input type="hidden" id="penyelenggara_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->penyelenggara; ?>" />
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->tempat?></td>
                                                <input type="hidden" id="tempat_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->tempat; ?>" />
                                                <input type="hidden" id="peserta_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->peserta; ?>" />
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php echo $row->notulis?></td>
                                                <input type="hidden" id="notulis_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->notulis; ?>" />
                                                <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                    <?php if($row->status_notulensi == 'Diterima'){
                                                    ?>
                                                    <span class="label1 label-success label-sm"><?php echo $row->status_notulensi; ?></span>
                                                    <?php
                                                        }elseif($row->status_notulensi == 'Proses'){
                                                    ?>
                                                    <span class="label1 label-info label-sm"><?php echo $row->status_notulensi; ?></span>
                                                    <?php
                                                        }elseif($row->status_notulensi == 'Gagal Diterima'){
                                                    ?>
                                                    <span class="label1 label-danger label-sm"><?php echo $row->status_notulensi; ?></span>
                                                    <?php
                                                        }elseif($row->status_notulensi == 'Dalam Pengecekan'){
                                                    ?>
                                                    <span class="label1 label-warning label-sm"><?php echo $row->status_notulensi; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <input type="hidden" id="status_notulensi_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->status_notulensi; ?>" />
                                                <td>
                                                    <?php if($row->status_notulensi == 'Proses' || $row->status_notulensi == 'Dalam Pengecekan'){?>
                                                    <?php if($row->status_notulensi == 'Proses'){?>
                                                        <button class="btn btn-info btn-sm proses" title="Terima Proses" id="proses_<?php echo $row->id_notulensi; ?>" >
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        </button>
                                                        <!--
                                                        <button class="btn btn-warning btn-sm edit" title="Ubah" 
                                                            data-toggle="modal" data-target="#modal_admin_edit_notulensi_rapat" 
                                                            id="edit_<?php //echo $row->id_notulensi; ?>">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </button>
                                                        -->
                                                    <?php } ?>
                                                    <?php if($row->status_notulensi == 'Dalam Pengecekan'){?>
                                                    <!-- Action button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            Aksi &nbsp; <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu1" role="menu">
                                                            <?php if($row->status_notulensi == 'Dalam Pengecekan'){?>
                                                                <button class="btn btn-success btn-sm terima" title="Terima" id="terima_<?php echo $row->id_notulensi; ?>" >
                                                                    <i class="glyphicon glyphicon-ok"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm batal" title="Batal Terima" id="batal_<?php echo $row->id_notulensi; ?>" >
                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                </button>
                                                            <?php }?>
                                                        </ul>
                                                    </div>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <?php if($row->status_notulensi == 'Diterima'){?> Selesai <?php }?>
                                                    <?php if($row->status_notulensi == 'Gagal Diterima'){?> Perbaiki <?php }?> 
                                                </td>
                                                <td>
                                                    <?php if($row->status_notulensi == 'Dalam Pengecekan' || $row->status_notulensi == 'Diterima'){?>
                                                        <a href="<?php echo site_url();?>assets/dokumen/notulensi rapat/<?php echo $row->file_notulensi; ?>" 
                                                        class="btn btn-default btn-sm download" title="Unduh">
                                                            <span class="glyphicon glyphicon-download"></span>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                
                                                <form method="POST" id="form_delete">
                                                    <input type="hidden" name="id_notulensi" value="<?php echo $row->id_notulensi; ?>" />
                                                </form>
                                                <form method="POST" id="form_delete_all"></form>
                                                
                                                <input type="hidden" id="id_notulensi_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->id_notulensi; ?>" />
                                                <input type="hidden" id="nip_<?php echo $row->id_notulensi; ?>" 
                                                value="<?php echo $row->nip; ?>" />
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
            $this->load->view('view_admin_modal_edit_notulensi');
            $this->load->view('view_admin_modal_tambah_notulensi');
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_dokumen');
            $this->load->view('view_admin_modal_export_notulensi');
            $this->load->view('view_admin_modal_confirm_delete');
        ?>
        
        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <!-- jQuery 2.1.1 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- Date Picker -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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
                
                "use strict";
                
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
                $("body").delegate( "button.edit", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(5);
        			
        			$('#id_notulensi_tmp').val(id);
                    $('#nip').val($('#nip_' + id).val());
                    $('#hari').val($('#hari_' + id).val());
                    $('#tanggal_rapat').val($('#tanggal_rapat_' + id).val());
        			$('#pembahasan').val($('#pembahasan_' + id).val());
        			$('#penyelenggara').val($('#penyelenggara_' + id).val());
        			$('#tempat').val($('#tempat_' + id).val());
        			$('#peserta').val($('#peserta_' + id).val());
        			$('#tempat').val($('#tempat_' + id).val());
        			$('#notulis').val($('#notulis_' + id).val());
        					
        		});
                
                //button delete
                $(".delete").click(function() {
        			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        		});
    		
                $('#delete').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/delete_notulensi_rapat');
        		});
        
                //button export to excel
        		$('.excel').click(function() {
                    $('#form_export_excel').attr('action','<?PHP echo base_url(); ?>admin/export_excel/excel_detail');
        		});
        
                //button export to pdf
        		$('.pdf').click(function() {
                    $('#form_export').attr('action','<?PHP echo base_url(); ?>admin/export_pdf/pdf_detail_notulensi');
        		});
                
                //button Terima
                $("body").delegate( "button.proses", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(7);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_notulensi_proses/" + id;                
        		});
                
                //button Terima
                $("body").delegate( "button.terima", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(7);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_notulensi/" + id;                
        		});
                
                //button Terima
                $("body").delegate( "button.batal", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(6);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_notulensi_batal/" + id;                
        		});
            });
        </script>
    </body>
</html>
