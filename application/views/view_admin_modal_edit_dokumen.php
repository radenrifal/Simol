<!-- MODAL EDIT -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Ubah Dokumen Kegiatan</h4>
                    </div>
                    <form action="<?php echo base_url(); ?>admin/update_dokumen" method="post" enctype="multipart/form-data" id="form_edit_dokumen">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <!-- Tambah atribut id dan data-url untuk digunakan di AJAX, 'id=kegiatan' -->
                                <!-- Atribut id buat selector jquery, atribut data-url buat AJAX url nya -->
                                <!-- URL nya di post ke controller admin_inkubasi_teknologi, function ambil_id_dokumen -->
                                <select class="form-control" name="id_kegiatan" id="edit_kegiatan">
                                    <?php 
        								$query_kegiatan = $this->model_dokumen->view_kegiatan();
        								foreach($query_kegiatan->result() as $row_kegiatan):
        							?>
        							<option value="<?php echo $row_kegiatan->id_kegiatan?>">
                                    	<?php echo $row_kegiatan->jenis_kegiatan?>
        							</option>
                                    <?php 
        								endforeach;
        							?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ID Dokumen</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                    <!-- Tambah atribut id untuk digunakan di AJAX sebagai selector, 'id=id_dokumen' -->
                                    <input name="id_dokumen" id="edit_id_dokumen" type="text" class="form-control" placeholder="ID Dokumen" readonly="hidden">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Judul Dokumen</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                    <input name="judul_dokumen" id="judul_dokumen_edit" type="text" class="form-control" placeholder="Judul Dokumen" 
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Masukan Dokumen</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                                    <input id="userfile" type="file" name="userfile"/>
                                </div>
                                <p class="help-block" align="justify">Maksimal Dokumen 10MB&nbsp;&nbsp;&nbsp; Format Dokumen : docx, doc, pdf <br />
                                    <font color="red">Peringatan : <br /> 
                                    Pada saat mengubah harus disertakan kembali dokumen yang sesuai dengan data dokumen </font> 
                                </p>
                            </div>

                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Perbarui Dokumen</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->