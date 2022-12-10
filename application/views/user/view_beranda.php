<?PHP
	$this->load->view('user/view_header');
	$this->load->view('user/view_menu');
?>
          
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
        <!-- Content Header (Page header) -->
        <?php if($this->session->userdata('nip_staff') != ""){ ?>
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-home"></i> &nbsp;&nbsp;Beranda</h1>
        </section>
        <?php } ?>
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box-body">
                    <?php if($this->session->userdata('nip_staff') == ""){ ?>
                    <div class="col-md-12">
                        <?PHP if(!empty($status)){ ?>
                			<?php if($status == "error"){ ?>
                        	<div class="box-body">
                            	<div class="alert alert-danger alert-dismissable">
                                	<i class="fa fa-ban"></i>
                                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                   	<b>Maaf !! Segera ulangi nama pengguna dan kata sandi anda </b>
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
                                   	<b>Ubah nama pengguna dan kata sandi berhasil</b>
                				</div>
                			</div><!-- /.box-body -->
                            <?PHP } ?>
                		<?php } ?>
                    </div>
                    <div class="jumbotron">
                   	    <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-body">
                                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="<?php echo base_url(); ?>assets/img/slider/slider1.jpg" alt="First slide">
                                                    <div class="carousel-caption">
                                                        <h2><center>Sistem Informasi <i>Monitoring</i> Laporan</center></h2>
                                                        <center><p>Bidang Inkubasi dan Alih Teknologi (INATEK)</p></center>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <img src="<?php echo base_url(); ?>assets/img/slider/slider2.jpg" alt="First slide">
                                                </div>
                                                <div class="item">
                                                    <img src="<?php echo base_url(); ?>assets/img/slider/slider3.jpg" alt="First slide">
                                                </div>
                                                <div class="item">
                                                    <img src="<?php echo base_url(); ?>assets/img/slider/slider4.jpg" alt="First slide">
                                                    <div class="carousel-caption">
                                                        <h2><center>Sistem Informasi <i>Monitoring</i> Laporan</center></h2>
                                                        <center><p>Bidang Inkubasi dan Alih Teknologi (INATEK)</p></center>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div>
                    </div>
                    
                    <?php }elseif($this->session->userdata('nip_staff') != ""){ ?>
                    <?PHP if(!empty($status)){ ?>
            			<?php if($status == "success"){ ?>
                    	<div class="box-body">
                        	<div class="alert alert-success alert-dismissable">
                            	<i class="fa fa-check-square-o"></i>
                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               	<b>Ubah nama pengguna dan kata sandi berhasil</b>
            				</div>
            			</div><!-- /.box-body -->
                        <?PHP } ?>
            		<?php } ?>
                    <div class="row">
                        <div class="col-xs-12"><!-- col-md-12 -->
                    
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <!--<li class="active"><a href="#tab_1" data-toggle="tab">Jadwal Kegiatan</a></li>-->
                                <li class="active"><a href="#tab_2" data-toggle="tab">Dokumen Kegiatan</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Notulensi Rapat</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_2">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-12"><!-- col-md-12 -->
                                            <div class="box-header">
                                                <h3 class="box-title"><b>Data Dokumen</b></h3>
                                            </div>
                                            <div class="box-body table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
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
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <center><?php echo $no++?></center>
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
                                                            <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php if($row->status_dokumen == 'Diterima'){ ?>Selesai<?php } ?>
                                                                <?php if($row->status_dokumen == 'Gagal Diterima'){ ?>Perbaiki<?php } ?>
                                                                <?php if($row->status_dokumen == 'Dalam Pengecekan'){ ?>Menunggu<?php } ?>
                                                            </td>
                                                            <input type="hidden" id="status_dokumen_<?php echo $row->id_kegiatan; ?>" 
                                                            value="<?php echo $row->status_dokumen; ?>" />
                                                            <td>
                                                                <?php if($row->status_dokumen == 'Diterima'){ ?>
                                                                <a href="<?php echo site_url();?>assets/dokumen/<?php echo $row->file_dokumen; ?>" 
                                                                class="btn btn-default btn-sm download" title="Unduh">
                                                                    <span class="glyphicon glyphicon-download"></span>
                                                                </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?PHP
                                                   	    endforeach;
                                				    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-body -->
                            </div><!-- /.tab-pane -->
                            
                            <div class="tab-pane" id="tab_3">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-12"><!-- col-md-12 -->
                                            <div class="box-header">
                                                <h3 class="box-title"><b>Data Notulensi Rapat </b></h3>
                                            </div>
                                            <div class="box-body table-responsive">
                                                <table id="example3" class="table table-bordered table-striped">
                                                    <?php if($this->session->userdata('nip_staff') != ""){ ?>
                                                    <thead>
                                                        <tr>
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
                                                            <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <center><?php echo $no++;?></center></td>
                                                            <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php echo $row->nama; ?></td>
                                                            <input type="hidden" id="id_notulensi_<?php echo $row->id_notulensi; ?>" 
                                                            value="<?php echo $row->id_notulensi; ?>" />
                                                            <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                                                                <?php echo $row->hari.', '.$tanggal?></td>
                                                            <input type="hidden" id="tanggal_rapat_<?php echo $row->id_notulensi; ?>" 
                                                            value="<?php echo $row->hari.', '.$tanggal; ?>" />
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
                                                                <?php if($row->status_notulensi == 'Diterima'){ ?>Selesai<?php } ?>
                                                                <?php if($row->status_notulensi == 'Gagal Diterima'){ ?>Perbaiki<?php } ?>
                                                                <?php if($row->status_notulensi == 'Dalam Pengecekan'){ ?>Menunggu<?php } ?>
                                                            </td>
                                                            <input type="hidden" id="status_notulensi_<?php echo $row->id_notulensi; ?>" 
                                                            value="<?php echo $row->status_notulensi; ?>" />
                                                            <td>
                                                                <?php if($row->status_notulensi == 'Diterima'){ ?>
                                                                <a href="<?php echo site_url();?>assets/dokumen/notulensi rapat/<?php echo $row->file_notulensi; ?>" 
                                                                class="btn btn-default btn-sm download" title="Unduh">
                                                                    <span class="glyphicon glyphicon-download"></span>
                                                                </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?PHP endforeach; ?>
                                                    </tbody>
                                                    <?php } ?>
                                                
                                                </table>
                                            </div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-body -->
                            </div><!-- /.tab-pane -->
                        </div>
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col-md-12 -->
                
                </div><!-- /.row -->
                <?php } ?>
                </div><!-- /.box -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
    $this->load->view('user/view_staff_modal_tambah_dokumen');
    $this->load->view('user/view_staff_modal_masukkan_nip');
    $this->load->view('user/view_footer');
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
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- User Defined -->
    <script src="<?php echo base_url();?>assets/js/userdefined.js" type="text/javascript"></script>
    <!-- User Defined -->
    <script src="<?php echo base_url();?>assets/js/userdefined1.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>

<!-- Page specific script -->
    <script type="text/javascript">
      $(function() {
            $("#example1").dataTable();
            $("#example3").dataTable();
            $('.alert').fadeOut(5000);
        });
    </script>
    </body>
</html>