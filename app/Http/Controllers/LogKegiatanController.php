<?php

namespace App\Http\Controllers;

use App\Models\KegiatanJabatan;
use App\Models\LogKegiatan;
use App\Models\MasterKegiatan;
use App\Models\JabatanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogKegiatanController extends Controller
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
        $kegiatan = MasterKegiatan::select(
            'master_kegiatans.*'
        )->join('kegiatan_jabatans', 'master_kegiatans.id_kegiatan_jabatan', '=', 'kegiatan_jabatans.id_kegiatan_jabatan')
        ->where([
            ['kegiatan_jabatans.id_jabatan_kerja', '=', $id_jabatan],
            ['master_kegiatans.id_user', '=', $id_user]])
        ->orderBy('master_kegiatans.nama_kegiatan', 'asc')->get();
       

        return view('kegiatan.log-kegiatan.input', compact('kegiatan', 'jabatan'));
    }
    public function store(Request $request)
    {
        $log_kegiatan = new LogKegiatan();
        $log_kegiatan->id_user = $request['id_user'];
        $log_kegiatan->tanggal_kegiatan = $request['tanggal_kegiatan'];
        $log_kegiatan->id_master_kegiatan = $request['id_master_kegiatan'];
        $log_kegiatan->jumlah = $request['jumlah'];
        $log_kegiatan->keterangan = $request['keterangan'];
        $log_kegiatan->save();
        return response()->json(['success'=>'true']);
    }

    public function listData()
    {
        $id_user = Auth::user()->id;
        //$log_kegiatan = LogKegiatan::where('id_user', '=', $id_user)->orderBy('id_master_kegiatan', 'desc')->get();
        $log_kegiatan = LogKegiatan::select(
            'log_kegiatans.tanggal_kegiatan',
            'master_kegiatans.nama_kegiatan',
            'log_kegiatans.jumlah',
            'master_kegiatans.satuan',
            'log_kegiatans.keterangan'
        )->join('master_kegiatans', 'master_kegiatans.id_master_kegiatan', '=', 'log_kegiatans.id_master_kegiatan')
        ->where('log_kegiatans.id_user', '=', $id_user)
        ->orderBy('log_kegiatans.tanggal_kegiatan', 'asc')->get();
        
        $no = 0;
        $data = array();
        foreach ($log_kegiatan as $list) {
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
                <a onclick = "editForm(' . $list->id_log_kegiatan . ')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-pencil"></i>
                </a>
                <a onclick = "deleteData(' . $list->id_log_kegiatan . ')" class = "btn btn-danger btn-sm" >
                    <i class = "fa fa-trash"></i>
                </a>
            </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

}
