<?php

namespace App\Http\Controllers;

use App\Models\JabatanKerja;
use App\Models\KegiatanJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanJabatanController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index()
    {
        $jabatan = JabatanKerja::orderBy('nama_jabatan', 'asc')->get();
        return view('master.kegiatan-jabatan.index',compact('jabatan'));
    }
    public function listData()
    {
        $kegiatan_jabatan = KegiatanJabatan::select(
            'kegiatan_jabatans.id',
            'jabatan_kerjas.nama_jabatan',
            'kegiatan_jabatans.nama_kegiatan',
            'kegiatan_jabatans.angka_kredit',
            'kegiatan_jabatans.output',
            'kegiatan_jabatans.satuan',
            'kegiatan_jabatans.mutu',
            'kegiatan_jabatans.waktu',
            'kegiatan_jabatans.biaya'
        )->join('jabatan_kerjas', 'jabatan_kerjas.id', '=', 'kegiatan_jabatans.id_jabatan_kerja')->orderBy('jabatan_kerjas.nama_jabatan', 'asc')->get();
        
        $no = 0;
        $data = array();

        foreach ($kegiatan_jabatan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_jabatan;
            $row[] = $list->nama_kegiatan;
            $row[] = $list->angka_kredit;
            $row[] = $list->output;
            $row[] = $list->satuan;
            $row[] = $list->mutu;
            $row[] = $list->waktu;
            $row[] = $list->biaya;
            $row[] = '<div class = "btn-group">
                <a onclick = "editForm(' . $list->id . ')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-pencil"></i>
                </a>
                <a onclick = "deleteData(' . $list->id . ')" class = "btn btn-danger btn-sm" >
                    <i class = "fa fa-trash"></i>
                </a>
            </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    //simpan data kegiatan jabatan
    public function store(Request $request)
    {
        $kegiatan_jabatan = new KegiatanJabatan();
        $kegiatan_jabatan->id_jabatan_kerja = $request['id_jabatan_kerja'];
        $kegiatan_jabatan->nama_kegiatan = $request['nama_kegiatan'];
        $kegiatan_jabatan->angka_kredit = $request['angka_kredit'];
        $kegiatan_jabatan->output = $request['output'];
        $kegiatan_jabatan->satuan = $request['satuan'];
        $kegiatan_jabatan->mutu = $request['mutu'];
        $kegiatan_jabatan->waktu = $request['waktu'];
        $kegiatan_jabatan->biaya = $request['biaya'];
        $kegiatan_jabatan->save();
    }

    //edit kegiatan jabatan
    public function edit($id)
    {
        $kegiatan_jabatan = KegiatanJabatan::find($id);
        echo json_encode($kegiatan_jabatan);
    }

    //update data kegiatan jabatan
    public function update(Request $request, $id)
    {
        $kegiatan_jabatan = KegiatanJabatan::find($id);
        $kegiatan_jabatan->id_jabatan_kerja = $request['id_jabatan_kerja'];
        $kegiatan_jabatan->nama_kegiatan = $request['nama_kegiatan'];
        $kegiatan_jabatan->angka_kredit = $request['angka_kredit'];
        $kegiatan_jabatan->output = $request['output'];
        $kegiatan_jabatan->satuan = $request['satuan'];
        $kegiatan_jabatan->mutu = $request['mutu'];
        $kegiatan_jabatan->waktu = $request['waktu'];
        $kegiatan_jabatan->biaya = $request['biaya'];
        $kegiatan_jabatan->update();
    }

    //hapus data kegiatan jabatan
    public function destroy($id)
    {
        $kegiatan_jabatan = KegiatanJabatan::find($id);
        $kegiatan_jabatan->delete();
    }
}
