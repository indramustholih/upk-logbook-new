<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    {{--  id jenis pelatihan  --}}
                    <input type="hidden" id="id" name="id">
                    {{-- kode --}}
                    <div class="form-group">
                        <label for="kode" class="col-md-3 control-label">Kode</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="T001" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- jenis pelatihan --}}
                    <div class="form-group">
                        <label for="jenis_pelatihan" class="col-md-3 control-label">Jenis Pengembangan Kompetensi</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="jenis_pelatihan" name="jenis_pelatihan" placeholder="Teknis" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- keterangan --}}
                    <div class="form-group">
                        <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="keterangan" name="keterangan" style="resize: vertical;" maxlength="255" placeholder="Pelatihan Teknis Umum (Max 255 Char Limit)" autofocus required></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary btn-save" type="submit">
                        <i class="fa fa-floppy-o"></i> Simpan
                    </button>

                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <i class="fa fa-arrow-circle-left"></i> Batal
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
