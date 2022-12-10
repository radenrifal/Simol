<!-- MODAL TAMBAH -->
        <div class="modal fade" id="compose-modal-masukkan_nip" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Masuk Sistem</h4>
                    </div>
                    <form action="<?php echo base_url();?>beranda/cek_data_nip" method="POST" id="form_cek_nip">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Masukan Nama Pengguna</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-user"></i></span>
                                    <input name="username" id="username" type="text" class="form-control" placeholder="Nama Pengguna" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Masukan Kata Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-pencil"></i></span>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Kata Sandi" required>
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left" ><i class="fa fa-check"></i> Ok</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->