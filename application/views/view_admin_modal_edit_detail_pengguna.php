<!-- MODAL EDIT -->
        <div class="modal fade" id="edit_detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Ubah Detail Pengguna</h4>
                    </div>
                    <form action="<?php echo base_url()?>admin/tambah_dokumen" method="post" enctype="multipart/form-data" id="form_edit_detail_pengguna">
                        <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai" id="nip">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control" name="jabatan">
                                    <option>Kepala Bidang INATEK</option>
                                    <option>Kepala Subbidang Alih Teknologi</option>
                                    <option>Kepala Subbidang Inkubasi Teknologi</option>
                                    <option>Staff Subbidang Alih Teknologi</option>
                                    <option>Staff Subbidang Inkubasi Teknologi</option>
                                    <option>Peneliti/Staff Subbidang Alih Teknologi</option>
                                    <option>Peneliti/Staff Subbidang Inkubasi Teknologi</option>
                                    <option>Perekayasa/Staff Subbidang Alih Teknologi</option>
                                    <option>Perekayasa/Staff Subbidang Inkubasi Teknologi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            </div><!-- col-md-6 -->
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datemask3"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                    <option>Islam</option>
                                    <option>Kristen Protestan</option>
                                    <option>Kristen Katolik</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                </select>
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>Status Perkawinan</label>
                                <select class="form-control" name="status_perkawinan">
                                    <option>Menikah</option>
                                    <option>Belum Menikah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-earphone"></i>
                                    </div>
                                    <input type="text" name="no_hp" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status Pengguna</label>
                                <select class="form-control" name="status_pengguna" id="status_pengguna">
                                    <option>Staff</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                            </div><!-- col-md-6 -->
                        </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-edit"></i> Perbarui Detail Pengguna</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->