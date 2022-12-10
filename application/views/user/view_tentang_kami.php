<?PHP
	$this->load->view('user/view_header');
	$this->load->view('user/view_menu');
?>
          

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="glyphicon glyphicon-user"></i> &nbsp;&nbsp;Tentang Sistem 
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
        
            <div class="box box-primary">
                <div class="box-body">
                <div align="justify">
                    <?PHP
                        $query = $this->model_tentang_kami->view();
                        foreach($query->result() as $row) :
                    ?>
                        <p><?php echo $row->konten;?></p>
                    <?PHP endforeach; ?>
                </div>
                </div>
            </div><!-- /.box -->
              
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php
    $this->load->view('user/view_footer');
    $this->load->view('user/view_staff_modal_tambah_dokumen');
    $this->load->view('user/view_staff_modal_masukkan_nip');
    $this->load->view('view_admin_modal_edit_dokumen');
    $this->load->view('view_admin_modal_export');
    $this->load->view('view_admin_modal_confirm');
?>

    <!-- User Defined -->
    <script src="<?php echo base_url(); ?>assets/js/userdefined.js" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $("#example3").dataTable();
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
            
            
            //button delete
            $(".delete").click(function() {
    			$("#delete_all_dokumen").hide();
                $("#delete_dokumen").show();
    			
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    			
    			var id = this.id.substr(7);
    			
    			$('kegiatan').val();
    		});
            
            $(".delete_all").click(function() {
                $("#delete_all_dokumen").show();
                $("#delete_dokumen").hide();
    			$("#confirm_str").html("<b>Peringatan!.</b> Apakah anda yakin ingin menghapus semua data. Data yang sudah dihapus tidak dapat dikembalikan seperti semula ?");
    		});
		
            //button ok
            $(".ok").click(function() {
    			$.post("<?PHP echo base_url(); ?>admin/delete_identifikasi_teknologi", {}, 
    				function() {
    					window.location = "<?PHP echo base_url(); ?>admin/inkubasi_teknologi";
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
            
            //button export to excel
    		$('.excel').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_excel/excel_identifikasi_teknologi';
    		});
    
            //button export to pdf
    		$('.pdf').click(function() {
    			window.location = '<?PHP echo base_url(); ?>admin/export_pdf/pdf_identifikasi_teknologi';
    		});
            
    </script>