<!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU NAVIGASI</li>
            <li<?PHP if($this->uri->segment(1) == 'beranda' || $this->uri->segment(1) == "") echo ' class="active"'; ?>>
              <a href="<?PHP echo site_url(); ?>">
                <i class="glyphicon glyphicon-home"></i><span>Beranda</span>
              </a>
            </li>
            <?php
                if($this->session->userdata('nip_staff') == ""){
            ?>
            <li<?PHP if($this->uri->segment(1) == 'tentang_kami') echo ' class="active"'; ?>>
              <a href="<?PHP echo site_url(); ?>tentang_kami">
                <i class="glyphicon glyphicon-user"></i><span>Tentang Sistem</span>
              </a>
            </li>
            <?php } 
                if($this->session->userdata('nip_staff') != ""){
            ?>
            <li <?PHP if($this->uri->segment(1) == 'tentang_kami' || $this->uri->segment(1) == 'dokumen' || $this->uri->segment(1) == 'notulensi_rapat')
                echo ' class="active"'; ?> class="treeview"><!-- LAPORAN -->
              <a href="#">
                <i class="glyphicon glyphicon-folder-close"></i>
                <span>Dokumen</span>
                <span class="label label-primary pull-right"></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li<?PHP if($this->uri->segment(1) == 'dokumen') echo ' class="active"'; ?>>
                    <a href="<?PHP echo site_url(); ?>dokumen"><i class="fa fa-angle-double-right"></i>Kegiatan 
                    <?php
                        $query = $this->model_dokumen->jumlah_dokumen_per_username($this->session->userdata('username_staff'));
                        $nums   = $query->num_rows();
                        if($nums != 0){
                    ?>
                    <small class="label pull-right bg-red"><?php echo $query->num_rows(); ?></small>
                    <?php } ?>
                    </a>
                    
                </li>
                <li<?PHP if($this->uri->segment(1) == 'notulensi_rapat') echo ' class="active"'; ?>>
                    <a href="<?PHP echo site_url(); ?>notulensi_rapat"><i class="fa fa-angle-double-right"></i>Notulensi Rapat 
                    <?php
					   $query = $this->model_admin_notulensi_rapat->jumlah_notulensi_per_username($this->session->userdata('username_staff'));	
					   $nums   = $query->num_rows();
                       if($nums != 0){
                    ?>
                    <small class="label pull-right bg-red"><?php echo $query->num_rows(); ?></small>
                    <?php } ?>    
                    </a>
                </li>
              </ul>
            </li>
            <li<?PHP if($this->uri->segment(2) == 'diagram_kegiatan' || $this->uri->segment(2) == 'diagram_kategori' || $this->uri->segment(2) == 'diagram_notulensi_rapat') echo ' class="active"'; ?> class="treeview"><!-- KEGIATAN -->
              <a href="#">
                <i class="glyphicon glyphicon-tasks"></i>
                <span>Pelaporan</span>
                <span class="label label-primary pull-right"></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!--
                <li><a href=""><i class="fa fa-angle-double-right"></i> Jadwal Kegiatan </a></li>-->
                <li<?PHP if($this->uri->segment(2) == 'diagram_kegiatan' || $this->uri->segment(2) == 'diagram_kategori' || $this->uri->segment(2) == 'diagram_notulensi_rapat') echo ' class="active"'; ?>>
                    <a href="#"><i class="fa fa-angle-double-right"></i> Diagram</a>
                    <ul class="treeview-menu">
                        <li<?PHP if($this->uri->segment(2) == 'diagram_kategori') echo ' class="active"'; ?>>
                            <a href="<?PHP echo site_url(); ?>kegiatan/diagram_kategori"><i class="fa fa-angle-double-right"></i> Diagram Kategori </a>
                        </li>
                        <li<?PHP if($this->uri->segment(2) == 'diagram_kegiatan') echo ' class="active"'; ?>>
                            <a href="<?PHP echo site_url(); ?>kegiatan/diagram_kegiatan"><i class="fa fa-angle-double-right"></i> Diagram Kegiatan</a>
                        </li>
                        <li<?PHP if($this->uri->segment(2) == 'diagram_notulensi_rapat') echo ' class="active"'; ?>>
                            <a href="<?PHP echo site_url(); ?>kegiatan/diagram_notulensi_rapat"><i class="fa fa-angle-double-right"></i> Diagram Notulensi Rapat</a>
                        </li>
                      </ul>
                </li>
              </ul>
            </li>
            <li<?PHP if($this->uri->segment(1) == 'pesan') echo ' class="active"'; ?>><!-- PESAN -->
              <a href="<?PHP echo site_url(); ?>pesan">
                <i class="fa fa-envelope"></i> <span>Pesan</span>
                <?php
                    $query = $this->model_pesan->jumlah_pesan_baru_per_username($this->session->userdata('username_staff'));	// mysql_query("");
       		        $nums   = $query->num_rows();
                    if($nums != 0){
                ?>
                <small class="label pull-right bg-yellow"><?php echo $query->num_rows(); ?></small>
                <?php } ?>
              </a>
            </li>
            <?php
                }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>