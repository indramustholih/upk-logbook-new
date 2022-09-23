<?php

namespace App\Http\Controllers;

use App\Models\KegiatanJabatanTambahan;
use Illuminate\Http\Request;

class KegiatanJabatanTambahanController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        return view('master.kegiatan-jabatan-tambahan.index');
    }

    //menampilkan data
    public function listData()
    {
        $kegiatan_tambahan = KegiatanJabatanTambahan::select(
            'kegiatan_jabatan_tambahans.id',
            'kegiatan_jabatan_tambahans.nama_kegiatan',
            'kegiatan_jabatan_tambahans.angka_kredit',
            'kegiatan_jabatan_tambahans.output',
            'kegiatan_jabatan_tambahans.satuan',
            'kegiatan_jabatan_tambahans.mutu',
            'kegiatan_jabatan_tambahans.waktu',
            'kegiatan_jabatan_tambahans.biaya'
        )->orderBy('kegiatan_jabatan_tambahans.nama_kegiatan', 'asc')->get();
        $no = 0;
        $data = array();

        foreach ($kegiatan_tambahan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_kegiatan;
            $row[] = $list->output;
            $row[] = $list->satuan;
            $row[] = $list->mutu;
            $row[] = $list->waktu;
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
    
    //simpan data kegiatan jabatan tambahan
    public function store(Request $request)
    {
        $kegiatan_tambahan = new KegiatanJabatanTambahan();
        $kegiatan_tambahan->nama_kegiatan = $request['nama_kegiatan'];
        $kegiatan_tambahan->angka_kredit = $request['angka_kredit'];
        $kegiatan_tambahan->output = $request['output'];
        $kegiatan_tambahan->satuan = $request['satuan'];
        $kegiatan_tambahan->mutu = $request['mutu'];
        $kegiatan_tambahan->waktu = $request['waktu'];
        $kegiatan_tambahan->biaya = $request['biaya'];
        $kegiatan_tambahan->save();
    }

    //ubah data kegiatan jabatan tambahan
    public function edit($id)
    {
        $kegiatan_jabatan_tambahan = KegiatanJabatanTambahan::find($id);
        echo json_encode($kegiatan_jabatan_tambahan);
    }

    //update data kegiatan jabatan tambahan
    public function update(Request $request, $id)
    {
        $kegiatan_jabatan_tambahan = KegiatanJabatanTambahan::find($id);
        $kegiatan_jabatan_tambahan->nama_kegiatan = $request['nama_kegiatan'];
        $kegiatan_jabatan_tambahan->output = $request['output'];
        $kegiatan_jabatan_tambahan->satuan = $request['satuan'];
        $kegiatan_jabatan_tambahan->mutu = $request['mutu'];
        $kegiatan_jabatan_tambahan->waktu = $request['waktu'];
        $kegiatan_jabatan_tambahan->update();
    }
    //hapus data kegiatan jabatan tambahan
    public function destroy($id)
    {
        $kegiatan_jabatan_tambahan = KegiatanJabatanTambahan::find($id);
        $kegiatan_jabatan_tambahan->delete();
    }
}
