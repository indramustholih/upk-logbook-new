<?php

namespace App\Http\Controllers;

use App\Models\JabatanKerja;
use App\Models\LogKegiatanTambahan;
use App\Models\MasterKegiatanTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogKegiatanTambahanController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index()
    {
        return view('kegiatan.log-kegiatan.index');
    }

    public function inputLogKegiatan()
    {
        $id_user = Auth::user()->id;
        $id_jabatan = Auth::user()->id_jabatan;
        $jabatan = JabatanKerja::where('id','=',$id_jabatan)->first();
        $tahun = date('Y');
        $kegiatan_tambahan = MasterKegiatanTambahan::select(
            'master_kegiatan_tambahans.*'
        )->where([
            ['master_kegiatan_tambahans.tahun', '=', $tahun],
            ['master_kegiatan_tambahans.id_user', '=', $id_user]])
        ->orderBy('master_kegiatan_tambahans.nama_kegiatan', 'asc')->get();
        return view('kegiatan.log-kegiatan-tambahan.input', compact('kegiatan_tambahan', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log_kegiatan_tambahan = new LogKegiatanTambahan();
        $log_kegiatan_tambahan->id_user = $request['id_user'];
        $log_kegiatan_tambahan->tanggal_kegiatan = $request['tanggal_kegiatan'];
        $log_kegiatan_tambahan->id_master_kegiatan_tambahan = $request['id_master_kegiatan_tambahan'];
        $log_kegiatan_tambahan->jumlah = $request['jumlah'];
        $log_kegiatan_tambahan->keterangan = $request['keterangan'];
        $log_kegiatan_tambahan->save();
        return response()->json(['success'=>'true']);
    }

    public function listData()
    {
        $id_user = Auth::user()->id;
        //$log_kegiatan = LogKegiatan::where('id_user', '=', $id_user)->orderBy('id_master_kegiatan', 'desc')->get();
        $log_kegiatan_tambahan = LogKegiatanTambahan::select(
            'log_kegiatan_tambahans.tanggal_kegiatan',
            'master_kegiatan_tambahans.nama_kegiatan',
            'log_kegiatan_tambahans.jumlah',
            'master_kegiatan_tambahans.satuan',
            'log_kegiatan_tambahans.keterangan'
        )->join('master_kegiatan_tambahans', 'master_kegiatan_tambahans.id_master_kegiatan_tambahan', '=', 'log_kegiatan_tambahans.id_master_kegiatan_tambahan')
        ->where('log_kegiatan_tambahans.id_user', '=', $id_user)
        ->orderBy('log_kegiatan_tambahans.tanggal_kegiatan', 'asc')->get();
        
        $no = 0;
        $data = array();
        foreach ($log_kegiatan_tambahan as $list) {
            $date=date_create($list->tanggal_kegiatan);
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date_format($date,"d/m/Y");;
            $row[] = $list->nama_kegiatan;
            $row[] = $list->jumlah;
            $row[] = $list->satuan;
            $row[] = $list->keterangan;
            $row[] = '<div class = "btn-group">
                <a onclick = "editForm(' . $list->id_log_kegiatan_tambahan . ')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-pencil"></i>
                </a>
                <a onclick = "deleteData(' . $list->id_log_kegiatan_tambahan . ')" class = "btn btn-danger btn-sm" >
                    <i class = "fa fa-trash"></i>
                </a>
            </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
