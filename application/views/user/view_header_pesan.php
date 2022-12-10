<!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <?php
                        $query = $this->model_pesan->jumlah_pesan_baru_per_username($this->session->userdata('username_staff'));
        		        $nums   = $query->num_rows();
                        if($nums != 0){
                  ?>
                  <span class="label bg-yellow"><?php echo $query->num_rows(); ?></span>
                  <?php } ?>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Menerima <?php echo $query->num_rows(); ?> pesan belum dibaca</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?PHP
                            $query  = $this->model_pesan->view_detail_pesan($this->session->userdata('username_staff'));
                            foreach($query->result() as $row) :
                        ?>
                      <li><!-- start message -->
                        <a href="#">
                          <!--
                          <div class="pull-left">
                            <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          -->
                          <h4>
                            <?php echo $row->pengirim;?>
                        </h4>
                        <p><?php echo $row->subjek;?></p>
                        </a>
                      </li><!-- end message -->
                      <?PHP endforeach; ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo base_url();?>pesan">Lihat Selengkapnya</a></li>
                </ul>
              </li>