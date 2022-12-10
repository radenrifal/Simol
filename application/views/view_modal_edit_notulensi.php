<!-- MODAL TAMBAH -->
        <div class="modal fade" id="modal_edit_notulensi_rapat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Ubah Data Notulensi Rapat</h4>
                    </div>
                    <form action="<?php echo base_url();?>notulensi_rapat/update_notulensi_rapat" method="POST" enctype="multipart/form-data" id="form_notulensi_rapat">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_notulensi_tmp" class="form-control pull-right" id="id_notulensi_tmp" />
                                <input type="hidden" name="nip" class="form-control pull-right" id="nip" value="<?php echo $this->session->userdata('nip_staff'); ?>"/>
                            </div><!-- /.form group -->
                            <!-- select -->
                            <div class="form-group">
                                <label>Hari</label>
                                <select class="form-control" name="hari" id="hari">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Tanggal Rapat</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggal_rapat" class="form-control pull-right" id="tanggal_rapat" placeholder="yyyy/mm/dd"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>Pembahasan</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="pembahasan" id="pembahasan" type="text" class="form-control" placeholder="Pembahasan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Penyelenggara</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="penyelenggara" id="penyelenggara" type="text" class="form-control" placeholder="Penyelenggara" required>
                                </div>
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>Tempat</label>
                                <select class="form-control" name="tempat" id="tempat">
                                    <option value="Ruang Rapat 111 Pusat Inovasi LIPI">Ruang Rapat 111 Pusat Inovasi LIPI</option>
                                    <option value="Ruang Rapat 121 Pusat Inovasi LIPI">Ruang Rapat 121 Pusat Inovasi LIPI</option>
                                    <option value="Ruang Rapat 208 Pusat Inovasi LIPI">Ruang Rapat 208 Pusat Inovasi LIPI</option>
                                    <option value="Ruang Rapat 209 Pusat Inovasi LIPI">Ruang Rapat 209 Pusat Inovasi LIPI</option>
                                    <option value="Ruang Rapat Kepala Pusat Inovasi LIPI">Ruang Rapat Kepala Pusat Inovasi LIPI</option>
                                    <option value="Auditorium Pusat Inovasi LIPI">Auditorium Pusat Inovasi LIPI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Peserta</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" glyphicon glyphicon-user"></i></span>
                                    <input name="peserta" id="peserta" type="text" class="form-control" placeholder="Peserta" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Notulis</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <input name="notulis" id="notulis" type="text" class="form-control" placeholder="Notulis" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Masukan Dokumen</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                                    <input id="userfile" type="file" name="userfile"/>
                                </div>
                                <p class="help-block">Max. 100MB</p>
                            </div>
                        </div>    
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" data-target="form_notulensi_rapat"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left" ><i class="fa fa-check-square"></i> Perbaharui</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->