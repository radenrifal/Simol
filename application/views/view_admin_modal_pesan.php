<!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Buat Pesan Baru</h4>
                    </div>
                    <form action="<?php echo base_url();?>admin/insert_pesan" method="post">
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
                            <input name="pengirim" id="pengirim" type="hidden" class="form-control" value="<?php echo $this->session->userdata('username');?>">
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
                                <?PHP
                                    $query = $this->model_pesan->view();
                                    foreach($query->result() as $row) :
                                ?>
                                <textarea name="pesan" class="form-control ckeditor" placeholder="Pesan" style="height: 120px;">
                                    <?php echo $row->konten_pesan;?>
                                </textarea>
                                <?PHP endforeach; ?>
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