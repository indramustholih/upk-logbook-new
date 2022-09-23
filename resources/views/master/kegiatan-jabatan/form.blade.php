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
                    {{--  id kode  --}}
                    <input type="hidden" id="id" name="id">

                    {{-- Jabatan Kerja --}}
                    <div class="form-group">
                        <label for="id_jabatan_kerja" class="col-md-3 control-label">Jabatan Kerja</label>
                        <div class="col-md-6">
                            <select type="text" class="form-control" id="id_jabatan_kerja" name="id_jabatan_kerja"
                                autofocus required>
                                <option value=""></option>
                                @foreach ($jabatan as $list)
                                    <option value="{{ $list->id }}">{{ $list->nama_jabatan }}</option>
                                @endforeach
                                <select>
                                    <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Nama Kegiatan --}}
                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Nama Kegiatan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" autofocus >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Angka Kredit --}}
                    <div class="form-group">
                        <label for="angka_kredit" class="col-md-3 control-label">Angka Kredit</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="angka_kredit" name="angka_kredit" placeholder="Angka Kredit" autofocus >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Output --}}
                    <div class="form-group">
                        <label for="output" class="col-md-3 control-label">Output</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="output" name="output" placeholder="Output" autofocus >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Satuan --}}
                    <div class="form-group">
                        <label for="satuan" class="col-md-3 control-label">Satuan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" autofocus >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Mutu --}}
                    <div class="form-group">
                        <label for="mutu" class="col-md-3 control-label">Mutu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mutu" name="mutu" placeholder="Mutu" autofocus value="100">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Waktu --}}
                    <div class="form-group">
                        <label for="waktu" class="col-md-3 control-label">Waktu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Waktu" autofocus value="12">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Biaya --}}
                    <div class="form-group">
                        <label for="biaya" class="col-md-3 control-label">Biaya</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya" autofocus value="0">
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
