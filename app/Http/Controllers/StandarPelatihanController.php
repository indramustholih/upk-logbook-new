<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BentukPelatihan;
use App\Models\Pegawai;
use App\Models\JalurPelatihan;
use App\Models\JenisPelatihan;
use App\Models\NamaPelatihan;
use App\Models\PerangkatDaerah;
use App\Models\StandarPelatihan;

class StandarPelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $jenis = JenisPelatihan::select(
            'jenis_pelatihan',
            'id AS number_jenis'
        )->orderBy('number_jenis', 'asc')->get();

        $bentuk = BentukPelatihan::select(
            'bentuk_pelatihan',
            'id AS number_bentuk'
        )->orderBy('number_bentuk', 'asc')->get();

        $opd = PerangkatDaerah::select(
            'kode_opd AS number_opd',
            'nama_opd'
        )->orderBy('nama_opd', 'asc')->get();

        $jalur = JalurPelatihan::select(
            'jalur_pelatihan',
            'id AS number_jalur',
            'id_bentuk AS number_bentuk'
        )->orderBy('kode', 'asc')->get();

        $nama = NamaPelatihan::select(
            'nama_pelatihans.nama_pelatihan',
            'nama_pelatihans.id AS number_nama',
            'nama_pelatihans.id_jenis AS number_jenis',
            'nama_pelatihans.id_jalur AS number_jalur',
            'jalur_pelatihans.id_bentuk AS number_bentuk'
        )->join('jenis_pelatihans', 'jenis_pelatihans.id', '=', 'nama_pelatihans.id_jenis')
            ->join('jalur_pelatihans', 'jalur_pelatihans.id', '=', 'nama_pelatihans.id_jalur')
            ->join('bentuk_pelatihans', 'bentuk_pelatihans.id', '=', 'jalur_pelatihans.id_bentuk')
            ->orderBy('nama_pelatihans.nama_pelatihan', 'asc')->get();

        $jabatan = Pegawai::select(
            'jabatans.nama_jabatan',
            'jabatans.kode_jabatan',
            'pegawais.kode_opd as number_perangkat_daerah'
        )->join('jabatans', 'jabatans.kode_jabatan', '=', 'pegawais.kode_jabatan')->orderBy('nama_jabatan', 'asc')->get();

        return view('master.standar.index', compact('jenis', 'bentuk', 'opd', 'jabatan', 'jalur', 'nama'));
    }

    public function listData()
    {
        $standar = StandarPelatihan::select(
            'standar_pelatihans.id AS id',
            'perangkat_daerahs.nama_opd AS perangkat_daerah',
            'jabatans.nama_jabatan AS nama_jabatan',
            'standar_pelatihans.tingkat_kebutuhan AS tingkat_kebutuhan',
            'standar_pelatihans.keterangan AS keterangan',
            'bentuk_pelatihans.bentuk_pelatihan AS bentuk_pelatihan',
            'jalur_pelatihans.jalur_pelatihan AS jalur_pelatihan',
            'nama_pelatihans.nama_pelatihan AS nama_pelatihan',
            'jenis_pelatihans.jenis_pelatihan AS jenis_pelatihan'
        )
            ->join('perangkat_daerahs', 'perangkat_daerahs.kode_opd', '=', 'standar_pelatihans.kode_opd')
            ->join('jabatans', 'jabatans.kode_jabatan', '=', 'standar_pelatihans.kode_jabatan')
            ->join('nama_pelatihans', 'nama_pelatihans.id', '=', 'standar_pelatihans.id_nama')
            ->join('jalur_pelatihans', 'jalur_pelatihans.id', '=', 'nama_pelatihans.id_jalur')
            ->join('bentuk_pelatihans', 'bentuk_pelatihans.id', '=', 'jalur_pelatihans.id_bentuk')
            ->join('jenis_pelatihans', 'jenis_pelatihans.id', '=', 'nama_pelatihans.id_jenis')
            ->orderBy('nama_pelatihans.nama_pelatihan', 'desc')
            // ->whereRaw('standar_pelatihans.id_perangkat_daerah = pegawais.id_perangkat_daerah')
            ->get();

        $no = 0;
        $data = array();

        foreach ($standar as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->perangkat_daerah;
            $row[] = $list->nama_jabatan;
            $row[] = $list->jenis_pelatihan;
            $row[] = $list->bentuk_pelatihan;
            $row[] = $list->jalur_pelatihan;
            $row[] = $list->nama_pelatihan;
            $row[] = $list->tingkat_kebutuhan;
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
        $standar = new StandarPelatihan();
        $standar->kode_opd = $request['perangkat_daerah'];
        $standar->kode_jabatan = $request['jabatan'];
        // $standar->id_jenis = $request['jenis'];
        // $standar->id_bentuk = $request['bentuk'];
        // $standar->id_jalur = $request['jalur'];
        $standar->id_nama = $request['nama'];
        $standar->tingkat_kebutuhan = $request['tingkat_kebutuhan'];
        $standar->keterangan = $request['keterangan'];
        $standar->save();
    }

    public function edit($id)
    {
        $standar = StandarPelatihan::select(
            'standar_pelatihans.id AS id',
            'perangkat_daerahs.kode_opd AS id_perangkat_daerah',
            'jabatans.kode_jabatan',
            'standar_pelatihans.tingkat_kebutuhan AS tingkat_kebutuhan',
            'standar_pelatihans.keterangan AS keterangan',
            'bentuk_pelatihans.id AS id_bentuk_pelatihan',
            'jalur_pelatihans.id AS id_jalur_pelatihan',
            'jalur_pelatihans.jalur_pelatihan AS jalur_pelatihan',
            'jenis_pelatihans.id AS id_jenis_pelatihan',
            'nama_pelatihans.id AS id_nama_pelatihan'
        )
            ->join('perangkat_daerahs', 'perangkat_daerahs.kode_opd', '=', 'standar_pelatihans.kode_opd')
            ->join('jabatans', 'jabatans.kode_jabatan', '=', 'standar_pelatihans.kode_jabatan')
            ->join('nama_pelatihans', 'nama_pelatihans.id', '=', 'standar_pelatihans.id_nama')
            ->join('jalur_pelatihans', 'jalur_pelatihans.id', '=', 'nama_pelatihans.id_jalur')
            ->join('bentuk_pelatihans', 'bentuk_pelatihans.id', '=', 'jalur_pelatihans.id_bentuk')
            ->join('jenis_pelatihans', 'jenis_pelatihans.id', '=', 'nama_pelatihans.id_jenis')
            ->where('standar_pelatihans.id', '=', $id)->first();
        echo json_encode($standar);
    }

    public function update(Request $request, $id)
    {
        $standar = StandarPelatihan::find($id);
        $standar->kode_opd = $request['perangkat_daerah'];
        $standar->kode_jabatan = $request['jabatan'];
        // $standar->id_jenis = $request['jenis'];
        // $standar->id_bentuk = $request['bentuk'];
        // $standar->id_jalur = $request['jalur'];
        $standar->id_nama = $request['nama'];
        $standar->tingkat_kebutuhan = $request['tingkat_kebutuhan'];
        $standar->keterangan = $request['keterangan'];
        $standar->update();
    }

    public function destroy($id)
    {
        $nama = StandarPelatihan::find($id);
        $nama->delete();
    }
}
