<!-- MODAL TAMBAH -->
        <div class="modal fade" id="modal_admin_edit_profil" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Ubah Datadiri Admin</h4>
                    </div>
                    <form action="<?php echo base_url();?>admin/update_datadiri" method="POST" enctype="multipart/form-data" id="form_edit_datadiri">
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_datadiri_tmp" id="id_datadiri_tmp_admin" class="form-control" readonly="hidden">
                                <label>NIP</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input type="text" name="nip" id="nip_admin" class="form-control" placeholder="Nomor Induk Pegawai" readonly="hidden">
                                </div>
                                <br/>
                                <label>Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                    <input type="text" name="nama" id="nama_admin" class="form-control" placeholder="Nama Lengkap">
                                </div>
                                <br/>
                                <!-- select -->
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin_admin">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select class="form-control" name="jabatan" id="jabatan_admin">
                                        <option value="Kepala Bidang INATEK">Kepala Bidang INATEK</option>
                                        <option value="Kepala Subbidang Alih Teknologi">Kepala Subbidang Alih Teknologi</option>
                                        <option value="Kepala Subbidang Inkubasi Teknologi">Kepala Subbidang Inkubasi Teknologi</option>
                                        <option value="Staff Subbidang Alih Teknologi">Staff Subbidang Alih Teknologi</option>
                                        <option value="Staff Subbidang Inkubasi Teknologi">Staff Subbidang Inkubasi Teknologi</option>
                                        <option value="Peneliti/Staff Subbidang Alih Teknologi">Peneliti/Staff Subbidang Alih Teknologi</option>
                                        <option value="Peneliti/Staff Subbidang Inkubasi Teknologi">Peneliti/Staff Subbidang Inkubasi Teknologi</option>
                                        <option value="Perekayasa/Staff Subbidang Alih Teknologi">Perekayasa/Staff Subbidang Alih Teknologi</option>
                                        <option value="Perekayasa/Staff Subbidang Inkubasi Teknologi">Perekayasa/Staff Subbidang Inkubasi Teknologi</option>
                                    </select>
                                </div>
                                <label>Alamat</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                    <input type="text" name="alamat" id="alamat_admin" class="form-control" placeholder="Alamat">
                                </div>
                                <br/>
                                <label>Tempat Lahir</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir_admin" class="form-control" placeholder="Tempat Lahir">
                                </div>
                            </div><!-- c0l-md-6 -->
                            
                            <div class="col-md-6"><!-- c0l-md-6 -->
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </div>
                                        <input type="text" name="tanggal_lahir" id="tanggal_lahir_admin" class="form-control datepicker pull-right" 
                                        data-date-format="yyyy-mm-dd" id="datemask3"/>
                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->
                                <!-- select -->
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" id="agama_admin">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                                <!-- select -->
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select class="form-control" name="status_perkawinan" id="status_perkawinan_admin">
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-earphone"></i>
                                        </div>
                                        <input type="text" name="no_hp" id="no_hp_admin" class="form-control" />
                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" name="email" id="email_admin" class="form-control" placeholder="Email">
                                </div>
                            </div><!-- c0l-md-6 -->
                        </div>
                        </div>    
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" data-target="form_edit_datadiri"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left" ><i class="glyphicon glyphicon-edit"></i> Perbaharui</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->