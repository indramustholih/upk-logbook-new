<?php

namespace App\Http\Controllers;

use DB;
use App\Models\KegiatanJabatan;
use App\Models\MasterKegiatan;
use App\Models\KegiatanJabatanTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterKegiatanController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    
    public function index()
    {
        $id_jabatan_kerja = Auth::user()->id_jabatan;
        $kegiatan_jabatan = KegiatanJabatan::where('id_jabatan_kerja', '=', $id_jabatan_kerja)->orderBy('nama_kegiatan', 'asc')->get();
        $kegiatan_jabatan_tambahan = KegiatanJabatanTambahan::orderBy('nama_kegiatan', 'asc')->get();
        return view('kegiatan.master-kegiatan.index', compact('kegiatan_jabatan', 'kegiatan_jabatan_tambahan'));
    }
    public function listData()
    {
        $id_user = Auth::user()->id;
        $tahun = date('Y');
        $master_kegiatan = DB::table('master_kegiatans')
        ->select('master_kegiatans.*', 'b.jumlah')
        ->leftJoin(DB::raw('
        (SELECT
            sum(jumlah) as jumlah, id_master_kegiatan, id_user
        FROM
            log_kegiatans a
            where year(tanggal_kegiatan)='.$tahun.' and id_user='.$id_user.'
        group by id_master_kegiatan, id_user) b
        '), 
        function($join)
        {
           $join->on('master_kegiatans.id', '=', 'b.id_master_kegiatan');
        })
        ->where('master_kegiatans.tahun', '=', 2022)
        ->where('master_kegiatans.id_user', '=', $id_user)
        ->orderBy('master_kegiatans.nama_kegiatan', 'ASC')
        ->get();

        $no = 0;
        $data = array();
        foreach ($master_kegiatan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->tahun;
            $row[] = $list->nama_kegiatan;
            $row[] = ($list->jumlah == '') ? 0 : $list->jumlah;
            $row[] = $list->output;
            $row[] = $list->satuan;
            $row[] = '<div class = "btn-group">
                <a onclick = "editForm(' . $list->id_master_kegiatan . ')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-pencil"></i>
                </a>
                <a onclick = "deleteData(' . $list->id_master_kegiatan . ')" class = "btn btn-danger btn-sm" >
                    <i class = "fa fa-trash"></i>
                </a>
            </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function store(Request $request)
    {
        $master_kegiatan = new MasterKegiatan();
        $master_kegiatan->id_user = $request['id_user'];
        $master_kegiatan->tahun = $request['tahun'];
        $master_kegiatan->id_kegiatan_jabatan = $request['id_kegiatan_jabatan'];
        $master_kegiatan->nama_kegiatan = $request['nama_kegiatan'];
        $master_kegiatan->angka_kredit = $request['angka_kredit'];
        $master_kegiatan->output = $request['output'];
        $master_kegiatan->satuan = $request['satuan'];
        $master_kegiatan->mutu = $request['mutu'];
        $master_kegiatan->waktu = $request['waktu'];
        $master_kegiatan->biaya = $request['biaya'];
        $master_kegiatan->save();
    }
}
