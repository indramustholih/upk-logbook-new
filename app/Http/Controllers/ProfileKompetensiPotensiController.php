<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GapAssesment;
use App\Models\GapAssesmentPotensi;
use App\Models\PerangkatDaerah;
use Illuminate\Support\Facades\DB;
use PDF;

class ProfileKompetensiPotensiController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $opd = PerangkatDaerah::select(
            'kode_opd',
            'nama_opd'
        )->orderBy('nama_opd', 'asc')->get();
        return view('profile.kompetensi-potensi.index', compact('opd'));
    }

    public function cariProfile($perangkat_daerah, $nip)
    {

        if ($nip != 0) {
            $identitas = DB::select("select a.* from gap_assesments_potensi a join gap_assesments b on b.nip=a.nip WHERE a.nip = '$nip' and LOWER(REPLACE(a.perangkat_daerah, ' ', '_')) = '$perangkat_daerah'  order by a.created_at desc limit 1");
        } else {
            $identitas = DB::select("select distinct a.nip, a.nama, a.jabatan, a.perangkat_daerah from gap_assesments_potensi a join gap_assesments b on b.nip=a.nip WHERE true and LOWER(REPLACE(a.perangkat_daerah, ' ', '_')) = '$perangkat_daerah'  order by a.created_at desc");
        }
        return response()->json(compact('identitas'));
    }

    public function generatePdf($perangkat_daerah, $nip)
    {

        $profile = DB::select("
            select a.*,b.*, a.pengambilan_keputusan as pengambilan_keputusan_potensi from gap_assesments_potensi a
            join ( select * from gap_assesments where
                    nip = '$nip'
                    AND LOWER(
                    REPLACE ( perangkat_daerah, ' ', '_' )) = '$perangkat_daerah'
                ORDER BY
                    created_at DESC
                    LIMIT 1
            ) b on b.nip=a.nip
            WHERE a.nip = '$nip' and LOWER(REPLACE(a.perangkat_daerah, ' ', '_')) = '$perangkat_daerah'  order by a.created_at desc limit 1");

        view()->share('profile', $profile);
        $pdf = PDF::loadView('profile.kompetensi-potensi.pdf', $profile);

        return $pdf->download('profile_' . $nip . '.pdf');
    }
}
