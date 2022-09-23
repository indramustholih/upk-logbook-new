<div class="modal" id="modal-form" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    {{--  id user  --}}
                    <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
                    
                    {{-- Nama Pegawai --}}
                    <div class="form-group">
                        <label for="nama_pegawai" class="col-md-3 control-label">Nama Pegawai</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" autofocus readonly value="{{ Auth::user()->name }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Tahun --}}
                    <div class="form-group">
                        <label for="tahun" class="col-md-3 control-label">Tahun</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" autofocus >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Kegiatan Jabatan --}}
                    <div class="form-group">
                        <label for="id_kegiatan_jabatan" class="col-md-3 control-label">Kegiatan Utama</label>
                        <div class="col-md-6">
                            <select class="form-control select2" id="id_kegiatan_jabatan" name="id_kegiatan_jabatan"
                                style="width:400px">
                                <option value=""></option>
                                @foreach ($kegiatan_jabatan as $list)
                                    <option 
                                        id="kegiatan-{{$list->id_kegiatan_jabatan}}"    
                                        value="{{ $list->id_kegiatan_jabatan }}"
                                        data-namakegiatan="{{$list->nama_kegiatan}}" 
                                        data-angkakredit="{{$list->angka_kredit}}" 
                                        data-output="{{$list->output}}" 
                                        data-satuan="{{$list->satuan}}"
                                        data-mutu="{{$list->mutu}}"
                                        data-waktu="{{$list->waktu}}"
                                        data-biaya="{{$list->biaya}}"
                                            
                                    >{{ $list->nama_kegiatan }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan" class="col-md-3 control-label">Nama Kegiatan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="angka_kredit" class="col-md-3 control-label">Angka Kredit</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="angka_kredit" name="angka_kredit" placeholder="Angka Kredit" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="output" class="col-md-3 control-label">Output</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="output" name="output" placeholder="Output" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="satuan" class="col-md-3 control-label">Satuan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mutu" class="col-md-3 control-label">Mutu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mutu" name="mutu" placeholder="Mutu" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="waktu" class="col-md-3 control-label">Waktu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Waktu" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="biaya" class="col-md-3 control-label">Biaya</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya" readonly >
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

<div class="modal" id="modal-form-tambahan" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    {{--  id user  --}}
                    <input type="hidden" id="id_user_tambahan" name="id_user_tambahan" value="{{ Auth::user()->id }}">
                    
                    {{-- Nama Pegawai --}}
                    <div class="form-group">
                        <label for="nama_pegawai_tambahan" class="col-md-3 control-label">Nama Pegawai</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama_pegawai_tambahan" name="nama_pegawai" autofocus readonly value="{{ Auth::user()->name }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Tahun --}}
                    <div class="form-group">
                        <label for="tahun_tambahan" class="col-md-3 control-label">Tahun</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="tahun_tambahan" name="tahun_tambahan" placeholder="Tahun" autofocus >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    {{-- Kegiatan Jabatan --}}
                    <div class="form-group">
                        <label for="id_kegiatan_jabatan_tambahan" class="col-md-3 control-label">Kegiatan Tambahan</label>
                        <div class="col-md-6">
                            <select class="form-control select2" id="id_kegiatan_jabatan_tambahan" name="id_kegiatan_jabatan_tambahan"
                                style="width:400px">
                                <option value=""></option>
                                @foreach ($kegiatan_jabatan_tambahan as $list)
                                    <option 
                                        id="kegiatan-tambahan-{{$list->id_kegiatan_jabatan_tambahan}}"    
                                        value="{{ $list->id_kegiatan_jabatan_tambahan }}"
                                        data-namakegiatantambahan="{{$list->nama_kegiatan}}" 
                                        data-angkakredittambahan="{{$list->angka_kredit}}" 
                                        data-outputtambahan="{{$list->output}}" 
                                        data-satuantambahan="{{$list->satuan}}"
                                        data-mututambahan="{{$list->mutu}}"
                                        data-waktutambahan="{{$list->waktu}}"
                                        data-biayatambahan="{{$list->biaya}}"
                                            
                                    >{{ $list->nama_kegiatan }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan_tambahan" class="col-md-3 control-label">Nama Kegiatan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama_kegiatan_tambahan" name="nama_kegiatan_tambahan" placeholder="Nama Kegiatan Tambahan" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="angka_kredit_tambahan" class="col-md-3 control-label">Angka Kredit</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="angka_kredit_tambahan" name="angka_kredit_tambahan" placeholder="Angka Kredit" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="output_tambahan" class="col-md-3 control-label">Output</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="output_tambahan" name="output_tambahan" placeholder="Output" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="satuan_tambahan" class="col-md-3 control-label">Satuan</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="satuan_tambahan" name="satuan_tambahan" placeholder="Satuan" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mutu_tambahan" class="col-md-3 control-label">Mutu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mutu_tambahan" name="mutu_tambahan" placeholder="Mutu" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="waktu_tambahan" class="col-md-3 control-label">Waktu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="waktu_tambahan" name="waktu_tambahan" placeholder="Waktu" readonly >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="biaya_tambahan" class="col-md-3 control-label">Biaya</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="Biaya" readonly >
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

