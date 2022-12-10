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
            <i class="glyphicon glyphicon-list-alt"></i> &nbsp;&nbsp;Notulensi Rapat
          </h1>
        </section>
        <?php } ?>
        <!-- Main content -->
        <section class="content">
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
                                            	<span class="glyphicon glyphicon-list-alt"></span>&nbsp; Notulensi Rapat
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="pull-right">
                                        <?php
                                            if($this->session->userdata('nip_staff') != ""){
                                        ?>
                                        <button type="button" class="btn btn-danger btn-sm delete" 
                                        id="delete_checked"
                                        data-toggle="modal" data-target="#modal_confirm_delete">
                                            <i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus
                                        </button>
                                        <button class="btn btn-primary btn-sm" name="tambah_dokumen" id="unggah_dokumen"
                                            data-toggle="modal" data-target="#modal_staff_notulensi_rapat">
                                            <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Unggah Notulensi Rapat 
                                        </button>                              
                                        <?php  
                                        }
                                        ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-xs-12"><!-- col-md-12 -->
                                <div class="box box-primary">
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
                                            
                                            <?PHP if(!empty($status_update)){ ?>
                                    			<?php if($status_update == "success_update"){ ?>
                                            	<div class="box-body">
                                                	<div class="alert alert-info alert-dismissable">
                                                    	<i class="icon fa fa-info"></i>
                                                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                       	Dokumen dengan pembahasan : <b><?php echo $pembahasan; ?></b> yang menyelenggarakan <b><?php echo $penyelenggara; ?></b> telah berhasil di ubah dan dalam proses 
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
                                                        <?php 
                                                            $query = $this->model_admin_notulensi_rapat->view_notulensi_per_nip($this->session->userdata('nip_staff'));
                                                            $no    = 1;
                                                            foreach($query->result() as $row):
                                                            if($row->status_notulensi == 'Gagal Diterima'){?>
                                                        <label style="margin-right: 10px;">
                                                            <input type="checkbox" id="check-all"/>
                                                        </label>
                                                        <?php } endforeach; ?>
                                                    </th>
                                                    <th><center>No.</center></th>
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
                                            	$query = $this->model_admin_notulensi_rapat->view_notulensi_per_nip($this->session->userdata('nip_staff'));
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
                                                        <?php if($row->status_notulensi == 'Gagal Diterima'){?>
                                                        <input type="checkbox" name="checkbox[]" id="checkbox" class="chk" form="form_delete" 
                                                        value="<?php echo $row->id_notulensi; ?>"/>
                                                        <?php } ?>
                                                    </td>
                                                    </form>
                                                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                        <center><?php echo $no++; ?></center>
                                                    </td>
                                                    <input type="hidden" id="nama_<?php echo $row->id_notulensi; ?>" 
                                                    value="<?php echo $row->nama; ?>" />
                                                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                        <?php echo $row->hari.', '.$tanggal; ?></td>
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
                                                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                        <?php if($row->status_notulensi == 'Diterima'){?> Selesai <?php }?>
                                                        <?php if($row->status_notulensi == 'Gagal Diterima'){?> Perbaiki <?php }?>
                                                        <?php if($row->status_notulensi == 'Dalam Pengecekan'){?> Menunggu <?php }?>
                                                    </td>
                                                    <input type="hidden" id="status_notulensi_<?php echo $row->id_notulensi; ?>" 
                                                    value="<?php echo $row->status_notulensi; ?>" />
                                                    <td>
                                                        <?php if($row->status_notulensi == 'Diterima'){?>
                                                            <a href="<?php echo site_url();?>assets/dokumen/notulensi rapat/<?php echo $row->file_notulensi; ?>" 
                                                            class="btn btn-default btn-sm download" title="Unduh">
                                                                <span class="glyphicon glyphicon-download"></span>
                                                            </a>
                                                        <?php } ?>
                                                        <?php if($row->status_notulensi == 'Gagal Diterima'){?>
                                                            <button class="btn btn-warning btn-sm edit" title="Ubah" 
                                                                data-toggle="modal" data-target="#modal_staff_edit_notulensi_rapat" 
                                                                id="edit_<?php echo $row->id_notulensi; ?>">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </button>
                                                        <?php } ?>
                                                    </td>
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
                    </div><!-- /.box -->
                </div><!-- /.col (MAIN) -->
            </div>
            <!-- MAILBOX END -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php
    
    $this->load->view('user/view_staff_modal_edit_notulensi');
    $this->load->view('user/view_footer');
    $this->load->view('user/view_staff_modal_tambah_dokumen');
    $this->load->view('user/view_staff_modal_masukkan_nip');
    $this->load->view('view_admin_modal_edit_dokumen');
    $this->load->view('view_admin_modal_export');
    $this->load->view('view_admin_modal_confirm_delete');
    $this->load->view('user/view_staff_modal_tambah_notulensi');
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
    <script src="<?php echo base_url();?>assets/js/plugins/fusioncharts/themes/fusioncharts.theme.ocean.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js" type="text/javascript"></script>-->
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- User Defined -->
    <script src="<?php echo base_url();?>assets/js/userdefined.js" type="text/javascript"></script>
    <!-- User Defined -->
    <script src="<?php echo base_url();?>assets/js/userdefined1.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>

    <!-- User Defined -->
    <script src="<?php echo base_url(); ?>assets/js/userdefined.js" type="text/javascript"></script>
    
    <!-- Date Picker -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
    
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    
    
    
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $("#example3").dataTable();
            
            "use strict";
                
            $("#delete_checked").hide();
            
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

            //When unchecking the checkbox
            $("#check-all").on('ifUnchecked', function(event) {
                //Uncheck all checkboxes
                $("input[type='checkbox']", ".table-striped").iCheck("uncheck");

    			if(this.checked) { // check select status
    				$('.chk').each(function() { //loop through each checkbox
    					this.checked = true;  //select all checkboxes with class "chk"        
    					$("#delete_checked").show();
    				});
    			}else{
    				$('.chk').each(function() { //loop through each checkbox
    					this.checked = false; //deselect all checkboxes with class "chk"                      
    					$("#delete_checked").hide();
    				});        
    			}
            });
            
            //When checking the checkbox
            $("#check-all").on('ifChecked', function(event) {
                //Check all checkboxes
                $("input[type='checkbox']", ".table-striped").iCheck("check");

    			if(this.checked) { // check select status
    				$('.chk').each(function() { //loop through each checkbox
    					this.checked = true;  //select all checkboxes with class "chk"        
    					$("#delete_checked").show();
    				});
    			}else{
    				$('.chk').each(function() { //loop through each checkbox
    					this.checked = false; //deselect all checkboxes with class "chk"                      
    					$("#delete_checked").hide();
    				});        
    			}
            });
            
            $(".chk").on('ifChecked', function(event) {
    			if($(".chk").length==$(".chk:checked").length){
    				$(".check-all").attr("checked","checked");
    				$("#delete_checked").show();
    			}
    			else{
    				$(".check-all").removeAttr("checked");
    				$("#delete_checked").show();
    			}
    			if($(".chk:checked").length == 0){
    				$("#delete_checked").hide();
    			}
            });
            
            $(".chk").on('ifUnchecked', function(event) {
    			if($(".chk").length==$(".chk:checked").length){
    				$(".check-all").attr("checked","checked");
    				$("#delete_checked").show();
    			}
    			else{
    				$(".check-all").removeAttr("checked");
    				$("#delete_checked").show();
    			}
    			if($(".chk:checked").length == 0){
    				$("#delete_checked").hide();
    			}
            });
            
            //button edit
            $("body").delegate( "button.edit", "click", function( event ) {
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
            
            //button delete
            $(".delete").click(function() {
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    		});
		
            $('#delete').click(function(){
    			$('#form_delete').attr('action','<?php echo site_url();?>notulensi_rapat/delete_notulensi_rapat');
    		});
            
            //button export to excel
    		$('.excel').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_excel/excel_identifikasi_teknologi';
    		});
    
            //button export to pdf
    		$('.pdf').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_pdf/pdf_identifikasi_teknologi';
    		});
        });
    </script>
    </body>
</html>