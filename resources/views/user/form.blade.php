<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{-- <form class="form-horizontal" data-toggle="validator" method="POST" autocomplete="off">  --}}
            <form class="form-horizontal" method="POST" autocomplete="off" >
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    {{-- id user --}}
                    <input type="hidden" id="id" name="id">

                    {{-- name --}}
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- level --}}
                    <div class="form-group">
                        <label for="level" class="col-md-3 control-label">Level </label>
                        <div class="col-md-6">
                            <select name="level" id="level" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- NIP --}}
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">NIP </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- JABATAN --}}
                    <div class="form-group">
                        <label for="jabatan" class="col-md-3 control-label">Jabatan </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Pangkat --}}
                    <div class="form-group">
                        <label for="pangkat" class="col-md-3 control-label">Pangkat </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="pangkat" name="pangkat" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- UNIT KERJA --}}
                    <div class="form-group">
                        <label for="unit_kerja" class="col-md-3 control-label">Unit Kerja </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" autofocus required>
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
