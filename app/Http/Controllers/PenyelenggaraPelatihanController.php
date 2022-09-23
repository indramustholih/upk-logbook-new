<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyelenggaraPelatihan;

class PenyelenggaraPelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view('master.penyelenggara.index');
    }

    public function listData()
    {
        $penyelenggara = PenyelenggaraPelatihan::orderBy('penyelenggara_pelatihan', 'desc')->get();
        $no = 0;
        $data = array();

        foreach ($penyelenggara as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->penyelenggara_pelatihan;
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
        $penyelenggara = new PenyelenggaraPelatihan();
        $penyelenggara->kode = $request['kode'];
        $penyelenggara->penyelenggara_pelatihan = $request['penyelenggara_pelatihan'];
        $penyelenggara->keterangan = $request['keterangan'];
        $penyelenggara->save();
    }

    public function edit($id)
    {
        $penyelenggara = PenyelenggaraPelatihan::find($id);
        echo json_encode($penyelenggara);
    }

    public function update(Request $request, $id)
    {
        $penyelenggara = PenyelenggaraPelatihan::find($id);
        $penyelenggara->kode = $request['kode'];
        $penyelenggara->penyelenggara_pelatihan = $request['penyelenggara_pelatihan'];
        $penyelenggara->keterangan = $request['keterangan'];
        $penyelenggara->update();
    }

    public function destroy($id)
    {
        $penyelenggara = PenyelenggaraPelatihan::find($id);
        $penyelenggara->delete();
    }
}
