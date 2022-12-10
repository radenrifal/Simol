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
            <i class="fa fa-envelope"></i> &nbsp;&nbsp;Pesan
          </h1>
        </section>
        <?php } ?>
        <!-- Main content -->
        <section class="content">
            <!-- MAILBOX BEGIN -->
            <div class="mailbox row">
                <div class="col-xs-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <ol class="breadcrumb" style="margin-bottom: 0;">
                                            <li>
                                            	<a href="<?php echo site_url();?>beranda">
                                            	<span class="glyphicon glyphicon-home"></span>&nbsp; Beranda
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url();?>pesan_keluar">
                                            	<span class="fa fa-envelope"></span>&nbsp; Pesan Keluar
                                                </a>
                                            </li>
                                            <li>&nbsp; Baca Pesan Keluar</li>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <!-- BOXES are complex enough to move the .box-header around.
                                         This is an example of having the box header within the box body -->
                                    <div class="box-header">
                                        <i class="fa fa-inbox"></i>
                                        <h3 class="box-title">Pesan Keluar</h3>
                                    </div>
                                    <!-- compose message btn -->
                                    <a class="btn btn-block btn-primary" 
                                    href="<?php echo base_url(); ?>pesan/buat_pesan"><i class="fa fa-pencil"></i> Buat Pesan</a>
                                    <!-- Navigation - folders-->
                                    <div style="margin-top: 15px;">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="header">Folders</li>
                                            <li><a href="<?php base_url(); ?>pesan"><i class="fa fa-inbox">
                                                <?php
                                                    $query = $this->model_pesan->jumlah_pesan_baru_per_username($this->session->userdata('username_staff'));	// mysql_query("");
                                        		?>
                                            	</i> Pesan Masuk (<?php echo $query->num_rows(); ?>)</a>
                                            </li>
                                            <li class="active"><a href="<?php base_url(); ?>pesan/pesan_keluar"><i class="fa fa-mail-forward"></i> Pesan Keluar</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.col (LEFT) -->
                                <div class="col-md-9">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <div class="box-tools pull-right">
                                                <a href="<?php echo base_url();?>pesan/pesan_keluar" class="btn btn-box-tool" data-toggle="tooltip" title="Kembali">
                                                    <i class="glyphicon glyphicon-arrow-left"></i>
                                                </a>
                                            </div>
                                            <br />
                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <?PHP
                                                if(!empty($detail_pesan)){
                                                $query  = $this->model_pesan->view_pesan_baca($detail_pesan);
                                                $row    = $query->row();
                                                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                        						"Juli", "Agustus", "September", "Oktober", "November", "Desember");
                        	 
                                        			$tahun = substr($row->waktu, 0, 4);
                                        			$bulan = substr($row->waktu, 5, 2);
                                        			$tgl   = substr($row->waktu, 8, 2);
                                                    $jam   = substr($row->waktu, 11, 8);
                                        	 
                                        	    $waktu = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun . " " . $jam;
    
                                            ?>
                                            <div class="mailbox-read-info">
                                            <div class="box-body">
                                                <h3><?php echo $row->subjek; ?></h3>
                                                <h5>Untuk : <?php echo $row->nama;?><span class="mailbox-read-time pull-right"><?php echo $waktu;?></span></h5>
                                            </div>
                                            </div><!-- /.mailbox-read-info -->
                                            <!--
                                            <div class="mailbox-controls with-border text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></button>
                                                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                                                </div><!-- /.btn-group --><!--
                                                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                                            </div><!-- /.mailbox-controls -->
                                            <div class="mailbox-read-message">
                                            <div class="box-body">
                                                <p align="justify"><?php echo $row->pesan;?></p>
                                            </div>
                                            </div><!-- /.mailbox-read-message -->
                                            <?php } ?>
                                        </div><!-- /.box-body -->
                                        <!--
                                        <div class="box-footer">
                                            <div class="pull-right">
                                                <button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                                                <button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                                            </div>
                                                <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                                                <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                                        </div><!-- /.box-footer -->
                                    </div><!-- /. box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (MAIN) -->
            </div>
            <!-- MAILBOX END -->

          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php
    $this->load->view('user/view_footer');
    $this->load->view('user/view_staff_modal_tambah_dokumen');
    $this->load->view('user/view_staff_modal_masukkan_nip');
    $this->load->view('view_admin_modal_edit_dokumen');
    $this->load->view('view_admin_modal_export');
    $this->load->view('view_admin_modal_confirm_delete');
    $this->load->view('view_admin_modal_confirm_baca_belum');
?>
    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal_pesan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Buat Pesan Baru</h4>
                </div>
                <form action="<?php echo base_url();?>pesan/insert_pesan" method="post">
                    <div class="modal-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>Nama Tujuan</label>
                            <select class="form-control" name="nama_tujuan" id="nama_tujuan" 
                            data-url="<?php echo base_url('admin/ambil_email'); ?>">
                                <option>-- Pilih Nama Tujuan --</option>
                            <?PHP
                       	        $query = $this->model_admin_pengguna->view_pengguna();
               					foreach($query->result() as $row):
            				?>
                                <option value="<?php echo $row->nip?>"><?php echo $row->nama?></option>
                            <?PHP
                       	        endforeach;
            				?>
                            </select>
                        </div>
                        <input name="pengirim" id="pengirim" type="hidden" class="form-control" value="<?php echo $this->session->userdata('username_staff');?>">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" id="email_tujuan" type="email" class="form-control" placeholder="Email Tujuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subjek</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="subjek" id="subjek" type="text" class="form-control" placeholder="Subjek">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Masukan Pesan Anda</label>
                            <textarea name="pesan" class="form-control ckeditor" placeholder="Pesan" style="height: 120px;">
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal </button>
                        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Kirim Pesan </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- page script -->
    <script type="text/javascript">
        $(function() {
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

            //Initialize WYSIHTML5 - text editor
            $("#pesan").wysihtml5();
            
            $(".baca").click(function(){
                var id = this.id.substr(5);
		      	window.location = "<?PHP echo base_url(); ?>admin/pesan_baca_staff/" + id;     
    		});
            
            //button delete
            $(".delete").click(function() {
    			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
    		});
		
            $('#delete').click(function(){
    			$('#form_delete').attr('action','<?php echo site_url();?>pesan/delete_id_pesan');
    		});
            
            $("#dibaca").hide();
            $("#belum_dibaca").hide();
            $(".dibaca").click(function() {
                $("#dibaca").show();
    			$("#confirm_str").html("Apakah Anda yakin ubah status pesan menjadi Dibaca ?");
    		});
            $('#dibaca').click(function(){
    			$('#form_delete').attr('action','<?php echo site_url();?>pesan/dibaca');
    		});
            
            $(".belum_dibaca").click(function() {
                $("#belum_dibaca").show();
    			$("#confirm_str").html("Apakah Anda yakin ubah status pesan menjadi Belum Dibaca ?");
    		});
            
            $('#belum_dibaca').click(function(){
    			$('#form_delete').attr('action','<?php echo site_url();?>pesan/belum_dibaca');
    		});
        });
    </script>