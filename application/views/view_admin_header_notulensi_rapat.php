<!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <?php
								    $query = $this->model_admin_notulensi_rapat->jumlah_notulensi_rapat();	
								    $nums   = $query->num_rows();
                                    if($nums != 0){
                                ?>
                                <span class="label bg-blue"><?php echo $query->num_rows(); ?></span>
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Menerima <?php echo $query->num_rows(); ?> dokumen belum diterima</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?PHP
                                            $query = $this->model_admin_notulensi_rapat->view_detail_notulensi_rapat();
                                            foreach($query->result() as $row) :
                                        ?>
                                        <li><!-- start message -->
                                            <a href="#">
                                                <!--
                                                <div class="pull-left">
                                                    <img src="<?php echo base_url();?>assets/img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                -->
                                                <h4>
                                                    <?php echo $row->nama;?>
                                                </h4>
                                                <p><?php echo $row->pembahasan;?></p>
                                            </a>
                                        </li><!-- end message -->
                                        <?PHP endforeach; ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?php echo base_url();?>admin/notulensi_rapat">Lihat Selengkapnya</a></li>
                            </ul>
                        </li>