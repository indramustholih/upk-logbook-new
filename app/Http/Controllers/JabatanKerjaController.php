<?php

namespace App\Http\Controllers;

use App\Models\JabatanKerja;
use Illuminate\Http\Request;

class JabatanKerjaController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index()
    {
        return view('master.jabatan.index');
    }
    //daftar data jabatan kerja
    public function listData()
    {
        $jabatan_kerja = JabatanKerja::orderBy('nama_jabatan', 'asc')->get();
        $no = 0;
        $data = array();

        foreach ($jabatan_kerja as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_jabatan;
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
    //simpan data jabatan kerja
    public function store(Request $request)
    {
        $jabatan_kerja = new JabatanKerja;
        $jabatan_kerja->nama_jabatan = $request['nama_jabatan'];
        $jabatan_kerja->save();
    }
    //edit jabatan kerja
    public function edit($id)
    {
        $jabatan_kerja = JabatanKerja::find($id);
        echo json_encode($jabatan_kerja);
    }
    //update data jabatan kerja
    public function update(Request $request, $id)
    {
        $jabatan_kerja = JabatanKerja::find($id);
        $jabatan_kerja->nama_jabatan = $request['nama_jabatan'];
        $jabatan_kerja->update();
    }
    //hapus data jabatan kerja
    public function destroy($id)
    {
        $jabatan_kerja  = JabatanKerja::find($id);
        $jabatan_kerja->delete();
    }
}
