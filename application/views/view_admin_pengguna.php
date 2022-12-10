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
                        <i class="fa fa-users"></i>&nbsp;Pengguna
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li class="active">Pengguna</li>
                                </ol>
                            </div>
                            <!-- Primary box -->
                            <div class="box box-primary">
                                <div class="panel-heading">
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
                                    <div class="btn-group btn-sm pull-right">
                                        <button class="btn btn-primary btn-sm tambah"
                                        data-toggle="modal" data-target="#modal_tambah_pengguna">
                                        <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Tambah Pengguna</button>
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
                                                   	Maaf !! Data yang anda masukan salah atau belum lengkap. Segera ulangi kembali.
                                				</div>
                                			</div><!-- /.box-body -->
                                            <?PHP } ?>
                                		<?php } ?>
                                        
                                        <?PHP if(!empty($status_nip)){ ?>
                                			<?php if($status_nip == "error_nip"){ ?>
                                        	<div class="box-body">
                                            	<div class="alert alert-danger alert-dismissable">
                                                	<i class="fa fa-ban"></i>
                                                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   	Maaf !! <b>Nip</b> yang anda masukan sudah digunakan. Segera ulangi kembali dengan nip yang berbeda.
                                				</div>
                                			</div><!-- /.box-body -->
                                            <?PHP } ?>
                                		<?php } ?>
                                        
                                        <?PHP if(!empty($status)){ ?>
                                			<?php if($status == "success"){ ?>
                                        	<div class="box-body">
                                            	<div class="alert alert-success alert-dismissable">
                                                	<i class="fa fa-check-square-o"></i>
                                                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   	Selamat ! Data pengguna dengan NIP : <b><?php echo $nip; ?></b> dan Nama Pengguna : <b>
                                                    <?php echo $nama_pengguna; ?></b> yang anda masukan berhasil
                                				</div>
                                			</div><!-- /.box-body -->
                                            <?PHP } ?>
                                		<?php } ?>
                                        
                                        <?PHP if(!empty($status_ubah)){ ?>
                                			<?php if($status_ubah == "success_ubah"){ ?>
                                        	<div class="box-body">
                                            	<div class="alert alert-success alert-dismissable">
                                                	<i class="fa fa-check-square-o"></i>
                                                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   	Selamat ! Data pengguna dengan NIP : <b><?php echo $nip; ?></b> dan Nama Pengguna : <b>
                                                    <?php echo $nama_pengguna; ?></b> telah berhasil dirubah
                                				</div>
                                			</div><!-- /.box-body -->
                                            <?PHP } ?>
                                		<?php } ?>
                                        
                            			<?php if($this->uri->segment(3) == "terhapus"){ ?>
                                    	<div class="box-body">
                                        	<div class="alert alert-success alert-dismissable">
                                            	<i class="fa fa-check-square-o"></i>
                                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               	Data pengguna telah berhasil dihapus
                                            </div>
                            			</div><!-- /.box-body -->
                                        <?PHP } ?>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-12">
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
                                                            <th><center>NIP</center></th>
                                                            <th><center>Nama Lengkap</center></th>
                                                            <th><center>Jabatan</center></th>
                                                            <th><center>Jenis Kelamin</center></th>
                                                            <th><center>Email</center></th>
                                                            <th><center>Status Pengguna</center></th>
                                                            <th><center>Ket.</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?PHP
                                                    	$query = $this->model_admin_pengguna->view_pengguna();
                                    					$no    = 1;
                                                        foreach($query->result() as $row):
                                    				?>
                                                        <tr>
                                                            <form method="POST" id="form_delete">
                                                            <td>
                                                                <?php if($row->status_pengguna == 'staff'){ ?> 
                                                                <input type="checkbox" name="checkbox[]" id="checkbox" form="form_delete" 
                                                                value="<?php echo $row->nip; ?>"/>
                                                                <?php } ?>
                                                            </td>
                                                            </form>
                                                            <td><center><?php echo $no++; ?></center></td>
                                                            <td><?php echo $row->nip?></td>
                                                            <input type="hidden" id="nip_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->nip?>"/>
                                                            <td><?php echo $row->nama?></td>
                                                            <input type="hidden" id="nama_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->nama?>"/>
                                                            <td><?php echo $row->jabatan?></td>
                                                            <input type="hidden" id="jabatan_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->jabatan?>"/>
                                                            <td><?php echo $row->jenis_kelamin?></td>
                                                            <input type="hidden" id="jenis_kelamin_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->jenis_kelamin?>"/>
                                                            <input type="hidden" id="no_hp_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->no_hp?>"/>
                                                            <td><?php echo $row->email?></td>
                                                            <input type="hidden" id="email_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->email?>"/>
                                                            <td><?php echo $row->status_pengguna?></td>
                                                            <input type="hidden" id="status_pengguna_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->status_pengguna?>"/>
                                                            
                                                            <input type="hidden" id="agama_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->agama?>"/> 
                                                            <input type="hidden" id="alamat_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->alamat?>"/>                                                                                
                                                            <input type="hidden" id="tempat_lahir_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->tempat_lahir?>"/>
                                                            <input type="hidden" id="tanggal_lahir_<?php echo $row->nip?>" 
                                                            value="<?php echo $row->tanggal_lahir?>"/>
                                                            
                                                            <td>
                                                                <?php if( $row->nip == '123456789012345678' ): ?>
                                                                <a href="<?php echo base_url();?>admin/detail_pengguna/<?php echo $row->nip;?>">
                                                                <button class="btn btn-info btn-sm detail" title="Detail" 
                                                                    id="detail" >
                                                                    <i class="glyphicon glyphicon-zoom-in"></i>
                                                                </button>
                                                                </a>
                                                                <?php endif ?>
                                                                <?php if( $row->nip != '123456789012345678' ): ?>
                                                                <!-- Action button -->
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                        Aksi &nbsp; <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu1" role="menu">
                                                                        <a href="<?php echo base_url();?>admin/detail_pengguna/<?php echo $row->nip;?>">
                                                                        <button class="btn btn-info btn-sm detail" title="Detail" 
                                                                            id="detail" >
                                                                            <i class="glyphicon glyphicon-zoom-in"></i>
                                                                        </button>
                                                                        </a>
                                                                        <?php if( $row->nip != '123456789012345678' ): ?>
                                                                            <button class="btn btn-warning btn-sm edit" title="Ubah" 
                                                                                data-toggle="modal" data-target="#edit-modal" 
                                                                                id="edit_<?php echo $row->nip; ?>">
                                                                                <i class="glyphicon glyphicon-edit"></i>
                                                                            </button>
                                                                        <?php endif ?>
                                                                    </ul>
                                                                </div>
                                                                <?php endif ?>
                                                            </td> 
                                                        </tr>
                                                    <?PHP
                                                    	endforeach;
                                    				?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
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
            $this->load->view('view_admin_modal_tambah_pengguna');
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_pengguna');
            $this->load->view('view_admin_modal_export');
            $this->load->view('view_admin_modal_confirm_delete');
        ?>
        
        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <!-- jQuery 2.1.1 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Date Picker -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                
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
                
                
                $('.alert').fadeOut(10000);
                
                "use strict";
                    
                //button edit
                $("body").delegate( "button.edit", "click", function( event ) {
                    event.preventDefault();
        			var id = this.id.substr(5);
                    
        			$('#edit_nip').val(id);
        			$('#nip_tmp').val(id);
        			$('#nama').val($('#nama_'+ id).val());
        			$('#jenis_kelamin').val($('#jenis_kelamin_'+ id).val());
        			$('#jabatan').val($('#jabatan_'+ id).val());
        			$('#alamat').val($('#alamat_'+ id).val());
        			$('#tempat_lahir').val($('#tempat_lahir_'+ id).val());
        			$('#tanggal_lahir').val($('#tanggal_lahir_'+ id).val());
        			$('#agama').val($('#agama_'+ id).val());
        			$('#status_perkawinan').val($('#status_perkawinan_'+ id).val());
        			$('#no_hp').val($('#no_hp_'+ id).val());
        			$('#email').val($('#email_'+ id).val());
        			$('#status_pengguna').val($('#status_pengguna_'+ id).val());
                    
                    $('#edit_nip').attr('readonly',true);
                    
        			$('#form_edit_pengguna').attr('action','<?PHP echo base_url(); ?>admin/update_pengguna');
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
                
                //button delete
                $(".delete").click(function() {
        			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        		});
    		
                $('#delete').click(function(){
        			$('#form_delete').attr('action','<?php echo site_url();?>admin/delete_pengguna');
        		});
                
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
            });
        </script>
        
    </body>
</html>
