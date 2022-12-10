<!-- MODAL TAMBAH KEGIATAN -->
        <div class="modal fade" id="modal_admin_tambah_kategori" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Tambah Kategori</h4>
                    </div>
                    <form action="<?php echo base_url()?>admin/tambah_kategori" method="post"  id="form_tambah_kategori">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                    <input name="nama_kategori" id="nama_kategori" type="text" class="form-control" placeholder="Nama Kategori">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-floppy-disk"></i> Tambah Kategori</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->