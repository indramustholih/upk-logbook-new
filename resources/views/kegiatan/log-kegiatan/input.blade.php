@extends('layouts.app')
@section('title')
    Input Kegiatan Utama
@endsection

@section('breadcrumb')
    @parent
    <li>Input Kegiatan Utama</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                
                    <div class="box-header with-border">
                        <h3 class="box-title">Input Kegiatan Utama</h3>
                    </div>
                    
                    <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pegawai</h3>
                                    <span class="pull-right"><i class="fa fa-user"></i></span>
                                </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="namaPegawai">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" readonly value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nipPegawai">NIP</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" readonly value="{{ Auth::user()->nip }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="namaPegawai">Pangkat/Gol.Ruang</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" readonly value="{{ Auth::user()->pangkat }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="namaPegawai">Jabatan</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" readonly value="{{ $jabatan['nama_jabatan'] }}">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="namaPegawai">Unit Kerja</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" readonly value="{{ Auth::user()->unit_kerja }}">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <form class="form" method="POST" autocomplete="off" enctype="multipart/form-data" id="form-logkegiatan">
                            {{ csrf_field() }} {{ method_field('POST') }}
            
                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label>Tanggal </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="tanggal_kegiatan" name="tanggal_kegiatan">
                            </div>
                        </div>

                        {{-- Kegiatan --}}
                        <div class="form-group">
                            <label for="id_master_kegiatan" class="control-label">Kegiatan Utama</label>
                                <select class="form-control select2" id="id_master_kegiatan" name="id_master_kegiatan"
                                    autofocus required
                                    >
                                    <option value="">-- Pilih Kegiatan Utama --</option>
                                    @foreach ($kegiatan as $list)
                                        <option 
                                            id="kegiatan-{{$list->id_master_kegiatan}}"
                                            value="{{ $list->id_master_kegiatan }}" 
                                            data-output="{{$list->output}}" 
                                            data-satuan="{{$list->satuan}}" 
                                        >{{ $list->nama_kegiatan }}</option>
                                    @endforeach
                                <select>
                                <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Kuantitas</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Kuantitas">
                        </div>

                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlKeterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-save" type="submit">
                                <i class="fa fa-floppy-o"></i> Simpan
                            </button>

                            <button class="btn btn-warning" type="button" data-dismiss="modal">
                                <i class="fa fa-arrow-circle-left"></i> Batal
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        // $(document).ready(function() {
        $('.select2').select2();
        // });
        var table, save_method;
        $('#tanggal_kegiatan').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
        $("#id_master_kegiatan").change(function () {
            var satuan = $("#kegiatan-"+this.value).data('satuan');
            $("#satuan").val(satuan);
        });
        $(function() {
            //menyimpan data form tambah 
            $('#form-logkegiatan').validator().on('submit', function(e) {
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();
                    var message;

                    url = "{{ route('log-kegiatan.store') }}";
                    message = 'Data berhasil ditambah !';                   
                    
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#form-logkegiatan').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                        },
                        success: function(data) {
                            if (data) {
                                $("#form-logkegiatan")[0].reset();
                                toastr.success(message);
                            }
                        },
                        error: function() {
                            toastr.warning("Tidak dapat menyimpan data !");
                        }
                    });
                    e.preventDefault();
                    return false;
                }
            });
        });


    </script>
@endsection
