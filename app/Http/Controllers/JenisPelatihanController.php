<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPelatihan;

class JenisPelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view('master.jenis.index');
    }

    public function listData()
    {
        $jenis = JenisPelatihan::orderBy('jenis_pelatihan', 'desc')->get();
        $no = 0;
        $data = array();

        foreach ($jenis as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->jenis_pelatihan;
            $row[] = $list->keterangan;
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

    public function store(Request $request)
    {
        $jenis = new JenisPelatihan;
        $jenis->kode = $request['kode'];
        $jenis->jenis_pelatihan = $request['jenis_pelatihan'];
        $jenis->keterangan = $request['keterangan'];
        $jenis->save();
    }

    public function edit($id)
    {
        $jenis = JenisPelatihan::find($id);
        echo json_encode($jenis);
    }

    public function update(Request $request, $id)
    {
        $jenis = JenisPelatihan::find($id);
        $jenis->kode = $request['kode'];
        $jenis->jenis_pelatihan = $request['jenis_pelatihan'];
        $jenis->keterangan = $request['keterangan'];
        $jenis->update();
    }

    public function destroy($id)
    {
        $jenis = JenisPelatihan::find($id);
        $jenis->delete();
    }
}
