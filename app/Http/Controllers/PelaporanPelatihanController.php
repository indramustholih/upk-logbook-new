<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GapStandar;

class PelaporanPelatihanController extends Controller
{
    public function index()
    {
        return view('pelaporan.belum-mengikuti-pelatihan.index');
    }

    public function listData(Request $request)
    {
        $pelaporan = GapStandar::select(
            'gap_standars.nama',
            'gap_standars.nip',
            'gap_standars.kode_opd',
            'perangkat_daerahs.nama_opd',
            'gap_standars.kode_jabatan',
            'gap_standars.pelatihan',
            'nama_pelatihans.nama_pelatihan',
            'jabatans.nama_jabatan'
        )
            // ->join('pegwais', 'pegwais.nip', '=', 'gap_standar.nip')
            ->join('perangkat_daerahs', 'perangkat_daerahs.kode_opd', '=', 'gap_standars.kode_opd')
            ->join('jabatans', 'jabatans.kode_jabatan', '=', 'gap_standars.kode_jabatan')
            ->join('standar_pelatihans', 'standar_pelatihans.id', '=', 'gap_standars.id_standar')
            ->join('nama_pelatihans', 'nama_pelatihans.id', '=', 'standar_pelatihans.id_nama')
            ->where('perangkat_daerahs.kode_opd', '=', $request->id_perangkat_daerah)
            ->where('gap_standars.pelatihan', '=', $request->pelatihan)
            ->where('gap_standars.id_riwayat_diklat', '=', 0)
            ->orderBy('nama', 'asc')
            // ->groupBy('nip')
            ->get();
        $no = 0;
        $data = array();

        foreach ($pelaporan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama;
            $row[] = $list->nip;
            $row[] = $list->nama_jabatan;
            $row[] = $list->nama_opd;
            $row[] = $list->nama_pelatihan;
            if ($list->kode_jabatan == null) {
                $row[] = '<div class = "btn-group">
                <a class="btn btn-success btn-sm" id="disabled" disabled>
                    Mapping
                </a>
                <a class="btn btn-primary btn-sm" id="disabled" disabled>
                    View
                </a>
                </div>';
            } else {
                $row[] = '<div class = "btn-group">
                <a href = "/gap-standar/maping/' . $list->nip . '/' . $list->kode_opd . '" class = "btn btn-success btn-sm">
                    <i class = "fa fa-map"></i> Mapping
                </a>
                <a onclick = "viewForm(\'' . $list->nip . '\',\'' . $list->kode_jabatan . '\',\'' . $list->kode_opd . '\',\'' . $list->pelatihan . '\')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-eye"></i> View
                </a>
                </div>';
            }
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function viewMapping($nip, $kode_jabatan, $kode_opd, $pelatihan)
    {
        $nipView = GapStandar::select('gap_standars.nip', 'gap_standars.nama', 'jabatans.kode_jabatan', 'jabatans.nama_jabatan AS nama_jabatan', 'gap_standars.kode_opd', 'nama_opd')
            ->join('perangkat_daerahs', 'perangkat_daerahs.kode_opd', '=', 'gap_standars.kode_opd')
            ->join('jabatans', 'jabatans.kode_jabatan', '=', 'gap_standars.kode_jabatan')
            ->where('gap_standars.nip', '=', $nip)
            ->where('gap_standars.kode_jabatan', '=', $kode_jabatan)
            ->where('gap_standars.kode_opd', '=', $kode_opd)
            ->orderBy('gap_standars.nama', 'asc')->first();

        $standar = GapStandar::select('nama_pelatihans.nama_pelatihan as nama_standar', 'nama_riwayat_diklat', 'status')
            ->join('standar_pelatihans', 'standar_pelatihans.id', '=', 'gap_standars.id_standar')
            ->join('nama_pelatihans', 'nama_pelatihans.id', '=', 'standar_pelatihans.id_nama')
            ->where('nip', '=', $nip)
            ->where('gap_standars.kode_jabatan', '=', $kode_jabatan)
            ->where('gap_standars.kode_opd', '=', $kode_opd)
            ->where('pelatihan', '=', $pelatihan)
            ->orderBy('nama_pelatihans.nama_pelatihan', 'asc')->get();
        // $outputTeknis = array("data" => $standarTeknis);


        return response()->json(compact('nipView', 'standar'));
    }
}
