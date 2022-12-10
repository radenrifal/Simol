<!-- MODAL EDIT USERNAME DAN PASSWORD -->
        <div class="modal fade" id="modal_admin_edit_username" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Ubah Nama Pengguna Admin dan Kata Sandi</h4>
                    </div>
                    <form action="<?php echo base_url();?>admin/update_username_password" method="POST" id="form_username_password">
                        <div class="modal-body">
                            <div class="form-group">
                                <input name="nip_tmp" id="nip_tmp_admin" type="hidden" class="form-control" required>
                                <label>Masukan Nama Pengguna</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-user"></i></span>
                                    <input name="username" id="username_admin" type="text" class="form-control" placeholder="Nama Pengguna" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi Anda</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-pencil"></i></span>
                                    <input name="password" id="password_admin" type="password" class="form-control" placeholder="Kata Sandi Anda" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi Baru</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-pencil"></i></span>
                                    <input name="password_baru" id="password_baru_admin" type="password" class="form-control" placeholder="Kata Sandi Baru" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Kata Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-pencil"></i></span>
                                    <input name="ulangi" id="ulangi_admin" type="password" class="form-control" placeholder="Ulangi Kata Sandi" required>
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" id="batal" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left" id="simpan" form="form_username_password"><i class="glyphicon glyphicon-edit"></i> Perbaharui</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->