<!-- Notulensi Rapat: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <?php
                     $query = $this->model_dokumen->jumlah_dokumen_per_username($this->session->userdata('username_staff'));
                     $nums   = $query->num_rows();
                     if($nums != 0){
                  ?>
                  <span class="label bg-red"><?php echo $query->num_rows(); ?></span>
                  <?php } ?>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Menerima <?php echo $query->num_rows(); ?> dokumen belum dibaca</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?PHP
                            $query  = $this->model_dokumen->jumlah_dokumen_per_username($this->session->userdata('username_staff'));
                            foreach($query->result() as $row) :
                        ?>
                      <li><!-- start message -->
                        <a href="#">
                          <!--<div class="pull-left">
                            <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          -->
                            <h4>
                                <?php echo $row->nama;?>
                            </h4>
                            <p><?php echo $row->judul_dokumen;?></p>
                        </a>
                      </li><!-- end message -->
                      <?PHP endforeach; ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo base_url();?>dokumen">Lihat Selengkapnya</a></li>
                </ul>
              </li>