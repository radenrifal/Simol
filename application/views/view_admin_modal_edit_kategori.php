<!-- MODAL EDIT KATEGORI -->
        <div class="modal fade" id="modal_admin_edit_kategori" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Ubah Kategori</h4>
                    </div>
                    <form action="<?php echo base_url()?>admin/edit_kategori" method="post"  id="form_edit_kategori">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ID Kegiatan</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="id_kategori" id="id_kategori_admin" type="text" class="form-control" readonly="hidden">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="nama_kategori" id="nama_kategori_admin" type="text" class="form-control" placeholder="Nama Kategori">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-edit"></i> Perbaharui Kategori</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->