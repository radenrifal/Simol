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
                        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Dokumen Per Kegiatan
                    </h1>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li><a href="<?php echo site_url();?>admin/detail_dokumen">Semua Dokumen</a></li>
                                    <?php
                                        if($this->uri->segment(2) == 'dokumen_per_kegiatan'){
                                    ?>
                                    <li class="active">Dokumen Per Kegiatan</li>
                                    <?php
                                        }else
                                        if($this->uri->segment(3) != '' || $insert_id_kegiatan != ''){
                                            $row = $this->model_dokumen->get_kegiatan_by_id($insert_id_kegiatan);
                                    ?>
                                    <li><a href="<?php echo site_url();?>admin/dokumen_per_kegiatan">Dokumen Per Kegiatan</a></li>
                                    <li class="active"><?php echo $row->jenis_kegiatan?></li>
                                    <?php }?>
                                </ol>
                            </div>
                            <!-- Primary box -->
                            <div class="box box-primary">
                                <div class="panel-heading">
                                    <div class="btn-group btn-sm">
                                        <button type="button" class="btn btn-default btn-sm">Pilih Kategori</button>
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php 
                								$query_kegiatan = $this->model_kegiatan->view_kategori();
                								foreach($query_kegiatan->result() as $row_kegiatan):
                							?>
                                            <li class="menu_kategori" id="menu_kategori">
                                                <a href="<?php echo base_url();?>admin/pilih_kategori" data-id="<?php echo $row_kegiatan->id_kategori;?>" class="pilih-kategori">
                                                <i class="glyphicon glyphicon-th-large"></i> <?php echo $row_kegiatan->nama_kategori;?></a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="btn-group btn-sm menu-kegiatan">
                                        <button type="button" class="btn btn-default btn-sm disabled" id="menu_kegiatan">Pilih Kegiatan</button>
                                        <button type="button" class="btn btn-default btn-sm disabled dropdown-toggle" id="menu_kegiatan1" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu"><!-- AJAX Content Here --></ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-sm delete" 
                                        id="delete_checked"
                                        data-toggle="modal" data-target="#modal_confirm_delete">
                                            <i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-12">
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
                                            
                                            <?PHP if(!empty($status)){ ?>
                                    			<?php if($status == "success"){ 
                              			            $query  = $this->model_dokumen->view_all_dokumen_per_rows($id_dokumen);
                                                    $row    = $query->row();
                                                ?>
                                            	<div class="box-body">
                                                	<div class="alert alert-info alert-dismissable">
                                                    	<i class="icon fa fa-info"></i>
                                                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                       	Selamat ! Data dokumen dengan Judul : <b></b>, Pengirim : <b><?php echo $row->nama?></b>  
                                                           telah berhasil dirubah datanya, dan sedang dalam proses.
                                    				</div>
                                    			</div><!-- /.box-body -->
                                                <?PHP } ?>
                                    		<?php } ?>
                                            
                                            <?PHP if(!empty($status_hapus)){ ?>
                                    			<?php if($status_hapus == "success_hapus"){ ?>
                                            	<div class="box-body">
                                                	<div class="alert alert-success alert-dismissable">
                                                    	<i class="fa fa-check-square-o"></i>
                                                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                       	Selamat ! Data dokumen telah berhasil di hapus.
                                    				</div>
                                    			</div><!-- /.box-body -->
                                                <?PHP } ?>
                                    		<?php } ?>
                                            
                                            
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
                                                    	$query = $this->model_dokumen->view_data_per_kegiatan($insert_id_kegiatan);
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
                                                            <input type="hidden" id="id_kegiatan_<?php echo $row->id_dokumen; ?>" name="id_kegiatan" 
                                                            value="<?php echo $row->id_kegiatan; ?>" />
                                                            <input type="hidden" id="id_dokumen_<?php echo $row->id_dokumen; ?>" name="id_dokumen"
                                                            value="<?php echo $row->id_dokumen; ?>" />
                                                            <td>
                                                                <input type="checkbox" name="checkbox[]" id="checkbox" class="chk" form="form_delete" 
                                                                value="<?php echo $row->id_dokumen; ?>"/>
                                                            </td>
                                                            </form>
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <center><?php echo $no++?></center>
                                                            </td>
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php echo $row->nama?>
                                                            </td>
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php echo $row->jenis_kegiatan?>
                                                            </td>
                                                            <input type="hidden" id="id_kegiatan_<?php echo $row->id_dokumen; ?>" 
                                                            value="<?php echo $row->id_kegiatan; ?>" />
                                                            <input type="hidden" id="id_dokumen_<?php echo $row->id_dokumen; ?>" 
                                                            value="<?php echo $row->id_dokumen; ?>" />
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php echo $row->judul_dokumen?>
                                                            </td>
                                                            <input type="hidden" id="judul_dokumen_<?php echo $row->id_dokumen; ?>" 
                                                            value="<?php echo $row->judul_dokumen; ?>" />
                                                            <input type="hidden" id="file_dokumen_<?php echo $row->id_dokumen; ?>" 
                                                            value="<?php echo $row->file_dokumen; ?>" />
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php echo $waktu?>
                                                            </td>
                                                            <input type="hidden" id="waktu_<?php echo $row->id_dokumen; ?>" 
                                                            value="<?php echo $row->waktu; ?>" />
                                                            <input type="hidden" id="nama_<?php echo $row->id_datadiri; ?>" 
                                                            value="<?php echo $row->nama; ?>" />
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
                                                            <input type="hidden" id="status_dokumen_<?php echo $row->id_dokumen; ?>" 
                                                            value="<?php echo $row->status_dokumen; ?>" />
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php if($row->status_dokumen == 'Diterima'){?>
                                                                Selesai
                                                                <?php }?>
                                                                <?php if($row->status_dokumen == 'Gagal Diterima'){?>
                                                                Perbaiki
                                                                <?php }?>
                                                                <?php if($row->status_dokumen == 'Dalam Pengecekan'){?>
                                                                Menunggu
                                                                <?php }?>
                                                            </td>
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php if($row->status_dokumen == 'Gagal Diterima'){?>
                                                                <button class="btn btn-warning btn-sm edit" title="Ubah" 
                                                                    data-toggle="modal" data-target="#edit-modal" 
                                                                    id="edit_<?php echo $row->id_dokumen; ?>">
                                                                    <i class="glyphicon glyphicon-edit"></i>
                                                                </button>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?PHP
                                                   	    endforeach;
                                				    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?PHP
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_dokumen');
            $this->load->view('view_admin_modal_export');
            $this->load->view('view_admin_modal_confirm_delete');
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
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
            
            $('.alert').fadeOut(9000);
            
            $(document).ready(function(){
                $('#kegiatan').change(function(){
                    // Set variabel url untuk AJAX url nya, ambil dari atribut data-url
                    // $(this) = $('#kegiatan'), bisa pake keduanya
                    // Klo ambil atribut data, bisa pake langsung .data('url') atau .attr('data-url')
                    var url = $(this).data('url');
                    // Set variabel val untuk value yg di kirim ke URL
                    var val = $(this).val();
                    
                    $.ajax({
                        type : "POST",                      // Tipe AJAX POST
                        url  : url,                         // AJAX url yang di set di atas
                        data : {                            // Set data yang dikirim ke URL nya
                            'id_kegiatan' : val,            // nama variabel : valuenya   
                        },
                        success: function(response) {       // Return/Respon dari AJAX saat sukses
                            // Variabel 'response' di dalam function berisikan return value dari AJAX bertipe JSON
                            // Response di atas di parsing terlebih dahulu untuk digunakan pada filter dibawah
                            response = $.parseJSON(response);
                            
                            // Cek pesan/message dari respon yang sudah di parsing, digunakan 'response.message'
                            if(response.message == 'success'){      // Jika respon message success
                                // Set input value #id_dokumen dengan id_dokumen dari respon, digunakan 'response.id'
                                $('#id_dokumen').val(response.id);
                            }else{                                  // Jika respon message error
                                // Set input value #id_dokumen menjadi empty/kosong
                                $('#id_dokumen').val('');
                            }
                        }
            		});
                });
                
                $("a.pilih-kategori").click(function(e){
                    e.preventDefault();
                    
                    var url     = $(this).attr('href');
                    var id      = $(this).data('id');
                    var keg     = $('.menu-kegiatan');
    
                    $.ajax({
                        type        : "POST",                      
                        url         : url,
                        data        : {
                            'id_kategori' : id,
                        },
                        beforeSend  : function(){
                            keg.find('button').addClass('disabled');
                        },                     
                        success: function(response) { 
                            response = $.parseJSON(response);
                            
                            if(response.message == 'success'){      
                                keg.find('ul').empty().html(response.html);
                                keg.find('button').removeClass('disabled');
                            }else{                                  
                                return false;
                            }
                        }
            		});
                    return false;
        		});
                
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
                    event.preventDefault();
        			var id = this.id.substr(5);
        			
        			$('#edit_id_dokumen').val(id);
                    $('#edit_kegiatan').val($('#id_kegiatan_' + id).val());
        			$('#judul_dokumen_edit').val($('#judul_dokumen_' + id).val());
        			$('#id_kegiatan_edit').attr('readonly',true);
                    $('#id_dokumen').attr('readonly',true);
                    
        			$('#form_edit_dokumen').attr('action','<?php echo base_url(); ?>admin/update_dokumen');	
        		});
                
                $(".tambah_dokumen").click(function(){
        			/*
                    $('#save').hide();
        			$('#update').show();
        			*/
        			$('#kegiatan').attr('disabled',false);
                    $('#id_dokumen').attr('disabled',false);
        		});
                
                //button Terima
                $(".terima").click(function() {
        			var id = this.id.substr(7);
        			window.location = "<?PHP echo base_url(); ?>admin/update_status_dokumen/" + id;                
        		});
                
                //button export to excel
        		$('.excel').click(function() {
        			window.location = '<?PHP echo base_url(); ?>admin/export_excel/excel_identifikasi_teknologi';
        		});
        
                //button export to pdf
        		$('.pdf').click(function() {
        			window.location = '<?PHP echo base_url(); ?>admin/export_pdf/pdf_identifikasi_teknologi';
        		});
                
                //button delete
                $(".delete").click(function() {
        			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        		});
    		
                $('#delete').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/delete_dokumen_per_kegiatan');
        		});
            });
        </script>
        
    </body>
</html>
