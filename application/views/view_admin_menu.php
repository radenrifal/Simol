            <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel Jam -->
                    <div class="user-panel">
                        <!--
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>assets/img/avatar3.png" class="img-circle" alt="Admin Gambar" />
                        </div>
                        -->
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('nama_admin') ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less / Menu-->
                    <ul class="sidebar-menu">
                        <li<?PHP if($this->uri->segment(2) == 'menu_utama') echo ' class="active"'; ?>><!-- Menu Utama -->
                            <a href="<?php echo site_url(); ?>admin/menu_utama">
                                <i class="fa fa-th"></i> <span>Menu Utama</span>
                            </a>
                        </li><!-- Menu Utama -->
                        <li<?PHP if($this->uri->segment(2) == 'tentang_kami') echo ' class="active"'; ?>><!-- Tentang Kami -->
                            <a href="<?PHP echo site_url(); ?>admin/tentang_kami">
                                <i class="glyphicon glyphicon-user"></i> <span>Tentang Sistem</span>
                            </a>
                        </li><!-- Tentang Kami -->
                        <li<?PHP if($this->uri->segment(2) == 'pengguna') echo ' class="active"'; ?>><!-- Pengguna -->
                            <a href="<?PHP echo site_url(); ?>admin/pengguna">
                                <i class="fa fa-users"></i> 
                                <span>Pengguna</span>
                                <?php
                                    $query  = $this->model_admin_pengguna->jumlah_pengguna();
                                    $nums   = $query->num_rows();
                                    if($nums != 0){
                                ?>
                                
                                <small class="badge pull-right bg-navy"><?php echo $query->num_rows(); ?></small>
                                <?php } ?>
                            </a>
                        </li><!-- Pengguna -->
                        <li class="treeview"><!-- Dokumen -->
                            <a href="">
                                <i class="glyphicon glyphicon-folder-open"></i>
                                <span>Dokumen</span>
                                <?php
                                    $query = $this->model_dokumen->jumlah_dokumen();
                                    $nums   = $query->num_rows();
                                    if($nums != 0){
                                ?>
                                <small class="badge pull-right bg-blue"><?php echo $query->num_rows(); ?></small>
                                <i class="fa fa-angle-left pull-right"></i>
                                <?php } ?>
                            </a>
                            <ul class="treeview-menu">
                                <li<?PHP if($this->uri->segment(2) == 'detail_dokumen') echo ' class="active"'; ?>>
                                    <a href="<?PHP echo site_url(); ?>admin/detail_dokumen"><i class="fa fa-angle-double-right">
                                    </i>Semua Dokumen
                                    <?php
    								   $query = $this->model_dokumen->jumlah_dokumen();
                                       $nums   = $query->num_rows();
                                        if($nums != 0){
    								?>
                                    <small class="badge pull-right bg-blue"><?php echo $query->num_rows(); ?></small>
                                    <?php } ?>
                                    </a>
                                </li>
                                <li<?PHP if($this->uri->segment(2) == 'dokumen_per_kegiatan') echo ' class="active"'; ?>>
                                    <a href="<?PHP echo site_url(); ?>admin/dokumen_per_kegiatan"><i class="fa fa-angle-double-right">
                                    </i>Dokumen Per Kegiatan</a>
                                </li>
                                <!--
                                <li<?PHP if($this->uri->segment(2) == 'inkubasi_teknologi') echo ' class="active"'; ?>>
                                    <a href="<?PHP echo site_url(); ?>admin/inkubasi_teknologi"><i class="fa fa-angle-double-right">
                                    </i>Inkubasi Teknologi</a>
                                </li>
                                -->
                            </ul>
                        </li>
                        <li<?PHP if($this->uri->segment(2) == 'notulensi_rapat') echo ' class="active"'; ?>><!-- Notulensi Rapat -->
                            <a href="<?PHP echo site_url(); ?>admin/notulensi_rapat">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <span>Notulensi Rapat</span>
                                <?php
                                    $query = $this->model_admin_notulensi_rapat->jumlah_notulensi_rapat();
                                    $nums   = $query->num_rows();
                                    if($nums != 0){
                                ?>
                                <small class="badge pull-right bg-blue"><?php echo $query->num_rows(); ?></small>
                                <?php } ?>
                            </a>
                        </li><!-- Notulensi Rapat -->
                        
                        <li class="treeview"
                            <?PHP if($this->uri->segment(2) == 'kegiatan' || $this->uri->segment(2) == 'diagram_kategori'
                                    || $this->uri->segment(2) == 'diagram_kegiatan' || $this->uri->segment(2) == 'diagram_notulensi_rapat') 
                                    echo ' class="active"'; ?>><!-- Kegiatan -->
                            <a href="">
                                <i class="glyphicon glyphicon-tasks"></i>
                                <span>Pelaporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu"
                                <?PHP if($this->uri->segment(2) == 'kegiatan' || $this->uri->segment(2) == 'diagram_kategori'
                                    || $this->uri->segment(2) == 'diagram_kegiatan' || $this->uri->segment(2) == 'diagram_notulensi_rapat') 
                                    echo ' class="active"'; ?>>
                                <!--
                                <li<?PHP //if($this->uri->segment(2) == 'jadwal_kegiatan') echo ' class="active"'; ?>>
                                    <a href="<?PHP //echo site_url(); ?>admin/jadwal_kegiatan"><i class="fa fa-angle-double-right">
                                    </i>Jadwal Kegiatan</a>
                                </li>
                                -->
                                <li<?PHP if($this->uri->segment(2) == 'kegiatan') echo ' class="active"'; ?>>
                                    <a href="<?PHP echo site_url(); ?>admin/kegiatan"><i class="fa fa-angle-double-right">
                                    </i>Kelola Kegiatan</a>
                                </li>
                                <li class="treeview">
                                    <a href=""><i class="fa fa-angle-double-right">
                                    </i>Diagram</a>
                                    <ul class="treeview-menu">
                                        <li<?PHP if($this->uri->segment(2) == 'diagram_kategori') echo ' class="active"'; ?>>
                                            <a href="<?PHP echo site_url(); ?>admin/diagram_kategori"><i class="fa fa-angle-double-right">
                                            </i>Diagram Kategori</a>
                                        </li>
                                        <li<?PHP if($this->uri->segment(2) == 'diagram_kegiatan') echo ' class="active"'; ?>>
                                            <a href="<?PHP echo site_url(); ?>admin/diagram_kegiatan"><i class="fa fa-angle-double-right">
                                            </i>Diagram Kegiatan</a>
                                        </li>
                                        <li<?PHP if($this->uri->segment(2) == 'diagram_notulensi_rapat') echo ' class="active"'; ?>>
                                            <a href="<?PHP echo site_url(); ?>admin/diagram_notulensi_rapat"><i class="fa fa-angle-double-right">
                                            </i>Diagram Notulensi Rapat</a>
                                        </li>
                                    </ul>
                                </li>
                                <li<?PHP if($this->uri->segment(2) == 'laporan_kegiatan') echo ' class="active"'; ?>>
                                    <a href="<?PHP echo site_url(); ?>admin/laporan_kegiatan"><i class="fa fa-angle-double-right">
                                    </i>Laporan Kegiatan</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li<?PHP if($this->uri->segment(2) == 'pesan') echo ' class="active"'; ?>>
                        <!-- Pesan -->    
                            <a href="<?PHP echo site_url(); ?>admin/pesan">
                                <i class="fa fa-envelope"></i>
                                <span>Pesan</span>
                                <?php
								    $query = $this->model_pesan->jumlah_pesan_baru_per_username($this->session->userdata('username'));
								    $nums   = $query->num_rows();
                                    if($nums != 0){
                                ?>
                                <small class="badge pull-right bg-yellow"><?php echo $query->num_rows(); ?></small>
                                <?php } ?>
                            </a>
                        </li><!-- Pesan -->
                        <li<?PHP if($this->uri->segment(2) == 'template_pesan') echo ' class="active"'; ?>><!-- Template Pesan -->
                            <a href="<?PHP echo site_url(); ?>admin/template_pesan">
                                <i class="glyphicon glyphicon-file"></i> <span>Template Pesan</span>
                            </a>
                        </li><!-- Tentang Kami -->
                    </ul>
                </section>
                <!-- /.sidebar -->