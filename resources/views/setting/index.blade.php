@extends('layouts.app')
@section('title')
    Setting
@endsection

@section('breadcrumb')
    @parent
    <li>Setting</li>
@endsection

@section('content')
    {{-- opd --}}
    <div class="row" id="opd">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">API Perangkat Daerah SIMPEG</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="inputUrlOPD" class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUrlOPD" name="inputUrlOPD"
                                    placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAccessKeyOPD" class="col-sm-2 control-label">AccessKey</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputAccessKeyOPD"
                                    name="inputAccessKeyOPD" placeholder="Access-key">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserAgentOPD" class="col-sm-2 control-label">User-Agent</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputUserAgentOPD"
                                    name="inputUserAgentOPD" placeholder="User Agent">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a onclick="addOPD()" class="btn btn-primary btn-save" type="submit">
                                    <i class="fa fa-floppy-o"></i> Simpan
                                </a>
                                <a onclick="syncOPD()" class="btn btn-warning btn-sync" type="submit">
                                    <i class="fa fa-refresh"></i> Sync
                                </a>
                                <a onclick="testOPD()" class="btn btn-success btn-test" type="submit">
                                    <i class="fa fa-check"></i> Test
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- riwayat teknis --}}
    <div class="row" id="riwayat-teknis">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">API Riwayat Diklat SIMPEG (Teknis)</h3>
                </div>
                <div class="box-body">
                    <div id="selectedAssetsGenerate" class="alert alert-info text-center alert-dismissible" role="alert"
                        style="display:none">
                        <div id="selectedAssetsGenerateDetails"> </div>
                    </div>
                    <form class="form-horizontal">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="inputUrlRiwayatTeknis" class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUrlRiwayatTeknis"
                                    name="inputUrlRiwayatTeknis" placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAccessKeyRiwayatTeknis" class="col-sm-2 control-label">AccessKey</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputAccessKeyRiwayatTeknis"
                                    name="inputAccessKeyRiwayatTeknis" placeholder="Access-key">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserAgentRiwayatTeknis" class="col-sm-2 control-label">User-Agent</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputUserAgentRiwayatTeknis"
                                    name="inputUserAgentRiwayatTeknis" placeholder="User Agent">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a onclick="addRiwayatTeknis()" class="btn btn-primary btn-save" type="submit">
                                    <i class="fa fa-floppy-o"></i> Simpan
                                </a>
                                <a onclick="syncRiwayatTeknis()" class="btn btn-warning btn-sync" type="submit">
                                    <i class="fa fa-refresh"></i> Sync
                                </a>
                                <a onclick="testRiwayatTeknis()" class="btn btn-success btn-test" type="submit">
                                    <i class="fa fa-check"></i> Test
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- riwayat manajerial --}}
    <div class="row" id="riwayat-manajerial">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">API Riwayat Diklat SIMPEG (Manajerial)</h3>
                </div>
                <div class="box-body">
                    <div id="selectedAssetsGenerate" class="alert alert-info text-center alert-dismissible" role="alert"
                        style="display:none">
                        <div id="selectedAssetsGenerateDetails"> </div>
                    </div>
                    <form class="form-horizontal">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="inputUrlRiwayatManajerial" class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUrlRiwayatManajerial"
                                    name="inputUrlRiwayatManajerial" placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAccessKeyRiwayatManajerial" class="col-sm-2 control-label">AccessKey</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputAccessKeyRiwayatManajerial"
                                    name="inputAccessKeyRiwayatManajerial" placeholder="Access-key">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserAgentRiwayatManajerial" class="col-sm-2 control-label">User-Agent</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputUserAgentRiwayatManajerial"
                                    name="inputUserAgentRiwayatManajerial" placeholder="User Agent">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a onclick="addRiwayatManajerial()" class="btn btn-primary btn-save" type="submit">
                                    <i class="fa fa-floppy-o"></i> Simpan
                                </a>
                                <a onclick="syncRiwayatManajerial()" class="btn btn-warning btn-sync" type="submit">
                                    <i class="fa fa-refresh"></i> Sync
                                </a>
                                <a onclick="testRiwayatManajerial()" class="btn btn-success btn-test" type="submit">
                                    <i class="fa fa-check"></i> Test
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- penilaian --}}
    <div class="row" id="penilaian">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">API Penilaian SKP</h3>
                </div>
                <div class="box-body">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <form class="form-horizontal">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="inputUrlPenilaian" class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUrlPenilaian1" name="inputUrlPenilaian1"
                                    placeholder="URL">
                            </div>
                            {{-- <div class="col-sm-2">
                                <input type="text" class="form-control" id="inputUrlTahun" name="inputUrlTahun"
                                    value="tahun" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputUrlPenilaian2" name="inputUrlPenilaian2"
                                    placeholder="URL">
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <label for="inputAccessKeyPenilaian" class="col-sm-2 control-label">AccessKey</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputAccessKeyPenilaian"
                                    name="inputAccessKeyPenilaian" placeholder="Access-key" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserAgentPenilaian" class="col-sm-2 control-label">User-Agent</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputUserAgentPenilaian"
                                    name="inputUserAgentPenilaian" placeholder="User Agent" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a onclick="addPenilaian()" class="btn btn-primary btn-save" type="submit">
                                    <i class="fa fa-floppy-o"></i> Simpan
                                </a>
                                <a onclick="syncPenilaian()" class="btn btn-warning btn-sync" type="submit">
                                    <i class="fa fa-refresh"></i> Sync
                                </a>
                                <a onclick="testPenilaian()" class="btn btn-success btn-test" type="submit">
                                    <i class="fa fa-check"></i> Test
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Spinner --}}
    <div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="loader"></div>
                    <div clas="loader-txt">
                        <h3>Please Wait...</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // show opd
            $.ajax({
                url: "{{ route('setting.opd.data') }}",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var accesskey, userAgent;
                    if (data === 'undefined') {
                        accesskey = data.Access_Key_OPD;
                        userAgent = data.User_Agent_OPD;
                    } else {
                        access = data.Access_Key_OPD;
                        user = data.User_Agent_OPD;
                        accesskey = access.slice(0, 10);
                        userAgent = user.slice(0, 10);
                    }
                    $('#inputUrlOPD').val(data.URL_OPD);
                    $('#inputAccessKeyOPD').val(accesskey);
                    $('#inputUserAgentOPD').val(userAgent);
                }
            });

            // show riwayat teknis
            $.ajax({
                url: "{{ route('setting.riwayat_teknis.data') }}",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var accesskey, userAgent;
                    if (data === 'undefined') {
                        accesskey = data.Access_Key_OPD;
                        userAgent = data.User_Agent_OPD;
                    } else {
                        access = data.Access_Key_OPD;
                        user = data.User_Agent_OPD;
                        accesskey = access.slice(0, 10);
                        userAgent = user.slice(0, 10);
                    }
                    $('#inputUrlRiwayatTeknis').val(data.URL_OPD);
                    $('#inputAccessKeyRiwayatTeknis').val(accesskey);
                    $('#inputUserAgentRiwayatTeknis').val(userAgent);
                }
            });

            // show riwayat manajerial
            $.ajax({
                url: "{{ route('setting.riwayat_manajerial.data') }}",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var accesskey, userAgent;
                    if (data === 'undefined') {
                        accesskey = data.Access_Key_OPD;
                        userAgent = data.User_Agent_OPD;
                    } else {
                        access = data.Access_Key_OPD;
                        user = data.User_Agent_OPD;
                        if(access != undefined){
                            accesskey = access.slice(0, 10);
                            userAgent = user.slice(0, 10);
                        }
                    }
                    $('#inputUrlRiwayatManajerial').val(data.URL_OPD);
                    $('#inputAccessKeyRiwayatManajerial').val(accesskey);
                    $('#inputUserAgentRiwayatManajerial').val(userAgent);
                }
            });

            // show penilaian
            $.ajax({
                url: "{{ route('setting.penilaian.data') }}",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var accesskey, userAgent;
                    if (data === 'undefined') {
                        accesskey = data.Access_Key_OPD;
                        userAgent = data.User_Agent_OPD;
                    } else {
                        access = data.Access_Key_OPD;
                        user = data.User_Agent_OPD;
                        if(access != undefined){
                            accesskey = access.slice(0, 10);
                            userAgent = user.slice(0, 10);
                        }

                    }
                    $('#inputUrlPenilaian1').val(data.URL_OPD1);
                    // $('#inputUrlPenilaian2').val(data.URL_OPD2);
                    // $('#inputAccessKeyPenilaian').val(accesskey);
                    // $('#inputUserAgentPenilaian').val(userAgent);
                }
            });
        });

        // add opd
        function addOPD() {
            if (confirm("Apakah yakin akan menyimpan data ?")) {
                $.ajax({
                    url: "{{ route('setting.opd.store') }}",
                    type: "POST",
                    data: $('#opd form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function() {
                        toastr.warning("Tidak dapat menyimpan data !");
                    }
                });
                return false;
            }
        }

        // add riwayat teknis
        function addRiwayatTeknis() {
            if (confirm("Apakah yakin akan menyimpan data ?")) {
                $.ajax({
                    url: "{{ route('setting.riwayat_teknis.store') }}",
                    type: "POST",
                    data: $('#riwayat-teknis form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function() {
                        toastr.error("Tidak dapat menyimpan data !");
                    }
                });
                return false;
            }
        }

        // add riwayat manajerial
        function addRiwayatManajerial() {
            if (confirm("Apakah yakin akan menyimpan data ?")) {
                $.ajax({
                    url: "{{ route('setting.riwayat_manajerial.store') }}",
                    type: "POST",
                    data: $('#riwayat-manajerial form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function() {
                        toastr.error("Tidak dapat menyimpan data !");
                    }
                });
                return false;
            }
        }

        // add penilaian
        function addPenilaian() {
            if (confirm("Apakah yakin akan menyimpan data ?")) {
                $.ajax({
                    url: "{{ route('setting.penilaian.store') }}",
                    type: "POST",
                    data: $('#penilaian form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function() {
                        toastr.error("Tidak dapat menyimpan data !");
                    }
                });
                return false;
            }
        }

        // test opd
        function testOPD() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "setting/opd/test",
                type: "POST",
                data: $('#opd form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                }
            });
            return false;
        }

        // test riwayat teknis
        function testRiwayatTeknis() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "setting/riwayat-teknis/test",
                type: "POST",
                data: $('#riwayat-teknis form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                }
            });
            return false;
        }

        // test riwayat manajerial
        function testRiwayatManajerial() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "setting/riwayat-manajerial/test",
                type: "POST",
                data: $('#riwayat-manajerial form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                }
            });
            return false;
        }

        // test penilaian
        function testPenilaian() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "setting/penilaian/test",
                type: "POST",
                data: $('#penilaian form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                }
            });
            return false;
        }

        // sync opd
        function syncOPD() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "setting/opd/sync",
                type: "POST",
                data: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                },
            });
            return false;
        }

        // sync riwayat teknis
        function syncRiwayatTeknis() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "/setting/riwayat-teknis/sync",
                type: "POST",
                data: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                },
            });
            return false;
        }

        // sync riwayat manajerial
        function syncRiwayatManajerial() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "/setting/riwayat-manajerial/sync",
                type: "POST",
                data: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                },
            });
            return false;
        }

        // sync penilaian
        function syncPenilaian() {
            $("#loadMe").modal({
                backdrop: "static",
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "/setting/penilaian/sync",
                type: "POST",
                data: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
                },
                success: function(data) {
                    $("#loadMe").modal("hide");
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText);
                    $("#loadMe").modal("hide");
                    toastr.error(err.message);
                },
            });
            return false;
        }
    </script>
@endsection
