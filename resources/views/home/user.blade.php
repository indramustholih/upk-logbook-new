@extends('layouts.app')

@section('title')
    Dasboard
@endsection

@section('breadcrumb')
    @parent
    <li>
        <a href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i>
            Dashboard
        </a>
    </li>
@endsection

@section('content')
<div class="row">
                        <div class="col-sm-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pegawai</h3>
                                    <span class=""><i class="fa fa-user"></i></span>
                                </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <span class="logo-mini"><img width="150px" src="{{ asset('images/no_photo.png') }}" class="img-thumbnail"
                                            alt="Responsive image"></span>
                                    </div> 
                                </div>  
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
</div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
