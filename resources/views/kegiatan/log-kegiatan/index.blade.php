@extends('layouts.app')
@section('title')
    Data Kegiatan
@endsection

@section('breadcrumb')
    @parent
    <li>Data Kegiatan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h4>Kegiatan Utama</h4>
                </div>
                <div class="box-body table-responsive p-0">
                    <table id="table-kegiatan-utama" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Tanggal</th>
                                <th>Kegiatan Utama</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h4>Kegiatan Tambahan</h4>
                </div>
                <div class="box-body table-responsive p-0">
                    <table id="table-kegiatan-tambahan" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Tanggal</th>
                                <th>Kegiatan Tambahan</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{-- @include('master.jabatan.form') --}}
@endsection

@section('script')
    <script type="text/javascript">
        var table, save_method;

        $(function() {
            //menampilkan data dengan plugin DataTable
            table = $('#table-kegiatan-utama').DataTable({
                processing: true,
                ajax: {
                    url: "{{ route('log-kegiatan.data') }}",
                    type: "GET"
                },
                "lengthMenu": [[100, "All", 50, 25], [100, "All", 50, 25]]
            });

            table = $('#table-kegiatan-tambahan').DataTable({
                processing: true,
                ajax: {
                    url: "{{ route('log-kegiatan-tambahan.data') }}",
                    type: "GET"
                },
                "lengthMenu": [[100, "All", 50, 25], [100, "All", 50, 25]]
            });

            //menyimpan data form tambah / edit beserta validasinya
            $('#modal-form form').validator().on('submit', function(e) {
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();
                    var message;
                    if (save_method == "add") {
                        url = "{{ route('log-kegiatan.store') }}";
                        message = 'Data berhasil ditambah !';
                    } else {
                        url = "log-kegiatan/" + id;
                        message = 'Data berhasil diubah !';
                    }
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#modal-form form').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                        },
                        success: function(data) {
                            $(this).children('input[type=submit]').attr('disabled', 'disabled');
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            toastr.success(message);
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

        //menapilkan form tambah
        function addForm() {
            save_method = "add";
            $('input[name = _method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Kegiatan Jabatan');
        }

        //menampilkan form edit dan menampilkan data pada form tersebut
        // function editForm(id) {
        //     save_method = "edit";
        //     $('input[name=_method]').val('PATCH');
        //     $('#modal-form form')[0].reset();
        //     $.ajax({
        //         url: "saran/" + id + "/edit",
        //         type: "GET",
        //         dataType: "JSON",
        //         success: function(data) {
        //             $('#modal-form').modal('show');
        //             $('.modal-title').text('Edit Jabatan');
        //             $('#id').val(data.id);
        //             $('#kode').val(data.kode);
        //             $('#nama_saran_pengembangan').val(data.nama_saran_pengembangan);
        //             $('#keterangan').val(data.keterangan);
        //         },
        //         error: function() {
        //             toastr.warning("Tidak dapat menampilkan data !");
        //         }
        //     });
        // }

        // //menghapus data
        // function deleteData(id) {
        //     if (confirm("Apakah yakin data akan dihapus ?")) {
        //         $.ajax({
        //             url: "saran/" + id,
        //             type: "POST",
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
        //             },
        //             data: {
        //                 '_method': 'DELETE',
        //                 '_token': $('meta[ name = csrf-token]').attr('content')
        //             },
        //             success: function(data) {
        //                 table.ajax.reload();
        //                 toastr.success('Data berhasil dihapus !');
        //             },
        //             error: function() {
        //                 toastr.warning("Tidak dapat menghapus data !");
        //             }
        //         });
        //     }
        // }
    </script>
@endsection
