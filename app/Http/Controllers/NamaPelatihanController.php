<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPelatihan;
use App\Models\BentukPelatihan;
use App\Models\NamaPelatihan;
use App\Models\JalurPelatihan;
use SebastianBergmann\Environment\Console;

class NamaPelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $jenis = JenisPelatihan::select('jenis_pelatihan', 'id AS number_jenis')->orderBy('number_jenis', 'desc')->get();
        $bentuk = BentukPelatihan::select('bentuk_pelatihan', 'id AS number_bentuk')->orderBy('number_bentuk', 'desc')->get();
        $jalur = JalurPelatihan::select('jalur_pelatihan', 'id AS number_jalur', 'id_bentuk AS number_bentuk')->orderBy('kode', 'desc')->get();
        return view('master.nama.index', compact('jenis', 'bentuk', 'jalur'));
    }

    public function listData()
    {
        $nama = NamaPelatihan::select(
                'nama_pelatihans.id AS id',
                'jenis_pelatihans.jenis_pelatihan AS jenis_pelatihan',
                'bentuk_pelatihans.bentuk_pelatihan AS bentuk_pelatihan',
                'jalur_pelatihans.jalur_pelatihan AS jalur_pelatihan',
                'nama_pelatihans.nama_pelatihan AS nama_pelatihan',
                'nama_pelatihans.keterangan as keterangan'
            )
            ->join('jenis_pelatihans', 'jenis_pelatihans.id', '=', 'nama_pelatihans.id_jenis')
            ->join('jalur_pelatihans', 'jalur_pelatihans.id', '=', 'nama_pelatihans.id_jalur')
            ->join('bentuk_pelatihans', 'bentuk_pelatihans.id', '=', 'jalur_pelatihans.id_bentuk')
            ->orderBy('nama_pelatihan', 'desc')->get();

        $no = 0;
        $data = array();

        foreach ($nama as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->jenis_pelatihan;
            $row[] = $list->bentuk_pelatihan;
            $row[] = $list->jalur_pelatihan;
            $row[] = $list->nama_pelatihan;
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
        $nama = new NamaPelatihan();
        $nama->id_jenis = $request['jenis'];
        $nama->id_jalur = $request['jalur'];
        $nama->kode = $request['kode'];
        $nama->nama_pelatihan = $request['nama_pelatihan'];
        $nama->keterangan = $request['keterangan'];
        $nama->save();
    }

    public function edit($id)
    {
        $nama = NamaPelatihan::select(
            'nama_pelatihans.id AS id',
            'nama_pelatihans.nama_pelatihan AS nama_pelatihan',
            'nama_pelatihans.keterangan as keterangan',
            'jenis_pelatihans.id AS id_jenis',
            'jenis_pelatihans.kode AS kode_jenis',
            'jenis_pelatihans.jenis_pelatihan AS jenis_pelatihan',
            'bentuk_pelatihans.id AS id_bentuk',
            'bentuk_pelatihans.kode AS kode_bentuk',
            'bentuk_pelatihans.bentuk_pelatihan AS bentuk_pelatihan',
            'jalur_pelatihans.id AS id_jalur',
            'jalur_pelatihans.kode AS kode_jalur',
            'jalur_pelatihans.jalur_pelatihan AS jalur_pelatihan',
            'nama_pelatihans.kode AS kode'
        )
            ->join('jenis_pelatihans', 'jenis_pelatihans.id', '=', 'nama_pelatihans.id_jenis')
            ->join('jalur_pelatihans', 'jalur_pelatihans.id', '=', 'nama_pelatihans.id_jalur')
            ->join('bentuk_pelatihans', 'bentuk_pelatihans.id', '=', 'jalur_pelatihans.id_bentuk')
            ->where('nama_pelatihans.id', '=', $id)->first();
        echo json_encode($nama);
    }

    public function update(Request $request, $id)
    {
        $nama = NamaPelatihan::find($id);
        $nama->id_jenis = $request['jenis'];
        $nama->id_jalur = $request['jalur'];
        $nama->kode = $request['kode'];
        $nama->nama_pelatihan = $request['nama_pelatihan'];
        $nama->keterangan = $request['keterangan'];
        $nama->update();
    }

    public function destroy($id)
    {
        $nama = NamaPelatihan::find($id);
        $nama->delete();
    }
}
