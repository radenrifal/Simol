<!-- MODAL TAMBAH -->
        <div class="modal fade" id="modal_tambah_pengguna" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Tambah Pengguna</h4>
                    </div>
                    <form action="<?php echo base_url()?>admin/tambah_pengguna" method="post"  id="form_tambah_pengguna">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIP</label><br />
                                <small style="color:#F00">* Contoh : 197503082002121004</p></small>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="nip" id="nip" type="text" class="form-control" placeholder="Nomor Induk Pegawai" onkeyup="angka(this);"
                                    maxlength="18" />
                                    <input type="hidden" name="nip_tmp" id="nip_tmp" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="username" id="username" type="text" class="form-control" placeholder="Nama Pengguna">
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Kata Sandi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Kata Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <input name="repassword" id="repassword" type="password" class="form-control" placeholder="Ulangi Kata Sandi">
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <label>Status Pengguna</label>
                                <select class="form-control" name="status_pengguna">
                                    <option value="Staff">Staff</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Pengguna</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->