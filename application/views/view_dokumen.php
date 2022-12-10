<?PHP
	$this->load->view('view_header');
?>
    <div class="container"> <!-- container -->
	<div class="well-sm">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <ol class="breadcrumb" style="margin-bottom: 0;">
                                <li>
                                	<a href="<?php site_url();?>beranda">
                                	<span class="glyphicon glyphicon-home"></span>&nbsp; Beranda
                                    </a>
                                </li>
                                <li>
                                	<span class="glyphicon glyphicon-folder-open"></span>&nbsp; Dokumen
                                </li>
                            </ol>
                        </div>
                        <div class="pull-right">
                            <?php
                                if($this->session->userdata('nip_staff') != ""){
                            ?>
                            <button class="btn btn-primary" name="tambah_dokumen" id="unggah_dokumen"
                                data-toggle="modal" data-target="#compose-modal">
                                <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Unggah Dokumen
                            </button>                              
                            <?php  
                            }
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div><br /><br /><br /><br />
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                        <div class="col-xs-12"><!-- col-md-12 -->
                            <div class="box box-primary">
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Kegiatan</th>
                                                <th>Judul Dokumen</th>
                                                <th>File Dokumen</th>
                                                <th>Waktu</th>
                                                <th>Pengirim</th>
                                                <th>Status Dokumen</th>
                                                <th>Modifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?PHP
                                        	$query = $this->model_dokumen->view_dokumen_per_nip($this->session->userdata('nip_staff'));
                                            foreach($query->result() as $row):
                        				?>
                                            <tr>
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <?php echo $row->jenis_kegiatan?></td>
                                                <input type="hidden" id="id_kegiatan_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->id_kegiatan; ?>" /> 
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <?php echo $row->judul_dokumen?></td>
                                                <input type="hidden" id="judul_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->judul_dokumen; ?>" />
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <?php echo $row->file_dokumen?></td>
                                                <input type="hidden" id="file_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->file_dokumen; ?>" />
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <?php echo $row->waktu?></td>
                                                <input type="hidden" id="waktu_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->waktu; ?>" />
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <?php echo $row->nama?></td>
                                                <input type="hidden" id="nama_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->nama; ?>" />
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <?php echo $row->status_dokumen?></td>
                                                <input type="hidden" id="status_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                value="<?php echo $row->status_dokumen; ?>" />
                                                <td<?php if($row->status_dokumen == 'Belum Diterima') echo ' style="background-color:#D1D1D1; color:#000000;"';?>>
                                                    <button class="btn btn-danger btn-sm delete" title="Hapus" 
                                                        data-toggle="modal" data-target="#modal_confirm" 
                                                        id="delete_<?php echo $row->id_dokumen; ?>" >
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </button>
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
                </div>
            </div>
    </div>
    </br></br> 
    
    </div><!-- container -->
<?PHP 
	$this->load->view('view_footer');
    $this->load->view('view_staff_modal_tambah_dokumen');
    $this->load->view('view_staff_modal_masukkan_nip');
    $this->load->view('view_admin_modal_edit_dokumen');
    $this->load->view('view_admin_modal_export');
    $this->load->view('view_admin_modal_confirm');
?>
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
    		
        </script>