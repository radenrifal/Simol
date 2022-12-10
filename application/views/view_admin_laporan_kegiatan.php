<?PHP
    $this->load->view('view_admin_header');
    $bulan = array('Januari','Pebruari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
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
                        <span class="glyphicon glyphicon-file"></span>&nbsp;Data Tabel Kegiatan
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>admin/menu_utama"><i class="fa fa-dashboard"></i> Menu Utama</a></li>
                                    <li class="active">Data Tabel Kegiatan</li>
                                </ol>
                            </div>
                            <div class="box box-solid box-primary"><!-- Primary box -->
                                <div class="box-header">
                                    <h3 class="box-title">Data Laporan Kegiatan</h3>
                                </div>
                                <div class="box-body">
                                    
                                        <div class="row">
                                            <form method="post" action="">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Tahun</label>
                                                    <select class="form-control" autocomplete="off" name="tahun_laporan_kegiatan" id="tahun_laporan_kegiatan">
                                                        <option value="">Pilih Tahun</option>
                                                        <?php if( !empty($years) ): ?>
                                                            <?php foreach($years as $key => $val): ?>
                                                                <option value="<?php echo $key; ?>" <?php echo ( $year == $val ? 'selected="selected"' : '' ); ?>><?php echo $val; ?></option>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Bulan</label>
                                                    <select class="form-control" autocomplete="off" name="bulan_laporan_kegiatan" id="bulan_laporan_kegiatan" 
                                                        <?php echo ( !empty($year) && !empty($month) ? '' : 'disabled="disabled"' ); ?>>
                                                        <option value="">Pilih Bulan</option>
                                                        <option value="01" <?php echo ( $month == '01' ? 'selected="selected"' : '' ); ?>>Januari</option>
                                                        <option value="02" <?php echo ( $month == '02' ? 'selected="selected"' : '' ); ?>>Pebruari</option>
                                                        <option value="03" <?php echo ( $month == '03' ? 'selected="selected"' : '' ); ?>>Maret</option>
                                                        <option value="04" <?php echo ( $month == '04' ? 'selected="selected"' : '' ); ?>>April</option>
                                                        <option value="05" <?php echo ( $month == '05' ? 'selected="selected"' : '' ); ?>>Mei</option>
                                                        <option value="06" <?php echo ( $month == '06' ? 'selected="selected"' : '' ); ?>>Juni</option>
                                                        <option value="07" <?php echo ( $month == '07' ? 'selected="selected"' : '' ); ?>>Juli</option>
                                                        <option value="08" <?php echo ( $month == '08' ? 'selected="selected"' : '' ); ?>>Agustus</option>
                                                        <option value="09" <?php echo ( $month == '09' ? 'selected="selected"' : '' ); ?>>September</option>
                                                        <option value="10" <?php echo ( $month == '10' ? 'selected="selected"' : '' ); ?>>Oktober</option>
                                                        <option value="11" <?php echo ( $month == '11' ? 'selected="selected"' : '' ); ?>>Nopember</option>
                                                        <option value="12" <?php echo ( $month == '12' ? 'selected="selected"' : '' ); ?>>Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <button type="submit" class="btn btn-primary btn-sm form-control" id="btn_laporan" <?php echo ( !empty($year) && !empty($month) ? '' : 'disabled="disabled"' ); ?>>Tampilkan</button>
                                                </div>
                                            </div>
                                            </form>
                                            
                                            <form action="" method="post" id="form_cetak_laporan">
                                            <div class="col-md-2 pull-right">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <button class="btn btn-info btn-sm form-control btn_export">
                                                        <i class="glyphicon glyphicon-export"></i> Cetak Data
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-header">
                                                <h3>
                                                    <center>
                                                        Laporan Kegiatan <?php echo ( !empty($year) && !empty($month) ? 'Bulan '.$bulan[intval($month) - 1].' Tahun '.$year.'' : '' ); ?>
                                                    </center>
                                                </h3>
                                            </div>
                                            <div class="table-responsive" style="overflow: scroll;">
                                            <table class="table table-bordered table-striped" align="center">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Kegiatan</th>
                                                        <th colspan="4" style="text-align: center;">Minggu</th>
                                                        <th style="text-align: center;" <?php echo ( !empty($users) ? 'colspan="'. round( count($users) /* - 1 */ ) .'"' : '' ); ?>>Personel</th>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: middle;">1</th>
                                                        <th style="text-align: center; vertical-align: middle;">2</th>
                                                        <th style="text-align: center; vertical-align: middle;">3</th>
                                                        <th style="text-align: center; vertical-align: middle;">4</th>
                                                        <?php if( !empty($users) ): ?>
                                                            <?php foreach($users as $usr): ?>
                                                                <?php //if($usr->status_pengguna != "admin"): ?>
                                                                    <th><?php echo ucwords(strtolower($usr->nama)); ?></th>
                                                                <?php //endif ?>
                                                            <?php endforeach ?>
                                                        <?php else: ?>
                                                            <th style="text-align: center;">Personel</th>
                                                        <?php endif ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if( !empty($kategori) ): ?>
                                                        <?php $i = 1; ?>
                                                        <?php foreach($kategori as $kat): ?>
                                                            <tr>
                                                                <td style="background-color: #E3F0F7; font-weight: bold; text-align: center;"><?php echo $i; ?></td>
                                                                <td style="background-color: #E3F0F7; font-weight: bold;" colspan="<?php echo round(7 + count($users) /* - 1 */); ?>"><?php echo $kat->nama_kategori; ?></td>
                                                            </tr>
                                                            <?php $kegiatan = $this->model_dokumen->view_kegiatan_by_kategori($kat->id_kategori); ?>
                                                            <?php if( !empty($kegiatan) ): ?>
                                                                <?php foreach($kegiatan as $keg): ?>
                                                                    <?php
                                                                        $laporan_minggu1 = $this->model_dokumen->get_dokumen_per_week(1, intval($month), $year, $keg->id_kegiatan);
                                                                        $laporan_minggu2 = $this->model_dokumen->get_dokumen_per_week(2, intval($month), $year, $keg->id_kegiatan);
                                                                        $laporan_minggu3 = $this->model_dokumen->get_dokumen_per_week(3, intval($month), $year, $keg->id_kegiatan);
                                                                        $laporan_minggu4 = $this->model_dokumen->get_dokumen_per_week(4, intval($month), $year, $keg->id_kegiatan);
                                                                        $laporan_minggu5 = $this->model_dokumen->get_dokumen_per_week(5, intval($month), $year, $keg->id_kegiatan);
                                                                    ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $keg->jenis_kegiatan; ?></td>
                                                                        <td <?php echo ( $laporan_minggu1 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                                                            <?php //echo ( $laporan_minggu1 > 0 ? $laporan_minggu1 : '' ); ?>
                                                                        </td>
                                                                        <td <?php echo ( $laporan_minggu2 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                                                            <?php //echo ( $laporan_minggu2 > 0 ? $laporan_minggu2 : '' ); ?>
                                                                        </td>
                                                                        <td <?php echo ( $laporan_minggu3 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                                                            <?php //echo ( $laporan_minggu3 > 0 ? $laporan_minggu3 : '' ); ?>
                                                                        </td>
                                                                        <td <?php echo ( $laporan_minggu4 > 0 || $laporan_minggu5 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                                                            <?php //echo ( $laporan_minggu4 > 0 || $laporan_minggu5 > 0 ? $laporan_minggu4 + $laporan_minggu5 : '' ); ?>
                                                                        </td>
                                                                        <?php if( !empty($users) ): ?>
                                                                            <?php foreach($users as $usr): ?>
                                                                                <?php //if($usr->status_pengguna != "admin"): ?>
                                                                                    <th style="text-align: center; vertical-align: middle;">
                                                                                    <?php
                                                                                        $dokumen_per_user = $this->model_dokumen->get_dokumen_per_user(intval($month), $year, $usr->nip, $keg->id_kegiatan);
                                                                                        echo ( $dokumen_per_user > 0 ? $dokumen_per_user : '-' );
                                                                                    ?>
                                                                                    </th>
                                                                                <?php //endif ?>
                                                                            <?php endforeach ?>
                                                                        <?php else: ?>
                                                                            <th style="text-align: center; vertical-align: middle;">-</th>
                                                                        <?php endif ?>
                                                                        <td style="text-align: center; vertical-align: middle;">
                                                                        <?php
                                                                            $dokumen_per_kegiatan_total = $this->model_dokumen->get_dokumen_per_kegiatan_total(intval($month), $year, $keg->id_kegiatan);
                                                                            echo ( $dokumen_per_kegiatan_total > 0 ? $dokumen_per_kegiatan_total : '-' );
                                                                        ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                            
                                                            <?php $i++; ?>
                                                        <?php endforeach ?>
                                                    <?php else: ?>
                                                    <tr>
                                                        <td colspan="8" style="text-align: center; vertical-align: middle;"><strong>Data Belum Ada</strong></td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- Primary box -->
                    </div>
                </section><!-- /.content -->
                <?PHP
                    $this->load->view('view_admin_footer.php');
                ?>
            </aside><!-- /.right-side -->

        <?PHP
            $this->load->view('view_admin_modal_tambah_dokumen');
            $this->load->view('view_admin_modal_edit_pengguna');
            $this->load->view('view_admin_modal_export_notulensi');
            $this->load->view('view_admin_modal_confirm');
            $this->load->view('view_admin_modal_edit_profil');
            $this->load->view('view_admin_modal_edit_username');
            
            $this->load->view('user/view_staff_modal_tambah_dokumen');
            $this->load->view('user/view_staff_modal_masukkan_nip');
            $this->load->view('view_admin_modal_edit_dokumen');
        ?>
        
        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes  
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"><!-- </script>
        
        
        
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
                
                $("#tahun_laporan_kegiatan").change(function(e){
                    e.preventDefault();
                    
                    var year    = $(this).val();
                    var el      = $('#bulan_laporan_kegiatan');
                    var el_btn  = $('#btn_laporan');
                    
                    if(year != ""){      
                        el.removeAttr('disabled');
                    }else{
                        el.val("");
                        el.attr('disabled','disabled');
                        el_btn.attr('disabled','disabled');
                    }
                    return false;
        		});
                
                $("#bulan_laporan_kegiatan").change(function(e){
                    e.preventDefault();
                    
                    var month   = $(this).val();
                    var el      = $('#btn_laporan');
                    
                    if(month != ""){      
                        el.removeAttr('disabled');
                    }else{
                        el.attr('disabled','disabled');
                    }
                    return false;
                });
                
                //button edit
                $(".edit").click(function(){
        			var id = this.id.substr(5);
        			$('#id_datadiri_tmp_admin').val(id);
                    $('#nip_admin').val($('#nip_' + id).val());
                    $('#nama_admin').val($('#nama_' + id).val());
                    $('#jenis_kelamin_admin').val($('#jenis_kelamin_' + id).val());
        			$('#jabatan_admin').val($('#jabatan_' + id).val());
        			$('#alamat_admin').val($('#alamat_' + id).val());
        			$('#tempat_lahir_admin').val($('#tempat_lahir_' + id).val());
        			$('#tanggal_lahir_admin').val($('#tanggal_lahir_' + id).val());
        			$('#agama_admin').val($('#agama_' + id).val());
        			$('#status_perkawinan_admin').val($('#status_perkawinan_' + id).val());
        			$('#no_hp_admin').val($('#no_hp_' + id).val());
        			$('#email_admin').val($('#email_' + id).val());
                    $('#jabatan_admin').attr('readonly',true);
        					
        		});
                
                $(".edit_username").click(function(){
        			var id = this.id.substr(13);
        			
        			$('#nip_tmp_admin').val(id);
                    $('#username_admin').val($('#username_' + id).val());
        					
        		});
                
                //button modal
                $('#password_baru_admin').attr('readonly',true);
                $('#ulangi_admin').attr('readonly',true);
                
                $("#password_admin").click(function() {
                    $('#password_baru_admin').attr('readonly',false);
        		});
                
                $("#password_baru_admin").click(function() {
                    $('#ulangi_admin').attr('readonly',false);
        		});
                
                $("#batal").click(function() {
                    $('#password_baru_admin').attr('readonly',true);
                    $('#ulangi_admin').attr('readonly',true);
        		});
                
                $("#simpan").click(function() {
                    $('#password_baru_admin').attr('readonly',true);
                    $('#ulangi_admin').attr('readonly',true);
        		});
                
                //button delete
                $(".delete").click(function() {
        			$("#delete_all_dokumen").hide();
                    $("#delete_dokumen").show();
        			
        			$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
        			var id = this.id.substr(7);
        			$('#nip').val(id);
        		});
                
                $(".delete_all").click(function() {
                    $("#delete_all_dokumen").show();
                    $("#delete_dokumen").hide();
        			$("#confirm_str").html("<b>Peringatan!.</b> Apakah anda yakin ingin menghapus semua data. Data yang sudah dihapus tidak dapat dikembalikan seperti semula ?");
        		});
    		
                //button ok
                $(".ok").click(function() {
                    
        			$.post("<?PHP echo base_url(); ?>admin/delete_pengguna/", {nip: $("#nip").val() }, 
        				function() {
        					window.location = '<?PHP echo base_url(); ?>admin/pengguna';
        				}
        			);
        		});
        		$(".ok_all").click(function() {
        			$.post("<?PHP echo base_url(); ?>admin/delete_all_pengguna", {}, 
        				function() {
        					window.location = "<?PHP echo base_url(); ?>admin/pengguna";
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
                    $('#form_export_excel').attr('action','<?PHP echo base_url(); ?>admin/export_excel/excel_detail_laporan');
        		});
        
                //button export to pdf
        		$('.pdf').click(function() {
                    $('#form_export').attr('action','<?PHP echo base_url(); ?>admin/export_pdf/pdf_detail_laporan_kegiatan');
        		});
                
                $('.btn_export').click(function(){
                    var tahun = $("#tahun_laporan_kegiatan").val();
                    var bulan = $("#bulan_laporan_kegiatan").val();
                    //$.post("<?PHP echo base_url(); ?>admin/export_pdf/pdf_cetak_laporan_kegiatan/" + tahun + "/" + bulan, {}, );
                    $('#form_cetak_laporan').attr('action','<?PHP echo base_url(); ?>admin/export_pdf/pdf_cetak_laporan_kegiatan/' + tahun + "/" + bulan);
        		
                });
               
                
            });
        </script>
        
    </body>
</html>
