<!-- MODAL TAMBAH KEGIATAN -->
        <div class="modal fade" id="modal_admin_tambah_kegiatan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Tambah Kegiatan</h4>
                    </div>
                    <form action="<?php echo base_url()?>admin/tambah_kegiatan" method="post"  id="form_tambah_kegiatan">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="jenis_kegiatan" id="jenis_kegiatan" type="text" class="form-control" placeholder="Nama Kegiatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php 
        								$query_kegiatan = $this->model_kegiatan->view_kategori();
        								foreach($query_kegiatan->result() as $row_kegiatan):
        							?>
        							<option value="<?php echo $row_kegiatan->id_kategori?>">
                                    	<?php echo $row_kegiatan->nama_kategori?>
        							</option>
                                    <?php 
        								endforeach;
        							?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-floppy-disk"></i> Tambah Kegiatan</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->